<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient\Normalizer;

/**
 *
 */
class ElasticSearchTotalResultNormalizer extends ElasticSearchRawResultNormalizer {

  /**
   * {@inheritdoc}
   */
  public function denormalize($data, $class, $format = NULL, array $context = []) {
    static::replaceTotalWithValue($data);
    return parent::denormalize($data, $class, $format, $context);
  }

  /**
   * Replaces total with actual value.
   *
   * @param array $array
   * @return void
   */
  public static function replaceTotalWithValue(array &$array) {
    foreach ($array as $key => &$value) {
      if ($key === 'total' && is_array($value) && isset($value['value'])) {
        $array['total'] = (int) $value['value'];
        continue;
      }
      if (is_array($value)) {
        static::replaceTotalWithValue($value);
      }
    }
  }

}
