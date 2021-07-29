<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_comment"})

     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"show_comment"})

     */
    private $contente;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_comment"})

     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_comment"})

     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_comment"})

     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Publication::class)
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"show_comment"})

     */
    private $publication;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContente(): ?string
    {
        return $this->contente;
    }

    public function setContente(string $contente): self
    {
        $this->contente = $contente;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getPublication(): ?Publication
    {
        return $this->publication;
    }

    public function setPublication(?Publication $publication): self
    {
        $this->publication = $publication;

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
