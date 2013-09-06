<?php

namespace Frontend\ConstanciaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConstanciaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo', 'choice', array('choices'   => array(''=>'Seleccione...','sb'=>'Sueldo básico','sn'=>'Sueldo normal','si'=>'Sueldo integral','sba'=>'Sueldo básico anual','sna'=>'Sueldo normal anual','sia'=>'Sueldo integral anual')))
            ->add('bonoalimentacion')
            ->add('dirigida')
            ->add('culminada')
            ->add('motivo','textarea')

        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Frontend\ConstanciaBundle\Entity\Constancia'
        ));
    }

    public function getName()
    {
        return 'frontend_constanciabundle_constanciatype';
    }
}
