<?php

namespace App\Entity;

use App\Repository\ChauffeurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChauffeurRepository::class)]
class Chauffeur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $numero_permi = null;

    #[ORM\Column(length: 255)]
    private ?string $categorie_permi = null;

    #[ORM\Column(length: 255)]
    private ?string $Date_expiration = null;

    #[ORM\ManyToOne(inversedBy: 'Chauffeur')]
    private ?Affectation $affectation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNumeroPermi(): ?string
    {
        return $this->numero_permi;
    }

    public function setNumeroPermi(string $numero_permi): static
    {
        $this->numero_permi = $numero_permi;

        return $this;
    }

    public function getCategoriePermi(): ?string
    {
        return $this->categorie_permi;
    }

    public function setCategoriePermi(string $categorie_permi): static
    {
        $this->categorie_permi = $categorie_permi;

        return $this;
    }

    public function getDateExpiration(): ?string
    {
        return $this->Date_expiration;
    }

    public function setDateExpiration(string $Date_expiration): static
    {
        $this->Date_expiration = $Date_expiration;

        return $this;
    }

    public function getAffectation(): ?Affectation
    {
        return $this->affectation;
    }

    public function setAffectation(?Affectation $affectation): static
    {
        $this->affectation = $affectation;

        return $this;
    }
}
