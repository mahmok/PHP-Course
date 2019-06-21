<?php 
require('contact.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);


    $lastId = Contact::createContact($data->name, $data->email, $data->mobile);
    if($lastId != -1)
    {
        $data->id = $lastId;
        echo json_encode(['status'=> "success", 'contact' => $data]);
    }
    else
    {
        echo json_encode(['status'=> "failure"]);
    }

}
else if($_SERVER['REQUEST_METHOD'] == "GET")
{
    if(isset($_GET['delete']))
    {
        $result = Contact::deleteContact($_GET['id']);
        if($result)
        {
            echo json_encode(['status'=> "success"]);
        }
        else
        {
            echo json_encode(['status'=> "failure"]);
        }
    }
    else
    {
        $rows = Contact::getAllContacts();

        echo json_encode($rows);
    }

}



?>