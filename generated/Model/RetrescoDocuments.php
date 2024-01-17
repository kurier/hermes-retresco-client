<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoDocuments
{
    /**
     * @var array
     */
    protected $initialized = array();
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var RetrescoDocument[]
     */
    protected $docs;
    /**
     * 
     *
     * @var int
     */
    protected $numFound;
    /**
     * 
     *
     * @return RetrescoDocument[]
     */
    public function getDocs() : array
    {
        return $this->docs;
    }
    /**
     * 
     *
     * @param RetrescoDocument[] $docs
     *
     * @return self
     */
    public function setDocs(array $docs) : self
    {
        $this->initialized['docs'] = true;
        $this->docs = $docs;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getNumFound() : int
    {
        return $this->numFound;
    }
    /**
     * 
     *
     * @param int $numFound
     *
     * @return self
     */
    public function setNumFound(int $numFound) : self
    {
        $this->initialized['numFound'] = true;
        $this->numFound = $numFound;
        return $this;
    }
}