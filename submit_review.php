<?php
require_once 'login.php';

function sanitizeString($var) {
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = trim($var); //Trims whitespace and newline characters
    return $var;
}

session_start();
if (!isset($_POST['submit'])) {
    header("Location: review.php");
    exit();
} elseif (isset($_POST['submit'])) {
    try {

        $BookID = sanitizeString($_POST['book']);
        $Rating = sanitizeString($_POST['rating']);
        $ReviewText = $_POST['review'] !== '' ? sanitizeString($_POST['review']) : null;

        $stmt = $pdo->prepare("INSERT INTO reviews (BookID, Rating, Review, CustomerID) VALUES (?, ?, ?, ?)");

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
        } else {
            $id = null;
        }

        $stmt->bindParam(1, $BookID, PDO::PARAM_INT);
        $stmt->bindParam(2, $Rating, PDO::PARAM_INT);
        $stmt->bindParam(3, $ReviewText, PDO::PARAM_STR);
        $stmt->bindParam(4, $id, PDO::PARAM_INT);

        $stmt->execute();

        if ($stmt->rowCount() === 1) {
            echo "Thank you for submitting your review!";
        }

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $pdo = null;
}
?>

<button onclick="window.location.href='review.php'">Add another review</button>
