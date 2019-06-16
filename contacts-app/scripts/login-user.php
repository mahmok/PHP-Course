<?php 

require("../models/user.php");
session_start();


$loggedUserId = User::login($_POST['email'], $_POST['password']);
if($loggedUserId != -1)
{
    echo "Logged Successfully";
    $_SESSION['userId'] = $loggedUserId;

}
else
{
    echo "Invalid Credentials";
}




?>