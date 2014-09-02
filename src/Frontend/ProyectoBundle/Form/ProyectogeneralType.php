<?php

namespace Frontend\ProyectoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProyectogeneralType extends AbstractType
{
    
    public function __construct($usuariounidad)
    {
        $this->usuariounidad = $usuariounidad;
    }
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $usuariounidad = $this->usuariounidad;
        foreach ($usuariounidad as $x){
           $datos[]=$x->getId();
        }
        
        $builder
            ->add('nombre')
            ->add('nivelorganizacional','entity',array(
                'class' => 'UsuarioBundle:Nivelorganizacional',
                'empty_value'=>'Seleccione...',
                'multiple'=>true,
                'expanded'=>true,
                'property' => 'descripcion',
                'query_builder' => function(EntityRepository $x){
                return $x->createQueryBuilder('x')
                ->where('x.codigo like :codigo')
                ->setParameter('codigo', "%01-06-02-%")
                ;}))
            ->add('descripcion','textarea');
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ProyectoBundle\Entity\Proyectogeneral'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'frontend_proyectobundle_proyecto';
    }
}
