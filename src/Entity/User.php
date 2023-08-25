<?php

namespace App\Entity;



use App\Entity\Adresse;
use App\Entity\Commentaire;
use App\Entity\ContratLocation;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\OneToMany(mappedBy: 'Users', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?ConditionGenerale $conditions = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Adresse $adresses = null;

    #[ORM\OneToMany(mappedBy: 'users', targetEntity: ContratLocation::class)]
    private Collection $contratLocations;

    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
        $this->contratLocations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): static
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setUsers($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getUsers() === $this) {
                $commentaire->setUsers(null);
            }
        }

        return $this;
    }

    public function getConditions(): ?ConditionGenerale
    {
        return $this->conditions;
    }

    public function setConditions(?ConditionGenerale $conditions): static
    {
        $this->conditions = $conditions;

        return $this;
    }

    public function getAdresses(): ?adresse
    {
        return $this->adresses;
    }

    public function setAdresses(?adresse $adresses): static
    {
        $this->adresses = $adresses;

        return $this;
    }

    /**
     * @return Collection<int, ContratLocation>
     */
    public function getContratLocations(): Collection
    {
        return $this->contratLocations;
    }

    public function addContratLocation(ContratLocation $contratLocation): static
    {
        if (!$this->contratLocations->contains($contratLocation)) {
            $this->contratLocations->add($contratLocation);
            $contratLocation->setUsers($this);
        }

        return $this;
    }

    public function removeContratLocation(ContratLocation $contratLocation): static
    {
        if ($this->contratLocations->removeElement($contratLocation)) {
            // set the owning side to null (unless already changed)
            if ($contratLocation->getUsers() === $this) {
                $contratLocation->setUsers(null);
            }
        }

        return $this;
    }
}
