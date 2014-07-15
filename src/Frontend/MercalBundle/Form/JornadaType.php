<?php

namespace Frontend\MercalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class JornadaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombrejornada')
            ->add('fechajornada', 'date',array(
                    'widget' => 'single_text',
                    'format' => 'dd-MM-y',
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\MercalBundle\Entity\Jornada'
        ));
    }

    public function getName()
    {
        return 'frontend_mercalbundle_jornadatype';
    }
}
