<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class RegionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('adresse')
            ->add('mat_fiscale')
            ->add('gouvernerat', ChoiceType::class, array(
            'choices' => array(
                'Ariana' => 'Ariana',
                'Béja' => 'Béja',
                'Ben Arous' => 'Ben Arous',
                'Bizerte' => 'Bizerte',
                'Gabès' =>  'Gabès',
                'Gafsa' =>  'Gafsa',
                'Jendouba' =>  'Jendouba',
                'Kairouan' =>  'Kairouan',
                'Kasserine' => 'Kasserine',
                'Kébili' => 'Kébili',
                'Le Kef' => 'Le Kef',
                'Mahdia' => 'Mahdia',
                'La Manouba' => 'La Manouba',
                'Médenine' => 'Médenine',
                'Monastir' => 'Monastir',
                'Nabeul' => 'Nabeul',
                'Sfax' => 'Sfax',
                'Sidi Bouzid' => 'Sidi Bouzid',
                'Siliana' => 'Siliana',
                'Sousse' => 'Sousse',
                'Tataouine' => 'Tataouine',
                'Tozeur' => 'Tozeur',
                'Tunis' => 'Tunis',
                'Zaghouan' => 'Zaghouan'

            ),
            'attr' => array('class' => 'dropdown')

            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Region'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_region';
    }


}
