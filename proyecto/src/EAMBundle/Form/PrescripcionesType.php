<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PrescripcionesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text', array('label' => 'Titulo', 'attr' => array('class' =>'form-control') ) )
            ->add('instrucciones','text', array('label' => 'Descripcion', 'attr' => array('class' =>'form-control') ) )
            ->add('fechas','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha', 'attr' => array('class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\Prescripciones'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_prescripciones';
    }
}
