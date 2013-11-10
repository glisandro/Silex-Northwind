<?php

namespace Northwind\Repository;

use Doctrine\ORM\EntityRepository;

class Products extends EntityRepository
{
    public $products = array();
    
    public function getProductsByFilter($app, $categoryid)
    {

        $query = $this->_em->createQueryBuilder();// createQueryBuilder('SELECT p FROM Northwind\Entity\Product WHERE 1 p ORDER BY p.category');
        $query->select('p')
              ->from('Northwind\Entity\Product', 'p')
              ->orderBy('p.category');
              
        if ($categoryid > 0) {
            $query->andWhere('p.category = ?1');
            $query->setParameter(1,$categoryid);    
        }
        /*
        if (!empty($productname)) {
            $query->andWhere($query->expr()->like('p.productname', '?2'));
            $query->setParameter(2,'%'.$productname.'%');
        }*/
        
        $pagerfanta = $app['pagerfanta.pager_factory']->getForDoctrineORM($query)
            ->setMaxPerPage(15)
            ->setCurrentPage(1);
        
        return $pagerfanta;
    }
    
    public function getProductsByCategory($categoryid) 
    {
        $this->products = $this->_em->getRepository('Northwind\Entity\Product')->findBy(array('category' => $categoryid));
        return $this;
    }
    
    public function addProduct(\Northwind\Entity\Product $product) 
    {
        $this->_em->persist($product);   
    }
    
    public function removeProduct(\Northwind\Entity\Product $product) 
    {
        $this->_em->remove($product);   
    }
}


            