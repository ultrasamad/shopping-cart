<?php require_once 'init.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>My Cart!</title>
</head>
<body>
    <div class="container py-5">
        <div class="pb-2 border-bottom d-flex justify-content-between align-items-center">
            <h2>My Cart</h2>
            <a href="cart.php" class="cart-link text-decoration-none link-dark fw-bold position-relative">
                <i class="bi bi-cart3"></i>Cart
                <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><?php echo $cart->count(); ?></span>
            </a>
        </div>
        <?php if($cart->count() > 0): ?>
        <!-- Headings -->
        <div class="mt-2 d-flex">
            <h5 class="text-uppercase text-secondary w-50">Product</h5>
            <h5 class="text-uppercase text-secondary ">Quantity</h5>
            <h5 class="text-uppercase text-secondary ms-auto">Unit Price</h5>
            <h5 class="text-uppercase text-secondary ms-auto">Subtotal</h5>
        </div>
        <!-- Data -->
        <?php foreach($cart->all() as $item): ?>
        <div class="mt-2 d-flex justify-content-between bg-light">
            <div class="p-2 w-50 border-end">
                <h5><?php echo $item['name']; ?></h5>
                <a href="/cart-actions.php?action=remove&id=<?php echo $item['id']; ?>" class="text-decoration-none">
                    <i class="bi bi-trash"></i>
                    Remove
                </a>
            </div>
            <div class="p-2 border-end"><?php echo $item['quantity']; ?></div>
            <div class="p-2 border-end fw-bold">GH¢<?php echo number_format($item['price'], 2); ?></div>
            <div class="p-2 border-end fw-bold">GH¢<?php echo number_format(($item['price'] * $item['quantity']), 2); ?></div>
        </div>
        <?php endforeach; ?>
        <h3 class="mt-3 float-end">Total: GH¢<?php echo number_format($cart->sum(), 2); ?></h3>
        <?php else: ?>
        <div class="mt-4">
            <h4 class="text-center">Your cart is empty!</h4>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>