<?php

namespace Northwind\Entity;


/**
 * Products
 *
 * @Table(name="products")
 * @Entity(repositoryClass="Northwind\Repository\Products")
 */
class Product
{
    /**
     * @var string
     *
     * @Column(name="ProductName", type="string", length=40, nullable=false)
     */
    private $productname;

    /**
     * @var string
     *
     * @Column(name="QuantityPerUnit", type="string", length=20, nullable=true)
     */
    private $quantityperunit;

    /**
     * @var float
     *
     * @Column(name="UnitPrice", type="decimal", nullable=true)
     */
    private $unitprice;

    /**
     * @var integer
     *
     * @Column(name="UnitsInStock", type="smallint", nullable=true)
     */
    private $unitsinstock;

    /**
     * @var integer
     *
     * @Column(name="UnitsOnOrder", type="smallint", nullable=true)
     */
    private $unitsonorder;

    /**
     * @var integer
     *
     * @Column(name="ReorderLevel", type="smallint", nullable=true)
     */
    private $reorderlevel;

    /**
     * @var boolean
     *
     * @Column(name="Discontinued", type="boolean", nullable=false)
     */
    private $discontinued;

    /**
     * @var integer
     *
     * @Column(name="ProductID", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $productid;

    /**
     * @var \Suppliers
     *
     * @ManyToOne(targetEntity="Supplier")
     * @JoinColumns({
     *   @JoinColumn(name="SupplierID", referencedColumnName="SupplierID")
     * })
     */
    private $supplierid;

    /**
     * @var \Categories
     *
     * @ManyToOne(targetEntity="Category")
     * @JoinColumn(name="CategoryID", referencedColumnName="CategoryID")
     */
    private $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Order", mappedBy="productid")
     */
    private $orderid;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderid = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set productname
     *
     * @param string $productname
     * @return Products
     */
    public function setProductname($productname)
    {
        $this->productname = $productname;
    
        return $this;
    }

    /**
     * Get productname
     *
     * @return string 
     */
    public function getProductname()
    {
        return $this->productname;
    }

    /**
     * Set quantityperunit
     *
     * @param string $quantityperunit
     * @return Products
     */
    public function setQuantityperunit($quantityperunit)
    {
        $this->quantityperunit = $quantityperunit;
    
        return $this;
    }

    /**
     * Get quantityperunit
     *
     * @return string 
     */
    public function getQuantityperunit()
    {
        return $this->quantityperunit;
    }

    /**
     * Set unitprice
     *
     * @param float $unitprice
     * @return Products
     */
    public function setUnitprice($unitprice)
    {
        $this->unitprice = $unitprice;
    
        return $this;
    }

    /**
     * Get unitprice
     *
     * @return float 
     */
    public function getUnitprice()
    {
        return $this->unitprice;
    }

    /**
     * Set unitsinstock
     *
     * @param integer $unitsinstock
     * @return Products
     */
    public function setUnitsinstock($unitsinstock)
    {
        $this->unitsinstock = $unitsinstock;
    
        return $this;
    }

    /**
     * Get unitsinstock
     *
     * @return integer 
     */
    public function getUnitsinstock()
    {
        return $this->unitsinstock;
    }

    /**
     * Set unitsonorder
     *
     * @param integer $unitsonorder
     * @return Products
     */
    public function setUnitsonorder($unitsonorder)
    {
        $this->unitsonorder = $unitsonorder;
    
        return $this;
    }

    /**
     * Get unitsonorder
     *
     * @return integer 
     */
    public function getUnitsonorder()
    {
        return $this->unitsonorder;
    }

    /**
     * Set reorderlevel
     *
     * @param integer $reorderlevel
     * @return Products
     */
    public function setReorderlevel($reorderlevel)
    {
        $this->reorderlevel = $reorderlevel;
    
        return $this;
    }

    /**
     * Get reorderlevel
     *
     * @return integer 
     */
    public function getReorderlevel()
    {
        return $this->reorderlevel;
    }

    /**
     * Set discontinued
     *
     * @param boolean $discontinued
     * @return Products
     */
    public function setDiscontinued($discontinued)
    {
        $this->discontinued = $discontinued;
    
        return $this;
    }

    /**
     * Get discontinued
     *
     * @return boolean 
     */
    public function getDiscontinued()
    {
        return $this->discontinued;
    }

    /**
     * Get productid
     *
     * @return integer 
     */
    public function getProductid()
    {
        return $this->productid;
    }

    /**
     * Set supplierid
     *
     * @param \Suppliers $supplierid
     * @return Products
     */
    public function setSupplierid(Supplier $supplierid = null)
    {
        $this->supplierid = $supplierid;
    
        return $this;
    }

    /**
     * Get supplierid
     *
     * @return \Suppliers 
     */
    public function getSupplierid()
    {
        return $this->supplierid;
    }

    /**
     * Set categoryid
     *
     * @param \Categories $categoryid
     * @return Products
     */
    public function setCategory(Category $categoryid = null)
    {
        $this->category = $categoryid;
    
        return $this;
    }

    /**
     * Get categoryid
     *
     * @return \Categories 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add orderid
     *
     * @param \Orders $orderid
     * @return Products
     */
    public function addOrderid(Order $orderid)
    {
        $this->orderid[] = $orderid;
    
        return $this;
    }

    /**
     * Remove orderid
     *
     * @param \Orders $orderid
     */
    public function removeOrderid(Order $orderid)
    {
        $this->orderid->removeElement($orderid);
    }

    /**
     * Get orderid
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderid()
    {
        return $this->orderid;
    }
    
    public function __toString()
    {
        return strval($this->productid);
    }
    
    public function removeProduct(Product $productid)
    {   var_dump($productid);exit;
        $this->removeElement($productid);
    }
}
