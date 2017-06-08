<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoTopicPage
{
    /**
     * @var string
     */
    protected $canonicalTag;
    /**
     * @var string
     */
    protected $docId;
    /**
     * @var mixed
     */
    protected $itemsPerPage;
    /**
     * @var string
     */
    protected $metaDescription;
    /**
     * @var string
     */
    protected $metaTitle;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $redirect;
    /**
     * @var string
     */
    protected $section;
    /**
     * @var string
     */
    protected $superTitle;
    /**
     * @var string
     */
    protected $teaser;
    /**
     * @var string
     */
    protected $teaserImg;
    /**
     * @var string
     */
    protected $teaserImgSubline;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $topicType;
    /**
     * @var string
     */
    protected $url;
    /**
     * @return string
     */
    public function getCanonicalTag()
    {
        return $this->canonicalTag;
    }
    /**
     * @param string $canonicalTag
     *
     * @return self
     */
    public function setCanonicalTag($canonicalTag = null)
    {
        $this->canonicalTag = $canonicalTag;
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
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }
    /**
     * @param mixed $itemsPerPage
     *
     * @return self
     */
    public function setItemsPerPage($itemsPerPage = null)
    {
        $this->itemsPerPage = $itemsPerPage;
        return $this;
    }
    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }
    /**
     * @param string $metaDescription
     *
     * @return self
     */
    public function setMetaDescription($metaDescription = null)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }
    /**
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }
    /**
     * @param string $metaTitle
     *
     * @return self
     */
    public function setMetaTitle($metaTitle = null)
    {
        $this->metaTitle = $metaTitle;
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
    public function getSection()
    {
        return $this->section;
    }
    /**
     * @param string $section
     *
     * @return self
     */
    public function setSection($section = null)
    {
        $this->section = $section;
        return $this;
    }
    /**
     * @return string
     */
    public function getSuperTitle()
    {
        return $this->superTitle;
    }
    /**
     * @param string $superTitle
     *
     * @return self
     */
    public function setSuperTitle($superTitle = null)
    {
        $this->superTitle = $superTitle;
        return $this;
    }
    /**
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }
    /**
     * @param string $teaser
     *
     * @return self
     */
    public function setTeaser($teaser = null)
    {
        $this->teaser = $teaser;
        return $this;
    }
    /**
     * @return string
     */
    public function getTeaserImg()
    {
        return $this->teaserImg;
    }
    /**
     * @param string $teaserImg
     *
     * @return self
     */
    public function setTeaserImg($teaserImg = null)
    {
        $this->teaserImg = $teaserImg;
        return $this;
    }
    /**
     * @return string
     */
    public function getTeaserImgSubline()
    {
        return $this->teaserImgSubline;
    }
    /**
     * @param string $teaserImgSubline
     *
     * @return self
     */
    public function setTeaserImgSubline($teaserImgSubline = null)
    {
        $this->teaserImgSubline = $teaserImgSubline;
        return $this;
    }
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle($title = null)
    {
        $this->title = $title;
        return $this;
    }
    /**
     * @return string
     */
    public function getTopicType()
    {
        return $this->topicType;
    }
    /**
     * @param string $topicType
     *
     * @return self
     */
    public function setTopicType($topicType = null)
    {
        $this->topicType = $topicType;
        return $this;
    }
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
}