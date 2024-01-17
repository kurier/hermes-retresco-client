<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoEntityLinks
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
     * @var array<string, string>
     */
    protected $links;
    /**
     * 
     *
     * @return array<string, string>
     */
    public function getLinks() : iterable
    {
        return $this->links;
    }
    /**
     * 
     *
     * @param array<string, string> $links
     *
     * @return self
     */
    public function setLinks(iterable $links) : self
    {
        $this->initialized['links'] = true;
        $this->links = $links;
        return $this;
    }
}