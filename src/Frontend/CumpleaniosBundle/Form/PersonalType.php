<?php

namespace Frontend\CumpleaniosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('cedpas')
            ->add('correo')
            ->add('ubicacion')
            ->add('fechanac', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-y'))
            ->add('sexo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\CumpleaniosBundle\Entity\Personal'
        ));
    }

    public function getName()
    {
        return 'frontend_cumpleaniosbundle_personaltype';
    }
}
