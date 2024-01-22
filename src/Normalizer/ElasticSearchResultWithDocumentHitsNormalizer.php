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
      $documents[] = $this->serializer->denormalize($hit, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', NULL, $context);
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

}
