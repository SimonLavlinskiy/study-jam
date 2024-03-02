<?php

namespace App\Controller\User;

use App\Entity\User;
use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class DeleteUser extends AbstractController
{
    public function __construct(
        private readonly UserService $userService
    ) {
    }

    public function __invoke(User $user): User
    {

       $hasNews =  $this->userService->hasNews($user);

       if($hasNews){
           throw new BadRequestHttpException('Нельзя удалить юзера');
       }

        return $user;
    }
}
