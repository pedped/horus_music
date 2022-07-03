<?php

namespace App\Repository;

use App\Entity\User;
use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Helpers\PasswordHelper;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    private ValidatorInterface $validator;

    public function __construct(ManagerRegistry $registry, ValidatorInterface $validator)
    {
        parent::__construct($registry, User::class);
        $this->validator = $validator;
    }

    /**
     * add new user to database
     * @param User $entity
     * @param bool $flush
     * @return void
     * @throws \Exception
     */
    public function add(User &$entity, bool $flush = false): void
    {

        // check if user with that email exists before in database
        if ($this->count(["email" => $entity->getEmail()]) > 0) {
            throw new \Exception('User with this email exist before!');
        }

        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * add new user to database
     * @param $email
     * @param $firstName
     * @param $lastName
     * @param $plainPassword
     * @return User
     * @throws \Exception
     */
    public function addUser($email, $firstName, $lastName, $plainPassword): User
    {

        // create admin user
        $user = new User();
        $user->setEmail($email);
        $user->setFirstName($firstName);
        $user->setLastName($lastName);
        $user->setRole(UserRole::$NORMAL);
        $user->setStatus(UserStatus::$ACTIVE);

        $errors = $this->validator->validate($user);
        if (count($errors) > 0) {
            throw new \Exception(implode(", ", $errors));
        }


        // check if user with that email exists before in database
        if ($this->count(["email" => $email]) > 0) {
            throw new \Exception('User with this email exist before!');
        }


        // we have to make the first user as administrator
        if ($this->count([]) == 0) {
            $user->setRole(UserRole::$ADMIN);
        }

        // Hash a plain password;
        $hashedPassword = PasswordHelper::hash($plainPassword);
        $user->setPassword($hashedPassword);

        $this->getEntityManager()->persist($user);

        $this->getEntityManager()->flush();

        return $user;

    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
