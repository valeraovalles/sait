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
            ->add('concepto')
            ->add('tipoMoneda')
            ->add('montoMe')
            ->add('montoBs')
            ->add('numSolicitud')
            ->add('numConformacion')
            ->add('numPuntocuenta')
            ->add('fechaPunto')
            ->add('numAlcance')
            ->add('fechaAlcance')
            ->add('numContrato')
            ->add('fechaContrato')
            ->add('numAddendum')
            ->add('fechaAddendum')
            ->add('fechaInicio')
            ->add('fechaFin')
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
