<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use GuzzleHttp\Exception\ClientException;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoClientSearchTest extends RetrescoClientTest {

  public function testSearchDocuments() {

    $size = 1;

    $query = [
      'fields' => ['doc_id', 'title'],
      'size' => $size,
    ];

    $result = NULL;
    try {
      $result = $this->retrescoClient->poolSearch($query);
    }
    catch (ClientException $e) {
      $this->fail($e->getMessage());
    }

    $hits = $result->getHits();
    $this->assertEquals(count($hits), $size);

    foreach ($hits as $hit) {
      $this->assertNotEmpty($hit->getDocId());
    }
  }
}
