<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient\Encoder;

use Symfony\Component\Serializer\Encoder\DecoderInterface;

class FieldDocumentEncoder implements DecoderInterface {

  const FORMAT = 'field_document';

  /**
   * {@inheritdoc}
   */
  public function decode($data, $format, array $context = []) {
    $object = new \stdClass();

    if (property_exists($data, '_source')) {
      /** @noinspection PhpUndefinedFieldInspection */
      $this->decodeWithNestedProperties($data->_source, $object);
    }
    elseif (property_exists($data, 'fields')) {
      /** @noinspection PhpUndefinedFieldInspection */
      $source = $data->fields;
      $this->decodeWithNestedProperties($source, $object);
    }

    if (property_exists($data, 'inner_hits')) {
      $object->innerHits = $data->inner_hits;
    }

    if (property_exists($data, '_score')) {
      $object->_score = $data->_score;
    }

    return $object;
  }

  protected function decodeWithNestedProperties($source, &$object) {
    foreach ($source as $fqField => $value) {
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
        }
        else {
          if (is_scalar($value)) {
            $o->{$property} = $value;
          }
          elseif (is_object($value)) {
            $o->{$property} = $value;
          }
          elseif (count($value) > 1) {
            $o->{$property} = $value;
          }
          elseif (is_array($value)) {
            $o->{$property} = array_shift($value);
          }
          else {
            $o->{$property} = $value;
          }
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function supportsDecoding($format) {
    return self::FORMAT === $format;
  }
}
