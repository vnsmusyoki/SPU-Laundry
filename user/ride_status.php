<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.php';


     ?>
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
                                                <a class="js-acc-btn" href="#">User</a>
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
                    <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-40" style="background-color: #fff;padding:1rem .4rem;">

                                    <table class="table table-bordered" id="allunits">
                                        <thead>
                                   <tr>

<th>Approval Time</th>
<th>Driver</th>
<th>Driver Number</th>
<th>Departure</th>
<th>Amount</th>
<th>Destination</th>

</tr>
                                        </thead>

                                        <tbody>
                                            <?php
$conn = mysqli_connect("localhost", "root", "", "driver_booking");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

    $user = $_SESSION['user'];
                                        $check = "SELECT *  FROM `login` WHERE `login_user_name` = '$user' AND `login_rank` = 'user'";
                                        $query = mysqli_query($conn, $check);
                                        $rows = mysqli_num_rows($query);
                                        if ($rows >= 1) {
                                            while ($fetch = mysqli_fetch_assoc($query)) {
                                                $userid = $fetch['login_user_id'];
                                                global $userid;
                                            }
                                        }
                                        else{

                                            echo "login first";
                                        }


$sql = "SELECT * FROM `accepted_request` INNER JOIN request ON accepted_request.accepted_request_request_id=request.request_id INNER JOIN driver ON  accepted_request.accepted_request_driver_id=driver.driver_id INNER JOIN user ON  request.request_user_id=user.user_id  WHERE user_id=$userid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result ->fetch_assoc()) {



echo "<tr><td>". $row["accepted_request_datetime"]. "</td><td>". $row["driver_name"]. "</td><td>". $row["driver_mobile"]. "</td><td>". $row["request_source"]. "</td><td>".$row["request_amount"]. "</td><td>".$row["request_destination"];

}



echo "</table>";
}


$conn->close();
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021. All rights reserved. Designed by Jackson Ngacha.

</p>
                                </div>
                            </div>
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
<script>
$(document).ready(function() {
    $('#allunits').DataTable();
} );
</script>
</html>