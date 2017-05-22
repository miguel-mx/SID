<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AspiranteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('paterno')
            ->add('materno')
            ->add('nombre')
            ->add('telefono')
            ->add('rfc')
            ->add('correoPersonal', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                'required'    => false,
            ))
            ->add('pais', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'México' => 'México',
                    'Colombia' => 'Colombia',
                    'Venezuela' => 'Venezuela',
                    'Alemania' => 'Alemania',
                ),
                'choices_as_values' => true,
            ))
            ->add('estado', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(

                    'Aguascalientes' => 'Aguascalientes',
                    'Baja California' => 'Baja California',
                    'Baja California Sur' => 'Baja California Sur',
                    'Campeche' => 'Campeche',
                    'Chiapas' => 'Chiapas',
                    'Chihuahua' => 'Chihuahua',
                    'Coahuila' => 'Coahuila',
                    'Colima' => 'Colima',
                    'Distrito Federal' => 'Distrito Federal',
                    'Durango' => 'Durango',
                    'Estado de México' => 'Estado de México',
                    'Guanajuato' => 'Guanajuato',
                    'Guerrero' => 'Guerrero',
                    'Hidalgo' => 'Hidalgo',
                    'Jalisco' => 'Jalisco',
                    'Michoacán' => 'Michoacán',
                    'Morelos' => 'Morelos',
                    'Nayarit' => 'Nayarit',
                    'Nuevo León' => 'Nuevo León',
                    'Oaxaca' => 'Oaxaca',
                    'Puebla' => 'Puebla',
                    'Querétaro' => 'Querétaro',
                    'Quintana Roo' => 'Quintana Roo',
                    'San Luis Potosí' => 'San Luis Potosí',
                    'Sinaloa' => 'Sinaloa',
                    'Sonora' => 'Sonora',
                    'Tabasco' => 'Tabasco',
                    'Tamaulipas' => 'Tamaulipas',
                    'Tlaxcala' => 'Tlaxcala',
                    'Veracruz' => 'Veracruz',
                    'Yucatán' => 'Yucatán',
                    'Zacatecas' => 'Zacatecas',
                ),
                'required'    => false,
                'placeholder' => ''
            ))
            ->add('genero', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'Masculino' => 'Masculino',
                    'Femenino' => 'Femenino',
                ),
                'choices_as_values' => true,
                'placeholder' => ''
            ))
            ->add('estatus')
            ->add('curp')
            ->add('semestre')

            ->add('fechaNacimiento', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false
            ))

            ->add('programa', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(

                    'Maestría' => 'Maestría',
                    'Doctorado' => 'Doctorado',
                ),
                'choices_as_values' => true,
                'placeholder' => ''
            ))
            ->add('carrera')
            ->add('promedio')

            ->add('fechaInicioEstudios', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false
            ))

            ->add('fechaTerminoCreditos', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false
            ))

            ->add('fechaTitulacion', 'Symfony\Component\Form\Extension\Core\Type\DateType', array(
                'widget' => 'single_text',
                'html5' => false,
                'required' => false
            ))

            ->add('escuelaProcedencia')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Aspirante'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_aspirante';
    }


}
