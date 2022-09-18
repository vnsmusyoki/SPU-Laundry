<!DOCTYPE html>
<html lang="en">

<head>
   <?php include 'header.php'; ?>

</head>

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
                        
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
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
                                            <a class="js-acc-btn" href="#">ADMIN</a>
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
                                                <th>Vehicle Regitration</th>
                                                <th>Color</th>
                                                <th>Charges </th>  
                                          
                                            </tr>
                                        </thead>
                                        <tbody>
                            <?php
                               $conn = mysqli_connect("localhost", "root", "", "vehicle_booking");
                                    $data = "SELECT * FROM `vehicles`";
                                    $query = mysqli_query($conn, $data);
                                    while($fetch = mysqli_fetch_assoc($query)){
                                        $id = $fetch['vehicle_reg'];
                                        $unitname = $fetch['vehicle_color'];
                                        $unitcode = $fetch['vehicle_charges']; 

                                        echo "
                                            <tr>
                                                <td>$id</td>
                                                <td>$unitcode</td>
                                                <td>$unitname</td> 
                                                  </tr>
                                        ";
                                    }
                                ?>
                                             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2021. All rights reserved. Designed by Jackson Ngacha.</p>
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
                                <?php  include 'footer.php'; ?>

</body>
<script>
$(document).ready(function() {
    $('#allunits').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    });
} );

</script>
</html>
<!-- end document-->
