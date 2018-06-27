<?php

declare(strict_types=1);

namespace telekurier\Retresco\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use telekurier\RetrescoClient\Model\Location;
use telekurier\RetrescoClient\Model\Pin;
use telekurier\RetrescoClient\Model\RetrescoDocument;
use telekurier\RetrescoClient\Normalizer\LocationNormalizer;
use telekurier\RetrescoClient\Normalizer\PinNormalizer;
use telekurier\RetrescoClient\Normalizer\RetrescoDocumentNormalizer;

/**
 * Tests for the Retresco client.
 */
class RetrescoNormalizerTest extends TestCase {

  /**
   * @var RetrescoDocumentNormalizer
   */
  protected $normalizer;

  /**
   * @var Serializer
   */
  protected $serializer;

  /**
   * @var RetrescoDocument
   */
  protected $document;

  /**
   * Tests normalization of ID field
   */
  public function testNormalizeId() {
    $this->document->setDocId('123');
    $obj = $this->normalizer->normalize($this->document);
    self::assertEquals(123, $obj->doc_id);
  }

  /**
   * Tests normalization of payload field
   */
  public function testNormalizePayload() {
    $payload = ['foo' => 'bar'];
    $this->document->setPayload($payload);
    $obj = $this->normalizer->normalize($this->document);
    self::assertEquals($payload, $obj->payload);
  }

  /**
   * Tests normalization of PIN
   */
  public function testNormalizePin() {
    $location = new Location();
    $location->setLat(-1);
    $location->setLon(1);
    $pin = new Pin();
    $pin->setLocation($location);
    $this->document->setPin($pin);

    $normalizedPin = new \stdClass();
    $normalizedPin->location = new \stdClass();
    $normalizedPin->location->lat = -1;
    $normalizedPin->location->lon = 1;

    $obj = $this->normalizer->normalize($this->document);
    self::assertEquals($normalizedPin, $obj->pin);
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() {

    $retrescoDocumentNormalizer = new RetrescoDocumentNormalizer();

    $encoders = [new JsonEncoder()];
    $normalizers = [
      $retrescoDocumentNormalizer,
      new PinNormalizer(),
      new LocationNormalizer(),
    ];

    $this->serializer = new Serializer($normalizers, $encoders);

    $this->normalizer = $retrescoDocumentNormalizer;

    $this->document = new RetrescoDocument();
    parent::setUp();
  }
}
