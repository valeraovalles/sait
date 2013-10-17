<?php

namespace Frontend\SitBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class SubcategoriaType extends AbstractType
{


    public function __construct($idcategoria)
    {
        $this->idcategoria = $idcategoria;

    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $idcategoria = $this->idcategoria;

        $builder
            ->add('subcategoria')
            ->add('categoria', 'entity', array(
                    'class' => 'SitBundle:Categoria',
                    'data'=>$this->idcategoria,
                    'query_builder' => function(EntityRepository $er) use ($idcategoria) {
                    return $er->createQueryBuilder('c')
                    ->where('c.id = :idunidad')
                    ->setParameter('idunidad',$idcategoria)

                ;},
                ))
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\SitBundle\Entity\Subcategoria'
        ));
    }

    public function getName()
    {
        return 'frontend_sitbundle_subcategoriatype';
    }
}
