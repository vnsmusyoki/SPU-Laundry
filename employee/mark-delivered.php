<?php
require 'customer-account.php';
?><?php

    $dietcheck = $_GET['id'];
    $delivered = "delivered";
    $queryorder = "SELECT * FROM    `delivery` WHERE `delivery_id`='$dietcheck'";
    $querydeliverorder = mysqli_query($conn, $queryorder);
    while ($fetchorder = mysqli_fetch_assoc($querydeliverorder)) {
        $ordercheckid = $fetchorder['delivery_order_id'];
        $checkproduct = "UPDATE `delivery` SET  `delivery_comments`='$delivered' WHERE `delivery_id` = '$dietcheck'";
        $querycheckproduct = mysqli_query($conn, $checkproduct);
        $ordercheck =  "UPDATE `customer_order` SET  `order_status`='$delivered' WHERE `order_id` = '$ordercheckid'";
        $querycheckproducts = mysqli_query($conn, $ordercheck);
        echo "<script>window.location.replace('assigned-deliveries.php');</script>";
    }
