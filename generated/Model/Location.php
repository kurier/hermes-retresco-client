<?php

namespace telekurier\RetrescoClient\Model;

class Location
{
    /**
     * @var mixed
     */
    protected $lat;
    /**
     * @var mixed
     */
    protected $lon;
    /**
     * @return mixed
     */
    public function getLat()
    {
        return $this->lat;
    }
    /**
     * @param mixed $lat
     *
     * @return self
     */
    public function setLat($lat = null)
    {
        $this->lat = $lat;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getLon()
    {
        return $this->lon;
    }
    /**
     * @param mixed $lon
     *
     * @return self
     */
    public function setLon($lon = null)
    {
        $this->lon = $lon;
        return $this;
    }
}