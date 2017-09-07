<?php

namespace telekurier\RetrescoClient\Model;

class ElasticSearchAggregationBucket
{
    /**
     * @var string
     */
    protected $key;
    /**
     * @var int
     */
    protected $docCount;
    /**
     * @var float
     */
    protected $score;
    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }
    /**
     * @param string $key
     *
     * @return self
     */
    public function setKey($key = null)
    {
        $this->key = $key;
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
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }
    /**
     * @param float $score
     *
     * @return self
     */
    public function setScore($score = null)
    {
        $this->score = $score;
        return $this;
    }
}