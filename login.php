<?php session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="styles.css?version=1">
</head>

<body background="./bus.jpg">
  <div class="header">
    <h2>Login</h2>
  </div>

  <form method="post" action="" autocomplete="off">
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="login_username">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="login_password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_btn">Login</button>
    </div>
    <p>
      Not yet registered? Register as:<a href="register.php">Customer</a>
    </p>
  </form>
  <?php
  if (isset($_POST['login_btn'])) {
    include 'db-connection.php';
    $username = mysqli_real_escape_string($conn, $_POST['login_username']);
    $password = mysqli_real_escape_string($conn, $_POST['login_password']);

    if (empty($username) || empty($password)) {
      echo "<script>alert('provide required details');</script>";
    } else {
      $newpassword = md5($password);
      $check = "SELECT *  FROM `login` WHERE `login_username` = '$username'";
      $query = mysqli_query($conn, $check);
      $rows = mysqli_num_rows($query);
      if ($rows >= 1) {
        while ($fetch = mysqli_fetch_assoc($query)) {
          $dbpassword = $fetch['login_password'];
          $rank = $fetch['login_rank'];
          if ($newpassword == $dbpassword) {
            if ($rank == "employee") {
              $_SESSION['employee'] = $username;
              echo "<script>window.location.replace('employee/index.php');</script>";
            } elseif ($rank == "customer") {
              $_SESSION['customer'] = $username;
              echo "<script>window.location.replace('customer/index.php');</script>";
            } else {
              $_SESSION['username'] = $username;
              echo "<script>window.location.replace('main-admin/index.php');</script>";
            }
          } else {
            echo "<script>alert('Please check your details');</script>";
          }
        }
      } else {
        echo "<script>alert('Details not found');</script>";
      }
    }
  }
  ?>
</body>

</html>