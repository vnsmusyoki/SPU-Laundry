<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['id'];
$checkproduct = "DELETE  FROM `services` WHERE `service_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) { 
    echo "<script>window.location.replace('all-services.php');</script>";
}