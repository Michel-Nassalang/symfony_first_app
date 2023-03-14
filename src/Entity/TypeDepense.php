<?php

namespace App\Entity;

use App\Repository\TypeDepenseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeDepenseRepository::class)]
class TypeDepense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $userCreate = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $userUpdate = null;

    #[ORM\Column(length: 255,nullable:true)]
    private ?string $userDelete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $dateCreate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $dateUpdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE,nullable:true)]
    private ?\DateTimeInterface $dateDelete = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\OneToMany(mappedBy: 'typeDepense', targetEntity: Depense::class)]
    private Collection $depenses;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
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

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getUserCreate(): ?string
    {
        return $this->userCreate;
    }

    public function setUserCreate(string $userCreate): self
    {
        $this->userCreate = $userCreate;

        return $this;
    }

    public function getUserUpdate(): ?string
    {
        return $this->userUpdate;
    }

    public function setUserUpdate(string $userUpdate): self
    {
        $this->userUpdate = $userUpdate;

        return $this;
    }

    public function getUserDelete(): ?string
    {
        return $this->userDelete;
    }

    public function setUserDelete(string $userDelete): self
    {
        $this->userDelete = $userDelete;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(\DateTimeInterface $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    public function getDateDelete(): ?\DateTimeInterface
    {
        return $this->dateDelete;
    }

    public function setDateDelete(\DateTimeInterface $dateDelete): self
    {
        $this->dateDelete = $dateDelete;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return Collection<int, Depense>
     */
    public function getDepenses(): Collection
    {
        return $this->depenses;
    }

    public function addDepense(Depense $depense): self
    {
        if (!$this->depenses->contains($depense)) {
            $this->depenses->add($depense);
            $depense->setTypeDepense($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): self
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getTypeDepense() === $this) {
                $depense->setTypeDepense(null);
            }
        }

        return $this;
    }
    
    public function __ToString(){
        return $this->getId()."-".$this->getNom()."-".$this->getCode();
    }
}
