<?php

session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$friend = $stripped = str_replace(' ', '',$_GET['firstname']);
	$my = $_SESSION['user'];

	$query = "INSERT INTO `friendship` (`user_name`,`friend`) VALUES ('$my','$friend'),('$friend','$my')";
	mysqli_query($conn, $query);
 	$query2 = "DELETE FROM `friend_request` WHERE `receiver` = '$my' AND `sender` ='$friendship'";

	if(mysqli_query($conn, $query2))
	{
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		// header( "location:home.php" );
	}
	else
	{
		echo "Error: " .  "<br>" . mysqli_error($conn);
		header("refresh:.9;url= home.php");
	}
	
}


?>