<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NumerosTelefonicosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo','choice',array( 'choices' => array(
                'Movil' => 'Movil' ,
                'Casa' => 'Casa'
                )))
            ->add('codigo', 'text')
            ->add('numero', 'text')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\NumerosTelefonicos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_numerostelefonicos';
    }
}
