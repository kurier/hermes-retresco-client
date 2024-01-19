<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerAwareTrait;

/**
 *
 */
class ElasticSearchResultWithDocumentHitsNormalizer implements DenormalizerInterface, SerializerAwareInterface {

  use SerializerAwareTrait;

  /**
   * {@inheritdoc}
   */
  public function denormalize($data,
                              $class,
                              $format = NULL,
                              array $context = []) {
    $hits = $data['hits'] ?? [];
    unset($data['hits']);

    // Denormalize ElasticSearchResult without hits using generated ElasticSearchResultNormalizer

    /** @var \telekurier\RetrescoClient\Model\ElasticSearchResult $object */
    $object = $this->serializer->denormalize($data, $class, 'raw', $context);

    // Append hits as RetrescoDocument
    $documents = [];
    foreach ($hits as $hit) {
      $mappedHit = $this->mapDocument($hit);
      $documents[] = $this->serializer->denormalize($mappedHit, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', NULL, $context);
    }
    $object->setHits($documents);
    return $object;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsDenormalization($data, $type, $format = NULL) {
    return $type === 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult' && !empty($data['hits']);
  }

  /**
   * @param array $data
   *
   * @return array
   */
  public function mapDocument(array $data) : array {
    $result = [];
    $source = [];

    if (isset($data['_source'])) {
      $source = $data['_source'];
    }
    elseif (isset($data['fields'])) {
      $source = $data['fields'];
    }

    if (is_array($source)) {
      foreach ($source as $field => $value) {
        if (isset($value)) {
          $result[$field] = $this->mapNestedObject($field, $value);
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
   * @param $field
   * @param $value
   *
   * @return array|bool|float|int|mixed|string|null
   */
  protected function mapNestedObject($field, $value) {
    if (is_array($value)) {
      return json_decode(json_encode($value));
    }

    if (substr($field, 0, 4) == 'rtr_') {
      return $value;
    }
    else {
      if (
        is_scalar($value)
        || is_object($value)
        || count($value) > 1
      ) {
        return $value;
      }
      elseif (is_array($value)) {
        return array_shift($value);
      }
      else {
        return $value;
      }
    }
  }

}
