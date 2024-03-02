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

        $hash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $user->setPassword($hash);
        $this->em->persist($user);
        return $user;

    }

    public function hasNews(User $user):bool{

        $news = $this->em->getRepository(User::class)->findOneBy(['user'=>$user->getId()]);

        return $news !== null;

    }

}
