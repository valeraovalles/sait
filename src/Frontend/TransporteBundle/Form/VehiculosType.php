<?php

namespace Frontend\TransporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VehiculosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo','choice',array('choices'=>array('Carro'=>'Carro','Moto'=>'Moto','Camioneta'=>'Camioneta')))
            ->add('placa')
            ->add('modelo')
            ->add('ano', 'text')
            ->add('color')
            ->add('estatus','choice',array('choices'=>array('1'=>'Activo','0'=>'Inactivo')))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\TransporteBundle\Entity\Vehiculos'
        ));
    }

    public function getName()
    {
        return 'frontend_transportebundle_vehiculostype';
    }
}
