<?php

namespace App\Entity;

use App\Repository\PictureNameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PictureNameRepository::class)
 */
class PictureName 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $pictureName;

    /**
     * @ORM\ManyToOne(targetEntity=Cars::class, inversedBy="pictureName")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Car $car;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getPictureName(): ?string
    {
        return $this->pictureName;
    }

    public function setPictureName(string $pictureName): self
    {
        $this->pictureName = $pictureName;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): static
    {
        $this->car = $car;

        return $this;
    }
}