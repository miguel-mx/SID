<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProgramaMaestriaExternoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('escuelaProcedencia')
            ->add('pais', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'México' => 'México',
                    'Colombia' => 'Colombia',
                    'Venezuela' => 'Venezuela',
                    'Alemania' => 'Alemania',
                    'Perú' => 'Perú'
                ),
                'choices_as_values' => true,
            ))
            ->add('ciudad')
            ->add('fechaGrado', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,))
            ->add('opcionTitulacion', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Tésis' => 'Tésis',
                    'Tesina' => 'Tesina',
                ),
                'required' => false,
                'placeholder' => ''
            ))
            ->add('tituloTesis');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ProgramaMaestriaExterno'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_programamaestriaexterno';
    }


}
