<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


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
            ->add('correoInstitucional', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                    'required'    => false,
            ))
            ->add('correoPersonal')
            ->add('escuelaProcedencia')
            ->add('pais', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'México' => 'México',
                    'Colombia' => 'Colombia',
                    'Venezuela' => 'Venezuela',
                    'Alemania' => 'Alemania',
                ),
                'choices_as_values' => true,
                ))
            ->add('numeroCuenta')
            ->add('cvu')
           /* ->add('estado')
            ->add('comentarios')
            ->add('estatus')*/
            ->add('tesisLicenciaturaFile', 'Symfony\Component\Form\Extension\Core\Type\FileType', array(
                'required' => false,
            ))
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
