<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchResult
{
    /**
     * @var RetrescoDocument[]
     */
    protected $hits;
    /**
     * @var int
     */
    protected $maxScore;
    /**
     * @var int
     */
    protected $total;
    /**
     * @return RetrescoDocument[]
     */
    public function getHits()
    {
        return $this->hits;
    }
    /**
     * @param RetrescoDocument[] $hits
     *
     * @return self
     */
    public function setHits(array $hits = null)
    {
        $this->hits = $hits;
        return $this;
    }
    /**
     * @return int
     */
    public function getMaxScore()
    {
        return $this->maxScore;
    }
    /**
     * @param int $maxScore
     *
     * @return self
     */
    public function setMaxScore($maxScore = null)
    {
        $this->maxScore = $maxScore;
        return $this;
    }
    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }
    /**
     * @param int $total
     *
     * @return self
     */
    public function setTotal($total = null)
    {
        $this->total = $total;
        return $this;
    }
}