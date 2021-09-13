<?php

declare(strict_types=1);

namespace App\Entity;

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
     * @Assert\Unique()
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
     * @Assert\NotNull()
     * @Assert\Regex(pattern = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$")
     *
     * @SecurityAssert\UserPassword(message = "Password is incorrect, please try again")
     */
    private string $password;

    /**
     * @var string
     *
     * @ORM\Column(name="strEmail", type="string", nullable=false)
     *
     * @Assert\Unique()
     * @Assert\Regex(pattern = "\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}\b")
     */
    private string $email;

    /**
     * User constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $email
     * @param string $password
     */
    public function __construct(
        string $firstName,
        string $lastName,
        string $username,
        string $email,
        string $password
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;

        $this->dtmAdded = Carbon::now();
    }

    /**
     * @return string
     */
    private function getName(): string
    {
        return $this->firstName . " " . $this->lastName;
    }

    /**
     * @return string
     */
    private function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    private function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
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
}
