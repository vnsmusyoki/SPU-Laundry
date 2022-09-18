<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}
if(isset($_GET['print'] )){
    echo "<script>alert('You have to select exactly 2  destinations on offer');</script>";
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
                                <form action="" method="post">
                                    <p>
                                        <br>
                                    <p>Please  Register Travel Details below.</p>
                                   <Br>
                                    </p>
                                    <div class="form-group ">
                                      
                                        <select name="destination" id="" class="form-control">
                                            <option value="">Click to Choose Destination </option>
                                            <?php
                                            include 'dbconnection.php';
                                            $data = "SELECT * FROM `schedule`";
                                            $query = mysqli_query($conn, $data);
                                            while ($fetch = mysqli_fetch_assoc($query)) {
                                                $destinationname = $fetch['schedule_destination'];
                                                $destination_desc = $fetch['schedule_destination_description'];
                                                global $destination_desc;
                                                echo "<option value='$destinationname'>" . $destinationname . "  ---(Destination Description)---  " . $destination_desc .  "</option>";
                                            }
                                            ?>
                                       </select>

                                    </div>

                                    <input type="submit" class="btn btn-primary" name="registerdestination" value="Book">

                                </form>
                                <?php
                                ini_set('display_errors', 1); 
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
                                if (isset($_POST['registerdestination'])) {
                                    include 'dbconnection.php';
                                    $destination = mysqli_real_escape_string($conn, $_POST['destination']);
                                                                      

                                    if (empty($destination)) {
                                        echo "<script>alert('provide required details');</script>";
                                    } else {

                                        $data = "SELECT * FROM `schedule` WHERE `schedule_destination`='$destination'";
                                        $query = mysqli_query($conn, $data);
                                        while ($fetch = mysqli_fetch_assoc($query)) {
                                            $destinationnames = $fetch['schedule_destination'];
                                            $destination_descs = $fetch['schedule_destination_description'];
                                            $scheduleids = $fetch['schedule_id'];
                                            global $destinationnames;
                                            global $destinationcodes;
                                            global $scheduleids;
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
                             
                                            $insert = "INSERT INTO `booking`(`booking_destination`, `booking_user_id`, `booking_schedule_id`)  
                                            VALUES ('$destinationnames', '$userid', '$scheduleids')";
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
        <?php include 'footer.php'; 
?>

    </body>
</body>

</html>