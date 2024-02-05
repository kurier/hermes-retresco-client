<?php

namespace telekurier\RetrescoClient\Normalizer;

use telekurier\RetrescoClient\Runtime\Normalizer\CheckArray;
use telekurier\RetrescoClient\Runtime\Normalizer\ValidatorTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
class JaneObjectNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;
    use CheckArray;
    use ValidatorTrait;
    protected $normalizers = array('telekurier\\RetrescoClient\\Model\\Location' => 'telekurier\\RetrescoClient\\Normalizer\\LocationNormalizer', 'telekurier\\RetrescoClient\\Model\\Pin' => 'telekurier\\RetrescoClient\\Normalizer\\PinNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoDocument' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoDocumentNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoDocuments' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoDocumentsNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoEntityLinks' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoEntityLinksNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoSearchQuery' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoSearchQueryNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoClientError' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoClientErrorNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoTopicPageNormalizer', 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPages' => 'telekurier\\RetrescoClient\\Normalizer\\RetrescoTopicPagesNormalizer', 'telekurier\\RetrescoClient\\Model\\ElasticSearchRawResult' => 'telekurier\\RetrescoClient\\Normalizer\\ElasticSearchRawResultNormalizer', 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation' => 'telekurier\\RetrescoClient\\Normalizer\\ElasticSearchAggregationNormalizer', 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult' => 'telekurier\\RetrescoClient\\Normalizer\\ElasticSearchResultNormalizer', '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => '\\telekurier\\RetrescoClient\\Runtime\\Normalizer\\ReferenceNormalizer'), $normalizersCache = array();
    public function supportsDenormalization($data, $type, $format = null, array $context = array()) : bool
    {
        return array_key_exists($type, $this->normalizers);
    }
    public function supportsNormalization($data, $format = null, array $context = array()) : bool
    {
        return is_object($data) && array_key_exists(get_class($data), $this->normalizers);
    }
    /**
     * @return array|string|int|float|bool|\ArrayObject|null
     */
    public function normalize($object, $format = null, array $context = array())
    {
        $normalizerClass = $this->normalizers[get_class($object)];
        $normalizer = $this->getNormalizer($normalizerClass);
        return $normalizer->normalize($object, $format, $context);
    }
    /**
     * @return mixed
     */
    public function denormalize($data, $class, $format = null, array $context = array())
    {
        $denormalizerClass = $this->normalizers[$class];
        $denormalizer = $this->getNormalizer($denormalizerClass);
        return $denormalizer->denormalize($data, $class, $format, $context);
    }
    private function getNormalizer(string $normalizerClass)
    {
        return $this->normalizersCache[$normalizerClass] ?? $this->initNormalizer($normalizerClass);
    }
    private function initNormalizer(string $normalizerClass)
    {
        $normalizer = new $normalizerClass();
        $normalizer->setNormalizer($this->normalizer);
        $normalizer->setDenormalizer($this->denormalizer);
        $this->normalizersCache[$normalizerClass] = $normalizer;
        return $normalizer;
    }
    public function getSupportedTypes(?string $format = null) : array
    {
        return array('telekurier\\RetrescoClient\\Model\\Location' => false, 'telekurier\\RetrescoClient\\Model\\Pin' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoDocuments' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoEntityLinks' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoSearchQuery' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPage' => false, 'telekurier\\RetrescoClient\\Model\\RetrescoTopicPages' => false, 'telekurier\\RetrescoClient\\Model\\ElasticSearchRawResult' => false, 'telekurier\\RetrescoClient\\Model\\ElasticSearchAggregation' => false, 'telekurier\\RetrescoClient\\Model\\ElasticSearchResult' => false, '\\Jane\\Component\\JsonSchemaRuntime\\Reference' => false);
    }
}