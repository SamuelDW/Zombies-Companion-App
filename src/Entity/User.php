<?php

declare(strict_types=1);

namespace App\Entity;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

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
     */
    private string $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="strLastName", type="string", nullable=false)
     */
    private string $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="strUsername", type="string", nullable=false)
     *
     * @Assert\Unique()
     */
    private string $username;

    /**
     * @var string
     *
     * @ORM\Column(name="strPassword", type="string", nullable=false)
     *
     * @Assert\NotNull()
     */
    private string $password;

    /**
     * @var string
     *
     * @ORM\Column(name="strEmail", type="string", nullable=false)
     *
     * @Assert\Unique()
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

    public function getUserIdentifier() { }

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
    public function getUsername(): string
    {
        return $this->username;
    }

    public function __call(string $name, array $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }
}