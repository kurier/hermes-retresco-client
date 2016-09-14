<?php

namespace telekurier\RetrescoClient\Model;

class Pin
{
    /**
     * @var mixed[]
     */
    protected $location;
    /**
     * @return mixed[]
     */
    public function getLocation()
    {
        return $this->location;
    }
    /**
     * @param mixed[] $location
     *
     * @return self
     */
    public function setLocation(array $location = null)
    {
        $this->location = $location;
        return $this;
    }
}