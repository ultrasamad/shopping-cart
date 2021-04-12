# shopping-cart
A shopping cart class implementation in PHP


It allows basic operations of a shopping cart; ie **adding**, **removing**, **updating** cart item through its quantity, **listing all** items in the cart, **clearing items** in the cart as well as calculating total cost of items in the cart.


## Usage

Instantiate a Cart object passing in your source data.
In a real application, you won't be passing data to the cart though. And in that case the constructor will not be needed.

``` 
$products = [
	[
		'id' => 1, 
		'name' => 'Smart Watch', 
		'price' => 45,  
		'description' => 'This Fitness Bracelet has a high sensitive touch screen'
	],
	...
];

$cart = new \App\Cart($products)

```
To test the sample application built with this class, clone the repository and run:\
`php -S localhost:8000 -t examples`

## Methods

Methods used by Cart class are pretty self explanatory

### Adding item

```$cart->add($id, $quantity)```

### Removing an item

```$cart->remove($id)```

### Updating cart item
```$cart->update($id, $quantity)```

### Listing all cart items

```$cart->all()```

### Total number of items in cart

```$cart->count()```

### Total cost of items

```$cart->sum()```

### Remove item from cart

```$cart->remove($id)```

### Empty cart

```$cart->clear()```
