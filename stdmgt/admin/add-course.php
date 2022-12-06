<?php
session_start();
error_reporting(0);
include 'includes/config.php';

if(strlen($_SESSION['alogin'])==0) {   
    header('location:admin-login.php');
}
else {
    if (isset($_POST['submit'])) {
        
        $course_code = $_POST['ccode'];
        $course_title = $_POST['ctitle'];
        $unit = $_POST['unit'];
        $level = $_POST['level'];
        $dept = $_POST['dept'];
        $semester = $_POST['semester'];
        $query = mysqli_query($connect, "INSERT INTO courses(course_name, course_code, unit, level, department, semester) 
        VALUES('$course_title', '$course_code', '$unit', '$level', '$dept', '$semester')");

        if($query) {
            $_SESSION['msg']="Course Registered Successfully !!";
        }
        else {
            $_SESSION['msg']="Error : Course  not Register";
                
        }
    }

    


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add Course - Tricia</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="icon" type="image/png" sizes="860x900" href="../assets/img/profilepic.png">

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
                        <a class="nav-link" href="manage-student.php" >
                            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="add-course.php">
                            <i class="fas fa-user"></i><span>Add Course</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="session.php">
                            <i class="fas fa-table"></i><span>Manage Session</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="add-dept.php">
                            <i class="fas fa-table"></i><span>Add Department</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin-login.php">
                            <i class="far fa-user-circle"></i><span>Login</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="register-student.php">
                            <i class="fas fa-user-circle"></i><span>Register Student</span>
                        </a>
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
                                <input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..."><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                        </form>

                        <ul class="navbar-nav flex-nowrap ms-auto">
                            
                            <div class="d-none d-sm-block topbar-divider"></div>

                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small"><?php echo htmlentities($_SESSION['alogin']);?></span>
                                        <img class="border rounded-circle img-profile" src="../assets/img/avatars/avatar1.jpeg">
                                    </a>

                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="#"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Activity log</a>

                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>


                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Add Course</h3>

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="text-align: center;">Courses</p>
                        </div>

                        <div class="card-body">

                            <!-- alert section starts -->
                            <font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
                            <!-- alert section ends -->

                                <div class="panel-body">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <input class="form-control" type="text" id="ccode" onBlur="userAvailability()" name="ccode" placeholder= "Course code" required maxlength="7" />
                                                    <span id="user-availability-status1" style="font-size:12px;">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="mb-3">
                                                    <input class="form-control"  type="text" name="ctitle" placeholder= "Course title">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <select class="btn btn-primary dropdown-toggle" name="unit" id="unit">
                                                        <option value="">Select Unit</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="mb-3">
                                                    <select class="btn btn-primary dropdown-toggle" name="level" id="level">
                                                        <option value="department">Select Level..</option>
                                                        <?php 
                                                        $sql = mysqli_query($connect, "SELECT * FROM levels ");
                                                        while($row=mysqli_fetch_array($sql)) {
                                                        ?>

                                                        <option id="dept" name="dept" value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['level']);?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <select class="btn btn-primary dropdown-toggle" name="dept" id="dept">
                                                        <option value="department">Select Dept..</option>
                                                        <?php 
                                                        $sql = mysqli_query($connect, "SELECT * FROM departments ");
                                                        while($row=mysqli_fetch_array($sql)) {
                                                        ?>

                                                        <option id="dept" name="dept" value="<?php echo htmlentities($row['id']);?> "> <?php echo htmlentities($row['dept_name']);?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="mb-3">
                                                    <select class="btn btn-primary dropdown-toggle" name="semester" id="semester">
                                                        <option value="department">Select Semester..</option>
                                                        <?php 
                                                        $sql = mysqli_query($connect, "SELECT * FROM semesters ");
                                                        while($row=mysqli_fetch_array($sql)) {
                                                        ?>

                                                        <option id="semester" name="semester" value="<?php echo htmlentities($row['semester']);?> "> <?php echo htmlentities($row['semester']);?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" name="submit" id="submit" class="btn-primary btn btn-user w-100">Submit</button>


                                    </form>



                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Course Code</th>
                                            <th>Coure Title</th>
                                            <th>Unit</th>
                                            <th>Level</th>
                                            <th>Department</th>
                                            <th>Semester</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $query = "SELECT courses.course_code, courses.course_name, courses.unit, levels.level,
                                        departments.dept_name, semesters.semester
                                        FROM courses
                                        INNER JOIN levels ON courses.level=levels.id
                                        INNER JOIN departments ON courses.department=departments.id
                                        INNER JOIN semesters ON courses.semester=semesters.semester";
                                        $sql = mysqli_query($connect, $query);
                                        $cnt = 1;
                                        while($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['course_code']);?></td>
                                            <td><?php echo htmlentities($row['course_name']);?></td>
                                            <td><?php echo htmlentities($row['unit']);?></td>
                                            <td><?php echo htmlentities($row['level']);?></td>
                                            <td><?php echo htmlentities($row['dept_name']);?></td>
                                            <td><?php echo htmlentities($row['semester']);?></td>
                                            <td>
                                                <form method="post" action="delete-course.php">
                                                    <input type="hidden" name="course_code" value="<?php echo htmlentities ($row['course_code'])?>" >
                                                    <a href="add-course.php?id=&del=delete" onClick="return confirm('Are you sure you want to delete?')">
                                                        <button type="submit" id="del" name="del" class="btn btn-danger">Delete</button>
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
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script>
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check-availability.php",
                data:'code='+$("#ccode").val(),
                type: "POST",
                success:function(data){
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error:function (){}
            });
        }
    </script>
</body>

</html>
<?php  }?>