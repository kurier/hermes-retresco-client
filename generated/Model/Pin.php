<?php

namespace telekurier\RetrescoClient\Model;

class Pin
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
     * @var Location|null
     */
    protected $location;
    /**
     * 
     *
     * @return Location|null
     */
    public function getLocation() : ?Location
    {
        return $this->location;
    }
    /**
     * 
     *
     * @param Location|null $location
     *
     * @return self
     */
    public function setLocation(?Location $location) : self
    {
        $this->initialized['location'] = true;
        $this->location = $location;
        return $this;
    }
}