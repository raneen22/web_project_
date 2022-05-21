
<?php require'dbconnect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>  



</head>

<body>
   
<div id="navwrapper">
   <div id="navbar">
      <h1 class="logowrapper">friendbook</h1>
      <form role="form" method="post" action="serverreg.php.php">  

      <div id="rightbod">
         
         <div class="signup bolder">Sign Up</div>
                     <form method="post" action="registerform.php">
                        <?php include('errors.php'); ?>


         <div class="formbox">

            <input  type="text" id="user_name" name="user_name" class="inputbody in1" placeholder=" user_name"  ?>
         </div>
         <div class="formbox">
            <input type="email" id="email" name="email" class="inputbody in2" placeholder="Email"   ?>
         </div>
         <div class="formbox">
            <input type="number" id="phone" name="tel" class="inputbody in2" placeholder="phone"  ?> 
         </div>

         <div class="formbox">
            <input type="text" id="phone" name="address" class="inputbody in2" placeholder="address"  ;?>
         </div>

         <div class="formbox">
            <input type="text" id="phone" name="gender" class="inputbody in2" placeholder="gnder"  ?>
         </div>

         <div class="formbox">
            <input type="text" id="phone" name="fname" class="inputbody in2" placeholder="fname"   ?>
         </div>
         <div class="formbox">
            <input type="text" id="phone" name="lname" class="inputbody in2" placeholder="lname"   ?>
         </div>
         <div class="formbox">
            <input type="file" id="phone" name="image" class="inputbody in2" placeholder="image"   ?>
         </div>
        

         <div class="formbox">
            <input type="password" name="password" class="inputbody in2" placeholder="New password"  ?> 
         </div>


</div>


         <div class="formbox">
            <div class="agree">
               By clicking Sign Up, you agree to our 
               <div class="link">Terms</div>
               and that you have read our 
               <div class="link">Data Use Policy</div>
               , including our 
               <div class="link">Cookie Use</div>
               .
            </div>
         </div>
         <div class="formbox">
            <button type="submit" class="signbut bolder">Sign Up</button>
         </div>
        
         </div>
         <p>
            Already a member? <a href="index.php">Sign in</a>
         </p>
      </form>
      </div>
      
   </div>

</body> 
</html>
