<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>


<header>
   	 <div class="logo">
   	  <img src="images/image1.jpg" >
   	  <h3> LIBRARY MANAGEMENT SYSTEM </h3>
   	 </div>
   		<?php
         if(isset($_SESSION['login_user']))
         { ?>
           <nav>
         <i class="fa fa-home" style="font-size: 52px;" aria-hidden="true"></i>
         <i class="fa fa-book" style="font-size: 45px;
         padding-left: 5px;"  aria-hidden="true"></i>     
         <i class="fa fa-sign-in" style="font-size: 45px;
         padding-left: 47px;"  aria-hidden="true"></i>  
        
         <i class="fa fa-comments" style="font-size: 45px;
         padding-left: 20px;" aria-hidden="true"></i>    
        <ul>
              
          <li><a href="index.php">HOME</a></li>
          <li><a href="books.php">BOOKS</a></li>
          <li><a href="logout.php">Logout</a></li>
          
          <li><a href="feedbak.php">Feedback</a></li>
        </ul>

      </nav>
      <?php
         }
        
        else {
          ?>
          <nav>
         <i class="fa fa-home" style="font-size: 52px;" aria-hidden="true"></i>
         <i class="fa fa-book" style="font-size: 45px;
         padding-left: 5px;"  aria-hidden="true"></i>     
         <i class="fa fa-sign-in" style="font-size: 45px;
         padding-left: 47px;"  aria-hidden="true"></i>  
         <i class="fa fa-lock" style="font-size: 45px;
         padding-left: 54px;"   aria-hidden="true"></i> 
         <i class="fa fa-comments" style="font-size: 45px;
         padding-left: 20px;" aria-hidden="true"></i>    
        <ul>
              
          <li><a href="index.php">HOME</a></li>
          <li><a href="books.php">BOOKS</a></li>
          <li><a href="student_login.php">STUDENT-LOGIN</a></li>
          <li><a href="admin.php">ADMIN</a></li>
          <li><a href="feedbak.php">Feedback</a></li>
        </ul>

      </nav>
      <?php
        }
      ?>
       
      

   	</header>
    </body>
</html>