<?php

namespace Frontend\TransporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Administracion\UsuarioBundle\Entity\Perfil;

class SolicitudesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaSolicitud', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))                                               
            ->add('asistentes','hidden')  
            ->add('fechaSalida', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))            
            ->add('horaSalida')
            ->add('direccionDesde','textarea')
            ->add('direccionHasta','textarea')
            ->add('descripcionEquipos','textarea')
            ->add('datosInteresRazon','textarea')             
            ->add('justificacionRechazo','textarea',array('required'  => false));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\TransporteBundle\Entity\Solicitudes'
        ));
    }

    public function getName()
    {
        return 'form_solicitud';
    }
}