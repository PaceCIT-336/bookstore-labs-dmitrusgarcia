<?php

require_once "login.php";

class Book {
  public $id;
  public $title;
  public $author;
  public $blurb;
  public $imageLocation;
  public $price;

  public function __construct($id, $title, $author, $blurb, $imageLocation, $price){
    $this->id = $id;
    $this->title = $title;
    $this->author = $author;
    $this->blurb = $blurb;
    $this->imageLocation = $imageLocation;
    $this->price = $price;
  }
}

$query = "SELECT * FROM books";
$result = $pdo->query($query);

$books = array();
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    // Assign each column to a variable and sanitize the value
    $id = htmlspecialchars($row['BookID']);
    $title = htmlspecialchars($row['Title']);
    $author = htmlspecialchars($row['Author']);
    $blurb = htmlspecialchars($row['Description']);
    $imageLocation = htmlspecialchars($row['ImagePath']);
    $price = htmlspecialchars($row['Price']);

    // Create a new Book object with the values from the database
    $book = new Book($id, $title, $author, $blurb, $imageLocation, $price);

    // Add the Book object to the $books array with the id as the index
    $books[$id] = $book;
}

?>