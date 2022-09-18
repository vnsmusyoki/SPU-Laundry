<?php

$login_username = "";
$login_password   = "";
$errors = array();
include('errors.php');
$db = mysqli_connect('localhost', 'root', '', 'barcodes');

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}
// call the login() function if register_btn is clicked
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}
if (isset($_POST['login_bt'])) {
	login();
}
// LOGIN USER
function login(){
	global $db, $login_username, $errors;
	$login_password="";

	// grab form values
	$login_username = e($_POST['login_username']);
	$login_password = e($_POST['login_password']);

	// make sure form is filled properly
	if (empty($login_username)) {
		array_push($errors, "Username is required");
	}
	if (empty($login_password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$login_password = ($login_password);

		$query = "SELECT * FROM login WHERE Login_username='$login_username' AND Login_password='$login_password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or student
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['login_rank'] == 'admin') {

				$_SESSION['student'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				
				header('location: studentdashbord.php');		  
			}else{
				$_SESSION['admin'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: dashboardadmin.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>