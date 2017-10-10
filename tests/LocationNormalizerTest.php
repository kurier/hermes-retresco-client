<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use PHPUnit\Framework\TestCase;
use telekurier\RetrescoClient\Model\Location;
use telekurier\RetrescoClient\Normalizer\LocationNormalizer;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class LocationNormalizerTest extends TestCase {

  const LAT = 12.318079;

  const LON = -69.150537;

  use Psr7AssertsTrait;

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
    $this->assertEquals(self::LAT, $obj->lat);
  }

  public function testNormalizeLon() {
    $this->location->setLon(self::LON);
    $obj = $this->normalizer->normalize($this->location);
    $this->assertEquals(self::LON, $obj->lon);
  }
}
