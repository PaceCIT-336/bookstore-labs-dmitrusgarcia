<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rainy Bookstore - Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
</head>
<body>
<header>
    <h1><a href="index.php">Rainy Bookstore</a></h1>
</header>
<main id="checkoutpg">
<?php
// retrieve the cart items and total price passed from the shop page
$cart = explode('|', htmlentities($_POST['cart']));
$cartItems = count($cart); // number of items in the cart
$price = htmlentities($_POST['total']);

//calculate average price
$averagePrice = $price / $cartItems;

//print the information in table-like divs
echo "<h2>Cart</h2><div class=\"table\"><div class=\"row header\"><div class=\"cell\">Title</div><div class=\"cell\">Price</div></div>";
for ($i = 0; $i < count($cart); $i++) {
    $title = $cart[$i];
    echo "<div class=\"row\"><div class=\"cell\">$title</div><div class=\"cell\">$$averagePrice</div></div>";
}

// calculate tax and echo it in a new table row 

$tax = $price * 0.04;
$pricewithtax = $price + $tax;

echo "<div class=\"row summary\"><div class=\"cell\">Total Price:</div><div class=\"cell\">$$pricewithtax</div></div>";
echo "<div class=\"row summary\"><div class=\"cell\">Tax (4%):</div><div class=\"cell\">$$tax</div></div>";

// thank the user for their purchase
$name = "Dmitrus";
        if ($price > 0) {
            echo "<p>Thank you for your purchase, $name!</p>";
        } else {
            echo "<p>You seem to be here by accident. Please visit our <a href='index.php'>Shop</a> to make a purchase.</p>";
        }

// this clears the session and ensures the cart is emptied for future shopping
session_start();
session_unset();
?>
</main>
</body>
</html>