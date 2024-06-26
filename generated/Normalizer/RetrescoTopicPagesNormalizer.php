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
class RetrescoTopicPagesNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPages';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPages';
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
        $object = new \telekurier\RetrescoClient\Model\RetrescoTopicPages();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('docs', $data) && $data['docs'] !== null) {
            $values = array();
            foreach ($data['docs'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage', 'json', $context);
            }
            $object->setDocs($values);
        }
        elseif (\array_key_exists('docs', $data) && $data['docs'] === null) {
            $object->setDocs(null);
        }
        if (\array_key_exists('num_found', $data) && $data['num_found'] !== null) {
            $object->setNumFound($data['num_found']);
        }
        elseif (\array_key_exists('num_found', $data) && $data['num_found'] === null) {
            $object->setNumFound(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('docs') && null !== $object->getDocs()) {
            $values = array();
            foreach ($object->getDocs() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['docs'] = $values;
        }
        if ($object->isInitialized('numFound') && null !== $object->getNumFound()) {
            $data['num_found'] = $object->getNumFound();
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\RetrescoTopicPages' => false);
    }
}