<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MedicamentosUsadosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion','textarea', array('label' => 'Descripcion', 'attr' => array('class' =>'form-control') ) )
            ->add('fecha','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Actualizado el', 'attr' => array('class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\MedicamentosUsados'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_medicamentosusados';
    }
}
