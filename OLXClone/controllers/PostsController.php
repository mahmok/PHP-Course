<?php

require(dirname(__FILE__)."/../models/Post.php");

class PostsController 
{

    function getNotSold()
    {
        $posts = Post::getAllPosts();
        if($posts)
        {
            return json_encode(["status" => "success", "posts" => $posts]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
        
    }

    function getByUserId($userId)
    {
        $posts = Post::viewOwnPosts($userId);
        if($posts)
        {
            return json_encode(["status" => "success", "posts" => $posts]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
    }


    function sold($postId)
    {
        if(Post::markAsSold($postId))
        {
            echo json_encode(["status"=> "success"]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
    }

    function delete($postId)
    {
        if(Post::delete($postId))
        {
            echo json_encode(["status"=> "success"]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
    }

    function create($req)
    {
        $data = json_decode($req);
        $lastId = Post::create($data->title, $data->description, $data->image, $data->price, $data->userId);
        if($lastId != -1)
        {
            echo json_encode(["status"=> "success", "lastId" => $lastId]);
  
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }


    }


    function getPost($postId)
    {
        $post = Post::getPost($postId);
        if($post)
        {
            echo json_encode(["status"=> "success", "post" => $post]);
        }
        else
        {
            echo json_encode(["status"=> "failure"]);
        }
    }



    




}


?>