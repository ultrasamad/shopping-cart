<?php 
session_start();

require_once '../vendor/autoload.php';
use App\Cart;

$products = require_once 'datastore.php';
$cart = new Cart($products);