<?php

namespace telekurier\RetrescoClient\Exception;

class PutDocumentByDocumentIdConflictException extends ConflictException
{
    /**
     * @var \telekurier\RetrescoClient\Model\RetrescoClientError
     */
    private $retrescoClientError;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\telekurier\RetrescoClient\Model\RetrescoClientError $retrescoClientError, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('The document id (parameter) doesn\'t match the doc_id field in the body of the request.');
        $this->retrescoClientError = $retrescoClientError;
        $this->response = $response;
    }
    public function getRetrescoClientError() : \telekurier\RetrescoClient\Model\RetrescoClientError
    {
        return $this->retrescoClientError;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}