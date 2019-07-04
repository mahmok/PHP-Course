<?php 

require("./controllers/UsersWebServiceController.php");



if(isset($_SERVER['REDIRECT_URL']))
{
    //echo $_SERVER['REDIRECT_URL']. "<br>";
    //var_dump(explode("/", $_SERVER['REDIRECT_URL']));
    $path = explode("/", $_SERVER['REDIRECT_URL']);

    $controller = new UsersWebServiceController();
    
    //echo $_SERVER['REQUEST_METHOD'];
    if($path[count($path) - 1] == "users" && $_SERVER['REQUEST_METHOD'] == "GET")
    {
        echo $controller->getAllUsers(); 
        return;
    }
    else if($path[count($path) - 1] == "users" && $_SERVER['REQUEST_METHOD'] == "POST")
    {
        $requestBody = file_get_contents('php://input');
        echo $controller->createUser($requestBody); 
        return;
    }
    else
    {
        echo json_encode(["Error" => "Route Not Found"]);
        return;
    }
    
}






?>




<form action="./views/users.php">

    <input type="submit" value="Go To App" >
    


</form>