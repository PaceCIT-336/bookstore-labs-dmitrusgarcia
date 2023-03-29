<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rainy Bookstore</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/carousel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/modal.css">
    <script src="assets/carousel.js" defer></script>
    <script src="assets/filter.js" defer></script>
    <script src="assets/textSamples.js" defer></script>
    <?php session_start();
    include_once("cart.php"); 
    include_once("books.php"); ?>
</head>

<body>
    <header>
        <h1><a href="index.php">Rainy Bookstore</a></h1>
        <?php 
			if(isset($_SESSION['id'])) {
				echo "<p>Welcome, " . $_SESSION['name'] . "!</p>";
				echo "<a href=\"logout.php\"><button>Log Out</button></a>";
			} else {
				echo "<a href=\"authenticate.php\"><button>Log In</button></a>";
			}
		?>
    </header>
    
    <main class="container shop">
        <div class="review">
            <button class="prev" onclick="previousReview()">PREV</button>
            <button class="next" onclick="nextReview()">NEXT</button>

            <form name="filterform" id="filterform">
                <input type="text" name="filter" placeholder="Search...">
                <button type="submit" name="search"><i class="fa fa-search"></i></button>
            </form>

            <?php
                $counter = 0; // Initialize the counter to 0
                foreach ($books as $id => $book) {
                    echo '<section class="tile">';
                    echo '<section class="review__items">';
                    echo '<img src="' . $book->imageLocation . '" alt="' . $book->title . '">';
                    echo '<h3>' . $book->title . '</h3>';
                    echo '<p>' . $book->author . '<br>' . $book->blurb . '</p>';
                    echo '<p>$' . $book->price . '</p>';
                    echo '<form name="phpbookform" id="phpbookform' . $id . '" action="" method="POST">';
                    echo '<input type="hidden" name="title" value="' . $book->title . '">';
                    echo '<input type="hidden" name="price" value="' . $book->price . '">';
                    echo '<input type="hidden" name="index" value="' . $counter . '">'; // Add a new hidden input with the counter value
                    echo '<button type="submit">Add to Cart</button>';
                    echo '</form>';
                    echo '<br><a href="book_reviews.php?id=' . $id . '"><button>See Reviews</button></a>';
                    echo '<button onclick="viewSample(' . $id . ')">View Sample Text</button>';
                    echo '</section>';
                    echo '</section>';
                    $counter++; // Increment the counter at the end of each loop
                }
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
    <div id="sample" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <span id="closeSample" class="close">&times;</span>
                <h2>Text Sample</h2>
                <h3 id="bookTitle"></h3>
            </div>
            <div class="container">
                <div id="sampleBody" class="modal-body">
                    
                </div>
            </div>
        </div>
        <script>
            let modal = document.getElementById('sample')
            let close = document.getElementById('closeSample')

            function hideSample() {
                modal.style.display = 'none'
            }

            close.onclick = hideSample

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </div>
</body>
</html>