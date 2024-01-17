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
class RetrescoDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return $type === 'telekurier\\RetrescoClient\\Model\\RetrescoDocument';
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && get_class($data) === 'telekurier\\RetrescoClient\\Model\\RetrescoDocument';
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
        $object = new \telekurier\RetrescoClient\Model\RetrescoDocument();
        if (null === $data || false === \is_array($data)) {
            return $object;
        }
        if (\array_key_exists('doc_id', $data)) {
            $object->setDocId($data['doc_id']);
        }
        if (\array_key_exists('doc_type', $data)) {
            $object->setDocType($data['doc_type']);
        }
        if (\array_key_exists('url', $data)) {
            $object->setUrl($data['url']);
        }
        if (\array_key_exists('published', $data)) {
            $object->setPublished($data['published']);
        }
        if (\array_key_exists('lifecycle', $data)) {
            $object->setLifecycle($data['lifecycle']);
        }
        if (\array_key_exists('title', $data)) {
            $object->setTitle($data['title']);
        }
        if (\array_key_exists('supertitle', $data)) {
            $object->setSupertitle($data['supertitle']);
        }
        if (\array_key_exists('author', $data)) {
            $object->setAuthor($data['author']);
        }
        if (\array_key_exists('teaser', $data)) {
            $object->setTeaser($data['teaser']);
        }
        if (\array_key_exists('teaser_img_url', $data)) {
            $object->setTeaserImgUrl($data['teaser_img_url']);
        }
        if (\array_key_exists('teaser_img_subline', $data)) {
            $object->setTeaserImgSubline($data['teaser_img_subline']);
        }
        if (\array_key_exists('body', $data)) {
            $object->setBody($data['body']);
        }
        if (\array_key_exists('section', $data) && $data['section'] !== null) {
            $object->setSection($data['section']);
        }
        elseif (\array_key_exists('section', $data) && $data['section'] === null) {
            $object->setSection(null);
        }
        if (\array_key_exists('date', $data)) {
            $object->setDate($data['date']);
        }
        if (\array_key_exists('startdate', $data)) {
            $object->setStartdate($data['startdate']);
        }
        if (\array_key_exists('enddate', $data)) {
            $object->setEnddate($data['enddate']);
        }
        if (\array_key_exists('published_date', $data)) {
            $object->setPublishedDate($data['published_date']);
        }
        if (\array_key_exists('updated_date', $data)) {
            $object->setUpdatedDate($data['updated_date']);
        }
        if (\array_key_exists('source', $data)) {
            $object->setSource($data['source']);
        }
        if (\array_key_exists('agentur', $data)) {
            $object->setAgentur($data['agentur']);
        }
        if (\array_key_exists('channel', $data)) {
            $object->setChannel($data['channel']);
        }
        if (\array_key_exists('article_score', $data)) {
            $object->setArticleScore($data['article_score']);
        }
        if (\array_key_exists('pi_last_72h', $data)) {
            $object->setPiLast72h($data['pi_last_72h']);
        }
        if (\array_key_exists('ga_last_seen', $data)) {
            $object->setGaLastSeen($data['ga_last_seen']);
        }
        if (\array_key_exists('comments_count', $data)) {
            $object->setCommentsCount($data['comments_count']);
        }
        if (\array_key_exists('socialmedia_shares', $data)) {
            $object->setSocialmediaShares($data['socialmedia_shares']);
        }
        if (\array_key_exists('socialmedia_traffic', $data)) {
            $object->setSocialmediaTraffic($data['socialmedia_traffic']);
        }
        if (\array_key_exists('retention_period', $data)) {
            $object->setRetentionPeriod($data['retention_period']);
        }
        if (\array_key_exists('video_views', $data)) {
            $object->setVideoViews($data['video_views']);
        }
        if (\array_key_exists('bounce_rate', $data)) {
            $object->setBounceRate($data['bounce_rate']);
        }
        if (\array_key_exists('pin', $data)) {
            $object->setPin($this->denormalizer->denormalize($data['pin'], 'telekurier\\RetrescoClient\\Model\\Pin', 'json', $context));
        }
        if (\array_key_exists('rtr_persons', $data)) {
            $values = array();
            foreach ($data['rtr_persons'] as $value) {
                $values[] = $value;
            }
            $object->setRtrPersons($values);
        }
        if (\array_key_exists('rtr_locations', $data)) {
            $values_1 = array();
            foreach ($data['rtr_locations'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRtrLocations($values_1);
        }
        if (\array_key_exists('rtr_organisations', $data)) {
            $values_2 = array();
            foreach ($data['rtr_organisations'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setRtrOrganisations($values_2);
        }
        if (\array_key_exists('rtr_products', $data)) {
            $values_3 = array();
            foreach ($data['rtr_products'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setRtrProducts($values_3);
        }
        if (\array_key_exists('rtr_events', $data)) {
            $values_4 = array();
            foreach ($data['rtr_events'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setRtrEvents($values_4);
        }
        if (\array_key_exists('rtr_keywords', $data)) {
            $values_5 = array();
            foreach ($data['rtr_keywords'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setRtrKeywords($values_5);
        }
        if (\array_key_exists('rtr_tags', $data)) {
            $values_6 = array();
            foreach ($data['rtr_tags'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setRtrTags($values_6);
        }
        if (\array_key_exists('payload', $data)) {
            $object->setPayload($data['payload']);
        }
        return $object;
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $data = array();
        $data['doc_id'] = $object->getDocId();
        $data['doc_type'] = $object->getDocType();
        $data['url'] = $object->getUrl();
        $data['published'] = $object->getPublished();
        if ($object->isInitialized('lifecycle') && null !== $object->getLifecycle()) {
            $data['lifecycle'] = $object->getLifecycle();
        }
        $data['title'] = $object->getTitle();
        if ($object->isInitialized('supertitle') && null !== $object->getSupertitle()) {
            $data['supertitle'] = $object->getSupertitle();
        }
        if ($object->isInitialized('author') && null !== $object->getAuthor()) {
            $data['author'] = $object->getAuthor();
        }
        $data['teaser'] = $object->getTeaser();
        if ($object->isInitialized('teaserImgUrl') && null !== $object->getTeaserImgUrl()) {
            $data['teaser_img_url'] = $object->getTeaserImgUrl();
        }
        if ($object->isInitialized('teaserImgSubline') && null !== $object->getTeaserImgSubline()) {
            $data['teaser_img_subline'] = $object->getTeaserImgSubline();
        }
        if ($object->isInitialized('body') && null !== $object->getBody()) {
            $data['body'] = $object->getBody();
        }
        $data['section'] = $object->getSection();
        $data['date'] = $object->getDate();
        if ($object->isInitialized('startdate') && null !== $object->getStartdate()) {
            $data['startdate'] = $object->getStartdate();
        }
        if ($object->isInitialized('enddate') && null !== $object->getEnddate()) {
            $data['enddate'] = $object->getEnddate();
        }
        if ($object->isInitialized('publishedDate') && null !== $object->getPublishedDate()) {
            $data['published_date'] = $object->getPublishedDate();
        }
        if ($object->isInitialized('updatedDate') && null !== $object->getUpdatedDate()) {
            $data['updated_date'] = $object->getUpdatedDate();
        }
        if ($object->isInitialized('source') && null !== $object->getSource()) {
            $data['source'] = $object->getSource();
        }
        if ($object->isInitialized('agentur') && null !== $object->getAgentur()) {
            $data['agentur'] = $object->getAgentur();
        }
        if ($object->isInitialized('channel') && null !== $object->getChannel()) {
            $data['channel'] = $object->getChannel();
        }
        if ($object->isInitialized('articleScore') && null !== $object->getArticleScore()) {
            $data['article_score'] = $object->getArticleScore();
        }
        if ($object->isInitialized('piLast72h') && null !== $object->getPiLast72h()) {
            $data['pi_last_72h'] = $object->getPiLast72h();
        }
        if ($object->isInitialized('gaLastSeen') && null !== $object->getGaLastSeen()) {
            $data['ga_last_seen'] = $object->getGaLastSeen();
        }
        if ($object->isInitialized('commentsCount') && null !== $object->getCommentsCount()) {
            $data['comments_count'] = $object->getCommentsCount();
        }
        if ($object->isInitialized('socialmediaShares') && null !== $object->getSocialmediaShares()) {
            $data['socialmedia_shares'] = $object->getSocialmediaShares();
        }
        if ($object->isInitialized('socialmediaTraffic') && null !== $object->getSocialmediaTraffic()) {
            $data['socialmedia_traffic'] = $object->getSocialmediaTraffic();
        }
        if ($object->isInitialized('retentionPeriod') && null !== $object->getRetentionPeriod()) {
            $data['retention_period'] = $object->getRetentionPeriod();
        }
        if ($object->isInitialized('videoViews') && null !== $object->getVideoViews()) {
            $data['video_views'] = $object->getVideoViews();
        }
        if ($object->isInitialized('bounceRate') && null !== $object->getBounceRate()) {
            $data['bounce_rate'] = $object->getBounceRate();
        }
        if ($object->isInitialized('pin') && null !== $object->getPin()) {
            $data['pin'] = $this->normalizer->normalize($object->getPin(), 'json', $context);
        }
        if ($object->isInitialized('rtrPersons') && null !== $object->getRtrPersons()) {
            $values = array();
            foreach ($object->getRtrPersons() as $value) {
                $values[] = $value;
            }
            $data['rtr_persons'] = $values;
        }
        if ($object->isInitialized('rtrLocations') && null !== $object->getRtrLocations()) {
            $values_1 = array();
            foreach ($object->getRtrLocations() as $value_1) {
                $values_1[] = $value_1;
            }
            $data['rtr_locations'] = $values_1;
        }
        if ($object->isInitialized('rtrOrganisations') && null !== $object->getRtrOrganisations()) {
            $values_2 = array();
            foreach ($object->getRtrOrganisations() as $value_2) {
                $values_2[] = $value_2;
            }
            $data['rtr_organisations'] = $values_2;
        }
        if ($object->isInitialized('rtrProducts') && null !== $object->getRtrProducts()) {
            $values_3 = array();
            foreach ($object->getRtrProducts() as $value_3) {
                $values_3[] = $value_3;
            }
            $data['rtr_products'] = $values_3;
        }
        if ($object->isInitialized('rtrEvents') && null !== $object->getRtrEvents()) {
            $values_4 = array();
            foreach ($object->getRtrEvents() as $value_4) {
                $values_4[] = $value_4;
            }
            $data['rtr_events'] = $values_4;
        }
        if ($object->isInitialized('rtrKeywords') && null !== $object->getRtrKeywords()) {
            $values_5 = array();
            foreach ($object->getRtrKeywords() as $value_5) {
                $values_5[] = $value_5;
            }
            $data['rtr_keywords'] = $values_5;
        }
        if ($object->isInitialized('rtrTags') && null !== $object->getRtrTags()) {
            $values_6 = array();
            foreach ($object->getRtrTags() as $value_6) {
                $values_6[] = $value_6;
            }
            $data['rtr_tags'] = $values_6;
        }
        if ($object->isInitialized('payload') && null !== $object->getPayload()) {
            $data['payload'] = $object->getPayload();
        }
        return $data;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\RetrescoDocument' => false);
    }
}