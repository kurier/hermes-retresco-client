<?php

namespace telekurier\RetrescoClient\Model;

class Location
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
     * @var mixed
     */
    protected $lat;
    /**
     * 
     *
     * @var mixed
     */
    protected $lon;
    /**
     * 
     *
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }
    /**
     * 
     *
     * @param mixed $lat
     *
     * @return self
     */
    public function setLat($lat) : self
    {
        $this->initialized['lat'] = true;
        $this->lat = $lat;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getLon()
    {
        return $this->lon;
    }
    /**
     * 
     *
     * @param mixed $lon
     *
     * @return self
     */
    public function setLon($lon) : self
    {
        $this->initialized['lon'] = true;
        $this->lon = $lon;
        return $this;
    }
}