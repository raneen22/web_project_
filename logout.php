<?php


if(isset($_COOKIE['username'])){
    setcookie("username", "", time() - 3600);
}
header("location:login.php");

?>