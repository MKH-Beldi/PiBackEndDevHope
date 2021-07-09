<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_user"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_user", "show_consultation"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Gouvernorate::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_user"})
     */
    private $gouvernorate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getGouvernorate(): ?Gouvernorate
    {
        return $this->gouvernorate;
    }

    public function setGouvernorate(?Gouvernorate $gouvernorate): self
    {
        $this->gouvernorate = $gouvernorate;

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
