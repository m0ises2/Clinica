<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ExamenType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha de Cita'))
            ->add('perfil', 'text',array('label'=> 'Perfil'))
            ->add('descripcion','textarea')
            //->add('historiaclinica','entity',array(
              //'class' => 'EAMBundle:HistoriaClinica','attr'=> array('class' => 'hidden'), 'label'=>false))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\Examen'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_examen';
    }
}
