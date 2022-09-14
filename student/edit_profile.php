<?php
  include "connection.php";
  include "navbar.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit profile</title>
</head>
<body>
    
    <h1 style="background-color: black; color: white; padding: 10px; text-align: center; margin-top: 100px; font-size: 35px; width: 700px;margin-left: 400px;r "> Edit Your Profile</h1>
    <br><br>

    <div>
    	<form style="margin-left: 500px; width: 500px; " action="" method="post" enctype="multipart/form-data">

            <input class="form-control" type="file" name="file"><br>

    	  <label><h4><b>First Name:</b></h4></label>	
    		<input class="form-control" type="text" name="fname"><br>
    	  <label><h4><b>Last Name:</b></h4></label>
    		<input class="form-control" type="text" name="lname"><br>
    	  <label><h4><b>UsreName:</b></h4></label>
    	  	<input class="form-control" type="text" name="username"><br>
    	  <label><h4><b>Password:</b></h4></label>
    		<input class="form-control" type="text" name="password"><br>
    	  <label><h4><b>Email:</b></h4></label>
    		<input class="form-control" type="text" name="email"><br>
    	 <label><h4><b>Contact:</b></h4></label>
    		<input class="form-control" type="text" name="contact"><br>
    		<button style="background-color: #0567c5; color:white;" class="btn bnt-default" type="submit" name="submit">Save Changes</button>

    	</form>

    </div>

<?php
    $username=$_SESSION['login_user'];
  if(isset($_POST['submit']))
  { 
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $new_username=$_POST['username'];
     $password=$_POST['password'];
     $email=$_POST['email'];
     $contact=$_POST['contact'];
////////////// upload image///////////////////////////////////////////////     
move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);
    	$pic=$_FILES['file']['name'];
    
if($pic)
   {
    	
        mysqli_query($db,"UPDATE student SET image='$pic' where username='$username'");
        $_SESSION['img']=$pic;
    }
//////////////////////////////////////////////////////////////////////////////////////////////////
  	if(($_POST['fname']))
  	{ 
  		mysqli_query($db,"UPDATE student SET first_name='$fname' where username='$username'");
  	}
  	if(($_POST['lname']))
  	{
  		mysqli_query($db,"UPDATE student SET last_name='$lname' where username='$username';");
  	}
  	if(($_POST['username']))
  	{
  		mysqli_query($db,"UPDATE student SET username='$new_username' where username='$username';");
  		$_SESSION['login_user']=$new_username;
  	}
  	if(($_POST['password']))
  	{
  		mysqli_query($db,"UPDATE student SET password='$password' where username='$username';");
  	}
  	if(($_POST['email']))
  	{
  		mysqli_query($db,"UPDATE student SET email='email' where username='$username';");
  	}
  	if(($_POST['contact']))
  	{
  		mysqli_query($db,"UPDATE student SET contact='$contact' where username='$username';");
  	}

  	?>
  	<script type="text/javascript">
  		alert("Changes saved successfully");
  		window.location="profile.php";
  	</script>
    <?php
  }

?>

</body>
</html>