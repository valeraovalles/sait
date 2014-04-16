<?php

namespace Frontend\ContratosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContratosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaRegistro','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('codigo')
            ->add('empresa','textarea')
            ->add('fechaInicio','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('fechaFin','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('duracion')
            ->add('montoBs')
            ->add('montoDolares')
            ->add('montoEuros')
            ->add('obra','textarea')
            ->add('idDireccion')
            ->add('idAbogado')
            ->add('file','file')
            ->add('archivo')
            ->add('personal')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContratosBundle\Entity\Contratos'
        ));
    }

    public function getName()
    {
        return 'frontend_contratosbundle_contratostype';
    }
}
