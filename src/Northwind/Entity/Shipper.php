<?php

namespace Northwind\Entity;

/**
 * Shippers
 *
 * @Table(name="shippers")
 * @Entity
 */
class Shipper
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
     * @Column(name="Phone", type="string", length=24, nullable=true)
     */
    private $phone;

    /**
     * @var integer
     *
     * @Column(name="ShipperID", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $shipperid;


    /**
     * Set companyname
     *
     * @param string $companyname
     * @return Shippers
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
     * Set phone
     *
     * @param string $phone
     * @return Shippers
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
     * Get shipperid
     *
     * @return integer 
     */
    public function getShipperid()
    {
        return $this->shipperid;
    }
}
