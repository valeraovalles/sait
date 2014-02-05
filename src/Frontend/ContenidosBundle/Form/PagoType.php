<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PagoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id')
            ->add('numMemo')
            ->add('numFactura')
            ->add('fechaFactura','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('tipoMoneda','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "0" =>"Dolares", 
                                                                    "1" =>"Euros"
                                                                  )
                                        )
                )
            ->add('montoMe')
            ->add('montoBs')
            ->add('tipoPago','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "0" =>"Cheque", 
                                                                    "1" =>"Transferencia"
                                                                  )
                                        )
                )
            ->add('numPago')
            ->add('fechaPago','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('contraEntrega','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "1" =>"Si", 
                                                                    "0" =>"No"
                                                                  )
                                        )
                )
            ->add('diasEntrega')
            ->add('idUnidadejec')
            //->add('idProveedor')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Pago'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_pagotype';
    }
}
