<?php

namespace telekurier\RetrescoClient\Encoder;

use Symfony\Component\Serializer\Encoder\DecoderInterface;

class FieldDocumentEncoder implements DecoderInterface {

  const FORMAT = 'field_document';

  /**
   * {@inheritdoc}
   */
  public function decode($data, $format, array $context = array()) {
    $object = new \stdClass();

    if (property_exists($data, 'fields')) {
      /** @noinspection PhpUndefinedFieldInspection */
      foreach ($data->fields as $field => $value) {
        if (isset($value[0])) {
          $object->{$field} = $value[0];
        }
      }
    }
    return $object;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsDecoding($format) {
    return self::FORMAT === $format;
  }
}
