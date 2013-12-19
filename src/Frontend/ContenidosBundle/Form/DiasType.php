<?php

namespace Frontend\ContenidosBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class diasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id')
            ->add('nombre', 'choice',array( 'empty_value' => 'Seleccione...',
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                          ))
                
       ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ContenidosBundle\Entity\Diasentrega'
        ));
    }

    public function getName()
    {
        return 'frontend_contenidosbundle_diastype';
    }
}
