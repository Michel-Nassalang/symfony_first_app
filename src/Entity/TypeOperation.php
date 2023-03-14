<?php

namespace App\Entity;

use App\Repository\TypeOperationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeOperationRepository::class)]
class TypeOperation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomOp = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOp(): ?string
    {
        return $this->nomOp;
    }

    public function setNomOp(string $nomOp): self
    {
        $this->nomOp = $nomOp;

        return $this;
    }
}
