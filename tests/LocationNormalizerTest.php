<?php

declare(strict_types = 1);

namespace telekurier\Retresco\Tests;

use PHPUnit\Framework\TestCase;
use telekurier\RetrescoClient\Model\Location;
use telekurier\RetrescoClient\Normalizer\LocationNormalizer;

/**
 * Tests for the Retresco client.
 */
class LocationNormalizerTest extends TestCase {

  const LAT = 12.318079;

  const LON = -69.150537;

  /**
   * @var LocationNormalizer
   */
  protected $normalizer;

  /**
   * @var Location
   */
  protected $location;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    $this->normalizer = new LocationNormalizer();
    $this->location = new Location();
    parent::setUp();
  }

  public function testNormalizeLat() {
    $this->location->setLat(self::LAT);
    $obj = $this->normalizer->normalize($this->location);
    self::assertEquals(self::LAT, $obj->lat);
  }

  public function testNormalizeLon() {
    $this->location->setLon(self::LON);
    $obj = $this->normalizer->normalize($this->location);
    self::assertEquals(self::LON, $obj->lon);
  }
}
