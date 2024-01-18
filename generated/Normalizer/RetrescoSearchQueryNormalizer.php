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
        if (\array_key_exists('q', $data) && $data['q'] !== null) {
            $object->setQ($data['q']);
        }
        elseif (\array_key_exists('q', $data) && $data['q'] === null) {
            $object->setQ(null);
        }
        if (\array_key_exists('search_fields', $data) && $data['search_fields'] !== null) {
            $object->setSearchFields($data['search_fields']);
        }
        elseif (\array_key_exists('search_fields', $data) && $data['search_fields'] === null) {
            $object->setSearchFields(null);
        }
        if (\array_key_exists('result_size', $data) && $data['result_size'] !== null) {
            $object->setResultSize($data['result_size']);
        }
        elseif (\array_key_exists('result_size', $data) && $data['result_size'] === null) {
            $object->setResultSize(null);
        }
        if (\array_key_exists('result_from', $data) && $data['result_from'] !== null) {
            $object->setResultFrom($data['result_from']);
        }
        elseif (\array_key_exists('result_from', $data) && $data['result_from'] === null) {
            $object->setResultFrom(null);
        }
        if (\array_key_exists('sort_field', $data) && $data['sort_field'] !== null) {
            $object->setSortField($data['sort_field']);
        }
        elseif (\array_key_exists('sort_field', $data) && $data['sort_field'] === null) {
            $object->setSortField(null);
        }
        if (\array_key_exists('authors', $data) && $data['authors'] !== null) {
            $object->setAuthors($data['authors']);
        }
        elseif (\array_key_exists('authors', $data) && $data['authors'] === null) {
            $object->setAuthors(null);
        }
        if (\array_key_exists('locations', $data) && $data['locations'] !== null) {
            $object->setLocations($data['locations']);
        }
        elseif (\array_key_exists('locations', $data) && $data['locations'] === null) {
            $object->setLocations(null);
        }
        if (\array_key_exists('persons', $data) && $data['persons'] !== null) {
            $object->setPersons($data['persons']);
        }
        elseif (\array_key_exists('persons', $data) && $data['persons'] === null) {
            $object->setPersons(null);
        }
        if (\array_key_exists('products', $data) && $data['products'] !== null) {
            $object->setProducts($data['products']);
        }
        elseif (\array_key_exists('products', $data) && $data['products'] === null) {
            $object->setProducts(null);
        }
        if (\array_key_exists('organisations', $data) && $data['organisations'] !== null) {
            $object->setOrganisations($data['organisations']);
        }
        elseif (\array_key_exists('organisations', $data) && $data['organisations'] === null) {
            $object->setOrganisations(null);
        }
        if (\array_key_exists('keywords', $data) && $data['keywords'] !== null) {
            $object->setKeywords($data['keywords']);
        }
        elseif (\array_key_exists('keywords', $data) && $data['keywords'] === null) {
            $object->setKeywords(null);
        }
        if (\array_key_exists('sources', $data) && $data['sources'] !== null) {
            $object->setSources($data['sources']);
        }
        elseif (\array_key_exists('sources', $data) && $data['sources'] === null) {
            $object->setSources(null);
        }
        if (\array_key_exists('doc_types', $data) && $data['doc_types'] !== null) {
            $object->setDocTypes($data['doc_types']);
        }
        elseif (\array_key_exists('doc_types', $data) && $data['doc_types'] === null) {
            $object->setDocTypes(null);
        }
        if (\array_key_exists('published', $data) && $data['published'] !== null) {
            $object->setPublished($data['published']);
        }
        elseif (\array_key_exists('published', $data) && $data['published'] === null) {
            $object->setPublished(null);
        }
        if (\array_key_exists('date_from', $data) && $data['date_from'] !== null) {
            $object->setDateFrom($data['date_from']);
        }
        elseif (\array_key_exists('date_from', $data) && $data['date_from'] === null) {
            $object->setDateFrom(null);
        }
        if (\array_key_exists('date_to', $data) && $data['date_to'] !== null) {
            $object->setDateTo($data['date_to']);
        }
        elseif (\array_key_exists('date_to', $data) && $data['date_to'] === null) {
            $object->setDateTo(null);
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