<?php

namespace App\Entity;

use App\Repository\EtatCaisseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatCaisseRepository::class)]
class EtatCaisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /*#[ORM\Column(nullable: true)]
    private ?bool $etat = null; */

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getcode(): ?string
    {
        return $this->code;
    }

    public function setcode(?string $en_attente): self
    {
        $this->code = $en_attente;

        return $this;
    }

    public function getCaisse(): ?Caisse
    {
        return $this->caisse;
    }

    public function setCaisse(?Caisse $caisse): self
    {
        $this->caisse = $caisse;

        return $this;
    }
}
