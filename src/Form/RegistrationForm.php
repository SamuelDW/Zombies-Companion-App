<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationFormType extends AbstractType
{
    public const FORM_NAME = 'registrationForm';

    /**
     * Form Builder for Registration Form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('firstName', TextType::class, [
            'label' => 'Firstname:',
            'required' => true,
            'attr' => [
                'class' => 'form-input input-type-text',
                'placeholder' => 'John',
            ],

        ]);

        $builder->add('lastName', TextType::class, [
            'label' => 'Lastname:',
            'required' => true,
            'attr' => [
                'class' => 'form-input input-type-text',
                'placeholder' => 'Doe'
            ],

        ]);

        $builder->add('email', EmailType::class, [
            'label' => 'Email:',
            'required' => true,
            'attr' => [
                'class' => 'form-input input-type-email',
                'placeholder' => 'example@example.com'
            ]
        ]);

        $builder->add('username', TextType::class, [
            'label' => 'Username:',
            'required' => true,
            'attr' => [
                'class' => 'form-input input-type-text',
            ]
        ]);

        $builder->add('password', PasswordType::class, [
            'label' => 'Password:',
            'required' => true,
            'attr' => [
                'class' => 'form-input input-type-email',
            ]
        ]);

        $builder->add('acceptTermsAndConditions', ChoiceType::class, [
            'label' => 'I accept the terms and conditions',
            'required' => true,
            'multiple' => false,
            'expanded' => true,
            'choices' => [
                'Yes' => true,
                'No' => false,
            ],
        ]);

        $builder->add('acceptPrivacyPolicy', ChoiceType::class, [
            'label' => 'I have read and understood the privacy policy',
            'required' => true,
            'multiple' => false,
            'expanded' => true,
            'choices' => [
                'Yes' => true,
                'No' => false,
            ],
        ]);

        $builder->add('emailOptIn', ChoiceType::class, [
            'label' => 'Opt in to emails:',
            'required' => true,
            'multiple' => false,
            'expanded' => true,
            'choices' => [
                'Yes' => true,
                'No' => false,
            ],
        ]);
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return self::FORM_NAME;
    }
}
