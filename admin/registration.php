<?php
  include "connection.php";
  ?>

<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
   <title>Admin Registration</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style1.css">
  
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title></title>

<style type="text/css">
  nav{
    float: right;
    word-spacing: 30px; 
    padding: 20px;
    margin-top: -20px;
}
li a{
    color: white;
    text-decoration: none;
}

nav li{
    display: inline-block;
    
}
nav i{
    margin-top: 20px;
}
</style>

</head>
<body>
  <header>
     <div class="logo">
      <img src="images/image1.jpg" >
      <h3> LIBRARY MANAGEMENT SYSTEM </h3>
     </div>
      <nav>
         <i class="fa fa-home" style="font-size: 52px;" aria-hidden="true"></i>
         <i class="fa fa-book" style="font-size: 45px;
         padding-left: 5px;"  aria-hidden="true"></i>     
         <i class="fa fa-sign-in" style="font-size: 45px;
         padding-left: 37px;"  aria-hidden="true"></i>  
         <i class="fa fa-lock" style="font-size: 45px;
         padding-left: 54px;"   aria-hidden="true"></i> 
         <i class="fa fa-comments" style="font-size: 45px;
         padding-left: 20px;" aria-hidden="true"></i>     
        <ul>
              
          <li><a href="index.php">HOME</a></li>
          <li><a href="books.php">BOOKS</a></li>
          <li><a href="../login.php">LOGIN</a></li>
         
          <li><a href="feedbak.php">Feedback</a></li>
        </ul>

      </nav>

    </header>


      <section>
   <div class="reg_img">
    <br>
      <div class="box2" >
         <h1 style="font-size: 60px; text-align: center; ">Seemaru's Online Library</h1><br>
         <h1 style="font-size: 40px; text-align: center;">User registration form</h1><br><br>
     
      
       <form name="registration" action="" method="post" class="" style="margin-left: 40px;">
  <div class="col-8">
    <label for="inputEmail4" class="form-label">First Name</label><br>
    <br>
    <input type="text" class="form-control" name="fname" required="">
  </div><br>
  <div class="col-8">
    <label for="inputPassword4" class="form-label">Last Name</label>
    <br><br>
    <input type="text" class="form-control" name="lname" required="">
  </div><br>
  <div class="col-8">
    <label for="inputEmail4" class="form-label">Username</label>
    <br><br>
    <input type="text" class="form-control" name="uname" required="">
  </div><br>
  <div class="col-8">
    <label for="inputEmail4" class="form-label">Password</label>
    <br><br>
    <input type="password" class="form-control" name="password" required="">
  </div><br>
   
  <div class="col-8">
    <label for="inputEmail4" class="form-label">Email</label>
    <br><br>
    <input type="email" class="form-control" name="email" required="">
  </div><br>
  <div class="col-8">
    <label for="inputEmail4" class="form-label">Contact</label>
    <br><br>
    <input type="text" class="form-control" name="phone" required="">
  </div><br>
  <div class="col-12">
    <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
  </div>
</form>
      </div>
   </div>
  </section>
<?php
  if(isset($_POST['submit']))
  {   
    $cnt=0;
    $qr="SELECT `username` from `admin`";
    $res=mysqli_query($db,$qr);
    while($row=mysqli_fetch_assoc($res))
    {
      if($row['username']==$_POST['uname'])
        { $cnt=1;}
    }
     if($cnt==0)
     {
    $sql="INSERT INTO `admin` (`id`,`first_name`, `last_name`, `username`, `password`, `email`, `contact`,`image`,`status`) VALUES (NULL,'$_POST[fname]', '$_POST[lname]','$_POST[uname]','$_POST[password]','$_POST[email]','$_POST[phone]','admin.jpg','no')";

     mysqli_query($db,$sql);
?>
<script type="text/javascript">
  alert("Registration Successful");
  window.location="../login.php";
</script>
<?php
    }

    else {
?>
<script type="text/javascript">
  alert("Username already exist.Try another.");
</script>
<?php

    }
 

  }

  
?>
</body>
</html>

