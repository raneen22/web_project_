<?php
session_start();
require 'connection.php';
if (isset($_POST['user_name']) && isset($_POST['password'])){
    $userName = $_POST['user_name'];
    $userPassword = $_POST['password'];
    $query = "SELECT `user_id` FROM `user` WHERE `user_name` = '$userName' AND `password` = '$userPassword'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        echo "<br>"."Welcome  " . $userName;
    
        $_SESSION['user'] = $userName;
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['user']=$_POST['user_name'];

        }
        setcookie("user_name", $username, time() + 1000);

            header("location:home.php");
            
    } else {
        echo "Invalid user name or password!";
        header("location:login.php?error=1");    }
}


?>