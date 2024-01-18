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
        if (\array_key_exists('doc_id', $data) && $data['doc_id'] !== null) {
            $object->setDocId($data['doc_id']);
        }
        elseif (\array_key_exists('doc_id', $data) && $data['doc_id'] === null) {
            $object->setDocId(null);
        }
        if (\array_key_exists('doc_type', $data) && $data['doc_type'] !== null) {
            $object->setDocType($data['doc_type']);
        }
        elseif (\array_key_exists('doc_type', $data) && $data['doc_type'] === null) {
            $object->setDocType(null);
        }
        if (\array_key_exists('url', $data) && $data['url'] !== null) {
            $object->setUrl($data['url']);
        }
        elseif (\array_key_exists('url', $data) && $data['url'] === null) {
            $object->setUrl(null);
        }
        if (\array_key_exists('published', $data) && $data['published'] !== null) {
            $object->setPublished($data['published']);
        }
        elseif (\array_key_exists('published', $data) && $data['published'] === null) {
            $object->setPublished(null);
        }
        if (\array_key_exists('lifecycle', $data) && $data['lifecycle'] !== null) {
            $object->setLifecycle($data['lifecycle']);
        }
        elseif (\array_key_exists('lifecycle', $data) && $data['lifecycle'] === null) {
            $object->setLifecycle(null);
        }
        if (\array_key_exists('title', $data) && $data['title'] !== null) {
            $object->setTitle($data['title']);
        }
        elseif (\array_key_exists('title', $data) && $data['title'] === null) {
            $object->setTitle(null);
        }
        if (\array_key_exists('supertitle', $data) && $data['supertitle'] !== null) {
            $object->setSupertitle($data['supertitle']);
        }
        elseif (\array_key_exists('supertitle', $data) && $data['supertitle'] === null) {
            $object->setSupertitle(null);
        }
        if (\array_key_exists('author', $data) && $data['author'] !== null) {
            $object->setAuthor($data['author']);
        }
        elseif (\array_key_exists('author', $data) && $data['author'] === null) {
            $object->setAuthor(null);
        }
        if (\array_key_exists('teaser', $data) && $data['teaser'] !== null) {
            $object->setTeaser($data['teaser']);
        }
        elseif (\array_key_exists('teaser', $data) && $data['teaser'] === null) {
            $object->setTeaser(null);
        }
        if (\array_key_exists('teaser_img_url', $data) && $data['teaser_img_url'] !== null) {
            $object->setTeaserImgUrl($data['teaser_img_url']);
        }
        elseif (\array_key_exists('teaser_img_url', $data) && $data['teaser_img_url'] === null) {
            $object->setTeaserImgUrl(null);
        }
        if (\array_key_exists('teaser_img_subline', $data) && $data['teaser_img_subline'] !== null) {
            $object->setTeaserImgSubline($data['teaser_img_subline']);
        }
        elseif (\array_key_exists('teaser_img_subline', $data) && $data['teaser_img_subline'] === null) {
            $object->setTeaserImgSubline(null);
        }
        if (\array_key_exists('body', $data) && $data['body'] !== null) {
            $object->setBody($data['body']);
        }
        elseif (\array_key_exists('body', $data) && $data['body'] === null) {
            $object->setBody(null);
        }
        if (\array_key_exists('section', $data) && $data['section'] !== null) {
            $object->setSection($data['section']);
        }
        elseif (\array_key_exists('section', $data) && $data['section'] === null) {
            $object->setSection(null);
        }
        if (\array_key_exists('date', $data) && $data['date'] !== null) {
            $object->setDate($data['date']);
        }
        elseif (\array_key_exists('date', $data) && $data['date'] === null) {
            $object->setDate(null);
        }
        if (\array_key_exists('startdate', $data) && $data['startdate'] !== null) {
            $object->setStartdate($data['startdate']);
        }
        elseif (\array_key_exists('startdate', $data) && $data['startdate'] === null) {
            $object->setStartdate(null);
        }
        if (\array_key_exists('enddate', $data) && $data['enddate'] !== null) {
            $object->setEnddate($data['enddate']);
        }
        elseif (\array_key_exists('enddate', $data) && $data['enddate'] === null) {
            $object->setEnddate(null);
        }
        if (\array_key_exists('published_date', $data) && $data['published_date'] !== null) {
            $object->setPublishedDate($data['published_date']);
        }
        elseif (\array_key_exists('published_date', $data) && $data['published_date'] === null) {
            $object->setPublishedDate(null);
        }
        if (\array_key_exists('updated_date', $data) && $data['updated_date'] !== null) {
            $object->setUpdatedDate($data['updated_date']);
        }
        elseif (\array_key_exists('updated_date', $data) && $data['updated_date'] === null) {
            $object->setUpdatedDate(null);
        }
        if (\array_key_exists('source', $data) && $data['source'] !== null) {
            $object->setSource($data['source']);
        }
        elseif (\array_key_exists('source', $data) && $data['source'] === null) {
            $object->setSource(null);
        }
        if (\array_key_exists('agentur', $data) && $data['agentur'] !== null) {
            $object->setAgentur($data['agentur']);
        }
        elseif (\array_key_exists('agentur', $data) && $data['agentur'] === null) {
            $object->setAgentur(null);
        }
        if (\array_key_exists('channel', $data) && $data['channel'] !== null) {
            $object->setChannel($data['channel']);
        }
        elseif (\array_key_exists('channel', $data) && $data['channel'] === null) {
            $object->setChannel(null);
        }
        if (\array_key_exists('article_score', $data) && $data['article_score'] !== null) {
            $object->setArticleScore($data['article_score']);
        }
        elseif (\array_key_exists('article_score', $data) && $data['article_score'] === null) {
            $object->setArticleScore(null);
        }
        if (\array_key_exists('pi_last_72h', $data) && $data['pi_last_72h'] !== null) {
            $object->setPiLast72h($data['pi_last_72h']);
        }
        elseif (\array_key_exists('pi_last_72h', $data) && $data['pi_last_72h'] === null) {
            $object->setPiLast72h(null);
        }
        if (\array_key_exists('ga_last_seen', $data) && $data['ga_last_seen'] !== null) {
            $object->setGaLastSeen($data['ga_last_seen']);
        }
        elseif (\array_key_exists('ga_last_seen', $data) && $data['ga_last_seen'] === null) {
            $object->setGaLastSeen(null);
        }
        if (\array_key_exists('comments_count', $data) && $data['comments_count'] !== null) {
            $object->setCommentsCount($data['comments_count']);
        }
        elseif (\array_key_exists('comments_count', $data) && $data['comments_count'] === null) {
            $object->setCommentsCount(null);
        }
        if (\array_key_exists('socialmedia_shares', $data) && $data['socialmedia_shares'] !== null) {
            $object->setSocialmediaShares($data['socialmedia_shares']);
        }
        elseif (\array_key_exists('socialmedia_shares', $data) && $data['socialmedia_shares'] === null) {
            $object->setSocialmediaShares(null);
        }
        if (\array_key_exists('socialmedia_traffic', $data) && $data['socialmedia_traffic'] !== null) {
            $object->setSocialmediaTraffic($data['socialmedia_traffic']);
        }
        elseif (\array_key_exists('socialmedia_traffic', $data) && $data['socialmedia_traffic'] === null) {
            $object->setSocialmediaTraffic(null);
        }
        if (\array_key_exists('retention_period', $data) && $data['retention_period'] !== null) {
            $object->setRetentionPeriod($data['retention_period']);
        }
        elseif (\array_key_exists('retention_period', $data) && $data['retention_period'] === null) {
            $object->setRetentionPeriod(null);
        }
        if (\array_key_exists('video_views', $data) && $data['video_views'] !== null) {
            $object->setVideoViews($data['video_views']);
        }
        elseif (\array_key_exists('video_views', $data) && $data['video_views'] === null) {
            $object->setVideoViews(null);
        }
        if (\array_key_exists('bounce_rate', $data) && $data['bounce_rate'] !== null) {
            $object->setBounceRate($data['bounce_rate']);
        }
        elseif (\array_key_exists('bounce_rate', $data) && $data['bounce_rate'] === null) {
            $object->setBounceRate(null);
        }
        if (\array_key_exists('pin', $data) && $data['pin'] !== null) {
            $object->setPin($this->denormalizer->denormalize($data['pin'], 'telekurier\\RetrescoClient\\Model\\Pin', 'json', $context));
        }
        elseif (\array_key_exists('pin', $data) && $data['pin'] === null) {
            $object->setPin(null);
        }
        if (\array_key_exists('rtr_persons', $data) && $data['rtr_persons'] !== null) {
            $values = array();
            foreach ($data['rtr_persons'] as $value) {
                $values[] = $value;
            }
            $object->setRtrPersons($values);
        }
        elseif (\array_key_exists('rtr_persons', $data) && $data['rtr_persons'] === null) {
            $object->setRtrPersons(null);
        }
        if (\array_key_exists('rtr_locations', $data) && $data['rtr_locations'] !== null) {
            $values_1 = array();
            foreach ($data['rtr_locations'] as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRtrLocations($values_1);
        }
        elseif (\array_key_exists('rtr_locations', $data) && $data['rtr_locations'] === null) {
            $object->setRtrLocations(null);
        }
        if (\array_key_exists('rtr_organisations', $data) && $data['rtr_organisations'] !== null) {
            $values_2 = array();
            foreach ($data['rtr_organisations'] as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setRtrOrganisations($values_2);
        }
        elseif (\array_key_exists('rtr_organisations', $data) && $data['rtr_organisations'] === null) {
            $object->setRtrOrganisations(null);
        }
        if (\array_key_exists('rtr_products', $data) && $data['rtr_products'] !== null) {
            $values_3 = array();
            foreach ($data['rtr_products'] as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setRtrProducts($values_3);
        }
        elseif (\array_key_exists('rtr_products', $data) && $data['rtr_products'] === null) {
            $object->setRtrProducts(null);
        }
        if (\array_key_exists('rtr_events', $data) && $data['rtr_events'] !== null) {
            $values_4 = array();
            foreach ($data['rtr_events'] as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setRtrEvents($values_4);
        }
        elseif (\array_key_exists('rtr_events', $data) && $data['rtr_events'] === null) {
            $object->setRtrEvents(null);
        }
        if (\array_key_exists('rtr_keywords', $data) && $data['rtr_keywords'] !== null) {
            $values_5 = array();
            foreach ($data['rtr_keywords'] as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setRtrKeywords($values_5);
        }
        elseif (\array_key_exists('rtr_keywords', $data) && $data['rtr_keywords'] === null) {
            $object->setRtrKeywords(null);
        }
        if (\array_key_exists('rtr_tags', $data) && $data['rtr_tags'] !== null) {
            $values_6 = array();
            foreach ($data['rtr_tags'] as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setRtrTags($values_6);
        }
        elseif (\array_key_exists('rtr_tags', $data) && $data['rtr_tags'] === null) {
            $object->setRtrTags(null);
        }
        if (\array_key_exists('payload', $data) && $data['payload'] !== null) {
            $object->setPayload($data['payload']);
        }
        elseif (\array_key_exists('payload', $data) && $data['payload'] === null) {
            $object->setPayload(null);
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