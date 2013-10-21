<?php

namespace Frontend\VisitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class salidaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('hora')
            ->add('fecha')
        ;
    }





    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\VisitasBundle\Entity\Salida'
        ));
    }




    public function getName()
    {
        return 'frontend_visitasbundle_salidatype';
    }
}
