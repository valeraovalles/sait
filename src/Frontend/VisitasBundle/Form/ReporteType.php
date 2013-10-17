<?php

namespace Frontend\VisitasBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class reporteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Desde','date',array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd',
                ))
            ->add('Hasta','date',array(
                  'widget' => 'single_text',
                  'format' => 'yyyy-MM-dd',))

            ->add('Formato','choice', array(
                                            'expanded'=>false, 
                                            'multiple'=>false,
                                            'choices' => array(
                                                                    "0"=> "PDF", 
                                                                    "1"=> "DOC"
                                                                  )
                                        ))

        ;
    }





    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\VisitasBundle\Entity\Reporte'
        ));
    }




    public function getName()
    {
        return 'frontend_visitasbundle_reportetype';
    }
}
