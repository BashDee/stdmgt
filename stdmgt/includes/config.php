<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "student_mgt_sys";
$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysqli_select_db($connect, $mysql_database) or die("Could not select database");

?>

<!-- $connect = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);
if ($connect->connect_error) {
    die("Could not connect database" . $connect->connect_error);

}
 -->