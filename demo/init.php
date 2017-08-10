<?php 
session_start();

require_once '../Cart.php';
use Ultrasamad\Cart;

$data = [

	'1' => ['id' => 1, 'name' => 'Infinix Hot 4 Pro', 'price' => 465.5, 'stock' => 120, 'image' => 'http://via.placeholder.com/140x100'],
	'2' => ['id' => 2, 'name' => 'Binatone steel iron', 'price' => 74.0, 'stock' => 350, 'image' => 'http://via.placeholder.com/140x100'],
	'3' => ['id' => 3, 'name' => 'Brown kaki trouser', 'price' => 65.5, 'stock' => 85, 'image' => 'http://via.placeholder.com/140x100'],
	'4' => ['id' => 4, 'name' => 'Long sleeve shirt', 'price' => 51.2, 'stock' => 55, 'image' => 'http://via.placeholder.com/140x100'],
];

$cart = new Cart($data);