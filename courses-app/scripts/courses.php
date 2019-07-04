<?php

require("../models/course.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    // Takes raw data from the request
    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);

    if($data->query == "createCourse")
    {
        $lastId = Course::createCourse($data->name);
        if($lastId != -1)
        {
            echo json_encode(["status" => "success", "newId"=>$lastId]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
}
else
{
    if($_GET['query'] == "getAllCourses")
    {
        $courses = Course::getAllCourses();
        if($courses)
        {
            echo json_encode(["status" => "success", "courses" => $courses]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }    
    else if($_GET['query'] == "getCoursesByTeacher")
    {
        $courses = Course::getCoursesByTeacher($_GET['teacherId']);
        if($courses)
        {
            echo json_encode(["status" => "success", "courses" => $courses]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
    else if($_GET['query'] == "getStudentsInCourse")
    {
        $students = Course::getStudentsInCourse($_GET['courseId']);
        if($students)
        {
            echo json_encode(["status" => "success", "students" => $students]);
        }
        else
        {
            echo json_encode(["status" => "failure"]);
        }
    }
}




?>