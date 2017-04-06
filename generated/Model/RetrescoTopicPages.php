<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoTopicPages
{
    /**
     * @var TopicPagesTypeahead[]
     */
    protected $docs;
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
}