<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;


#[ApiResource(mercure: true)]
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
    #[Groups([self::GET_USER, self::GET_USER_OBJ, self::SET_USER])]
    public string $password;

}
