<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Test\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CursoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('profesor')
            ->add('tipo', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'Básico' => 'Básico',
                    'Avanzado' => 'Avanzado',
                    'Seminario' => 'Seminario',
                ),
                'choices_as_values' => true,
            ))
            ->add('curso')
            ->add('tema')
        ;

    }

          /*      if($curso->getTipo() == 'Básico') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Curso Básico' => 'Curso Básico',
                        ),
                    ));
                }
                elseif($curso->getTipo() == 'Avanzado') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Introducción a los medios continuos' => 'Introducción a los medios continuos',
                            'Modelación matemática de sistemas continuos' => 'Modelación matemática de sistemas continuos',
                            'Modelos lineales' => 'Modelos lineales',
                            'Probabilidad I' => 'Probabilidad I',
                        ),
                    ));
                }
                elseif($curso->getTipo() == 'Seminario') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Topología algebraica' => 'Topología algebraica',
                            'Topología diferencial' => 'Topología diferencial',
                            'Topología general' => 'Topología general',
                        ),
                    ));
                }getForm()->getParent()
                else {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Nada' => 'Nada',
                        ),
                    ));
                }*/

           /* ->add('curso')
            ->add('tema')


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
            ))*/

    
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
