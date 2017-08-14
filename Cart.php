<?php 
/**
*@author Ibrahim Samad 
*/

namespace Ultrasamad; 

class Cart
{

	function __construct(Array $data)
	{
		$_SESSION['data'] = $data;
	}

	private function find($id, $source)
	{
		
		if ($this->exists($id, $source)) {
			return $source[$id];
		}

		return NULL;
	}

	/*
	*Add item to cart
	*/
	public function add($id, $quantity)
	{

		if (is_null($this->find($id, $_SESSION['data']))) {
			return;
		}

		$item = $this->find($id, $_SESSION['data']);

		//Build array format
		$itemArray = 
		[
			$item['id'] =>
							[
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

			//Cart not empty
			//Check if current item is already in cart
			if ($this->exists($id, $_SESSION['cart'])) {
				$_SESSION['cart'][$id]['quantity'] += $quantity;
			}else{
				$_SESSION['cart'] = array_replace($_SESSION['cart'], $itemArray);
			}

		}
	}

	/*
	*Show item from cart
	*/
	public function show($id)
	{
		if ($this->exists($id, $_SESSION['cart'])) {
			return $_SESSION['cart'][$id];
		}

		return NULL;
	}

	/*
	*Remove an item from cart
	*/

	public function remove($id)
	{
		if ($this->exists($id, $_SESSION['cart'])) {
			unset($_SESSION['cart'][$id]);
		}
	}

	/*
	*All items in cart
	*/
	public function all()
	{
		
		return isset($_SESSION['cart']) ? $_SESSION['cart'] : NULL;
	}

	/*
	*Return all items in the cart
	*/
	public function clear()
	{
		unset($_SESSION['cart']);
	}

	/*
	*Update quantity of item in cart
	*/
	public function update($id, $quantity)
	{
		if (isset($_SESSION['cart'])) {

			$_SESSION['cart'][$id]['quantity'] = $quantity;
		}

		
	}

	/*
	*Determine if an item exists in the data or cart
	*/
	private function exists($id, $source)
	{
		if (array_key_exists($id, $source)) {
			return true;
		}
		return false;
	}

	/*
	*Cost of items in cart
	*/
	public function sum()
	{
		$sum = 0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$sum += ($value['price'] * $value['quantity']);
		}

		return $sum;
	}

	/**
	*Total number of items in cart
	*/
	public function count()
	{
		return isset($_SESSION['cart']) ? sizeof($_SESSION['cart']) : 0;
	}
}

