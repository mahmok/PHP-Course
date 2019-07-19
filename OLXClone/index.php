
<?php 
require("./controllers/PostsController.php");
require("./controllers/UsersController.php");


if(isset($_SERVER['REDIRECT_URL']))
{
    $path = explode("/", $_SERVER['REDIRECT_URL']);

    if($path[3] == "posts")
    {
        $postsController = new PostsController();
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            if(isset($path[4]) && $path[4] == "delete")
            {
                echo $postsController->delete($path[5]);
                return;
            }
            else if(isset($path[4]) && $path[4] == "mark")
            {
                echo $postsController->sold($path[5]);
                return;
            }
            else if(isset($path[4]))
            {
                echo $postsController->getPost($path[4]);
                return;
            }
            echo $postsController->getNotSold();
            return;
        }
        else
        {
            $target_dir = "uploads/";
            $target_file = $target_dir . $_POST['userId']."-".basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            $body = json_encode([
                "title"=>$_POST["title"],
                "description"=>$_POST["description"],
                "price"=>$_POST["price"],
                "image"=>$_POST['userId']."-".basename($_FILES["image"]["name"]),
                "userId"=>$_POST["userId"]
                ]);

            echo $postsController->create($body);
        }
    }
    else if($path[3] == "users")
    {
        $usersController = new UsersController();
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            if(isset($path[4]))
            {
                echo $usersController->getById($path[4]);
                return;
            }
        }
        else
        {
            if(isset($path[4]) && $path[4] == "login")
            {
                $requestBody = file_get_contents('php://input');
                echo $usersController->login($requestBody);
                return;
            }
            else if(isset($path[4]) && $path[4] == "signup")
            {
                $requestBody = file_get_contents('php://input');
                echo $usersController->signup($requestBody);
                return;
            }
        }
    }
    else if($path[3] == "home")
    {
        header("location: views/home.html");
    }
    else
    {
        echo "Route not found";
        return;
    }
}


?>