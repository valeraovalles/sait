<?php

namespace Frontend\ProyectoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ActividadType extends AbstractType
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
            ->add('tiempoestimado','text')
            ->add('tipotiempo','choice',array('choices'=>array(1=>'Días',2=>'Horas',3=>'Minutos')))
            ->add('ubicacion')
            ->add('descripcion','textarea')
            ->add('responsable','entity',array(
                'class' => 'UsuarioBundle:Perfil',
                'empty_value'=>'Seleccione...',
                'multiple'=>false,
                'expanded'=>false,
                'query_builder' => function(EntityRepository $x)use($datos){
                return $x->createQueryBuilder('x')
                ->where('x.id in (:id)')
                ->setParameter('id', $datos)
                ;}
            ));
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ProyectoBundle\Entity\Actividad'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'frontend_proyectobundle_actividad';
    }
}
