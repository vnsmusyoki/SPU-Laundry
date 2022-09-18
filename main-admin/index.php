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

    <title>Laundry Admin - All Orders</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

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
                            <h2 class="title-1 m-b-25">New  Orders</h2> 
                            <div class="table-responsive table--no-card m-b-40" style="background-color: #fff;padding:1rem .4rem;">
                            <table class="table table-bordered" id="example">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Order Ref</th>
                                            <th>Date Placed</th>
                                            <th>Item Ordered </th>
                                            <th>Total Amount </th>
                                            <th>Pick Station</th>
                                            <th>Trans Code</th>  

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'db-connection.php';

                                        $data = "SELECT * FROM `customer_order` WHERE `order_status`='pending'";
                                        $query = mysqli_query($conn, $data);
                                   $totalorders = mysqli_num_rows($query);
                                        while ($fetch = mysqli_fetch_assoc($query)) {
                                            $customerid = $fetch['order_customer_id'];
                                            $orderid = $fetch['order_id'];
                                            $orderref = $fetch['order_ref'];
                                            $orderdate = $fetch['order_date'];
                                            $ordertown = $fetch['order_delivery_required'];
                                            $itemdata = "SELECT * FROM `customer_order_items` WHERE `item_order_id`='$orderid'";
                                            $queryitemdata = mysqli_query($conn, $itemdata);
                                            while ($queryfetch = mysqli_fetch_assoc($queryitemdata)) {
                                        $comments = $queryfetch['item_comments'];
                                            }
                                            $customerdata = "SELECT * FROM `customer` WHERE `customer_id`='$customerid'";
                                            $querycustomerdata= mysqli_query($conn, $customerdata);
                                            while ($queryfcustomerdatafetch = mysqli_fetch_assoc($querycustomerdata)) {
                                                $customerprofile = $queryfcustomerdatafetch['customer_name'];
                                            }
                                            $paydata = "SELECT * FROM `payment` WHERE `payment_order_id`='$orderid'";
                                            $querypay = mysqli_query($conn, $paydata);
                                            while ($queryfetch = mysqli_fetch_assoc($querypay)) {
                                                $payment = $queryfetch['payment_amount'];
                                                $paycode = $queryfetch['payment_ref'];

                                                echo "
                                                <tr>
                                                <td>$customerprofile</td>
                                                <td>$orderref</td>
                                                <td>$orderdate</td>
                                                <td>$comments</td> 
                                                 <td>KES $payment</td> 
                                                 <td>$ordertown</td> 
                                                 <td class='text-uppercase'>$paycode</td> 
 
                                            </tr>
                                                ";
                                            }
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
    <!-- End custom js for this page -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script>
</html>