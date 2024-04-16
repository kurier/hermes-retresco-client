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
     * @var mixed[]|null
     */
    protected $buckets;
    /**
     * 
     *
     * @var int|null
     */
    protected $docCount;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $value;
    /**
     * 
     *
     * @return mixed[]|null
     */
    public function getBuckets() : ?array
    {
        return $this->buckets;
    }
    /**
     * 
     *
     * @param mixed[]|null $buckets
     *
     * @return self
     */
    public function setBuckets(?array $buckets) : self
    {
        $this->initialized['buckets'] = true;
        $this->buckets = $buckets;
        return $this;
    }
    /**
     * 
     *
     * @return int|null
     */
    public function getDocCount() : ?int
    {
        return $this->docCount;
    }
    /**
     * 
     *
     * @param int|null $docCount
     *
     * @return self
     */
    public function setDocCount(?int $docCount) : self
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