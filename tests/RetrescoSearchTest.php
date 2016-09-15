<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use telekurier\RetrescoClient\Model\RetrescoSearchQuery;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoApiIntegrationTest extends RetrescoClientTest {

  /**
   * Tests to put the document on the remote host.
   */
  public function testFoo() {
    $response = $this->retrescoClient->putDocument($this->testDocument);

    $query = new RetrescoSearchQuery();

    $query->setQ($this->testDocument->getTitle());

    $searchResult = $this->retrescoClient->search($query);

    $this->assertContains($response, $searchResult, "Document was not part of search result");
  }
}
