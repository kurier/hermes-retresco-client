<?php

/**
 * @file
 * Contains \drunomics\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace drunomics\Retresco\Tests;

use drunomics\RetrescoClient\RetrescoClient;
use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use FR3D\SwaggerAssertions\SchemaManager;

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

    static::$retrescoClientCache = RetrescoClient::create(static::$config);
    // @todo: Assert request and repsonse matches via client middleware.
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
  }

  public function testGetFile() {
    $fileId = "1";
    $response = $this->retrescoClient->getFile($fileId);
    $this->assertNotEmpty($response);
  }

  public function testPutFile() {
    $file = dirname(__FILE__) . '/data/putFile01.ini';
    $id = '57442494dc081';

    $content = parse_ini_file($file);
    $response = $this->retrescoClient->putFile($id, $content);
    $this->assertNotEmpty($response);
  }

  public function testDeleteFile() {

  }
}
