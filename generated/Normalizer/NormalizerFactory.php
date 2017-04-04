<?php

namespace telekurier\RetrescoClient\Normalizer;

class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new \Joli\Jane\Runtime\Normalizer\ArrayDenormalizer();
        $normalizers[] = new LocationNormalizer();
        $normalizers[] = new PinNormalizer();
        $normalizers[] = new RetrescoDocumentNormalizer();
        $normalizers[] = new RelatedDocumentsNormalizer();
        $normalizers[] = new RetrescoEntityLinksNormalizer();
        $normalizers[] = new RetrescoSearchQueryNormalizer();
        $normalizers[] = new RetrescoClientErrorNormalizer();
        return $normalizers;
    }
}