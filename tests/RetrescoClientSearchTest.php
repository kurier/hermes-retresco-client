<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use GuzzleHttp\Exception\ClientException;
use telekurier\RetrescoClient\Model\RetrescoTopicPages;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoClientSearchTest extends RetrescoClientTest {

  public function testSearchReturnsResultWithHits() {

    $size = 10;

    $query = [
      'fields' => [
        'payload.rss2.title',
        'payload.rss2.description',
        'payload.rss2.guid',
        'payload.rss2.link',
        'payload.rss2.author',
        'payload.rss2.pubDate',
        'payload.rss2.category',
        'payload.rss2.enclosure',
        'payload.rss2.media:content',
        'payload.rss2.dcterms:abstract',
        'payload.rss2.dcterms:modified',
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
      $result = self::$retrescoClient->poolSearchResult($query);
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

  public function testSearchWithAggregation() {

    $query = [
      'size' => 0,
      'query' => [
        'bool' => [
          'filter' => [
            [
              'term' => [
                'doc_type' => 'twitter',
              ],
            ],
          ],
        ],
      ],
      'aggregations' => [
        'since_id' => [
          'max' => [
            'field' => 'payload.remote_id',
          ],
        ],

      ],
    ];

    try {
      $aggregations = self::$retrescoClient->poolAggregations($query);
      $this->assertNotEmpty($aggregations);
    }
    catch (ClientException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testGetTopicPage() {
    $topicPage = self::$retrescoClient->getTopicPage('ivanka-trump');
    self::assertNotEmpty($topicPage);
  }

  public function testSearchTopicPage() {
    $topicPages = self::$retrescoClient->searchTopicPages('*');
    self::assertTrue($topicPages instanceof RetrescoTopicPages);
  }

  public function testRelatedTopicPage() {
    $topicPages = self::$retrescoClient->relatedTopicPages('ivanka-trump');
    self::assertNotEmpty($topicPages);
  }

}
