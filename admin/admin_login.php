
<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html> 
<html>
<head>
	
	<title>Student Panel</title>

</head>
<body>

  <section>
  	<div class="std_img">
  	  <br><br><br>
  		<div class="box1">


<!--   <div class="w3-content w3-section" style="width: 50px; height: 50px;">
       <img class="mySlides" src="images/image1.jpg" style="height: 400px; width: 600px; opacity: 0.6;">
       <img class="mySlides" src="images/image2.jpg" style="height: 400px; width: 600px;opacity: 0.6;">
       <img class="mySlides" src="images/image3.jpg" style="height: 400px; width: 600px;opacity: 0.6;">
       <img class="mySlides" src="images/image4.jpg" style="height: 400px; width: 600px;opacity: 0.6;">

   </div>
<script type="text/javascript">
   var a=0;
   carousel();
   function carousel() {
       var x=document.getElementsByClassName("mySlides");
       for (var i = 0;i<x.length;i++) {
           x[i].style.display="none";
       }
       a++;
       if(a>x.length){a=1}
       x[a-1].style.display="block";
       setTimeout(carousel,1000);
   }
</script>

-->
  		  <h1 style="font-size: 60px; text-align: center; color: navy;">Seemaru's Online Library</h1><br>
  		  <h1 style="font-size: 40px; text-align: center;">User login form</h1><br>
  		  <form style="text-align: center;"name="login" action="" method="post">
  		  	<input style="background: rgba(80, 185, 90, 0.6);" type="text" name="username" placeholder="username" required=""><br><br>
  		  	<input style="background: rgba(80, 185, 90, 0.6);" type="password" name="password" placeholder="password" ><br><br>
  		  <button style="background-color: #343a40; color: white;" type="submit" class="btn btn-dark" name="submit">Login</button>
  		  <button style="background-color:  #5b6b79; color: white;" type="submit" class="btn btn-secondary" name="forgot_password">Forgot password?</button>
  		  	<a style=" background-color: #7c8b97; border-color: #7c8b97;" class="btn btn-primary" href="registration.php" role="button">New to site?</a>
  		  </form>
  		</div>
  	</div>
  </section>
   
   <?php
     if(isset($_POST['forgot_password']))
        { $_SESSION['login_username']=$_POST['username'];
      ?>
         <script type="text/javascript">
         window.location="update_password.php";
         </script>
      <?php
        }
   ?>

<?php
  if(isset($_POST['submit']))
  {  
     $sql="SELECT * from `admin` where username='$_POST[username]' and password='$_POST[password]' ";
     $res=mysqli_query($db,$sql);
    $row=mysqli_fetch_assoc($res);
     $cnt= mysqli_num_rows($res);
     if($cnt==0)
     {
 ?>
 <script type="text/javascript">
   alert("Incorrect Username Or Password");
 </script>     
<?php
     }
     else
     {  
       $_SESSION['login_user']=$_POST['username'];
       $_SESSION['img1']=$row['image'];
       $_SESSION['student_name']='';
       
?>
<script type="text/javascript">
  window.location="index.php";
</script>
<?php
     }
  }

?>

</body>
</html>