<?php

namespace Frontend\DirectorioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InstitucionType extends AbstractType
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
            ->add('pais',null,array( 'empty_value' => 'Seleccione...'))

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DirectorioBundle\Entity\Institucion'
        ));
    }

    public function getName()
    {
        return 'frontend_directoriobundle_instituciontype';
    }
}
