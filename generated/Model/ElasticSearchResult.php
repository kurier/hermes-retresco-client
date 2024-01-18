<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchResult
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
     * @var RetrescoDocument[]|null
     */
    protected $hits;
    /**
     * 
     *
     * @var float|null
     */
    protected $maxScore;
    /**
     * 
     *
     * @var int|null
     */
    protected $total;
    /**
     * 
     *
     * @return RetrescoDocument[]|null
     */
    public function getHits() : ?array
    {
        return $this->hits;
    }
    /**
     * 
     *
     * @param RetrescoDocument[]|null $hits
     *
     * @return self
     */
    public function setHits(?array $hits) : self
    {
        $this->initialized['hits'] = true;
        $this->hits = $hits;
        return $this;
    }
    /**
     * 
     *
     * @return float|null
     */
    public function getMaxScore() : ?float
    {
        return $this->maxScore;
    }
    /**
     * 
     *
     * @param float|null $maxScore
     *
     * @return self
     */
    public function setMaxScore(?float $maxScore) : self
    {
        $this->initialized['maxScore'] = true;
        $this->maxScore = $maxScore;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getTotal() : ?int
    {
        return $this->total;
    }
    /**
     * 
     *
     * @param int|null $total
     *
     * @return self
     */
    public function setTotal(?int $total) : self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}