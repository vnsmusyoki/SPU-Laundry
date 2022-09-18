<?php
session_start();
if (!isset($_SESSION['customer'])) {
    header('Location: ../index.php');
} else {
    $host = "localhost";
    $user = "root";
    $password="MyNewPassword";
    $dbname = "laundry";
    $conn = mysqli_connect($host, $user, $password, $dbname);
    $email = $_SESSION['customer'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email' ";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];
            $memberid = $fetch['login_customer_id'];
            global $memberid;
             $checkclient = "SELECT *  FROM `customer` WHERE `customer_id`= '$memberid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchclient = mysqli_fetch_assoc($queryemail)) {
                    $globalmembername = $fetchclient['customer_name'];
                }
            }

            global $globalmembername;
            global $memberid;
            global $globalloggedinid;
        }
    }
}
