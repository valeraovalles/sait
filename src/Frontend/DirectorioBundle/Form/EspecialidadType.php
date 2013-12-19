<?php

namespace Frontend\DirectorioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EspecialidadType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('area')
            //->add('area','choice',array( 'empty_value' => 'Seleccione...'))

        ;
    }




    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DirectorioBundle\Entity\Especialidad'
        ));
    }


    public function getName()
    {
        return 'frontend_directoriobundle_especialidadtype';
    }


}

