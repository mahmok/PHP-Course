<?php

require(dirname(__FILE__)."/../models/User.php");

class UsersController
{
    function getAllUsers()
    {
        return User::get();
    }

    function createUser($name, $email)
    {
        if(User::insert($name, $email))
        {
            echo "User created successfully!";
        }
        else
        {
            echo "Error";
        }
        
        return; 
    }

}

?>