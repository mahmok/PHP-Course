<?php

class Book {
    /* Member variables */
    var $price;
    var $title;
    
    /* Member functions */
    function setPrice($par){
       $this->price = $par;
    }
    
    function getPrice(){
       echo "Price: ". $this->price ."<br/>";
    }
    
    function setTitle($par){
       $this->title = $par;
    }
    
    function getTitle(){
       echo "<h1>".$this->title ."</h1><br/>";
    }
    
    function __construct( $par1, $par2 ) {
        $this->title = $par1;
        $this->price = $par2;

        echo "New Object Created!";
    }

    
 }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OOP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php 
        $book = new Book("Harry Potter", 5);

        $book->getTitle();
        $book->getPrice();

        $book2 = new Book("Book2", 10);
        $book2->getTitle(); 

    ?>
</body>
</html>