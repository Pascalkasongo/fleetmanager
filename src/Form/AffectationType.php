<?php

namespace App\Form;

use App\Entity\Affectation;
use App\Entity\Chauffeur;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AffectationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('motif')
            ->add('date_debut')
            ->add('date_fin')
            
            ->add('vehicule', EntityType::class, [
            'class' => Vehicule::class,
            'choice_label' => 'immatriculation', // ou une autre propriété
            'placeholder' => '-- Sélectionnez un véhicule --',
        ])

        ->add('chauffeur', EntityType::class, [
            'class' => Chauffeur::class,
            'choice_label' => function (Chauffeur $chauffeur) {
                return $chauffeur->getNom() . ' ' . $chauffeur->getPrenom();
            },
            'placeholder' => '-- Sélectionnez un chauffeur --',
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Affectation::class,
        ]);
    }
}
