<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContratacionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('concepto', 'textarea')
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
            ->add('numSolicitud')
            ->add('numConformacion')
            ->add('numPuntocuenta')
            ->add('fechaPunto','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('numAlcance')
            ->add('fechaAlcance','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('numContrato')
            ->add('fechaContrato','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('numAddendum')
            ->add('fechaAddendum','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('fechaInicio','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('fechaFin','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('observacionesCompras')
            ->add('analistaCompras')
            ->add('idProveedor')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Contratacion'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_contrataciontype';
    }
}
