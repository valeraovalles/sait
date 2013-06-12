<?php

namespace Frontend\DistribucionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RepresentanteType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('nombres')
            ->add('apellidos')
            ->add('cargo')
            ->add('correo')
            ->add('telefono1')
            ->add('telefono2')
            ->add('fax')
            ->add('observacion','textarea')
            ->add('user')
            ->add('operador')
        ;
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DistribucionBundle\Entity\Representante',
        ));
    }

    public function getName()
    {
        return 'frontend_distribucionbundle_representantetype';
    }
}
