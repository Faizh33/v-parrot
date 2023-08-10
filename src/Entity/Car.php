<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Doctrine\UuidGenerator;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 * @ORM\HasLifecycleCallbacks
 */
class Car
{
    /**
     * @ORM\Id
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class=UuidGenerator::class)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $brand;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $model;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="date")
     */
    private $entryIntoService;

    /**
     * @ORM\Column(type="integer")
     */
    private $milage;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $fuel;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $gearbox;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $license;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $doorsNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $seatNb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fiscalPower;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $dinPower;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1, nullable=true)
     */
    private $consumption;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $critAir;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="array")
     */
    private $carOptions = [];

    /**
     * @ORM\Column(type="array")
     */
    private $pictureNames = [];  

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    public function setModel(string $model): self
    {
        $this->model = $model;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getEntryIntoService(): ?\DateTimeInterface
    {
        return $this->entryIntoService;
    }

    public function setEntryIntoService(\DateTimeInterface $entryIntoService): self
    {
        $this->entryIntoService = $entryIntoService;

        return $this;
    }

    public function getMilage(): ?int
    {
        return $this->milage;
    }

    public function setMilage(int $milage): self
    {
        $this->milage = $milage;

        return $this;
    }

    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    public function setFuel(string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    public function getGearbox(): ?string
    {
        return $this->gearbox;
    }

    public function setGearbox(?string $gearbox): self
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getLicense(): ?string
    {
        return $this->license;
    }

    public function setLicense(?string $license): self
    {
        $this->license = $license;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getDoorsNb(): ?int
    {
        return $this->doorsNb;
    }

    public function setDoorsNb(?int $doorsNb): self
    {
        $this->doorsNb = $doorsNb;

        return $this;
    }

    public function getSeatNb(): ?int
    {
        return $this->seatNb;
    }

    public function setSeatNb(?int $seatNb): self
    {
        $this->seatNb = $seatNb;

        return $this;
    }

    public function getFiscalPower(): ?int
    {
        return $this->fiscalPower;
    }

    public function setFiscalPower(?int $fiscalPower): self
    {
        $this->fiscalPower = $fiscalPower;

        return $this;
    }

    public function getDinPower(): ?int
    {
        return $this->dinPower;
    }

    public function setDinPower(?int $dinPower): self
    {
        $this->dinPower = $dinPower;

        return $this;
    }

    public function getConsumption(): ?string
    {
        return $this->consumption;
    }

    public function setConsumption(?string $consumption): self
    {
        $this->consumption = $consumption;

        return $this;
    }

    public function getCritAir(): ?int
    {
        return $this->critAir;
    }

    public function setCritAir(?int $critAir): self
    {
        $this->critAir = $critAir;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    public function getCarOptions(): array
    {
        return $this->carOptions;
    }

    /**
     * @param array $carOptions
     * @return $this
     */
    public function setCarOptions(array $carOptions): self
    {
        $this->carOptions = $carOptions;

        return $this;
    }

    /**
     * @param string $carOption
     * @return $this
     */
    public function addCarOption(string $carOption): self
    {
        if (!in_array($carOption, $this->carOptions, true)) {
            $this->carOptions[] = $carOption;
        }

        return $this;
    }

    /**
     * @param string $carOption
     * @return $this
     */
    public function removeCarOption(string $carOption): self
    {
        $key = array_search($carOption, $this->carOptions, true);
        if ($key !== false) {
            unset($this->carOptions[$key]);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getPictureNames(): array
    {
        return $this->pictureNames;
    }

    /**
     * @param array $pictureNames
     * @return $this
     */
    public function setPictureNames(array $pictureNames): self
    {
        $this->pictureNames = $pictureNames;

        return $this;
    }

    /**
     * @param string $pictureName
     * @return $this
     */
    public function addPictureName(string $pictureName): self
    {
        if (!in_array($pictureName, $this->pictureNames, true)) {
            $this->pictureNames[] = $pictureName;
        }

        return $this;
    }

    /**
     * @param string $pictureName
     * @return $this
     */
    public function removePictureName(string $pictureName): self
    {
        $key = array_search($pictureName, $this->pictureNames, true);
        if ($key !== false) {
            unset($this->pictureNames[$key]);
        }

        return $this;
    }
}