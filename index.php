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
            $books_array = array();
  
            $book1 = new Book("Learning PHP, MySQL & JavaScript", "Robin Nixon", "A step-by-step guide to creating dynamic websites.", "assets/imgs/learningphp.jpg", "60");
            array_push($books_array, $book1);

            $counter = 0;
            foreach ($books_array as $book) {
                if ($counter == 0) {
                    echo '<img src="' . $book->imageLocation . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';
                }
                $counter++;
            }
            ?>
            <form name="phpbookform" id="phpbookform" action="" method="POST">
                <input type="hidden" name="title" value="Learning PHP, MySQL & JavaScript">
                <input type="hidden" name="price" value="60">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
        <section class="tile">
            <?php
            $book2 = new Book("Learning Python", "Mark Lutz", "Powerful Object-Oriented Programming", "assets/imgs/learningpython.jpg", "49");
            array_push($books_array, $book2);
            
            $counter = 0;
            foreach ($books_array as $book) {
                if ($counter == 1) {
                    echo '<img src="' . $book->imageLocation . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';
                }
                $counter++;
            }
            ?>
            <form name="pybookform" id="pybookform" action="" method="POST">
                <input type="hidden" name="title" value="Learning Python">
                <input type="hidden" name="price" value="49">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
        <section class="tile">
            <?php
            $book3 = new Book("HTML & CSS 9th Ed", "Joe Casabon", "Design and build webpages", "assets/imgs/htmlcss.jpg", "35");
            array_push($books_array, $book3);
            
            $counter = 0;
            foreach ($books_array as $book) {
                if ($counter == 2) {
                    echo '<img src="' . $book->imageLocation . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';
                }
                $counter++;
            }
            ?>
            <form name="htmlbookform" id="htmlbookform" action="" method="POST">
                <input type="hidden" name="title" value="HTML & CSS 9th Ed">
                <input type="hidden" name="price" value="35">
                <button type="submit">Add to Cart</button>
            </form>
        </section>
        <section class="tile">
            <?php
            $book4 = new Book("American Heritage Dictionary", "", "The English Language.", "assets/imgs/dictionary.jpg", "55");
            array_push($books_array, $book4);
            
            $counter = 0;
            foreach ($books_array as $book) {
                if ($counter == 3) {
                    echo '<img src="' . $book->imageLocation . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';
                }
                $counter++;
            }

            #print_r($books_array)
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
            <input type="hidden" name="cart" id="cartInput" value="<?php echo implode("|", $_SESSION["items"]); ?>">
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