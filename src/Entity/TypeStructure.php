<?php

namespace App\Entity;

use App\Repository\TypeStructureRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeStructureRepository::class)]
class TypeStructure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $code = null;

    #[ORM\Column]
    private ?bool $statut = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $usercreate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datecreate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userdelete = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datedelete = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $userupdate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateupdate = null;

    #[ORM\OneToMany(mappedBy: 'typestructure', targetEntity: Structure::class)]
    private Collection $structures;

    public function __construct()
    {
        $this->structures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

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

    /**
     * @return Collection<int, Structure>
     */
    public function getStructures(): Collection
    {
        return $this->structures;
    }

    public function addStructure(Structure $structure): self
    {
        if (!$this->structures->contains($structure)) {
            $this->structures->add($structure);
            $structure->setTypestructure($this);
        }

        return $this;
    }

    public function removeStructure(Structure $structure): self
    {
        if ($this->structures->removeElement($structure)) {
            // set the owning side to null (unless already changed)
            if ($structure->getTypestructure() === $this) {
                $structure->setTypestructure(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getLibelle();
    }
}
