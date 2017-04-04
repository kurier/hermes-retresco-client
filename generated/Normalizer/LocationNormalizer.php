<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class LocationNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\Location') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\Location) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\Location();
        if (property_exists($data, 'lat')) {
            $object->setLat($data->{'lat'});
        }
        if (property_exists($data, 'lon')) {
            $object->setLon($data->{'lon'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getLat()) {
            $data->{'lat'} = $object->getLat();
        }
        if (null !== $object->getLon()) {
            $data->{'lon'} = $object->getLon();
        }
        return $data;
    }
}