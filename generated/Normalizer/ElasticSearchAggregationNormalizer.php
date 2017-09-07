<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ElasticSearchAggregationNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\ElasticSearchAggregation) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchAggregation();
        if (property_exists($data, 'buckets')) {
            $values = array();
            foreach ($data->{'buckets'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregationBucket', 'raw', $context);
            }
            $object->setBuckets($values);
        }
        if (property_exists($data, 'doc_count')) {
            $object->setDocCount($data->{'doc_count'});
        }
        if (property_exists($data, 'value')) {
            $object->setValue($data->{'value'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getBuckets()) {
            $values = array();
            foreach ($object->getBuckets() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'buckets'} = $values;
        }
        if (null !== $object->getDocCount()) {
            $data->{'doc_count'} = $object->getDocCount();
        }
        if (null !== $object->getValue()) {
            $data->{'value'} = $object->getValue();
        }
        return $data;
    }
}