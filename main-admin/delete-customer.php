<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['id'];
echo $checkproduct = "DELETE  FROM `customer` WHERE `customer_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) {
//     $checkproduct = "DELETE  FROM `login` WHERE `login_customer_id` = '$dietcheck'";
// $querycheckproduct = mysqli_query($conn, $checkproduct);

    echo "<script>window.location.replace('all-customers.php');</script>";
}