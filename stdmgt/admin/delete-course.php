<?php
require_once "includes/config.php";


if (isset($_POST['course_code'])) {
    $ccode= $_POST["course_code"];    
    $query = "DELETE FROM courses WHERE course_code='$ccode' ";
    $result =mysqli_query($connect, $query);

    $extra="add-course.php";//
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();

}
else {
    $_SESSION['errmsg']="Invalid Username or Password";
    $extra="add-course.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
}
?>