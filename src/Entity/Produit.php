<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $sku = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $usercreate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable:true)]
    private ?\DateTimeInterface $datecreate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userdelete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datedelete = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userupdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateupdate = null;


    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateexpiration = null;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Categorie $categorie = null;

    #[ORM\OneToMany(mappedBy: 'Produit', targetEntity: LigneCommande::class)]
    private Collection $ligneCommandes;

    #[ORM\OneToMany(mappedBy: 'produit', targetEntity: Operation::class)]
    private Collection $operations;

    #[ORM\ManyToOne(inversedBy: 'produits')]
    #[ORM\JoinColumn(nullable: true)]
    private ?EtatProduit $etatProduit = null;


    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
        $this->operations = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getSku(): ?string
    {
        return $this->sku;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;

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

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * @return Collection<int, LigneCommande>
     */
    public function getLigneCommandes(): Collection
    {
        return $this->ligneCommandes;
    }

    public function addLigneCommande(LigneCommande $ligneCommande): self
    {
        if (!$this->ligneCommandes->contains($ligneCommande)) {
            $this->ligneCommandes->add($ligneCommande);
            $ligneCommande->setProduit($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getProduit() === $this) {
                $ligneCommande->setProduit(null);
            }
        }

        return $this;
    }

    public function getEtatProduit(): ?EtatProduit
    {
        return $this->etatProduit;
    }

    public function setEtatProduit(?EtatProduit $etatProduit): self
    {
        $this->etatProduit = $etatProduit;

        return $this;
    }

    public function getDateexpiration(): ?\DateTimeInterface
    {
        return $this->dateexpiration;
    }

    public function setDateexpiration(?\DateTimeInterface $dateexpiration): self
    {
        $this->dateexpiration = $dateexpiration;

        return $this;
    }

    /**
     * @return Collection<int, Operation>
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operation $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations->add($operation);
            $operation->setProduit($this);
        }

        return $this;
    }

    public function removeOperation(Operation $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getProduit() === $this) {
                $operation->setProduit(null);
            }
        }

        return $this;
    }
}
