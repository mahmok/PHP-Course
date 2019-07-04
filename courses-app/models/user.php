<?php 

require('connection.php');

class User
{

    static function signup($name, $username, $password, $type)
    {

        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("INSERT INTO users (name, username, password, type) 
                                        VALUES ('$name', '$username', '$password', '$type')");

        $lastId = $conn->getLastInsertedId();
        if(!$result)
        {
            return -1;
        }
        $conn->closeConnection();
        return $lastId;       


    }

    static function login($username, $password)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users WHERE username = '$username' ");

        $user = mysqli_fetch_object($result);
        if(!$user)
        {
            return null;
        }
        $conn->closeConnection();
        if($user->password == $password)
        {
            return $user;
        }
        return null;

    }

    static function getJoinedCourses($studentId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users INNER JOIN student_course ON users.id =  student_course.student_id 
        INNER JOIN courses ON courses.id = student_course.course_id WHERE users.id = $studentId");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
        

    }

    static function joinCourse($studentId, $courseId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("INSERT INTO student_course (student_id, course_id) 
                                        VALUES ($studentId, $courseId)");
                                

        $conn->closeConnection();        

        return $result;
   
    }

    static function leaveCourse($studentId, $courseId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("DELETE FROM student_course WHERE student_id = $studentId AND course_id = $courseId");
                                

        $conn->closeConnection();        

        return $result;
    }

    static function teachCourse($teacherId, $courseId)
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("UPDATE courses SET teacher_id = $teacherId WHERE id = $courseId");
                                

        $conn->closeConnection();        

        return $result;
    }

    static function getAllStudents()
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users WHERE type = 'student'");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
        
    }

    static function getAllTeachers()
    {
        $conn = new Connection();
        $conn->createConnection();

        $result = $conn->executeQuery("SELECT * FROM users WHERE type = 'teacher'");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $conn->closeConnection();

        return $result;
    }



}



?>