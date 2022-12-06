<?php
session_start();
error_reporting(0);
include 'includes/config.php';

if(strlen($_SESSION['alogin'])==0) {   
    header('location:admin-login.php');
}
else {
    


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Tricia</title>
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
                        <a class="nav-link active" href="manage-student.php" >
                            <i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="add-course.php">
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
                    <h3 class="text-dark mb-1">Manage Students</h3>
                    <font color="red" align="center"><?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?></font>

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="text-align: center;">Students</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">

                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Registration Number</th>
                                            <th>Student Name</th>
                                            <th>Department</th>
                                            <th>Level</th>
                                            <th>Faculty</th>
                                            <th>Entry Mode</th>
                                            <th>Entry No</th>
                                            <th>email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                    $query =  "SELECT students.matric_no, students.name, students.entry_mode, students.entry_no, students.email, levels.level, departments.dept_name, faculty.faculty_name
                                    FROM students
                                    INNER JOIN levels ON students.level=levels.id
                                    INNER JOIN departments ON students.department=departments.id
                                    INNER JOIN faculty ON students.faculty=faculty.id";
                                    $sql = mysqli_query($connect, $query);
                                    $cnt = 1;
                                    while($row = mysqli_fetch_array($sql))
                                    {
                                    ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo htmlentities($row['matric_no']);?></td>
                                            <td><?php echo htmlentities($row['name']);?></td>
                                            <td><?php echo htmlentities($row['dept_name']);?></td>
                                            <td><?php echo htmlentities($row['level']);?></td>
                                            <td><?php echo htmlentities($row['faculty_name']);?></td>
                                            <td><?php echo htmlentities($row['entry_mode']);?></td>
                                            <td><?php echo htmlentities($row['entry_no']);?></td>
                                            <td><?php echo htmlentities($row['email']);?></td>
                                            <td>
                                                <form method="post" action="delete.php">
                                                    <input type="hidden" name="matric_no" value="<?php echo htmlentities ($row['matric_no'])?>" >
                                                    <a href="manage-students.php?id=&del=delete" onClick="return confirm('Are you sure you want to delete?')">
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
</body>

</html>
<?php  }?>