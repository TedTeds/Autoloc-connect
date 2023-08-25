<?php

namespace App\Entity;

use App\Repository\VehiculeObtenueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehiculeObtenueRepository::class)]
class VehiculeObtenue
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $Prix = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?ContratLocation $contrat = null;

    #[ORM\OneToMany(mappedBy: 'vehiculeObtenue', targetEntity: Vehicule::class)]
    private Collection $vehicules;

    public function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getContrat(): ?ContratLocation
    {
        return $this->contrat;
    }

    public function setContrat(?ContratLocation $contrat): static
    {
        $this->contrat = $contrat;

        return $this;
    }

    /**
     * @return Collection<int, Vehicule>
     */
    public function getVehicules(): Collection
    {
        return $this->vehicules;
    }

    public function addVehicule(Vehicule $vehicule): static
    {
        if (!$this->vehicules->contains($vehicule)) {
            $this->vehicules->add($vehicule);
            $vehicule->setVehiculeObtenue($this);
        }

        return $this;
    }

    public function removeVehicule(Vehicule $vehicule): static
    {
        if ($this->vehicules->removeElement($vehicule)) {
            // set the owning side to null (unless already changed)
            if ($vehicule->getVehiculeObtenue() === $this) {
                $vehicule->setVehiculeObtenue(null);
            }
        }

        return $this;
    }
}
