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

class ElasticSearchResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \telekurier\RetrescoClient\Model\ElasticSearchResult;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchResult();
        if (property_exists($data, 'hits')) {
            $values = [];
            foreach ($data->{'hits'} as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json', $context);
            }
            $object->setHits($values);
        }
        if (property_exists($data, 'max_score')) {
            $object->setMaxScore($data->{'max_score'});
        }
        if (property_exists($data, 'total')) {
            $object->setTotal($data->total->value);
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getHits()) {
            $values = [];
            foreach ($object->getHits() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data->{'hits'} = $values;
        }
        if (null !== $object->getMaxScore()) {
            $data->{'max_score'} = $object->getMaxScore();
        }
        if (null !== $object->getTotal()) {
            $data->{'total'} = $object->getTotal();
        }

        return $data;
    }
}
