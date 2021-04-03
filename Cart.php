<?php 

namespace App; 
/**
*@author Ibrahim Samad 
*/
class Cart
{
	/**
	 * Init session with sample products
	 *
	 * @param array $data
	 */
	function __construct(array $data)
	{
		$_SESSION['data'] = $data;
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
		if ($this->exists($id, $source)) {
			return $source[$id];
		}

		return null;
	}

	/**
	 * Add item to cart
	 *
	 * @param integer $id
	 * @param integer $quantity
	 * @return void
	 */
	public function add(int $id, int $quantity)
	{
		if (is_null($this->find($id, $_SESSION['data']))) {
			return;
		}

		$item = $this->find($id, $_SESSION['data']);

		$itemArray = 
		[
			$item['id'] => [
				'id' => $item['id'],
				'name' => $item['name'],
				'price' => $item['price'],
				'stock' => $item['stock'],
				'quantity' => $quantity
			]
		];

		if (empty($_SESSION['cart'])) {
			//First time item in cart no merging required
			$_SESSION['cart'] = $itemArray;
		} else{

			//Check if current item is already in cart
			if ($this->exists($id, $_SESSION['cart'])) {
				$_SESSION['cart'][$id]['quantity'] += $quantity;
			}else{
				$_SESSION['cart'] = array_replace($_SESSION['cart'], $itemArray);
			}
		}
	}

	/**
	 * Show item from cart
	 *
	 * @param integer $id
	 * @return array|null
	 */
	public function show(int $id): ?array
	{
		if ($this->exists($id, $_SESSION['cart'])) {
			return $_SESSION['cart'][$id];
		}
		return null;
	}

	/**
	 * Remove item from cart
	 *
	 * @param integer $id
	 * @return void
	 */
	public function remove(int $id)
	{
		if ($this->exists($id, $_SESSION['cart'])) {
			unset($_SESSION['cart'][$id]);
		}
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
	 * Determine if item exists
	 *
	 * @param integer $id
	 * @param array $source
	 * @return boolean
	 */
	private function exists(int $id, array $source): bool
	{
		return array_key_exists($id, $source);
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

