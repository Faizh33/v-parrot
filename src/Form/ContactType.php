<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class'=>'form-control', 'id' => 'lastname', 'required' => 'required'],
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class'=>'form-control', 'id' => 'firstname', 'required' => 'required'],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class'=>'form-control', 'id' => 'email', 'required' => 'required'],
            ])
            ->add('phone', TextType::class, [
                'label' => 'Téléphone',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class'=>'form-control', 'id' => 'phone'],
                'required' => false,
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class'=>'form-control', 'id' => 'message', 'required' => 'required', 'rows' => 5],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
