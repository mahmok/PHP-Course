<?php 

    //...............Printing Methods...............//
    echo "Hello world!";
    echo "<br>";
    echo "<h1>Header 1</h1>";
    print("HELLO");
    //.............................................//


 


    echo "<br>";
    echo "<br>";
    echo "<br>";





    //.................Variables.....................//

    $stringVar = "This is a string variable."; //Declaring a string.

    $var2 = 1000; //Declaring Integer.

    $var3 = 1000.023; //Declaring float.

    $var4 = true; //Declaring a boolean.
    
    echo $stringVar." ".$var2;
    echo "<br>";
    echo "$stringVar $var2";
    //...............................................//

    echo "<br>";
    echo "<br>";
    echo "<br>";

    //.............Conditional Statements........//

    $a = 1000;
    $b = 1000;

    if($a > $b)
    {
        echo "A is greater";
    }
    else if($a < $b)
    {
        echo "B is greater";
    }
    else
    {
        echo "Both are equal";
    }

    echo "<br>";

    
    $var = $a == "1000"? "TRUE": "FALSE";
    echo $var; 


    //...........................................//


    echo "<br>";
    echo "<br>";
    echo "<br>";


    //.................Loops...................//


    //FOR LOOP
    for($x = 0; $x < 10; $x++)
    {
        echo $x."<br>";
    }

    echo "<br>";


    //WHILE LOOP
    $y = 0;
    while($y < 10)
    {
        echo $y."<br>";
        $y++;
    }

    echo "<br>";

    //DO-WHILE LOOP

    $z = 10;
    do
    {
        echo $z."<br>";
    }while($z < 10);

    //.........................................//

    echo "<br>";
    echo "<br>";
    echo "<br>";

    //................Switch.....................//
    $e = 3;
    switch($e){
        case 1: echo "E is 1"; break;
        case 2: echo "E is 2"; break;
        case 3: {
            break;
        }
        default: echo "E is anything else";
    }
    //...........................................//


?>