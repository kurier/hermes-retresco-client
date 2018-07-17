<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
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
use telekurier\RetrescoClient\Normalizer\NormalizerFactory;

class RetrescoClientImpl implements RetrescoClient {

  const PATHS = [
    'documentPath' => '/api/content',
    'enrichPath' => 'api/enrich',
    'entityLinksPath' => '/api/entities/in-text-link-whitelist',
    'poolSearchPath' => '/api/es_pool/_search',
    'topicPagesPath' => 'api/topic-pages',
    'topicsTypeheadPath' => 'api/topic-pages-typeahead',
  ];

  /**
   * @var \GuzzleHttp\Client
   */
  protected $client;

  /**
   * The serializer to use.
   *
   * @var \Symfony\Component\Serializer\Serializer
   */
  protected $serializer;

  /**
   * RetrescoClientImpl constructor.
   *
   * @param \GuzzleHttp\Client $client
   *   HTTP client.
   */
  public function __construct(Client $client) {
    $this->client = $client;
  }

  public function getEntityLinksMap() {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $request = new Request('GET', self::PATHS['entityLinksPath'], $header);
    $response = $this->client->send($request);
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

  /**
   * @inheritdoc
   */
  public function enrichDocument(RetrescoDocument $document, $inTextLinks) {
    $header = [
      'Content-Type' => 'application/json',
    ];

    $query = $inTextLinks ? '?in-text-linked' : NULL;
    $uri = self::PATHS["enrichPath"] . $query;
    $body = $this->getSerializer()->serialize($document, 'json');
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->client->send($request);

    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocument $document */
    $document = $this->getSerializer()->deserialize(
      $data, RetrescoDocument::class, 'json', $context
    );

    return $document;
  }

  /**
   * @inheritdoc
   */
  public function putDocument(RetrescoDocument $document) {
    $body = $this->getSerializer()->serialize($document, 'json');

    $header = [
      'Content-Type' => 'application/json',
    ];

    $uri = self::PATHS["documentPath"] . "/" . $document->getDocId();

    $request = new Request('PUT', $uri, $header, $body);
    $response = $this->client->send($request);

    return $response;
  }

  public function getDocumentById($id, $url = NULL) {
    $url = isset($url) ? $url : self::PATHS["documentPath"];
    $response = $this->client->get($url . "/" . $id);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocument $document */
    $document = $this->getSerializer()->deserialize(
      $data, RetrescoDocument::class, 'json', $context
    );

    return $document;
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
    return $this->client->delete(self::PATHS["documentPath"] . "/" . $id);
  }

  /**
   * @inheritdoc
   */
  public function getRelatedDocuments($id, $doc_types, $options = NULL) {
    $query_data = array_merge($options ?: [], ['doc_types' => $doc_types]);
    $query = http_build_query($query_data);

    $url = sprintf('%s/%s/relateds?%s', self::PATHS['documentPath'], $id, $query);

    try {
      $response = $this->client->get($url);
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

  /**
   * @inheritdoc
   */
  public function getTopicPage($topicPageId) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = self::PATHS["topicPagesPath"] . '/' . $topicPageId;
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPage $topicsPage */
    $topicPage = $serializer->deserialize(
      $data, RetrescoTopicPage::class, 'json', $context
    );

    return $topicPage;

  }

  /**
   * @inheritdoc
   */
  public function getTopicPageDocuments(string $topicPageId,
                                        int $rows,
                                        int $page,
                                        string $sort_by): RetrescoDocuments {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = sprintf('%s/%s/documents?rows=%d&page=%d&sort_by=%s', self::PATHS["topicPagesPath"], $topicPageId, $rows, $page, $sort_by);
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RetrescoDocuments $document */
    $documents = $this->getSerializer()->deserialize(
      $data, RetrescoDocuments::class, 'json', $context
    );

    return $documents;
  }

  /**
   * @inheritdoc
   */
  public function searchTopicPages(string $term) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = self::PATHS["topicPagesPath"] . '?q=' . $term;
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPages $topicsPage */
    $topicPage = $serializer->deserialize(
      $data, RetrescoTopicPages::class, 'json', $context
    );

    return $topicPage;

  }

  /**
   * @inheritdoc
   */
  public function relatedTopicPages(string $topicPageId) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = sprintf('%s/%s/relateds', self::PATHS["topicPagesPath"], $topicPageId);
    $request = new Request('GET', $uri, $header);

    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPages $topicsPage */
    $topicPage = $serializer->deserialize(
      $data, RetrescoTopicPages::class, 'json', $context
    );

    return $topicPage;

  }

  /**
   * @inheritdoc
   */
  public function getTopicPages($searchText) {
    $header = [
      'Content-Type' => 'application/json',
    ];
    // Create the URL with search query and get data.
    $uri = self::PATHS["topicsTypeheadPath"] . '?q=' . $searchText;
    $request = new Request('GET', $uri, $header);
    $response = $this->client->send($request);
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();
    /** @var \telekurier\RetrescoClient\Model\RetrescoTopicPages $topicsPage */
    $topicsPage = $serializer->deserialize(
      $data, RetrescoTopicPages::class, 'json', $context
    );

    return $topicsPage;
  }

  /**
   * @inheritdoc
   */
  public function poolSearch($query): ElasticSearchRawResult {
    $header = [
      'Content-Type' => 'application/json',
    ];
    $uri = self::PATHS['poolSearchPath'];

    $body = $this->getSerializer()->serialize($query, 'json');
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->client->send($request);

    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();

    /** @var \telekurier\RetrescoClient\Model\ElasticSearchRawResult $rawResult */
    return $serializer->deserialize(
      $data, ElasticSearchRawResult::class, 'json', $context
    );
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

}
