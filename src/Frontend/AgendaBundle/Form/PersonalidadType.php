<?php

namespace Frontend\AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonalidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('telefono')
            ->add('email')
            ->add('especialidad')
            ->add('pais')
            ->add('procedencia')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AgendaBundle\Entity\Personalidad'
        ));
    }

    public function getName()
    {
        return 'frontend_agendabundle_personalidadtype';
    }
}
