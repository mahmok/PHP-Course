<?php

// Static, Abstract

class Animal {
    /* Member variables */
    var $name;
    static $myCount = 0;
    
    function makeSound()
    {
        echo $this->getName().": Cannot make sound";
    }

    static function PrintParentClass()
    {
        echo "Animal Class";
    }

    protected function getName()
    {
        echo $this->name;
    }
    
    function __construct( $name ) {
        $this->name = $name;
        Animal::$myCount++;
    }
    
}


class Dog extends Animal {

    function makeSound()
    {
        echo $this->getName()."Bark!";
    }
}


class Cat extends Animal
{
    function makeSound()
    {
        echo "Meow!";
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

        $animal = new Animal("Normal Animal");
        

        $animal2 = new Animal("Normal Animal 2");

        $animal3 = new Animal("Normal Animal 3");
        $animal3 = new Animal("Normal Animal 3");
        echo Animal::$myCount."<br>";
        Animal::PrintParentClass();

    ?>
</body>
</html>