<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('segurosocial','text')
            ->add('fecha','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha de Cita'))
            ->add('hora','text',array('attr'=> array('class' => 'time')))
            ->add('motivo','textarea')
            ->add('paciente','entity',array(
              'class' => 'EAMBundle:Paciente','attr'=> array('class' => 'hidden'), 'label'=>false))
            ->add('visita','entity',array(
              'class' => 'EAMBundle:Visita','attr'=> array('class' => 'hidden'), 'label'=>false))
            ->add('Guardar','submit')
            ->add('Cancelar','submit')

        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\Cita'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_cita';
    }
}
