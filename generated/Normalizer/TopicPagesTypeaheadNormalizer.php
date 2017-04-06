<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\Normalizer\SerializerAwareNormalizer;
class TopicPagesTypeaheadNormalizer extends SerializerAwareNormalizer implements DenormalizerInterface, NormalizerInterface
{
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\TopicPagesTypeahead') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\TopicPagesTypeahead) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $object = new \telekurier\RetrescoClient\Model\TopicPagesTypeahead();
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'redirect')) {
            $object->setRedirect($data->{'redirect'});
        }
        if (property_exists($data, 'doc_id')) {
            $object->setDocId($data->{'doc_id'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getRedirect()) {
            $data->{'redirect'} = $object->getRedirect();
        }
        if (null !== $object->getDocId()) {
            $data->{'doc_id'} = $object->getDocId();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        return $data;
    }
}