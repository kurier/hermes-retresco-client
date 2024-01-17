<?php

namespace telekurier\RetrescoClient\Endpoint;

class PutDocumentByDocumentId extends \telekurier\RetrescoClient\Runtime\Client\BaseEndpoint implements \telekurier\RetrescoClient\Runtime\Client\Endpoint
{
    protected $documentId;
    /**
     * Saves a document.
     *
     * @param int $documentId 
     * @param array $queryParameters {
     *     @var int $enrich Use semantic enrichment (default: true)
     *     @var int $in_text_links Add in-text links, only when enrich=true (default: false)
     *     @var int $index Index documents (default: true)
     * }
     */
    public function __construct(int $documentId, array $queryParameters = array())
    {
        $this->documentId = $documentId;
        $this->queryParameters = $queryParameters;
    }
    use \telekurier\RetrescoClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'PUT';
    }
    public function getUri() : string
    {
        return str_replace(array('{documentId}'), array($this->documentId), '/documents/{documentId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(array('enrich', 'in_text_links', 'index'));
        $optionsResolver->setRequired(array());
        $optionsResolver->setDefaults(array());
        $optionsResolver->addAllowedTypes('enrich', array('int'));
        $optionsResolver->addAllowedTypes('in_text_links', array('int'));
        $optionsResolver->addAllowedTypes('index', array('int'));
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdBadRequestException
     * @throws \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdConflictException
     * @throws \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdInternalServerErrorException
     *
     * @return null|\telekurier\RetrescoClient\Model\RetrescoDocument|\telekurier\RetrescoClient\Model\RetrescoClientError
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json');
        }
        if (201 === $status) {
            return $serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json');
        }
        if (400 === $status) {
            throw new \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdBadRequestException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        if (409 === $status) {
            throw new \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdConflictException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        if (500 === $status) {
            throw new \telekurier\RetrescoClient\Exception\PutDocumentByDocumentIdInternalServerErrorException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        return $serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}