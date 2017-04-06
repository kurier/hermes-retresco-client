<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoTopicPages
{
    /**
     * @var TopicPagesTypeahead[]
     */
    protected $docs;
    /**
     * @var int
     */
    protected $numFound;
    /**
     * @return TopicPagesTypeahead[]
     */
    public function getDocs()
    {
        return $this->docs;
    }
    /**
     * @param TopicPagesTypeahead[] $docs
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