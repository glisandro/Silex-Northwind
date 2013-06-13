<?php

namespace Northwind\Entity;

/**
 * Suppliers
 *
 * @Table(name="suppliers")
 * @Entity
 */
class Supplier
{
    /**
     * @var string
     *
     * @Column(name="CompanyName", type="string", length=40, nullable=false)
     */
    private $companyname;

    /**
     * @var string
     *
     * @Column(name="ContactName", type="string", length=30, nullable=true)
     */
    private $contactname;

    /**
     * @var string
     *
     * @Column(name="ContactTitle", type="string", length=30, nullable=true)
     */
    private $contacttitle;

    /**
     * @var string
     *
     * @Column(name="Address", type="string", length=60, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @Column(name="City", type="string", length=15, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @Column(name="Region", type="string", length=15, nullable=true)
     */
    private $region;

    /**
     * @var string
     *
     * @Column(name="PostalCode", type="string", length=10, nullable=true)
     */
    private $postalcode;

    /**
     * @var string
     *
     * @Column(name="Country", type="string", length=15, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @Column(name="Phone", type="string", length=24, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @Column(name="Fax", type="string", length=24, nullable=true)
     */
    private $fax;

    /**
     * @var string
     *
     * @Column(name="HomePage", type="text", nullable=true)
     */
    private $homepage;

    /**
     * @var integer
     *
     * @Column(name="SupplierID", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $supplierid;


    /**
     * Set companyname
     *
     * @param string $companyname
     * @return Suppliers
     */
    public function setCompanyname($companyname)
    {
        $this->companyname = $companyname;
    
        return $this;
    }

    /**
     * Get companyname
     *
     * @return string 
     */
    public function getCompanyname()
    {
        return $this->companyname;
    }

    /**
     * Set contactname
     *
     * @param string $contactname
     * @return Suppliers
     */
    public function setContactname($contactname)
    {
        $this->contactname = $contactname;
    
        return $this;
    }

    /**
     * Get contactname
     *
     * @return string 
     */
    public function getContactname()
    {
        return $this->contactname;
    }

    /**
     * Set contacttitle
     *
     * @param string $contacttitle
     * @return Suppliers
     */
    public function setContacttitle($contacttitle)
    {
        $this->contacttitle = $contacttitle;
    
        return $this;
    }

    /**
     * Get contacttitle
     *
     * @return string 
     */
    public function getContacttitle()
    {
        return $this->contacttitle;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Suppliers
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Suppliers
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set region
     *
     * @param string $region
     * @return Suppliers
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set postalcode
     *
     * @param string $postalcode
     * @return Suppliers
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    
        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string 
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Suppliers
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Suppliers
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Suppliers
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set homepage
     *
     * @param string $homepage
     * @return Suppliers
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    
        return $this;
    }

    /**
     * Get homepage
     *
     * @return string 
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * Get supplierid
     *
     * @return integer 
     */
    public function getSupplierid()
    {
        return $this->supplierid;
    }
}
