<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoTopicPage
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
     * @var string
     */
    protected $canonicalTag;
    /**
     * 
     *
     * @var string
     */
    protected $docId;
    /**
     * 
     *
     * @var mixed
     */
    protected $itemsPerPage;
    /**
     * 
     *
     * @var string
     */
    protected $metaDescription;
    /**
     * 
     *
     * @var string
     */
    protected $metaTitle;
    /**
     * 
     *
     * @var string
     */
    protected $name;
    /**
     * 
     *
     * @var string
     */
    protected $query;
    /**
     * 
     *
     * @var string
     */
    protected $redirect;
    /**
     * 
     *
     * @var string
     */
    protected $section;
    /**
     * 
     *
     * @var string
     */
    protected $superTitle;
    /**
     * 
     *
     * @var string
     */
    protected $teaser;
    /**
     * 
     *
     * @var string
     */
    protected $teaserImg;
    /**
     * 
     *
     * @var string
     */
    protected $teaserImgSubline;
    /**
     * 
     *
     * @var string
     */
    protected $title;
    /**
     * 
     *
     * @var string
     */
    protected $topicType;
    /**
     * 
     *
     * @var string
     */
    protected $url;
    /**
     * 
     *
     * @return string
     */
    public function getCanonicalTag() : string
    {
        return $this->canonicalTag;
    }
    /**
     * 
     *
     * @param string $canonicalTag
     *
     * @return self
     */
    public function setCanonicalTag(string $canonicalTag) : self
    {
        $this->initialized['canonicalTag'] = true;
        $this->canonicalTag = $canonicalTag;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getDocId() : string
    {
        return $this->docId;
    }
    /**
     * 
     *
     * @param string $docId
     *
     * @return self
     */
    public function setDocId(string $docId) : self
    {
        $this->initialized['docId'] = true;
        $this->docId = $docId;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getItemsPerPage()
    {
        return $this->itemsPerPage;
    }
    /**
     * 
     *
     * @param mixed $itemsPerPage
     *
     * @return self
     */
    public function setItemsPerPage($itemsPerPage) : self
    {
        $this->initialized['itemsPerPage'] = true;
        $this->itemsPerPage = $itemsPerPage;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getMetaDescription() : string
    {
        return $this->metaDescription;
    }
    /**
     * 
     *
     * @param string $metaDescription
     *
     * @return self
     */
    public function setMetaDescription(string $metaDescription) : self
    {
        $this->initialized['metaDescription'] = true;
        $this->metaDescription = $metaDescription;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getMetaTitle() : string
    {
        return $this->metaTitle;
    }
    /**
     * 
     *
     * @param string $metaTitle
     *
     * @return self
     */
    public function setMetaTitle(string $metaTitle) : self
    {
        $this->initialized['metaTitle'] = true;
        $this->metaTitle = $metaTitle;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }
    /**
     * 
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getQuery() : string
    {
        return $this->query;
    }
    /**
     * 
     *
     * @param string $query
     *
     * @return self
     */
    public function setQuery(string $query) : self
    {
        $this->initialized['query'] = true;
        $this->query = $query;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getRedirect() : string
    {
        return $this->redirect;
    }
    /**
     * 
     *
     * @param string $redirect
     *
     * @return self
     */
    public function setRedirect(string $redirect) : self
    {
        $this->initialized['redirect'] = true;
        $this->redirect = $redirect;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getSection() : string
    {
        return $this->section;
    }
    /**
     * 
     *
     * @param string $section
     *
     * @return self
     */
    public function setSection(string $section) : self
    {
        $this->initialized['section'] = true;
        $this->section = $section;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getSuperTitle() : string
    {
        return $this->superTitle;
    }
    /**
     * 
     *
     * @param string $superTitle
     *
     * @return self
     */
    public function setSuperTitle(string $superTitle) : self
    {
        $this->initialized['superTitle'] = true;
        $this->superTitle = $superTitle;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getTeaser() : string
    {
        return $this->teaser;
    }
    /**
     * 
     *
     * @param string $teaser
     *
     * @return self
     */
    public function setTeaser(string $teaser) : self
    {
        $this->initialized['teaser'] = true;
        $this->teaser = $teaser;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getTeaserImg() : string
    {
        return $this->teaserImg;
    }
    /**
     * 
     *
     * @param string $teaserImg
     *
     * @return self
     */
    public function setTeaserImg(string $teaserImg) : self
    {
        $this->initialized['teaserImg'] = true;
        $this->teaserImg = $teaserImg;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getTeaserImgSubline() : string
    {
        return $this->teaserImgSubline;
    }
    /**
     * 
     *
     * @param string $teaserImgSubline
     *
     * @return self
     */
    public function setTeaserImgSubline(string $teaserImgSubline) : self
    {
        $this->initialized['teaserImgSubline'] = true;
        $this->teaserImgSubline = $teaserImgSubline;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }
    /**
     * 
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title) : self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getTopicType() : string
    {
        return $this->topicType;
    }
    /**
     * 
     *
     * @param string $topicType
     *
     * @return self
     */
    public function setTopicType(string $topicType) : self
    {
        $this->initialized['topicType'] = true;
        $this->topicType = $topicType;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }
    /**
     * 
     *
     * @param string $url
     *
     * @return self
     */
    public function setUrl(string $url) : self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}