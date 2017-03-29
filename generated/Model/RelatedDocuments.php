<?php

namespace telekurier\RetrescoClient\Model;

class RelatedDocuments
{
    /**
     * @var RetrescoDocument[]
     */
    protected $docs;
    /**
     * @return RetrescoDocument[]
     */
    public function getDocs()
    {
        return $this->docs;
    }
    /**
     * @param RetrescoDocument[] $docs
     *
     * @return self
     */
    public function setDocs(array $docs = null)
    {
        $this->docs = $docs;
        return $this;
    }
}