<?php

namespace Frontend\ProyectoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ProyectoType extends AbstractType
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
            ->add('descripcion','textarea')
            ->add('fechainicio','date',array(
                    'widget' => 'single_text',
                    'format'   => 'dd-MM-y',  ))
            ->add('estatus','choice',array('choices'=>array(''=>'Seleccione...',1=>'En progreso',2=>'Sin comenzar')))
            ->add('porcentaje','text')
            ->add('responsable','entity',array(
                'class' => 'UsuarioBundle:Perfil',
                'empty_value'=>'Seleccione...',
                'multiple'=>true,
                'expanded'=>true,
                'query_builder' => function(EntityRepository $x)use($datos){
                return $x->createQueryBuilder('x')
                ->where('x.id in (:id)')
                ->setParameter('id', $datos)
                ;}
            ));
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ProyectoBundle\Entity\Proyecto'
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
