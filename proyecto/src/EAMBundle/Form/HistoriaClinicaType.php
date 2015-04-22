<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HistoriaClinicaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fechaVisita','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy'))
            ->add('altura','text')
            ->add('peso','text')
            ->add('presionArterial','text')
            ->add('frecuenciaCard','text')
            ->add('temperatura','text')
            ->add('diagnosticos','collection',array(
                'type'=> new DiagnosticoType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))
            ->add('prescripciones','collection',array(
                'type'=> new PrescripcionesType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))
            ->add('examenes','collection',array(
                'type'=> new ExamenType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))
            ->add('referencias','collection',array(
                'type'=> new ReferenciaType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))
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
            'data_class' => 'EAMBundle\Entity\HistoriaClinica'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_historiaclinica';
    }
}
