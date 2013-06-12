<?php

namespace Frontend\DistribucionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComodatoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('codigo')
            ->add('fechainicioacuerdo', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            
            ->add('fechafinacuerdo','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            ->add('dialUrl')
            ->add('dialUrl2')
            ->add('observacion','textarea')
            ->add('objetocomodato')
            ->add('user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DistribucionBundle\Entity\Comodato'
        ));
    }

    public function getName()
    {
        return 'frontend_distribucionbundle_comodatotype';
    }
}
