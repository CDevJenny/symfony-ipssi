<?php

namespace App\Entity;

use App\Repository\CartProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartProductRepository::class)]
class CartProduct
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cartProducts')]
    private ?Product $Products = null;

    #[ORM\ManyToOne(inversedBy: 'cartProducts')]
    private ?Cart $Carts = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $productQuantity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProducts(): ?Product
    {
        return $this->Products;
    }

    public function setProducts(?Product $Products): self
    {
        $this->Products = $Products;

        return $this;
    }

    public function getCarts(): ?Cart
    {
        return $this->Carts;
    }

    public function setCarts(?Cart $Carts): self
    {
        $this->Carts = $Carts;

        return $this;
    }

    public function getProductQuantity(): ?string
    {
        return $this->productQuantity;
    }

    public function setProductQuantity(?string $productQuantity): self
    {
        $this->productQuantity = $productQuantity;

        return $this;
    }
}
