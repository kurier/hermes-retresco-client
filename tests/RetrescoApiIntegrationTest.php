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
class RetrescoApiIntegrationTest extends \PHPUnit_Framework_TestCase {

  use Psr7AssertsTrait;

  /**
   * @var SchemaManager
   */
  protected static $schemaManager;

  /**
   * The REST service configuration as needed by RetrescoClient.
   *
   * @todo Make this configureable.
   *
   * @var mixed[]
   */
  protected static $config = [
    'base_uri' => 'https://kurier-stage01.rtrsupport.de',
    'username' => 'kurier',
    'password' => 'CHANGE-ME',
    'basePath' => '/api/documents',
    'documentPath' => '/api/documents',
  ];

  /**
   * Testfile used in this test.
   *
   * @see setUp()
   *
   * @var RetrescoDocument
   */
  protected $testDocument;

  /**
   * The configured Retresco client.
   *
   * @var \telekurier\RetrescoClient\RetrescoClient
   */
  protected static $retrescoClientCache;

  /**
   * The configured Retresco client.
   *
   * @var \telekurier\RetrescoClient\RetrescoClient
   */
  protected $retrescoClient;

  /**
   * {@inheritdoc}
   */
  public static function setUpBeforeClass() {
    $swagger_file = dirname(__FILE__) . '/../swagger.json';
    static::$schemaManager = new SchemaManager($swagger_file);
    static::$config['password'] = $_ENV['RETRESCO_PASSWORD'];
    static::$retrescoClientCache = RetrescoClient::create(static::$config);
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->retrescoClient = static::$retrescoClientCache;

    $testFile = dirname(__FILE__) . '/data/putFile01.yml';
    $this->testDocument = $this->createRetrescoDocumentFromFile($testFile);
    $this->testDocument->setDocId('test-' . floor(microtime(TRUE)));
  }

  protected function tearDown() {
    parent::tearDown();
    $this->deleteDocument($this->testDocument);
  }

  /**
   * Tests to put the document on the remote host.
   */
  public function testPutDocument() {
    $document = $this->testDocument;
    $response = $this->putDocument($document);

    $this->assertEquals(
      RetrescoClient::RESPONSE_CREATED, $response->getStatusCode(), "File couldn't be written. Unexpected status code."
    );

    // cleanup
    $this->deleteDocument($document);
  }

  /**
   * Tests if a document can be retreived with the RestrescoClient.
   *
   * Puts a document there first and then tries to retrieve it.
   */
  public function testGetDocument() {
    $putResponse = $this->putDocument($this->testDocument);
    $this->assertEquals(RetrescoClient::RESPONSE_CREATED, $putResponse->getStatusCode(), "File couldn't be written.");

    $document = NULL;
    try {
      $docId = $this->testDocument->getDocId();
      $document = $this->retrescoClient->getDocumentById($docId);
    } catch (ClientException $e) {
      $this->fail($e->getMessage());
    }

    $this->assertInstanceOf(RetrescoDocument::class, $document, 'Unexpected type.');
    $this->assertEquals(
      $this->testDocument->getDocId(), $document->getDocId(),
      "Document id from fetched document should equal the id of the put document."
    );

    // cleanup
    $this->deleteDocument($document);
  }

  /**
   * Tests the deletion of the document.
   *
   * Puts a new document there first, then deletes it and finally
   * tries to fetch it again to see if it is still there or not.
   */
  public function testDeleteDocument() {
    $putResponse = $this->putDocument($this->testDocument);
    $this->assertEquals(RetrescoClient::RESPONSE_CREATED, $putResponse->getStatusCode(), "File couldn't be written.");

    $deleteResponse = $this->retrescoClient->deleteDocument($this->testDocument);
    $this->assertEquals(RetrescoClient::RESPONSE_OK, $deleteResponse->getStatusCode(), 'File was not deleted.');

    $expectedException = NULL;
    try {
      $this->retrescoClient->getDocumentById($this->testDocument->getDocId());
    } catch (ClientException $e) {
      $expectedException = $e;
    }

    $this->assertNotNull($expectedException, '\GuzzleHttp\Exception\ClientException for file not found expected.');
    $this->assertEquals(
      RetrescoClient::RESPONSE_NOT_FOUND, $expectedException->getCode(), 'File not found exception expected.'
    );
  }

  /**
   * Creates a RetrescoDocument from a test file and puts it on the remote host.
   *
   * @param RetrescoDocument $document
   *  The test document.
   *
   * @return \Psr\Http\Message\ResponseInterface
   */
  protected function putDocument(RetrescoDocument $document) {
    $response = NULL;
    try {
      $response = $this->retrescoClient->putDocument($document);
    } catch (ClientException $e) {
      $this->fail($e->getMessage());
    }

    return $response;
  }

  /**
   * Deletes remote document.
   *
   * @param \telekurier\RetrescoClient\Model\RetrescoDocument $document
   */
  protected function deleteDocument(RetrescoDocument $document) {
    try {
      $this->retrescoClient->deleteDocument($document);
    } catch (\Exception $e) { /* ignore */
    }
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
      $content = Yaml::parse(file_get_contents($file));
      return $this->retrescoClient->getSerializer()->denormalize($content, RetrescoDocument::class);
    }

    return NULL;
  }
}
