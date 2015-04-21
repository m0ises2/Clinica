<?php

namespace EAMBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HCInicialType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tabaco','choice',array( 'choices' => array(
                '-1' => 'Seleccione Una Opcion',
                'Si' => 'Si' ,
                'No' => 'No'
                )))
            ->add('alcohol','choice',array( 'choices' => array(
                '-1' => 'Seleccione Una Opcion',
                'Si' => 'Si' ,
                'No' => 'No'
                )))

            ->add('alergias','collection',array(
                'type'=> new AlergiasType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))

            ->add('medicamentosUsados','collection',array(
                'type'=> new MedicamentosUsadosType(), 
                'allow_add'=>'true','by_reference'=>'false',
                'allow_delete' =>'true'
                ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EAMBundle\Entity\HCInicial'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'eambundle_hcinicial';
    }
}
