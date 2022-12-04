<?php

namespace App\Entity;

use App\Repository\WarehouseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WarehouseRepository::class)]
class Warehouse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $warehouse_name = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(length: 20)]
    private ?string $phone_number = null;

    #[ORM\Column]
    private ?int $max_cells = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWarehouseName(): ?string
    {
        return $this->warehouse_name;
    }

    public function setWarehouseName(string $warehouse_name): self
    {
        $this->warehouse_name = $warehouse_name;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getMaxCells(): ?int
    {
        return $this->max_cells;
    }

    public function setMaxCells(int $max_cells): self
    {
        $this->max_cells = $max_cells;

        return $this;
    }
}
