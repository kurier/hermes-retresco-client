<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoDocument
{
    /**
     * @var string
     */
    protected $docId;
    /**
     * @var string
     */
    protected $docType;
    /**
     * @var string
     */
    protected $url;
    /**
     * @var bool
     */
    protected $published;
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
    protected $author;
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
    protected $section;
    /**
     * @var mixed
     */
    protected $date;
    /**
     * @var mixed
     */
    protected $startdate;
    /**
     * @var mixed
     */
    protected $enddate;
    /**
     * @var mixed
     */
    protected $publishedDate;
    /**
     * @var mixed
     */
    protected $updatedDate;
    /**
     * @var string
     */
    protected $source;
    /**
     * @var string
     */
    protected $agentur;
    /**
     * @var int
     */
    protected $articleScore;
    /**
     * @var int
     */
    protected $piLast72h;
    /**
     * @var int
     */
    protected $commentsCount;
    /**
     * @var int
     */
    protected $socialmediaShares;
    /**
     * @var int
     */
    protected $socialmediaTraffic;
    /**
     * @var int
     */
    protected $retentionPeriod;
    /**
     * @var int
     */
    protected $videoViews;
    /**
     * @var int
     */
    protected $bounceRate;
    /**
     * @var Pin
     */
    protected $pin;
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
     * @var mixed
     */
    protected $payload;
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
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }
    /**
     * @param bool $published
     *
     * @return self
     */
    public function setPublished($published = null)
    {
        $this->published = $published;
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
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date = null)
    {
        $this->date = $date;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }
    /**
     * @param mixed $startdate
     *
     * @return self
     */
    public function setStartdate($startdate = null)
    {
        $this->startdate = $startdate;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getEnddate()
    {
        return $this->enddate;
    }
    /**
     * @param mixed $enddate
     *
     * @return self
     */
    public function setEnddate($enddate = null)
    {
        $this->enddate = $enddate;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }
    /**
     * @param mixed $publishedDate
     *
     * @return self
     */
    public function setPublishedDate($publishedDate = null)
    {
        $this->publishedDate = $publishedDate;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
    /**
     * @param mixed $updatedDate
     *
     * @return self
     */
    public function setUpdatedDate($updatedDate = null)
    {
        $this->updatedDate = $updatedDate;
        return $this;
    }
    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }
    /**
     * @param string $source
     *
     * @return self
     */
    public function setSource($source = null)
    {
        $this->source = $source;
        return $this;
    }
    /**
     * @return string
     */
    public function getAgentur()
    {
        return $this->agentur;
    }
    /**
     * @param string $agentur
     *
     * @return self
     */
    public function setAgentur($agentur = null)
    {
        $this->agentur = $agentur;
        return $this;
    }
    /**
     * @return int
     */
    public function getArticleScore()
    {
        return $this->articleScore;
    }
    /**
     * @param int $articleScore
     *
     * @return self
     */
    public function setArticleScore($articleScore = null)
    {
        $this->articleScore = $articleScore;
        return $this;
    }
    /**
     * @return int
     */
    public function getPiLast72h()
    {
        return $this->piLast72h;
    }
    /**
     * @param int $piLast72h
     *
     * @return self
     */
    public function setPiLast72h($piLast72h = null)
    {
        $this->piLast72h = $piLast72h;
        return $this;
    }
    /**
     * @return int
     */
    public function getCommentsCount()
    {
        return $this->commentsCount;
    }
    /**
     * @param int $commentsCount
     *
     * @return self
     */
    public function setCommentsCount($commentsCount = null)
    {
        $this->commentsCount = $commentsCount;
        return $this;
    }
    /**
     * @return int
     */
    public function getSocialmediaShares()
    {
        return $this->socialmediaShares;
    }
    /**
     * @param int $socialmediaShares
     *
     * @return self
     */
    public function setSocialmediaShares($socialmediaShares = null)
    {
        $this->socialmediaShares = $socialmediaShares;
        return $this;
    }
    /**
     * @return int
     */
    public function getSocialmediaTraffic()
    {
        return $this->socialmediaTraffic;
    }
    /**
     * @param int $socialmediaTraffic
     *
     * @return self
     */
    public function setSocialmediaTraffic($socialmediaTraffic = null)
    {
        $this->socialmediaTraffic = $socialmediaTraffic;
        return $this;
    }
    /**
     * @return int
     */
    public function getRetentionPeriod()
    {
        return $this->retentionPeriod;
    }
    /**
     * @param int $retentionPeriod
     *
     * @return self
     */
    public function setRetentionPeriod($retentionPeriod = null)
    {
        $this->retentionPeriod = $retentionPeriod;
        return $this;
    }
    /**
     * @return int
     */
    public function getVideoViews()
    {
        return $this->videoViews;
    }
    /**
     * @param int $videoViews
     *
     * @return self
     */
    public function setVideoViews($videoViews = null)
    {
        $this->videoViews = $videoViews;
        return $this;
    }
    /**
     * @return int
     */
    public function getBounceRate()
    {
        return $this->bounceRate;
    }
    /**
     * @param int $bounceRate
     *
     * @return self
     */
    public function setBounceRate($bounceRate = null)
    {
        $this->bounceRate = $bounceRate;
        return $this;
    }
    /**
     * @return Pin
     */
    public function getPin()
    {
        return $this->pin;
    }
    /**
     * @param Pin $pin
     *
     * @return self
     */
    public function setPin(Pin $pin = null)
    {
        $this->pin = $pin;
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
    /**
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }
    /**
     * @param mixed $payload
     *
     * @return self
     */
    public function setPayload($payload = null)
    {
        $this->payload = $payload;
        return $this;
    }
}