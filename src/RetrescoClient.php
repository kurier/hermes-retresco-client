<?php

namespace telekurier\RetrescoClient;

/**
 * @file
 * Contains \telekurier\RetrescoClient\RetrescoClient
 */

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use Joli\Jane\Encoder\RawEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
use telekurier\RetrescoClient\Encoder\FieldDocumentEncoder;
use telekurier\RetrescoClient\Model\ElasticSearchRawResult;
use telekurier\RetrescoClient\Model\ElasticSearchResult;
use telekurier\RetrescoClient\Model\RelatedDocuments;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\Model\RetrescoEntityLinks;
use telekurier\RetrescoClient\Model\RetrescoTopicPages;
use telekurier\RetrescoClient\Normalizer\ElasticSearchResultWithDocumentHitsNormalizer;
use telekurier\RetrescoClient\Normalizer\NormalizerFactory;

/**
 * Retresco REST client class.
 */
class RetrescoClient extends Client {

  const RESPONSE_OK = '200';
  const RESPONSE_CREATED = '201';
  const RESPONSE_BAD_REQUEST = '400';
  const RESPONSE_UNAUTHORIZED = '401';
  const RESPONSE_NOT_FOUND = '404';
  const RESPONSE_CONFLICT = '409';
  const RESPONSE_INTERNAL_ERROR = '500';

  /**
   * The serializer to use.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   */
  protected $serializer;

  /**
   * @var array
   * An array of configuration settings.
   *
   * @todo Convert to a class.
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
    $this->config = $config;
    $default_options = [
      // 'curl' => [CURLOPT_SSLVERSION => CURL_SSLVERSION_SSLv3],
      // 'verify' => FALSE,
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
        new RawEncoder()
      ];
      $normalizers = NormalizerFactory::create();
      array_unshift($normalizers, new ElasticSearchResultWithDocumentHitsNormalizer());

      $this->serializer = new Serializer($normalizers, $encoders);
    }
    return $this->serializer;
  }

  /**
   * Sets serializer to use.
   *
   * @param \Symfony\Component\Serializer\SerializerInterface $serializer
   *   The serializer.
   */
  public function setSerializer(SerializerInterface $serializer) {
    $this->serializer = $serializer;
  }

  /**
   * Get the list of white listed Retresco entities.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoEntityLinks
   *   Entity links.
   */
  public function getEntityLinksMap() {
    $header = array(
      'Content-Type' => 'application/json',
    );

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
   * Enriches the document on the server.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   *   The Retresco document.
   * @param bool $inTextLinks
   *   Enables calculation of In-Text-Links
   *   (default: false).
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoDocument
   *   Enriched document.
   *
   * @internal param bool $index Index document.
   */
  public function enrichDocument(RetrescoDocument $document, $inTextLinks) {
    $header = array(
      'Content-Type' => 'application/json',
    );

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

  /**
   * Puts the document on the server.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   *   The Retresco document.
   *
   * @return mixed|\Psr\Http\Message\ResponseInterface
   *
   * @todo return description.
   */
  public function putDocument(RetrescoDocument $document) {
    $body = $this->getSerializer()->serialize($document, 'json');

    $header = array(
      'Content-Type' => 'application/json',
    );

    $uri = $this->config["documentPath"] . "/" . $document->getDocId();

    $request = new Request('PUT', $uri, $header, $body);
    $response = $this->send($request);

    return $response;
  }

  /**
   * Gets the document for the given remote id.
   *
   * @param int $id
   *   The remote id of the document.
   * @param string $url
   *   Optional. Retrieve document from specific url.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoDocument
   *   RetrescoDocument object.
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
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

  /**
   * Deletes the document.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   *   RetrescoDocument.
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function deleteDocument(RetrescoDocument $document) {
    return $this->deleteDocumentById($document->getDocId());
  }

  /**
   * Deletes the document for the given remote id.
   *
   * @param int $id
   *   The remote document id.
   *
   * @return \Psr\Http\Message\ResponseInterface
   *   ResponseInterface
   *
   * @throws \GuzzleHttp\Exception\ClientException
   */
  public function deleteDocumentById($id) {
    return $this->delete($this->config["documentPath"] . "/" . $id);
  }

  /**
   * Get Related Documents
   *
   * @param string $id
   *   Document ID.
   * @param string $doc_types
   *   Document type.
   * @param mixed $options
   *   See
   *    https://kurier-stage01.rtrsupport.de/ui/manual-docs/api_relateds.html.
   *
   * @return \telekurier\RetrescoClient\Model\RelatedDocuments
   *   RelatedDocuments object.
   */
  public function getRelatedDocuments($id, $doc_types, $options = NULL) {
    $query_data = array_merge($options ?: [], ['doc_types' => $doc_types]);
    $query = http_build_query($query_data);

    $url = $this->config['relatedPath'] . '/' . $id . '?' . $query;

    try {
      $response = $this->get($url);
    }
    catch (ServerException $e) {
      return new RelatedDocuments();
    }
    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];

    /** @var \telekurier\RetrescoClient\Model\RelatedDocuments $document */
    $documents = $this->getSerializer()->deserialize(
      $data, RelatedDocuments::class, 'json', $context
    );

    return $documents;
  }

  /**
   * Get Topic Pages object from Retresco as result of search.
   *
   * @param string $searchText
   *   Text to search.
   *
   * @return \telekurier\RetrescoClient\Model\RetrescoTopicPages
   *   RetrescoTopicPages object.
   */
  public function getTopicPages($searchText) {
    $header = array(
      'Content-Type' => 'application/json',
    );
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

  public function poolSearch($query): ElasticSearchResult {
    $header = array(
      'Content-Type' => 'application/json',
    );
    $uri = $this->config['poolSearchPath'];

    $body = $this->getSerializer()->serialize($query, 'json');
    $request = new Request('POST', $uri, $header, $body);

    $response = $this->send($request);

    $data = $response->getBody()->getContents();

    $context = ['json_decode_associative' => FALSE];
    $serializer = $this->getSerializer();

    /** @var \telekurier\RetrescoClient\Model\ElasticSearchRawResult $rawResult */
    $rawResult = $serializer->deserialize(
      $data, ElasticSearchRawResult::class, 'json', $context
    );

    return $rawResult->getHits();
  }

}
