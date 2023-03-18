<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rainy Bookstore - Review Book</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/styles.css">
    <script src="assets/shop.js" async></script>
    <script defer>
        function changeStars(num) {
            document.getElementById("stars").innerText = num;
        }
    </script>
    <link rel="stylesheet" type="text/css" href="assets/formStyles.css">
    <?php 
    require_once("books.php"); 
    ?>
</head>

<body>
    <header>
        <h1><a href="index.php">Rainy Bookstore</a></h1>
    </header>
    <main class="container shop">
        <div>
            <h2>Submit a Review</h2>
            <form id="reviewForm" action="submit_review.php" method="POST">
                <label>Book<select name="book">
                    <?php
                        foreach($books as $id => $bk) {
                        echo "<option value=\"$id\">$bk->title</option>";
                        }
                    ?>
                </select></label>
                <label>Rating
                    <span id="stars">3</span>
                    <input id="rating" type="range" step="1" min="1" max="5" value="3" oninput="changeStars(this.value)" name="rating">
                </label>
                <label>Review<textarea name="review"></textarea></label>
                <input type="submit" name="submit" value="Submit Review">
            </form>
        </div>
    </main>
</body>
</html>