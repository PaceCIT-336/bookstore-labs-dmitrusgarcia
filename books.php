<?php
class Book {
    public $title;
    public $author;
    public $blurb;
    public $imageLocation;
    public $price;

    public function __construct($title, $author, $blurb, $imageLocation, $price){
        $this->title = $title;
        $this->author = $author;
        $this->blurb = $blurb;
        $this->imageLocation = $imageLocation;
        $this->price = $price;
    }
  }
?>