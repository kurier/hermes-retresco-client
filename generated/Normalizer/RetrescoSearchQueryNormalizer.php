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
class RetrescoSearchQueryNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\RetrescoSearchQuery';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\RetrescoSearchQuery';
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
        $object = new \telekurier\RetrescoClient\Model\RetrescoSearchQuery();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('q', $data)) {
            $object->setQ($data['q']);
        }
        if (\array_key_exists('search_fields', $data)) {
            $object->setSearchFields($data['search_fields']);
        }
        if (\array_key_exists('result_size', $data)) {
            $object->setResultSize($data['result_size']);
        }
        if (\array_key_exists('result_from', $data)) {
            $object->setResultFrom($data['result_from']);
        }
        if (\array_key_exists('sort_field', $data)) {
            $object->setSortField($data['sort_field']);
        }
        if (\array_key_exists('authors', $data)) {
            $object->setAuthors($data['authors']);
        }
        if (\array_key_exists('locations', $data)) {
            $object->setLocations($data['locations']);
        }
        if (\array_key_exists('persons', $data)) {
            $object->setPersons($data['persons']);
        }
        if (\array_key_exists('products', $data)) {
            $object->setProducts($data['products']);
        }
        if (\array_key_exists('organisations', $data)) {
            $object->setOrganisations($data['organisations']);
        }
        if (\array_key_exists('keywords', $data)) {
            $object->setKeywords($data['keywords']);
        }
        if (\array_key_exists('sources', $data)) {
            $object->setSources($data['sources']);
        }
        if (\array_key_exists('doc_types', $data)) {
            $object->setDocTypes($data['doc_types']);
        }
        if (\array_key_exists('published', $data)) {
            $object->setPublished($data['published']);
        }
        if (\array_key_exists('date_from', $data)) {
            $object->setDateFrom($data['date_from']);
        }
        if (\array_key_exists('date_to', $data)) {
            $object->setDateTo($data['date_to']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('q') && null !== $object->getQ()) {
            $data['q'] = $object->getQ();
        }
        if ($object->isInitialized('searchFields') && null !== $object->getSearchFields()) {
            $data['search_fields'] = $object->getSearchFields();
        }
        if ($object->isInitialized('resultSize') && null !== $object->getResultSize()) {
            $data['result_size'] = $object->getResultSize();
        }
        if ($object->isInitialized('resultFrom') && null !== $object->getResultFrom()) {
            $data['result_from'] = $object->getResultFrom();
        }
        if ($object->isInitialized('sortField') && null !== $object->getSortField()) {
            $data['sort_field'] = $object->getSortField();
        }
        if ($object->isInitialized('authors') && null !== $object->getAuthors()) {
            $data['authors'] = $object->getAuthors();
        }
        if ($object->isInitialized('locations') && null !== $object->getLocations()) {
            $data['locations'] = $object->getLocations();
        }
        if ($object->isInitialized('persons') && null !== $object->getPersons()) {
            $data['persons'] = $object->getPersons();
        }
        if ($object->isInitialized('products') && null !== $object->getProducts()) {
            $data['products'] = $object->getProducts();
        }
        if ($object->isInitialized('organisations') && null !== $object->getOrganisations()) {
            $data['organisations'] = $object->getOrganisations();
        }
        if ($object->isInitialized('keywords') && null !== $object->getKeywords()) {
            $data['keywords'] = $object->getKeywords();
        }
        if ($object->isInitialized('sources') && null !== $object->getSources()) {
            $data['sources'] = $object->getSources();
        }
        if ($object->isInitialized('docTypes') && null !== $object->getDocTypes()) {
            $data['doc_types'] = $object->getDocTypes();
        }
        if ($object->isInitialized('published') && null !== $object->getPublished()) {
            $data['published'] = $object->getPublished();
        }
        if ($object->isInitialized('dateFrom') && null !== $object->getDateFrom()) {
            $data['date_from'] = $object->getDateFrom();
        }
        if ($object->isInitialized('dateTo') && null !== $object->getDateTo()) {
            $data['date_to'] = $object->getDateTo();
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\RetrescoSearchQuery' => false);
    }
}