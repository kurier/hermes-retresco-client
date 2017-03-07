<?php

namespace telekurier\RetrescoClient\Resource;

use Joli\Jane\OpenApi\Client\QueryParam;
use Joli\Jane\OpenApi\Client\Resource;
class DefaultResource extends Resource
{
    /**
     * Deletes a document.
     *
     * @param int $documentId 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\telekurier\RetrescoClient\Model\RetrescoClientError
     */
    public function deleteApiDocumentByDocumentId($documentId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/documents/{documentId}';
        $url = str_replace('{documentId}', urlencode($documentId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'kurier-stage01.rtrsupport.de'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('DELETE', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('500' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('default' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
        }
        return $response;
    }
    /**
     * Gets a document.
     *
     * @param int $documentId 
     * @param array  $parameters List of parameters
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\telekurier\RetrescoClient\Model\RetrescoDocument|\telekurier\RetrescoClient\Model\RetrescoClientError
     */
    public function getApiDocumentByDocumentId($documentId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $url = '/api/documents/{documentId}';
        $url = str_replace('{documentId}', urlencode($documentId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'kurier-stage01.rtrsupport.de'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('GET', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json');
            }
            if ('400' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('404' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('500' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('default' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
        }
        return $response;
    }
    /**
     * Saves a document.
     *
     * @param int $documentId 
     * @param array  $parameters {
     *     @var int $enrich Use semantic enrichment (default: true)
     *     @var int $in_text_links Add in-text links, only when enrich=true (default: false)
     *     @var int $index Index documents (default: true)
     * }
     * @param string $fetch      Fetch mode (object or response)
     *
     * @return \Psr\Http\Message\ResponseInterface|\telekurier\RetrescoClient\Model\RetrescoDocument|\telekurier\RetrescoClient\Model\RetrescoClientError
     */
    public function putApiDocumentByDocumentId($documentId, $parameters = array(), $fetch = self::FETCH_OBJECT)
    {
        $queryParam = new QueryParam();
        $queryParam->setDefault('enrich', NULL);
        $queryParam->setDefault('in_text_links', NULL);
        $queryParam->setDefault('index', NULL);
        $url = '/api/documents/{documentId}';
        $url = str_replace('{documentId}', urlencode($documentId), $url);
        $url = $url . ('?' . $queryParam->buildQueryString($parameters));
        $headers = array_merge(array('Host' => 'kurier-stage01.rtrsupport.de'), $queryParam->buildHeaders($parameters));
        $body = $queryParam->buildFormDataString($parameters);
        $request = $this->messageFactory->createRequest('PUT', $url, $headers, $body);
        $response = $this->httpClient->sendRequest($request);
        if (self::FETCH_OBJECT == $fetch) {
            if ('200' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json');
            }
            if ('201' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoDocument', 'json');
            }
            if ('400' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('409' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('500' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
            if ('default' == $response->getStatusCode()) {
                return $this->serializer->deserialize((string) $response->getBody(), 'telekurier\\RetrescoClient\\Model\\RetrescoClientError', 'json');
            }
        }
        return $response;
    }
}