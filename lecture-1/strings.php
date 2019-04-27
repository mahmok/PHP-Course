<?php 

    $var = "hello";
    echo strtoupper($var);
    echo "<br>";

    echo "String Length is: ".strlen($var);
    echo "<br>";

    echo "Substring: ".substr($var, 3, 4);
    echo "<br>";

    echo "Substring Replace: ".str_replace("ll", "yyyyy", $var);
    echo "<br>";

    echo "Get Position of Substring: ".strpos($var, "ll");
    echo "<br>";


?>