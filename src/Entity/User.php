<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Repository\ProfilRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"show_user", "show_consultation" ,"show_profil","show_Schedule","show_medicalExam", "show_consultation"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Groups({"show_user", "show_consultation" ,"show_profil"})
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     * @Groups({"show_user", "show_consultation"})
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_user" , "show_consultation" ,"show_profil" , "show_publication" ,"show_comment","show_Schedule"})
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"show_user", "show_consultation" ,"show_profil" , "show_publication" ,"show_comment","show_Schedule"})
     */
    private $firstName;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"show_user", "show_consultation"})
     */
    private $dateOfBirth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user"})
     */
    private $sex;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user"})
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $officeTel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $mobileTel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $imgProfil;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $zipCode;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $nationality;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"show_user" ,"show_profil"})
     */
    private $nameLab;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_user"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Groups({"show_user"})
     */
    private $updatedAt;

    /**
     * @ORM\ManyToOne(targetEntity=City::class)
     * @Groups({"show_user", "show_consultation"})
     */
    private $city;

    /**
     * @ORM\ManyToMany(targetEntity=SpecialtyDr::class)
     * @Groups({"show_user" ,"show_profil"})
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    /**
     * @param $att
     * @param $val
     */
    public function __set($att, $val): void
    {
        $this->$att = $val;
    }
}
