<?php 

$name = $_POST["name"];
if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
{
  echo "Only letters and white space allowed"; 
}

?>