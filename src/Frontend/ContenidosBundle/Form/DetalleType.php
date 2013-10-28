<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class detalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('idTipoproveedo','entity', array(
                                                    'class' => 'ContenidosBundle:Tipoproveedor',
                                                  ))
            ->add('nombre','textarea')
       ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\DetalleTipoproveedor'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_detalleproveedortype';
    }
}
