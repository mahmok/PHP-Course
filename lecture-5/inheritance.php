<?php

// Private, Public, Static, Abstract

class Animal {
    /* Member variables */
    var $name;
    
    function makeSound()
    {
        echo "Cannot make sound";
    }

    function getName()
    {
        echo $this->name;
    }
    
    function __construct( $name ) {
        $this->name = $name;
    }
    
}


class Dog extends Animal {

    function makeSound()
    {
        echo "Bark!";
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

        $dog = new Dog("Dog 1");
        $cat = new Cat("Cat 1");

        $animal->getName();
        $animal->makeSound();

        echo "<br>";
        $dog->getName();
        $dog->makeSound();

        echo "<br>";
        $cat->getName();
        $cat->makeSound();
    
    ?>
</body>
</html>