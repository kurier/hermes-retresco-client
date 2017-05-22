<?php

namespace telekurier\RetrescoClient\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
use telekurier\RetrescoClient\Encoder\FieldDocumentEncoder;

class ElasticSearchResultWithDocumentHitsNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface {

  /**
   * {@inheritdoc}
   */
  public function denormalize($data, $class, $format = NULL, array $context = array()) {
    $hits = $data->hits ?? [];
    unset($data->hits);
    /** @var \telekurier\RetrescoClient\Model\ElasticSearchResult $object */
    $object = $this->serializer->deserialize($data, $class, 'raw', $context);

    $documents = [];
    foreach ($hits as $hit) {
      $documents[] = $this->serializer->deserialize($hit, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', FieldDocumentEncoder::FORMAT, $context);
    }
    $object->setHits($documents);

    return $object;
  }

  /**
   * {@inheritdoc}
   */
  public function supportsDenormalization($data, $type, $format = NULL) {
    return $type === 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult' && property_exists($data, 'hits');
  }
}
