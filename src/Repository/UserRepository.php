<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * Repository for the User entity
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Finding a user by user identifier
     *
     * @param string $username
     *
     * @return User|null
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getUserByUserIdentifier(string $username): ?User
    {
        $qb = $this->getEntityManager()->createQueryBuilder('user');
        $qb->select('u')
            ->from(User::class, 'u')
            ->where('u.email = :username')
            ->setParameter('username', $username);

        return $qb->getQuery()->getOneOrNullResult();
    }
}
