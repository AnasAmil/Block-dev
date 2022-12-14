<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('show_warehouses', 'show_products')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('show_warehouses', 'show_products')]
    private ?string $product_name = null;

    #[ORM\Column]
    #[Groups('show_warehouses', 'show_products')]
    private ?int $quantity = null;

    #[ORM\Column]
    #[Groups('show_warehouses', 'show_products')]
    private ?float $price_unit = null;

    #[ORM\Column]
    #[Groups('show_warehouses', 'show_products')]
    private ?float $mass = null;
    //  @ORM\Column(name="created_at", type="datetime", options={"default": "CURRENT_TIMESTAMP"})
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups('show_warehouses', 'show_products')]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    #[Groups('show_warehouses', 'show_products')]
    private ?int $cell_occupation = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
   
    private ?Warehouse $warehouse = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName(): ?string
    {
        return $this->product_name;
    }

    public function setProductName(string $product_name): self
    {
        $this->product_name = $product_name;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPriceUnit(): ?float
    {
        return $this->price_unit;
    }

    public function setPriceUnit(float $price_unit): self
    {
        $this->price_unit = $price_unit;

        return $this;
    }

    public function getMass(): ?float
    {
        return $this->mass;
    }

    public function setMass(float $mass): self
    {
        $this->mass = $mass;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCellOccupation(): ?int
    {
        return $this->cell_occupation;
    }

    public function setCellOccupation(int $cell_occupation): self
    {
        $this->cell_occupation = $cell_occupation;

        return $this;
    }

    public function getWarehouse(): ?Warehouse
    {
        return $this->warehouse;
    }

    public function setWarehouse(?Warehouse $warehouse): self
    {
        $this->warehouse = $warehouse;

        return $this;
    }
}
