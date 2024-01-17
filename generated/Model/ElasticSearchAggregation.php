<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchAggregation
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
     * @var mixed[]
     */
    protected $buckets;
    /**
     * 
     *
     * @var int
     */
    protected $docCount;
    /**
     * 
     *
     * @var mixed
     */
    protected $value;
    /**
     * 
     *
     * @return mixed[]
     */
    public function getBuckets() : array
    {
        return $this->buckets;
    }
    /**
     * 
     *
     * @param mixed[] $buckets
     *
     * @return self
     */
    public function setBuckets(array $buckets) : self
    {
        $this->initialized['buckets'] = true;
        $this->buckets = $buckets;
        return $this;
    }
    /**
     * 
     *
     * @return int
     */
    public function getDocCount() : int
    {
        return $this->docCount;
    }
    /**
     * 
     *
     * @param int $docCount
     *
     * @return self
     */
    public function setDocCount(int $docCount) : self
    {
        $this->initialized['docCount'] = true;
        $this->docCount = $docCount;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * 
     *
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value) : self
    {
        $this->initialized['value'] = true;
        $this->value = $value;
        return $this;
    }
}