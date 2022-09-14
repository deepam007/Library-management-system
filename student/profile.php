<?php
  include "connection.php";
  include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title> Student Profile</title>
	<style type="text/css">
		.wrapper{
			width: 400px;
		
			margin: 0 auto;
			background-color: ;
      color: white;
		}
	</style>
</head>
<body style="background-color: #44311994;;">
  <div class="container" style="margin-top: 20px;">
  	 <form action=" " method="post">
  	 	<button class="btn btn-default" style="float: right;
      width: 80px;" type="submit" name="submit">Edit
  	 	</button>
  	 </form>

     <div class="wrapper">
     	 <?php


  // to edit profile

       if(isset($_POST['submit']))
       {   
        ?>
        <script type="text/javascript">
          window.location="edit_profile.php";
        </script>
        <<?php 

       }
         
         $sql="SELECT * FROM `student` where `username`='$_SESSION[login_user]'";
         $res=mysqli_query($db,$sql);
 
       ?>
      <h2 style="text-align: center; font-size: 30px;">My Profile</h2>
      <br>
      <br>
      <?php
        $row= mysqli_fetch_assoc($res);

        echo "<div style='text-align:center'>
        <img class='img-circle profile-img' 
         height=110px width=120px
        src= 'images/".$_SESSION['img']."'>
        </div>";
      ?>
      <div style="text-align: center; font-size: 25px;"><b> Welcome</b>
        <br>
       <h4>
        <?php
           echo $_SESSION['login_user'];
        ?>
       </h4>
       <br>
      </div>
        
        <?php
        echo "<b>";
        echo "<table class='table table-bordered'>";
        echo "<tr>";
           
           echo "<td>";
              echo "<b>First Name: </b>";
           echo "</td>";

           echo "<td>";
              echo $row['first_name'];
           echo "</td>";

        echo "</tr>";

        echo "<tr>";
            echo "<td>";
              echo "<b>Last Name: </b>";
           echo "</td>";
             
           echo "<td>";
                echo $row['last_name'];
           echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td>";
              echo "<b>User Name: </b>";
           echo "</td>";
             
           echo "<td>";
                echo  $row['username'];
           echo "</td>";
        echo "</tr>";
           
        echo "<tr>";
            echo "<td>";
              echo "<b>Email Id: </b>";
           echo "</td>";
             
           echo "<td>";
                echo $row['email'];
           echo "</td>";
        echo "</tr>";

        echo "<tr>";
            echo "<td>";
              echo "<b>Contact No.: </b>";
           echo "</td>";
             
           echo "<td>";
                echo $row['contact'];
           echo "</td>";
        echo "</tr>";

       echo "</table>";
       echo "</b>";
        ?>
     </div>  	 
  </div>


</body>
</html>