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
        $builder->add('paterno')->add('materno')->add('nombre')->add('telefono')->add('correoPersonal')->add('pais')->add('estado')->add('genero')->add('estatus')->add('curp')->add('fechaNacimiento')->add('programa')->add('carrera')->add('promedio')->add('fechaInicioEstudios')->add('fechaTerminoCreditos')->add('fechaTitulacion')->add('escuelaProcedencia')->add('slug')->add('createdAt')->add('modifiedAt');
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
