<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AlumnoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paterno')
            ->add('materno')
            ->add('nombre')
            ->add('telefono')
            ->add('correoInstitucional', 'Symfony\Component\Form\Extension\Core\Type\TextType',array(
                    'required'    => false,
            ))
            ->add('correoPersonal')
            ->add('escuelaProcedencia')
            ->add('pais')
            ->add('numeroCuenta')
            ->add('cvu')
            ->add('condicionado')
            ->add('cursos')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Alumno'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_alumno';
    }


}
