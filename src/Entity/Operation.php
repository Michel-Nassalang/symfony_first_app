<?php

namespace App\Entity;

use App\Repository\OperationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OperationRepository::class)]
class Operation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Operation = null;

    #[ORM\Column(length: 255)]
    private ?string $TypeOperation = null;

    #[ORM\Column(length: 255)]
    private ?string $nomOperation = null;

    #[ORM\Column(length: 255)]
    private ?string $nbOperation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperation(): ?string
    {
        return $this->Operation;
    }

    public function setOperation(string $Operation): self
    {
        $this->Operation = $Operation;

        return $this;
    }

    public function getTypeOperation(): ?string
    {
        return $this->TypeOperation;
    }

    public function setTypeOperation(string $TypeOperation): self
    {
        $this->TypeOperation = $TypeOperation;

        return $this;
    }

    public function getNomOperation(): ?string
    {
        return $this->nomOperation;
    }

    public function setNomOperation(string $nomOperation): self
    {
        $this->nomOperation = $nomOperation;

        return $this;
    }

    public function getNbOperation(): ?string
    {
        return $this->nbOperation;
    }

    public function setNbOperation(string $nbOperation): self
    {
        $this->nbOperation = $nbOperation;

        return $this;
    }
}
