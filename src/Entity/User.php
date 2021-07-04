<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $officeTel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mobileTel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imgProfil;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nameLab;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity=SpecialtyDr::class)
     */
    private $specialtyDr;

    public function __construct()
    {
        $this->specialtyDr = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->dateOfBirth;
    }

    public function setDateOfBirth(?\DateTimeInterface $dateOfBirth): self
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getOfficeTel(): ?string
    {
        return $this->officeTel;
    }

    public function setOfficeTel(?string $officeTel): self
    {
        $this->officeTel = $officeTel;

        return $this;
    }

    public function getMobileTel(): ?string
    {
        return $this->mobileTel;
    }

    public function setMobileTel(?string $mobileTel): self
    {
        $this->mobileTel = $mobileTel;

        return $this;
    }

    public function getImgProfil(): ?string
    {
        return $this->imgProfil;
    }

    public function setImgProfil(?string $imgProfil): self
    {
        $this->imgProfil = $imgProfil;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(?string $zipCode): self
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getNationality(): ?string
    {
        return $this->nationality;
    }

    public function setNationality(?string $nationality): self
    {
        $this->nationality = $nationality;

        return $this;
    }

    public function getNameLab(): ?string
    {
        return $this->nameLab;
    }

    public function setNameLab(?string $nameLab): self
    {
        $this->nameLab = $nameLab;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCity(): ?City
    {
        return $this->city;
    }

    public function setCity(?City $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|SpecialtyDr[]
     */
    public function getSpecialtyDr(): Collection
    {
        return $this->specialtyDr;
    }

    public function addSpecialtyDr(SpecialtyDr $specialtyDr): self
    {
        if (!$this->specialtyDr->contains($specialtyDr)) {
            $this->specialtyDr[] = $specialtyDr;
        }

        return $this;
    }

    public function removeSpecialtyDr(SpecialtyDr $specialtyDr): self
    {
        $this->specialtyDr->removeElement($specialtyDr);

        return $this;
    }

    /**
     * @param ArrayCollection $specialtyDr
     */
    public function setSpecialtyDr(ArrayCollection $specialtyDr): void
    {
        $this->specialtyDr = $specialtyDr;
    }


}
