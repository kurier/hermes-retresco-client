<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\Normalizer\RetrescoDocumentNormalizer;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoNormalizerTest extends \PHPUnit_Framework_TestCase {

  use Psr7AssertsTrait;

  /**
   * @var RetrescoDocumentNormalizer
   */
  protected $normalizer;

  /**
   * @var RetrescoDocument
   */
  protected $document;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->normalizer = new RetrescoDocumentNormalizer();
    $this->document = new RetrescoDocument();
    parent::setUp();
  }

  /**
   * Tests normalization of ID field
   */
  public function testNormalizeId() {
    $this->document->setDocId(123);
    $obj = $this->normalizer->normalize($this->document);
    $this->assertEquals(123, $obj->doc_id);
  }

  /**
   * Tests normalization of payload field
   */
  public function testNormalizePayload() {
    $payload = ['foo' => 'bar'];
    $this->document->setPayload($payload);
    $obj = $this->normalizer->normalize($this->document);
    $this->assertEquals($payload, $obj->payload);
  }
}
