<?php
session_start();

if ( isset($_SESSION['user']) && !empty($_GET) )
{
	require 'connection.php';

	$post_id = $stripped = str_replace(' ', '',$_GET['user_id']);
	$firstname = $_SESSION['user'];

	$query = "INSERT INTO `likes` (`post_id`,`user_id`) VALUES ($post_id,'$user_id')";

	mysqli_query($conn, $query);
}
?>