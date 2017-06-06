<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EstatusExamenGeneralType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('examenGeneral')
            ->add('estatus', 'Symfony\Component\Form\Extension\Core\Type\ChoiceType', array(
                'choices' => array(
                    'Solicitado' => 'Solicitado',
                    'Aprobado' => 'Aprobado',
                    'No Aprobado' => 'No Aprobado',
                    'Mención Honorífica' => 'Mención Honorífica',
                    'No Presentado' => 'No presentado',

                ),
                'placeholder' => ''
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EstatusExamenGeneral'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_estatusexamengeneral';
    }


}
