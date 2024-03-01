<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

abstract class BaseEntity
{

    use TimestampableEntityTrait;
    public const GET_BASE = 'GetBase';
    public const GET_BASE_OBJ = 'GetObjBase';

    public function __construct()
    {
        $this->initDates();
    }


    #[ORM\Id]
    #[ORM\Column(type: "integer")]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[Groups([self::GET_BASE, self::GET_BASE_OBJ])]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
