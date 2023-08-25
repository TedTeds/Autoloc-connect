<?php

namespace App\Entity;

use App\Repository\ConditionGeneraleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConditionGeneraleRepository::class)]
class ConditionGenerale
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $condition_gene = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConditionGene(): ?string
    {
        return $this->condition_gene;
    }

    public function setConditionGene(string $condition_gene): static
    {
        $this->condition_gene = $condition_gene;

        return $this;
    }
}
