<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Post;
use App\Controller\User\CreateUser;
use App\Controller\User\DeleteUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;


#[ApiResource(
    operations: [
        new Post(
            controller: CreateUser::class
        ),
        new Delete(
            controller: DeleteUser::class
        )
    ]
)]
#[ORM\Entity]
class User extends BaseEntity
{
    public const GET_USER = 'GetUser';
    public const GET_USER_OBJ = 'GetObjUser';
    public const SET_USER = 'SetUser';

    #[ORM\Column]
    #[Groups([self::GET_USER, self::GET_USER_OBJ, self::SET_USER])]
    public string $name;

    #[ORM\Column]
    #[Groups([self::GET_USER, self::GET_USER_OBJ, self::SET_USER])]
    public string $email;

    #[ORM\Column]
    private string $password;

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(): void{

    }

}
