<?php 

require(dirname(__FILE__)."/../models/User.php");

class UsersWebServiceController
{
    function getAllUsers()
    {
        return json_encode(User::get());
    }

    function createUser($request)
    {
        $data = json_decode($request);
        if(User::insert($data->name, $data->email))
        {
            echo json_encode(["status"=> "success"]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
        
        return; 
    }

}










?>