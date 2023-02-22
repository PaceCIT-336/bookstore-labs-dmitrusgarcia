<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rainy Bookstore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <?php session_start();
    include_once("cart.php"); 
    include_once("books.php"); ?>
</head>

<body>
    <header>
        <h1><a href="index.php">Rainy Bookstore</a></h1>
    </header>
    
    <main class="container shop">
        <div class="container">
        <?php
            foreach ($books as $book) {
                echo '<section class="tile">';
                echo '<img src="' . $book->imageLocation . '" alt="' . $book->title . '">';
                echo '<h3>' . $book->title . '</h3>';
                echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                echo '<p>$' . $book->price . '</p>';

                echo '<form name="phpbookform" id="phpbookform" action="" method="POST">';
                echo '<input type="hidden" name="title" value="' . $book->title . '">';
                echo '<input type="hidden" name="price" value="' . $book->price . '">';
                echo '<button type="submit">Add to Cart</button>';
                echo '</form>';
                echo '</section>';
            }
            #print_r($books)
        ?>
    </div>
    <aside id="cart">
        <img src="assets/imgs/cart.png">
        <p id="cartSummary">
            Items: <?php echo count($_SESSION["items"]); ?><br><br>
            Total: $<?php echo $_SESSION["total"]; ?>
        </p>
        <form id="checkoutform" name="checkoutform" action="checkout.php" method="POST">
            <input type="hidden" name="cart" id="cartInput" value="<?php echo join("|", $_SESSION["items"]); ?>">
            <input type="hidden" name="total" id="totalInput" value="<?php echo $_SESSION["total"]; ?>">
            <button id="checkout">Checkout</button>
        </form>
        <form id="clearform" name="clearform" action="" method="POST">
            <button id="clearCart" name="clear" value="clear">Clear Cart</button>
        </form>
    </aside>
    </main>
</body>
</html>