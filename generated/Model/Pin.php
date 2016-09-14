<?php

namespace telekurier\RetrescoClient\Model;

class Pin
{
    /**
     * @var Location
     */
    protected $location;
    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * @param Location $location
     *
     * @return self
     */
    public function setLocation(Location $location = null)
    {
        $this->location = $location;
        return $this;
    }
}