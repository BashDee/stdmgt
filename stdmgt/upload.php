<?php
session_start();
error_reporting(0);
include 'includes/config.php';

if(isset($_POST['upload'])) {   
    // $studentname = $_POST['studentname'];
    $photo = $_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"],"studentphoto/".$_FILES["photo"]["name"]);
    $ret = mysqli_query($connect, "UPDATE students SET photo='$photo'  WHERE matric_no='".$_SESSION['login']."'");
  
    if($ret) {
        header ('location: profile.php');
      $_SESSION['msg']="Student Record updated Successfully !!";
    }

    else {
      $_SESSION['msg']="Error : Student Record not update";
    }
  }

?>