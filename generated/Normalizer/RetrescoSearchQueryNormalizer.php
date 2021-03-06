<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace telekurier\RetrescoClient\Normalizer;

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

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\RetrescoSearchQuery';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \telekurier\RetrescoClient\Model\RetrescoSearchQuery;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \telekurier\RetrescoClient\Model\RetrescoSearchQuery();
        if (property_exists($data, 'q')) {
            $object->setQ($data->{'q'});
        }
        if (property_exists($data, 'search_fields')) {
            $object->setSearchFields($data->{'search_fields'});
        }
        if (property_exists($data, 'result_size')) {
            $object->setResultSize($data->{'result_size'});
        }
        if (property_exists($data, 'result_from')) {
            $object->setResultFrom($data->{'result_from'});
        }
        if (property_exists($data, 'sort_field')) {
            $object->setSortField($data->{'sort_field'});
        }
        if (property_exists($data, 'authors')) {
            $object->setAuthors($data->{'authors'});
        }
        if (property_exists($data, 'locations')) {
            $object->setLocations($data->{'locations'});
        }
        if (property_exists($data, 'persons')) {
            $object->setPersons($data->{'persons'});
        }
        if (property_exists($data, 'products')) {
            $object->setProducts($data->{'products'});
        }
        if (property_exists($data, 'organisations')) {
            $object->setOrganisations($data->{'organisations'});
        }
        if (property_exists($data, 'keywords')) {
            $object->setKeywords($data->{'keywords'});
        }
        if (property_exists($data, 'sources')) {
            $object->setSources($data->{'sources'});
        }
        if (property_exists($data, 'doc_types')) {
            $object->setDocTypes($data->{'doc_types'});
        }
        if (property_exists($data, 'published')) {
            $object->setPublished($data->{'published'});
        }
        if (property_exists($data, 'date_from')) {
            $object->setDateFrom($data->{'date_from'});
        }
        if (property_exists($data, 'date_to')) {
            $object->setDateTo($data->{'date_to'});
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getQ()) {
            $data->{'q'} = $object->getQ();
        }
        if (null !== $object->getSearchFields()) {
            $data->{'search_fields'} = $object->getSearchFields();
        }
        if (null !== $object->getResultSize()) {
            $data->{'result_size'} = $object->getResultSize();
        }
        if (null !== $object->getResultFrom()) {
            $data->{'result_from'} = $object->getResultFrom();
        }
        if (null !== $object->getSortField()) {
            $data->{'sort_field'} = $object->getSortField();
        }
        if (null !== $object->getAuthors()) {
            $data->{'authors'} = $object->getAuthors();
        }
        if (null !== $object->getLocations()) {
            $data->{'locations'} = $object->getLocations();
        }
        if (null !== $object->getPersons()) {
            $data->{'persons'} = $object->getPersons();
        }
        if (null !== $object->getProducts()) {
            $data->{'products'} = $object->getProducts();
        }
        if (null !== $object->getOrganisations()) {
            $data->{'organisations'} = $object->getOrganisations();
        }
        if (null !== $object->getKeywords()) {
            $data->{'keywords'} = $object->getKeywords();
        }
        if (null !== $object->getSources()) {
            $data->{'sources'} = $object->getSources();
        }
        if (null !== $object->getDocTypes()) {
            $data->{'doc_types'} = $object->getDocTypes();
        }
        if (null !== $object->getPublished()) {
            $data->{'published'} = $object->getPublished();
        }
        if (null !== $object->getDateFrom()) {
            $data->{'date_from'} = $object->getDateFrom();
        }
        if (null !== $object->getDateTo()) {
            $data->{'date_to'} = $object->getDateTo();
        }

        return $data;
    }
}
