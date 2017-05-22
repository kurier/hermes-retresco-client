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
      'fields' => [
        'comments_count',
        'doc_id',
        'doc_type',
        'payload.channel.id',
        'rtr_persons',
        'payload.channel.name',
        'payload.channel.section',
        'payload.channel.source',
        'payload.channel.url',
        'payload.teaser_img.alt',
        'payload.teaser_img.url',
        'pi_last_72h',
        'pretitle',
        'published_date',
        'section',
        'source',
        'teaser',
        'title',
        'url',
      ],
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
