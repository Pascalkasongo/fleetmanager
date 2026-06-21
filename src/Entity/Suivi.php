<?php

namespace App\Entity;

use App\Repository\SuiviRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiviRepository::class)]
class Suivi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'suivis')]
    private ?Vehicule $vehicule = null;

    #[ORM\Column]
    private ?float $kilometrage_actuel = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column]
    private ?float $prochain_entretien = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVehicule(): ?Vehicule
    {
        return $this->vehicule;
    }

    public function setVehicule(?Vehicule $vehicule): static
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    public function getKilometrageActuel(): ?float
    {
        return $this->kilometrage_actuel;
    }

    public function setKilometrageActuel(float $kilometrage_actuel): static
    {
        $this->kilometrage_actuel = $kilometrage_actuel;

        return $this;
    }

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getProchainEntretien(): ?float
    {
        return $this->prochain_entretien;
    }

    public function setProchainEntretien(float $prochain_entretien): static
    {
        $this->prochain_entretien = $prochain_entretien;

        return $this;
    }

    

}
