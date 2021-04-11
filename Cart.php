<?php 

namespace App; 
/**
*@author Ibrahim Samad 
*/
class Cart
{
	public $products;
	/**
	 * Init session with sample products
	 *
	 * @param array $products
	 */
	function __construct(array $products)
	{
		$this->products = $products;
	}

	/**
	 * Find item in cart
	 *
	 * @param integer $id
	 * @param array $source
	 * @return array|null
	 */
	private function find(int $id, array $source): ?array
	{
		return $_SESSION['cart'][$id] ?? null;
	}

	/**
	 * Add item to cart
	 *
	 * @param integer $id
	 * @param integer $quantity
	 * @return void
	 */
	public function add(int $id, int $quantity = 1)
	{

		$index = array_search($id, array_column($this->products, 'id'));
		$item = $this->products[$index];
		if(!$item) return; 

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
			if(array_key_exists($id, $_SESSION['cart'])){
				$_SESSION['cart'][$id]['quantity'] += $quantity;
			}else{
				$_SESSION['cart'] = array_replace($_SESSION['cart'], $itemArray);
			}
		}
	}

	/**
	 * Remove item from cart
	 *
	 * @param integer $id
	 * @return void
	 */
	public function remove(int $id)
	{
		unset($_SESSION['cart'][$id]);
	}

	/**
	 * Get all items in cart
	 *
	 * @return array
	 */
	public function all()
	{
		return $_SESSION['cart'] ?? [];
	}

	/**
	 * Remove all items in cart
	 *
	 * @return void
	 */
	public function clear()
	{
		unset($_SESSION['cart']);
	}

	/**
	 * Update item quantity in cart
	 *
	 * @param integer $id
	 * @param integer $quantity
	 * @return void
	 */
	public function update(int $id, int $quantity)
	{
		if (isset($_SESSION['cart'])) {
			$_SESSION['cart'][$id]['quantity'] = $quantity;
		}
	}

	/**
	 * Get total cost of items in cart
	 *
	 * @return float
	 */
	public function sum(): float
	{
		$sum = 0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$sum += ($value['price'] * $value['quantity']);
		}
		return $sum;
	}

	/**
	 * Get number of items in cart
	 *
	 * @return integer
	 */
	public function count(): int
	{
		return isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
	}
}

