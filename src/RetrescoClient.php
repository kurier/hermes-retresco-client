<?php

/**
 * @file
 * Contains \drunomics\RetrescoClient\RetrescoClient
 */

namespace drunomics\RetrescoClient;

use drunomics\RetrescoClient\Model\RetrescoDocument;
use drunomics\RetrescoClient\Normalizer\SwaggerSchemaNormalizer;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Retresco REST client class.
 */
class RetrescoClient extends Client {

  const RESPONSE_OK             = '200';
  const RESPONSE_CREATED        = '201';
  const RESPONSE_BAD_REQUEST    = '400';
  const RESPONSE_UNAUTHORIZED   = '401';
  const RESPONSE_NOT_FOUND      = '404';
  const RESPONSE_CONFLICT       = '409';
  const RESPONSE_INTERNAL_ERROR = '500';

  /**
   * The serializer to use.
   *
   * @var \Symfony\Component\Serializer\SerializerInterface
   */
  protected $serializer;

  /**
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
   *
   * @var array
   */
  protected $config;

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
  public static function create($config) {
    // Add in a handler stack with our middleware.
    $stack = HandlerStack::create();
    $config['handler'] = $stack;
    $client = new static($config);

    return $client;
  }

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
    if (!empty($config['format']) && $config['format'] == 'xml') {
      $config['headers']['Accept'] = 'application/xml';
    }
    else {
      $config['headers']['Accept'] = 'application/json';
    }
    $default_options = [
      // 'curl' => [CURLOPT_SSLVERSION => CURL_SSLVERSION_SSLv3],
      // 'verify' => FALSE,
      'auth' => [
        $this->config['username'],
        $this->config['password']
      ],
      'format' => 'json',
    ];
    parent::__construct($config + $default_options);
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
   * The serializer to use.
   *
   * @return \Symfony\Component\Serializer\Serializer
   *   The serializer.
   */
  public function getSerializer() {
    if (!isset($this->serializer)) {
      $schema = new SwaggerSchema(dirname(__FILE__) . '/../swagger.json');
      $encoders = [new JsonEncoder()];
      $normalizers = [
        new ArrayDenormalizer(),
        (new SwaggerSchemaNormalizer(null, new CamelCaseToSnakeCaseNameConverter()))->setSwaggerSchema('drunomics\RetrescoClient\Model', $schema),
        new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter()),
      ];
      $this->serializer = new Serializer($normalizers, $encoders);
    }
    return $this->serializer;
  }

  /**
   * Puts the document on the server.
   *
   * @param \drunomics\RetrescoClient\Model\RetrescoDocument $document
   *   The Retresco document.
   * @param bool $enrich
   *   Enables semantic enrichment (default: true).
   * @param bool $inTextLinks
   *   Enables calculation of In-Text-Links, only available if $enrich = true.
   *   (default: false).
   * @param bool $index
   *   Index document (default: true).
   *
   * @return mixed|\Psr\Http\Message\ResponseInterface
   */
  public function putDocument(RetrescoDocument $document, $enrich = TRUE, $inTextLinks = FALSE, $index = TRUE) {
    $body = $this->getSerializer()->serialize($document, 'json');

    $header = array(
      'Content-Type' => 'application/json'
    );

    if ($enrich == FALSE) {
      $inTextLinks = FALSE; // dependency on enrich
    }

    $params = array(
      'enrich'        => (int) $enrich,
      'in_text_links' => (int) $inTextLinks,
      'index'         => (int) $index
    );

    $uri = "/api/documents/" . $document->getDocId() . "?" . http_build_query($params);

    $request = new Request('PUT', $uri, $header, $body);
    $response = $this->send($request);

    return $response;
  }

  /**
   * Gets the document for the given remote id.
   *
   * @param int $id
   *   The remote id of the document.
   *
   * @return \drunomics\RetrescoClient\Model\RetrescoDocument
   */
  public function getDocumentById($id) {
    $response = $this->get("/api/documents/$id");
    $data = $response->getBody()->getContents();

    /** @var RetrescoDocument $document */
    $document = $this->getSerializer()->deserialize($data, RetrescoDocument::class, 'json');

    return $document;
  }

  /**
   * Deletes the document.
   *
   * @param \drunomics\RetrescoClient\Model\RetrescoDocument $document
   *
   * @return \Psr\Http\Message\ResponseInterface
   */
  public function deleteDocument(RetrescoDocument $document) {
    $response = $this->deleteDocumentById($document->getDocId());
    return $response;
  }

  /**
   * Deletes the document for the given remote id.
   *
   * @param int $id
   *   The remote document id.
   *
   * @return \Psr\Http\Message\ResponseInterface
   */
  public function deleteDocumentById($id) {
    $response = $this->delete("/api/documents/$id");
    return $response;
  }
}
