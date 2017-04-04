<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoEntityLinks
{
    /**
     * @var string[]
     */
    protected $links;
    /**
     * @return string[]
     */
    public function getLinks()
    {
        return $this->links;
    }
    /**
     * @param string[] $links
     *
     * @return self
     */
    public function setLinks(\ArrayObject $links = null)
    {
        $this->links = $links;
        return $this;
    }
}