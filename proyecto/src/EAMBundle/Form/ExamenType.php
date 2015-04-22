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
       // $perfiles = array("Hematologia Completa","Orina","Heces","Cardiologico","Lipidico","Glicemia",
           // "Colesterol","Insulina","Urea","Creatinina");
        $builder
            ->add('fecha','date', array('widget' => 'single_text', 'format' => 'dd-MM-yyyy','label' => 'Fecha de Cita'))
            ->add('perfil', 'choice',array('label'=> 'Perfil de Examen',
                            'choices' => array('Hematologia' => 'Hematologia', 'Orina' => 'Orina', 'Heces' => 'Heces','Glicemia' => 'Glicemia'),
                            'multiple' => true,
                            'expanded' => true,'attr' => array('class' =>'checkbox-inline'),))
            ->add('descripcion','textarea');
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
