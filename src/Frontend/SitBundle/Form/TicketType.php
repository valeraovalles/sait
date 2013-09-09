<?php

namespace Frontend\SitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /*->add('fechasolicitud')
            ->add('horasolicitud')
            ->add('fechasolucion')
            ->add('horasolucion')*/
            ->add('unidad',null,array( 'empty_value' => 'Seleccione...'))
            ->add('solicitud','textarea')
            ->add('file','file')
            /*->add('solucion')
            ->add('reasignado')
            ->add('estatus')
            ->add('archivos')
            ->add('solicitante')
            ->add('categoria')
            ->add('subcategoria')*/
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\SitBundle\Entity\Ticket'
        ));
    }

    public function getName()
    {
        return 'frontend_sitbundle_tickettype';
    }
}
