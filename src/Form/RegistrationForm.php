<?php

declare(strict_types=1);

namespace App\Form;

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

        $builder->add('termsConditions', CheckboxType::class, [
            'label' => 'I accept the terms & conditions',
            'required' => true,
        ]);

        $builder->add('privacyPolicy', CheckboxType::class, [
            'label' => 'I have read and understood the privacy policy',
            'required' => true,
        ]);

        $builder->add('emailFrequency', ChoiceType::class, [
            'label' => 'Opt in to emails:',
            'multiple' => false,
            'expanded' => true,
            'choices' => [
                'Yes' => 'email_yes',
                'No' => 'email_no',
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
        $resolver->setDefaults([]);
    }

    /**
     * @return string
     */
    public function getBlockPrefix(): string
    {
        return self::FORM_NAME;
    }
}
