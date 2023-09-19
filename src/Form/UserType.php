<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class' => 'form-control', 'id' => 'email', 'required' => 'required'],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Mot de passe',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class' => 'form-control', 'id' => 'password', 'required' => 'required'],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
            'default_roles' => [],
        ]);
    }
}
