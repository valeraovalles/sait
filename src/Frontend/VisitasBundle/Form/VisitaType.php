<?php

namespace Frontend\VisitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaentrada','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            ->add('horaentrada', 'time', array(
                    'input'  => 'datetime',
                    'widget' => 'choice',
                ))
            ->add('fechasalida','date',array(
                  'widget' => 'single_text',
                  'format' => 'yyyy-MM-dd',))
            ->add('horasalida')
            ->add('contacto')
            ->add('observaciones')
            //->add('usuario')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\VisitasBundle\Entity\Visita'
        ));
    }

    public function getName()
    {
        return 'frontend_visitasbundle_visitatype';
    }
}
