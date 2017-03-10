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
            ->add('fechaGradoUMSNH')
            ->add('fechaGradoUNAM')
            ->add('opcionTitulacion')
            ->add('tituloTesis')
            ->add('semestres')
            ->add('cursos')

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
