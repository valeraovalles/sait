<?php

namespace Frontend\SitBundle\Form\extras;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CorreoseguimientoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cuerpo','textarea')
            ->add('para')
            ->add('asunto')
            ->add('file','file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\SitBundle\Entity\extras\Correoseguimiento'
        ));
    }

    public function getName()
    {
        return 'correo';
    }
}
