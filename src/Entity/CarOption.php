<?php

namespace App\Entity;

use App\Repository\CarOptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarOptionRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class CarOption 
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
    private $option;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="carOptions")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     */
    private ?Car $car;

    
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getOption(): ?string
    {
        return $this->option;
    }

    public function setOption(string $option): self
    {
        $this->option = $option;

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