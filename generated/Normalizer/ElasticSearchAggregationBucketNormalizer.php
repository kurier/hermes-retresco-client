<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ElasticSearchAggregationBucketNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregationBucket') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\ElasticSearchAggregationBucket) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchAggregationBucket();
        if (property_exists($data, 'key')) {
            $object->setKey($data->{'key'});
        }
        if (property_exists($data, 'doc_count')) {
            $object->setDocCount($data->{'doc_count'});
        }
        if (property_exists($data, 'score')) {
            $object->setScore($data->{'score'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getKey()) {
            $data->{'key'} = $object->getKey();
        }
        if (null !== $object->getDocCount()) {
            $data->{'doc_count'} = $object->getDocCount();
        }
        if (null !== $object->getScore()) {
            $data->{'score'} = $object->getScore();
        }
        return $data;
    }
}