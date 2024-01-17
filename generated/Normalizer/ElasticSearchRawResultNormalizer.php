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
class ElasticSearchRawResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\ElasticSearchRawResult';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\ElasticSearchRawResult';
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
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchRawResult();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('took', $data)) {
            $object->setTook($data['took']);
        }
        if (\array_key_exists('timed_out', $data)) {
            $object->setTimedOut($data['timed_out']);
        }
        if (\array_key_exists('aggregations', $data)) {
            $values = new \ArrayObject(array(), \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data['aggregations'] as $key => $value) {
                $values[$key] = $this->denormalizer->denormalize($value, 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation', 'json', $context);
            }
            $object->setAggregations($values);
        }
        if (\array_key_exists('hits', $data)) {
            $object->setHits($this->denormalizer->denormalize($data['hits'], 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult', 'json', $context));
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('took') && null !== $object->getTook()) {
            $data['took'] = $object->getTook();
        }
        if ($object->isInitialized('timedOut') && null !== $object->getTimedOut()) {
            $data['timed_out'] = $object->getTimedOut();
        }
        if ($object->isInitialized('aggregations') && null !== $object->getAggregations()) {
            $values = array();
            foreach ($object->getAggregations() as $key => $value) {
                $values[$key] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['aggregations'] = $values;
        }
        if ($object->isInitialized('hits') && null !== $object->getHits()) {
            $data['hits'] = $this->normalizer->normalize($object->getHits(), 'json', $context);
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\ElasticSearchRawResult' => false);
    }
}