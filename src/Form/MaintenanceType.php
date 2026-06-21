<?php

namespace App\Form;

use App\Entity\Maintenance;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaintenanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date')
            ->add('kilometrage')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Vidange' => 'Vidange',
                    'Révision' => 'Révision',
                    'Freins' => 'Freins',
                    'Pneus' => 'Pneus',
                    'Diagnostic' => 'Diagnostic',
                ]
            ])      
            ->add('cout')
            ->add('description')
            ->add('prochain_entretien')
            ->add('vehicule', EntityType::class, [
            'class' => Vehicule::class,
            'choice_label' => 'immatriculation', // ou une autre propriété
            'placeholder' => '-- Sélectionnez un véhicule --',
        ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Maintenance::class,
        ]);
    }
}
