<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoDocument
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
    protected $docId;
    /**
     * 
     *
     * @var string|null
     */
    protected $docType;
    /**
     * 
     *
     * @var string|null
     */
    protected $url;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $published;
    /**
     * 
     *
     * @var string|null
     */
    protected $lifecycle;
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
    protected $supertitle;
    /**
     * 
     *
     * @var string|null
     */
    protected $author;
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
    protected $teaserImgUrl;
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
    protected $body;
    /**
     * 
     *
     * @var string|null
     */
    protected $section;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $date;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $startdate;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $enddate;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $publishedDate;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $updatedDate;
    /**
     * 
     *
     * @var string|null
     */
    protected $source;
    /**
     * 
     *
     * @var string|null
     */
    protected $agentur;
    /**
     * 
     *
     * @var string|null
     */
    protected $channel;
    /**
     * 
     *
     * @var int|null
     */
    protected $articleScore;
    /**
     * 
     *
     * @var int|null
     */
    protected $piLast72h;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $gaLastSeen;
    /**
     * 
     *
     * @var int|null
     */
    protected $commentsCount;
    /**
     * 
     *
     * @var int|null
     */
    protected $socialmediaShares;
    /**
     * 
     *
     * @var int|null
     */
    protected $socialmediaTraffic;
    /**
     * 
     *
     * @var int|null
     */
    protected $retentionPeriod;
    /**
     * 
     *
     * @var int|null
     */
    protected $videoViews;
    /**
     * 
     *
     * @var int|null
     */
    protected $bounceRate;
    /**
     * 
     *
     * @var Pin|null
     */
    protected $pin;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrPersons;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrLocations;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrOrganisations;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrProducts;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrEvents;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrKeywords;
    /**
     * 
     *
     * @var string[]|null
     */
    protected $rtrTags;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $payload;
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
     * @return string|null
     */
    public function getDocType() : ?string
    {
        return $this->docType;
    }
    /**
     * 
     *
     * @param string|null $docType
     *
     * @return self
     */
    public function setDocType(?string $docType) : self
    {
        $this->initialized['docType'] = true;
        $this->docType = $docType;
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
    /**
     * 
     *
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }
    /**
     * 
     *
     * @param mixed $published
     *
     * @return self
     */
    public function setPublished($published) : self
    {
        $this->initialized['published'] = true;
        $this->published = $published;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getLifecycle() : ?string
    {
        return $this->lifecycle;
    }
    /**
     * 
     *
     * @param string|null $lifecycle
     *
     * @return self
     */
    public function setLifecycle(?string $lifecycle) : self
    {
        $this->initialized['lifecycle'] = true;
        $this->lifecycle = $lifecycle;
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
    public function getSupertitle() : ?string
    {
        return $this->supertitle;
    }
    /**
     * 
     *
     * @param string|null $supertitle
     *
     * @return self
     */
    public function setSupertitle(?string $supertitle) : self
    {
        $this->initialized['supertitle'] = true;
        $this->supertitle = $supertitle;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAuthor() : ?string
    {
        return $this->author;
    }
    /**
     * 
     *
     * @param string|null $author
     *
     * @return self
     */
    public function setAuthor(?string $author) : self
    {
        $this->initialized['author'] = true;
        $this->author = $author;
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
    public function getTeaserImgUrl() : ?string
    {
        return $this->teaserImgUrl;
    }
    /**
     * 
     *
     * @param string|null $teaserImgUrl
     *
     * @return self
     */
    public function setTeaserImgUrl(?string $teaserImgUrl) : self
    {
        $this->initialized['teaserImgUrl'] = true;
        $this->teaserImgUrl = $teaserImgUrl;
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
    public function getBody() : ?string
    {
        return $this->body;
    }
    /**
     * 
     *
     * @param string|null $body
     *
     * @return self
     */
    public function setBody(?string $body) : self
    {
        $this->initialized['body'] = true;
        $this->body = $body;
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
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * 
     *
     * @param mixed $date
     *
     * @return self
     */
    public function setDate($date) : self
    {
        $this->initialized['date'] = true;
        $this->date = $date;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }
    /**
     * 
     *
     * @param mixed $startdate
     *
     * @return self
     */
    public function setStartdate($startdate) : self
    {
        $this->initialized['startdate'] = true;
        $this->startdate = $startdate;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getEnddate()
    {
        return $this->enddate;
    }
    /**
     * 
     *
     * @param mixed $enddate
     *
     * @return self
     */
    public function setEnddate($enddate) : self
    {
        $this->initialized['enddate'] = true;
        $this->enddate = $enddate;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getPublishedDate()
    {
        return $this->publishedDate;
    }
    /**
     * 
     *
     * @param mixed $publishedDate
     *
     * @return self
     */
    public function setPublishedDate($publishedDate) : self
    {
        $this->initialized['publishedDate'] = true;
        $this->publishedDate = $publishedDate;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate;
    }
    /**
     * 
     *
     * @param mixed $updatedDate
     *
     * @return self
     */
    public function setUpdatedDate($updatedDate) : self
    {
        $this->initialized['updatedDate'] = true;
        $this->updatedDate = $updatedDate;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getSource() : ?string
    {
        return $this->source;
    }
    /**
     * 
     *
     * @param string|null $source
     *
     * @return self
     */
    public function setSource(?string $source) : self
    {
        $this->initialized['source'] = true;
        $this->source = $source;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAgentur() : ?string
    {
        return $this->agentur;
    }
    /**
     * 
     *
     * @param string|null $agentur
     *
     * @return self
     */
    public function setAgentur(?string $agentur) : self
    {
        $this->initialized['agentur'] = true;
        $this->agentur = $agentur;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getChannel() : ?string
    {
        return $this->channel;
    }
    /**
     * 
     *
     * @param string|null $channel
     *
     * @return self
     */
    public function setChannel(?string $channel) : self
    {
        $this->initialized['channel'] = true;
        $this->channel = $channel;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getArticleScore() : ?int
    {
        return $this->articleScore;
    }
    /**
     * 
     *
     * @param int|null $articleScore
     *
     * @return self
     */
    public function setArticleScore(?int $articleScore) : self
    {
        $this->initialized['articleScore'] = true;
        $this->articleScore = $articleScore;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getPiLast72h() : ?int
    {
        return $this->piLast72h;
    }
    /**
     * 
     *
     * @param int|null $piLast72h
     *
     * @return self
     */
    public function setPiLast72h(?int $piLast72h) : self
    {
        $this->initialized['piLast72h'] = true;
        $this->piLast72h = $piLast72h;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getGaLastSeen()
    {
        return $this->gaLastSeen;
    }
    /**
     * 
     *
     * @param mixed $gaLastSeen
     *
     * @return self
     */
    public function setGaLastSeen($gaLastSeen) : self
    {
        $this->initialized['gaLastSeen'] = true;
        $this->gaLastSeen = $gaLastSeen;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getCommentsCount() : ?int
    {
        return $this->commentsCount;
    }
    /**
     * 
     *
     * @param int|null $commentsCount
     *
     * @return self
     */
    public function setCommentsCount(?int $commentsCount) : self
    {
        $this->initialized['commentsCount'] = true;
        $this->commentsCount = $commentsCount;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getSocialmediaShares() : ?int
    {
        return $this->socialmediaShares;
    }
    /**
     * 
     *
     * @param int|null $socialmediaShares
     *
     * @return self
     */
    public function setSocialmediaShares(?int $socialmediaShares) : self
    {
        $this->initialized['socialmediaShares'] = true;
        $this->socialmediaShares = $socialmediaShares;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getSocialmediaTraffic() : ?int
    {
        return $this->socialmediaTraffic;
    }
    /**
     * 
     *
     * @param int|null $socialmediaTraffic
     *
     * @return self
     */
    public function setSocialmediaTraffic(?int $socialmediaTraffic) : self
    {
        $this->initialized['socialmediaTraffic'] = true;
        $this->socialmediaTraffic = $socialmediaTraffic;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getRetentionPeriod() : ?int
    {
        return $this->retentionPeriod;
    }
    /**
     * 
     *
     * @param int|null $retentionPeriod
     *
     * @return self
     */
    public function setRetentionPeriod(?int $retentionPeriod) : self
    {
        $this->initialized['retentionPeriod'] = true;
        $this->retentionPeriod = $retentionPeriod;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getVideoViews() : ?int
    {
        return $this->videoViews;
    }
    /**
     * 
     *
     * @param int|null $videoViews
     *
     * @return self
     */
    public function setVideoViews(?int $videoViews) : self
    {
        $this->initialized['videoViews'] = true;
        $this->videoViews = $videoViews;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getBounceRate() : ?int
    {
        return $this->bounceRate;
    }
    /**
     * 
     *
     * @param int|null $bounceRate
     *
     * @return self
     */
    public function setBounceRate(?int $bounceRate) : self
    {
        $this->initialized['bounceRate'] = true;
        $this->bounceRate = $bounceRate;
        return $this;
    }
    /**
     * 
     *
     * @return Pin|null
     */
    public function getPin() : ?Pin
    {
        return $this->pin;
    }
    /**
     * 
     *
     * @param Pin|null $pin
     *
     * @return self
     */
    public function setPin(?Pin $pin) : self
    {
        $this->initialized['pin'] = true;
        $this->pin = $pin;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrPersons() : ?array
    {
        return $this->rtrPersons;
    }
    /**
     * 
     *
     * @param string[]|null $rtrPersons
     *
     * @return self
     */
    public function setRtrPersons(?array $rtrPersons) : self
    {
        $this->initialized['rtrPersons'] = true;
        $this->rtrPersons = $rtrPersons;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrLocations() : ?array
    {
        return $this->rtrLocations;
    }
    /**
     * 
     *
     * @param string[]|null $rtrLocations
     *
     * @return self
     */
    public function setRtrLocations(?array $rtrLocations) : self
    {
        $this->initialized['rtrLocations'] = true;
        $this->rtrLocations = $rtrLocations;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrOrganisations() : ?array
    {
        return $this->rtrOrganisations;
    }
    /**
     * 
     *
     * @param string[]|null $rtrOrganisations
     *
     * @return self
     */
    public function setRtrOrganisations(?array $rtrOrganisations) : self
    {
        $this->initialized['rtrOrganisations'] = true;
        $this->rtrOrganisations = $rtrOrganisations;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrProducts() : ?array
    {
        return $this->rtrProducts;
    }
    /**
     * 
     *
     * @param string[]|null $rtrProducts
     *
     * @return self
     */
    public function setRtrProducts(?array $rtrProducts) : self
    {
        $this->initialized['rtrProducts'] = true;
        $this->rtrProducts = $rtrProducts;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrEvents() : ?array
    {
        return $this->rtrEvents;
    }
    /**
     * 
     *
     * @param string[]|null $rtrEvents
     *
     * @return self
     */
    public function setRtrEvents(?array $rtrEvents) : self
    {
        $this->initialized['rtrEvents'] = true;
        $this->rtrEvents = $rtrEvents;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrKeywords() : ?array
    {
        return $this->rtrKeywords;
    }
    /**
     * 
     *
     * @param string[]|null $rtrKeywords
     *
     * @return self
     */
    public function setRtrKeywords(?array $rtrKeywords) : self
    {
        $this->initialized['rtrKeywords'] = true;
        $this->rtrKeywords = $rtrKeywords;
        return $this;
    }
    /**
     * 
     *
     * @return string[]|null
     */
    public function getRtrTags() : ?array
    {
        return $this->rtrTags;
    }
    /**
     * 
     *
     * @param string[]|null $rtrTags
     *
     * @return self
     */
    public function setRtrTags(?array $rtrTags) : self
    {
        $this->initialized['rtrTags'] = true;
        $this->rtrTags = $rtrTags;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getPayload()
    {
        return $this->payload;
    }
    /**
     * 
     *
     * @param mixed $payload
     *
     * @return self
     */
    public function setPayload($payload) : self
    {
        $this->initialized['payload'] = true;
        $this->payload = $payload;
        return $this;
    }
}