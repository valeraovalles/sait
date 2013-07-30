<?php

namespace Frontend\DistribucionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SateliteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('satelite')
            ->add('transponder')
            ->add('frecuencia')
            ->add('polarizacion')
            ->add('modulacion')
            ->add('symbolrate')
            ->add('fec')
            ->add('sid')
            ->add('videopid')
            ->add('audiopid')
            ->add('tvro')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DistribucionBundle\Entity\Satelite'
        ));
    }

    public function getName()
    {
        return 'frontend_distribucionbundle_satelitetype';
    }
}
