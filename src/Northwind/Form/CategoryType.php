<?php

namespace Northwind\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList;


class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('categoryName', 'text')
            ->add('products', 'collection', array(
                'type'           => new ProductType(),
                //'label'          => 'Direcciones',
                'by_reference'   => false,
                //'prototype_data' => new Address(),
                'allow_delete'   => true,
                'allow_add'      => true,
                'attr'           => array(
                    'class' => 'row addresses'
                )
            ))
        ;
    }
     
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Northwind\Entity\Category'
        ));
    }

    public function getName()
    {
        return 'category';
    }
}
