<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=PublicationRepository::class)
 */
class Publication
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_publication" ,"show_comment"})

     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_publication", "show_comment"})

     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups({"show_publication" ,"show_comment"})

     */
    private $contente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_publication"})

     */
    private $file;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_publication"})

     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_publication"})

     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_publication"})

     */
    private $userDr;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContente(): ?string
    {
        return $this->contente;
    }

    public function setContente(?string $contente): self
    {
        $this->contente = $contente;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(?string $file): self
    {
        $this->file = $file;

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

    public function setUserDr(?User $userDr): self
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
