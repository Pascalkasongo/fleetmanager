<?php

namespace App\Entity;

use App\Repository\MaintenanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaintenanceRepository::class)]
class Maintenance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Vehicule::class)]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vehicule $vehicule = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $kilometrage = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $cout = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

   #[ORM\Column(nullable: true)]
private ?float $prochain_entretien = null;

   /**
    * @var Collection<int, Suivi>
    */
   #[ORM\OneToMany(targetEntity: Suivi::class, mappedBy: 'prochain_entretien')]
   private Collection $suivis;

   public function __construct()
   {
       $this->suivis = new ArrayCollection();
   }

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;
        return $this;
    }

    public function getKilometrage(): ?float
    {
        return $this->kilometrage;
    }

    public function setKilometrage(float $kilometrage): static
    {
        $this->kilometrage = $kilometrage;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function getCout(): ?string
    {
        return $this->cout;
    }

    public function setCout(string $cout): static
    {
        $this->cout = $cout;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;
        return $this;
    }

   public function getProchainEntretien(): ?float
    {
        return $this->prochain_entretien;
    }

        public function setProchainEntretien(?float $prochain_entretien): static
    {
        $this->prochain_entretien = $prochain_entretien;
        return $this;
    }

        /**
         * @return Collection<int, Suivi>
         */
        public function getSuivis(): Collection
        {
            return $this->suivis;
        }

        public function addSuivi(Suivi $suivi): static
        {
            if (!$this->suivis->contains($suivi)) {
                $this->suivis->add($suivi);
                $suivi->setProchainEntretien($this);
            }

            return $this;
        }

        public function removeSuivi(Suivi $suivi): static
        {
            if ($this->suivis->removeElement($suivi)) {
                // set the owning side to null (unless already changed)
                if ($suivi->getProchainEntretien() === $this) {
                    $suivi->setProchainEntretien(null);
                }
            }

            return $this;
        }
}