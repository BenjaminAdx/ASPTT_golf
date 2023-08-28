<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\EntityListeners(['App\EntityListener\UserListener'])]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\Email]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 180)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    private ?string $plainPassword = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    #[Assert\NotBlank]
    private ?string $password = 'password';

    #[ORM\Column(length: 50)]
    #[Assert\Length(min: 2, max: 50)]
    #[Assert\NotBlank]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    #[Assert\Length(min: 2, max: 50)]
    #[Assert\NotBlank]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $address = null;

    #[ORM\Column]
    private ?int $cityCode = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 2, max: 50)]
    private ?string $city = null;

    #[ORM\Column(nullable: true)]
    private ?int $homePhone = null;

    #[ORM\Column(nullable: true)]
    private ?int $mobilePhone = null;

    #[ORM\Column]
    private ?\DateTime $birthdate = null;

    #[ORM\Column]
    private ?bool $isRetired = null;

    #[ORM\Column(nullable: true)]
    private ?int $license = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 4, scale: 1, nullable: true)]
    private ?string $golfIndex = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $golfIndexDate = null;

    #[ORM\Column(length: 255)]
    private ?string $known = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sponsorship = null;

    #[ORM\Column]
    private ?bool $isClubMember = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    #[Assert\NotNull()]
    private ?\DateTimeImmutable $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
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

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getCityCode(): ?int
    {
        return $this->cityCode;
    }

    public function setCityCode(int $cityCode): static
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getHomePhone(): ?int
    {
        return $this->homePhone;
    }

    public function setHomePhone(?int $homePhone): static
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    public function getMobilePhone(): ?int
    {
        return $this->mobilePhone;
    }

    public function setMobilePhone(?int $mobilePhone): static
    {
        $this->mobilePhone = $mobilePhone;

        return $this;
    }

    public function getBirthdate(): ?\DateTime
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTime $birthdate): static
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function isIsRetired(): ?bool
    {
        return $this->isRetired;
    }

    public function setIsRetired(bool $isRetired): static
    {
        $this->isRetired = $isRetired;

        return $this;
    }

    public function getLicense(): ?int
    {
        return $this->license;
    }

    public function setLicense(?int $license): static
    {
        $this->license = $license;

        return $this;
    }

    public function getGolfIndex(): ?string
    {
        return $this->golfIndex;
    }

    public function setGolfIndex(?string $golfIndex): static
    {
        $this->golfIndex = $golfIndex;

        return $this;
    }

    public function getGolfIndexDate(): ?\DateTime
    {
        return $this->golfIndexDate;
    }

    public function setGolfIndexDate(?\DateTime $golfIndexDate): static
    {
        $this->golfIndexDate = $golfIndexDate;

        return $this;
    }

    public function getKnown(): ?string
    {
        return $this->known;
    }

    public function setKnown(string $known): static
    {
        $this->known = $known;

        return $this;
    }

    public function getSponsorship(): ?string
    {
        return $this->sponsorship;
    }

    public function setSponsorship(?string $sponsorship): static
    {
        $this->sponsorship = $sponsorship;

        return $this;
    }

    public function isIsClubMember(): ?bool
    {
        return $this->isClubMember;
    }

    public function setIsClubMember(bool $isClubMember): static
    {
        $this->isClubMember = $isClubMember;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): static
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of plainPassword
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Set the value of plainPassword
     *
     * @return  self
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
