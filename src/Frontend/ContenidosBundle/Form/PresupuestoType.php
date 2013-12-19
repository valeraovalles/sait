<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PresupuestoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('codigo')
            ->add('descripcion', 'textarea')
            ->add('fechaInicio','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('fechaFin','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('montoDolares')
            ->add('montoEuros')
            ->add('montoBs')
            ->add('tipo','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "N" =>"Normal", 
                                                                    "E" =>"Extension"
                                                                  )
                                        )
                )
            ->add('idPresext')
            ->add('idProveedor')
            ->add('disponibilidad')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Presupuesto'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_presupuestotype';
    }
}
