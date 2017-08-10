<?php
require_once 'init.php';

$itemId = (isset($_GET['id'])) ? $_GET['id']: NULL;

if (isset($_POST['quantity'])) {
	$quantity = $_POST['quantity'];

	//Add to cart
	$cart->add($itemId, $quantity);
}

//Cart Specific
$action = (isset($_GET['action'])) ? $_GET['action']: NULL;

switch ($action) {
	case 'clear':
		$cart->clear();
		break;

	case 'remove':
		$id = (isset($_GET['id']))? $_GET['id'] : NULL; 
		$cart->remove($id);
		break;
		
	case 'update':
		if (isset($_POST['id'], $_POST['quantity'])) {
			$id = (int) $_POST['id'];
			$quantity = (int) $_POST['quantity'];

			$cart->update($id, $quantity);
		}
	break;

	default:
		# code...
		break;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-primary">
				  <div class="panel-heading">Products
					<span class="pull-right">Cart (<?php echo  ($cart->count() > 0) ? $cart->count(): 0; ?>)</span>
				  </div>
				  <div class="panel-body">

				  	<?php foreach($data as $item): ?>	
				    <div class="row">
				    	<div class="col-md-4">
				    		<img src="<?php echo $item['image']; ?>" alt="">
				    	</div>
				    	<div class="col-md-8">
				    		<div class="row">
				    			<h4><?php echo $item['name']; ?></h4>
								<span>‎GH₵ <?php echo $item['price']; ?></span> <br>
				    		</div>
				    		<div class="row">
				    			<form action="index.php?id=<?php echo $item['id']; ?>" method="POST" autocomplete="off">
				    				<div class="col-md-4">
				    					<input type="number" min="1" max="<?php echo $item['stock']; ?>" class="form-control" name="quantity" value="1">
					    			</div>
					    			<div class="col-md-6 col-md-offset-2">
					    				<button type="submit" class="btn btn-success">Add to Cart</button>
					    			</div>
				    			</form>
				    		</div>
				    	</div>
				    </div>
					<br>
					<?php endforeach; ?>
				  </div>
				</div>
			</div>

			<!-- Cart -->
			<div class="col-md-6">
				<div class="panel panel-success">
				  <div class="panel-heading">
				  	Cart <span class="pull-right">
				  		<a href="index.php?action=clear"><?php echo ($cart->count()>0)? 'Clear cart' : ''; ?></a>
				  	</span>
				  </div>
				  <div class="panel-body">

				  	<?php if(!is_null($cart->all()) && $cart->count()>0): ?>
				    <table class="table table-responsive table-bordered">
				    	<thead>
				    		<tr>
				    			<th>Name</th>
				    			<th>Price</th>
				    			<th>Quantity</th>
				    			<th>Update</th>
				    			<th>Remove</th>
				    		</tr>
				    	</thead>
				    	<tbody>

				    		<?php foreach($cart->all() as $item): ?>
				    		
				    			<tr>


					    			<td><?php echo $item['name']; ?></td>
					    			<td>‎GH₵  <?php echo $item['price']; ?></td>

					    			<form action="index.php?action=update" method="POST" autocomplete="off">
					    				<td>
					    					<input type="text" type="number" min="1" max="<?php echo $item['stock']; ?>" class="form-control" name="quantity" value="<?php echo $item['quantity']; ?>">
					    				</td>
					    				<td>
					    					<button type="submit" class="btn btn-success">Update</button>
					    				</td>
					    				<input type="hidden" name="id" value="<?php echo $item['id'] ?>"> 
					    			</form>
					    			<td>
					    				<a href="index.php?id=<?php echo $item['id']; ?>&action=remove" class="btn btn-danger">Remove</a>
					    			</td>
					    		</tr>
				    		
				    		<?php endforeach; ?>
				    		
				    	</tbody>
				    	<tfoot>
				    		<tr>
				    			<td colspan="5">
				    				<span class="pull-right"><b>Total</b>: ‎GH₵ <?php echo $cart->sum(); ?></span>
				    			</td>
				    		</tr>
				    	</tfoot>
				    </table>

					<?php else: ?>
						<h4>No items in your cart yet!</h4>
					<?php endif; ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>