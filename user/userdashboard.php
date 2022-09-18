<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['customer'])) {
    header('Location: index.php');
}
if(isset($_GET['password']))
{
     

    echo "<script>alert('Password has been updated successfully. it will be used from your next login.');</script>";
}
?>
<?php
$conn = mysqli_connect("localhost", "root", "", "laundry");
$customer = $_SESSION['customer'];

$check = "SELECT * FROM `login` WHERE `login_username` = '$customer' AND `login_rank` = 'customer'";
$query = mysqli_query($conn, $check);
$rows = mysqli_num_rows($query);


if ($rows >= 1) {
    while ($fetch = mysqli_fetch_assoc($query)) {
        $customerid = $fetch['login_customer_id'];
        global $customerid;
    }
    $data = "SELECT * FROM `customer` WHERE customer_id= '$customerid'";
    $quer = mysqli_query($conn, $data);
    while ($fetch = mysqli_fetch_assoc($quer)) {
        $globalnames = $fetch['customer_name'];
        $globalemail = $fetch['customer_email'];
        $globalmobile = $fetch['customer_phone_no'];
       

        global $globalnames;
        global $globalemail;
        global $globalmobile;
       
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
                                <img src="images/icon/o.jpg" alt="CoolAdmin" />
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
                                                <a class="js-acc-btn" href="customerdashboard.php">Customer</a>
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
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">Dashboard</h2>

                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                              
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-calendar-note"></i>
                                                </div>
                                                <div class="text">
                                                    <h2><?php  ?></h2>
                                                    <span></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-12" style="background-color:#fff;padding:2rem 1rem;">
                                    <h2 class="title-1 m-b-25">customer Details</h2>
                                    <hr>
                                    <div class="table-responsive  m-b-40">
                                        <table class="table table-bordered table-stripped">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Content</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><?php echo $globalnames; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><?php echo $globalemail; ?></td>

                                                </tr>
                                                <tr>
                                                    <td>Contact</td>
                                                    <td><?php echo $globalmobile; ?></td>

                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © 2021. All rights reserved. Designed by Dennis.</p>
                                    </div>
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

</html>