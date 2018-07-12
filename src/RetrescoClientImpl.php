<?php

declare(strict_types=1);

namespace telekurier\RetrescoClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use telekurier\RetrescoClient\Encoder\FieldDocumentEncoder;
use telekurier\RetrescoClient\Encoder\RawEncoder;
use telekurier\RetrescoClient\Model\ElasticSearchRawResult;
use telekurier\RetrescoClient\Model\ElasticSearchResult;
use telekurier\RetrescoClient\Model\RetrescoDocuments;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\Model\RetrescoEntityLinks;
use telekurier\RetrescoClient\Model\RetrescoTopicPage;
use telekurier\RetrescoClient\Model\RetrescoTopicPages;
use telekurier\RetrescoClient\Normalizer\ElasticSearchResultWithDocumentHitsNormalizer;
use telekurier\RetrescoClient\Normalizer\NormalizerFactory;

class RetrescoClientImpl extends Client implements RetrescoClient {

  const DEFAULT_PATHS = [
    'documentPath' => '/api/content',
    'enrichPath' => 'api/enrich',
    'entityLinksPath' => '/api/entities/in-text-link-whitelist',
    'poolSearchPath' => '/api/es_pool/_search',
    'topicPagesPath' => 'api/topic-pages',
    'topicsTypeheadPath' => 'api/topic-pages-typeahead',
  ];

  /**
   * The serializer to use.
   *
   * @var \Symfony\Component\Serializer\Serializer
   */
  protected $serializer;

  /**
   * @var array
   * An array of configuration settings.
   *
   * The following keys are required,
   *   while all Guzzle configuration options are supported:
   *   - base_uri: Base URL of the the Retresco rest service.
   *   - username: The Retresco username.
   *   - password: The Retresco password.
   *   - format: (optional) Format of the returned data, allowed values 'json',
   *     'xml'; 'json' by default.
   *   - documentPath: The path for the document api.
   */
  protected $config;

  /**
   * Object constructor.
   *
   * @param array $config
   *   An array of configuration settings. The following keys are required,
   *   while all Guzzle configuration options are supported:
   *   - base_uri: Base URL of the the Retresco rest service.
   *   - username: The Retresco username.
   *   - password: The Retresco password.
   *   - format: (optional) Format of the returned data, allowed values 'json',
   *     'xml'; 'json' by default.
   */
  public function __construct(array $config) {
    $this->config = $config + self::DEFAULT_PATHS;
    $default_options = [
      'auth' => [
        $this->config['username'],
        $this->config['password'],
      ],
      'format' => 'json',
    ];
    parent::__construct($config + $default_options);
  }

  /**
   * Creates an Retresco client instance.
   *
   * @param array $config
   *   An array of configuration settings. The following keys are required,
   *   while all Guzzle configuration options are supported:
   *   - base_uri: Base URL of the the Retresco rest service.
   *   - username: The Retresco username.
   *   - password: The Retresco password.
   *   - format: (optional) Format of the returned data, allowed values 'json',
   *     'xml'; 'json' by default.
   *
   * @return static
   */
  public static function create(array $config) {
    // Add in a handler stack with our middleware.
    $stack = HandlerStack::create();
    $config['handler'] = $stack;
    $client = new static($config);

    return $client;
  }

  public function getEntityLinksMap() {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $request = new Request('GET', $this->config['entityLinksPath'], $header);
    $response = $this->send($request);
    $data = $response->getBody()->getContents();
    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoEntityLinks $document */
    $entityLinks = $this->getSerializer()->deserialize(
      $data, RetrescoEntityLinks::class, 'json', $context
    );

    return $entityLinks;
  }

  /**
   * The serializer to use.
   *
   * @return \Symfony\Component\Serializer\Serializer
   *   The serializer.
   */
  public function getSerializer() {
    if (!isset($this->serializer)) {
      $encoders = [
        new FieldDocumentEncoder(),
        new JsonEncoder(),
        new RawEncoder(),
      ];
      $normalizers = NormalizerFactory::create();
      array_unshift($normalizers, new ElasticSearchResultWithDocumentHitsNormalizer());

      $this->serializer = new Serializer($normalizers, $encoders);
    }
    return $this->serializer;
  }

  public function setSerializer(SerializerInterface $serializer) {
    $this->serializer = $serializer;
  }

  public function enrichDocument(RetrescoDocument $document, $inTextLinks) {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $query = $inTextLinks ? '?in-text-linked' : NULL;
    $uri = $this->config["enrichPath"] . $query;
    $body = $this->getSerializer()->serialize($document, 'json');
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->send($request);

    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocument $document */
    $document = $this->getSerializer()->deserialize(
      $data, RetrescoDocument::class, 'json', $context
    );

    return $document;
  }

  public function putDocument(RetrescoDocument $document) {
    $body = $this->getSerializer()->serialize($document, 'json');

    $header = [
      'Content-Type' => 'application/json',
    ];

    $uri = $this->config["documentPath"] . "/" . $document->getDocId();

    $request = new Request('PUT', $uri, $header, $body);
    $response = $this->send($request);

    return $response;
  }

  public function getDocumentById($id, $url = NULL) {
    $url = isset($url) ? $url : $this->config["documentPath"];
    $response = $this->get($url . "/" . $id);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocument $document */
    $document = $this->getSerializer()->deserialize(
      $data, RetrescoDocument::class, 'json', $context
    );

    return $document;
  }

  public function deleteDocument(RetrescoDocument $document) {
    return $this->deleteDocumentById($document->getDocId());
  }

  public function deleteDocumentById($id) {
    return $this->delete($this->config["documentPath"] . "/" . $id);
  }

  public function getRelatedDocuments($id, $doc_types, $options = NULL) {
    $query_data = array_merge($options ?: [], ['doc_types' => $doc_types]);
    $query = http_build_query($query_data);

    $url = sprintf('%s/%s/relateds?%s', $this->config['documentPath'], $id, $query);

    try {
      $response = $this->get($url);
    }
    catch (ServerException $e) {
      return new RetrescoDocuments();
    }
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocuments $document */
    $documents = $this->getSerializer()->deserialize(
      $data, RetrescoDocuments::class, 'json', $context
    );

    return $documents;
  }

  public function getTopicPage($topicPageId) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = $this->config["topicPagesPath"] . '/' . $topicPageId;
    $request = new Request('GET', $uri, $header);

    $response = $this->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPage $topicsPage */
    $topicPage = $serializer->deserialize(
      $data, RetrescoTopicPage::class, 'json', $context
    );

    return $topicPage;

  }

  public function getTopicPageDocuments(string $topicPageId,
                                        int $rows,
                                        int $page,
                                        string $sort_by): RetrescoDocuments {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = sprintf('%s/%s/documents?rows=%d&page=%d&sort_by=%s', $this->config["topicPagesPath"], $topicPageId, $rows, $page, $sort_by);
    $request = new Request('GET', $uri, $header);

    $response = $this->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocuments $document */
    $documents = $this->getSerializer()->deserialize(
      $data, RetrescoDocuments::class, 'json', $context
    );

    return $documents;
  }

  public function searchTopicPages(string $term) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = $this->config["topicPagesPath"] . '?q=' . $term;
    $request = new Request('GET', $uri, $header);

    $response = $this->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPages $topicsPage */
    $topicPage = $serializer->deserialize(
      $data, RetrescoTopicPages::class, 'json', $context
    );

    return $topicPage;

  }

  public function relatedTopicPages(string $topicPageId) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = sprintf('%s/%s/relateds', $this->config["topicPagesPath"], $topicPageId);
    $request = new Request('GET', $uri, $header);

    $response = $this->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPages $topicsPage */
    $topicPage = $serializer->deserialize(
      $data, RetrescoTopicPages::class, 'json', $context
    );

    return $topicPage;

  }

  public function getTopicPages($searchText) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    // Create the URL with search query and get data.
    $uri = $this->config["topicsTypeheadPath"] . '?q=' . $searchText;
    $request = new Request('GET', $uri, $header);
    $response = $this->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPages $topicsPage */
    $topicsPage = $serializer->deserialize(
      $data, RetrescoTopicPages::class, 'json', $context
    );

    return $topicsPage;
  }

  public function poolSearchResult($query): ElasticSearchResult {
    return $this->poolSearch($query)->getHits();
  }

  /**
   * @param $query mixed
   *   Elasticsearch query as associative array
   *
   * @return \telekurier\RetrescoClient\Model\ElasticSearchRawResult
   *   Raw result.
   *
   * @throws \GuzzleHttp\Exception\GuzzleException
   */
  protected function poolSearch($query): ElasticSearchRawResult {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = $this->config['poolSearchPath'];

    $body = $this->getSerializer()->serialize($query, 'json');
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->send($request);

    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();

    /** @var \telekurier\RetrescoClient\Model\ElasticSearchRawResult $rawResult */
    return $serializer->deserialize(
      $data, ElasticSearchRawResult::class, 'json', $context
    );
  }

  public function poolSearchAggregations($query): array {
    /** @var \telekurier\RetrescoClient\Model\ElasticSearchRawResult $rawResult */
    $rawResult = $this->poolSearch($query);
    /** @var \ArrayObject $aggregations */
    $aggregations = $rawResult->getAggregations();
    return $aggregations->getArrayCopy();
  }

}
