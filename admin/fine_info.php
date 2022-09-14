<?php
  include "navbar.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book Requested</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
  <style type="text/css">
    .searchbar{
      padding-left: 1000px;
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
<body>

  <!--______------sidenav----____________-->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

 <div style="margin-left:60px; ">
  <?php
       echo "<img class='img-circle profile_img'
           height=120 width=120 src='images/".$_SESSION['img']." '>";
           echo "<br>"; 
        //  echo $_SESSION['img'];
           echo "<div style='margin-top:10px;
           margin-left:20px;
           font-size:30px; color:white;'>";
             echo "&nbsp <b>$_SESSION[login_user]</b>";
             echo "</div>";
  ?>
 </div>

  <a href="profile.php">Profile</a>
  <a href="books.php">Books</a>
  <a href="requested_books.php">Book Request</a>
  <a href="issue_info.php">Issue Information</a>
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
  
  <div style="width: 1000px; text-align: center;margin-left: 300px; margin-top: 100px;">
   <?php
    
      if(isset($_SESSION['login_user']))
      {     
      	?>
      	<h2 style="font-size: 40px; padding-top: 5px; height: 60px; width: 800px; margin-left: 100px; background-color: black; color: white;">Fines for Books..</h2>
      	<?php
             $sql1="SELECT * from `fine`, `books` where `fine`.`bid`= `books`.`bid`";
             $res1=mysqli_query($db,$sql1);
             if(mysqli_num_rows($res1)==0)
             {
              echo "no fine for books!";
             }
             else
             {
                echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";

       echo "<th >";  echo "Username" ;echo "</th>";
       echo "<th >";  echo "Book ID" ;echo "</th>";
       echo "<th >";  echo "Book Name" ;echo "</th>";
       echo "<th >";  echo "Return date" ;echo "</th>";
       echo "<th >";  echo "Delayed days " ;echo "</th>";      
       echo "<th >";  echo " Fine" ;echo "</th>";
       echo "<th >";  echo "Status" ;echo "</th>"; 

      echo "</tr>"; 


      while($row =mysqli_fetch_assoc($res1))
      {
         echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
         echo "<td>"; echo $row['username']; echo "</td>";
         echo "<td>"; echo $row['bid']; echo "</td>";
         echo "<td>"; echo $row['book_name']; echo "</td>";
         echo "<td>"; echo $row['returned']; echo "</td>";
         echo "<td>"; echo $row['day']; echo "</td>";
         echo "<td>"; echo $row['fine']; echo "</td>";
         echo "<td>"; echo $row['status']; echo "</td>";
         echo "</tr >";
             }

         }
      }

      else
      { 
      	 ?>
      	 <div style="font-size: 40px; text-align: center;margin-top: 100px;">Please login first!!</div>  
      	 <?php   	
      }
 ?>
</div>
</body>
</html>