<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class VisitaType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('segurosocial','text')
            ->add('fecha','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha de Visita'))
            ->add('hora','text',array('attr'=> array('class' => 'time')))
            ->add('medico','entity',
                array(
                        'class'=>'EAMBundle:Empleado',
                        "label"=>"Medico",
                        'query_builder' => function(\Doctrine\ORM\EntityRepository  $er) {
                                        return $er->createQueryBuilder('u')
                                        ->where("u.tipo = 'Medico'");
                                        },

                    )
                )
            ->add('tipo','hidden')
            ->add('paciente','entity',array(
              'class' => 'EAMBundle:Paciente','attr'=> array('class' => 'hidden'), 'label'=>false))
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
            'data_class' => 'EAMBundle\Entity\Visita'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_visita';
    }
}
