<?php

namespace Frontend\TransporteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AsignacionesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
          //  ->add('fechaAsignacion')
            ->add('idSolicitud',null, array(            
            'label'  => 'Solicitud',            
            ))
            ->add('idVehiculo',null, array(            
            'label'  => 'Vehiculo', 
            ))
           
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\TransporteBundle\Entity\Asignaciones'
        ));
    }

    public function getName()
    {
        return 'frontend_transportebundle_asignacionestype';
    }
}
