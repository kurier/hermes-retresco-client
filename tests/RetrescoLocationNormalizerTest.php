<?php

/**
 * @file
 * Contains \telekurier\Retresco\Tests\RetrescoApiIntegrationTest.
 */

namespace telekurier\Retresco\Tests;

use FR3D\SwaggerAssertions\PhpUnit\Psr7AssertsTrait;
use telekurier\RetrescoClient\Model\Location;
use telekurier\RetrescoClient\Normalizer\LocationNormalizer;
use telekurier\RetrescoClient\RetrescoClient;

/**
 * Tests for the Retresco client.
 *
 * @covers RetrescoClient
 */
class RetrescoLocationNormalizerTest extends \PHPUnit_Framework_TestCase {

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
    $this->location->setLat(-1);
    $obj = $this->normalizer->normalize($this->location);
    $this->assertEquals(-1, $obj->lat);
  }

  public function testNormalizeLon() {
    $this->location->setLon(1);
    $obj = $this->normalizer->normalize($this->location);
    $this->assertEquals(1, $obj->lon);
  }
}
