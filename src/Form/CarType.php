<?php

namespace App\Form;

use App\Entity\Car;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CarType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('brand')
            ->add('model')
            ->add('price')
            ->add('entryIntoService', DateType::class, [
                'label' => 'Mise en circulation',
                'label_attr' => ['class' => 'label'],
                'attr' => ['class' => 'form-control', 'required' => 'required'],
                'years' => range(1950, date('Y')),
                'format' => 'dd/MM/yyyy',
            ])
            ->add('milage')
            ->add('fuel')
            ->add('gearbox', ChoiceType::class, [
                'label' => 'Boîte de vitesse',
                'choices' => [
                    '--Choisir un type--' => '',
                    'Manuelle' => 'manuelle',
                    'Automatique' => 'automatique',
                    'Séquentielle' => 'sequentielle',
                ],
            ])
            ->add('license', ChoiceType::class, [
                'label' => 'Permis',
                'choices' => [
                    '--Choisir une option--' => '',
                    'Avec Permis' => 'avec',
                    'Sans Permis' => 'sans',
                ],
            ])
            ->add('color')
            ->add('doorsNb')
            ->add('seatNb')
            ->add('fiscalPower')
            ->add('dinPower')
            ->add('consumption')
            ->add('critAir', ChoiceType::class, [
                'label' => "Crit'Air",
                'choices' => [
                    '--Choisir un niveau--' => '',
                    '0' => '0',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                ],
            ])
            ->add('description')
            ->add('carOptions', CollectionType::class, [
                'entry_type' => TextType::class,
                'entry_options' => ['label' => false],
                'allow_add' => true,
                'allow_delete' =>true,
                'by_reference' => false,
            ])
            ->add('pictures', FileType::class, [
                'label' => 'Photos',
                'multiple' => true,
                'mapped' => false,
                'required' => true,
                'attr' => [
                    'accept' => '.png, .jpg',
                ],
            ])       
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Car::class,
        ]);
    }
}
