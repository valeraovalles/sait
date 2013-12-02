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
            ->add('email')
            ->add('especialidad','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'choices' => array(
                                                                    "0"=> "", 
                                                                    "Economista"=> "Economista",
                                                                    "2"=> "Historiador", 
                                                                    "3"=> "Novelista",
                                                                    "4"=> "Poeta", 
                                                                    "5"=> "Escritor",
                                                                    "6"=> "Teológo", 
                                                                    "7"=> "Dirigente político",
                                                                    "8"=> "Líder social", 
                                                                    "9"=> "Biólogo",
                                                                    "10"=> "Físico", 
                                                                    "11"=> "Químico",
                                                                    "12"=> "Ecologista", 
                                                                    "13"=> "Petróleo",
                                                                    "14"=> "Derechos Humanos", 
                                                                    "15"=> "Cineasta",
                                                                    "16"=> "Documentalista", 
                                                                    "17"=> "Músico",
                                                                    "18"=> "Cantante",
                                                                    "19"=> "Compositor",
                                                                    "20"=> "Artista",
                                                                    "21"=> "Artista Plástico",
                                                                    "22"=> "Escultor",
                                                                    "23"=> "Pintor",
                                                                    "23"=> "Politólogo",
                                                                    
                                                                  )
                                        ))


            ->add('pais')
        ;
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
