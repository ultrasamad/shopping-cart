<?php 
session_start();

require_once '../vendor/autoload.php';
use App\Cart;
use App\SessionStorage;

$products = require_once 'datastore.php';
$storage = new SessionStorage;
$cart = new Cart($storage);