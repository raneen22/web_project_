<?php
$servername = "localhost"; // localhost
$username = "root";
$password = "";
$database = "friendsbook";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Can't connect to database " . mysqli_connect_error());
}

// echo "Connected to database server successfully </br>";

?>
