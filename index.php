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
        <section class="tile">
            <?php
            $id = 1;
            $book = $books[$id];
                    echo '<img src="' . $book->imageLocation . '" alt="' . $book->title . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';
            
                    $id++;    
            ?>
            <form name="phpbookform" id="phpbookform" action="" method="POST">
                <input type="hidden" name="title" value="Learning PHP, MySQL & JavaScript">
                <input type="hidden" name="price" value="60">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
        <section class="tile">
            <?php
            $book = $books[$id];
                    echo '<img src="' . $book->imageLocation . '" alt="' . $book->title . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';

                    $id++;  
            ?>
            <form name="pybookform" id="pybookform" action="" method="POST">
                <input type="hidden" name="title" value="Learning Python">
                <input type="hidden" name="price" value="49">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
        <section class="tile">
            <?php
            $book = $books[$id];
                    echo '<img src="' . $book->imageLocation . '" alt="' . $book->title . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';

                    $id++;  
            ?>
            <form name="htmlbookform" id="htmlbookform" action="" method="POST">
                <input type="hidden" name="title" value="HTML & CSS 9th Ed">
                <input type="hidden" name="price" value="35">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
        <section class="tile">
            <?php
            $book = $books[$id];
                    echo '<img src="' . $book->imageLocation . '" alt="' . $book->title . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';

            #print_r($books)
            ?>
            <form name="dictbookform" id="dictbookform" action="" method="POST">
                <input type="hidden" name="title" value="American Heritage Dictionary">
                <input type="hidden" name="price" value="55">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
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