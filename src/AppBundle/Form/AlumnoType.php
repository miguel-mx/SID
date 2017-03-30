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
            ->add('estado', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    'required'    => false,
                    '' => '',
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
            ))
            ->add('comentarios')
            ->add('estatus', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices'  => array(
                    '' => '',
                    'Inscrito' => 'Inscrito',
                    'Baja temporal' => 'Baja temporal',
                    'Baja definitiva' => 'Baja definitiva',
                    'Intercambio' => 'Intercambio',
                    'Egresado' => 'Egresado',
                    'Graduado' => 'Graduado',
                ),
            ))
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
