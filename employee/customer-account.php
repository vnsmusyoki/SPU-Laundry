<?php
session_start();
if (!isset($_SESSION['employee'])) {
    header('Location: ../index.php');
} else {
    $host = "localhost";
    $user = "root";
    $password="MyNewPassword";
    $dbname = "laundry";
    $conn = mysqli_connect($host, $user, $password, $dbname);
    $email = $_SESSION['employee'];
    $checkemail = "SELECT *  FROM `login` WHERE `login_username`= '$email' ";
    $queryemail = mysqli_query($conn, $checkemail);
    $checkemailrows = mysqli_num_rows($queryemail);
    if ($checkemailrows >= 1) {
        while ($fetch = mysqli_fetch_assoc($queryemail)) {
            $globalusername = $fetch['login_username'];
            $globalloggedinid = $fetch['login_id'];
            $memberid = $fetch['login_employee_id'];
            global $memberid;
             $checkclient = "SELECT *  FROM `employee` WHERE `employee_id`= '$memberid'";
            $queryemail = mysqli_query($conn, $checkclient);
            $checkclientrows = mysqli_num_rows($queryemail);
            if ($checkclientrows >= 1) {
                while ($fetchclient = mysqli_fetch_assoc($queryemail)) {
                    $globalmembername = $fetchclient['employee_name'];
                }
            }

            global $globalmembername;
            global $memberid;
            global $globalloggedinid;
        }
    }
}
