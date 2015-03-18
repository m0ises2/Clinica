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
            ->add('nombreUsuario','text', array('label' => 'Nombre de usuario'))
            ->add('contrasenha', 'password', array('label' => 'Contraseña'))
            ->add('nombre')
            ->add('apellido')
            ->add('fechaNac', 'text', array('label' => 'Fecha de nacimiento'))
            ->add('seguroSocial','text', array('label' => '# Seguro Social'))
            ->add('direccion', 'text', array('label' => 'Dirección'))
            ->add('fechaInicio', 'text')
            ->add('telefono','text',array('label' => 'Teléfono'))
            //->add('roles')
            ->add('Guardar','submit', array('label' => 'Guardar'))
            ->add('Guardar_otro', 'submit', array('label' => 'Guardar y Agregar Otro'))
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
