<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datecreation = null;

    #[ORM\Column(length: 255)]
    private ?string $userdelete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $datedelete = null;

    #[ORM\Column(length: 255)]
    private ?string $userupdate = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: '0')]
    private ?string $numcommande = null;

    #[ORM\OneToMany(mappedBy: 'Commande', targetEntity: LigneCommande::class)]
    private Collection $ligneCommandes;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Etatcommande $etatcommande = null;
    public function __construct()
    {
        $this->ligneCommandes = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDatecreation(): ?\DateTimeInterface
    {
        return $this->datecreation;
    }

    public function setDatecreation(\DateTimeInterface $datecreation): self
    {
        $this->datecreation = $datecreation;

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNumcommande(): ?string
    {
        return $this->numcommande;
    }

    public function setNumcommande(string $numcommande): self
    {
        $this->numcommande = $numcommande;

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
            $ligneCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneCommande(LigneCommande $ligneCommande): self
    {
        if ($this->ligneCommandes->removeElement($ligneCommande)) {
            // set the owning side to null (unless already changed)
            if ($ligneCommande->getCommande() === $this) {
                $ligneCommande->setCommande(null);
            }
        }

        return $this;
    }

    public function getEtatcommande(): ?Etatcommande
    {
        return $this->etatcommande;
    }

    public function setEtatcommande(?Etatcommande $etatcommande): self
    {
        $this->etatcommande = $etatcommande;

        return $this;
    }
}
