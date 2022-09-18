<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['customer'])) {
    header('Location: index.php');
      $conn = mysqli_connect("localhost", "root", "", "laundry");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

   $customer = $_SESSION['customer'];


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

                                <form action="" method="POST" class="visa">
                                    <center><span>Add Payment Details</span></center>
                                    <hr>


                                     <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Enter Amount</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="inputEmail3" name="driver_mobile_no" value="">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Payment Method</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="driver_name" value="">
                                        </div>
                                    </div>
                                  
                                   <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Reference Code</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="driver_email" value="">
                                        </div>
                                    </div>
                                  <div class="form-group ">
                                      
                                        <select name="destination" id="" class="form-control">
                                            <option value="">Order paying for: </option>
                                            <?php
                                           $conn = mysqli_connect("localhost", "root", "", "laundry");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


                                            $customer = $_SESSION['customer'];



    $check = "SELECT *  FROM `login` WHERE `login_username` = '$customer' AND `login_rank` = 'customer'";
                                        $query = mysqli_query($conn, $check);
                                        $rows = mysqli_num_rows($query);
                                        if ($rows >= 1) {
                                            while ($fetch = mysqli_fetch_assoc($query)) {
                                                $customerid = $fetch['login_customer_id'];
                                                global $customerid;
                                            }
                                        }
                                       
                                            
$sql = "SELECT * FROM `customer_order` WHERE `order_customer_id` = $customerid";
$query = $conn->query($sql);
                                            while ($fetch = mysqli_fetch_assoc($query)) {
                                                $destinationname = $fetch['order_ref'];
                                                $destination_desc = $fetch['order_date'];
                                                global $destination_desc;
                                                echo "<option value='$destinationname'>" . $destinationname . "  ---(Date)--->  " . $destination_desc .  "</option>";
                                            }
                                            ?>
                                       </select>

                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary btn-block text-light" name="registerdriver">Add payment</button>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($_POST['registerdriver'])) {
                                        include 'connection.php';
                                        $driver_name = mysqli_real_escape_string($conn, $_POST['driver_name']);
                                        $driver_email = mysqli_real_escape_string($conn, $_POST['driver_email']);
                                         $driver_mobile_no = mysqli_real_escape_string($conn, $_POST['driver_mobile_no']);
                                         $destination = mysqli_real_escape_string($conn, $_POST['destination']);

                                        if (empty($driver_name) || empty($driver_email) || empty($driver_mobile_no)) {
                                            echo "<script>alert('provide required details');</script>";
                                        }else {

                                             $check = "SELECT *  FROM `customer_order` WHERE `order_ref` = '$destination'";
                                        $query = mysqli_query($conn, $check);
                                        $rows = mysqli_num_rows($query);
                                        if ($rows >= 1) {
                                            while ($fetch = mysqli_fetch_assoc($query)) {
                                                $accepted_request_id= $fetch['order_id'];
                                                                                           }
                                        }

                                            $insert = "INSERT INTO `payment`(`payment_amount`, `payment_mode`, `payment_ref`, `payment_order_id`)  VALUES('$driver_mobile_no', '$driver_name', '$driver_email', '$accepted_request_id')";
                                            $querys = mysqli_query($conn, $insert);
                                            if ($querys) {
                                                echo "<script>window.location.href='payment_history.php';</script>";
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
