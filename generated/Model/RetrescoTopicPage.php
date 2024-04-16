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
     * @var string|null
     */
    protected $canonicalTag;
    /**
     * 
     *
     * @var string|null
     */
    protected $docId;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $itemsPerPage;
    /**
     * 
     *
     * @var string|null
     */
    protected $metaDescription;
    /**
     * 
     *
     * @var string|null
     */
    protected $metaTitle;
    /**
     * 
     *
     * @var string|null
     */
    protected $name;
    /**
     * 
     *
     * @var string|null
     */
    protected $query;
    /**
     * 
     *
     * @var string|null
     */
    protected $redirect;
    /**
     * 
     *
     * @var string|null
     */
    protected $section;
    /**
     * 
     *
     * @var string|null
     */
    protected $superTitle;
    /**
     * 
     *
     * @var string|null
     */
    protected $teaser;
    /**
     * 
     *
     * @var string|null
     */
    protected $teaserImg;
    /**
     * 
     *
     * @var string|null
     */
    protected $teaserImgSubline;
    /**
     * 
     *
     * @var string|null
     */
    protected $title;
    /**
     * 
     *
     * @var string|null
     */
    protected $topicType;
    /**
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * 
     *
     * @return string|null
     */
    public function getCanonicalTag() : ?string
    {
        return $this->canonicalTag;
    }
    /**
     * 
     *
     * @param string|null $canonicalTag
     *
     * @return self
     */
    public function setCanonicalTag(?string $canonicalTag) : self
    {
        $this->initialized['canonicalTag'] = true;
        $this->canonicalTag = $canonicalTag;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getDocId() : ?string
    {
        return $this->docId;
    }
    /**
     * 
     *
     * @param string|null $docId
     *
     * @return self
     */
    public function setDocId(?string $docId) : self
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
     * @return string|null
     */
    public function getMetaDescription() : ?string
    {
        return $this->metaDescription;
    }
    /**
     * 
     *
     * @param string|null $metaDescription
     *
     * @return self
     */
    public function setMetaDescription(?string $metaDescription) : self
    {
        $this->initialized['metaDescription'] = true;
        $this->metaDescription = $metaDescription;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getMetaTitle() : ?string
    {
        return $this->metaTitle;
    }
    /**
     * 
     *
     * @param string|null $metaTitle
     *
     * @return self
     */
    public function setMetaTitle(?string $metaTitle) : self
    {
        $this->initialized['metaTitle'] = true;
        $this->metaTitle = $metaTitle;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * 
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getQuery() : ?string
    {
        return $this->query;
    }
    /**
     * 
     *
     * @param string|null $query
     *
     * @return self
     */
    public function setQuery(?string $query) : self
    {
        $this->initialized['query'] = true;
        $this->query = $query;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getRedirect() : ?string
    {
        return $this->redirect;
    }
    /**
     * 
     *
     * @param string|null $redirect
     *
     * @return self
     */
    public function setRedirect(?string $redirect) : self
    {
        $this->initialized['redirect'] = true;
        $this->redirect = $redirect;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getSection() : ?string
    {
        return $this->section;
    }
    /**
     * 
     *
     * @param string|null $section
     *
     * @return self
     */
    public function setSection(?string $section) : self
    {
        $this->initialized['section'] = true;
        $this->section = $section;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getSuperTitle() : ?string
    {
        return $this->superTitle;
    }
    /**
     * 
     *
     * @param string|null $superTitle
     *
     * @return self
     */
    public function setSuperTitle(?string $superTitle) : self
    {
        $this->initialized['superTitle'] = true;
        $this->superTitle = $superTitle;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getTeaser() : ?string
    {
        return $this->teaser;
    }
    /**
     * 
     *
     * @param string|null $teaser
     *
     * @return self
     */
    public function setTeaser(?string $teaser) : self
    {
        $this->initialized['teaser'] = true;
        $this->teaser = $teaser;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getTeaserImg() : ?string
    {
        return $this->teaserImg;
    }
    /**
     * 
     *
     * @param string|null $teaserImg
     *
     * @return self
     */
    public function setTeaserImg(?string $teaserImg) : self
    {
        $this->initialized['teaserImg'] = true;
        $this->teaserImg = $teaserImg;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getTeaserImgSubline() : ?string
    {
        return $this->teaserImgSubline;
    }
    /**
     * 
     *
     * @param string|null $teaserImgSubline
     *
     * @return self
     */
    public function setTeaserImgSubline(?string $teaserImgSubline) : self
    {
        $this->initialized['teaserImgSubline'] = true;
        $this->teaserImgSubline = $teaserImgSubline;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }
    /**
     * 
     *
     * @param string|null $title
     *
     * @return self
     */
    public function setTitle(?string $title) : self
    {
        $this->initialized['title'] = true;
        $this->title = $title;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getTopicType() : ?string
    {
        return $this->topicType;
    }
    /**
     * 
     *
     * @param string|null $topicType
     *
     * @return self
     */
    public function setTopicType(?string $topicType) : self
    {
        $this->initialized['topicType'] = true;
        $this->topicType = $topicType;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getUrl() : ?string
    {
        return $this->url;
    }
    /**
     * 
     *
     * @param string|null $url
     *
     * @return self
     */
    public function setUrl(?string $url) : self
    {
        $this->initialized['url'] = true;
        $this->url = $url;
        return $this;
    }
}