<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>Change Password</title>
	<style type="text/css">
		 .wrapper{
		 	height: 600px;
		 	width: 600px;
      
		 	margin-top:  60px ;
            margin-left: -450px;
		 	background-color:#437fb2;
            position: absolute;
		 }
		 .image{
		 	background-image: url("images/image5.jpg");
		 	
		 	background-size: 100% 100%;
		 	background-repeat: no-repeat; 
		 	position: relative;
      margin-left: 550px; 
      margin-top: 40px;
       height: 700px;
        width: 900px;
		 }
     .form-control{
      width: 400px;
     }
	</style>
</head>
<body style="height: 900px; background-color: #d9edf7; ">
   
  <div class="image" style=" ">

     <div class="wrapper" style="">
        <h1 style="font-size: 35px; padding: 20px 20px;
        text-align: center;"><u> Change Your Password!</u></h1>

     <form style="padding-left: 30px;" action="" method="post">
          <h3>Please set a STRONG password
           <?php
              echo $_SESSION['login_username'];
           ?>
          </h3>
        <input class="form-control" style="" type="text" name="fname" placeholder="First Name*" required="">
         <br>
        <input class="form-control" type="text" name="lname" placeholder="Last Name*" required="">
        <br>
        <input class="form-control" type="email" name="email" placeholder="Email Id*" required="">
        <br>
          <input class="form-control" type="password" name="new_pass" placeholder="New password*"> 
          <br>
         <input class="form-control" type="password" name="confirmed_new_pass" placeholder="Confirm New password*"> 
          <br>  
        <button type="submit" name="submit" class="btn btn-info">Change Password</button>
     </form>
        </div>
   	  
   </div>
  
  <?php
    
    if(isset($_POST['submit']))
    {
       $sql="SELECT * FROM `admin` WHERE `username`='$_SESSION[login_username]'";
       $res=mysqli_query($db,$sql);
       $row=mysqli_fetch_assoc($res);
       if($row['first_name']==$_POST['fname']&& $row['last_name']==$_POST['lname'] && $row['email']==$_POST['email'])
       {
         if($_POST['new_pass']==$_POST['confirmed_new_pass'])
          {
             $sql1="UPDATE admin SET password='$_POST[new_pass]' WHERE username='$_SESSION[login_username]'";
             $res1=mysqli_query($db,$sql1);
             
             ?>
               <script type="text/javascript">
                alert("PASSWORD updated Successfully");
               </script>
             <?php

          }

          else
          {
            ?>
              <script type="text/javascript">
                alert("New Password And Confirm New Password must match");
              </script>

            <?php
          }
       }

       else if($row['first_name']!=$_POST['fname'])
        {
         ?>
           <script type="text/javascript">
           alert("Incorrect FIRST NAME");
           </script> 
         <?php
        }
        else if($row['last_name']!=$_POST['lname'])
        {
         ?>
           <script type="text/javascript">
           alert("Incorrect LAST NAME");
           </script> 
         <?php
        }
        else 
        {
         ?>
           <script type="text/javascript">
           alert("Incorrect EMAIL");
           </script> 
         <?php
        }
    }
 
  ?>


</body>
</html>