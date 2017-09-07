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

  const COUNT_DOC_TYPES = 'countDocTypes';

  const SINCE_ID_AGG = 'since_id_agg';

  const SIGNIFICANT_TAG_TERMS = 'significant_tag_terms';

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

  public function testMaxAggregationHasValue() {

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
        self::SINCE_ID_AGG => [
          'max' => [
            'field' => 'payload.remote_id',
          ],
        ],

      ],
    ];

    try {
      $aggregations = self::$retrescoClient->poolSearchAggregations($query);
      /** @var \telekurier\RetrescoClient\Model\ElasticSearchAggregation $agg */
      $agg = reset($aggregations);
      $actualAggName = key($aggregations);
      $this->assertEquals(self::SINCE_ID_AGG, $actualAggName);
      $max = $agg->getValue();
      $this->assertNotEmpty($max);
    }
    catch (ClientException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testNestedAggregations() {

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
        self::SIGNIFICANT_TAG_TERMS => [
          'significant_terms' => [
            'field' => 'rtr_tags',
            'size' => 1,
          ],
          'aggregations' => [
            self::COUNT_DOC_TYPES => [
              'terms' => [
                'field' => 'doc_type',
              ],
            ],
          ],
        ],

      ],
    ];

    try {
      $aggregations = self::$retrescoClient->poolSearchAggregations($query);
      /** @var \telekurier\RetrescoClient\Model\ElasticSearchAggregation $topAgg */
      $topAgg = reset($aggregations);
      $actualAggName = key($aggregations);
      $this->assertEquals(self::SIGNIFICANT_TAG_TERMS, $actualAggName);

      $sigTermsBuckets = $topAgg->getBuckets();
      $topSigTermBucket = reset($sigTermsBuckets);

      $docTypesBuckets = $topSigTermBucket->{self::COUNT_DOC_TYPES}->buckets;

      $this->assertNotEmpty($docTypesBuckets);

      $firstDocTypeBucket = reset($docTypesBuckets);

      $this->assertNotEmpty($firstDocTypeBucket->key, 'Count bucket has no property named "key"');
      $this->assertNotEmpty($firstDocTypeBucket->doc_count, 'Count bucket has no property named "doc_count"');
    }
    catch (ClientException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testSigTermsAggregationHasBuckets() {

    $sigTermsSize = 5;
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
        self::SINCE_ID_AGG => [
          'significant_terms' => [
            'field' => 'rtr_tags',
            'size' => $sigTermsSize,
          ],
        ],

      ],
    ];

    try {
      $aggregations = self::$retrescoClient->poolSearchAggregations($query);
      /** @var \telekurier\RetrescoClient\Model\ElasticSearchAggregation $agg */
      $agg = reset($aggregations);
      $actualAggName = key($aggregations);
      $this->assertEquals(self::SINCE_ID_AGG, $actualAggName);
      $buckets = $agg->getBuckets();
      $this->assertEquals($sigTermsSize, count($buckets));
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
