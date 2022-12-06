<?php
require_once "includes/config.php";

//Check if the matric no is posted and delete
if (isset($_POST['matric_no'])) {
    $regno= $_POST["matric_no"];    
    $query = "DELETE FROM students WHERE matric_no='$regno' ";
    $result =mysqli_query($connect, $query);

    $extra="manage-student.php";//
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();

}
else {
    $_SESSION['errmsg']="Invalid Username or Password";
    $extra="manage-student.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
}


?>