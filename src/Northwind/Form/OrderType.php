<?php

namespace Northwind\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList;


class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
        $builder
            ->add('Orderdate', 'date');
    }
     
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Northwind\Entity\Order'
        ));
    }

    public function getName()
    {
        return 'order';
    }
}
