<?php require_once 'init.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/custom.css">
    <title>PHP Shopping Cart Example!</title>
  </head>
  <body> 
    <div class="container py-5">
        <div class="pb-2 border-bottom d-flex justify-content-between align-items-center">
            <h2>Products in Stock</h2>
            <a href="cart.php" class="cart-link text-decoration-none link-dark fw-bold position-relative">
                <i class="bi bi-cart3"></i>
                Cart
                <?php if($cart->count() > 0): ?>
                <span class="position-absolute top-0 start-100 translate-middle badge border border-light rounded-circle bg-danger p-1"><?= $cart->count(); ?></span>
                <?php endif; ?>
            </a>
        </div>
        <div class="row g-5 py-5">
          <?php foreach($products as $product): ?>
          <div class="feature col-md-4">
            <div class="product-image">
                <img src="<?= $product['image_url']; ?>" class="img-thumbnail" alt="Product Image">
            </div>
            <h2 class="fw-light"><?= $product['name']; ?></h2>
            <p><?= $product['description']; ?></p>
            <h5>GH¢<?= number_format($product['price'], 2); ?></h5>
            <a href="cart-actions.php?action=add&id=<?= $product['id'] ?>" class="product-link">
              <span>Add to cart<span>
              <i class="bi bi-chevron-double-right"></i>
            </a>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
  </body>
</html>