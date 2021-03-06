<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ScheduleRepository::class)
 */
class Schedule
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_Schedule","show_consultation"})
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"show_Schedule","show_consultation"})
     */
    private $day;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     *  @Groups({"show_Schedule", "show_consultation"})
     */
    private $start;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_Schedule", "show_consultation"})
     */
    private $end;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"show_Schedule","show_consultation"})
     */
    private $isAvailable;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation","show_Schedule"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation","show_Schedule"})
     */
    private $color;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_consultation","show_Schedule", "show_certificat"})
     */
    private $userDr;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @Groups({"show_consultation","show_Schedule"})
     */
    private $userPatient;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Consultation::class, inversedBy="schedules")
     * @Groups({"show_Schedule"})
     */
    private $consultation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?\DateTimeInterface
    {
        return $this->day;
    }

    public function setDay(\DateTimeInterface $day): self
    {
        $this->day = $day;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): self
    {
        $this->end= $end;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(?bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
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

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getUserDr(): ?User
    {
        return $this->userDr;
    }

    public function setUserDr(?User $userDr): self
    {
        $this->userDr = $userDr;

        return $this;
    }

    public function getUserPatient(): ?User
    {
        return $this->userPatient;
    }

    public function setUserPatient(?User $userPatient): self
    {
        $this->userPatient = $userPatient;

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

    public function getConsultation(): ?Consultation
    {
        return $this->consultation;
    }

    public function setConsultation(?Consultation $consultation): self
    {
        $this->consultation = $consultation;

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
