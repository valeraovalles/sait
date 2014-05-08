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
            //->add('idSolicitante','hidden') 
            ->add('tipoPersonal','choice',array('choices'=>array('Int'=>'Interno','Ext'=>'Externo')),array('mapped' => false))
            ->add('asistentes')  
            /*
            ->add('asistentes', 'collection', array(
                // cada elemento en el arreglo debe ser un campo "email"
                'type'   => 'text',
                'allow_add'    => true,
                'by_reference' => false,        
                // estas opciones se pasan a cada tipo "email"
                'options'  => array(                 
                    'attr'      => array('class' => 'asistente-box')
                ),
            ))
            */     
            //->add('fechaSalida','datetime',array('data' => new \DateTime("now")))
            ->add('fechaSalida', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))            
            ->add('horaSalida')
            ->add('direccionDesde','textarea')
            ->add('direccionHasta','textarea')
            ->add('descripcionEquipos','textarea')
            ->add('datosInteresRazon','textarea')             
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\TransporteBundle\Entity\Solicitudes'
        ));
    }

    public function getName()
    {
        return 'frontend_transportebundle_solicitudestype';
    }
}
