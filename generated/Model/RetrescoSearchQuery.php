<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoSearchQuery
{
    /**
     * @var string
     */
    protected $q;
    /**
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }
    /**
     * @param string $q
     *
     * @return self
     */
    public function setQ($q = null)
    {
        $this->q = $q;
        return $this;
    }
}