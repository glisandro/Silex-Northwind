<?php

namespace Northwind\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

class Categories extends EntityRepository
{
    public function findAll()
    {
        return $this->_em->getRepository('Northwind\Entity\Category')->findBy(array(),array('categoryname'=>'asc'));
    }
    
    public function getFirst()
    {
        $query = $this->_em->createQuery('SELECT c.categoryid, c.categoryname FROM Northwind\Entity\Category c ORDER BY c.categoryname asc')->setFirstResult(0)
                       ->setMaxResults(1);
        $result = $query->execute();
        
        return $result[0]['categoryid'];
        
        echo '<pre>';
        var_dump($query->execute());exit;
        return $query->execute(array(), Query::HYDRATE_SCALAR);
    }
    
    public function getAllCategoriesArray()
    {
        $query = $this->_em->createQuery('SELECT c.categoryid,c.categoryname FROM Northwind\Entity\Category c');
        $categories = $query->execute(array(), Query::HYDRATE_SCALAR);
        
       /* $result = $this->_em->getRepository('Northwind\Entity\Category')->getSingleResult()
                         ->findAll(); */
        $arrCategories = array();
        foreach($categories as $category)
            $arrCategories[$category['categoryid']] = $category['categoryname'];
            
        //echo '<pre>';
        //var_dump($arrCategories);exit;
        return $arrCategories;
        
    }
}

