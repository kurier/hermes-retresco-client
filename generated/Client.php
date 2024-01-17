<?php

namespace telekurier\RetrescoClient;

class Client extends \telekurier\RetrescoClient\Runtime\Client\Client
{
    /**
     * Deletes a document.
     *
     * @param int $documentId 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \telekurier\RetrescoClient\Exception\DeleteDocumentByDocumentIdInternalServerErrorException
     *
     * @return null|\telekurier\RetrescoClient\Model\RetrescoClientError|\Psr\Http\Message\ResponseInterface
     */
    public function deleteDocumentByDocumentId(int $documentId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \telekurier\RetrescoClient\Endpoint\DeleteDocumentByDocumentId($documentId), $fetch);
    }
    /**
     * Gets a document.
     *
     * @param int $documentId 
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdBadRequestException
     * @throws \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdNotFoundException
     * @throws \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdInternalServerErrorException
     *
     * @return null|\telekurier\RetrescoClient\Model\RetrescoDocument|\telekurier\RetrescoClient\Model\RetrescoClientError|\Psr\Http\Message\ResponseInterface
     */
    public function getDocumentByDocumentId(int $documentId, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \telekurier\RetrescoClient\Endpoint\GetDocumentByDocumentId($documentId), $fetch);
    }
    /**
     * Saves a document.
     *
     * @param int $documentId 
     * @param array $queryParameters {
     *     @var int $enrich Use semantic enrichment (default: true)
     *     @var int $in_text_links Add in-text links, only when enrich=true (default: false)
     *     @var int $index Index documents (default: true)
     * }
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     * @throws \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdBadRequestException
     * @throws \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdConflictException
     * @throws \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdInternalServerErrorException
     *
     * @return null|\telekurier\RetrescoClient\Model\RetrescoDocument|\telekurier\RetrescoClient\Model\RetrescoClientError|\Psr\Http\Message\ResponseInterface
     */
    public function putDocumentByDocumentId(int $documentId, array $queryParameters = array(), string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new \telekurier\RetrescoClient\Endpoint\PutDocumentByDocumentId($documentId, $queryParameters), $fetch);
    }
    public static function create($httpClient = null, array $additionalPlugins = array(), array $additionalNormalizers = array())
    {
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
            $plugins = array();
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUriFactory()->createUri('https://kurier-stage01.rtrsupport.de/api');
            $plugins[] = new \Http\Client\Common\Plugin\AddHostPlugin($uri);
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
            if (count($additionalPlugins) > 0) {
                $plugins = array_merge($plugins, $additionalPlugins);
            }
            $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        }
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = array(new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new \telekurier\RetrescoClient\Normalizer\JaneObjectNormalizer());
        if (count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, array(new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(array('json_decode_associative' => true)))));
        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}