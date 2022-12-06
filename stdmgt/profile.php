<?php
session_start();
error_reporting(0);
include 'includes/config.php';

if(strlen($_SESSION['login'])==0) {   
  header('location:login.php');
}
else {
    $nok = mysqli_query($connect, "SELECT * FROM other_information WHERE matric_no='".$_SESSION['login']."' ");
    $nok_result = mysqli_fetch_array($nok);
                                                        
    if(isset($_POST['submit'])) {
        $nok_name = $_POST['nok_name'];
        $nok_email = $_POST['nok_email'];
        $nok_phone = $_POST['nok_phone'];
        $nok_address = $_POST['nok_address'];
        // $photo = $_FILES["photo"]["name"];
        // move_uploaded_file($_FILES["photo"]["tmp_name"],"studentphoto/".$_FILES["photo"]["name"]);

        // check if data already exists
        $query = mysqli_query($connect, "SELECT * FROM other_information WHERE matric_no = '".$_SESSION['login']."' ");

        // if data exist, update
        if (!empty(mysqli_fetch_array($query))) { 
            $update = mysqli_query($connect, "UPDATE other_information SET nok_email='$nok_email', nok_name='$nok_name', nok_phone='$nok_phone', nok_address='$nok_address', matric_no='".$_SESSION['login']."'  WHERE matric_no='".$_SESSION['login']."' ");
            if($update) {
                header('location:profile.php');
                $_SESSION['msg']="Student Record inserted Successfully !!";
                
            }
            else {
                $_SESSION['msg']="Error : Student Record not update";
            }
        }

        // else insert into db
        else {
            $insert = mysqli_query($connect, "INSERT INTO other_information(nok_email, nok_name, nok_phone, nok_address, matric_no)
            VALUES('$nok_email', '$nok_name', '$nok_phone', '$nok_address', '".$_SESSION['login']."')");
    
            if($insert) {
                $_SESSION['msg']="Student Record inserted Successfully !!";
            }
            else {
                $_SESSION['msg']="Error : Student Record not update";
            }
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Tricia</title>
    <link rel="icon" type="image/png" sizes="860x900" href="assets/img/profilepic.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Tricia</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transactions.php"><i class="fas fa-user-circle"></i><span> Transactions</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="course-registration.php"><i class="fas fa-table"></i><span>Course Registration</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="course-history.php"><i class="fas fa-table"></i><span>Course History</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="result.php"><i class="fas fa-table"></i><span>Exam Result</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="accomodation.php"><i class="fas fa-table"></i><span>Accomodation</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
                    </li>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                <button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>

                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                    <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo htmlentities($_SESSION['sname']);?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <?php 
                    $sql = mysqli_query($connect, "SELECT * FROM students WHERE matric_no='".$_SESSION['login']."'");
                    $cnt=1;
                    while($row = mysqli_fetch_array($sql)){ 
                        ?>
                        
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">

                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <div class="form-group">
                                        <label class="form-label" for="picture">Student Photo  </label>
                                        <?php 
                                            $photo_result = mysqli_query($connect, "SELECT * FROM students WHERE matric_no='".$_SESSION['login']."' ");
                                            while($data = mysqli_fetch_array($photo_result)){

                                            
                                        ?>
                                        
                                        <img class="rounded-circle mb-3 mt-4" src="assets/img/avatars/avatar5.jpeg"> "studentphotos/<?php echo $data['photo'];?>" width="160" height="160">
                                        <?php } ?>

                                        
                                    </div>
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="upload">Upload New Photo  </label>

                                            <input type="file" class="form-control" id="photo" name="photo"  value="" />
                                            <input class="btn btn-primary btn-sm" type="submit" value="Change Photo" name="upload">
                                        </div> 
                                        <p><?php echo htmlentities($_SESSION['msg']); ?></p>
                                        
                                    </form>

                                    
                                    <!-- <img class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160"> -->


                                    
                                </div>
                            </div>
                            <a class="btn btn-primary btn-sm text-end d-none d-sm-inline-block" role="button" href="#">
                                <i class="fas fa-download fa-sm text-white-50"></i>&nbsp;Print Profile</a>
                        </div>

                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">

                                
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Academic Information</p>
                                        </div>
                                        <div class="card-body">

                                        
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="username"><strong>Registration Number</strong></label>
                                                            <input class="form-control" type="text" id="username" readonly name="matric_no" value="<?php echo htmlentities($_SESSION['login']);?>"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="email"><strong>Email Address</strong></label>
                                                        <input class="form-control" type="email" id="email" readonly  name="email" value="<?php echo htmlentities($row['email']);?>"></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="semester"><strong>Semester</strong><br></label>
                                                            <input class="form-control" type="text" id="first_name" name="semester" value="<?php echo htmlentities($_SESSION['semester']);?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="last_name"><strong>Name</strong></label>
                                                        <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo htmlentities($row['name']);?>" readonly></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <?php 
                                                        $level = $row['level'];
                                                        $sql = mysqli_query($connect, "SELECT * FROM levels WHERE id=$level ");
                                                        $cnt=1;
                                                        while($tow = mysqli_fetch_array($sql))
                                                        { ?>
                                                        <div class="mb-3"><label class="form-label" for="level"><strong>Level</strong><br></label><input class="form-control" type="text" id="level" name="level" value="<?php echo htmlentities($tow['level']);?>" readonly></div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col">
                                                        <?php 
                                                        $dept_name = $row['department'];
                                                        $sql = mysqli_query($connect, "SELECT * FROM departments WHERE id=$dept_name ");
                                                        $cnt=1;
                                                        while($tow = mysqli_fetch_array($sql))
                                                        { ?>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="department"><strong>Department</strong></label>
                                                            <input class="form-control" type="text" id="department" name="department" value="<?php echo htmlentities($tow['dept_name']);?>" readonly>
                                                        </div>
                                                        <?php } ?> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <?php 
                                                        $faculty = $row['faculty'];
                                                        $sql = mysqli_query($connect, "SELECT * FROM faculty WHERE id=$faculty ");
                                                        $cnt=1;
                                                        while($tow = mysqli_fetch_array($sql))
                                                        { ?>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="faculty"><strong>Faculty</strong></label>
                                                            <input class="form-control" type="text" id="faculty" name="faculty" value="<?php echo htmlentities($tow['faculty_name']);?>" readonly>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="entry-mode"><strong>Mode of entry</strong></label>
                                                            <input class="form-control" type="text" id="entry-mode" name="entry_mode" value="<?php echo htmlentities($row['entry_mode']);?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="jamb-no"><strong>DE/JAMB Number</strong></label>
                                                            <input class="form-control" type="text" id="entry_no" name="entry_no" value="<?php echo htmlentities($row['entry_no']);?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="session"><strong>Session</strong><br></label>
                                                            <input class="form-control" type="text" id="session" name="session" value="<?php echo htmlentities($_SESSION['session']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <!-- Next of Kin details section  -->
                                    
                                    
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Next of&nbsp;Kin/Emergency Contact&nbsp;</p>
                                            <span><?php echo htmlentities($_SESSION['msg']); ?></span>
                                        </div>

                                        <div class="card-body">
                                            <form method="post">
                                            
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nok_name"><strong>Next of Kin Name&nbsp;</strong></label>
                                                            <input class="form-control" type="text" id="nok_name" value="<?php echo htmlentities($nok_result['nok_name']); ?>" name="nok_name">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nok_email"><strong>Email Address</strong></label>
                                                            <input class="form-control" type="email" id="nok_email" value="<?php echo htmlentities($nok_result['nok_email']); ?>" name="nok_email">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="nok_phone"><strong>Phone</strong><br></label>
                                                            <input class="form-control" type="text" id="nok_phone" value="<?php echo htmlentities($nok_result['nok_phone']); ?>" name="nok_phone">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="nok_address"><strong>Address</strong></label>
                                                    <input class="form-control" type="text" id="nok_address" value="<?php echo htmlentities($nok_result['nok_address']); ?>" name="nok_address">
                                                </div>

                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="country">
                                                            <strong>Country</strong></label>
                                                        

                                                            <div class="dropdown">
                                                                <button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Select Country</button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">First Item</a>
                                                                    <a class="dropdown-item" href="#">Second Item</a>
                                                                    <a class="dropdown-item" href="#">Third Item</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="state"><strong>State</strong></label>
                                                        
                                                            <div class="dropdown">
                                                                <button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Select state</button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">First Item</a>
                                                                    <a class="dropdown-item" href="#">Second Item</a>
                                                                    <a class="dropdown-item" href="#">Third Item</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="city"><strong>LGA</strong></label>
                                                            <input class="form-control" type="text" id="city-1" placeholder="Select LGA.." name="city">
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="mb-3">
                                                    <input class="btn btn-primary" type="submit" value="Update Information" name="submit" >
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright">
                        <span>Copyright © Tricia 2022</span>
                    </div>
                </div>
            </footer>

        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
<?php } ?>