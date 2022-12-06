<?php
session_start();
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
    <title>Table - Brand</title>
    <link rel="icon" type="image/png" sizes="860x900" href="assets/img/profilepic.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>tricia</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="register.php"><i class="fas fa-user-circle"></i><span> Register</span></a>
                    <li class="nav-item"><a class="nav-link active" href="course-registration.php"><i class="fas fa-table"></i><span>Course Registration</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php"><i class="far fa-user-circle"></i><span>Logout</span></a></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">3+</span><i class="fas fa-bell fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">alerts center</h6>
                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-primary icon-circle"><i class="fas fa-file-alt text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 12, 2019</span>
                                                <p>A new monthly report is ready to download!</p>
                                            </div>
                                        </a>

                                        <a class="dropdown-item d-flex align-items-center" href="#">
                                            <div class="me-3">
                                                <div class="bg-success icon-circle"><i class="fas fa-donate text-white"></i></div>
                                            </div>
                                            <div><span class="small text-gray-500">December 7, 2019</span>
                                                <p>$290.29 has been deposited into your account!</p>
                                            </div>
                                        </a>
                                        
                                        <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>

                            <div class="d-none d-sm-block topbar-divider"></div>

                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">Valerie Luna</span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>



                <!-- Body starts here -->
                <div class="container-fluid">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="text-align: center;">Registered Course</p>
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
                                            <th>Signature</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
$sql = mysqli_query($connect, "SELECT registered_courses.course AS cid, courses.course_name AS courname, levels.level AS level, courses.course_code AS ccode, courses.unit AS unit
FROM registered_courses, courses, levels
-- JOIN course ON course.id=registred_courses.course
-- JOIN level ON level.id=registered_courses.level 
WHERE registered_courses.matric_no='".$_SESSION['login']."'");
$cnt = 1;
while($row = mysqli_fetch_array($sql))
{
?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['ccode']);?></td>
                                            <td><?php echo htmlentities($row['courname']);?></td>
                                            <td><?php echo htmlentities($row['ccode']);?></td>
                                            <td><?php echo htmlentities($row['unit']);?></td>
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
                                                    <div class="mb-3">
                                                        <form action="">
                                                            <input name="faculty" id="">
                                                            <?php 
                                                            $sql = mysqli_query($connect, "SELECT * FROM faculty");
                                                            while($row=mysqli_fetch_array($sql))
                                                            {
                                                            ?>
                                                        
                                                            <!-- <option name="faculty" selected="selected" value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['faculty_name']);?></option> -->
                                                             

                                                            </input>
                                                            <input type="submit" name="submit">  
                                                            <?php } ;
                                                            
                                                            if ($_POST['submit']){
                                                                $faculty = $_POST['faculty'];
                                                            
                                                            ?>
                                                            <div class="dropdown">
                                                                <select class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" name="dept" id="">
                                                                    <option value="">Choose dept..</option>
                                                                    <?php 
                                                                    $sql = mysqli_query($connect, "SELECT * FROM departments WHERE faculty=$faculty ");
                                                                    while($row=mysqli_fetch_array($sql))
                                                                    {
                                                                    ?>

                                                                    <option name value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['dept_name']);?></option>
                                                                    <?php } } ?>
                                                                </select>                                                    
                                                            </div>
                                                        </form>


                                                            <label class="form-label" for="country">
                                                            <strong>Faculty</strong></label>
                                                    </div>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button">Select Faculty</button>
                                                            <div class="dropdown-menu">
                                                            

                                                                <!-- <a class="dropdown-item" href="#">First Item</a> -->
                                                              <button type="button" name="faculty" value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['faculty_name']);?></option> </a>
                                                                
                                                            </div>
                                                        </div>

                                                </th>

                                                <th>
                                                    <div class="dropdown">

                                                        <select class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" name="dept" id="">
                                                                <!-- <option value="">Choose dept..</option> -->
                                                                <?php 
                                                                $sql = mysqli_query($connect, "SELECT * FROM departments WHERE faculty='faculty'");
                                                                while($row=mysqli_fetch_array($sql))
                                                                {
                                                                ?>

                                                                <option value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['dept_name']);?></option>
                                                                <?php } ?>
                                                            </select>                                                    
                                                    </div>
                                                    
                                                </th>
                                                <th>
                                                    <div class="dropdown">
                                                        <select class="btn btn-primary dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" type="button" name="level" id="">
                                                            <option value="">Select Level</option>
                                                            <?php 
                                                            $sql = mysqli_query($connect, "SELECT * FROM levels");
                                                            while($row=mysqli_fetch_array($sql))
                                                            {
                                                            ?>

                                                            <option value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['level']);?></option>
                                                            <?php } ?>
                                                        </select>                                                    
                                                    </div>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                                    

                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>
                                                
                                            </th>
                                            <th>
                                                
                                            </th>
                                            <th>
                                                
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql = mysqli_query($connect, "SELECT * FROM courses");
                                    $cnt = 1;
                                    while($row = mysqli_fetch_array($sql))
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['course_code']);?></td>
                                            <td><?php echo htmlentities($row['course_name']);?></td>
                                            <td><?php echo htmlentities($row['unit']);?></td>
                                            <td><button class="btn btn-primary" type="button">Add</button></td>
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