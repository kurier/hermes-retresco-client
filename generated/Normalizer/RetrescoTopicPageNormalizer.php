<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Runtime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class RetrescoTopicPageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\RetrescoTopicPage) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \telekurier\RetrescoClient\Model\RetrescoTopicPage();
        if (property_exists($data, 'canonical_tag')) {
            $object->setCanonicalTag($data->{'canonical_tag'});
        }
        if (property_exists($data, 'doc_id')) {
            $object->setDocId($data->{'doc_id'});
        }
        if (property_exists($data, 'items_per_page')) {
            $object->setItemsPerPage($data->{'items_per_page'});
        }
        if (property_exists($data, 'meta_description')) {
            $object->setMetaDescription($data->{'meta_description'});
        }
        if (property_exists($data, 'meta_title')) {
            $object->setMetaTitle($data->{'meta_title'});
        }
        if (property_exists($data, 'name')) {
            $object->setName($data->{'name'});
        }
        if (property_exists($data, 'query')) {
            $object->setQuery($data->{'query'});
        }
        if (property_exists($data, 'redirect')) {
            $object->setRedirect($data->{'redirect'});
        }
        if (property_exists($data, 'section')) {
            $object->setSection($data->{'section'});
        }
        if (property_exists($data, 'super_title')) {
            $object->setSuperTitle($data->{'super_title'});
        }
        if (property_exists($data, 'teaser')) {
            $object->setTeaser($data->{'teaser'});
        }
        if (property_exists($data, 'teaser_img')) {
            $object->setTeaserImg($data->{'teaser_img'});
        }
        if (property_exists($data, 'teaser_img_subline')) {
            $object->setTeaserImgSubline($data->{'teaser_img_subline'});
        }
        if (property_exists($data, 'title')) {
            $object->setTitle($data->{'title'});
        }
        if (property_exists($data, 'topic_type')) {
            $object->setTopicType($data->{'topic_type'});
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getCanonicalTag()) {
            $data->{'canonical_tag'} = $object->getCanonicalTag();
        }
        if (null !== $object->getDocId()) {
            $data->{'doc_id'} = $object->getDocId();
        }
        if (null !== $object->getItemsPerPage()) {
            $data->{'items_per_page'} = $object->getItemsPerPage();
        }
        if (null !== $object->getMetaDescription()) {
            $data->{'meta_description'} = $object->getMetaDescription();
        }
        if (null !== $object->getMetaTitle()) {
            $data->{'meta_title'} = $object->getMetaTitle();
        }
        if (null !== $object->getName()) {
            $data->{'name'} = $object->getName();
        }
        if (null !== $object->getQuery()) {
            $data->{'query'} = $object->getQuery();
        }
        if (null !== $object->getRedirect()) {
            $data->{'redirect'} = $object->getRedirect();
        }
        if (null !== $object->getSection()) {
            $data->{'section'} = $object->getSection();
        }
        if (null !== $object->getSuperTitle()) {
            $data->{'super_title'} = $object->getSuperTitle();
        }
        if (null !== $object->getTeaser()) {
            $data->{'teaser'} = $object->getTeaser();
        }
        if (null !== $object->getTeaserImg()) {
            $data->{'teaser_img'} = $object->getTeaserImg();
        }
        if (null !== $object->getTeaserImgSubline()) {
            $data->{'teaser_img_subline'} = $object->getTeaserImgSubline();
        }
        if (null !== $object->getTitle()) {
            $data->{'title'} = $object->getTitle();
        }
        if (null !== $object->getTopicType()) {
            $data->{'topic_type'} = $object->getTopicType();
        }
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        return $data;
    }
}