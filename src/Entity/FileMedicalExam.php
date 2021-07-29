<?php

namespace App\Entity;

use App\Repository\FileMedicalExamRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=FileMedicalExamRepository::class)
 */
class FileMedicalExam
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_fileMedicalExam"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_fileMedicalExam"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_fileMedicalExam"})
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_fileMedicalExam"})
     */
    private $urlFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_fileMedicalExam"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=MedicalExam::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_fileMedicalExam"})
     *
     */
    private $medicalExam;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

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

    public function getUrlFile(): ?string
    {
        return $this->urlFile;
    }

    public function setUrlFile(?string $urlFile): self
    {
        $this->urlFile = $urlFile;

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

    public function getMedicalExam(): ?MedicalExam
    {
        return $this->medicalExam;
    }

    public function setMedicalExam(?MedicalExam $medicalExam): self
    {
        $this->medicalExam = $medicalExam;

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
