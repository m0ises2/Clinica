<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use EAMBundle\Entity\PacienteRepository;
use EAMBundle\Entity\Paciente;

use EAMBundle\Controller;

class PacienteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellido','text',array('label'=>'Apellidos'))
            ->add('nombre','text',array('label'=>'Nombres'))
            ->add('fechasNac', 'date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha de nacimiento'))
            ->add('direccion')
            ->add('numSeguroSocial','text',array('label' => 'Numero de Seguro Social'))
            ->add('drPreferido','text', array('label' => 'Doctor de Preferencia'))
            ->add('telefonos','collection',array(
                'type'=> new NumerosTelefonicosType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))
            ->add('emergencias','collection', array(
                'type' => new ContactoEmergenciaType(),
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
            'data_class' => 'EAMBundle\Entity\Paciente'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_paciente';
    }

    
}