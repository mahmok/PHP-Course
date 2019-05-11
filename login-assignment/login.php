<?php 

    var_dump($_POST);
    session_start();

    $_SESSION["username"] = $_POST["username"];

    if(isset($_POST["rememberme"]))
    {
        setcookie("saved_username", $_POST["username"], time() + (86400 * 30), "/");
    }

    header("Location: home.php");



?>