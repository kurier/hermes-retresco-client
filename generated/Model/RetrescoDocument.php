<?php

namespace drunomics\RetrescoClient\Model;

class RetrescoDocument
{
    /**
     * @var string
     */
    protected $docId;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $supertitle;
    /**
     * @var string
     */
    protected $teaser;
    /**
     * @var string
     */
    protected $teaserImgUrl;
    /**
     * @var string
     */
    protected $teaserImgSubline;
    /**
     * @var string
     */
    protected $body;
    /**
     * @var string
     */
    protected $author;
    /**
     * @var string
     */
    protected $docType;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var string
     */
    protected $section;
    /**
     * @var string
     */
    protected $date;
    /**
     * @var string
     */
    protected $startdate;
    /**
     * @var string
     */
    protected $enddate;
    /**
     * @var string[]
     */
    protected $rtrPersons;
    /**
     * @var string[]
     */
    protected $rtrLocations;
    /**
     * @var string[]
     */
    protected $rtrOrganisations;
    /**
     * @var string[]
     */
    protected $rtrProducts;
    /**
     * @var string[]
     */
    protected $rtrEvents;
    /**
     * @var string[]
     */
    protected $rtrKeywords;
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
    public function getSupertitle()
    {
        return $this->supertitle;
    }
    /**
     * @param string $supertitle
     *
     * @return self
     */
    public function setSupertitle($supertitle = null)
    {
        $this->supertitle = $supertitle;
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
    public function getTeaserImgUrl()
    {
        return $this->teaserImgUrl;
    }
    /**
     * @param string $teaserImgUrl
     *
     * @return self
     */
    public function setTeaserImgUrl($teaserImgUrl = null)
    {
        $this->teaserImgUrl = $teaserImgUrl;
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
    public function getBody()
    {
        return $this->body;
    }
    /**
     * @param string $body
     *
     * @return self
     */
    public function setBody($body = null)
    {
        $this->body = $body;
        return $this;
    }
    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
    /**
     * @param string $author
     *
     * @return self
     */
    public function setAuthor($author = null)
    {
        $this->author = $author;
        return $this;
    }
    /**
     * @return string
     */
    public function getDocType()
    {
        return $this->docType;
    }
    /**
     * @param string $docType
     *
     * @return self
     */
    public function setDocType($docType = null)
    {
        $this->docType = $docType;
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
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @param string $date
     *
     * @return self
     */
    public function setDate($date = null)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * @return string
     */
    public function getStartdate()
    {
        return $this->startdate;
    }
    /**
     * @param string $startdate
     *
     * @return self
     */
    public function setStartdate($startdate = null)
    {
        $this->startdate = $startdate;
        return $this;
    }
    /**
     * @return string
     */
    public function getEnddate()
    {
        return $this->enddate;
    }
    /**
     * @param string $enddate
     *
     * @return self
     */
    public function setEnddate($enddate = null)
    {
        $this->enddate = $enddate;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getRtrPersons()
    {
        return $this->rtrPersons;
    }
    /**
     * @param string[] $rtrPersons
     *
     * @return self
     */
    public function setRtrPersons(array $rtrPersons = null)
    {
        $this->rtrPersons = $rtrPersons;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getRtrLocations()
    {
        return $this->rtrLocations;
    }
    /**
     * @param string[] $rtrLocations
     *
     * @return self
     */
    public function setRtrLocations(array $rtrLocations = null)
    {
        $this->rtrLocations = $rtrLocations;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getRtrOrganisations()
    {
        return $this->rtrOrganisations;
    }
    /**
     * @param string[] $rtrOrganisations
     *
     * @return self
     */
    public function setRtrOrganisations(array $rtrOrganisations = null)
    {
        $this->rtrOrganisations = $rtrOrganisations;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getRtrProducts()
    {
        return $this->rtrProducts;
    }
    /**
     * @param string[] $rtrProducts
     *
     * @return self
     */
    public function setRtrProducts(array $rtrProducts = null)
    {
        $this->rtrProducts = $rtrProducts;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getRtrEvents()
    {
        return $this->rtrEvents;
    }
    /**
     * @param string[] $rtrEvents
     *
     * @return self
     */
    public function setRtrEvents(array $rtrEvents = null)
    {
        $this->rtrEvents = $rtrEvents;
        return $this;
    }
    /**
     * @return string[]
     */
    public function getRtrKeywords()
    {
        return $this->rtrKeywords;
    }
    /**
     * @param string[] $rtrKeywords
     *
     * @return self
     */
    public function setRtrKeywords(array $rtrKeywords = null)
    {
        $this->rtrKeywords = $rtrKeywords;
        return $this;
    }
}