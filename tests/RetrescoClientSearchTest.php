<?php

declare(strict_types=1);

namespace telekurier\Retresco\Tests;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use telekurier\RetrescoClient\Model\RetrescoDocuments;
use telekurier\RetrescoClient\Model\RetrescoTopicPages;

/**
 * Tests for the Retresco client.
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
        'rtr_tags',
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
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }

    $hits = $result->getHits();
    self::assertEquals(count($hits), $size);

    foreach ($hits as $hit) {
      $this->assertNotEmpty($hit->getDocId());
    }
  }

  public function testSearchSourceReturnsTypedDocument() {

    $size = 1;

    $query = [
      'fields' => [
        '_source',
      ],
      'size' => $size,
    ];

    $result = NULL;
    try {
      $result = self::$retrescoClient->poolSearchResult($query);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }

    $hits = $result->getHits();
    self::assertEquals(count($hits), $size);

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
                'doc_type' => 'article',
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
      self::assertEquals(self::SINCE_ID_AGG, $actualAggName);
      $max = $agg->getValue();
      $this->assertNotEmpty($max);
    }
    catch (ClientException $e) {
      $this->fail($e->getMessage());
    }
    catch (GuzzleException $e) {
    }
  }

  public function testSigTermsAggregationHasBuckets() {

    $sigTermsSize = 1;
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
      self::assertEquals(self::SINCE_ID_AGG, $actualAggName);
      $docCountIsInt = is_int($agg->getDocCount());
      $this->assertTrue($docCountIsInt);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testGetTopicPage() {
    try {
      $topicPage = self::$retrescoClient->getTopicPage('ivanka-trump');
      self::assertNotEmpty($topicPage);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testRelated() {
    try {
      self::$retrescoClient->putDocument($this->testDocument);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
    $doc_types = 'article,article';
    $doc_id = $this->testDocument->getDocId();
    /** @var \telekurier\RetrescoClient\Model\RetrescoDocuments $relateds */
    $relateds = self::$retrescoClient->getRelatedDocuments($doc_id, $doc_types);

    $this->assertTrue($relateds instanceof RetrescoDocuments);
  }

  public function testGetTopicPageDocuments() {
    try {
      $docs = self::$retrescoClient->getTopicPageDocuments('ivanka-trump', 1, 1, 'date');
      $this->assertTrue($docs instanceof RetrescoDocuments);
      self::assertNotEmpty($docs);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testSearchTopicPage() {
    try {
      $topicPages = self::$retrescoClient->searchTopicPages('*');
      self::assertTrue($topicPages instanceof RetrescoTopicPages);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testRelatedTopicPage() {
    try {
      $topicPages = self::$retrescoClient->relatedTopicPages('ivanka-trump');
      self::assertNotEmpty($topicPages);
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
  }

  public function testSearchResultPublishedIsString() {
    $size = 1;

    $query = [
      'fields' => [
        'published',
      ],
      'size' => $size,
    ];

    $result = NULL;
    try {
      $result = self::$retrescoClient->poolSearchResult($query);
      $count = count($result->getHits());
      self::assertEquals($size, $count);
      /** @var \telekurier\RetrescoClient\Model\RetrescoDocument $doc */
      $doc = reset($result->getHits());
      $published = $doc->getPublished();
      self::assertTrue(is_string($published));
    }
    catch (GuzzleException $e) {
      $this->fail($e->getMessage());
    }
  }


}
