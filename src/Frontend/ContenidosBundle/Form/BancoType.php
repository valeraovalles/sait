<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BancoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreBeneficiario')
            ->add('bancoInterm')
            ->add('swiftInterm')
            ->add('abaInterm')
            ->add('ibanInterm')
            ->add('cuentaInterm')
            ->add('direccionBancointerm','textarea')
            ->add('bancoBenef')
            ->add('cuentaBenef')
            ->add('swiftBenef')
            ->add('abaBenef')
            ->add('ibanBenef')
            ->add('direccionBancobenef')
            ->add('direccionBeneficiario','textarea')
            ->add('idProveedor','entity', array(
                                                'class' => 'ContenidosBundle:Datosproveedor', 
                                                'property'=>'nombre', 
                                                'multiple'  => false, ))
            ->add('pais')
        ;
    }
 
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Banco'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_bancotype';
    }
}
