<?php

declare(strict_types=1);

namespace telekurier\RetrescoClient\Encoder;

use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;

/**
 * Encoder with no encoding (keeps the same output as the input)
 *
 * @see namespace Joli\Jane\Runtime\Encoder
 */
class RawEncoder implements DecoderInterface, EncoderInterface {

  const FORMAT = 'raw';

  /**
   * {@inheritdoc}
   */
  public function decode($data, $format, array $context = []) {
    return $data;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsDecoding($format) {
    return self::FORMAT === $format;
  }

  /**
   * {@inheritdoc}
   */
  public function encode($data, $format, array $context = []) {
    return $data;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsEncoding($format) {
    return self::FORMAT === $format;
  }

}
