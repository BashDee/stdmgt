<?php
require_once "includes/config.php";

//Check if the matric no is posted and delete
if (isset($_POST['dept-id'])) {
    $id= $_POST["dept-id"];    
    $query = "DELETE FROM departments WHERE id='$id' ";
    $result =mysqli_query($connect, $query);

    $extra="add-dept.php";//
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();

}
else {
    $_SESSION['errmsg']="Sorry cant delete";
    $extra="add-dept.php";
    $host  = $_SERVER['HTTP_HOST'];
    $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
    header("location:http://$host$uri/$extra");
    exit();
}


?>