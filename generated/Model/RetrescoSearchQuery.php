<?php

namespace telekurier\RetrescoClient\Model;

class RetrescoSearchQuery
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
     * @var string
     */
    protected $q;
    /**
     * 
     *
     * @var string
     */
    protected $searchFields;
    /**
     * 
     *
     * @var mixed
     */
    protected $resultSize;
    /**
     * 
     *
     * @var mixed
     */
    protected $resultFrom;
    /**
     * 
     *
     * @var string
     */
    protected $sortField;
    /**
     * 
     *
     * @var string
     */
    protected $authors;
    /**
     * 
     *
     * @var string
     */
    protected $locations;
    /**
     * 
     *
     * @var string
     */
    protected $persons;
    /**
     * 
     *
     * @var string
     */
    protected $products;
    /**
     * 
     *
     * @var string
     */
    protected $organisations;
    /**
     * 
     *
     * @var string
     */
    protected $keywords;
    /**
     * 
     *
     * @var string
     */
    protected $sources;
    /**
     * 
     *
     * @var string
     */
    protected $docTypes;
    /**
     * 
     *
     * @var mixed
     */
    protected $published;
    /**
     * 
     *
     * @var mixed
     */
    protected $dateFrom;
    /**
     * 
     *
     * @var mixed
     */
    protected $dateTo;
    /**
     * 
     *
     * @return string
     */
    public function getQ() : string
    {
        return $this->q;
    }
    /**
     * 
     *
     * @param string $q
     *
     * @return self
     */
    public function setQ(string $q) : self
    {
        $this->initialized['q'] = true;
        $this->q = $q;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getSearchFields() : string
    {
        return $this->searchFields;
    }
    /**
     * 
     *
     * @param string $searchFields
     *
     * @return self
     */
    public function setSearchFields(string $searchFields) : self
    {
        $this->initialized['searchFields'] = true;
        $this->searchFields = $searchFields;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getResultSize()
    {
        return $this->resultSize;
    }
    /**
     * 
     *
     * @param mixed $resultSize
     *
     * @return self
     */
    public function setResultSize($resultSize) : self
    {
        $this->initialized['resultSize'] = true;
        $this->resultSize = $resultSize;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getResultFrom()
    {
        return $this->resultFrom;
    }
    /**
     * 
     *
     * @param mixed $resultFrom
     *
     * @return self
     */
    public function setResultFrom($resultFrom) : self
    {
        $this->initialized['resultFrom'] = true;
        $this->resultFrom = $resultFrom;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getSortField() : string
    {
        return $this->sortField;
    }
    /**
     * 
     *
     * @param string $sortField
     *
     * @return self
     */
    public function setSortField(string $sortField) : self
    {
        $this->initialized['sortField'] = true;
        $this->sortField = $sortField;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getAuthors() : string
    {
        return $this->authors;
    }
    /**
     * 
     *
     * @param string $authors
     *
     * @return self
     */
    public function setAuthors(string $authors) : self
    {
        $this->initialized['authors'] = true;
        $this->authors = $authors;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getLocations() : string
    {
        return $this->locations;
    }
    /**
     * 
     *
     * @param string $locations
     *
     * @return self
     */
    public function setLocations(string $locations) : self
    {
        $this->initialized['locations'] = true;
        $this->locations = $locations;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getPersons() : string
    {
        return $this->persons;
    }
    /**
     * 
     *
     * @param string $persons
     *
     * @return self
     */
    public function setPersons(string $persons) : self
    {
        $this->initialized['persons'] = true;
        $this->persons = $persons;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getProducts() : string
    {
        return $this->products;
    }
    /**
     * 
     *
     * @param string $products
     *
     * @return self
     */
    public function setProducts(string $products) : self
    {
        $this->initialized['products'] = true;
        $this->products = $products;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getOrganisations() : string
    {
        return $this->organisations;
    }
    /**
     * 
     *
     * @param string $organisations
     *
     * @return self
     */
    public function setOrganisations(string $organisations) : self
    {
        $this->initialized['organisations'] = true;
        $this->organisations = $organisations;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getKeywords() : string
    {
        return $this->keywords;
    }
    /**
     * 
     *
     * @param string $keywords
     *
     * @return self
     */
    public function setKeywords(string $keywords) : self
    {
        $this->initialized['keywords'] = true;
        $this->keywords = $keywords;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getSources() : string
    {
        return $this->sources;
    }
    /**
     * 
     *
     * @param string $sources
     *
     * @return self
     */
    public function setSources(string $sources) : self
    {
        $this->initialized['sources'] = true;
        $this->sources = $sources;
        return $this;
    }
    /**
     * 
     *
     * @return string
     */
    public function getDocTypes() : string
    {
        return $this->docTypes;
    }
    /**
     * 
     *
     * @param string $docTypes
     *
     * @return self
     */
    public function setDocTypes(string $docTypes) : self
    {
        $this->initialized['docTypes'] = true;
        $this->docTypes = $docTypes;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getPublished()
    {
        return $this->published;
    }
    /**
     * 
     *
     * @param mixed $published
     *
     * @return self
     */
    public function setPublished($published) : self
    {
        $this->initialized['published'] = true;
        $this->published = $published;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }
    /**
     * 
     *
     * @param mixed $dateFrom
     *
     * @return self
     */
    public function setDateFrom($dateFrom) : self
    {
        $this->initialized['dateFrom'] = true;
        $this->dateFrom = $dateFrom;
        return $this;
    }
    /**
     * 
     *
     * @return mixed
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }
    /**
     * 
     *
     * @param mixed $dateTo
     *
     * @return self
     */
    public function setDateTo($dateTo) : self
    {
        $this->initialized['dateTo'] = true;
        $this->dateTo = $dateTo;
        return $this;
    }
}