<?php

namespace App\Entity;

use App\Repository\RapportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RapportRepository::class)]
class Rapport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $usercreate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datecreate = null;

    #[ORM\Column(length: 255)]
    private ?string $userdelete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datedelete = null;

    #[ORM\Column(length: 255)]
    private ?string $userupdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateupdate = null;

    #[ORM\Column(length: 255)]
    private ?string $rapport = null;

    #[ORM\Column(nullable: true)]
    private ?float $mntvente = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUsercreate(): ?string
    {
        return $this->usercreate;
    }

    public function setUsercreate(string $usercreate): self
    {
        $this->usercreate = $usercreate;

        return $this;
    }

    public function getDatecreate(): ?\DateTimeInterface
    {
        return $this->datecreate;
    }

    public function setDatecreate(\DateTimeInterface $datecreate): self
    {
        $this->datecreate = $datecreate;

        return $this;
    }

    public function getUserdelete(): ?string
    {
        return $this->userdelete;
    }

    public function setUserdelete(string $userdelete): self
    {
        $this->userdelete = $userdelete;

        return $this;
    }

    public function getDatedelete(): ?\DateTimeInterface
    {
        return $this->datedelete;
    }

    public function setDatedelete(\DateTimeInterface $datedelete): self
    {
        $this->datedelete = $datedelete;

        return $this;
    }

    public function getUserupdate(): ?string
    {
        return $this->userupdate;
    }

    public function setUserupdate(string $userupdate): self
    {
        $this->userupdate = $userupdate;

        return $this;
    }

    public function getDateupdate(): ?\DateTimeInterface
    {
        return $this->dateupdate;
    }

    public function setDateupdate(\DateTimeInterface $dateupdate): self
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    public function getRapport(): ?string
    {
        return $this->rapport;
    }

    public function setRapport(string $rapport): self
    {
        $this->rapport = $rapport;

        return $this;
    }

    public function getMntvente(): ?float
    {
        return $this->mntvente;
    }

    public function setMntvente(?float $mntvente): self
    {
        $this->mntvente = $mntvente;

        return $this;
    }
}

