<?php
namespace Northwind\Entity;

/**
 * Categories
 *
 * @Table(name="categories")
 * @Entity(repositoryClass="Northwind\Repository\Categories")
 */
class Category
{
    /**
     * @var string
     *
     * @Column(name="CategoryName", type="string", length=15, nullable=false)
     */
    private $categoryname;

    /**
     * @var string
     *
     * @Column(name="Description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @Column(name="Picture", type="blob", nullable=true)
     */
    private $picture;

    /**
     * @var integer
     *
     * @Column(name="CategoryID", type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $categoryid; 

     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ManyToMany(targetEntity="Product", mappedBy="categoryid")
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set categoryname
     *
     * @param string $categoryname
     * @return Categories
     */
    public function setCategoryname($categoryname)
    {
        $this->categoryname = $categoryname;
    
        return $this;
    }

    /**
     * Get categoryname
     *
     * @return string 
     */
    public function getCategoryname()
    {
        return $this->categoryname;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Categories
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set picture
     *
     * @param string $picture
     * @return Categories
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    
        return $this;
    }

    /**
     * Get picture
     *
     * @return string 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get categoryid
     *
     * @return integer 
     */
    public function getCategoryid()
    {
        return $this->categoryid;
    }

    public function setProducts(\Doctrine\Common\Collections\Collection $products)
    {
        $this->products = $products;
        foreach ($products as $product) {
            $product->setCategory($this);
        }
    }
    
    public function getProducts()
    {
        return $this->products;
    }
    
    public function __toString()
    {
        return strval($this->categoryid);
    }
}
