<?php

namespace Frontend\LicenciasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LicenciasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           // ->add('id')
            ->add('usuario')
            ->add('nombre', 'textarea')
            ->add('fechaCompra','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                )) 
            ->add('fechaVencimiento','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            ->add('banderaCorreo')
            ->add('descripcion','textarea')
            ->add('tipo','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices' => array(
                                                                    "l" =>"Licencia", 
                                                                    "s" =>"Servicio"
                                                                  )
                                        )
                )
            ->add('codigo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\LicenciasBundle\Entity\Licencias'
        ));
    }

    public function getName()
    {
        return 'frontend_licenciasbundle_licenciastype';
    }
}
