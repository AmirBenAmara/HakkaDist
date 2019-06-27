<?php

namespace AppBundle\Form;
use AppBundle\Entity\Film;
use AppBundle\Entity\Salle;
use PUGX\AutocompleterBundle\Form\Type\AutocompleteType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BordereauSalleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('film', AutocompleteType::class,  ['class' => 'AppBundle:Film'])
            ->add('salle')// ,AutocompleteType::class, ['class' => Salle::clas1s])
            ->add('semaine')
            ->add('pourcentage_salle');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BordereauSalle'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_bordereausalle';
    }


}
