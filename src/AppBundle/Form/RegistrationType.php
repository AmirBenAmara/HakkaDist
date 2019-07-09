<?php
/**
 * Created by PhpStorm.
 * User: Mlak
 * Date: 7/7/2019
 * Time: 12:47 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('roles', ChoiceType::class, [
            'choices' => [
                'ROLE_ADMIN' => 'ROLE_ADMIN',
                'ADMIN_REGION' => 'ADMIN_REGION',
                'SUPERVISEUR' => 'SUPERVISEUR',
                'FINANCIER' => 'FINANCIER',
            ],
            'required'  => true,
            'multiple' => true
        ]);
    }


    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }



}