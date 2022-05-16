<?php
$servername = "127.0.0.1"; // localhost
$username = "user";
$password = "";
$database = "friendbook";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Can't connect to database " . mysqli_connect_error());
}

echo "Connected to database server successfully </br>";

?>