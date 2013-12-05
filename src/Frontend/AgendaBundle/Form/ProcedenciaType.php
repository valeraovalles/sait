<?php

namespace Frontend\AgendaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProcedenciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('institucion')
            ->add('director')
            ->add('areainst')
            ->add('telfinst')
            ->add('emailinst')
            ->add('direccion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\AgendaBundle\Entity\Procedencia'
        ));
    }

    public function getName()
    {
        return 'frontend_agendabundle_procedenciatype';
    }
}
