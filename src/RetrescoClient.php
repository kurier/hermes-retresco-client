<?php

/**
 * @file
 * Contains \drunomics\RetrescoClient\RetrescoClient
 */

namespace drunomics\RetrescoClient;

use drunomics\RetrescoClient\Normalizer\SwaggerSchemaNormalizer;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Retresco REST client class.
 */
class RetrescoClient extends Client {

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
   * Creates an Retresco client instance with pre-configured middleware.
   *
   * The pre-configured middleware takes care of authentication and logging.
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

    // $middleware = new AuthenticationMiddleware($client);
    // $stack->push($middleware);
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
   * @return \Symfony\Component\Serializer\SerializerInterface
   *   The serializer.
   */
  public function getSerializer() {
    if (!isset($this->serializer)) {
      $schema = new SwaggerSchema(dirname(__FILE__) . '/../swagger.json');
      $encoders = [new JsonEncoder()];
      $normalizers = [
        new ArrayDenormalizer(),
        (new SwaggerSchemaNormalizer())->setSwaggerSchema('drunomics\RetrescoClient\Model', $schema),
        new ObjectNormalizer(),
      ];
      $this->serializer = new Serializer($normalizers, $encoders);
    }
    return $this->serializer;
  }

  public function putFile($id, $content = array()) {
    $body = $this->getSerializer()->serialize($content, 'json');

    $request = new Request('PUT', "/api/documents/$id", ['Content-Type', 'application/json'], json_encode($content));
    $response = $this->send($request);
    // $response = $this->put("/api/documents/$id", $data);

    $json = $response->getBody()->getContents();

    return $json;
  }

  public function getFile($id) {
    $response = $this->get("/api/documents/$id");
    return $response;
  }

  public function deleteFile($id) {
    $response = $this->delete("/api/documents/$id");
    return $response;
  }
}
