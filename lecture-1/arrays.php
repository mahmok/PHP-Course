<?php 
// One way to create an indexed array 
$name_one = ["Zack", "Anthony", "Ram", "Salim", "Raghav"]; 
  
// Accessing the elements directly 
echo "Accessing the 1st array elements directly:\n"; 
echo $name_one[2], "\n"; 
echo $name_one[0], "\n"; 
echo $name_one[4], "\n"; 


echo "<br>";
// Second way to create an indexed array 
$name_two[0] = "ZACK"; 
$name_two[1] = "ANTHONY"; 
$name_two[2] = "RAM"; 
$name_two[3] = "SALIM"; 
$name_two[4] = "RAGHAV"; 
  
// Accessing the elements directly 
echo "Accessing the 2nd array elements directly:\n"; 
echo $name_two[2], "\n"; 
echo $name_two[0], "\n"; 
echo $name_two[4], "\n";


echo "<br>";
// One way of Looping through an array usign foreach 
echo "Looping using foreach: \n"; 
foreach ($name_one as $val){ 
    echo $val. "\n"; 
} 

echo "<br>";
// count() function is used to count  
// the number of elements in an array 
$round = count($name_one);  
echo "\nThe number of elements are $round \n"; 
  
echo "<br>";
// Another way to loop through the array using for 
echo "Looping using for: \n"; 
for($n = 0; $n < $round; $n++){ 
    echo $name_one[$n], "\n"; 
} 


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

// One way to create an associative array 
$assoc_arr = ["key1" => "val1", "key2" => "val2", "key3" => "val3"]; 
  
// Second way to create an associative array 
$assoc_arr["key1"] = "val1"; 
$assoc_arr["key2"] = "val2"; 
$assoc_arr["key3"] = "val3";
  
// Accessing the elements directly 
echo "Accessing the elements directly:\n"; 
echo $assoc_arr["key1"], "\n"; 
echo $assoc_arr["key2"], "\n"; 
echo $assoc_arr["key3"], "\n";

echo "<br>";

// Looping through an array using foreach 
echo "Looping using foreach: \n"; 
foreach ($assoc_arr as $key => $val){ 
    echo "(Key: ".$key." , ".$val.")\n"; 
} 

echo "<br>";
// Looping through an array using for 
echo "\nLooping using for: \n"; 
$keys = array_keys($assoc_arr); 
$valuesLength = count($assoc_arr);  
  
for($i=0; $i < $valuesLength; ++$i) { 
    echo "(Key: ".$keys[$i]." , ".$assoc_arr[$keys[$i]].")\n"; 
} 
  

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";



// Defining a multidimensional array 
$favorites = [ 
    array( 
        "name" => "Dave Punk", 
        "mob" => "5689741523", 
        "email" => "davepunk@gmail.com", 
    ), 
    array( 
        "name" => "Monty Smith", 
        "mob" => "2584369721", 
        "email" => "montysmith@gmail.com", 
    ), 
    array( 
        "name" => "John Flinch", 
        "mob" => "9875147536", 
        "email" => "johnflinch@gmail.com", 
    ) 
]; 
  
// Accessing elements 
echo "Dave Punk email-id is: " . $favorites[0]["email"], "\n"; 
echo "John Flinch mobile number is: " . $favorites[1]["mob"]; 

echo "<br>";

// Using for and foreach in nested form 
$keys = array_keys($favorites); 
for($i = 0; $i < count($favorites); $i++) { 
    echo $keys[$i] . "\n"; 
    foreach($favorites[$keys[$i]] as $key => $value) { 
        echo $key . " : " . $value . "\n"; 
    } 
    echo "<br>"; 
} 


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";



$a=array("red","green");
array_push($a,"blue","yellow");
array_push($a,["Indigo","Purple"]);
print_r($a);



echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$b = ["One", "Two", "Three"];
array_pop($b);
print_r($b);



echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


$c = ["One", "Two", "Three"];
unset($c[1]);
print_r($c);


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";


$d = ["One", "Two", "Three"];
echo "Found: ".array_search("Twoasd", $d)."<br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

$e = ["One" => 1, "Two" => 2, "Three" => 3];
echo array_key_exists("Two", $e)? "Exists": "Doesn't exist";
echo "<br>";



?>