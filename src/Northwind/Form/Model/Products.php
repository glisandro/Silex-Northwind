<?php

namespace Northwind\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Products
{
    /**
    * 
    * @Assert\Valid
    */
    public $products;

    public function __construct($products)
    {
        $this->products = $products;
    }
    /*
    public function removeProduct($entityDelete) {
        foreach ($this->products as $key => $product) {
            if($product->getProductId() === $entityDelete->getProductId()) {   
                unset($this->products[$key]);
            }
        }
    }
    
    public function addProduct($product) {
        $this->products[] = $product;
    }*/
}