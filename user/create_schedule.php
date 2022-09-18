<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['customer'])) {
    header('Location: index.php');
}

 $customer = $_SESSION['customer'];
                             $conn = mysqli_connect("localhost", "root", "", "laundry");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
  $check = "SELECT *  FROM `login` WHERE `login_username` = '$customer' AND `login_rank` = 'customer'";
                                        $query = mysqli_query($conn, $check);
                                        $rows = mysqli_num_rows($query);
                                        if ($rows >= 1) {
                                            while ($fetch = mysqli_fetch_assoc($query)) {
                                                $customerid = $fetch['login_customer_id'];
                                                global $customerid;
                                            }
                                        }
                                        else{

                                            echo "login first";
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
                                                <a class="js-acc-btn" href="#">Customer</a>
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
                                <form action="" method="post">
                                    <p>
                                        <br>
                                    <p>Please  Enter Order Details.</p>
                                   <br>
                                   <br>
                                    </p>


<div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Order Reference</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="destina" value="">
                                        </div>
                                    </div>




                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="destina_desc" value="">
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Delivery Required</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="budget" value="">
                                        </div>
                                    </div>


                                    <input type="submit" class="btn btn-primary" name="registerdestination" value="Proceed">

                                </form>
                                <?php
                                ini_set('display_errors', 1); 
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
                                if (isset($_POST['registerdestination'])) {
                                    include 'connection.php';

                                     $destina = mysqli_real_escape_string($conn, $_POST['destina']);
                                    $destina_desc = mysqli_real_escape_string($conn, $_POST['destina_desc']);
                                    $budget = mysqli_real_escape_string($conn, $_POST['budget']);
                                  if (empty($destina) || empty($destina_desc ) || empty($budget )) {
                                        echo "<script>alert('provide required details');</script>";
                                    } else {

                                                                              
                                            $insert ="INSERT INTO `customer_order`(`order_ref`, `order_delivery_required`, `order_delivery_location`, `order_customer_id`)    
                                VALUES('$destina', '$destina_desc', '$budget', '$customerid')";
                                            $querys = mysqli_query($conn, $insert);
                                            if ($querys) {
                                                echo "<script>window.location.href='userdashboard.php';</script>";
                                            }
                                        }
                                    }
                                    
                                
                                ?>
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
</html>