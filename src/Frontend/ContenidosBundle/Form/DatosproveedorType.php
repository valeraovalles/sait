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
            ->add('idTipoprov')
            ->add('pais')
            ->add('idDetalletipoproveedor')
            ->add('idUnidad')
            ->add('estatus','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "A" =>"Activo", 
                                                                    "I" =>"Inactivo"
                                                                  )
                                        )
                )
            ->add('usuario')
            ->add('fechaRegistro','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
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
        return 'form';
    }
}
