<?php

namespace App\Entity;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\Serializer\Annotation\Groups;

trait TimestampableEntityTrait
{
    #[ORM\Column(type: "datetime")]
    #[Groups([
        self::GET_BASE,
        self::GET_BASE_OBJ
    ])]
    protected DateTimeInterface $dateCreate;

    #[ORM\Column(type: "datetime")]
    #[Groups([
        self::GET_BASE,
        self::GET_BASE_OBJ
    ])]
    protected DateTimeInterface $dateUpdate;

    #[ORM\Column(type: "datetime", nullable: true)]
    #[Groups([
        self::GET_BASE,
        self::GET_BASE_OBJ
    ])]
    public DateTimeInterface $deleted;

    /**
     * this method should be called from constructor.
     */
    private function initDates()
    {
        try {
            $this->dateCreate = new DateTimeImmutable();
            $this->dateUpdate = new DateTimeImmutable();
        } catch (Exception $e) {
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    #[ORM\PrePersist]
    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function preUpdate(): void
    {
        try {
            $now = new DateTimeImmutable();
            $this->dateUpdate = $now;
        } catch (Exception $e) {
        }
    }
}
