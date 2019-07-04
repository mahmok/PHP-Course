<?php

require("connection.php");

class Course 
{
    static function createCourse($name)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("INSERT INTO courses (cname) VALUES ('$name')");

        $lastId = $conn->getLastInsertedId();
        if(!$result)
        {
            return -1;
        }
        $conn->closeConnection();
        return $lastId;      
    }

    static function getAllCourses()
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT cname, courses.id, name FROM courses LEFT JOIN users ON users.id = courses.teacher_id");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
    }

    static function getCoursesByTeacher($teacherId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM courses WHERE teacher_id = $teacherId");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
    }


    static function getStudentsInCourse($courseId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users INNER JOIN student_course ON users.id = student_id WHERE course_id = $courseId");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
    }
}




?>