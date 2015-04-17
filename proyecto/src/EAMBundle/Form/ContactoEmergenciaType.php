<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactoEmergenciaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre','text', array('label' => 'Nombre', 'attr' => array('class' =>'form-control') ) )
            ->add('apellido', 'text', array('label' => 'Apellido', 'attr' => array('class' =>'form-control')) )
            ->add('relacionPaciente', 'text', array('label' => 'Relacion con el paciente', 'attr' => array('class' =>'form-control')) )
            ->add('numero','text', array('label' => 'Numero', 'attr' => array('class' =>'form-control')) )
            ->add('fechaAnhadido','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha en que fue Añadido', 'attr' => array('class' => 'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\ContactoEmergencia'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_contactoemergencia';
    }
}
