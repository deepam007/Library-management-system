<?php
 include "connection.php";
 include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Messages</title>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 	<style type="text/css">
 		.left_box{
 			height: 600px;
 			width: 550px;
 			background-color: #0a92c0;
 			float: left;
 			position: absolute;
 			
 		}
 		.right_box{
 			height: 600px;
 			width: 1000px;
 		    background-color: #0a92c0;
 		    float: right;
 		    position: relative;
 			
 		}
 		.left_box2{
 			height: 600px;
 			width: 300px;
 			background-color: #537890;
 			border-radius: 10px;
 			float: right;
 		}
 		.left_box2 input{
 			width: 150px;
 			height: 50px;
 			background-color: white;
 			padding: 10px;
 			margin-top: 7px;
 			margin-left: 10px;
 			border-radius: 10px;
 		}
 		.list{
 			height: 500px;
 			width: 300px;
 			background-color: ;
 			float: right;
 			padding:10px;
 			overflow-y: scroll;
 			overflow-x: hidden; 
 		}
 		.right_box2{
 			height: 600px;
 			width: 700px;
 			background-color: #537890;
 			border-radius: 10px;
 			float: left;
 			padding: 5px;
 			margin-left: 40px;
 		}
       tr:hover{
         background-color: #1e3f54;
         cursor: pointer;
       }
 /* from student side css ------------------------------------------------------------*/      
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
        		margin-left: 30px;
        }
        .user .chatbox{
        	height: 50px;
        	width: 500px;
        	padding: 13px 10px;
        	background-color: white;
        	border-radius: 10px;

        }
        .admin .chatbox{
        	height: 50px;
        	width: 500px;
        	padding: 13px 10px;
        	background-color: #1f6bc3;
        	color: white;
        	border-radius: 10px;
        	order:-1;
        	margin-left: 40px;
        	
        } 
   /*-------------------------------------------___________________________________*/         
 	</style>
 </head>
 <body style="height: 100%; width: 100%;">

<?php
  $sql="SELECT `student`.`image` , `message`.`username` from student,message where `student`.`username`=`message`.`username` GROUP BY username ORDER BY status";
  $res=mysqli_query($db,$sql);

?>



<!---------------------Left Box------------------------------------> 	
   <div class="left_box">
   	  <div class="left_box2">

        <div>
        	<form method="post" action="">
        		<input type="text" name="username" id="uname">
        		<button class="btn btn-default" type="submit" name="submit">Search</button>
        		
        	</form>
        </div>

   	  	   <div class="list">
   	  	   	<?php
   	  	   	  echo "<table id='table' class='table' >";

   	  	   	while($row=mysqli_fetch_assoc($res))
   	  	   	{	
   	  	   	  echo "<tr>";
   	  	   	  echo "<td>"; echo "<img class='img-circle profile_img' height=40 width=40 src='images/".$row['image']." ' > "; echo "</td>";
   	  	   	  echo "<td style='padding-top:30px;'>"; echo $row['username']; echo "</td>";
   	  	   	  echo "</tr>";
   	  	   	}
   	  	   	  echo "</table>";
   	  	   	  ?>
   	  	   	
   	  	   </div>
   	  </div>
   	
   </div>
<!----------------------Right Box------------------->
   <div class="right_box">
   	    <div class="right_box2">
   	    	
<?php

// if submit is pressed________________--------------------------------------------------------------------____________________
  if(isset($_POST['submit']))
  {
     $res1=mysqli_query($db,"SELECT * from message where username='$_POST[username]'");

//  t0 decrement the unread msgs-------
     mysqli_query($db,"UPDATE message SET status='yes' where sender='student' and username='$_POST[username]'");
/////////////////////////////////////
     if($_POST['username']!=''){
     	$_SESSION['student_name']=$_POST['username'];
     }

  	?>

  	<div style="height: 70px; width:100%; text-align: center; color: white; ">
  		<h3 style="font-size: 25px; margin-top: 20px;"><?php echo $_SESSION['student_name']; ?></h3>
  		
  	</div>


<!-------------------------------------msg layout from student----------------------------------------------------------------------->

     <div class="msg">
     	<br>

<?php
   while($row=mysqli_fetch_assoc($res1)) 
   {
      if($row['sender']=='student')
      {
   
?>

<!-- for student msg------------------------------------------>
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
<!-- for admin msg-------------------------------------->
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
     	<br>

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
  	
  	<?php
  }

 // is submit not pressed_____________________-----------------------------------------------------___________________________________________________
   else
   {
        if($_SESSION['student_name']=='')
        {
        	?>
        	<img style="height: 80%; width: 80%;" src="images/image6.jpg">
        	<?php
        }

        else
        {
        	if(isset($_POST['send']))
        	{
               
              mysqli_query($db,"INSERT into `message`(`id`, `username`, `message`, `status`, `sender`) VALUES (NULL,'$_SESSION[student_name]','$_POST[msg]','no','admin');")	;
               $res1=mysqli_query($db,"SELECT * from message where username='$_SESSION[student_name]'");


        	}
        	else
        	{
               $res1=mysqli_query($db,"SELECT * from message where username='$_SESSION[student_name]'");

        	}

        ?>

        <div style="height: 70px; width:100%; text-align: center; color: white; ">
  		<h3 style="font-size: 25px; margin-top: 20px;"><?php echo $_SESSION['student_name']; ?></h3>
  		
  	   </div>

  	   <!----------------------show msgs----------------------------------->
  	   <div class="msg">
     	<br>

<?php
   while($row=mysqli_fetch_assoc($res1)) 
   {
      if($row['sender']=='student')
      {
   
?>

<!-- for student msg------------------------------------------>
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
<!-- for admin msg-------------------------------------->
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
     	<br>

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
       <?php


        }
   } 
?>

   	    </div>
   </div>

<!-- on clicking any user its message will show on right--------------------------------------------------------------------------------------->
<script type="text/javascript">
	var table= document.getElementById('table'),eIndex;
	for(var i=0;i<table.rows.length;i++)
	{
	   table.rows[i].onclick=function()
	   {	
        rIndex=this.rowIndex;
        document.getElementById("uname").value=this.cells[1].innerHTML;
        }
	}

</script>


 
 </body>
 </html>