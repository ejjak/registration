<?php

namespace YouthConventionBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DelegatesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('lastname')
            ->add('church')
            ->add('gender', ChoiceType::class, array(
                'choices'  => array(
                    'Male' => 'Male',
                    'Female' => 'Female',
                ),
                'required'    => true,
                'placeholder' => 'Choose Gender',
            ))
            ->add('phone')
            ->add('district', ChoiceType::class, array(
                'choices'  => array(
                    'East' => 'East',
                    'West' => 'West',
                    'North' => 'North',
                    'South' => 'South',
                ),
                'required'    => false,
                'placeholder' => 'Select District',
            ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YouthConventionBundle\Entity\Delegates'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'youthconventionbundle_delegates';
    }


}
