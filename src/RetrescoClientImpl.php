<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use Psr\Log\LoggerInterface;
use stdClass;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use telekurier\RetrescoClient\Encoder\FieldDocumentEncoder;
use telekurier\RetrescoClient\Encoder\RawEncoder;
use telekurier\RetrescoClient\Model\ElasticSearchRawResult;
use telekurier\RetrescoClient\Model\ElasticSearchResult;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\Model\RetrescoDocuments;
use telekurier\RetrescoClient\Model\RetrescoEntityLinks;
use telekurier\RetrescoClient\Model\RetrescoTopicPage;
use telekurier\RetrescoClient\Model\RetrescoTopicPages;
use telekurier\RetrescoClient\Normalizer\ElasticSearchResultWithDocumentHitsNormalizer;
use telekurier\RetrescoClient\Normalizer\EmptyObjectNormalizer;
use telekurier\RetrescoClient\Normalizer\NormalizerFactory;

class RetrescoClientImpl implements RetrescoClient {

  const CONTENT_READ_PATH = 'contentReadPath';

  const CONTENT_WRITE_PATH = 'contentWritePath';

  const ENRICH_PATH = 'enrichPath';

  const ENTITY_LINKS_PATH = 'entityLinksPath';

  const POOL_SEARCH_PATH = 'poolSearchPath';

  const TOPIC_PAGES_PATH = 'topicPagesPath';

  const TOPICS_TYPEHEAD_PATH = 'topicPagesTypeAheadPath';

  const DEFAULT_PATHS = [
    self::CONTENT_READ_PATH => '/api/content/%s',
    self::CONTENT_WRITE_PATH => '/api/content/%s',
    self::ENRICH_PATH => '/api/enrich',
    self::ENTITY_LINKS_PATH => '/api/entities/in-text-link-whitelist',
    self::POOL_SEARCH_PATH => '/api/es_pool/_search',
    self::TOPIC_PAGES_PATH => 'api/topic-pages',
    self::TOPICS_TYPEHEAD_PATH => '/api/topic-pages-typeahead',
  ];

  /**
   * @var \Psr\Log\LoggerInterface
   */
  protected $logger;

  /**
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * @var mixed
   */
  protected $_paths;

  /**
   * @var string Index type name
   */
  protected $_type;

  /**
   * The serializer to use.
   *
   * @var \Symfony\Component\Serializer\Serializer
   */
  protected $serializer;

  /**
   * RetrescoClientImpl constructor.
   *
   * @param \Psr\Log\LoggerInterface $logger
   *   A logger instance.
   * @param \GuzzleHttp\Client $client
   *   HTTP client.
   * @param array|null $paths
   *   Optional path override.
   */
  public function __construct(LoggerInterface $logger,
                              Client $client,
                              ?array $paths = []) {
    $this->logger = $logger;
    $this->client = $client;
    $this->_paths = $paths + self::DEFAULT_PATHS;
  }

  public function getEntityLinksMap() {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $request = new Request('GET', $this->_paths[self::ENTITY_LINKS_PATH], $header);
    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    return $this->deserialize($data, RetrescoEntityLinks::class);
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
      array_unshift($normalizers, new EmptyObjectNormalizer());
      array_unshift($normalizers, new ElasticSearchResultWithDocumentHitsNormalizer());

      $this->serializer = new Serializer($normalizers, $encoders);
    }
    return $this->serializer;
  }

  /**
   * @inheritdoc
   */
  public function enrichDocument(RetrescoDocument $document, $inTextLinks) {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $query = $inTextLinks ? '?in-text-linked' : NULL;
    $uri = $this->_paths[self::ENRICH_PATH] . $query;
    $body = $this->serialize($document);
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->client->send($request);

    $data = $response->getBody()->getContents();

    return $this->deserialize($data, RetrescoDocument::class);
  }

  /**
   * @inheritdoc
   */
  public function putDocument(RetrescoDocument $document) {
    $body = $this->serialize($document);

    $header = [
      'Content-Type' => 'application/json',
    ];

    $id = $document->getDocId();
    $url = sprintf($this->_paths[self::CONTENT_WRITE_PATH], $id);

    $request = new Request('PUT', $url, $header, $body);
    $response = $this->client->send($request);

    return $response;
  }

  public function getDocumentById($id) {
    $url = sprintf($this->_paths[self::CONTENT_READ_PATH], $id);
    $response = $this->client->get($url);
    $data = $response->getBody()->getContents();
    return $this->deserialize($data, RetrescoDocument::class);
  }

  /**
   * @inheritdoc
   */
  public function deleteDocument(RetrescoDocument $document) {
    return $this->deleteDocumentById($document->getDocId());
  }

  /**
   * @inheritdoc
   */
  public function deleteDocumentById($id) {
    $url = sprintf($this->_paths[self::CONTENT_WRITE_PATH], $id);
    return $this->client->delete($url);
  }

  /**
   * @inheritdoc
   */
  public function getRelatedDocuments($id, $doc_types, $options = NULL) {
    $query_data = array_merge($options ?: [], ['doc_types' => $doc_types]);
    $query = http_build_query($query_data);

    $url = sprintf($this->_paths[self::CONTENT_WRITE_PATH] . '/relateds?%s', $id, $query);

    try {
      $response = $this->client->get($url);
    }
    catch (ServerException $e) {
      return new RetrescoDocuments();
    }
    $data = $response->getBody()->getContents();

    return $this->deserialize($data, RetrescoDocuments::class);
  }

  /**
   * @inheritdoc
   */
  public function getTopicPage($topicPageId) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = $this->_paths[self::TOPIC_PAGES_PATH] . '/' . $topicPageId;
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    return $this->deserialize($data, RetrescoTopicPage::class);
  }

  /**
   * @inheritdoc
   */
  public function getTopicPageDocuments(string $topicPageId,
                                        int $rows,
                                        int $page,
                                        string $sort_by,
                                        ?string $filter = NULL): RetrescoDocuments {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $query = [
      'rows' => $rows,
      'page' => $page,
      'sort_by' => $sort_by,
    ];

    if (!empty($filter)) {
      $query['filter'] = $filter;
    }

    $queryString = http_build_query($query);
    $uri = sprintf('%s/%s/documents?%s', $this->_paths[self::TOPIC_PAGES_PATH], $topicPageId, $queryString);
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocuments $documents */
    $documents = $this->deserialize($data, RetrescoDocuments::class);
    return $documents;
  }

  /**
   * @inheritdoc
   */
  public function relatedTopicPages(string $topicPageId) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = sprintf('%s/%s/relateds', $this->_paths[self::TOPIC_PAGES_PATH], $topicPageId);
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    return $this->deserialize($data, RetrescoTopicPages::class);
  }

  /**
   * @inheritdoc
   */
  public function topicPagesTypeAhead($phrase) {
    $header = [
      'Content-Type' => 'application/json',
    ];

    // Create the URL with search query and get data.
    $uri = $this->_paths[self::TOPICS_TYPEHEAD_PATH] . '?q=' . $phrase;
    $request = new Request('GET', $uri, $header);
    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    return $this->deserialize($data, RetrescoTopicPages::class);
  }

  /**
   * @inheritdoc
   */
  public function poolSearch($query): ElasticSearchRawResult {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $uri = $this->_paths[self::POOL_SEARCH_PATH];

    $body = $this->serialize($query);
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->client->send($request);

    $data = $response->getBody()->getContents();

    /** @var \telekurier\RetrescoClient\Model\ElasticSearchRawResult $rawResult */
    $rawResult = $this->deserialize($data, ElasticSearchRawResult::class);
    return $rawResult;
  }

  /**
   * @inheritdoc
   */
  public function poolSearchResult($query): ElasticSearchResult {
    return $this->poolSearch($query)->getHits();
  }

  /**
   * @inheritdoc
   */
  public function poolSearchAggregations($query): array {
    /** @var \telekurier\RetrescoClient\Model\ElasticSearchRawResult $rawResult */
    $rawResult = $this->poolSearch($query);
    /** @var \ArrayObject $aggregations */
    $aggregations = $rawResult->getAggregations();
    return $aggregations->getArrayCopy();
  }

  /**
   * @inheritDoc
   */
  public function deserialize(string $data, string $type): object {
    $context = ['json_decode_associative' => FALSE];
    return $this->getSerializer()
      ->deserialize($data, $type, 'json', $context);
  }

  /**
   * @inheritDoc
   */
  public function serialize($data) {
    return $this->getSerializer()->serialize($data, 'json');
  }

}
