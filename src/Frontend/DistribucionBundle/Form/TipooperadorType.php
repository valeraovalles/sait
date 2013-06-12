<?php

namespace Frontend\DistribucionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipooperadorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('operador')
            ->add('codigo')
            ->add('user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DistribucionBundle\Entity\Tipooperador'
        ));
    }

    public function getName()
    {
        return 'frontend_distribucionbundle_tipooperadortype';
    }
}
