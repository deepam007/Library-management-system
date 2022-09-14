<?php
include "connection.php";
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>


	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="style1.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

  <?php
     $r=mysqli_query($db,"SELECT COUNT(status) as total from message where status='no' and username ='$_SESSION[login_user]' and sender='student'");
     $tot=mysqli_fetch_assoc($r);
  ?>





     <nav class="navbar navbar-inverse" style="margin-bottom: 0px;">
  	 <div class="container-fluid">
  	 	 <div class="navbar-header">
  	 	 	<img style="float: left;height: 100px; padding: 15px; " src="images/image1.jpg" >
  	 	 	<a style="font-size: 30px; margin-top: 25px;" class="navbar-brand active" href="">Seemaru's Library</a>
  	 	 </div>
  	 	 <ul style="margin-top: 25px; font-size: 16px;" class="nav navbar-nav">
  	 	 	<li><a href="index.php
  	 	 		">Home</a></li>
  	 	 	<li><a href="books.php">Books</a></li>
  	 	 	<li><a href="feedback.php">Feedback</a></li>
         <li><a href="student.php"><span > Student-Info</span></a></li>
  	 	 </ul>

  	 	 <ul style="margin-top: 25px; font-size: 16px;" class="nav navbar-nav navbar-right">
        <?php 
        if(isset($_SESSION['login_user']))
        {  ?>
            
            <ul class="nav navbar-nav" style="margin-top: 25px; font-size: 16px;">
             <li><a href="profile.php">Profile</a></li>
           </ul>
<!-- msgsssssssssss------------------------------------------------------------>
        <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span> 
           <span class="badge bg-green">
            <?php
              echo $tot['total']; 
            ?>
           </span>
         </span></a></li>
<!----------------------------------------------------------------------------->
          <li style="margin-top: -10px; text-align: right;"><a href=""><span > 
           <?php 
           echo "<img class='img-circle profile_img'
           height=40 width=40 src='images/".$_SESSION['img1']." '>";
       //    echo "$_SESSION[img1]";
          echo "&nbsp $_SESSION[login_user]";
           ?> </span></a></li>
           
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> Logout</span></a></li>
         
          <?php
        }
        else
          { ?>
  	 	 	<li><a href="../login.php" ><span class="glyphicon glyphicon-log-in"> Admin-Login</span></a></li>
  	 	 	
  	 	 	<li><a href="registration.php"><span class="glyphicon glyphicon-user"> Sign-up</span></a></li>
       <?php
       }
       ?>
  	 	 </ul>
  	 </div>

  </nav>
</body>
</html>