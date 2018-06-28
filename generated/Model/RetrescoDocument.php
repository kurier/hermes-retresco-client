<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

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
     * @var string
     */
    protected $published;
    /**
     * @var string
     */
    protected $lifecycle;
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
     * @var string
     */
    protected $channel;
    /**
     * @var int
     */
    protected $articleScore;
    /**
     * @var int
     */
    protected $piLast72h;
    /**
     * @var mixed
     */
    protected $gaLastSeen;
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
     * @var string[]
     */
    protected $rtrTags;
    /**
     * @var mixed
     */
    protected $payload;

    /**
     * @return string
     */
    public function getDocId(): ?string
    {
        return $this->docId;
    }

    /**
     * @param string $docId
     *
     * @return self
     */
    public function setDocId(?string $docId): self
    {
        $this->docId = $docId;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocType(): ?string
    {
        return $this->docType;
    }

    /**
     * @param string $docType
     *
     * @return self
     */
    public function setDocType(?string $docType): self
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @param string $url
     *
     * @return self
     */
    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublished(): ?string
    {
        return $this->published;
    }

    /**
     * @param string $published
     *
     * @return self
     */
    public function setPublished(?string $published): self
    {
        $this->published = $published;

        return $this;
    }

    /**
     * @return string
     */
    public function getLifecycle(): ?string
    {
        return $this->lifecycle;
    }

    /**
     * @param string $lifecycle
     *
     * @return self
     */
    public function setLifecycle(?string $lifecycle): self
    {
        $this->lifecycle = $lifecycle;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string $title
     *
     * @return self
     */
    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getSupertitle(): ?string
    {
        return $this->supertitle;
    }

    /**
     * @param string $supertitle
     *
     * @return self
     */
    public function setSupertitle(?string $supertitle): self
    {
        $this->supertitle = $supertitle;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string $author
     *
     * @return self
     */
    public function setAuthor(?string $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return string
     */
    public function getTeaser(): ?string
    {
        return $this->teaser;
    }

    /**
     * @param string $teaser
     *
     * @return self
     */
    public function setTeaser(?string $teaser): self
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * @return string
     */
    public function getTeaserImgUrl(): ?string
    {
        return $this->teaserImgUrl;
    }

    /**
     * @param string $teaserImgUrl
     *
     * @return self
     */
    public function setTeaserImgUrl(?string $teaserImgUrl): self
    {
        $this->teaserImgUrl = $teaserImgUrl;

        return $this;
    }

    /**
     * @return string
     */
    public function getTeaserImgSubline(): ?string
    {
        return $this->teaserImgSubline;
    }

    /**
     * @param string $teaserImgSubline
     *
     * @return self
     */
    public function setTeaserImgSubline(?string $teaserImgSubline): self
    {
        $this->teaserImgSubline = $teaserImgSubline;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string $body
     *
     * @return self
     */
    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getSection(): ?string
    {
        return $this->section;
    }

    /**
     * @param string $section
     *
     * @return self
     */
    public function setSection(?string $section): self
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
    public function setDate($date): self
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
    public function setStartdate($startdate): self
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
    public function setEnddate($enddate): self
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
    public function setPublishedDate($publishedDate): self
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
    public function setUpdatedDate($updatedDate): self
    {
        $this->updatedDate = $updatedDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return self
     */
    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return string
     */
    public function getAgentur(): ?string
    {
        return $this->agentur;
    }

    /**
     * @param string $agentur
     *
     * @return self
     */
    public function setAgentur(?string $agentur): self
    {
        $this->agentur = $agentur;

        return $this;
    }

    /**
     * @return string
     */
    public function getChannel(): ?string
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     *
     * @return self
     */
    public function setChannel(?string $channel): self
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * @return int
     */
    public function getArticleScore(): ?int
    {
        return $this->articleScore;
    }

    /**
     * @param int $articleScore
     *
     * @return self
     */
    public function setArticleScore(?int $articleScore): self
    {
        $this->articleScore = $articleScore;

        return $this;
    }

    /**
     * @return int
     */
    public function getPiLast72h(): ?int
    {
        return $this->piLast72h;
    }

    /**
     * @param int $piLast72h
     *
     * @return self
     */
    public function setPiLast72h(?int $piLast72h): self
    {
        $this->piLast72h = $piLast72h;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGaLastSeen()
    {
        return $this->gaLastSeen;
    }

    /**
     * @param mixed $gaLastSeen
     *
     * @return self
     */
    public function setGaLastSeen($gaLastSeen): self
    {
        $this->gaLastSeen = $gaLastSeen;

        return $this;
    }

    /**
     * @return int
     */
    public function getCommentsCount(): ?int
    {
        return $this->commentsCount;
    }

    /**
     * @param int $commentsCount
     *
     * @return self
     */
    public function setCommentsCount(?int $commentsCount): self
    {
        $this->commentsCount = $commentsCount;

        return $this;
    }

    /**
     * @return int
     */
    public function getSocialmediaShares(): ?int
    {
        return $this->socialmediaShares;
    }

    /**
     * @param int $socialmediaShares
     *
     * @return self
     */
    public function setSocialmediaShares(?int $socialmediaShares): self
    {
        $this->socialmediaShares = $socialmediaShares;

        return $this;
    }

    /**
     * @return int
     */
    public function getSocialmediaTraffic(): ?int
    {
        return $this->socialmediaTraffic;
    }

    /**
     * @param int $socialmediaTraffic
     *
     * @return self
     */
    public function setSocialmediaTraffic(?int $socialmediaTraffic): self
    {
        $this->socialmediaTraffic = $socialmediaTraffic;

        return $this;
    }

    /**
     * @return int
     */
    public function getRetentionPeriod(): ?int
    {
        return $this->retentionPeriod;
    }

    /**
     * @param int $retentionPeriod
     *
     * @return self
     */
    public function setRetentionPeriod(?int $retentionPeriod): self
    {
        $this->retentionPeriod = $retentionPeriod;

        return $this;
    }

    /**
     * @return int
     */
    public function getVideoViews(): ?int
    {
        return $this->videoViews;
    }

    /**
     * @param int $videoViews
     *
     * @return self
     */
    public function setVideoViews(?int $videoViews): self
    {
        $this->videoViews = $videoViews;

        return $this;
    }

    /**
     * @return int
     */
    public function getBounceRate(): ?int
    {
        return $this->bounceRate;
    }

    /**
     * @param int $bounceRate
     *
     * @return self
     */
    public function setBounceRate(?int $bounceRate): self
    {
        $this->bounceRate = $bounceRate;

        return $this;
    }

    /**
     * @return Pin
     */
    public function getPin(): ?Pin
    {
        return $this->pin;
    }

    /**
     * @param Pin $pin
     *
     * @return self
     */
    public function setPin(?Pin $pin): self
    {
        $this->pin = $pin;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrPersons(): ?array
    {
        return $this->rtrPersons;
    }

    /**
     * @param string[] $rtrPersons
     *
     * @return self
     */
    public function setRtrPersons(?array $rtrPersons): self
    {
        $this->rtrPersons = $rtrPersons;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrLocations(): ?array
    {
        return $this->rtrLocations;
    }

    /**
     * @param string[] $rtrLocations
     *
     * @return self
     */
    public function setRtrLocations(?array $rtrLocations): self
    {
        $this->rtrLocations = $rtrLocations;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrOrganisations(): ?array
    {
        return $this->rtrOrganisations;
    }

    /**
     * @param string[] $rtrOrganisations
     *
     * @return self
     */
    public function setRtrOrganisations(?array $rtrOrganisations): self
    {
        $this->rtrOrganisations = $rtrOrganisations;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrProducts(): ?array
    {
        return $this->rtrProducts;
    }

    /**
     * @param string[] $rtrProducts
     *
     * @return self
     */
    public function setRtrProducts(?array $rtrProducts): self
    {
        $this->rtrProducts = $rtrProducts;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrEvents(): ?array
    {
        return $this->rtrEvents;
    }

    /**
     * @param string[] $rtrEvents
     *
     * @return self
     */
    public function setRtrEvents(?array $rtrEvents): self
    {
        $this->rtrEvents = $rtrEvents;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrKeywords(): ?array
    {
        return $this->rtrKeywords;
    }

    /**
     * @param string[] $rtrKeywords
     *
     * @return self
     */
    public function setRtrKeywords(?array $rtrKeywords): self
    {
        $this->rtrKeywords = $rtrKeywords;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getRtrTags(): ?array
    {
        return $this->rtrTags;
    }

    /**
     * @param string[] $rtrTags
     *
     * @return self
     */
    public function setRtrTags(?array $rtrTags): self
    {
        $this->rtrTags = $rtrTags;

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
    public function setPayload($payload): self
    {
        $this->payload = $payload;

        return $this;
    }
}
