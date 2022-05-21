<?php
session_start();
require 'dbconnect.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<?php
 


  ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <style>
p {
  color: black ;
  text-indent: 30px;
}
</style>
</head>


<body>

<div id="navwrapper">
   <div id="navbar">
     <div>  
         <form action="checklogin.php" method="POST">

      <table class="tablewrapper">

         <tr> 
       


         <tr>
            <td><input  type="text" name="username" class="inputtext"  placeholder="Enter username" required>
            </td>


            <td><input  type="password" name="password" class="inputtext"   id="userPassword" name="user_password"  placeholder="Enter your  password" required>

            </td>
            
         </tr>
     
         <tr>
            
            <td>

             
               <div class="row2"><input type="checkbox" checked>Keep me logged in</div>
            </td>
            <td class="row2 h">Forgot your password?</td>
      </table>
      <h1 class="logowrapper">friendbook</h1>
   </div>
</div>
<div id="contentwrapper">
   <div id="content">
      <div id="leftbod">
         <div class="connect bolder">
              Connect with friends and the
                    <div class="connect bolder">

            world around you on Facebook 
            Facebook Video Chatting <br>

              and more ...
</div>


         </div>
         <div class="leftbar">
            <img src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2365-6/851565_602269956474188_918638970_n.png" alt="" class="iconwrap fb1"/>
            <div class="fb1">
               <span class="rowtext">See photos and updates</span>
               <span class="rowtext2 fb1">from friends in News Feed</span>
            </div>
         </div>
         <div class="leftbar">
            <img src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2365-6/851585_216271631855613_2121533625_n.png" alt="" class="iconwrap fb1"/>
            <div class="fb1">
               <span class="rowtext">Share what's new</span>
               <span class="rowtext2 fb1">no limit for your timeline </span>
            </div>
         </div>
         <div class="leftbar">
            <img src="https://fbcdn-dragon-a.akamaihd.net/hphotos-ak-xap1/t39.2365-6/851558_160351450817973_1678868765_n.png " alt="" class="iconwrap fb1"/>
            <div class="fb1">
               <span class="rowtext">share your life </span>
               <span class="rowtext2 fb1">invite your friends to connect</span>
            </div>
         </div>
      </div>
   
</div>
<div class="mt-4">
                                <div class="d-flex justify-content-center mt-3 login_container">
                                <input type="submit" class="btn" value="Login">
                                </div>
                                <div class="d-flex justify-content-center links">
                                <a href="registerform.php" class="form_link">Sign Up</a>
                                </div>
                                <div><?php if(isset($_GET['error'])){echo "<div class='alert alert-danger' role='alert'> erroe  </div>";}?> </div>
                            </div>
</body>
</html>
<?php 