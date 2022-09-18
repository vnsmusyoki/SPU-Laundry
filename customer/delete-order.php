<?php
require'customer-account.php';
?><?php

$dietcheck = $_GET['id'];
$checkproduct = "DELETE  FROM `customer_order` WHERE `order_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) { 
    echo "<script>window.location.replace('index.php');</script>";
}