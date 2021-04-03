# shopping-cart
A simple shopping cart class implementation in PHP


It allows basic operations of a shopping cart; ie **adding**, **removing**, **updating** cart item through its quantity, **listing all** items in the cart, **clearing items** in the cart as well as calculating total cost of items in the cart.


## Usage

Pull in the Cart.php class and instantiate a cart object passing in your source data.
At the moment your source data needs to be an array in a certain format which you can easily build on from your data.

``` 
$data = [

	'1' => ['id' => 1, 'name' => 'Infinix Hot 4 Pro', 'price' => 465.5, 'stock' => 120, 'image' => 'http://via.placeholder.com/140x100'],
	'2' => ['id' => 2, 'name' => 'Binatone steel iron', 'price' => 74.0, 'stock' => 350, 'image' => 'http://via.placeholder.com/140x100'],
	'3' => ['id' => 3, 'name' => 'Brown kaki trouser', 'price' => 65.5, 'stock' => 85, 'image' => 'http://via.placeholder.com/140x100'],
	'4' => ['id' => 4, 'name' => 'Long sleeve shirt', 'price' => 51.2, 'stock' => 55, 'image' => 'http://via.placeholder.com/140x100'],
];

$cart = new \App\Cart($data)

```
You can go through the demo application in the demo folder to see a working sample application.

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

### Show item

```$cart->show($id)```

### Total cost of items

```$cart->sum()```

### Remove item from cart

```$cart->remove($id)```

### Empty cart

```$cart->clear()```
