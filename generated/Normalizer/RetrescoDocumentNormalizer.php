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
class RetrescoDocumentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    public function supportsDenormalization($data, $type, $format = null)
    {
        if ($type !== 'telekurier\\RetrescoClient\\Model\\RetrescoDocument') {
            return false;
        }
        return true;
    }
    public function supportsNormalization($data, $format = null)
    {
        if ($data instanceof \telekurier\RetrescoClient\Model\RetrescoDocument) {
            return true;
        }
        return false;
    }
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        if (!is_object($data)) {
            throw new InvalidArgumentException();
        }
        $object = new \telekurier\RetrescoClient\Model\RetrescoDocument();
        if (property_exists($data, 'doc_id')) {
            $object->setDocId($data->{'doc_id'});
        }
        if (property_exists($data, 'doc_type')) {
            $object->setDocType($data->{'doc_type'});
        }
        if (property_exists($data, 'url')) {
            $object->setUrl($data->{'url'});
        }
        if (property_exists($data, 'published')) {
            $object->setPublished($data->{'published'});
        }
        if (property_exists($data, 'lifecycle')) {
            $object->setLifecycle($data->{'lifecycle'});
        }
        if (property_exists($data, 'title')) {
            $object->setTitle($data->{'title'});
        }
        if (property_exists($data, 'supertitle')) {
            $object->setSupertitle($data->{'supertitle'});
        }
        if (property_exists($data, 'author')) {
            $object->setAuthor($data->{'author'});
        }
        if (property_exists($data, 'teaser')) {
            $object->setTeaser($data->{'teaser'});
        }
        if (property_exists($data, 'teaser_img_url')) {
            $object->setTeaserImgUrl($data->{'teaser_img_url'});
        }
        if (property_exists($data, 'teaser_img_subline')) {
            $object->setTeaserImgSubline($data->{'teaser_img_subline'});
        }
        if (property_exists($data, 'body')) {
            $object->setBody($data->{'body'});
        }
        if (property_exists($data, 'section')) {
            $object->setSection($data->{'section'});
        }
        if (property_exists($data, 'date')) {
            $object->setDate($data->{'date'});
        }
        if (property_exists($data, 'startdate')) {
            $object->setStartdate($data->{'startdate'});
        }
        if (property_exists($data, 'enddate')) {
            $object->setEnddate($data->{'enddate'});
        }
        if (property_exists($data, 'published_date')) {
            $object->setPublishedDate($data->{'published_date'});
        }
        if (property_exists($data, 'updated_date')) {
            $object->setUpdatedDate($data->{'updated_date'});
        }
        if (property_exists($data, 'source')) {
            $object->setSource($data->{'source'});
        }
        if (property_exists($data, 'agentur')) {
            $object->setAgentur($data->{'agentur'});
        }
        if (property_exists($data, 'channel')) {
            $object->setChannel($data->{'channel'});
        }
        if (property_exists($data, 'article_score')) {
            $object->setArticleScore($data->{'article_score'});
        }
        if (property_exists($data, 'pi_last_72h')) {
            $object->setPiLast72h($data->{'pi_last_72h'});
        }
        if (property_exists($data, 'ga_last_seen')) {
            $object->setGaLastSeen($data->{'ga_last_seen'});
        }
        if (property_exists($data, 'comments_count')) {
            $object->setCommentsCount($data->{'comments_count'});
        }
        if (property_exists($data, 'socialmedia_shares')) {
            $object->setSocialmediaShares($data->{'socialmedia_shares'});
        }
        if (property_exists($data, 'socialmedia_traffic')) {
            $object->setSocialmediaTraffic($data->{'socialmedia_traffic'});
        }
        if (property_exists($data, 'retention_period')) {
            $object->setRetentionPeriod($data->{'retention_period'});
        }
        if (property_exists($data, 'video_views')) {
            $object->setVideoViews($data->{'video_views'});
        }
        if (property_exists($data, 'bounce_rate')) {
            $object->setBounceRate($data->{'bounce_rate'});
        }
        if (property_exists($data, 'pin')) {
            $object->setPin($this->denormalizer->denormalize($data->{'pin'}, 'telekurier\\RetrescoClient\\Model\\Pin', 'json', $context));
        }
        if (property_exists($data, 'rtr_persons')) {
            $values = array();
            foreach ($data->{'rtr_persons'} as $value) {
                $values[] = $value;
            }
            $object->setRtrPersons($values);
        }
        if (property_exists($data, 'rtr_locations')) {
            $values_1 = array();
            foreach ($data->{'rtr_locations'} as $value_1) {
                $values_1[] = $value_1;
            }
            $object->setRtrLocations($values_1);
        }
        if (property_exists($data, 'rtr_organisations')) {
            $values_2 = array();
            foreach ($data->{'rtr_organisations'} as $value_2) {
                $values_2[] = $value_2;
            }
            $object->setRtrOrganisations($values_2);
        }
        if (property_exists($data, 'rtr_products')) {
            $values_3 = array();
            foreach ($data->{'rtr_products'} as $value_3) {
                $values_3[] = $value_3;
            }
            $object->setRtrProducts($values_3);
        }
        if (property_exists($data, 'rtr_events')) {
            $values_4 = array();
            foreach ($data->{'rtr_events'} as $value_4) {
                $values_4[] = $value_4;
            }
            $object->setRtrEvents($values_4);
        }
        if (property_exists($data, 'rtr_keywords')) {
            $values_5 = array();
            foreach ($data->{'rtr_keywords'} as $value_5) {
                $values_5[] = $value_5;
            }
            $object->setRtrKeywords($values_5);
        }
        if (property_exists($data, 'rtr_tags')) {
            $values_6 = array();
            foreach ($data->{'rtr_tags'} as $value_6) {
                $values_6[] = $value_6;
            }
            $object->setRtrTags($values_6);
        }
        if (property_exists($data, 'payload')) {
            $object->setPayload($data->{'payload'});
        }
        return $object;
    }
    public function normalize($object, $format = null, array $context = array())
    {
        $data = new \stdClass();
        if (null !== $object->getDocId()) {
            $data->{'doc_id'} = $object->getDocId();
        }
        if (null !== $object->getDocType()) {
            $data->{'doc_type'} = $object->getDocType();
        }
        if (null !== $object->getUrl()) {
            $data->{'url'} = $object->getUrl();
        }
        if (null !== $object->getPublished()) {
            $data->{'published'} = $object->getPublished();
        }
        if (null !== $object->getLifecycle()) {
            $data->{'lifecycle'} = $object->getLifecycle();
        }
        if (null !== $object->getTitle()) {
            $data->{'title'} = $object->getTitle();
        }
        if (null !== $object->getSupertitle()) {
            $data->{'supertitle'} = $object->getSupertitle();
        }
        if (null !== $object->getAuthor()) {
            $data->{'author'} = $object->getAuthor();
        }
        if (null !== $object->getTeaser()) {
            $data->{'teaser'} = $object->getTeaser();
        }
        if (null !== $object->getTeaserImgUrl()) {
            $data->{'teaser_img_url'} = $object->getTeaserImgUrl();
        }
        if (null !== $object->getTeaserImgSubline()) {
            $data->{'teaser_img_subline'} = $object->getTeaserImgSubline();
        }
        if (null !== $object->getBody()) {
            $data->{'body'} = $object->getBody();
        }
        if (null !== $object->getSection()) {
            $data->{'section'} = $object->getSection();
        }
        if (null !== $object->getDate()) {
            $data->{'date'} = $object->getDate();
        }
        if (null !== $object->getStartdate()) {
            $data->{'startdate'} = $object->getStartdate();
        }
        if (null !== $object->getEnddate()) {
            $data->{'enddate'} = $object->getEnddate();
        }
        if (null !== $object->getPublishedDate()) {
            $data->{'published_date'} = $object->getPublishedDate();
        }
        if (null !== $object->getUpdatedDate()) {
            $data->{'updated_date'} = $object->getUpdatedDate();
        }
        if (null !== $object->getSource()) {
            $data->{'source'} = $object->getSource();
        }
        if (null !== $object->getAgentur()) {
            $data->{'agentur'} = $object->getAgentur();
        }
        if (null !== $object->getChannel()) {
            $data->{'channel'} = $object->getChannel();
        }
        if (null !== $object->getArticleScore()) {
            $data->{'article_score'} = $object->getArticleScore();
        }
        if (null !== $object->getPiLast72h()) {
            $data->{'pi_last_72h'} = $object->getPiLast72h();
        }
        if (null !== $object->getGaLastSeen()) {
            $data->{'ga_last_seen'} = $object->getGaLastSeen();
        }
        if (null !== $object->getCommentsCount()) {
            $data->{'comments_count'} = $object->getCommentsCount();
        }
        if (null !== $object->getSocialmediaShares()) {
            $data->{'socialmedia_shares'} = $object->getSocialmediaShares();
        }
        if (null !== $object->getSocialmediaTraffic()) {
            $data->{'socialmedia_traffic'} = $object->getSocialmediaTraffic();
        }
        if (null !== $object->getRetentionPeriod()) {
            $data->{'retention_period'} = $object->getRetentionPeriod();
        }
        if (null !== $object->getVideoViews()) {
            $data->{'video_views'} = $object->getVideoViews();
        }
        if (null !== $object->getBounceRate()) {
            $data->{'bounce_rate'} = $object->getBounceRate();
        }
        if (null !== $object->getPin()) {
            $data->{'pin'} = $this->normalizer->normalize($object->getPin(), 'json', $context);
        }
        if (null !== $object->getRtrPersons()) {
            $values = array();
            foreach ($object->getRtrPersons() as $value) {
                $values[] = $value;
            }
            $data->{'rtr_persons'} = $values;
        }
        if (null !== $object->getRtrLocations()) {
            $values_1 = array();
            foreach ($object->getRtrLocations() as $value_1) {
                $values_1[] = $value_1;
            }
            $data->{'rtr_locations'} = $values_1;
        }
        if (null !== $object->getRtrOrganisations()) {
            $values_2 = array();
            foreach ($object->getRtrOrganisations() as $value_2) {
                $values_2[] = $value_2;
            }
            $data->{'rtr_organisations'} = $values_2;
        }
        if (null !== $object->getRtrProducts()) {
            $values_3 = array();
            foreach ($object->getRtrProducts() as $value_3) {
                $values_3[] = $value_3;
            }
            $data->{'rtr_products'} = $values_3;
        }
        if (null !== $object->getRtrEvents()) {
            $values_4 = array();
            foreach ($object->getRtrEvents() as $value_4) {
                $values_4[] = $value_4;
            }
            $data->{'rtr_events'} = $values_4;
        }
        if (null !== $object->getRtrKeywords()) {
            $values_5 = array();
            foreach ($object->getRtrKeywords() as $value_5) {
                $values_5[] = $value_5;
            }
            $data->{'rtr_keywords'} = $values_5;
        }
        if (null !== $object->getRtrTags()) {
            $values_6 = array();
            foreach ($object->getRtrTags() as $value_6) {
                $values_6[] = $value_6;
            }
            $data->{'rtr_tags'} = $values_6;
        }
        if (null !== $object->getPayload()) {
            $data->{'payload'} = $object->getPayload();
        }
        return $data;
    }
}