<?php

namespace App\Entity;

use App\Repository\EtatServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtatServiceRepository::class)]
class EtatService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $statutES = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $UserCreateES = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datecreateES = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userdeleteES = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datedeleteES = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userupdateES = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateupdateES = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $codeES = null;
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $attenteES = null;


    


    #[ORM\OneToMany(mappedBy: 'etatService', targetEntity: Service::class)]
    private Collection $services;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isStatutES(): ?bool
    {
        return $this->statutES;
    }

    public function setStatutES(?bool $statutES): self
    {
        $this->statutES = $statutES;

        return $this;
    }

    public function getUserCreateES(): ?string
    {
        return $this->UserCreateES;
    }

    public function setUserCreateES(?string $UserCreateES): self
    {
        $this->UserCreateES = $UserCreateES;

        return $this;
    }

    public function getDatecreateES(): ?\DateTimeInterface
    {
        return $this->datecreateES;
    }

    public function setDatecreateES(?\DateTimeInterface $datecreateES): self
    {
        $this->datecreateES = $datecreateES;

        return $this;
    }

    public function getUserdeleteES(): ?string
    {
        return $this->userdeleteES;
    }

    public function setUserdeleteES(?string $userdeleteES): self
    {
        $this->userdeleteES = $userdeleteES;

        return $this;
    }

    public function getDatedeleteES(): ?\DateTimeInterface
    {
        return $this->datedeleteES;
    }

    public function setDatedeleteES(?\DateTimeInterface $datedeleteES): self
    {
        $this->datedeleteES = $datedeleteES;

        return $this;
    }

    public function getUserupdateES(): ?string
    {
        return $this->userupdateES;
    }

    public function setUserupdateES(?string $userupdateES): self
    {
        $this->userupdateES = $userupdateES;

        return $this;
    }

    public function getDateupdateES(): ?\DateTimeInterface
    {
        return $this->dateupdateES;
    }

    public function setDateupdateES(?\DateTimeInterface $dateupdateES): self
    {
        $this->dateupdateES = $dateupdateES;

        return $this;
    }

    public function getCodeES(): ?string
    {
        return $this->codeES;
    }

    public function setCodeES(?string $codeES): self
    {
        $this->codeES = $codeES;

        return $this;
    }

 

    public function getAttenteES(): ?string
    {
        return $this->attenteES;
    }

    public function setAttenteES(?string $attenteES): self
    {
        $this->attenteES = $attenteES;

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
            $service->setEtatService($this);
        }

        return $this;
    }

    public function removeService(Service $service): self
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getEtatService() === $this) {
                $service->setEtatService(null);
            }
        }

        return $this;
    }
}
