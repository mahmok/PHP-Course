<?php
   
    function printHello()
    {
        echo "<h1>Hello!</h1>";
    }

    function getPercentage($value, $total)
    {
        return ($value/$total) * 100;
    }


    function printArray($arr = [])
    {
        for($i = 0; $i < count($arr); $i++)
        {
            echo $arr[$i]."<br>";
        }
    }



    printHello();

    $per = getPercentage(50, 100);

    echo "<h1>$per%</h1>";


    printArray(["Hello", "World", "It's", "Me"]);



?>