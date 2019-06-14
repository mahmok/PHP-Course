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
    /*
    function __construct( $par1, $par2 ) {
        $this->title = $par1;
        $this->price = $par2;
    }

    function __destruct()
    {
        
    }
    */
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
        $book = new Book();
        $book->setPrice(5);
        $book->setTitle("Harry Potter");

        $book->getTitle();
        $book->getPrice();
    
    ?>
</body>
</html>