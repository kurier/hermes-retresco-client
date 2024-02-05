<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient\Normalizer;

/**
 *
 */
class RetrescoDocumentObjectNormalizer extends RetrescoDocumentNormalizer {

  /**
   * {@inheritdoc}
   */
  public function denormalize($data, $class, $format = null, array $context = array()) {
    $data = static::mapData($data);
    return parent::denormalize($data, $class, $format, $context);
  }

  /**
   * @param array $data
   *
   * @return array
   */
  public static function mapData(array $data) : array {
    $result = [];
    $source = [];

    if (isset($data['_source'])) {
      $source = $data['_source'];
    }
    elseif (isset($data['fields'])) {
      $source = $data['fields'];
    }
    else {
      $source = $data;
    }

    if (is_array($source)) {
      foreach ($source as $field => $value) {
        if (isset($value)) {
          $result[$field] = static::mapNestedObjects($value);
        }
      }
    }

    if (isset($data['inner_hits'])) {
      $result['inner_hits'] = $data['inner_hits'];
    }

    if (isset($data['_score'])) {
      $result['_score'] = $data['_score'];
    }

    return $result;
  }

  /**
   * @param mixed $value
   *
   * @return array|bool|float|int|mixed|string|null
   */
  protected static function mapNestedObjects($value) {
    if (is_array($value)) {
      return json_decode(json_encode($value));
    }

    return $value;
  }

}
