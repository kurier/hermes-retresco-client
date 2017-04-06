<?php

namespace telekurier\RetrescoClient\Model;

class TopicPagesTypeahead
{
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $redirect;
    /**
     * @var string
     */
    protected $docId;
    /**
     * @var string
     */
    protected $name;
    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl($url = null)
    {
        $this->url = $url;
        return $this;
    }
    /**
     * @return string
     */
    public function getRedirect()
    {
        return $this->redirect;
    }
    /**
     * @param string $redirect
     *
     * @return self
     */
    public function setRedirect($redirect = null)
    {
        $this->redirect = $redirect;
        return $this;
    }
    /**
     * @return string
     */
    public function getDocId()
    {
        return $this->docId;
    }
    /**
     * @param string $docId
     *
     * @return self
     */
    public function setDocId($docId = null)
    {
        $this->docId = $docId;
        return $this;
    }
    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        $this->name = $name;
        return $this;
    }
}