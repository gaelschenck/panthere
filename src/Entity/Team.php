<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
#[ApiResource]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\ManyToMany(targetEntity: Position::class, mappedBy: 'users')]
    private Collection $positions;

   

    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'boss_id')]
    private Collection $relation;

    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'relation')]
    private Collection $boss_id;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    #[ORM\Column(length: 255)]
    private ?string $mail = null;

    #[ORM\Column(length: 255)]
    private ?string $cv = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(nullable: true)]
    private ?int $boss = null;

    public function __construct()
    {
        $this->positions = new ArrayCollection();
        
        $this->relation = new ArrayCollection();
        $this->boss_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPositions(): Collection
    {
        return $this->positions;
    }

    public function addPosition(Position $position): static
    {
        if (!$this->positions->contains($position)) {
            $this->positions->add($position);
            $position->addUser($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->positions->removeElement($position)) {
            $position->removeUser($this);
        }

        return $this;
    }

   
    /**
     * @return Collection<int, self>
     */
    public function getRelation(): Collection
    {
        return $this->relation;
    }

    public function addRelation(self $relation): static
    {
        if (!$this->relation->contains($relation)) {
            $this->relation->add($relation);
        }

        return $this;
    }

    public function removeRelation(self $relation): static
    {
        $this->relation->removeElement($relation);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getBossId(): Collection
    {
        return $this->boss_id;
    }

    public function addBossId(self $bossId): static
    {
        if (!$this->boss_id->contains($bossId)) {
            $this->boss_id->add($bossId);
            $bossId->addRelation($this);
        }

        return $this;
    }

    public function removeBossId(self $bossId): static
    {
        if ($this->boss_id->removeElement($bossId)) {
            $bossId->removeRelation($this);
        }

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
        $this->age = $age;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(string $cv): static
    {
        $this->cv = $cv;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getBoss(): ?int
    {
        return $this->boss;
    }

    public function setBoss(?int $boss): static
    {
        $this->boss = $boss;

        return $this;
    }
}
