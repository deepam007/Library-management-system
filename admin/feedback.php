<?php
   
   include "navbar.php";
   include "connection.php";
   
?>
<!DOCTYPE html>
<html>
<head>
	<title>Feedback</title>

 <style type="text/css">
 /*<!--	.x {
		background-image: url("images/feedback.jpg");
		background-size: 100% 100%; 
		 opacity: 0.3;
		position: relative;
	}
	--> */
    .bg{
    	background-image: url("images/feedback.jpg");
    	background-size: 100% 100%;
    	width:1519px; 
    	height:  900px ;
    }
    .box{
    	
    	position: absolute;
    	margin-top: 120px;
    	margin-left: 400px;
    	width: 800px;
    	height: 500px;
    	background-color: black;
    	opacity: 0.8;
    }
    .form-control{
           height: 100px;
           width: 80%;
           
           padding-left: 20px;
    }
    .scroll{
    	width: 100%;
    	height: 200px;
    	overflow: auto;
    	margin-top: 60px;
    }
</style>
</head>
<body>
 <!-- <div class="x" style="margin-top: 0px; width:1538px; height:  700px ;  ">
  	<b><h1 style="font-size: 40px; opacity: 1;">Please feel free to share your THOUGHTS</h1></b>
  	<br><br><br>
  	 
  </div>
  <div class="y" style=" color: red; margin-top: -600px;">
  	 	 <b>jckjsbcj</b>
  	 	 jhjh

  	 </div> -->
  	 <div class="bg" >
  	 	<h1 style="text-align: center; padding-top: 20px; font-size: 50px; color: navy;">Feel Free To Share Your THOUGHTS..</h1>
  	 	 <div class="box">
  	 	 	
  	 	 	<form style="padding:  5%; height: 10px;" action="" method="post">
  	 	 		<input class="form-control
  	 	 		" style="font-size: 20px; 
  	 	 		" type="text" name="comment" placeholder="write your comment..." required="">
  	 	 		<br><br>
  	 	 		<input style="background-color: black;" class="btn btn-default" type="submit" name="submit" value="Post Comment">
  	 	 	</form>
  	 	 <br><br><br>
  	 	 <br><br>
  	  <div class="scroll">
  	  	  <?php
              if(isset($_POST['submit']))
              {
              	$sql="INSERT INTO `comments` (`id`,`user`, `comments`) VALUES (NULL,'Admin', '$_POST[comment]')";
              	
              	 if(mysqli_query($db,$sql))
              	 {
              	 	$qr= "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
              	 	$res=mysqli_query($db,$qr);

              	 	echo "<table class='table table-bordered'>";
              	 	while ($row=mysqli_fetch_assoc($res)) 
              	 	{
              	 		echo "<tr>";
                    echo "<td>"; echo $row['user']; echo "</td>";
              	 		  echo "<td>"; echo $row['comments']; echo "</td>";
              	 		echo "</tr>";
              	 	}
              	 }
              }
              else
              {
              	$qr= "SELECT * FROM `comments` ORDER BY `comments`.`id` DESC";
              	 	$res=mysqli_query($db,$qr);

              	 	echo "<table class='table table-bordered'>";
              	 	while ($row=mysqli_fetch_assoc($res)) 
              	 	{
              	 		echo "<tr>";
              	 		 echo "<td>"; echo $row['user']; echo "</td>";
                      echo "<td>"; echo $row['comments']; echo "</td>";
              	 		echo "</tr>";
              	 	}
              }

  	  	  ?>
  	  </div>
    </div>
  </div>
</body>
</html>