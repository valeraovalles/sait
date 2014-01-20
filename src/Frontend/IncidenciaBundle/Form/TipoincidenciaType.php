<?php

namespace Frontend\IncidenciaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TipoincidenciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\IncidenciaBundle\Entity\Tipoincidencia'
        ));
    }

    public function getName()
    {
        return 'frontend_incidenciabundle_tipoincidenciatype';
    }
}
