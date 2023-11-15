<?php

namespace App\Dtos\Cart;

class CartItemDto
{
    private int $productId;
    private string $name;
    private float $price;
    private int $quantity;
    private ?string $imagePath;

	/**
	 * @return int
	 */
	public function getProductId(): int {
		return $this->productId;
	}
	
	/**
	 * @param int $productId 
	 * @return self
	 */
	public function setProductId(int $productId): self {
		$this->productId = $productId;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getPrice(): float {
		return $this->price;
	}
	
	/**
	 * @param float $price 
	 * @return self
	 */
	public function setPrice(float $price): self {
		$this->price = $price;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getQuantity(): int {
		return $this->quantity;
	}
	
	/**
	 * @param int $quantity 
	 * @return self
	 */
	public function setQuantity(int $quantity): self {
		$this->quantity = $quantity;
		return $this;
	}
	
	/**
	 * @return 
	 */
	public function getImagePath(): ?string {
		return $this->imagePath;
	}
	
	/**
	 * @param  $imagePath 
	 * @return self
	 */
	public function setImagePath(?string $imagePath): self {
		$this->imagePath = $imagePath;
		return $this;
	}

	public function incrementQuantity(): void {
		$this->quantity =+ 1;
	}
}