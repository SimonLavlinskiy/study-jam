<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;


#[ApiResource(
    operations: [
        new Get(),
        new Post(),
        new GetCollection(),
        new Put(),
        new Delete()
    ],
    normalizationContext: ['groups' => [self::GET_NEWS, self::GET_BASE, self::GET_NEWS_OBJ]],
    denormalizationContext: ['groups' => [self::SET_NEWS]],
)]
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
