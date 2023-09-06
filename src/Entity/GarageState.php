<?php

namespace App\Entity;

use App\Repository\GarageStateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GarageStateRepository::class)
 */
class GarageState
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=16)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getOuvert(): ?bool
    {
        return $this->status === 'ouvert';
    }
    
    public function getFermer(): ?bool
    {
        return $this->status === 'fermé';
    }
}
