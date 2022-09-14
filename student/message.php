 <?php
 include "connection.php";
 include "navbar.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Message</title>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
    	.wrapper{
    		height: 600px;
    		width: 700px;
    		background-color: black;
    		
    		margin: 20px auto;
    		padding: 10px;
    	}
        .form-control{
        	height: 47px;
        	width: 75%;
        	float: left;
        }
        .msg{
        	height: 450px;
        	overflow-y: scroll;
        }
        .chat{
        	display: flex;
        	flex-flow:row wrap; 
        }
        .user .chatbox{
        	height: 50px;
        	width: 500px;
        	padding: 13px 10px;
        	background-color: white;
        	border-radius: 10px;
        	order:-1;
        }
        .admin .chatbox{
        	height: 50px;
        	width: 500px;
        	padding: 13px 10px;
        	background-color: #1f6bc3;
        	color: white;
        	border-radius: 10px;
        	
        }

    </style>

 </head>
 <body>
 

<?php
  if(isset($_POST['send']))
  {
    mysqli_query($db,"INSERT into `message`(`id`, `username`, `message`, `status`, `sender`) VALUES (NULL,'$_SESSION[login_user]','$_POST[msg]','no','student');")	;
    $res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]'");
  }
  else
  {
  	$res=mysqli_query($db,"SELECT * from message where username='$_SESSION[login_user]'");
  }

  mysqli_query($db,"UPDATE message SET status='yes' where sender='admin' and username='$_SESSION[login_user]'");

?>


  <div class="wrapper">
  	  <div style=" height: 70px; width: 100%; text-align: center; padding: 10px;
  	   background-color: #2eac8b;">
  	  	<h1 style="font-size: 30px;">Admin</h1>
  	  </div>

     <div class="msg">
     	<br>

<?php
   while($row=mysqli_fetch_assoc($res)) 
   {
      if($row['sender']=='student')
      {
   
?>

<!-- for student msg------------------------------------------------------>
     	<div class="chat user">
     		 <div style="float: left; padding-top: 5px;">
     		 	&nbsp
     		 	<?php
              echo "<img class='img-circle profile_img'
           height=40 width=40 src='images/".$_SESSION['img']." '>";
             ?>
     		 	&nbsp
     		 </div>
     		 <div style="float: left;" class="chatbox">
    <?php
         echo $row['message'];
    ?>
     		 </div>
     	</div>
     	<br>

<?php
}
   else 
   {
    ?>
<!-- for admin msg----------------------------------------------------------------->
        <div class="chat admin">
        	<br>
     		 <div style="float: left; padding-top: 5px;">
     		 	&nbsp
     		 	<img style="height: 40px; width: 40px;" src="hgjh.jpg">
     		 	&nbsp
     		 </div>
     		 <div style="float: left;" class="chatbox">
          <?php
            echo $row['message'];
         ?>
     		 </div>
     	</div>

<?php
  }
}
?>

     </div>

     <div style="height: 100px; padding-top: 10px;">
     	 <form action="" method="post">
     	 	 <input type="text" name="msg" class="form-control" required="" placeholder="Write your msg..." > &nbsp
     	 	 <button class="btn btn-info btn-lg" type="submit" type="submit" name="send"><span class="glyphicon glyphicon-send"></span>
     	 	 	&nbsp Send
     	 	 </button>
     	 </form>
     </div>

  </div>

 </body>
 </html>