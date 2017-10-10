<?php

namespace telekurier\RetrescoClient\Normalizer;

class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer();
        $normalizers[] = new LocationNormalizer();
        $normalizers[] = new PinNormalizer();
        $normalizers[] = new RetrescoDocumentNormalizer();
        $normalizers[] = new RelatedDocumentsNormalizer();
        $normalizers[] = new RetrescoEntityLinksNormalizer();
        $normalizers[] = new RetrescoSearchQueryNormalizer();
        $normalizers[] = new RetrescoClientErrorNormalizer();
        $normalizers[] = new RetrescoTopicPageNormalizer();
        $normalizers[] = new RetrescoTopicPagesNormalizer();
        $normalizers[] = new ElasticSearchRawResultNormalizer();
        $normalizers[] = new ElasticSearchAggregationNormalizer();
        $normalizers[] = new ElasticSearchResultNormalizer();
        return $normalizers;
    }
}