<?php

namespace telekurier\RetrescoClient\Normalizer;

use Joli\Jane\Normalizer\ReferenceNormalizer;
use Joli\Jane\Normalizer\NormalizerArray;
class NormalizerFactory
{
    public static function create()
    {
        $normalizers = array();
        $normalizers[] = new ReferenceNormalizer();
        $normalizers[] = new NormalizerArray();
        $normalizers[] = new LocationNormalizer();
        $normalizers[] = new PinNormalizer();
        $normalizers[] = new RetrescoDocumentNormalizer();
        $normalizers[] = new RelatedDocumentsNormalizer();
        $normalizers[] = new RetrescoSearchQueryNormalizer();
        $normalizers[] = new RetrescoClientErrorNormalizer();
        return $normalizers;
    }
}