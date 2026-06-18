<?php

namespace App\Entity;

use App\Repository\AffectationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AffectationRepository::class)]
class Affectation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $motif = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_debut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_fin = null;

    /**
     * @var Collection<int, Vehicule>
     */
    #[ORM\OneToMany(targetEntity: Vehicule::class, mappedBy: 'affectation')]
    private Collection $vehicule;

    /**
     * @var Collection<int, Chauffeur>
     */
    #[ORM\OneToMany(targetEntity: Chauffeur::class, mappedBy: 'affectation')]
    private Collection $Chauffeur;

    public function __construct()
    {
        $this->vehicule = new ArrayCollection();
        $this->Chauffeur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): static
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDateDebut(): ?\DateTime
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTime $date_debut): static
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTime $date_fin): static
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicule(): Collection
    {
        return $this->vehicule;
    }

    public function addVehicule(Vehicule $vehicule): static
    {
        if (!$this->vehicule->contains($vehicule)) {
            $this->vehicule->add($vehicule);
            $vehicule->setAffectation($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): static
    {
        if ($this->vehicule->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getAffectation() === $this) {
                $vehicule->setAffectation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Chauffeur>
     */
    public function getChauffeur(): Collection
    {
        return $this->Chauffeur;
    }

    public function addChauffeur(Chauffeur $chauffeur): static
    {
        if (!$this->Chauffeur->contains($chauffeur)) {
            $this->Chauffeur->add($chauffeur);
            $chauffeur->setAffectation($this);
        }

        return $this;
    }

    public function removeChauffeur(Chauffeur $chauffeur): static
    {
        if ($this->Chauffeur->removeElement($chauffeur)) {
            // set the owning side to null (unless already changed)
            if ($chauffeur->getAffectation() === $this) {
                $chauffeur->setAffectation(null);
            }
        }

        return $this;
    }
}
