<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoTopicPages
{
    /**
     * @var RetrescoTopicPage[]
     */
    protected $docs;
    /**
     * @var int
     */
    protected $numFound;
    /**
     * @return RetrescoTopicPage[]
     */
    public function getDocs()
    {
        return $this->docs;
    }
    /**
     * @param RetrescoTopicPage[] $docs
     *
     * @return self
     */
    public function setDocs(array $docs = null)
    {
        $this->docs = $docs;
        return $this;
    }
    /**
     * @return int
     */
    public function getNumFound()
    {
        return $this->numFound;
    }
    /**
     * @param int $numFound
     *
     * @return self
     */
    public function setNumFound($numFound = null)
    {
        $this->numFound = $numFound;
        return $this;
    }
}