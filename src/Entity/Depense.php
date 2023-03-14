<?php

namespace App\Entity;

use App\Repository\DepenseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DepenseRepository::class)]
class Depense
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $montantDepense = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDepense = null;

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

    #[ORM\ManyToOne(inversedBy: 'depenses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeDepense $typeDepense = null;

    #[ORM\ManyToOne(inversedBy: 'depenses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Service $service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getMontantDepense(): ?int
    {
        return $this->montantDepense;
    }

    public function setMontantDepense(int $montantDepense): self
    {
        $this->montantDepense = $montantDepense;

        return $this;
    }

    public function getDateDepense(): ?\DateTimeInterface
    {
        return $this->dateDepense;
    }

    public function setDateDepense(\DateTimeInterface $dateDepense): self
    {
        $this->dateDepense = $dateDepense;

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

    public function getTypeDepense(): ?TypeDepense
    {
        return $this->typeDepense;
    }

    public function setTypeDepense(?TypeDepense $typeDepense): self
    {
        $this->typeDepense = $typeDepense;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): self
    {
        $this->service = $service;

        return $this;
    }
    
}
