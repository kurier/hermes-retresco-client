<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use GuzzleHttp\Exception\ClientException;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoClientCrudTest extends RetrescoClientTest {

  /**
   * Tests to put the document on the remote host.
   */
  public function testPutDocument() {
    $response = NULL;
    try {
      $response = $this->retrescoClient->putDocument($this->testDocument);
    } catch (ClientException $e) {
      $this->fail($e->getMessage());
    }

    $this->assertEquals(
      RetrescoClient::RESPONSE_CREATED, $response->getStatusCode(), "File couldn't be written. Unexpected status code."
    );
  }

  /**
   * Tests if a document can be retreived with the RestrescoClient.
   *
   * Puts a document there first and then tries to retrieve it.
   */
  public function testGetDocument() {
    $putResponse = $this->retrescoClient->putDocument($this->testDocument);
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
  }

  /**
   * Tests the deletion of the document.
   *
   * Puts a new document there first, then deletes it and finally
   * tries to fetch it again to see if it is still there or not.
   */
  public function testDeleteDocument() {
    $putResponse = $this->retrescoClient->putDocument($this->testDocument);
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
}
