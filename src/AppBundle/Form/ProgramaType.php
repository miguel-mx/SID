<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProgramaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('programa')
            ->add('ingreso')
            ->add('termino')
            ->add('fechaGradoUMSNH', DateType::class, array(
                'widget' => 'choice',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker']
            ))
            ->add('fechaGradoUNAM', DateType::class, array(
                'widget' => 'choice'))
            ->add('opcionTitulacion')
            ->add('tituloTesis')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Programa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_programa';
    }


}
