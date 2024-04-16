<?php

namespace telekurier\RetrescoClient\Normalizer;

use Jane\Component\JsonSchemaRuntime\Reference;
use telekurier\RetrescoClient\Runtime\Normalizer\CheckArray;
use telekurier\RetrescoClient\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class PinNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\Pin';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\Pin';
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (isset($data['$ref'])) {
            return new Reference($data['$ref'], $context['document-origin']);
        }
        if (isset($data['$recursiveRef'])) {
            return new Reference($data['$recursiveRef'], $context['document-origin']);
        }
        $object = new \telekurier\RetrescoClient\Model\Pin();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('location', $data) && $data['location'] !== null) {
            $object->setLocation($this->denormalizer->denormalize($data['location'], 'telekurier\\RetrescoClient\\Model\\Location', 'json', $context));
        }
        elseif (\array_key_exists('location', $data) && $data['location'] === null) {
            $object->setLocation(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['location'] = $this->normalizer->normalize($object->getLocation(), 'json', $context);
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\Pin' => false);
    }
}