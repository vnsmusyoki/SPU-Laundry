<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
         $id=$_SESSION['user'];

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
                                                <a class="js-acc-btn" href="#">user</a>
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
                                    <center><span>Add Car Details <?php  echo $id;?></span></center>
                                    <hr>
                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Registration Number</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="driver_name" value="<?php echo $names; ?>">
                                        </div>
                                    </div>
                                  
                                   <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Vehicle Model</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="driver_email" value="<?php echo $names; ?>">
                                        </div>
                                    </div>
                       

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-block text-light" name="registerdriver">Register Vehicle</button>
                                        </div>
                                    </div>
                                    <?php
                               
                                    if (isset($_POST['registerdriver'])) {
                                        include 'connection.php';
                                        $driver_name = mysqli_real_escape_string($conn, $_POST['driver_name']);
                                        $driver_email = mysqli_real_escape_string($conn, $_POST['driver_email']);
                                       
                                        if (empty($driver_name) || empty($driver_email)) {
                                            echo "<script>alert('provide required details');</script>";
                                        } else if (!preg_match("/^[a-zA-z ]*$/", $driver_ame)) {
                                            echo "<script>alert('provide required name details using letters only');</script>";
                                        } else {

                                            $insert = "INSERT INTO `car`(`car_model`, `car_reg_no`, `car_user_id`)  VALUES('$driver_email','$driver_name','$id')";
                                            $querys = mysqli_query($conn, $insert);
                                            if ($querys) {
                                                echo "<script>window.location.href='allvehicles.php';</script>";
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