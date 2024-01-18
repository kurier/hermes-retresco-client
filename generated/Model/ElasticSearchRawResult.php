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
     * @var int|null
     */
    protected $took;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $timedOut;
    /**
     * 
     *
     * @var array<string, ElasticSearchAggregation>|null
     */
    protected $aggregations;
    /**
     * 
     *
     * @var ElasticSearchResult|null
     */
    protected $hits;
    /**
     * 
     *
     * @return int|null
     */
    public function getTook() : ?int
    {
        return $this->took;
    }
    /**
     * 
     *
     * @param int|null $took
     *
     * @return self
     */
    public function setTook(?int $took) : self
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
     * @return array<string, ElasticSearchAggregation>|null
     */
    public function getAggregations() : ?iterable
    {
        return $this->aggregations;
    }
    /**
     * 
     *
     * @param array<string, ElasticSearchAggregation>|null $aggregations
     *
     * @return self
     */
    public function setAggregations(?iterable $aggregations) : self
    {
        $this->initialized['aggregations'] = true;
        $this->aggregations = $aggregations;
        return $this;
    }
    /**
     * 
     *
     * @return ElasticSearchResult|null
     */
    public function getHits() : ?ElasticSearchResult
    {
        return $this->hits;
    }
    /**
     * 
     *
     * @param ElasticSearchResult|null $hits
     *
     * @return self
     */
    public function setHits(?ElasticSearchResult $hits) : self
    {
        $this->initialized['hits'] = true;
        $this->hits = $hits;
        return $this;
    }
}