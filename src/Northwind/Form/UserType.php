<?php
  
namespace GC\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
    public function getName()
    {
        return 'user';
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text');
        $builder->add('email', 'email');
        //$builder->add('password', 'password');
        
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'validation_constraint' => function(Options $options, $value) {
                return new Assert\Collection(array(
                    'fields' => array(
                        'username'  => new Assert\NotBlank(),
                        'email'     => new Assert\NotBlank()
                        //'password'     => new Assert\NotBlank(),
                        ),
                    'allowExtraFields' => true,
                ));       
            }
        ));
    }
}