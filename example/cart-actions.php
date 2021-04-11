<?php 
require_once 'init.php';

$query = $_GET;
$action = $query['action'] ?? null;
$productId = $query['id'] ?? null;
$quantity = $query['quantity'] ?? null;

if (in_array($action, ['add', 'update', 'remove']) && $productId) {

    switch ($action) {
        case 'add':
            $cart->add($productId);
            break;
        case 'update': 
            $cart->update($productId, $quantity);
            break;
        case 'remove':
            $cart->remove($productId);
            break;
        default:
            //
            break;
    }
    header('Location: cart.php');
}else {
    header('Location: index.php');
}