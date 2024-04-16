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
class ElasticSearchResultNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult';
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
        $object = new \telekurier\RetrescoClient\Model\ElasticSearchResult();
        if (\array_key_exists('max_score', $data) && \is_int($data['max_score'])) {
            $data['max_score'] = (double) $data['max_score'];
        }
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('hits', $data) && $data['hits'] !== null) {
            $values = array();
            foreach ($data['hits'] as $value) {
                $values[] = $this->denormalizer->denormalize($value, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json', $context);
            }
            $object->setHits($values);
        }
        elseif (\array_key_exists('hits', $data) && $data['hits'] === null) {
            $object->setHits(null);
        }
        if (\array_key_exists('max_score', $data) && $data['max_score'] !== null) {
            $object->setMaxScore($data['max_score']);
        }
        elseif (\array_key_exists('max_score', $data) && $data['max_score'] === null) {
            $object->setMaxScore(null);
        }
        if (\array_key_exists('total', $data) && $data['total'] !== null) {
            $object->setTotal($data['total']);
        }
        elseif (\array_key_exists('total', $data) && $data['total'] === null) {
            $object->setTotal(null);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('hits') && null !== $object->getHits()) {
            $values = array();
            foreach ($object->getHits() as $value) {
                $values[] = $this->normalizer->normalize($value, 'json', $context);
            }
            $data['hits'] = $values;
        }
        if ($object->isInitialized('maxScore') && null !== $object->getMaxScore()) {
            $data['max_score'] = $object->getMaxScore();
        }
        if ($object->isInitialized('total') && null !== $object->getTotal()) {
            $data['total'] = $object->getTotal();
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\ElasticSearchResult' => false);
    }
}