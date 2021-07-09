<?php

namespace App\Entity;

use App\Repository\ConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ConsultationRepository::class)
 */
class Consultation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_consultation"})
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"show_consultation"})
     */
    private $diagnostic;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation"})
     */
    private $weightPatient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation"})
     */
    private $heightPatient;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation"})
     */
    private $bodyTemperature;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_consultation"})
     */
    private $bloodPressure;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_consultation"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_consultation"})
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Schedule::class, mappedBy="consultation")
     * @Groups({"show_consultation"})
     */
    private $schedules;

    /**
     * @ORM\ManyToMany(targetEntity=Symptom::class)
     * @Groups({"show_consultation"})
     */
    private $symptoms;

    public function __construct()
    {
        $this->schedules = new ArrayCollection();
        $this->symptoms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiagnostic(): ?string
    {
        return $this->diagnostic;
    }

    public function setDiagnostic(?string $diagnostic): self
    {
        $this->diagnostic = $diagnostic;

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

    public function getWeightPatient(): ?string
    {
        return $this->weightPatient;
    }

    public function setWeightPatient(?string $weightPatient): self
    {
        $this->weightPatient = $weightPatient;

        return $this;
    }

    public function getHeightPatient(): ?string
    {
        return $this->heightPatient;
    }

    public function setHeightPatient(?string $heightPatient): self
    {
        $this->heightPatient = $heightPatient;

        return $this;
    }

    public function getBodyTemperature(): ?string
    {
        return $this->bodyTemperature;
    }

    public function setBodyTemperature(?string $bodyTemperature): self
    {
        $this->bodyTemperature = $bodyTemperature;

        return $this;
    }

    public function getBloodPressure(): ?string
    {
        return $this->bloodPressure;
    }

    public function setBloodPressure(?string $bloodPressure): self
    {
        $this->bloodPressure = $bloodPressure;

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

    /**
     * @return Collection|Schedule[]
     */
    public function getSchedules(): Collection
    {
        return $this->schedules;
    }

    public function addSchedule(Schedule $schedule): self
    {
        if (!$this->schedules->contains($schedule)) {
            $this->schedules[] = $schedule;
            $schedule->setConsultation($this);
        }

        return $this;
    }

    public function removeSchedule(Schedule $schedule): self
    {
        if ($this->schedules->removeElement($schedule)) {
            // set the owning side to null (unless already changed)
            if ($schedule->getConsultation() === $this) {
                $schedule->setConsultation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Symptom[]
     */
    public function getSymptoms(): Collection
    {
        return $this->symptoms;
    }

    public function addSymptom(Symptom $symptom): self
    {
        if (!$this->symptoms->contains($symptom)) {
            $this->symptoms[] = $symptom;
        }

        return $this;
    }

    public function removeSymptom(Symptom $symptom): self
    {
        $this->symptoms->removeElement($symptom);

        return $this;
    }

    /**
     * @param ArrayCollection $symptoms
     */
    public function setSymptoms(ArrayCollection $symptoms): void
    {
        $this->symptoms = $symptoms;
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
