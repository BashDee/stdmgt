<?php
session_start();

error_reporting(0);
include 'includes/config.php';

if(strlen($_SESSION['login'])==0) {   
    header('location:login.php');
}
else {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Course Registration - Tricia</title>
    <link rel="icon" type="image/png" sizes="860x900" href="assets/img/profilepic.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Tricia</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php">
                        <i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="transactions.php">
                        <i class="fas fa-user-circle"></i><span> Transactions</span></a>
                    <li class="nav-item">
                        <a class="nav-link active" href="course-registration.php"><i class="fas fa-table"></i><span>Course Registration</span></a>
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
                            
                            <div class="d-none d-sm-block topbar-divider"></div>

                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo htmlentities ($_SESSION['sname']); ?></span>
                                        <img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg">
                                    </a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>



                <!-- Body starts here -->
                <div class="container-fluid">

                    <div class="card shadow mb-3">
                        <?php $sql = mysqli_query($connect, "SELECT * FROM students WHERE matric_no='".$_SESSION['login']."'");
                        $cnt=1;
                        while($row = mysqli_fetch_array($sql))
                        { ?>
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Academic Information</p>
                        </div>
                        <div class="card-body">

                            <form>
                                <div class="row">

                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="username"><strong>Registration Number</strong></label>
                                            <input class="form-control" type="text" id="username" readonly name="matric_no" value="<?php echo htmlentities($_SESSION['login']);?>">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email"><strong>Email Address</strong></label>
                                            <input class="form-control" type="email" id="email" readonly  name="email" value="<?php echo htmlentities($row['email']);?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <?php 
                                        $sql = mysqli_query($connect, "SELECT * FROM semesters WHERE status=1 ");
                                        $cnt=1;
                                        while($sow = mysqli_fetch_array($sql))
                                        { ?>
                                        <div class="mb-3">
                                            <label class="form-label" for="semester"><strong>Semester</strong><br></label>
                                            <input class="form-control" type="text" id="semester" name="semester" value="<?php echo htmlentities($sow['semester']);?>" readonly>
                                        </div>
                                        <?php } ?>
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="last_name"><strong>First name</strong></label>
                                            <input class="form-control" type="text" id="last_name" name="last_name" value="<?php echo htmlentities($row['name']);?>" readonly>
                                        </div>
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
                                        <div class="mb-3">
                                            <label class="form-label" for="level"><strong>Level</strong><br></label>
                                            <input class="form-control" type="text" id="level" name="level" value="<?php echo htmlentities($tow['level']);?>" readonly>
                                        </div>
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
                                            <input class="form-control" type="text" id="entry-no" name="entry_no" value="<?php echo htmlentities($row['entry_no']);?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <?php 
                                        $sql = mysqli_query($connect, "SELECT * FROM sessions WHERE status=1 ");
                                        $cnt=1;
                                        while($row = mysqli_fetch_array($sql))
                                        { ?>
                                        <div class="mb-3">
                                            <label class="form-label" for="session"><strong>Session</strong><br></label>
                                            <input class="form-control" type="text" id="session" name="session" value="<?php echo htmlentities($row['session']);?>">
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <?php } ?>
                    </div>
                    


                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="text-align: center;">Registered Course</p>
                            <p><?php echo htmlentities ($_SESSION['errmsg'])?></p>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course code</th>
                                            <th>Course title</th>
                                            <th>Unit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $sql = mysqli_query($connect, "SELECT * FROM display_courses WHERE matric_no='".$_SESSION['login']."' AND semester= '".$_SESSION['semester']."' AND session='".$_SESSION['session']."' ");
                                        $cnt = 1;
                                        while($row = mysqli_fetch_array($sql))
                                        {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['course_code']);?></td>
                                            <td><?php echo htmlentities($row['course_name']);?></td>
                                            <td><?php echo htmlentities($row['unit']);?></td>
                                            <td>
                                                <form method="post" action="drop-course.php">
                                                    <input type="hidden" name="course_code" value="<?php echo htmlentities ($tow['course_code'])?>" >
                                                    <a href="drop-course.php?id=&del=delete" onClick="">
                                                        <button type="submit" id="del" name="del" class="btn btn-primary">Add</button>
                                                    </a>
                                                </form> 
                                                <button class="btn btn-danger" type="button">Drop</button></td>
                                        </tr>
                                        

                                        <?php $cnt++; } ?>

                                    </tbody>
                                    <tfoot>

                                    

                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                            <button class="btn btn-primary active text-center d-xl-flex justify-content-xl-center" type="button" style="text-align: center;">Print</button>
                        </div>
                    </div>


                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="text-align: center;">Choose Courses</p>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                
                                                    

                                
                                
                                    <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                
                                            </th>
                                            <th>
                                                
                                            </th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = mysqli_query($connect, "SELECT * FROM courses WHERE semester='".$_SESSION['semester']."' ");
                                    $cnt = 1;
                                    while($tow = mysqli_fetch_array($sql))
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($tow['course_code']);?></td>
                                            <td><?php echo htmlentities($tow['course_name']);?></td>
                                            <td><?php echo htmlentities($tow['unit']);?></td>
                                            <td>
                                                <form method="post" action="select-course.php">
                                                    <input type="hidden" name="course_code" value="<?php echo htmlentities ($tow['course_code'])?>" >
                                                    <a href="select-course.php?id=&del=delete" onClick="">
                                                        <button type="submit" id="del" name="del" class="btn btn-primary">Add</button>
                                                    </a>
                                                </form>                                            
                                            </td>
                                        </tr>

                                        <?php $cnt++; } ?>
                                        
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Tricia 2022</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
<?php } ?>