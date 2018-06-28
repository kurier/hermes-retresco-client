<?php

namespace telekurier\Retresco\Tests;

use PHPUnit\Framework\TestCase;
use telekurier\RetrescoClient\Encoder\RawEncoder;

class RawEncoderTest extends TestCase {

  /**
   * @var \telekurier\RetrescoClient\Encoder\RawEncoder
   */
  protected $encoder;

  protected function setUp() {
    $this->encoder = new RawEncoder();
    parent::setUp();
  }

  public function testSupportRawsEncoding() {
    $supportRawsEncoding = $this->encoder->supportsEncoding('raw');
    self::assertTrue($supportRawsEncoding);
  }

  public function testSupportsRawDecoding() {
    $supportRawsDecoding = $this->encoder->supportsDecoding('raw');
    self::assertTrue($supportRawsDecoding);
  }

  public function testDecodeReturnsSame() {
    $data = 'some-data';
    $format = 'any';
    $decoded = $this->encoder->decode($data, $format);
    self::assertSame($data, $decoded);
  }

  public function testEncodeReturnsSame() {
    $data = 'some-data';
    $format = 'any';
    $encoded = $this->encoder->encode($data, $format);
    self::assertSame($data, $encoded);
  }
}
