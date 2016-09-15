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
class RetrescoApiIntegrationTest extends RetrescoClientTest  {

  /**
   * Tests to put the document on the remote host.
   */
  public function testFoo() {
    $document = $this->testDocument;
    $response = $this->putDocument($document);

    $this->assertEquals(
      RetrescoClient::RESPONSE_CREATED, $response->getStatusCode(), "File couldn't be written. Unexpected status code."
    );

    // cleanup
    $this->deleteDocument($document);
  }

}
