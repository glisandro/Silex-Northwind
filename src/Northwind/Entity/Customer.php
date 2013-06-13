<?php

namespace Northwind\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customers
 *
 * @Table(name="customers")
 * @Entity
 */
class Customer
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
     * @Column(name="CustomerID", type="string")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $customerid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Customerdemographics", inversedBy="customerid")
     * @JoinTable(name="customercustomerdemo",
     *   joinColumns={
     *     @JoinColumn(name="CustomerID", referencedColumnName="CustomerID")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="CustomerTypeID", referencedColumnName="CustomerTypeID")
     *   }
     * )
     */
    private $customertypeid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->customertypeid = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set companyname
     *
     * @param string $companyname
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * @return Customers
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
     * Get customerid
     *
     * @return string 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Add customertypeid
     *
     * @param \Customerdemographics $customertypeid
     * @return Customers
     */
    public function addCustomertypeid(\Customerdemographics $customertypeid)
    {
        $this->customertypeid[] = $customertypeid;
    
        return $this;
    }

    /**
     * Remove customertypeid
     *
     * @param \Customerdemographics $customertypeid
     */
    public function removeCustomertypeid(\Customerdemographics $customertypeid)
    {
        $this->customertypeid->removeElement($customertypeid);
    }

    /**
     * Get customertypeid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomertypeid()
    {
        return $this->customertypeid;
    }
}
