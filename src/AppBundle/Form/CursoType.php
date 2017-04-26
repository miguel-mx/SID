<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
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
            ->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Curso Básico' => 'Curso Básico',
                ),
            ))
            // ->add('curso')
            // ->add('tema')
        ;

/*        $formModifier = function (FormInterface $form, $tipo = null) {
            //$positions = null === $sport ? array() : $sport->getAvailablePositions();
            if($tipo == 'Básico') {
                $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                    'choices' => array(
                        'Curso Básico' => 'Curso Básico',
                    ),
                ));
            }
            elseif($tipo == 'Avanzado') {
                $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                    'choices' => array(
                        'Introducción a los medios continuos' => 'Introducción a los medios continuos',
                        'Modelación matemática de sistemas continuos' => 'Modelación matemática de sistemas continuos',
                        'Modelos lineales' => 'Modelos lineales',
                        'Probabilidad I' => 'Probabilidad I',
                    ),
                ));
            }
            elseif($tipo == 'Seminario') {
                $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                    'choices' => array(
                        'Topología algebraica' => 'Topología algebraica',
                        'Topología diferencial' => 'Topología diferencial',
                        'Topología general' => 'Topología general',
                    ),
                ));
            }
        };

        $builder->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) use ($formModifier) {
                // this would be your entity, i.e. Curso
                $curso = $event->getData();
                // $formModifier($event->getForm(), $curso->getTipo());
                $form = $event->getForm();

                $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                    'choices' => array(
                        'Curso Básico' => 'Curso Básico',
                    ),
                ));
            }
        );*/

        $builder->get('tipo')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                // It's important here to fetch $event->getForm()->getData(), as
                // $event->getData() will get you the client data (that is, the ID)
                //$tipo = $event->getForm()->getData();

                // since we've added the listener to the child, we'll have to pass on
                // the parent to the callback functions!
                // $formModifier($event->getForm()->getParent(), $tipo);

                $form = $event->getForm()->getParent();
                $tipo = $event->getData();

                if($tipo === 'Básico') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Curso Básico' => 'Curso Básico',
                        ),
                    ));
                }
                elseif($tipo === 'Avanzado') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Introducción a los medios continuos' => 'Introducción a los medios continuos',
                            'Modelación matemática de sistemas continuos' => 'Modelación matemática de sistemas continuos',
                            'Modelos lineales' => 'Modelos lineales',
                            'Probabilidad I' => 'Probabilidad I',
                        ),
                    ))
                        ->add('tema')
                        ->add('objetivo')
                    ;
                }
                elseif($tipo === 'Seminario') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Modelos lineales' => 'Modelos lineales',
                            'Probabilidad I' => 'Probabilidad I',
                        ),
                    ));
                }
            }
        );

    }
          /*    if($curso->getTipo() == 'Básico') {
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
