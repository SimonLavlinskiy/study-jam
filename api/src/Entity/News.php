<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;


#[ApiResource(mercure: true)]
#[ORM\Entity]
class News extends BaseEntity
{

    public const GET_NEWS = 'GetNews';
    public const GET_NEWS_OBJ = 'GetObjNews';
    public const SET_NEWS = 'SetNews';

    #[ORM\Column]
    #[Groups([self::GET_NEWS, self::GET_NEWS_OBJ, self::SET_NEWS])]
    public string $title;

    #[ORM\Column]
    #[Groups([self::GET_NEWS, self::GET_NEWS_OBJ, self::SET_NEWS])]
    public string $text;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn]
    #[Groups([self::GET_NEWS, self::GET_NEWS_OBJ, self::SET_NEWS])]
    public User $user;

}
