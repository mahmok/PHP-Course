<?php 

require("../models/user.php");



if(User::createUser($_POST['email'], $_POST['password']))
{
    echo "User Created";
}
else
{
    echo "Error";
}




?>