<?php

namespace App\Entity;

use App\Repository\EtatcommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatcommandeRepository::class)]
class Etatcommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateupdate = null;

    #[ORM\OneToMany(mappedBy: 'etatcommande', targetEntity: Commande::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateupdate(): ?\DateTimeInterface
    {
        return $this->dateupdate;
    }

    public function setDateupdate(\DateTimeInterface $dateupdate): self
    {
        $this->dateupdate = $dateupdate;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setEtatcommande($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getEtatcommande() === $this) {
                $commande->setEtatcommande(null);
            }
        }

        return $this;
    }
}
