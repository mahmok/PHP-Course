<?php

require(dirname(__FILE__)."/../models/User.php");
session_start();

class UsersController
{
    function login($request)
    {   
        $data = json_decode($request);

        $user = User::login($data->email, $data->password);
        if($user)
        {
            $_SESSION['id'] = $user->id;
            echo json_encode(["status"=> "success", "user" => $user]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
        
    }

    function getById($id)
    {
        $user = User::getUserById($id);
        if($user)
        {
            echo json_encode(["status"=> "success", "user" => $user]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
    }

    function signup($request)
    {
        $data = json_decode($request);

        $lastId = User::signup($data->name, $data->password, $data->mobile, $data->email);
        if($lastId != -1)
        {
            echo json_encode(["status"=> "success", "lastId" => $lastId]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
    }


}


?>