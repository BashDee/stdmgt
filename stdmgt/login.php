
<?php
session_start();
error_reporting(0);

include "includes/config.php";


if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
// if ( !isset($_POST['matric_no'], $_POST['password']) ) {
// 	// Could not get the data that should have been sent.
// 	exit('Please fill both the username and password fields!');
// }

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if(isset($_POST['submit'])) {
    $regno = $_POST['matric_no'];
    $password = $_POST['password'];     //using md5(password) makes sure a hashed value of the password is sent over the wire
    $query = mysqli_query($connect, "SELECT * FROM students WHERE matric_no='$regno' AND password='$password'");
    $num = mysqli_fetch_array($query);

    if($num>0) {
        $extra="index.php";//
        $_SESSION['login'] = $_POST['matric_no'];
        $_SESSION['id'] = $num['matric_no'];
        $_SESSION['sname'] = $num['name'];
        // adding session  session since it will be used alot
        $ss_query = mysqli_query($connect, "SELECT * FROM sessions WHERE status=TRUE");
        $ss =  mysqli_fetch_array($ss_query);
        $_SESSION['session'] = $ss['session'];

        // adding semester to session
        $se_query = mysqli_query($connect, "SELECT * FROM semesters WHERE status=TRUE");
        $se =  mysqli_fetch_array($se_query);
        $_SESSION['semester'] = $se['semester'];

        $uip = $_SERVER['REMOTE_ADDR'];
        $status = 1;
        $log = mysqli_query($connect, "INSERT INTO userlog(matric_no, userip, status) VALUES('".$_SESSION['login']."','$uip','$status')");
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    else {
        $_SESSION['errmsg']="Invalid Reg no or Password";
        $extra="login.php";
        $host  = $_SERVER['HTTP_HOST'];
        $uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
}

?>


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Tricia</title>
    <link rel="icon" type="image/png" sizes="860x900" href="assets/img/profilepic.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/index.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                        <span><?php echo htmlentities($_SESSION['errmsg']); ?></span>
                                    </div>
                                    <form method="post" class="user">
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter matric no..." name="matric_no">
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check">
                                                    <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                    <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary d-block btn-user w-100" name="submit" type="submit">Login</button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="#">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>