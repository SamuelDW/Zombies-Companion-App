<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Trait\TimestampableEntity;
use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Table(name="tblUser")
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(name="intUserId", type="integer", nullable=false)
     */
    private int $id;

    /**
     * @var string
     *
     * @ORM\Column(name="strFirstName", type="string", nullable=false)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *        min = 2,
     *        max = 50,
     *        minMessage = "Your first name must be at least {{ limit}} characters long",
     *        maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private string $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="strLastName", type="string", nullable=false)
     *
     * @Assert\NotBlank
     * @Assert\Length(
     *        min = 2,
     *        max = 50,
     *        minMessage = "Your first name must be at least {{ limit}} characters long",
     *        maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private string $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="strUsername", type="string", nullable=false)
     *
     * @Assert\Length(
     *        min = 2,
     *        max = 15,
     *        minMessage = "Your first name must be at least {{ limit}} characters long",
     *        maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     */
    private string $username;

    /**
     * @var string
     *
     * @ORM\Column(name="strPassword", type="string", nullable=false)
     *
     */
    private string $password;

    /**
     * Plain string password used for form registration
     *
     * @var string
     * 
     */
    private string $plainPassword;

    /**
     * @var string
     *
     * @ORM\Column(name="strEmail", type="string", nullable=false)
     *
     * @Assert\NotNull()
     * @Assert\Email()
     */
    private string $email;

    /**
     * @var bool
     * 
     *  @ORM\Column(name="bolAcceptTermsConditions", type="boolean", nullable=false)
     * 
     * @Assert\NotNull()
     */
    private bool $acceptTermsAndConditions;

    /**
     * @var bool
     * 
     *  @ORM\Column(name="bolAcceptPrivacyPolicy", type="boolean", nullable=false)
     * 
     * @Assert\NotNull()
     */
    private bool $acceptPrivacyPolicy;

    /**
     * @var bool
     * 
     * @ORM\Column(name="bolEmailOptIn", type="boolean", nullable=false)
     * 
     * @Assert\NotNull()
     */
    private bool $emailOptIn;

    public function __construct()
    {
        $this->dateAdded = Carbon::now();
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function getPlainPassword(): string
    {
        return $this->plainPassword;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function getAcceptTermsAndConditions(): bool
    {
        return $this->acceptTermsAndConditions;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function getAcceptPrivacyPolicy(): bool
    {
        return $this->acceptPrivacyPolicy;
    }

    /**
     * Undocumented function
     *
     * @return boolean
     */
    public function getEmailOptIn(): bool
    {
        return $this->emailOptIn;
    }

    /**
     * @return void
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * @return string
     */
    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Undocumented function
     *
     * @param string $firstname
     * 
     * @return void
     */
    public function setFirstName(string $firstname)
    {
        $this->firstName = $firstname;
    }

    /**
     * Undocumented function
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function setAcceptTermsAndConditions(bool $accepted)
    {
        $this->acceptTermsAndConditions = $accepted;
    }

    public function setAcceptPrivacyPolicy(bool $accepted)
    {
        $this->acceptPrivacyPolicy = $accepted;
    }

    public function setEmailOptIn(bool $accepted)
    {
        $this->emailOptIn = $accepted;
    }

    public function getId()
    {
        return $this->id;
    }
}
