<?php

namespace App\Dtos\Cart;

class CartDto
{
    private array $items = [];
    private float $totalSum = 0;
    private int $totalQuantity = 0;

	/**
	 * @return array
	 */
	public function getItems(): array {
		return $this->items;
	}
	
	/**
	 * @param array $items 
	 * @return self
	 */
	public function setItems(array $items): self {
		$this->items = $items;
		return $this;
	}
	
	/**
	 * @return float
	 */
	public function getTotalSum(): float {
		return $this->totalSum;
	}
	
	/**
	 * @param float $totalSum 
	 * @return self
	 */
	public function setTotalSum(float $totalSum): self {
		$this->totalSum = $totalSum;
		return $this;
	}
	
	/**
	 * @return int
	 */
	public function getTotalQuantity(): int {
		return $this->totalQuantity;
	}
	
	/**
	 * @param int $totalQuantity 
	 * @return self
	 */
	public function setTotalQuantity(int $totalQuantity): self {
		$this->totalQuantity = $totalQuantity;
		return $this;
	}
    
	public function incrementTotalQuantity(): void {
		$this->totalQuantity += 1;
	}

	public function incrementTotalSum(float $price): void {
		$this->totalSum += $price;
	}
}