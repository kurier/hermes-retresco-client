<?php

declare(strict_types=1);

namespace telekurier\Retresco\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\RetrescoClientImpl;

/**
 * Tests for the Retresco client.
 */
abstract class RetrescoClientImplTest extends TestCase {

  const RESPONSE_OK = '200';

  const RESPONSE_CREATED = '201';

  const RESPONSE_NOT_FOUND = '404';

  /**
   * The configured Retresco client.
   *
   * @var \telekurier\RetrescoClient\RetrescoClient
   */
  protected static $retrescoClient;

  /**
   * Testfile used in this test.
   *
   * @see setUp()
   *
   * @var RetrescoDocument
   */
  protected $testDocument;

  /**
   * {@inheritdoc}
   */
  public static function setUpBeforeClass() {
    $clientConfig = [
      'base_uri' => $_ENV['RETRESCO_BASE_URI'],
      'auth' => [
        $_ENV['RETRESCO_USERNAME'],
        $_ENV['RETRESCO_PASSWORD'],
      ],
    ];
    $stack = HandlerStack::create();
    $config['handler'] = $stack;
    $client = new Client($clientConfig);
    self::$retrescoClient = new RetrescoClientImpl($client);
  }

  protected function setUp() {
    $testFile = dirname(__FILE__) . '/data/putFile01.yml';
    $this->testDocument = $this->createRetrescoDocumentFromFile($testFile);
    $testDocid = 'test-' . floor(microtime(TRUE));
    $this->testDocument->setDocId($testDocid);
  }

  /**
   * Creates new RetrescoDocument from yaml file.
   *
   * @param String $file
   *   The yaml file to load into the RetrescoDocument.
   *
   * @return NULL|\telekurier\RetrescoClient\Model\RetrescoDocument
   */
  protected function createRetrescoDocumentFromFile($file) {
    if (is_readable($file)) {
      $content = Yaml::parseFile($file, Yaml::PARSE_OBJECT_FOR_MAP);
      /** @var \telekurier\RetrescoClient\RetrescoClientImpl $client */
      $client = self::$retrescoClient;
      $serializer = $client->getSerializer();
      /** @noinspection PhpIncompatibleReturnTypeInspection */
      return $serializer->denormalize($content, RetrescoDocument::class);
    }

    return NULL;
  }

  protected function tearDown() {
    try {
      self::$retrescoClient->deleteDocument($this->testDocument);
    }
    catch (ClientException $e) {
    }
    parent::tearDown();
  }

}
