<?php 

namespace App; 
/**
*@author Ibrahim Samad 
*/
class Cart
{
	private $storage;
	/**
	 * Init session with sample products
	 *
	 * @param array $products
	 */
	function __construct(StorageInterface $storage)
	{
		$this->storage = $storage;
	}

	/**
	 * Add item to cart
	 *
	 * @param array $item
	 * @param integer $quantity
	 * @return void
	 */
	public function addItem(array $item, int $quantity = 1)
	{
		$this->storage->add($item, $quantity);
	}

	/**
	 * Remove item from cart
	 *
	 * @param integer $id
	 * @return void
	 */
	public function removeItem(int $id)
	{
		$this->storage->remove($id);
	}

	/**
	 * Get all items in cart
	 *
	 * @return array
	 */
	public function getItems(): array
	{
		return $this->storage->all();
	}

	/**
	 * Remove all items in cart
	 *
	 * @return void
	 */
	public function clearItems()
	{
		$this->storage->clear();
	}

	/**
	 * Update item quantity in cart
	 *
	 * @param integer $id
	 * @param integer $quantity
	 * @return void
	 */
	public function updateItem(int $id, int $quantity)
	{
		$this->storage->update($id, $quantity);
	}

	/**
	 * Get total cost of items in cart
	 *
	 * @return float
	 */
	public function sumItems(): float
	{
		return $this->storage->sum();
	}

	/**
	 * Get number of items in cart
	 *
	 * @return integer
	 */
	public function countItems(): int
	{
		return $this->storage->count();
	}
}

