<?php

declare(strict_types=1);

namespace telekurier\Retresco\Tests;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use telekurier\RetrescoClient\Model\RetrescoDocument;

/**
 * Tests for the Retresco client.
 */
class RetrescoClientImplCrudTest extends RetrescoClientImplTest {

  /**
   * Tests to put the document on the remote host.
   */
  public function testPutDocument() {
    $response = NULL;
    try {
      $response = self::$retrescoClient->putDocument($this->testDocument);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }

    self::assertEquals(
      self::RESPONSE_CREATED, $response->getStatusCode(), "File couldn't be written. Unexpected status code."
    );

  }

  /**
   * Tests if a document can be retreived with the RestrescoClient.
   *
   * Puts a document there first and then tries to retrieve it.
   */
  public function testGetDocument() {
    try {
      $putResponse = self::$retrescoClient->putDocument($this->testDocument);
      self::assertEquals(self::RESPONSE_CREATED, $putResponse->getStatusCode(), "File couldn't be written.");
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }

    $document = NULL;
    try {
      $docId = $this->testDocument->getDocId();
      $document = self::$retrescoClient->getDocumentById($docId);
    }
    catch (ClientException $e) {
      $this->fail($e->getMessage());
    }

    $this->assertInstanceOf(RetrescoDocument::class, $document, 'Unexpected type.');
    self::assertTrue(is_bool($document->getPublished()));
    self::assertEquals(
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
    try {
      $putResponse = self::$retrescoClient->putDocument($this->testDocument);
      self::assertEquals(self::RESPONSE_CREATED, $putResponse->getStatusCode(), "File couldn't be written.");
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }

    $deleteResponse = self::$retrescoClient->deleteDocument($this->testDocument);

    self::assertEquals(self::RESPONSE_OK, $deleteResponse->getStatusCode(), 'File was not deleted.');

    $expectedException = NULL;
    try {
      self::$retrescoClient->getDocumentById($this->testDocument->getDocId());
    }
    catch (ClientException $e) {
      $expectedException = $e;
    }

    $this->assertNotNull($expectedException, '\GuzzleHttp\Exception\ClientException for file not found expected.');
    self::assertEquals(
      self::RESPONSE_NOT_FOUND, $expectedException->getCode(), 'File not found exception expected.'
    );
  }

}
