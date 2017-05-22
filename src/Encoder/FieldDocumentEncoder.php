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
      foreach ($data->fields as $fqField => $value) {
        if (isset($value)) {
          $localfields = explode('.', $fqField);
          $property = array_pop($localfields);
          $o = &$object;

          while ($localfield = array_shift($localfields)) {
            if (!property_exists($o, $localfield)) {
              $o->{$localfield} = new \stdClass();
            }
            $o = &$o->{$localfield};
          }
          $o->{$property} = count($value) == 1 ? array_shift($value) : $value;
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
