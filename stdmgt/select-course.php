<?php
session_start();
require 'includes/config.php';

if(strlen($_SESSION['login'])==0) {   
  header('location:login.php');
}
else {


//Check if the matric
    

    if (isset($_POST['course_code'])) {
        $extra="course-registration.php";//
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');

        $check_query = mysqli_query($connect, "SELECT * FROM registered_courses 
        WHERE matric_no='".$_SESSION['login']."' AND course='".$_POST['course_code']."' AND semester='".$_SESSION['semester']."' AND session='".$_SESSION['session']."'");

        if (mysqli_fetch_array($check_query)){
            header("location:http://$host$uri/$extra");
            $_SESSION['errmsg']="Course already added!";
            exit();
        }
        else {
            $matric_no = $_SESSION['login'];
            $session = $_SESSION['session'];
            $id = $_POST['course_code'];
            $semester = $_SESSION['semester'];
            $query = "INSERT INTO registered_courses(matric_no, session, course, semester) 
                    VALUES('$matric_no', '$session', '$id', '$semester') ";
            $result =mysqli_query($connect, $query);
           
            header("location:http://$host$uri/$extra");
            exit();

        }

    }
    else {
        $_SESSION['errmsg']="Sorry cant add, Refresh the page and try again";
        $extra="course-registration.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}

?>