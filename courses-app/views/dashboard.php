<?php 

    session_start();

    if($_SESSION['type'] == "student")
    {
        require("./student.php");
    }
    else if($_SESSION['type'] == "teacher")
    {
        require("./teacher.php");
    }
    else if($_SESSION['type'] == "admin")
    {
        require("./admin.php");
    }




?>



