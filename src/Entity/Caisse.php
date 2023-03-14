<?php

namespace App\Entity;

use App\Repository\CaisseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Entity;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaisseRepository::class)]
class Caisse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomCaisse = null;

    #[ORM\Column(nullable: true)]
    private ?float $soldeCaisse = null;

    #[ORM\OneToMany(mappedBy: 'caisse', targetEntity: Service::class)]
    private Collection $services;

    #[ORM\ManyToOne(inversedBy: 'caisses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?EtatCaisse $etat;


    public function __construct()
    {
        $this->services = new ArrayCollection();
        //$this->etat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCaisse(): ?string
    {
        return $this->nomCaisse;
    }

    public function setNomCaisse(string $nomCaisse): self
    {
        $this->nomCaisse = $nomCaisse;

        return $this;
    }

    public function getSoldeCaisse(): ?int
    {
        return $this->soldeCaisse;
    }

    public function setSoldeCaisse(?int $soldeCaisse): self
    {
        $this->soldeCaisse = $soldeCaisse;

        return $this;
    }

    /**
     * @return Collection<int, Service>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
            $service->setCaisse($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getCaisse() === $this) {
                $service->setCaisse(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getId()."-".$this->getNomCaisse();
    }

    /**
     * @return Collection<int, EtatCaisse>
     */
    public function getEtat(): Collection
    {
        return $this->etat;
    }

    public function addEtat(EtatCaisse $etat): self
    {
        if (!$this->etat->contains($etat)) {
            $this->etat->add($etat);
            $etat->setCaisse($this);
        }

        return $this;
    }

    public function removeEtat(EtatCaisse $etat): self
    {
        if ($this->etat->removeElement($etat)) {
            // set the owning side to null (unless already changed)
            if ($etat->getCaisse() === $this) {
                $etat->setCaisse(null);
            }
        }

        return $this;
    }

    public function setEtat(?EtatCaisse $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
