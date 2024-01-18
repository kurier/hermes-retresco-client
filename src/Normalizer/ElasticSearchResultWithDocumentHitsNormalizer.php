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
    $data['total'] = is_array($data['total']) && !empty($data["total"]["value"]) ? $data["total"]["value"] : $data['total'];

    // Denormalize ElasticSearchResult without hits using generated ElasticSearchResultNormalizer

    /** @var \telekurier\RetrescoClient\Model\ElasticSearchResult $object */
    $object = $this->serializer->denormalize($data, $class, 'raw', $context);

    // Append hits as RetrescoDocument
    $documents = [];
    foreach ($hits as $hit) {
      $mappedHit = $this->mapHit($hit);
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
  public function mapHit(array $data) : array {
    $result = [];

    if (isset($data['_source'])) {
      $this->mapNestedArray($data['_source'], $result);
    }
    elseif (isset($data['fields'])) {
      $source = $data['fields'];
      $this->mapNestedArray($source, $result);
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
   * @param $source
   * @param $array
   *
   * @return void
   */
  protected function mapNestedArray($source, &$array) {
    foreach ($source as $fqField => $value) {
      if (isset($value)) {
        $localfields = explode('.', $fqField);
        $property = array_pop($localfields);
        $a = &$array;

        while ($localfield = array_shift($localfields)) {
          if (!isset($a[$localfield])) {
            $a[$localfield] = [];
          }
          $a = &$a[$localfield];
        }

        if (substr($property, 0, 4) == 'rtr_') {
          $a[$property] = $value;
        } else {
          if (is_scalar($value)) {
            $a[$property] = $value;
          } elseif (is_array($value)) {
            $a[$property] = $value;
          } elseif (count($value) > 1) {
            $a[$property] = $value;
          } else {
            $a[$property] = $value;
          }
        }
      }
    }
  }

}
