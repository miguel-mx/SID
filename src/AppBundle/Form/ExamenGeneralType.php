<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ExamenGeneralType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Algebra' => 'Algebra',
                    'Algebra Conmutativa' => 'Algebra Conmutativa',
                    'Algebra Moderna' => 'Algebra Moderna',
                    'Análisis Asintótico' => 'Análisis Asintótico',
                    'Análisis Complejo' => 'Análisis Complejo',
                    'Análisis Funcional' => 'Análisis Funcional',
                    'Análisis Real' => 'Análisis Real',
                    'Ecuaciones Diferenciales Ordinarias' => 'Ecuaciones Diferenciales Ordinarias',
                    'Ecuaciones Diferenciales Parciales' => 'Ecuaciones Diferenciales Parciales',
                    'Geometría Algebráica' => 'Geometría Algebráica',
                    'Geometría Diferencial' => 'Geometría Diferencial',
                    'Inferencia Estadística' => 'Inferencia Estadística',
                    'Probabilidad' => 'Probabilidad',
                    'Probabilidad I' => 'Probabilidad I',
                    'Procesos Estocásticos' => 'Procesos Estocásticos',
                    'Teoría de Gráficas' => 'Teoría de Gráficas',
                    'Topología Algebráica' => 'Topología Algebráica',
                    'Topología Diferencial' => 'Topología Diferencial',
                    'Topología General' => 'Topología General',
                ),
                'placeholder' => ''
            ))
            ->add('fecha', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false,))
            ->add('lugar')
            ->add('hora', 'Symfony\Component\Form\Extension\Core\Type\TimeType', array(
                'input'  => 'timestamp',
                'widget' => 'choice',
            ))
            ->add('semestre', null, array(
                'required'   => true,
                'placeholder' => ''
            ))
            ->add('coordinador')
            ->add('comite');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\ExamenGeneral'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_examengeneral';
    }


}
