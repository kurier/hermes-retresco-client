<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class ElasticSearchResultNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\ElasticSearchResult) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchResult();
        if (property_exists($data, 'hits')) {
            $values = array();
            foreach ($data->{'hits'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'raw', $context);
            }
            $object->setHits($values);
        }
        if (property_exists($data, 'max_score')) {
            $object->setMaxScore($data->{'max_score'});
        }
        if (property_exists($data, 'total')) {
            $object->setTotal($data->{'total'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getHits()) {
            $values = array();
            foreach ($object->getHits() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
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