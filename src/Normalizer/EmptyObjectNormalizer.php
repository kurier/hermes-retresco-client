<?php

declare(strict_types = 1);

namespace telekurier\RetrescoClient\Normalizer;

use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class EmptyObjectNormalizer extends ObjectNormalizer {

  /**
   * {@inheritDoc}
   */
  public function supportsNormalization($data, $format = null) {
    // Support normalization of empty class objects.
    return is_object($data) && (array) $data == [];
  }

  /**
   * {@inheritDoc}
   */
  public function normalize($object, $format = NULL, array $context = []) {
    return new \ArrayObject();
  }

  /**
   * {@inheritDoc}
   */
  public function supportsDenormalization($data, $type, $format = NULL) {
    return FALSE;
  }

}
