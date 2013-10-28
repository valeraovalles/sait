<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class analistaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id')
            ->add('nombre','textarea')
       ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Analista'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_analistatype';
    }
}
