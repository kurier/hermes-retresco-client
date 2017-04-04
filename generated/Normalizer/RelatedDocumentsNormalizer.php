<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class RelatedDocumentsNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\RelatedDocuments') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\RelatedDocuments) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\RelatedDocuments();
        if (property_exists($data, 'docs')) {
            $values = array();
            foreach ($data->{'docs'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'raw', $context);
            }
            $object->setDocs($values);
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getDocs()) {
            $values = array();
            foreach ($object->getDocs() as $value) {
                $values[] = $this->serializer->serialize($value, 'raw', $context);
            }
            $data->{'docs'} = $values;
        }
        return $data;
    }
}