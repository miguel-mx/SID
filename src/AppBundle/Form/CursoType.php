<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CursoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
            'choices'  => array(
                'Básico' => 'Básico',
                'Avanzado' => 'Avanzado',
                'Seminario' => 'Seminario',
            ),
            'choices_as_values' => true,
        ))
            ->add('curso')
            ->add('tema')

            ->add('profesor')
            ->add('objetivo', 'Ivory\CKEditorBundle\Form\Type\CKEditorType', array(
                'config_name' => 'sid_config',
            ))
            ->add('temario', 'Ivory\CKEditorBundle\Form\Type\CKEditorType', array(
                'config_name' => 'sid_config',
            ))
            ->add('bibliografia', 'Ivory\CKEditorBundle\Form\Type\CKEditorType', array(
                'config_name' => 'sid_config',
            ))
            ->add('requisitos', 'Ivory\CKEditorBundle\Form\Type\CKEditorType', array(
                'config_name' => 'sid_config',
            ))
            ->add('comentarios', 'Ivory\CKEditorBundle\Form\Type\CKEditorType', array(
                'config_name' => 'sid_config',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Curso'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_curso';
    }


}
