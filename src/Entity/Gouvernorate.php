<?php

namespace App\Entity;

use App\Repository\GouvernorateRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=GouvernorateRepository::class)
 */
class Gouvernorate
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
     * @Groups({"show_user"})
     */
    private $name;

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

    /**
     * @param $att
     * @param $val
     */
    public function __set($att, $val): void
    {
        $this->$att = $val;
    }
}
