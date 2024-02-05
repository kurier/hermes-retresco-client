<?php

namespace telekurier\RetrescoClient\Endpoint;

class GetDocumentByDocumentId extends \telekurier\RetrescoClient\Runtime\Client\BaseEndpoint implements \telekurier\RetrescoClient\Runtime\Client\Endpoint
{
    protected $documentId;
    /**
     * Gets a document.
     *
     * @param int $documentId 
     */
    public function __construct(int $documentId)
    {
        $this->documentId = $documentId;
    }
    use \telekurier\RetrescoClient\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
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
    /**
     * {@inheritdoc}
     *
     * @throws \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdBadRequestException
     * @throws \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdNotFoundException
     * @throws \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdInternalServerErrorException
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
        if (400 === $status) {
            throw new \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdBadRequestException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        if (404 === $status) {
            throw new \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdNotFoundException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        if (500 === $status) {
            throw new \telekurier\RetrescoClient\Exception\GetDocumentByDocumentIdInternalServerErrorException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        return $serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}