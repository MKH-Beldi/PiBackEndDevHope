<?php

namespace App\Entity;

use App\Repository\ProfilRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PublicationRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ProfilRepository::class)
 */
class Profil
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_profil"})

     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_profil"})

     */
    private $imgCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_profil"})

     */
    private $biography;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_profil"})

     */
    private $currentPosition;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"show_profil"})

     */
    private $note;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"show_profil"})

     */
    private $academicTraining;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"show_profil"})

     */
    private $workExperience;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_profil"})

     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_profil"})

     */
    private $updatedAt;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_profil"})

     */
    private $userDr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImgCover(): ?string
    {
        return $this->imgCover;
    }

    public function setImgCover(?string $imgCover): self
    {
        $this->imgCover = $imgCover;

        return $this;
    }

    public function getBiography(): ?string
    {
        return $this->biography;
    }

    public function setBiography(?string $biography): self
    {
        $this->biography = $biography;

        return $this;
    }

    public function getCurrentPosition(): ?string
    {
        return $this->currentPosition;
    }

    public function setCurrentPosition(?string $currentPosition): self
    {
        $this->currentPosition = $currentPosition;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->note;
    }

    public function setNote(?float $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getAcademicTraining(): ?string
    {
        return $this->academicTraining;
    }

    public function setAcademicTraining(?string $academicTraining): self
    {
        $this->academicTraining = $academicTraining;

        return $this;
    }

    public function getWorkExperience(): ?string
    {
        return $this->workExperience;
    }

    public function setWorkExperience(?string $workExperience): self
    {
        $this->workExperience = $workExperience;

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

    public function getUserDr(): ?User
    {
        return $this->userDr;
    }

    public function setUserDr(User $userDr): self
    {
        $this->userDr = $userDr;

        return $this;
    }

    /**
     * @param $att
     * @param $val
     */
    public function __set($att, $val): void
    {
        $this->$att = $val;
    }
}
