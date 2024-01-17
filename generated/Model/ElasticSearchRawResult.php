<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchRawResult
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
     * @var int
     */
    protected $took;
    /**
     * 
     *
     * @var mixed
     */
    protected $timedOut;
    /**
     * 
     *
     * @var array<string, ElasticSearchAggregation>
     */
    protected $aggregations;
    /**
     * 
     *
     * @var ElasticSearchResult
     */
    protected $hits;
    /**
     * 
     *
     * @return int
     */
    public function getTook() : int
    {
        return $this->took;
    }
    /**
     * 
     *
     * @param int $took
     *
     * @return self
     */
    public function setTook(int $took) : self
    {
        $this->initialized['took'] = true;
        $this->took = $took;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getTimedOut()
    {
        return $this->timedOut;
    }
    /**
     * 
     *
     * @param mixed $timedOut
     *
     * @return self
     */
    public function setTimedOut($timedOut) : self
    {
        $this->initialized['timedOut'] = true;
        $this->timedOut = $timedOut;
        return $this;
    }
    /**
     * 
     *
     * @return array<string, ElasticSearchAggregation>
     */
    public function getAggregations() : iterable
    {
        return $this->aggregations;
    }
    /**
     * 
     *
     * @param array<string, ElasticSearchAggregation> $aggregations
     *
     * @return self
     */
    public function setAggregations(iterable $aggregations) : self
    {
        $this->initialized['aggregations'] = true;
        $this->aggregations = $aggregations;
        return $this;
    }
    /**
     * 
     *
     * @return ElasticSearchResult
     */
    public function getHits() : ElasticSearchResult
    {
        return $this->hits;
    }
    /**
     * 
     *
     * @param ElasticSearchResult $hits
     *
     * @return self
     */
    public function setHits(ElasticSearchResult $hits) : self
    {
        $this->initialized['hits'] = true;
        $this->hits = $hits;
        return $this;
    }
}