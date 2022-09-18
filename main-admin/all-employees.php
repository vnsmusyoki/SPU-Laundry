<?php
include 'admin-account.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laundry Admin - All Customers</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'sidebar.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="title-1 m-b-25">All employees</h2>
                            <a href="create-employee.php" class="btn btn-primary">Register New Employee</a>
                            <div class="table-responsive table--no-card m-b-40" style="background-color: #fff;padding:1rem .4rem;">
                                <table class="table table-bordered" id="allunits">
                                    <thead>
                                        <tr>

                                            <th>Employee Name</th>
                                            <th>employee email </th>
                                            <th>employee contact </th>
                                            <!-- <th>Employee Username</th> -->
                                            <th class="text-right">Edit</th>
                                            <th class="text-right">Delete</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    //     include 'db-connection.php';
                                    //     $data = "SELECT * FROM `employee`";
                                    //     $query = mysqli_query($conn, $data);
                                    //  $checkros = mysqli_num_rows($query);
                                    //     while ($fetch = mysqli_fetch_assoc($query)) {
                                    //         $id = $fetch['employee_id'];
                                    //         $employeename = $fetch['employee_name'];
                                    //         $employee_email = $fetch['employee_email'];
                                    //         $employee_mobile = $fetch['employee_phone_no'];
                                    //         $data = "SELECT * FROM `login` WHERE `login_employee_id` = '$id'";
                                    //         $query = mysqli_query($conn, $data);
                                    //         while ($fetch = mysqli_fetch_assoc($query)) {
                                    //             $loginusername = $fetch['login_username'];
                                    //         }
                                    //         echo "
                                    //             <tr>
                                                   
                                    //                 <td>$employeename</td>
                                    //                 <td>$employee_email</td> 
                                    //                  <td>$employee_mobile</td> 
                                    //                  <td>$loginusername</td> 
                                    //                 <td><a href='edit_employee.php?id=$id' class='btn btn-primary btn-block'>edit</td>
                                    //                 <td><a href='delete-employee.php?id=$id' class='btn btn-danger btn-block'>delete</td>
                                    //             </tr>
                                    //         ";
                                    //     }
                                        include 'db-connection.php';
                                        $data = "SELECT * FROM `employee`";
                                        $query = mysqli_query($conn, $data);
                                        while ($fetch = mysqli_fetch_assoc($query)) {
                                            $id = $fetch['employee_id'];
                                            $employeename = $fetch['employee_name'];
                                            $employee_email = $fetch['employee_email'];
                                            $employee_mobile = $fetch['employee_phone_no'];
                                            // $data = "SELECT * FROM `login` WHERE `login_employee_id` = '$id'";
                                            //         $query = mysqli_query($conn, $data);
                                            //         while ($fetchs = mysqli_fetch_assoc($query)) {
                                            //             $loginusername = $fetchs['login_username'];
                                            //         }
                                            echo "
                                            <tr>
                                               
                                                <td>$employeename</td>
                                                <td>$employee_email</td> 
                                                 <td>$employee_mobile</td> 
                                              
                                                 <td><a href='edit_employee.php?id=$id' class='btn btn-primary btn-block'>edit</td>
                                                 <td><a href='delete-employee.php?id=$id' class='btn btn-danger btn-block'>delete</td>
                                            </tr>
                                        ";
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Laundry Website 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>