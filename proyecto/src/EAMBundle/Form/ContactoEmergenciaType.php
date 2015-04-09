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
            ->add('nombre','text')
            ->add('apellido')
            ->add('relacionPaciente')
            ->add('numero','text')
            ->add('fechaAnhadido','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha en que fue Añadido'))
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
