<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use FR3D\SwaggerAssertions\SchemaManager;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\Yaml\Yaml;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
abstract class RetrescoClientTest extends \PHPUnit_Framework_TestCase {

  use Psr7AssertsTrait;

  /**
   * @var SchemaManager
   */
  protected static $schemaManager;

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
    $swagger_file = dirname(__FILE__) . '/../swagger.json';
    static::$schemaManager = new SchemaManager($swagger_file);

    $config = [
      'base_uri' => $_ENV['RETRESCO_BASE_URI'],
      'username' => $_ENV['RETRESCO_USERNAME'],
      'password' => $_ENV['RETRESCO_PASSWORD'],
    ];

    self::$retrescoClient = RetrescoClient::create($config);
  }

  protected function setUp() {
    $testFile = dirname(__FILE__) . '/data/putFile01.yml';
    $this->testDocument = $this->createRetrescoDocumentFromFile($testFile);
    $this->testDocument->setDocId('test-' . floor(microtime(TRUE)));
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
      $content = Yaml::parse(file_get_contents($file), FALSE, TRUE, TRUE);
      $serializer = self::$retrescoClient->getSerializer();
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
