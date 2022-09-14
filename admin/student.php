<?php
  include "navbar.php";
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student-Info</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <style type="text/css">
    .searchbar{
      padding-left: 1100px;
    }

    body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 100px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
  </style>

</head>
<body style="background-color: #3c763d4a;">

<!--______------sidenav----____________-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

 <div style="margin-left:60px; ">
  <?php
     if(isset($_SESSION['login_user']))
    {
       echo "<img class='img-circle profile_img'
           height=120 width=120 src='images/".$_SESSION['img']." '>";
           echo "<br>"; 
        //  echo $_SESSION['img'];
           echo "<div style='margin-top:10px;
           margin-left:20px;
           font-size:30px; color:white;'>";
             echo "&nbsp <b>$_SESSION[login_user]</b>";
             echo "</div>";
      }
  ?>
 </div>

  <a href="profile.php">Profile</a>
  <a href="books.php">Books</a>
  <a href="#">Book Request</a>
  <a href="#">Issue Information</a>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "#3c763d4a";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#3c763d4a";
}
</script>
  
 <!-- ________-------search bar------__________-->
   <br>
   <div class="searchbar">
      <form class="navbar-form" method="post" name="form1">
        
           <input style="width: 350px; height: 40px; font-size: 20px;" type="text" name="search" placeholder="Search a student.." required="">
           <button style="background-color: #6db6b9e6; height: 40px; width: 40px;" type="submit" name="submit" class="btn btn-default">
             <span class="glyphicon glyphicon-search" style="font-size: 10px;"></span>
           </button>
        
      </form>

   </div>
<br><br>
   <h2 style="background-color: #3c763d4a; width: 1300px; text-align: center; margin-left: 100px; font-size: 40px;" >Student registered in Library</h2>

<div style="padding-left: 200px; width: 1300px;">  
   <?php

      if(isset($_POST['submit']))
      {
             $sql1="SELECT `first_name`,`last_name`,`username`,`rollno`,`email`,`contact` from `student` where `username` like '%$_POST[search]%' ";
             $res1=mysqli_query($db,$sql1);
             if(mysqli_num_rows($res1)==0)
             {
              echo "no student registered!";
             }
             else
             {
                echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";

      echo "<th >";  echo "rollno" ;echo "</th>";
       echo "<th >";  echo "First Name" ;echo "</th>";
       echo "<th >";  echo "Last Name" ;echo "</th>";
       echo "<th >";  echo "Username" ;echo "</th>";
       echo "<th >";  echo "Email" ;echo "</th>";      
       echo "<th >";  echo "Contact" ;echo "</th>";
      echo "</tr>"; 


      while($row =mysqli_fetch_assoc($res1))
      {
         echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
         echo "<td>"; echo $row['rollno']; echo "</td>";
         echo "<td>"; echo $row['first_name']; echo "</td>";
         echo "<td>"; echo $row['last_name']; echo "</td>";
         echo "<td>"; echo $row['username']; echo "</td>";
         echo "<td>"; echo $row['email']; echo "</td>";
         echo "<td>"; echo $row['contact']; echo "</td>"; 
         echo "</tr >";
             }

         }
      }

       else {
       $sql="SELECT `first_name`,`last_name`,`username`,  `rollno`,`email`,`contact` from `student` ORDER BY `rollno` ASC";
       $res=mysqli_query($db,$sql);
       echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";

       echo "<th >";  echo "rollno" ;echo "</th>";
       echo "<th >";  echo "First Name" ;echo "</th>";
       echo "<th >";  echo "Last Name" ;echo "</th>";
       echo "<th >";  echo "Username" ;echo "</th>";
       echo "<th >";  echo "Email" ;echo "</th>";      
       echo "<th >";  echo "Contact" ;echo "</th>";

      echo "</tr>"; 

      while($row =mysqli_fetch_assoc($res))
      {
      	 echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
      	 echo "<td>"; echo $row['rollno']; echo "</td>";
      	 echo "<td>"; echo $row['first_name']; echo "</td>";
      	 echo "<td>"; echo $row['last_name']; echo "</td>";
      	 echo "<td>"; echo $row['username']; echo "</td>";
      	 echo "<td>"; echo $row['email']; echo "</td>";
      	 echo "<td>"; echo $row['contact']; echo "</td>";
      	 echo "</tr >";
      }
     }
?>
</div> 
</body>
</html>