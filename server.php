<?php
session_start();
$_SESSION['user_email']= '$user_email';
$_SESSION['customer_id']= '$user_id';
$_SESSION['customer']= '$login_username';
$_SESSION['login_customer_id']= '$login_user_id';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// initializing variables
$user_name = "";
$user_email = "";
$user_mobile_no = "";
$login_username="";
$login_password="";
$errors = array(); 

include 'db-connection.php';

// REGISTER USER
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $user_name, $login_username, $login_password, $confirmpwd ;
    $login_username= $_POST['login_username'];
	$login_password=trim($_POST['login_password']);
	$confirmpwd=trim($_POST['confirmpwd']);
  
	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$user_name    =  e($_POST['user_name']);
    $user_email  =  e($_POST['user_email']);
	$user_mobile_no= e($_POST['user_mobile_no']);
	$login_username= e($_POST['login_username']);
	$login_password =  e($_POST['login_password']);
	$confirmpwd     =  e($_POST['confirmpwd']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  $query = "SELECT * FROM login WHERE login_username='$login_username'  LIMIT 1";
  $results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
		array_push($errors, "Already registered");}
        
		
  
  if (empty($user_name)) { array_push($errors, "Name is required"); }
  if (empty($login_password )) { array_push($errors, "Password is required"); }
  if ($login_password != $confirmpwd) {
	array_push($errors, "The two passwords do not match");
  }
   // Finally, register user if there are no errors in the form
  
	  
  	$login_password = ($login_password);//encrypt the password before saving in the database
   
	if (isset($_POST['login_rank'])) {
			$login_rank = e($_POST['login_rank']);
			$query = "INSERT INTO `login`(`login_username`, `login_password`, `login_rank`) 
  			          VALUES('$login_username', '$login_password','$login_rank')";
			mysqli_query($db, $query);				
					  
			$_SESSION['success']  = "New user successfully created!!";
			header('location: userdashboard.php');
			
		}else{
			$query =  "INSERT INTO `customer`(`customer_name`, `customer_email`, `customer_phone_no`)  
  			  VALUES('$user_name', '$user_email', '$user_mobile_no')";
					  
					  mysqli_query($db, $query);
					  if ($query)
					  {
					 
					  $user_id =$db->insert_id;
					  
					  $query = "INSERT INTO `login`(`login_username`, `login_password`, `login_rank`, `login_customer_id`) 

  			                    VALUES('$login_username', '$login_password', 'customer', '$user_id')";
			          mysqli_query($db, $query);	
					   
					  }  
	
		
			
			header('location: ../index.php');				
		}

}

// return user array from their id
function getUserById($login_id){
	global $db;
	$query = "SELECT * FROM login WHERE login_id=" . $login_id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

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
function isLoggedIn()
{
	if (isset($_SESSION['user_id'])) {
		return true;
	}else{
		return false;
	}
}
// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['customer']);
	header("location: index.php");

}
// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}
// lOGIN USER
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

		$query = "SELECT * FROM login WHERE login_user_name='$login_username' AND login_password='$login_password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or client
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['login_rank'] == 'admin') {

				$_SESSION['admin'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				
				header('location: dashboardadmin.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: userdashboard.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

?>
