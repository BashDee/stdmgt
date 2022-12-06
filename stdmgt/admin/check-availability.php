<?php 
require_once "includes/config.php";

if(!empty($_POST["regno"])) {
	$regno = $_POST["regno"];
    $result = mysqli_query($connect, "SELECT matric_no FROM students WHERE matric_no='$regno'");
    $count= mysqli_num_rows($result);
    if($count > 0) {
        echo "<span style='color:red'> Student with this Matric Number Already Registered.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } 
    else{
        

    }
}

if(!empty($_POST["dept"])) {
	$dept = $_POST["dept"];
    $result = mysqli_query($connect, "SELECT dept_name FROM departments WHERE dept_name='$dept'");
    $count = mysqli_num_rows($result);
    if($count > 0) {
        echo "<span style='color:red'> Department already exists!!.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } 
    else{
        

    }
}

if(!empty($_POST["code"])) {
	$ccode = $_POST["code"];
    $result = mysqli_query($connect, "SELECT course_code FROM courses WHERE course_code='$ccode'");
    $count = mysqli_num_rows($result);
    if($count > 0) {
        echo "<span style='color:red'> Course already exists!!.</span>";
        echo "<script>$('#submit').prop('disabled',true);</script>";
    } 
    else {
        

    }
}

?>
