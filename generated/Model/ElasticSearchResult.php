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
     * @var RetrescoDocument[]
     */
    protected $hits;
    /**
     * 
     *
     * @var float
     */
    protected $maxScore;
    /**
     * 
     *
     * @var int
     */
    protected $total;
    /**
     * 
     *
     * @return RetrescoDocument[]
     */
    public function getHits() : array
    {
        return $this->hits;
    }
    /**
     * 
     *
     * @param RetrescoDocument[] $hits
     *
     * @return self
     */
    public function setHits(array $hits) : self
    {
        $this->initialized['hits'] = true;
        $this->hits = $hits;
        return $this;
    }
    /**
     * 
     *
     * @return float
     */
    public function getMaxScore() : float
    {
        return $this->maxScore;
    }
    /**
     * 
     *
     * @param float $maxScore
     *
     * @return self
     */
    public function setMaxScore(float $maxScore) : self
    {
        $this->initialized['maxScore'] = true;
        $this->maxScore = $maxScore;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getTotal() : int
    {
        return $this->total;
    }
    /**
     * 
     *
     * @param int $total
     *
     * @return self
     */
    public function setTotal(int $total) : self
    {
        $this->initialized['total'] = true;
        $this->total = $total;
        return $this;
    }
}