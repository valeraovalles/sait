<?php

namespace Administracion\UsuarioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RolType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rol','choice', array(
                                            'expanded'=>true, 
                                            'multiple'=>false,))
            #->add('user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Administracion\UsuarioBundle\Entity\Rol'
        ));
    }

    public function getName()
    {
        return 'administracion_usuariobundle_roltype';
    }
}
