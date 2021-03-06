<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AcademicoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('paterno')
            ->add('materno')
            ->add('nombre')
            ->add('rfc')
            ->add('curp')
            ->add('adscripcion')
            ->add('correo')
            ->add('telefono', 'Symfony\Component\Form\Extension\Core\Type\TextType', array(
                'required'    => false,
            ))
            ->add('extension')
            ->add('cvu')
            ->add('acreditacion')
            ->add('areaInvestigacion')
            ->add('resumen')
            ->add('ubicacion')
            ->add('pagina')
            ->add('basico')
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Academico'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_academico';
    }


}
