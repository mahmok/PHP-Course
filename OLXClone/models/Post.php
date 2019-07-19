<?php  

require_once("Connection.php");


class Post
{
    static function create($title, $description, $image, $price, $user_id)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("INSERT INTO posts (title, description, image, price, user_id, isSold) VALUES ('$title', '$description', '$image', $price, $user_id, 0) ");

        $lastId = -1;
        if($result)
        {
            $lastId = $conn->getLastInsertedId();
        }
        $conn->closeConnection();
        return $lastId;
    }


    static function getAllPosts()
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM posts WHERE isSold = 0");
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $conn->closeConnection();
        return $posts;
    }

    static function delete($postId)
    {
        $conn = new Connection();

        $conn->createConnection();
        $result = $conn->executeQuery("DELETE FROM posts WHERE id = $postId");
        $conn->closeConnection();
        return $result;
    }

    static function markAsSold($postId)
    {
        $conn = new Connection();

        $conn->createConnection();
        $result = $conn->executeQuery("UPDATE posts SET isSold = 1 WHERE id = $postId");
        $conn->closeConnection();
        return $result;
    }

    static function getPost($postId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM posts WHERE id= $postId");

        $post = mysqli_fetch_object($result);

        $conn->closeConnection();
        return $post;

    }

    static function viewOwnPosts($user_id)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM posts WHERE user_id = $user_id");
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $conn->closeConnection();
        return $posts;
    }




}

?>