<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace telekurier\RetrescoClient\Normalizer;

use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class RetrescoDocumentsNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\RetrescoDocuments';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \telekurier\RetrescoClient\Model\RetrescoDocuments;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \telekurier\RetrescoClient\Model\RetrescoDocuments();
        if (property_exists($data, 'docs')) {
            $values = [];
            foreach ($data->{'docs'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json', $context);
            }
            $object->setDocs($values);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getDocs()) {
            $values = [];
            foreach ($object->getDocs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'docs'} = $values;
        }

        return $data;
    }
}