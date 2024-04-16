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
        if (\array_key_exists('canonical_tag', $data) && $data['canonical_tag'] !== null) {
            $object->setCanonicalTag($data['canonical_tag']);
        }
        elseif (\array_key_exists('canonical_tag', $data) && $data['canonical_tag'] === null) {
            $object->setCanonicalTag(null);
        }
        if (\array_key_exists('doc_id', $data) && $data['doc_id'] !== null) {
            $object->setDocId($data['doc_id']);
        }
        elseif (\array_key_exists('doc_id', $data) && $data['doc_id'] === null) {
            $object->setDocId(null);
        }
        if (\array_key_exists('items_per_page', $data) && $data['items_per_page'] !== null) {
            $object->setItemsPerPage($data['items_per_page']);
        }
        elseif (\array_key_exists('items_per_page', $data) && $data['items_per_page'] === null) {
            $object->setItemsPerPage(null);
        }
        if (\array_key_exists('meta_description', $data) && $data['meta_description'] !== null) {
            $object->setMetaDescription($data['meta_description']);
        }
        elseif (\array_key_exists('meta_description', $data) && $data['meta_description'] === null) {
            $object->setMetaDescription(null);
        }
        if (\array_key_exists('meta_title', $data) && $data['meta_title'] !== null) {
            $object->setMetaTitle($data['meta_title']);
        }
        elseif (\array_key_exists('meta_title', $data) && $data['meta_title'] === null) {
            $object->setMetaTitle(null);
        }
        if (\array_key_exists('name', $data) && $data['name'] !== null) {
            $object->setName($data['name']);
        }
        elseif (\array_key_exists('name', $data) && $data['name'] === null) {
            $object->setName(null);
        }
        if (\array_key_exists('query', $data) && $data['query'] !== null) {
            $object->setQuery($data['query']);
        }
        elseif (\array_key_exists('query', $data) && $data['query'] === null) {
            $object->setQuery(null);
        }
        if (\array_key_exists('redirect', $data) && $data['redirect'] !== null) {
            $object->setRedirect($data['redirect']);
        }
        elseif (\array_key_exists('redirect', $data) && $data['redirect'] === null) {
            $object->setRedirect(null);
        }
        if (\array_key_exists('section', $data) && $data['section'] !== null) {
            $object->setSection($data['section']);
        }
        elseif (\array_key_exists('section', $data) && $data['section'] === null) {
            $object->setSection(null);
        }
        if (\array_key_exists('super_title', $data) && $data['super_title'] !== null) {
            $object->setSuperTitle($data['super_title']);
        }
        elseif (\array_key_exists('super_title', $data) && $data['super_title'] === null) {
            $object->setSuperTitle(null);
        }
        if (\array_key_exists('teaser', $data) && $data['teaser'] !== null) {
            $object->setTeaser($data['teaser']);
        }
        elseif (\array_key_exists('teaser', $data) && $data['teaser'] === null) {
            $object->setTeaser(null);
        }
        if (\array_key_exists('teaser_img', $data) && $data['teaser_img'] !== null) {
            $object->setTeaserImg($data['teaser_img']);
        }
        elseif (\array_key_exists('teaser_img', $data) && $data['teaser_img'] === null) {
            $object->setTeaserImg(null);
        }
        if (\array_key_exists('teaser_img_subline', $data) && $data['teaser_img_subline'] !== null) {
            $object->setTeaserImgSubline($data['teaser_img_subline']);
        }
        elseif (\array_key_exists('teaser_img_subline', $data) && $data['teaser_img_subline'] === null) {
            $object->setTeaserImgSubline(null);
        }
        if (\array_key_exists('title', $data) && $data['title'] !== null) {
            $object->setTitle($data['title']);
        }
        elseif (\array_key_exists('title', $data) && $data['title'] === null) {
            $object->setTitle(null);
        }
        if (\array_key_exists('topic_type', $data) && $data['topic_type'] !== null) {
            $object->setTopicType($data['topic_type']);
        }
        elseif (\array_key_exists('topic_type', $data) && $data['topic_type'] === null) {
            $object->setTopicType(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
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