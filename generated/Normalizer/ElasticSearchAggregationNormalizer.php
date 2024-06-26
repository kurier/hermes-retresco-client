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
class ElasticSearchAggregationNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation';
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
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchAggregation();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('buckets', $data) && $data['buckets'] !== null) {
            $values = array();
            foreach ($data['buckets'] as $value) {
                $values[] = $value;
            }
            $object->setBuckets($values);
        }
        elseif (\array_key_exists('buckets', $data) && $data['buckets'] === null) {
            $object->setBuckets(null);
        }
        if (\array_key_exists('doc_count', $data) && $data['doc_count'] !== null) {
            $object->setDocCount($data['doc_count']);
        }
        elseif (\array_key_exists('doc_count', $data) && $data['doc_count'] === null) {
            $object->setDocCount(null);
        }
        if (\array_key_exists('value', $data) && $data['value'] !== null) {
            $object->setValue($data['value']);
        }
        elseif (\array_key_exists('value', $data) && $data['value'] === null) {
            $object->setValue(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('buckets') && null !== $object->getBuckets()) {
            $values = array();
            foreach ($object->getBuckets() as $value) {
                $values[] = $value;
            }
            $data['buckets'] = $values;
        }
        if ($object->isInitialized('docCount') && null !== $object->getDocCount()) {
            $data['doc_count'] = $object->getDocCount();
        }
        if ($object->isInitialized('value') && null !== $object->getValue()) {
            $data['value'] = $object->getValue();
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation' => false);
    }
}