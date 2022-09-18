<?php
session_start();
if (!isset($_SESSION['student'])) {
    header('Location: index.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php'; ?>
</head>

<body>

    <body class="animsition">
        <div class="page-wrapper">
            <!-- HEADER MOBILE-->
            <header class="header-mobile d-block d-lg-none">
                <div class="header-mobile__bar">
                    <div class="container-fluid">
                        <div class="header-mobile-inner">
                            <a class="logo" href="dashboardadmin.php">
                                <img src="images/icon/logo.png" alt="CoolAdmin" />
                            </a>
                            <button class="hamburger hamburger--slider" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="navbar-mobile">
                    <div class="container-fluid">
                        <ul class="navbar-mobile__list list-unstyled">
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                        <li>
                                            <a href="dashboardadmin.php">Dashboard</a>
                                        </li>

                                    </ul>
                            </li>


                    </div>
                </nav>
            </header>
            <!-- END HEADER MOBILE-->

            <!-- MENU SIDEBAR-->
            <?php include 'sidebar.php'; ?>
            <!-- END MENU SIDEBAR-->

            <!-- PAGE CONTAINER-->
            <div class="page-container">
                <!-- HEADER DESKTOP-->
                <header class="header-desktop">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="header-wrap">

                                <div class="header-button">
                                    <div class="noti-wrap">


                                    </div>
                                    <div class="account-wrap" style="position:absolute;right:0;">
                                        <div class="account-item clearfix js-item-menu">

                                            <div class="content">
                                                <a class="js-acc-btn" href="#">STUDENT</a>
                                            </div>
                                            <div class="account-dropdown js-dropdown">



                                                <div class="account-dropdown__footer">
                                                    <a href="logout.php">
                                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- HEADER DESKTOP-->

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-xs-12 col-sm-1"></div>
                            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-10" style="background-color: white;padding:20px;">

                                <form action="" method="POST" class="visa">
                                    <center><span>Update Password</span></center>
                                    <hr>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputEmail3" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Confirm New Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputEmail3" name="cpassword">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-block text-light" name="updatepassword">Update Password</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['updatepassword'])) {
                                        include 'dbconnection.php';
                                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                                        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);

                                        $passlength = strlen($password);


                                        if (empty($password) || empty($cpassword)) {
                                            echo "<script>alert('provide required details');</script>";
                                        } else if ($password !== $cpassword) {
                                            echo "<script>alert('provide matching passwords');</script>";
                                        } else if ($passlength < 4 || $passlength > 8) {
                                            echo "<script>alert('password should have a minimum of 4 and a  maximum of 8 characters.');</script>";
                                        } else {
                                            $student = $_SESSION['student'];
                                            $newpassword = md5($password);
                                           $checkupdate = "UPDATE `login` SET `Login_password` = '$newpassword' WHERE `Login_username`='$student'";
                                           $query = mysqli_query($conn, $checkupdate);
                                            if($query){
                                                echo "<script>window.location.replace('studentdashboard.php?password=success');</script>"; 
                                            }else{
                                                echo "error occurred";
                                            }
                                        }
                                    }
                                    ?>
                                </form>
                            </div>
                            <div class="col-lg-3 col-md-3 col-xs-12 col-sm-1"></div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
                <!-- END PAGE CONTAINER-->
            </div>

        </div>

        <!-- Jquery JS-->
        <!-- <script src="vendor/jquery-3.2.1.min.js"></script> -->
        <?php include 'footer.php'; ?>

    </body>
</body>

</html>