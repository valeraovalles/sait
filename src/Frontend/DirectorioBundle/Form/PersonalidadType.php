<?php

namespace Frontend\DirectorioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonalidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('telefono', 'text')
            ->add('ciudad', 'text')
            ->add('email')
            ->add('especialidad',null,array( 'empty_value' => 'Seleccione...'))
            ->add('pais',null,array( 'empty_value' => 'Seleccione...'))
            ->add('paisprocedencia',null,array( 'empty_value' => 'Seleccione...'))
            ->add('archivo','hidden')
            ->add('file','file')
;
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DirectorioBundle\Entity\Personalidad'
        ));
    }


    public function getName()
    {
        return 'frontend_directoriobundle_personalidadtype';
    }


}

