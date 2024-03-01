<?php

namespace App\Service\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{

    public function __construct(
    private readonly EntityManagerInterface $em,
    ) {
    }

    public function passworHash(User $user): User{

        $hash = password_hash($user->password, PASSWORD_DEFAULT);
        $user->password = $hash;
        $this->em->persist($user);
        return $user;

    }

}
