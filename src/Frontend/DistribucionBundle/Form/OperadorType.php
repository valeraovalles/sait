<?php

namespace Frontend\DistribucionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;


class OperadorType extends AbstractType
{
    public function __construct($idPais)
    {
        $this->idPais = $idPais;

    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $idPais = $this->idPais;
         
        $builder
            ->add('nombre')
            ->add('numeroabonados')
            ->add('direccion','textarea')
            ->add('observacion','textarea')
            ->add('estatus','checkbox'/*,array( 'data' => true )*/)
            ->add('tipooperador',null,array( 'empty_value' => 'Seleccione...'))
            ->add('pais',null,array( 'empty_value' => 'Seleccione...'))
            ->add('estado', 'entity', array(
                    'class' => 'DistribucionBundle:Estado',
                    'property' => 'estado',
                    'multiple' => true,
                    'query_builder' => function(EntityRepository $er) use ($idPais) {
                    return $er->createQueryBuilder('u')
                    ->where('u.pais = :id')
                    ->setParameter('id', $idPais)
                ;},
                ))
            ->add('zona', null,array( 'empty_value' => 'Seleccione...'))
            ->add('cobertura','textarea')
            //->add('ciudad')
            ->add('comodato', new ComodatoType())
            ->add('paquete', null,array( 'empty_value' => 'Seleccione...'))
            ->add('urlweb')
            ->add('urlfacebook')
            ->add('urltwitter')
            //->add('representante', new RepresentanteType(),array('data_class' => null))
            //->add('representante')
            ->add('user')
            ->add('dialUrl')
            ->add('dialUrl2')
            ->add('franjatransmision','textarea')
           
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DistribucionBundle\Entity\Operador',
        ));
    }

    public function getName()
    {
        return 'frontend_distribucionbundle_operadortype';
    }
}
