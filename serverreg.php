<?php
session_start();
require 'dbconnect.php';

$user_name = "user_name";
$email    = "email";
$password    = "password";
$tel    = "tel";
$address    = "address";
$fname    = "fname";
$lname    = "lname";
$gender    = "gender";
$image    = "image";


$errors = array(); 

// $db = mysqli_connect('localhost', 'root', '', 'user');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $user_name = mysqli_real_escape_string($db, $_POST['user_name']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $tel = mysqli_real_escape_string($db, $_POST['tel']);
  $address = mysqli_real_escape_string($db, $_POST['address']);
  $fname = mysqli_real_escape_string($db, $_POST['fname']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $image = mysqli_real_escape_string($db, $_POST['image']);


  if (empty($user_name)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }
  if (empty($tel)) { array_push($errors, "Phone number is required"); }
  if (empty($fname)) { array_push($errors, "First name is required"); }
  if (empty($lname)) { array_push($errors, "Second name is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($image)) { array_push($errors, "Image is required"); }
  if (empty($address)) { array_push($errors, "Address is required"); }

  // if ($password_1 != $password_2) {
	// array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE user_name='$user_name' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['user_name'] === $user_name) {
      array_push($errors, "User name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password);

  	$query = "INSERT INTO user (user_name, email, password,phone, address, fName,lName, gender, image) 
  			  VALUES('$user_name', '$email', '$password','$tel', '$address', '$fname','$lname', '$gender', '$image')";
  	mysqli_query($conn, $query);
  	$_SESSION['use_rname'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  };

?>

