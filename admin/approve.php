<?php
  include "navbar.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Approve Requested</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
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

<div class="container">
   <h3> Approve Student's request</h3>

   <form class="" method="post" action="">
    <label for="approve">Approve or not:</label>
      <select name = "approve"> 
          <option value ="yes" selected>Yes
          </option>
          <option value = "no">No</option>    
      </select>
      <label for="issue_date">Issue Date:</label>
      <input type="date" id="issue_date" name="issue_date">
      <label for="return_date">Return Date:</label>
      <input type="date" id="return_date" name="return_date">
      <input type="submit" name="submit">
   </form>
  
</div>


<?php
   if(isset($_POST['submit']))
   {
      
// check whether quantity of the book is >0 or not
     $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid]';" );
     $cnt=mysqli_fetch_assoc($res);
     if($cnt==0)
     {
        ?>
          <script type="text/javascript">
             alert("Book not available!!");
          </script>
        <?php
     }

     else
     {
      $sql="UPDATE issue_book SET approve='$_POST[approve]', issue_date='$_POST[issue_date]', return_date='$_POST[return_date]' where username='$_SESSION[name]' and bid='$_SESSION[bid]'";
      mysqli_query($db,$sql);
      if($_POST['approve']=="yes")
      {
      $sql1="UPDATE books SET quantity=quantity-1 where bid='$_SESSION[bid]'";
      mysqli_query($db,$sql1);
       }   
          ?>
          <script type="text/javascript">
             alert("Approved successfully.");
             window.location="requested_book.php";
          </script>

        <?php
     }
       
   }

?>

</div>
</body>
</html>