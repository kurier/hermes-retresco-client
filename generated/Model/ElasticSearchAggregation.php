<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchAggregation
{
    /**
     * @var mixed[]
     */
    protected $buckets;
    /**
     * @var int
     */
    protected $docCount;
    /**
     * @var mixed
     */
    protected $value;
    /**
     * @return mixed[]
     */
    public function getBuckets()
    {
        return $this->buckets;
    }
    /**
     * @param mixed[] $buckets
     *
     * @return self
     */
    public function setBuckets(array $buckets = null)
    {
        $this->buckets = $buckets;
        return $this;
    }
    /**
     * @return int
     */
    public function getDocCount()
    {
        return $this->docCount;
    }
    /**
     * @param int $docCount
     *
     * @return self
     */
    public function setDocCount($docCount = null)
    {
        $this->docCount = $docCount;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }
    /**
     * @param mixed $value
     *
     * @return self
     */
    public function setValue($value = null)
    {
        $this->value = $value;
        return $this;
    }
}