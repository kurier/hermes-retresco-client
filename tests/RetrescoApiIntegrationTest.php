<?php

/**
 * @file
 * Contains \drunomics\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace drunomics\Retresco\Tests;

use drunomics\RetrescoClient\Model\RetrescoDocument;
use drunomics\RetrescoClient\RetrescoClient;
use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use FR3D\SwaggerAssertions\SchemaManager;
use GuzzleHttp\Exception\ClientException;
use Symfony\Component\Yaml\Yaml;

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
   * @var \drunomics\RetrescoClient\RetrescoClient
   */
  protected static $retrescoClientCache;

  /**
   * The configured Retresco client.
   *
   * @var \drunomics\RetrescoClient\RetrescoClient
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
    // Keep a shared Retresco-client instance, so it's middleware keeps a single
    // session up and we uploaded files kept in session can be re-used across
    // test methods, @see testCreateQuote().
    $this->retrescoClient = static::$retrescoClientCache;

    $testFile = dirname(__FILE__) . '/data/putFile01.json';
    $this->testDocument = $this->createRetrescoDocumentFromFile($testFile);

    // Initial delete for clean state.
    $this->deleteDocument($this->testDocument);
  }

  /**
   * Tests to put the document on the remote host.
   */
  public function testPutDocument() {
    $document = $this->testDocument;
    $response = $this->putDocument($document);

    $this->assertEquals(RetrescoClient::RESPONSE_CREATED, $response->getStatusCode(), "File couldn't be written. Unexpected status code.");

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

    if( $putResponse->getStatusCode() != RetrescoClient::RESPONSE_CREATED ) {
      $this->fail("Document couldn't be saved on remote location.");
    }

    $document = $this->retrescoClient->getDocumentById($this->testDocument->getDocId());

    $this->assertInstanceOf(RetrescoDocument::class, $document, 'Unexpected type.');
    $this->assertEquals($this->testDocument->getDocId(), $document->getDocId(), "Document id from fetched document should equal the id of the put document.");

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
    if( $putResponse->getStatusCode() != RetrescoClient::RESPONSE_CREATED ) {
      $this->fail("Document couldn't be created on remote host.");
    }

    $deleteResponse = $this->retrescoClient->deleteDocument($this->testDocument);
    $this->assertEquals(RetrescoClient::RESPONSE_OK, $deleteResponse->getStatusCode(), 'File was not deleted.');

    try {
      $this->retrescoClient->getDocumentById($this->testDocument->getDocId());
    }
    catch (\Exception $e) {
      $this->assertEquals(RetrescoClient::RESPONSE_NOT_FOUND, $e->getCode(), 'File not found exception expected.');
    }

    $this->assertInstanceOf(ClientException::class, $e, 'Guzzle\ClientException for file not found expected.');
  }

  /**
   * Creates a RetrescoDocument from a test file and puts it on the remote host.
   * 
   * @param RetrescoDocument $document
   *  The test document.
   *
   * @return mixed|\Psr\Http\Message\ResponseInterface
   */
  protected function putDocument(RetrescoDocument $document) {
    return $this->retrescoClient->putDocument($document);
  }

  /**
   * Deletes remote document.
   *
   * @param \drunomics\RetrescoClient\Model\RetrescoDocument $document
   */
  protected function deleteDocument(RetrescoDocument $document) {
    try {
      $this->retrescoClient->deleteDocument($document);
    }
    catch (\Exception $e) { /* ignore */ }
  }

  /**
   * Creates new RetrescoDocument from yaml file.
   *
   * @param String $file
   *   The yaml file to load into the RetrescoDocument.
   *
   * @return NULL|\drunomics\RetrescoClient\Model\RetrescoDocument
   */
  protected function createRetrescoDocumentFromFile($file) {
    if (is_readable($file)) {
      $content = Yaml::parse(file_get_contents($file));
      return $this->retrescoClient->getSerializer()->denormalize($content, RetrescoDocument::class);
    }

    return NULL;
  }
}
