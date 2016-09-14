<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoSearchQuery
{
    /**
     * @var string
     */
    protected $q;
    /**
     * @var string
     */
    protected $searchFields;
    /**
     * @var mixed
     */
    protected $resultSize;
    /**
     * @var mixed
     */
    protected $resultFrom;
    /**
     * @var string
     */
    protected $sortField;
    /**
     * @var string
     */
    protected $authors;
    /**
     * @var string
     */
    protected $locations;
    /**
     * @var string
     */
    protected $persons;
    /**
     * @var string
     */
    protected $products;
    /**
     * @var string
     */
    protected $organisations;
    /**
     * @var string
     */
    protected $keywords;
    /**
     * @var string
     */
    protected $sources;
    /**
     * @var string
     */
    protected $docTypes;
    /**
     * @var mixed
     */
    protected $published;
    /**
     * @var mixed
     */
    protected $dateFrom;
    /**
     * @var mixed
     */
    protected $dateTo;
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
    /**
     * @return string
     */
    public function getSearchFields()
    {
        return $this->searchFields;
    }
    /**
     * @param string $searchFields
     *
     * @return self
     */
    public function setSearchFields($searchFields = null)
    {
        $this->searchFields = $searchFields;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getResultSize()
    {
        return $this->resultSize;
    }
    /**
     * @param mixed $resultSize
     *
     * @return self
     */
    public function setResultSize($resultSize = null)
    {
        $this->resultSize = $resultSize;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getResultFrom()
    {
        return $this->resultFrom;
    }
    /**
     * @param mixed $resultFrom
     *
     * @return self
     */
    public function setResultFrom($resultFrom = null)
    {
        $this->resultFrom = $resultFrom;
        return $this;
    }
    /**
     * @return string
     */
    public function getSortField()
    {
        return $this->sortField;
    }
    /**
     * @param string $sortField
     *
     * @return self
     */
    public function setSortField($sortField = null)
    {
        $this->sortField = $sortField;
        return $this;
    }
    /**
     * @return string
     */
    public function getAuthors()
    {
        return $this->authors;
    }
    /**
     * @param string $authors
     *
     * @return self
     */
    public function setAuthors($authors = null)
    {
        $this->authors = $authors;
        return $this;
    }
    /**
     * @return string
     */
    public function getLocations()
    {
        return $this->locations;
    }
    /**
     * @param string $locations
     *
     * @return self
     */
    public function setLocations($locations = null)
    {
        $this->locations = $locations;
        return $this;
    }
    /**
     * @return string
     */
    public function getPersons()
    {
        return $this->persons;
    }
    /**
     * @param string $persons
     *
     * @return self
     */
    public function setPersons($persons = null)
    {
        $this->persons = $persons;
        return $this;
    }
    /**
     * @return string
     */
    public function getProducts()
    {
        return $this->products;
    }
    /**
     * @param string $products
     *
     * @return self
     */
    public function setProducts($products = null)
    {
        $this->products = $products;
        return $this;
    }
    /**
     * @return string
     */
    public function getOrganisations()
    {
        return $this->organisations;
    }
    /**
     * @param string $organisations
     *
     * @return self
     */
    public function setOrganisations($organisations = null)
    {
        $this->organisations = $organisations;
        return $this;
    }
    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }
    /**
     * @param string $keywords
     *
     * @return self
     */
    public function setKeywords($keywords = null)
    {
        $this->keywords = $keywords;
        return $this;
    }
    /**
     * @return string
     */
    public function getSources()
    {
        return $this->sources;
    }
    /**
     * @param string $sources
     *
     * @return self
     */
    public function setSources($sources = null)
    {
        $this->sources = $sources;
        return $this;
    }
    /**
     * @return string
     */
    public function getDocTypes()
    {
        return $this->docTypes;
    }
    /**
     * @param string $docTypes
     *
     * @return self
     */
    public function setDocTypes($docTypes = null)
    {
        $this->docTypes = $docTypes;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }
    /**
     * @param mixed $published
     *
     * @return self
     */
    public function setPublished($published = null)
    {
        $this->published = $published;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }
    /**
     * @param mixed $dateFrom
     *
     * @return self
     */
    public function setDateFrom($dateFrom = null)
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }
    /**
     * @return mixed
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }
    /**
     * @param mixed $dateTo
     *
     * @return self
     */
    public function setDateTo($dateTo = null)
    {
        $this->dateTo = $dateTo;
        return $this;
    }
}