<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class RetrescoTopicPagesNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPages') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\RetrescoTopicPages) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\RetrescoTopicPages();
        if (property_exists($data, 'docs')) {
            $values = array();
            foreach ($data->{'docs'} as $value) {
                $values[] = $this->serializer->deserialize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage', 'raw', $context);
            }
            $object->setDocs($values);
        }
        if (property_exists($data, 'num_found')) {
            $object->setNumFound($data->{'num_found'});
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
        if (null !== $object->getNumFound()) {
            $data->{'num_found'} = $object->getNumFound();
        }
        return $data;
    }
}