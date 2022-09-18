<?php
require'admin-account.php';
?><?php

$dietcheck = $_GET['id'];
$checkproduct = "DELETE  FROM `employee` WHERE `employee_id` = '$dietcheck'";
$querycheckproduct = mysqli_query($conn, $checkproduct);
if ($querycheckproduct) { 
    echo "<script>window.location.replace('all-employees.php');</script>";
}