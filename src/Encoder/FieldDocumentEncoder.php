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
          if (substr($property, 0, 4) == 'rtr_') {
            $o->{$property} = $value;
          } else if (count($value) > 1) {
            $o->{$property} = $value;
          } else {
            $o->{$property} = array_shift($value);
          }
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