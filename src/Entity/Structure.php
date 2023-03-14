<?php

namespace App\Entity;

use App\Repository\StructureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StructureRepository::class)]
class Structure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $addresse = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usercreate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datecreate = null;

    #[ORM\Column(nullable: true)]
    private ?bool $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userdelete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datedelete = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userupdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateupdate = null;

    #[ORM\ManyToOne(inversedBy: 'structures')]
    private ?TypeStructure $typestructure = null;

    #[ORM\OneToMany(mappedBy: 'structure', targetEntity: Utilisateur::class)]
    private Collection $utilisateurs;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAddresse(): ?string
    {
        return $this->addresse;
    }

    public function setAddresse(string $addresse): self
    {
        $this->addresse = $addresse;

        return $this;
    }

    public function getUsercreate(): ?string
    {
        return $this->usercreate;
    }

    public function setUsercreate(?string $usercreate): self
    {
        $this->usercreate = $usercreate;

        return $this;
    }

    public function getDatecreate(): ?\DateTimeInterface
    {
        return $this->datecreate;
    }

    public function setDatecreate(?\DateTimeInterface $datecreate): self
    {
        $this->datecreate = $datecreate;

        return $this;
    }

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(?bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUserdelete(): ?string
    {
        return $this->userdelete;
    }

    public function setUserdelete(?string $userdelete): self
    {
        $this->userdelete = $userdelete;

        return $this;
    }

    public function getDatedelete(): ?\DateTimeInterface
    {
        return $this->datedelete;
    }

    public function setDatedelete(?\DateTimeInterface $datedelete): self
    {
        $this->datedelete = $datedelete;

        return $this;
    }

    public function getUserupdate(): ?string
    {
        return $this->userupdate;
    }

    public function setUserupdate(?string $userupdate): self
    {
        $this->userupdate = $userupdate;

        return $this;
    }

    public function getDateupdate(): ?\DateTimeInterface
    {
        return $this->dateupdate;
    }

    public function setDateupdate(?\DateTimeInterface $dateupdate): self
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    public function getTypestructure(): ?TypeStructure
    {
        return $this->typestructure;
    }

    public function setTypestructure(?TypeStructure $typestructure): self
    {
        $this->typestructure = $typestructure;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setStructure($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getStructure() === $this) {
                $utilisateur->setStructure(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNom();
    }
}
