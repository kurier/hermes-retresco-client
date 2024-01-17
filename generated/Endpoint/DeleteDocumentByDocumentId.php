<?php

namespace telekurier\RetrescoClient\Endpoint;

class DeleteDocumentByDocumentId extends \telekurier\RetrescoClient\Runtime\Client\BaseEndpoint implements \telekurier\RetrescoClient\Runtime\Client\Endpoint
{
    protected $documentId;
    /**
     * Deletes a document.
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
        return 'DELETE';
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
     * @throws \telekurier\RetrescoClient\Exception\DeleteDocumentByDocumentIdInternalServerErrorException
     *
     * @return null|\telekurier\RetrescoClient\Model\RetrescoClientError
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (500 === $status) {
            throw new \telekurier\RetrescoClient\Exception\DeleteDocumentByDocumentIdInternalServerErrorException($serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json'), $response);
        }
        return $serializer->deserialize($body, 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
    }
    public function getAuthenticationScopes() : array
    {
        return array();
    }
}