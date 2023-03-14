<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $statutLC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $UserCreateLC = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datecreateLC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userdeleteLC = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datedeleteLC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userupdateLC = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateuserLC = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeLC = null;

    #[ORM\Column]
    private ?bool $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    private ?Produit $Produit = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    private ?Commande $Commande = null;

   
 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatutLC(): ?string
    {
        return $this->statutLC;
    }

    public function setStatutLC(?string $statutLC): self
    {
        $this->statutLC = $statutLC;

        return $this;
    }

    public function getUserCreateLC(): ?string
    {
        return $this->UserCreateLC;
    }

    public function setUserCreateLC(?string $UserCreateLC): self
    {
        $this->UserCreateLC = $UserCreateLC;

        return $this;
    }

    public function getDatecreateLC(): ?\DateTimeInterface
    {
        return $this->datecreateLC;
    }

    public function setDatecreateLC(?\DateTimeInterface $datecreateLC): self
    {
        $this->datecreateLC = $datecreateLC;

        return $this;
    }

    public function getUserdeleteLC(): ?string
    {
        return $this->userdeleteLC;
    }

    public function setUserdeleteLC(?string $userdeleteLC): self
    {
        $this->userdeleteLC = $userdeleteLC;

        return $this;
    }

    public function getDatedeleteLC(): ?\DateTimeInterface
    {
        return $this->datedeleteLC;
    }

    public function setDatedeleteLC(?\DateTimeInterface $datedeleteLC): self
    {
        $this->datedeleteLC = $datedeleteLC;

        return $this;
    }

    public function getUserupdateLC(): ?string
    {
        return $this->userupdateLC;
    }

    public function setUserupdateLC(?string $userupdateLC): self
    {
        $this->userupdateLC = $userupdateLC;

        return $this;
    }

    public function getDateuserLC(): ?\DateTimeInterface
    {
        return $this->dateuserLC;
    }

    public function setDateuserLC(?\DateTimeInterface $dateuserLC): self
    {
        $this->dateuserLC = $dateuserLC;

        return $this;
    }

    public function getCodeLC(): ?string
    {
        return $this->codeLC;
    }

    public function setCodeLC(?string $codeLC): self
    {
        $this->codeLC = $codeLC;

        return $this;
    }

    public function isQuantite(): ?bool
    {
        return $this->quantite;
    }

    public function setQuantite(bool $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->Produit;
    }

    public function setProduit(?Produit $Produit): self
    {
        $this->Produit = $Produit;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->Commande;
    }

    public function setCommande(?Commande $Commande): self
    {
        $this->Commande = $Commande;

        return $this;
    }


}
