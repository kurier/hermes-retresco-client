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
     * @var string|null
     */
    protected $q;
    /**
     * 
     *
     * @var string|null
     */
    protected $searchFields;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $resultSize;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $resultFrom;
    /**
     * 
     *
     * @var string|null
     */
    protected $sortField;
    /**
     * 
     *
     * @var string|null
     */
    protected $authors;
    /**
     * 
     *
     * @var string|null
     */
    protected $locations;
    /**
     * 
     *
     * @var string|null
     */
    protected $persons;
    /**
     * 
     *
     * @var string|null
     */
    protected $products;
    /**
     * 
     *
     * @var string|null
     */
    protected $organisations;
    /**
     * 
     *
     * @var string|null
     */
    protected $keywords;
    /**
     * 
     *
     * @var string|null
     */
    protected $sources;
    /**
     * 
     *
     * @var string|null
     */
    protected $docTypes;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $published;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $dateFrom;
    /**
     * 
     *
     * @var mixed|null
     */
    protected $dateTo;
    /**
     * 
     *
     * @return string|null
     */
    public function getQ() : ?string
    {
        return $this->q;
    }
    /**
     * 
     *
     * @param string|null $q
     *
     * @return self
     */
    public function setQ(?string $q) : self
    {
        $this->initialized['q'] = true;
        $this->q = $q;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getSearchFields() : ?string
    {
        return $this->searchFields;
    }
    /**
     * 
     *
     * @param string|null $searchFields
     *
     * @return self
     */
    public function setSearchFields(?string $searchFields) : self
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
     * @return string|null
     */
    public function getSortField() : ?string
    {
        return $this->sortField;
    }
    /**
     * 
     *
     * @param string|null $sortField
     *
     * @return self
     */
    public function setSortField(?string $sortField) : self
    {
        $this->initialized['sortField'] = true;
        $this->sortField = $sortField;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getAuthors() : ?string
    {
        return $this->authors;
    }
    /**
     * 
     *
     * @param string|null $authors
     *
     * @return self
     */
    public function setAuthors(?string $authors) : self
    {
        $this->initialized['authors'] = true;
        $this->authors = $authors;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getLocations() : ?string
    {
        return $this->locations;
    }
    /**
     * 
     *
     * @param string|null $locations
     *
     * @return self
     */
    public function setLocations(?string $locations) : self
    {
        $this->initialized['locations'] = true;
        $this->locations = $locations;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getPersons() : ?string
    {
        return $this->persons;
    }
    /**
     * 
     *
     * @param string|null $persons
     *
     * @return self
     */
    public function setPersons(?string $persons) : self
    {
        $this->initialized['persons'] = true;
        $this->persons = $persons;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getProducts() : ?string
    {
        return $this->products;
    }
    /**
     * 
     *
     * @param string|null $products
     *
     * @return self
     */
    public function setProducts(?string $products) : self
    {
        $this->initialized['products'] = true;
        $this->products = $products;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getOrganisations() : ?string
    {
        return $this->organisations;
    }
    /**
     * 
     *
     * @param string|null $organisations
     *
     * @return self
     */
    public function setOrganisations(?string $organisations) : self
    {
        $this->initialized['organisations'] = true;
        $this->organisations = $organisations;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getKeywords() : ?string
    {
        return $this->keywords;
    }
    /**
     * 
     *
     * @param string|null $keywords
     *
     * @return self
     */
    public function setKeywords(?string $keywords) : self
    {
        $this->initialized['keywords'] = true;
        $this->keywords = $keywords;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getSources() : ?string
    {
        return $this->sources;
    }
    /**
     * 
     *
     * @param string|null $sources
     *
     * @return self
     */
    public function setSources(?string $sources) : self
    {
        $this->initialized['sources'] = true;
        $this->sources = $sources;
        return $this;
    }
    /**
     * 
     *
     * @return string|null
     */
    public function getDocTypes() : ?string
    {
        return $this->docTypes;
    }
    /**
     * 
     *
     * @param string|null $docTypes
     *
     * @return self
     */
    public function setDocTypes(?string $docTypes) : self
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