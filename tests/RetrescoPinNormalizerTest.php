<?php

declare(strict_types=1);

namespace telekurier\Retresco\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use telekurier\RetrescoClient\Model\Location;
use telekurier\RetrescoClient\Model\Pin;
use telekurier\RetrescoClient\Normalizer\LocationNormalizer;
use telekurier\RetrescoClient\Normalizer\PinNormalizer;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoPinNormalizerTest extends TestCase {

  const LAT = 7.829219;

  const LON = 98.952227;

  /**
   * @var LocationNormalizer
   */
  protected $normalizer;

  /**
   * @var Serializer
   */
  protected $serializer;

  /**
   * @var Pin
   */
  protected $pin;

  /**
   * @var Location
   */
  protected $location;

  public function testNormalizeLocation() {
    $obj = $this->normalizer->normalize($this->pin);

    $normalizedLocation = new \stdClass();
    $normalizedLocation->lat = self::LAT;
    $normalizedLocation->lon = self::LON;

    self::assertEquals($normalizedLocation, $obj->location);
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->normalizer = new PinNormalizer();

    $encoders = [new JsonEncoder()];
    $normalizers = [
      $this->normalizer,
      new LocationNormalizer(),
    ];

    $this->serializer = new Serializer($normalizers, $encoders);

    $this->pin = new Pin();
    $this->location = new Location();
    $this->location->setLat(self::LAT);
    $this->location->setLon(self::LON);
    $this->pin->setLocation($this->location);

    parent::setUp();
  }
}
