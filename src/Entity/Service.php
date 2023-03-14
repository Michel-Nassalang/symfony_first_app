<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
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

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateOuverture = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateFermeture = null;

    #[ORM\Column]
    private ?int $montantInitial = null;

    #[ORM\Column]
    private ?int $montantFinal = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Caisse $caisse = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EtatService $etatService = null;

    #[ORM\OneToMany(mappedBy: 'service', targetEntity: Depense::class)]
    private Collection $depenses;

    public function __construct()
    {
        $this->depenses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function isStatut(): ?bool
    {
        return $this->statut;
    }

    public function setStatut(bool $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getDateOuverture(): ?\DateTimeInterface
    {
        return $this->dateOuverture;
    }

    public function setDateOuverture(\DateTimeInterface $dateOuverture): self
    {
        $this->dateOuverture = $dateOuverture;

        return $this;
    }

    public function getDateFermeture(): ?\DateTimeInterface
    {
        return $this->dateFermeture;
    }

    public function setDateFermeture(\DateTimeInterface $dateFermeture): self
    {
        $this->dateFermeture = $dateFermeture;

        return $this;
    }

    public function getMontantInitial(): ?int
    {
        return $this->montantInitial;
    }

    public function setMontantInitial(int $montantInitial): self
    {
        $this->montantInitial = $montantInitial;

        return $this;
    }

    public function getMontantFinal(): ?int
    {
        return $this->montantFinal;
    }

    public function setMontantFinal(int $montantFinal): self
    {
        $this->montantFinal = $montantFinal;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

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

    public function getEtatService(): ?EtatService
    {
        return $this->etatService;
    }

    public function setEtatService(?EtatService $etatService): self
    {
        $this->etatService = $etatService;

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
            $depense->setService($this);
        }

        return $this;
    }

    public function removeDepense(Depense $depense): self
    {
        if ($this->depenses->removeElement($depense)) {
            // set the owning side to null (unless already changed)
            if ($depense->getService() === $this) {
                $depense->setService(null);
            }
        }

        return $this;
    }
    public function __ToString(){
        return $this->getId()."-".$this->getDateOuverture()."-".$this->getDateFermeture()
        ."-".$this->getMontantInitial()."-".$this->getMontantFinal();
    }
}
