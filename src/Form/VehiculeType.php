<?php

namespace App\Form;

use App\Entity\Affectation;
use App\Entity\Vehicule;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehiculeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type')
            ->add('immatriculation')
            ->add('marque')
            ->add('modele')
            ->add('chassis')
            ->add('carburan')
            ->add('affectation', EntityType::class, [
                'class' => Affectation::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicule::class,
        ]);
    }
}
