<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ElasticSearchRawResultNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\ElasticSearchRawResult') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\ElasticSearchRawResult) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchRawResult();
        if (property_exists($data, 'took')) {
            $object->setTook($data->{'took'});
        }
        if (property_exists($data, 'timed_out')) {
            $object->setTimedOut($data->{'timed_out'});
        }
        if (property_exists($data, 'aggregations')) {
            $object->setAggregations($data->{'aggregations'});
        }
        if (property_exists($data, 'hits')) {
            $object->setHits($this->serializer->deserialize($data->{'hits'}, 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult', 'raw', $context));
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getTook()) {
            $data->{'took'} = $object->getTook();
        }
        if (null !== $object->getTimedOut()) {
            $data->{'timed_out'} = $object->getTimedOut();
        }
        if (null !== $object->getAggregations()) {
            $data->{'aggregations'} = $object->getAggregations();
        }
        if (null !== $object->getHits()) {
            $data->{'hits'} = $this->serializer->serialize($object->getHits(), 'raw', $context);
        }
        return $data;
    }
}