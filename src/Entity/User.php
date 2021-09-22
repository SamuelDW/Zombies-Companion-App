<?php

declare(strict_types=1);

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\TimestampableEntity;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 *
 * @ORM\Table(name="tblUser")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * 
 * @UniqueEntity("email", message="Sorry looks like you've already registered! Would you like to login instead")
 * @UniqueEntity("username", message="This username is in use")
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
     *        minMessage = "Your first name must be at least 2 characters long",
     *        maxMessage = "Your first name cannot be longer than 50 characters"
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
     *        minMessage = "Your last name must be at least 2 characters long",
     *        maxMessage = "Your last name cannot be longer than 50 characters"
     * )
     */
    private string $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="strUsername", type="string", nullable=false, unique=true)
     *
     * @Assert\Length(
     *        min = 2,
     *        max = 15,
     *        minMessage = "Your username must be at least 2 characters long",
     *        maxMessage = "Your first name cannot be longer than 15 characters"
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
     * @ORM\Column(name="strEmail", type="string", nullable=false, unique=true)
     *
     * @Assert\NotNull()
     * @Assert\Email()
     */
    private string $email;

    /**
     * @var DateTime
     *
     *  @ORM\Column(name="dtmAcceptedTermsAndConditions", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="You must accept the terms and conditions")
     */
    private DateTime $acceptedTermsAndConditions;

    /**
     * @var DateTime
     *
     *  @ORM\Column(name="dtmAcceptedPrivacyPolicy", type="datetime", nullable=false)
     *
     * @Assert\NotNull(message="You must accept the privacy policy")
     */
    private DateTime $acceptedPrivacyPolicy;

    /**
     * @var bool
     *
     * @ORM\Column(name="bolEmailOptIn", type="boolean", nullable=true)
     */
    private bool $emailOptIn;

    public function __construct()
    {
        $this->dateAdded = Carbon::now();
        $this->acceptedPrivacyPolicy = Carbon::now();
        $this->acceptedTermsAndConditions = Carbon::now();
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
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
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
     * @return DateTime
     */
    public function getAcceptTermsAndConditions(): DateTime
    {
        return $this->acceptedTermsAndConditions;
    }

    /**
     * Undocumented function
     *
     * @return DateTime
     */
    public function getAcceptPrivacyPolicy(): DateTime
    {
        return $this->acceptedPrivacyPolicy;
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

    public function setEmailOptIn(bool $accepted)
    {
        $this->emailOptIn = $accepted;
    }

    public function getId()
    {
        return $this->id;
    }
}
