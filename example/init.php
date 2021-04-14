<?php 
session_start();

$products = require_once 'datastore.php';
require_once '../vendor/autoload.php';
use App\Cart;

$cart = new Cart($products);