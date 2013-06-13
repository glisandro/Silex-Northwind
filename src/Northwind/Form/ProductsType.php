<?php
  
namespace Northwind\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Northwind\Entity\Product;
use Northwind\Form;

class ProductsType extends AbstractType
{
    public function getName()
    {
        return 'products';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('products', 'collection', array(
            'type'           => new ProductType(),
            'attr' => array('class' => 'table table-striped table-bordered table-hover'),
            //label for each team form type
            'prototype' => true,
            'by_reference'   => true,
            //'prototype_data' => new Product(),
            'allow_delete'   => true,
            'allow_add'      => true,
            'options' => array(
              'attr' => array('class' => 'team-collection')
            ),
        )); 
        
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Northwind\Form\Model\Products'
        ));
    }
    

}