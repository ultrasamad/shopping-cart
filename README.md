# shopping-cart
A simple shopping cart class implementation in PHP


It allows basic operations of a shopping cart; ie **adding**, **removing**, **updating** cart item through its quantity, listing all items in the cart, clearing items in the cart and some other features.


## Usage

Pull in the Cart.php class and instantiate a cart object passing through the constructor your source data.
At the moment your source data needs to be an array in a certain format which you can easily build on from your data.

You can go through the demo application to see what your source data should conform to.

``` $cart = new Cart($sourceData)```

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

There are some couple of other methods you can use such as ```find($id)``` to retrieve a specific cart item, ```count()``` for returning the total number of cart items, ```sum()``` to find the total cost of items in your cart.  
