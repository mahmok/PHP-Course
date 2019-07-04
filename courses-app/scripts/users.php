<?php 

require("../models/user.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);

    if($data->query == "signup")
    {
        $lastId = User::signup($data->name, $data->username, $data->password, $data->type);
        if($lastId != -1)
        {
            echo json_encode(["status" => "success", "newId"=>$lastId]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else if($data->query == "login")
    {
        $user = User::login($data->username, $data->password);
        if($user != null)
        {
            session_start();

            $_SESSION['id'] = $user->id;
            $_SESSION['type'] = $user->type;
            echo json_encode(["status" => "success", "user" => $user]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else
    {
        echo json_encode(["status" => "failure", "message" => "Cannot find query specified"]);
    }
    
}
else
{

    if($_GET['query'] == "getJoinedCourses")
    {
        $joinedCourses = User::getJoinedCourses($_GET['studentId']);
        echo json_encode(["status" => "success", "courses" => $joinedCourses]);
    }
    else if($_GET['query'] == "joinCourse")
    {
        if(User::joinCourse($_GET['studentId'], $_GET['courseId']))
        {
            echo json_encode(["status" => "success"]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else if($_GET['query'] == "leaveCourse")
    {
        if(User::leaveCourse($_GET['studentId'], $_GET['courseId']))
        {
            echo json_encode(["status" => "success"]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else if($_GET['query'] == "teachCourse")
    {
        if(User::teachCourse($_GET['teacherId'], $_GET['courseId']))
        {
            echo json_encode(["status" => "success"]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else if($_GET['query'] == "getAllStudents")
    {
        $students = User::getAllStudents();
        if($students)
        {
            echo json_encode(["status" => "success", "students" => $students]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else if($_GET['query'] == "getAllTeachers")
    {
        $teachers = User::getAllTeachers();
        if($teachers)
        {
            echo json_encode(["status" => "success", "teachers" => $teachers]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else
    {
        echo json_encode(["status" => "failure", "message" => "Cannot find query specified"]);
    }

}






?>