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
class RetrescoTopicPageNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage';
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
        $object = new \telekurier\RetrescoClient\Model\RetrescoTopicPage();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('canonical_tag', $data)) {
            $object->setCanonicalTag($data['canonical_tag']);
        }
        if (\array_key_exists('doc_id', $data)) {
            $object->setDocId($data['doc_id']);
        }
        if (\array_key_exists('items_per_page', $data)) {
            $object->setItemsPerPage($data['items_per_page']);
        }
        if (\array_key_exists('meta_description', $data)) {
            $object->setMetaDescription($data['meta_description']);
        }
        if (\array_key_exists('meta_title', $data)) {
            $object->setMetaTitle($data['meta_title']);
        }
        if (\array_key_exists('name', $data)) {
            $object->setName($data['name']);
        }
        if (\array_key_exists('query', $data)) {
            $object->setQuery($data['query']);
        }
        if (\array_key_exists('redirect', $data)) {
            $object->setRedirect($data['redirect']);
        }
        if (\array_key_exists('section', $data)) {
            $object->setSection($data['section']);
        }
        if (\array_key_exists('super_title', $data)) {
            $object->setSuperTitle($data['super_title']);
        }
        if (\array_key_exists('teaser', $data)) {
            $object->setTeaser($data['teaser']);
        }
        if (\array_key_exists('teaser_img', $data)) {
            $object->setTeaserImg($data['teaser_img']);
        }
        if (\array_key_exists('teaser_img_subline', $data)) {
            $object->setTeaserImgSubline($data['teaser_img_subline']);
        }
        if (\array_key_exists('title', $data)) {
            $object->setTitle($data['title']);
        }
        if (\array_key_exists('topic_type', $data)) {
            $object->setTopicType($data['topic_type']);
        }
        if (\array_key_exists('url', $data)) {
            $object->setUrl($data['url']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        if ($object->isInitialized('canonicalTag') && null !== $object->getCanonicalTag()) {
            $data['canonical_tag'] = $object->getCanonicalTag();
        }
        if ($object->isInitialized('docId') && null !== $object->getDocId()) {
            $data['doc_id'] = $object->getDocId();
        }
        if ($object->isInitialized('itemsPerPage') && null !== $object->getItemsPerPage()) {
            $data['items_per_page'] = $object->getItemsPerPage();
        }
        if ($object->isInitialized('metaDescription') && null !== $object->getMetaDescription()) {
            $data['meta_description'] = $object->getMetaDescription();
        }
        if ($object->isInitialized('metaTitle') && null !== $object->getMetaTitle()) {
            $data['meta_title'] = $object->getMetaTitle();
        }
        if ($object->isInitialized('name') && null !== $object->getName()) {
            $data['name'] = $object->getName();
        }
        if ($object->isInitialized('query') && null !== $object->getQuery()) {
            $data['query'] = $object->getQuery();
        }
        if ($object->isInitialized('redirect') && null !== $object->getRedirect()) {
            $data['redirect'] = $object->getRedirect();
        }
        if ($object->isInitialized('section') && null !== $object->getSection()) {
            $data['section'] = $object->getSection();
        }
        if ($object->isInitialized('superTitle') && null !== $object->getSuperTitle()) {
            $data['super_title'] = $object->getSuperTitle();
        }
        if ($object->isInitialized('teaser') && null !== $object->getTeaser()) {
            $data['teaser'] = $object->getTeaser();
        }
        if ($object->isInitialized('teaserImg') && null !== $object->getTeaserImg()) {
            $data['teaser_img'] = $object->getTeaserImg();
        }
        if ($object->isInitialized('teaserImgSubline') && null !== $object->getTeaserImgSubline()) {
            $data['teaser_img_subline'] = $object->getTeaserImgSubline();
        }
        if ($object->isInitialized('title') && null !== $object->getTitle()) {
            $data['title'] = $object->getTitle();
        }
        if ($object->isInitialized('topicType') && null !== $object->getTopicType()) {
            $data['topic_type'] = $object->getTopicType();
        }
        if ($object->isInitialized('url') && null !== $object->getUrl()) {
            $data['url'] = $object->getUrl();
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\RetrescoTopicPage' => false);
    }
}