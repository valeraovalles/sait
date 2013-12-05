<?php

namespace Frontend\DirectorioBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonalidadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('telefono', 'text')
            ->add('ciudad', 'text')
            ->add('email')
            ->add('pais',null,array( 'empty_value' => 'Seleccione...'))
            ->add('paisprocedencia',null,array( 'empty_value' => 'Seleccione...'))
            ->add('especialidad','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'empty_value' => 'Seleccione...',
                                            'choices'=>array(
                                                                "Artista"=> "Artista",  
                                                                "Artista Plástico"=> "Artista Plástico",  
                                                                "Biólogo"=> "Biólogo",  
                                                                "Cantante"=> "Cantante",  
                                                                "Cineasta"=> "Cineasta",  
                                                                "Compositor"=> "Compositor",  
                                                                "Derechos Humanos"=> "Derechos Humanos",   
                                                                "Dirigente político"=> "Dirigente político",  
                                                                "Documentalista"=> "Documentalista",  
                                                                "Ecologista"=> "Ecologista",   
                                                                "Economista"=> "Economista",      
                                                                "Escritor"=> "Escritor",  
                                                                "Escultor"=> "Escultor",  
                                                                "Físico"=> "Físico",   
                                                                "Historiador"=> "Historiador",   
                                                                "Líder social"=> "Líder social",   
                                                                "Músico"=> "Músico",  
                                                                "Novelista"=> "Novelista",  
                                                                "Petróleo"=> "Petróleo",  
                                                                "Pintor"=> "Pintor",  
                                                                "Poeta"=> "Poeta",   
                                                                "Politólogo"=> "Politólogo",  
                                                                "Químico"=> "Químico",  
                                                                "Teológo"=> "Teológo"
                                                                  )

                                        ));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\DirectorioBundle\Entity\Personalidad'
        ));
    }


    public function getName()
    {
        return 'frontend_directoriobundle_personalidadtype';
    }


}

