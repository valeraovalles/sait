<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ControlpagounidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('status')
            ->add('idEjecutora')
            ->add('idPago')
            ->add('fechaUnidaduno','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    )) 
            ->add('fechaUnidaddos','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    )) 
            ->add('fechaUnidadtres','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    )) 
            ->add('fechaUnidadcuatro','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    )) 
            ->add('fechaUnidadcinco','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                    )) 

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Controlpagounidad'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_controlpagounidadtype';
    }
}
