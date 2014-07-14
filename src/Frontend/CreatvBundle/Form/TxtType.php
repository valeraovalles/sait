<?php

namespace Frontend\CreatvBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TxtType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'choice', array(
                                //'choices'   => array(''=>'Seleccione...','PARRILLA PRINCIPAL'=>'TXT PARRILLA PRINCIPAL','PARRILLA INGLES'=>'TXT PARRILLA INGLES')))
                                'choices'   => array('PARRILLA PRINCIPAL'=>'TXT PARRILLA PRINCIPAL')))
            ->add('fecha', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-y',
                ))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\CreatvBundle\Entity\Txt'
        ));
    }

    public function getName()
    {
        return 'frontend_creatvbundle_txttype';
    }
}
