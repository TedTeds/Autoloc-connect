<?php

namespace App\Entity;

use App\Entity\Genre;
use App\Entity\Image;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\VehiculeRepository;

#[ORM\Entity(repositoryClass: VehiculeRepository::class)]
class Vehicule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?VehiculeObtenue $vehiculeObtenue = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?Genre $genres = null;

    #[ORM\ManyToOne(inversedBy: 'vehicules')]
    private ?image $images = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getVehiculeObtenue(): ?VehiculeObtenue
    {
        return $this->vehiculeObtenue;
    }

    public function setVehiculeObtenue(?VehiculeObtenue $vehiculeObtenue): static
    {
        $this->vehiculeObtenue = $vehiculeObtenue;

        return $this;
    }

    public function getGenres(): ?genre
    {
        return $this->genres;
    }

    public function setGenres(?genre $genres): static
    {
        $this->genres = $genres;

        return $this;
    }

    public function getImages(): ?image
    {
        return $this->images;
    }

    public function setImages(?image $images): static
    {
        $this->images = $images;

        return $this;
    }
}
