<?php

namespace Frontend\SitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class CategoriaType extends AbstractType
{


    public function __construct($idunidad)
    {
        $this->idunidad = $idunidad;

    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $idunidad = $this->idunidad;

        $builder
            ->add('categoria')
            ->add('unidad', 'entity', array(
                    'class' => 'SitBundle:Unidad',
                    'data'=>$this->idunidad,
                    'query_builder' => function(EntityRepository $er) use ($idunidad) {
                    return $er->createQueryBuilder('u')
                    ->where('u.id = :idunidad')
                    ->setParameter('idunidad',$idunidad)

                ;},
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\SitBundle\Entity\Categoria'
        ));
    }

    public function getName()
    {
        return 'frontend_sitbundle_categoriatype';
    }
}
