<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CreateUser extends AbstractController
{
    public function __construct(
    private readonly UserService $userService
    ) {
    }

    public function __invoke(User $user): User
    {

        $this->userService->passworHash($user);

        return $user;
    }
}
