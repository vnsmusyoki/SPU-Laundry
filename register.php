<!DOCTYPE html>
<html>

<head>
	<title>Registration system</title>
	<link rel="stylesheet" href="styles.css">
</head>

<body>
	<div class="header">
		<h2>Registration form</h2>
	</div>
	<div class="main">
		<form method="post" autocomplete="off">
			<div class="input-group">
				<label>Full Names</label>
				<input type="text" name="user_name">
			</div>
			<div class="input-group">
				<label>User Email</label>
				<input type="text" name="user_email">



				<div class="input-group">
					<label>Mobile Number</label>
					<input type="text" name="user_mobile_no">
				</div>
				<div class="input-group">
					<label>Username</label>
					<input type="text" name="login_username">
				</div>

				<div class="input-group">
					<label>Password</label>
					<input type="password" name="login_password">
				</div>
				<div class="input-group">
					<label>Confirm password</label>
					<input type="password" name="confirmpwd">
				</div>
				<div class="input-group">
					<button type="submit" class="btn" name="register_btn">Register</button>
				</div>

				<p>
					Already a member? <a href="index.php">Sign in</a>
				</p>
			</div>
			<?php
			if (isset($_POST['register_btn'])) {
				include 'db-connection.php';
				$names  = mysqli_real_escape_string($conn, $_POST['user_name']);
				$email  = mysqli_real_escape_string($conn, $_POST['user_email']);
				$mobileno  = mysqli_real_escape_string($conn, $_POST['user_mobile_no']);
				$username  = mysqli_real_escape_string($conn, $_POST['login_username']);
				$password  = mysqli_real_escape_string($conn, $_POST['login_password']);
				$cpassword  = mysqli_real_escape_string($conn, $_POST['confirmpwd']);
				$phonelength = strlen($mobileno);
				$passlength = strlen($password);

				$usernamelength = strlen($username);
				if (empty($names) || empty($email) ||  empty($mobileno) ||  empty($username)) {
					echo "<script>alert('Provide all the details');</script>";
				} else if (!preg_match("/^[a-zA-z ]*$/", $names) || !preg_match("/^[a-zA-z0-9]*$/", $username)) {
					echo "<script>alert('provide correct full names or username');</script>";
				} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$msg = "Invalid email address";
				} else if ($phonelength !== 10) {
					echo "<script>alert('Mobile number should have only 10 digits');</script>";
				} else if ($usernamelength < 4) {
					echo "<script>alert('Username must have more than 4  digits or characters');</script>";
				} elseif($passlength < 4){
					
					echo "<script>alert('Password must have more than 4  digits or characters');</script>";
				}elseif($password !== $cpassword){
					
					echo "<script>alert('Password failed to match');</script>";
				}else {


					$checkuser = "SELECT * FROM `customer` WHERE `customer_name` = '$names' AND `customer_email` = '$email' AND `customer_phone_no`='$mobileno'";
					$queryuser = mysqli_query($conn, $checkuser);
					$userrows = mysqli_num_rows($queryuser);
					if ($userrows >= 1) {
						echo "<script>alert('user record Already exists');</script>";
					} else {
						$checkusername = "SELECT * FROM `login` WHERE `login_username` = '$username'";
						$queryusername = mysqli_query($conn, $checkusername);
						$usernamerows = mysqli_num_rows($queryusername);
						if ($usernamerows >= 1) {
							echo "<script>alert('Username Already exists ');</script>";
						} else {
							$checkphonenumber = "SELECT * FROM `customer` WHERE `customer_phone_no` = '$mobileno'";
							$queryphonenumber = mysqli_query($conn, $checkphonenumber);
							$phonenumberrows = mysqli_num_rows($queryphonenumber);
							if ($phonenumberrows >= 1) {
								echo "<script>alert('Mobile Number Already exists');</script>";
							} else {
								$insertuser = "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_phone_no`)  VALUES ('$names', '$email', '$mobileno')";
								$queryinsertuser = mysqli_query($conn, $insertuser);

								if ($queryinsertuser) {
									$lastid = mysqli_insert_id($conn);
									$password = md5($password);
									$insertlogin = "INSERT INTO `login`(`login_username`, `login_password`, `login_rank`, `login_customer_id`) VALUES ('$username', '$password', 'customer', '$lastid')";
									$querylogin = mysqli_query($conn, $insertlogin);
									// Simulate an HTTP redirect:
									echo "<script>window.location.replace('index.php');</script";
								}
							}
						}
					}
				}
			}

			?>
		</form>
</body>

</html>