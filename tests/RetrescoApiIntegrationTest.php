<?php

/**
 * @file
 * Contains \drunomics\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace drunomics\Retresco\Tests;

use drunomics\RetrescoClient\RetrescoClient;
use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use FR3D\SwaggerAssertions\SchemaManager;
use SebastianBergmann\RecursionContext\Exception;

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
   *
   */
  const TEST_DOC_ID = 'test-57442494dc081';

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
    // @todo: Assert request and response matches via client middleware.
    // $this->assertResponseAndRequestMatch($response, $request, self::$schemaManager);
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
    $this->deleteFile();
  }

  /**
   *
   */
  public function testGetFile() {
    $putResponse = $this->putFile();

    if( $putResponse->getStatusCode() != RetrescoClient::RESPONSE_CREATED ) {
      $this->fail("File couldn't be saved on remote location.");
    }

    $response = $this->retrescoClient->getFile(self::TEST_DOC_ID);
    $this->assertNotEmpty($response);

    $this->assertEquals(RetrescoClient::RESPONSE_OK, $response->getStatusCode(), "File couldn't be fetched.");
  }

  /**
   *
   */
  public function testPutFile() {
    $response = $this->putFile();
    $this->assertEquals(RetrescoClient::RESPONSE_CREATED, $response->getStatusCode(), "File couldn't be written");
  }

  /**
   *
   */
  public function testDeleteFile() {
    $putResponse = $this->putFile();

    if( $putResponse->getStatusCode() == RetrescoClient::RESPONSE_OK ) {
      $this->fail("File couldn't be saved on remote location.");
    }

    $deleteResponse = $this->retrescoClient->deleteFile(self::TEST_DOC_ID);

    $this->assertEquals(RetrescoClient::RESPONSE_OK, $deleteResponse->getStatusCode(), 'File was not deleted.');

    try {
      $getResponse = $this->retrescoClient->getFile(self::TEST_DOC_ID);
    } catch( \Exception $e ) {}

    if( $e instanceof \Exception ) {
      $this->assertEquals(RetrescoClient::RESPONSE_NOT_FOUND, $e->getCode(), 'File still exists on remote location, but should be delete.');
    } else {
      $this->fail('File still exists on remote location, but should be deleted.');
    }
  }

  /**
   * @return mixed|\Psr\Http\Message\ResponseInterface
   */
  public function putFile() {
    $file = dirname(__FILE__) . '/data/putFile01.ini';

    $content = parse_ini_file($file);
    $content['doc_id'] = self::TEST_DOC_ID;

    $response = $this->retrescoClient->putFile(self::TEST_DOC_ID, $content);
    $this->assertNotEmpty($response);

    return $response;
  }

  /**
   *
   */
  public function deleteFile() {
    try {
      $this->retrescoClient->deleteFile(self::TEST_DOC_ID);
    } catch( \Exception $e ) {}
  }
}
