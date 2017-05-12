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
                        'placeholder' => '',
                        'Básico' => 'Básico',
                        'Avanzado' => 'Avanzado',
                        'Seminario' => 'Seminario',
                    ),
                )
            )

        ;

        $builder->get('tipo')->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {

                $form = $event->getForm()->getParent();
                $tipo = $event->getData();

                if($tipo === 'Básico') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                            'choices' => array(
                                'Algebra Conmutativa' => 'Algebra Conmutativa',
                                'Algebra Moderna' => 'Algebra Moderna',
                                'Análisis Asintótico' => 'Análisis Asintótico',
                                'Análisis Complejo' => 'Análisis Complejo',
                                'Análisis Funcional' => 'Análisis Funcional',
                                'Análisis Real' => 'Análisis Real',
                                'Ecuaciones Diferenciales Ordinarias' => 'Ecuaciones Diferenciales Ordinarias',
                                'Ecuaciones Diferenciales Parciales' => 'Ecuaciones Diferenciales Parciales',
                                'Geometría Algebraica' => 'Geometría Algebraica',
                                'Geometría Diferencial' => 'Geometría Diferencial',
                                'Inferencia Estadistica' => 'Inferencia Estadistica',
                                'Probabilidad' => 'Probabilidad',
                                'Probabilidad I' => 'Probabilidad I',
                                'Teoría de Gráficas' => 'Teoría de Gráficas',
                                'Topología Algebráica' => 'Topología Algebráica',
                                'Topología Diferencial' => 'Topología Diferencial',
                                'Topología General' => 'Topología General',
                            ),
                        )
                    );
                }
                elseif($tipo === 'Avanzado') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                            'choices' => array(
                                'Curso Avanzado de Algebra' => 'Curso Avanzado de Algebra',
                                'Curso Avanzado de Análisis' => 'Curso avanzado de Análisis',
                                'Curso Avanzado de Ecuaciones diferenciales ordinarias y parciales' => 'Curso avanzado de Ecuaciones diferenciales ordinarias y parciales',
                                'Curso Avanzado de Geometría' => 'Curso avanzado de Geometría',
                                'Curso Avanzado de Matemáticas discretas' => 'Curso avanzado de Matemáticas discretas',
                                'Curso Avanzado de Topología' => 'Curso avanzado de Topología',

                            ),
                        )
                    )
                        ->add('tema')
                        ->add('objetivo', 'ckeditor', array(
                                'required' => true,
                                'config_name' => 'my_config'
                            )
                        )

                        ->add('temario', 'ckeditor', array(
                                'required' => true,
                                'config_name' => 'my_config'
                            )
                        )

                        ->add('bibliografia', 'ckeditor', array(
                                'required' => true,
                                'config_name' => 'my_config'
                            )
                        )

                        ->add('requisitos', 'ckeditor', array(
                                'required' => false,
                                'config_name' => 'my_config'
                            )
                        )

                        ->add('comentarios', 'ckeditor', array(
                                'required' => false,
                                'config_name' => 'my_config'
                            )
                        );
                }
                elseif($tipo === 'Seminario') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Seminario de Análisis' => 'Seminario de Análisis',
                            'Seminario de Ecuaciones diferenciales ordinarias y parciales' => 'Seminario de Ecuaciones diferenciales ordinarias y parciales',
                            'Seminario de Geometría' => 'SSeminario de Geometría',
                            'Seminario de Matemáticas Discretas' => 'Seminario de Matemáticas Discretas',
                            'Seminario de Probabilidad' => 'Seminario de Probabilidad',
                            'Seminario de Topología' => 'Seminario de Topología',
                        ),
                    ))
                        ->add('tema')
                    ;
                }
            }
        );

        $builder->addEventListener(FormEvents::PRE_SET_DATA, function(FormEvent $event){
            $tipo = $event->getData();
            $form = $event->getForm();

            if($tipo and $tipo->getTipo()){
                // obtenemos el country por medio del objeto state:
                if($tipo->getTipo()=== "Avanzado"){
                    $form
                        ->add('tema')
                        ->add('objetivo', 'ckeditor', array(
                                'required' => true,
                                'config_name' => 'my_config'
                            )
                        )
                        ->add('temario', 'ckeditor', array(
                                'required' => true,
                                'config_name' => 'my_config'
                            )
                        )
                        ->add('bibliografia', 'ckeditor', array(
                            'required' => true,
                            'config_name' => 'my_config'
                        ))
                        ->add('requisitos', 'ckeditor', array(
                            'required' => false,
                            'config_name' => 'my_config'
                        ))
                        ->add('comentarios', 'ckeditor', array(
                            'required' => false,
                            'config_name' => 'my_config'
                        ))
                        ->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                            'choices' => array(
                                'Curso Avanzado de Algebra' => 'Curso Avanzado de Algebra',
                                'Curso Avanzado de Análisis' => 'Curso avanzado de Análisis',
                                'Curso Avanzado de Ecuaciones diferenciales ordinarias y parciales' => 'Curso avanzado de Ecuaciones diferenciales ordinarias y parciales',
                                'Curso Avanzado de Geometría' => 'Curso avanzado de Geometría',
                                'Curso Avanzado de Matemáticas discretas' => 'Curso avanzado de Matemáticas discretas',
                                'Curso Avanzado de Topología' => 'Curso avanzado de Topología',



                            ),
                        ));
                }
                elseif($tipo->getTipo() === 'Básico') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Algebra Conmutativa' => 'Algebra Conmutativa',
                            'Algebra Moderna' => 'Algebra Moderna',
                            'Análisis Asintótico' => 'Análisis Asintótico',
                            'Análisis Complejo' => 'Análisis Complejo',
                            'Análisis Funcional' => 'Análisis Funcional',
                            'Análisis Real' => 'Análisis Real',
                            'Ecuaciones Diferenciales Ordinarias' => 'Ecuaciones Diferenciales Ordinarias',
                            'Ecuaciones Diferenciales Parciales' => 'Ecuaciones Diferenciales Parciales',
                            'Geometría Algebraica' => 'Geometría Algebraica',
                            'Geometría Diferencial' => 'Geometría Diferencial',
                            'Inferencia Estadistica' => 'Inferencia Estadistica',
                            'Probabilidad' => 'Probabilidad',
                            'Probabilidad I' => 'Probabilidad I',
                            'Teoría de Gráficas' => 'Teoría de Gráficas',
                            'Topología Algebráica' => 'Topología Algebráica',
                            'Topología Diferencial' => 'Topología Diferencial',
                            'Topología General' => 'Topología General',
                        ),
                    ));

                }
                elseif($tipo->getTipo() === 'Seminario') {
                    $form->add('curso', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                        'choices' => array(
                            'Seminario de Análisis' => 'Seminario de Análisis',
                            'Seminario de Ecuaciones diferenciales ordinarias y parciales' => 'Seminario de Ecuaciones diferenciales ordinarias y parciales',
                            'Seminario de Geometría' => 'SSeminario de Geometría',
                            'Seminario de Matemáticas Discretas' => 'Seminario de Matemáticas Discretas',
                            'Seminario de Probabilidad' => 'Seminario de Probabilidad',
                            'Seminario de Topología' => 'Seminario de Topología',
                        ),
                    ));
                }}
        });

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event) {
            $event->stopPropagation();
        }, 900); // Always set a higher priority than ValidationListener

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
