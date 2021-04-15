<?php 

namespace App;

class SessionStorage implements StorageInterface
{
    /**
     * Add item to session
     *
     * @param array $item
     * @return void
     */
    public function add(array $item, $quantity = 1): void
    {
		$itemArray = 
		[
			$item['id'] => [
				'id' => $item['id'],
				'name' => $item['name'],
				'price' => $item['price'],
				'quantity' => $quantity
			]
		];

		if (empty($_SESSION['cart'])) {
			//First time item in cart no merging required
			$_SESSION['cart'] = $itemArray;
		} else{

			//If item already exists in cart
            $id = $item['id'];
			if(array_key_exists($id, $_SESSION['cart'])){
				$_SESSION['cart'][$id]['quantity'] += $quantity;
			}else{
				$_SESSION['cart'] = array_replace($_SESSION['cart'], $itemArray);
			}
		}
    }

    /**
     * Remove item from session
     *
     * @param integer $id
     * @return void
     */
    public function remove(int $id): void
    {
		unset($_SESSION['cart'][$id]);
    }

    /**
     * Update item quanity
     *
     * @param integer $id
     * @param integer $quantity
     * @return void
     */
    public function update(int $id, int $quantity): void
    {
		$_SESSION['cart'][$id]['quantity'] = $quantity;
    }

    /**
     * Fetch all items in session
     *
     * @return array
     */
    public function all(): array
    {
        return $_SESSION['cart'] ?? [];
    }

    /**
     * Get tototal cost of items in storage
     *
     * @return float
     */
    public function sum(): float
    {
        $sum = 0;
		foreach ($_SESSION['cart'] as $item) {
			$sum += ($item['price'] * $item['quantity']);
		}
		return $sum;
    }

    /**
     * Count items
     *
     * @return integer
     */
    public function count(): int
    {
		return isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    }

    /**
     * Clear all items in session
     *
     * @return void
     */
    public function clear(): void
    {
		$_SESSION['cart'] = [];
    }
}