<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EmpleadoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreUsuario','text')
            ->add('contrasenha', 'password')
            ->add('nombre')
            ->add('apellido')
            ->add('fechaNac', 'date', array('widget' => 'single_text', 'format' => 'dd/MM/yyyy','label' => 'Fecha de nacimiento'))
            ->add('seguroSocial','text')
            ->add('direccion', 'text')
            ->add('fechaInicio', 'date', array('widget' => 'single_text', 'format' => 'dd/MM/yyyy'))
            ->add('telefono','text')
            ->add('tipo', 'choice' , array(
                    'choices' => array(
                            'Administrativo' => 'Administrativo',
                            'Medico' => 'Medico',
                            'Enfermera' => 'Enfermera'
                        ),
                    'expanded' => true,
                    'multiple' => false
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
            'data_class' => 'EAMBundle\Entity\Empleado'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_empleado';
    }
}
