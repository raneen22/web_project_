<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="styleprofile.css">
    <link rel="stylesheet" href="stylehome.css">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

</head>

    <bady>
      
  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top " style="color:#2f11f0">
    <a class="navbar-brand" href="home.php" style="color:#f3f2f7 ;">FriendsBook</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav">
      

        <li class="nav-item active">
          <a class="nav-link" href="profilepage.html">Profile</a>
        </li>

  <li class="nav-item ">
          <a class="nav-link" href="home.php">Home <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Log out</a>
        </li>
      </ul>
    </div>

    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <nav class="nav flex-column">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Notifications
            </a>
           
              <div class="dropdown-menu dropdown-menu-right" style="width:400px " aria-labelledby="navbarDropdown">
              <p style="margin-left: 10px">Friend request</p>
            <div id="freq">
              <?php
              require 'connection.php';
              $user=$_SESSION['user'];
              $query = "SELECT `user_name` FROM user WHERE `user_name` IN (SELECT sender FROM friend_request WHERE receiver ='$user')";
    
              $result = mysqli_query($conn, $query);
              if(mysqli_num_rows($result)==0)
                { 
                  echo "<p style='margin-right:7px''>You have no friend requests :c</p>";
                }
              while($row = mysqli_fetch_assoc($result))
              { ?> ?>
    
  
          <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
            <div class="p-0 w-25">
              <img src="pics/Profiledefault.png" class="img-thumbnail border-0" />  
            </div>
  
            <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            
              <a href="addfriend.php?username= <?php echo$row['user_name'];?>" class="btn btn-dark" >Add</a>
              <a href="deletefriendrequest.php?username= <?php echo$row['user_name'];?>" class="btn btn-dark">Delete</a>
            </div>
          </div>



          <?php
          }
        ?>
         
        </div>
        </div>
      </li>
    </ul>
  </nav>
</div>

  <div>


  </div>
  <hr3> My Friends</hr3>
    <div id="myfrinds">
        <?php
          require 'dbconnect.php';
          $user=$_SESSION['user'];
          $query = "SELECT user_name FROM user WHERE user_name IN (SELECT friend FROM friendship WHERE user_name='$user')";

          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result)==0)
            { 
              echo "there  no friends ";
            }
          while($row = mysqli_fetch_assoc($result))
          { ?>

        <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
          <div class="p-0 w-25">
            <img src="imge/prof.png" class="img-thumbnail border-0" />  
          </div>

          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            <?php
              echo "<h4 class='card-title'>"."<a href='peopleprofile.php?username="."</a>"."</h4>"; 
            ?>
          </div>
        </div>

        <?php
          }
        ?>
      </div>

      
  <p> <b> My Friends</b></p>
    <div id="myfrinds">
        <?php
          require 'dbconnect.php';
          $user=$_SESSION['user'];
          $query = "SELECT  user_name FROM user WHERE user_name IN (SELECT friend FROM friendship WHERE user_name='$user')";

          $result = mysqli_query($conn, $query);
          if(mysqli_num_rows($result)==0)
            { 
              echo "You have no friends :c";
            }
          while($row = mysqli_fetch_assoc($result))
          { ?>

        <div class="d-flex flex-row border rounded" style="margin-top: 20px" >
          <div class="p-0 w-25">
            <img src="imge/prof.png" class="img-thumbnail border-0" />  
          </div>

          <div class="pl-3 pt-2 pr-2 pb-2 w-75 border-left">
            <?php
              echo "<h4 class='card-title'>"."<a href='peopleprofile.php?username=".$row['user_name']."</a>"."</h4>"; 
            ?>
          </div>
        </div>

        <?php
          }
        ?>
      </div>
</div>
<div class="col-lg-8">
<div class="card">
<div class="card-header">
  <div class="input-group">
    <div class="input-group-append">
      <a href="postform.php" class="btn text-white btn-primary">add  post</a>        
    </div>
  </div>
</div>
<div class="list-group card-list-group" id="posts" >
            <?php
                  require 'dbconnect.php';
                  $user=$_SESSION['user'];
                  $query = "SELECT p.id, p.user_name, p.post_date, p.text, p.Image FROM post p INNER JOIN user u ON p.user_name=u.user_name WHERE p.user_name='$user' order by post_date DESC";

                  $result = mysqli_query($conn, $query);
                  if(mysqli_num_rows($result)==0)
                    { 
                      echo "<p style='margin-left:10px''>theres no post</p>";
                    }
                  while($row = mysqli_fetch_assoc($result))
                  {
                    ?>

            <div class="card">
              <div class="card-body">
                  <div class="container py-3">
                    <div class="card">
                      <div class="row ">
                     
                    <?php
                      
                        echo "<div class='col-md-4'>";
                        if(!empty($row['Image']))
                      {
                        echo "<img src='".$row['Image']."' class='w-100'>";
                      }
                        echo "<p class='text-secondary text-center' style='margin-top: 10px; margin-bottom: 5px'>".$row['post_date']."</p>";
                        echo "</div>";
                      
                      
                    ?>

                      <div class="col-md-8 px-3">
                        <div class="card-block px-3">
                          <?php
                          echo "<h3 class='card-title'>"."<a href='peopleprofile.php?username=".$row['user_name']."</h3>"; 
                          echo "<p class='card-text'>".$row['text']."</p>";
                          ?>
                        </div>
                      </div>
                    </div>
                   </div>
                </div>
                <?php
                    $post_id=$row['id'];
                    $query1 = "SELECT c.user_name, c.text from comments c INNER JOIN user u on  c.user_name= u.user_name WHERE post_id=$post_id";

                    $result1 = mysqli_query($conn, $query1);         
                     while($row1 = mysqli_fetch_assoc($result1))
                  {      
                  ?>
                  <div class="card card-inner comment">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                  <?php
                                    echo "<p><strong>"."<a href='peopleprofile.php?username=".$row1['user_name]."'>".</a>"."</strong></p>" ; 
                                                              echo "<h4 class='card-title'>"."<a href='others_profile.php?username=".$row['user_name']."'>".$row['first_name']." ".$row['last_name']."</a>"."</h4>";  

                                    
                                  ?>
                               
                                </div>
                            </div>
                        </div>
                  </div>
                  <?php
                    }
                  ?> 

                    <div class="input-group mb-3 mt-3">

                      <form action="comment_from.php" method="post" class="ajax form-inline ml-auto" >

                        <div class="form-group mx-sm-3 mb-2 ">

                          <input class="form-control" style="width: 500px" type="text" name="text" id="newcomment" placeholder=" comment"  aria-describedby="basic-addon2" required>

                          <input type="hidden" name="post_id" value="<?php echo($post_id)?>">

                        </div>
                         <input type="submit" value="Add comment" class="btn btn-primary mb-2 btn-outline-secondary comment_btn">

                      </form>
                    </div>

                  <div>  
                    <p id="newlikes">
                      <?php 

                        $query2 = "SELECT count(*) AS likes FROM `like` l where l.post_id = $post_id";
                        $result2 = mysqli_query($conn, $query2);         
                        $row2 = mysqli_fetch_assoc($result2);
                                              
                       
                        $query3 = "SELECT l.user_name as liked FROM `likes` l WHERE l.user_name = '$user' AND l.post_id= $post_id";
                        $result3 = mysqli_query($conn, $query3);         
                        $row3 = mysqli_fetch_assoc($result3);

                        if (!isset($row3['liked'])) 
                        {
                          ?>
                            <a id='likes' value="<?php echo $post_id;?>" class="float-left btn text-white btn-primary" onclick="like(this)"><?php echo $row2['likes'];?> likes</a>
                            <a href="edit_post.php?id= <?php echo$row['id'];?>" class="float-left btn text-white btn-primary ml-2">Edit your post </a>
                            <a href="deletepost.php?id= <?php echo$row['id'];?>" class="float-left btn text-white btn-primary ml-2">Delete your post </a>
                          <?php
                        }
                        else
                        {
                        ?>
                        <a id='likes' value="<?php echo $post_id;?>" class="float-left btn text-white btn-danger" onclick="like(this)"><?php echo $row2['likes'];?> likes</a>

                        <a href="edit_post.php?id= <?php echo$row['id'];?>" class="float-left btn text-white btn-primary ml-2">Edit post </a>
                        <a href="delet_post.php?id= <?php echo$row['id'];?>" class="float-left btn text-white btn-primary ml-2">Delete  post </a>

                        <?php
                          }
                        ?>

                    </p>
                  </div>   

      

           </div>   
        </div>
        <?php
          }              
        ?>

</div>
</div>
</div>
</div>
</div>

</body>
</html>

<script>
setInterval(function() {
  $(document).ready(function(){
        $("#posts").load("load-profilecomments.php");
  });
}, 8000);
</script>

<script>
setInterval(function() {
  $(document).ready(function(){
        $("#freq").load("load-freq.php");
  });
}, 30000);
</script>

<script>
setInterval(function() {
  $(document).ready(function(){
        $("#myfrinds").load("load-myfrinds.php");
  });
}, 30000);
</script>

<script>
  $('form.ajax').on('submit',function(){
    var that = $(this),
        url = that.attr('action'), 
        type = that.attr('method'),
        data = {};

    that.find('[name]').each(function(index, value){
      var that = $(this),
          name = that.attr('name'),
          value = that.val();

      data[name] = value;
    });
    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response){
          console.log(response);
           $(document).ready(function(){
      $("#posts").load("load-profilecomments.php");
    });
        }
    });
   
    return false;
  });
</script>

<script>
  //add/delete likes
function like(el) {
  if ($(el).hasClass('btn-primary'))
  {
    like.staticVar=$(el).attr('value');
    $.ajax(
    {
       url: "add_like.php?id="+like.staticVar,
       success: function(data){
        $("#posts").load("load-profilecomments.php");
        console.log("success");
       }
    });
  }
  else
  {
    like.staticVar=$(el).attr('value');
    $.ajax(
    {
       url: "delete_like.php?id="+like.staticVar,
       success: function(data){
        $("#posts").load("load-profilecomments.php");
        console.log("success");
       }
   });
  }
};
</script>
    </bady>