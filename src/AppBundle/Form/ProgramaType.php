<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProgramaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('programa', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Maestría' => 'Maestría',
                    'Doctorado' => 'Doctorado',
                ),
                'choices_as_values' => true,
            ))
            ->add('ingreso')
            ->add('termino')
            ->add('fechaGradoUMSNH', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,))
            ->add('fechaGradoUNAM' , 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,))
            ->add('opcionTitulacion', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(

                    '' => '',
                    'Tésis' => 'Tésis',
                ),
                'required' => false,
            ))
            ->add('tituloTesis')
            ->add('semestres')
            ->add('cursos')
            ->add('tutor')
            ->add('comite_tutorial')
            ->add('fechaCandidatura', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Programa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_programa';
    }


}
