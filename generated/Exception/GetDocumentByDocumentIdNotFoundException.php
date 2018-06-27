<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace telekurier\RetrescoClient\Exception;

class GetDocumentByDocumentIdNotFoundException extends \RuntimeException implements ClientException
{
    private $retrescoClientError;

    public function __construct(\telekurier\RetrescoClient\Model\RetrescoClientError $retrescoClientError)
    {
        parent::__construct('Invalid document id.', 404);
        $this->retrescoClientError = $retrescoClientError;
    }

    public function getRetrescoClientError()
    {
        return $this->retrescoClientError;
    }
}
