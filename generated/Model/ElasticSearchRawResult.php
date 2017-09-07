<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchRawResult
{
    /**
     * @var int
     */
    protected $took;
    /**
     * @var mixed
     */
    protected $timedOut;
    /**
     * @var ElasticSearchAggregation[]
     */
    protected $aggregations;
    /**
     * @var ElasticSearchResult
     */
    protected $hits;
    /**
     * @return int
     */
    public function getTook()
    {
        return $this->took;
    }
    /**
     * @param int $took
     *
     * @return self
     */
    public function setTook($took = null)
    {
        $this->took = $took;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getTimedOut()
    {
        return $this->timedOut;
    }
    /**
     * @param mixed $timedOut
     *
     * @return self
     */
    public function setTimedOut($timedOut = null)
    {
        $this->timedOut = $timedOut;
        return $this;
    }
    /**
     * @return ElasticSearchAggregation[]
     */
    public function getAggregations()
    {
        return $this->aggregations;
    }
    /**
     * @param ElasticSearchAggregation[] $aggregations
     *
     * @return self
     */
    public function setAggregations(\ArrayObject $aggregations = null)
    {
        $this->aggregations = $aggregations;
        return $this;
    }
    /**
     * @return ElasticSearchResult
     */
    public function getHits()
    {
        return $this->hits;
    }
    /**
     * @param ElasticSearchResult $hits
     *
     * @return self
     */
    public function setHits(ElasticSearchResult $hits = null)
    {
        $this->hits = $hits;
        return $this;
    }
}