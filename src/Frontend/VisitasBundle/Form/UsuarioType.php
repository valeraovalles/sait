<?php

namespace Frontend\VisitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombres')
            ->add('apellidos')
            ->add('cedula', 'text')
            ->add('telefono', 'text')
            ->add('direccion', 'textarea')

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\VisitasBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'frontend_visitasbundle_usuariotype';
    }
}
