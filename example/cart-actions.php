<?php 
require_once 'init.php';

$query = $_GET;
$action = $query['action'] ?? null;
$productId = $query['id'] ?? null;
$quantity = $query['quantity'] ?? null;

//Find item from products store
$index = array_search($productId, array_column($products, 'id'));
$item = $products[$index];

if (in_array($action, ['add', 'update', 'remove']) && $productId) {

    switch ($action) {
        case 'add':
            $cart->addItem($item);
            break;
        case 'update': 
            $cart->updateItem($productId, $quantity);
            break;
        case 'remove':
            $cart->removeItem($productId);
            break;
        default:
            //
            break;
    }
    header('Location: cart.php');
}else {
    header('Location: index.php');
}