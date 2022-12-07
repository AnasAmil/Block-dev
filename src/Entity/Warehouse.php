<?php

namespace App\Entity;

use App\Repository\WarehouseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WarehouseRepository::class)]
class Warehouse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('show_warehouses')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups('show_warehouses')]
    private ?string $warehouse_name = null;

    #[ORM\Column(length: 255)]
    #[Groups('show_warehouses')]
    private ?string $location = null;

    #[ORM\Column(length: 20)]
    #[Groups('show_warehouses')]
    private ?string $phone_number = null;

    #[ORM\Column]
    #[Groups('show_warehouses')]
    private ?int $max_cells = null;

    #[ORM\OneToMany(mappedBy: 'warehouse', targetEntity: Product::class)]
    // #[Groups('show_warehouses')]
    private Collection $products;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups('show_warehouses')]
    private ?string $wareHouseImage = null;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setWarehouse($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getWarehouse() === $this) {
                $product->setWarehouse(null);
            }
        }

        return $this;
    }

    public function getWareHouseImage(): ?string
    {
        return $this->wareHouseImage;
    }

    public function setWareHouseImage(?string $wareHouseImage): self
    {
        $this->wareHouseImage = $wareHouseImage;

        return $this;
    }
}
