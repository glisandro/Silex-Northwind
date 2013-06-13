<?php

namespace Northwind\Entity;


/**
 * Orders
 *
 * @Table(name="orders")
 * @Entity
 */
class Order
{
    /**
     * @var \DateTime
     *
     * @Column(name="OrderDate", type="datetime", nullable=true)
     */
    private $orderdate;

    /**
     * @var \DateTime
     *
     * @Column(name="RequiredDate", type="datetime", nullable=true)
     */
    private $requireddate;

    /**
     * @var \DateTime
     *
     * @Column(name="ShippedDate", type="datetime", nullable=true)
     */
    private $shippeddate;

    /**
     * @var float
     *
     * @Column(name="Freight", type="decimal", nullable=true)
     */
    private $freight;

    /**
     * @var string
     *
     * @Column(name="ShipName", type="string", length=40, nullable=true)
     */
    private $shipname;

    /**
     * @var string
     *
     * @Column(name="ShipAddress", type="string", length=60, nullable=true)
     */
    private $shipaddress;

    /**
     * @var string
     *
     * @Column(name="ShipCity", type="string", length=15, nullable=true)
     */
    private $shipcity;

    /**
     * @var string
     *
     * @Column(name="ShipRegion", type="string", length=15, nullable=true)
     */
    private $shipregion;

    /**
     * @var string
     *
     * @Column(name="ShipPostalCode", type="string", length=10, nullable=true)
     */
    private $shippostalcode;

    /**
     * @var string
     *
     * @Column(name="ShipCountry", type="string", length=15, nullable=true)
     */
    private $shipcountry;

    /**
     * @var integer
     *
     * @Column(name="OrderID", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $orderid;

    /**
     * @var \Shippers
     *
     * @ManyToOne(targetEntity="Shipper")
     * @JoinColumns({
     *   @JoinColumn(name="ShipVia", referencedColumnName="ShipperID")
     * })
     */
    private $shipvia;

    /**
     * @var \Employees
     *
     * @ManyToOne(targetEntity="Employer")
     * @JoinColumns({
     *   @JoinColumn(name="EmployeeID", referencedColumnName="EmployeeID")
     * })
     */
    private $employeeid;

    /**
     * @var \Customers
     *
     * @ManyToOne(targetEntity="Customer")
     * @JoinColumns({
     *   @JoinColumn(name="CustomerID", referencedColumnName="CustomerID")
     * })
     */
    private $customerid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Product", inversedBy="orderid")
     * @JoinTable(name="`order details`",
     *   joinColumns={
     *     @JoinColumn(name="OrderID", referencedColumnName="OrderID")
     *   },
     *   inverseJoinColumns={
     *     @JoinColumn(name="ProductID", referencedColumnName="ProductID")
     *   }
     * )
     */
    private $productid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productid = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set orderdate
     *
     * @param \DateTime $orderdate
     * @return Orders
     */
    public function setOrderdate($orderdate)
    {
        $this->orderdate = $orderdate;
    
        return $this;
    }

    /**
     * Get orderdate
     *
     * @return \DateTime 
     */
    public function getOrderdate()
    {
        return $this->orderdate;
    }

    /**
     * Set requireddate
     *
     * @param \DateTime $requireddate
     * @return Orders
     */
    public function setRequireddate($requireddate)
    {
        $this->requireddate = $requireddate;
    
        return $this;
    }

    /**
     * Get requireddate
     *
     * @return \DateTime 
     */
    public function getRequireddate()
    {
        return $this->requireddate;
    }

    /**
     * Set shippeddate
     *
     * @param \DateTime $shippeddate
     * @return Orders
     */
    public function setShippeddate($shippeddate)
    {
        $this->shippeddate = $shippeddate;
    
        return $this;
    }

    /**
     * Get shippeddate
     *
     * @return \DateTime 
     */
    public function getShippeddate()
    {
        return $this->shippeddate;
    }

    /**
     * Set freight
     *
     * @param float $freight
     * @return Orders
     */
    public function setFreight($freight)
    {
        $this->freight = $freight;
    
        return $this;
    }

    /**
     * Get freight
     *
     * @return float 
     */
    public function getFreight()
    {
        return $this->freight;
    }

    /**
     * Set shipname
     *
     * @param string $shipname
     * @return Orders
     */
    public function setShipname($shipname)
    {
        $this->shipname = $shipname;
    
        return $this;
    }

    /**
     * Get shipname
     *
     * @return string 
     */
    public function getShipname()
    {
        return $this->shipname;
    }

    /**
     * Set shipaddress
     *
     * @param string $shipaddress
     * @return Orders
     */
    public function setShipaddress($shipaddress)
    {
        $this->shipaddress = $shipaddress;
    
        return $this;
    }

    /**
     * Get shipaddress
     *
     * @return string 
     */
    public function getShipaddress()
    {
        return $this->shipaddress;
    }

    /**
     * Set shipcity
     *
     * @param string $shipcity
     * @return Orders
     */
    public function setShipcity($shipcity)
    {
        $this->shipcity = $shipcity;
    
        return $this;
    }

    /**
     * Get shipcity
     *
     * @return string 
     */
    public function getShipcity()
    {
        return $this->shipcity;
    }

    /**
     * Set shipregion
     *
     * @param string $shipregion
     * @return Orders
     */
    public function setShipregion($shipregion)
    {
        $this->shipregion = $shipregion;
    
        return $this;
    }

    /**
     * Get shipregion
     *
     * @return string 
     */
    public function getShipregion()
    {
        return $this->shipregion;
    }

    /**
     * Set shippostalcode
     *
     * @param string $shippostalcode
     * @return Orders
     */
    public function setShippostalcode($shippostalcode)
    {
        $this->shippostalcode = $shippostalcode;
    
        return $this;
    }

    /**
     * Get shippostalcode
     *
     * @return string 
     */
    public function getShippostalcode()
    {
        return $this->shippostalcode;
    }

    /**
     * Set shipcountry
     *
     * @param string $shipcountry
     * @return Orders
     */
    public function setShipcountry($shipcountry)
    {
        $this->shipcountry = $shipcountry;
    
        return $this;
    }

    /**
     * Get shipcountry
     *
     * @return string 
     */
    public function getShipcountry()
    {
        return $this->shipcountry;
    }

    /**
     * Get orderid
     *
     * @return integer 
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * Set shipvia
     *
     * @param \Shippers $shipvia
     * @return Orders
     */
    public function setShipvia(\Shippers $shipvia = null)
    {
        $this->shipvia = $shipvia;
    
        return $this;
    }

    /**
     * Get shipvia
     *
     * @return \Shippers 
     */
    public function getShipvia()
    {
        return $this->shipvia;
    }

    /**
     * Set employeeid
     *
     * @param \Employees $employeeid
     * @return Orders
     */
    public function setEmployeeid(\Employees $employeeid = null)
    {
        $this->employeeid = $employeeid;
    
        return $this;
    }

    /**
     * Get employeeid
     *
     * @return \Employees 
     */
    public function getEmployeeid()
    {
        return $this->employeeid;
    }

    /**
     * Set customerid
     *
     * @param \Customers $customerid
     * @return Orders
     */
    public function setCustomerid(\Customers $customerid = null)
    {
        $this->customerid = $customerid;
    
        return $this;
    }

    /**
     * Get customerid
     *
     * @return \Customers 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Add productid
     *
     * @param \Products $productid
     * @return Orders
     */
    public function addProductid(\Products $productid)
    {
        $this->productid[] = $productid;
    
        return $this;
    }

    /**
     * Remove productid
     *
     * @param \Products $productid
     */
    public function removeProductid(\Products $productid)
    {
        $this->productid->removeElement($productid);
    }

    /**
     * Get productid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductid()
    {
        return $this->productid;
    }
}
