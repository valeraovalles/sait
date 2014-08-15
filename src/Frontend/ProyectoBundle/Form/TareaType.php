<?php

namespace Frontend\ProyectoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TareaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion','textarea')
            ->add('fechainicio','date',array(
                    'widget' => 'single_text',
                    'format'   => 'dd-MM-y',  ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ProyectoBundle\Entity\Tarea'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'frontend_proyectobundle_tarea';
    }
}
