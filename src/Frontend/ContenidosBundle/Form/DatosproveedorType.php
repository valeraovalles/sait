<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DatosproveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('numIdentificacionfiscal')
            ->add('direccionEmpresa','textarea')
            ->add('oficina1')
            ->add('oficina2')
            ->add('movil')
            ->add('correoEmpresa')
            ->add('skypeEmpresa')
            ->add('nombreRepr')
            ->add('apellidoRepr')
            ->add('cargo')
            ->add('telfhab')
            ->add('movil2')
            ->add('correoRepr')
            ->add('skypeRepr')
            ->add('tipoSatelite','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "0" =>"Ocasional", 
                                                                    "1" =>"Fijo"
                                                                  )
                                        )
                )
            ->add('observacionTipoproveedor','textarea')
            ->add('idTipoprov')
            ->add('pais')
            ->add('idDetalletipoproveedor')
            ->add('idUnidad')
            ->add('observacionUnidadsolicitante','textarea')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Datosproveedor'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_datosproveedortype';
    }
}
