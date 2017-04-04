<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class RetrescoEntityLinksNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\RetrescoEntityLinks') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\RetrescoEntityLinks) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\RetrescoEntityLinks();
        if (property_exists($data, 'links')) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'links'} as $key => $value) {
                $values[$key] = $value;
            }
            $object->setLinks($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getLinks()) {
            $values = new \stdClass();
            foreach ($object->getLinks() as $key => $value) {
                $values->{$key} = $value;
            }
            $data->{'links'} = $values;
        }
        return $data;
    }
}