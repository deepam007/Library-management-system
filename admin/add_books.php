<?php
  include "navbar.php";
  include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	
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

.dashboard:hover{
    background-color: #00544c;
    color: white;
}
.form{
  width: 500px;
  margin-left: 400px;
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
           height=120 width=120 src='images/".$_SESSION['img1']." '>";
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
    
   <div class="dashboard">  <a href="add_books.php">Add Books</a></div>
    <div class="dashboard">  <a href="delete_books.php">Delete Books</a></div>
    <div class="dashboard">  <a href="requested_book.php">Book Request</a></div>
    <div class="dashboard">  <a href="issue_info.php">Issue Information</a></div>
    <div class="dashboard">  <a href="expired_info.php">EXpired books</a></div>
    <div class="dashboard">  <a href="fine_info.php">Fines</a></div>
    
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
  
  <div class="container">
     <h2 style="font-size: 30px; margin-left: 360px;"><u> <b>Add New Books</b></u></h2> <br>
     <form class="form" action="" method="post">
        <input type="text" name="bid" class="form-control" placeholder="Book ID" required="">
         <br>
        <input type="text" name="book_name" class="form-control" placeholder="Book Name" required="">
        <br>
        <input type="text" name="author_name" class="form-control" placeholder="Author's Name" required="">
        <br>
        <input type="text" name="edition" class="form-control" placeholder="Edition">
        <br>
        <input type="text" name="status" class="form-control" placeholder="Status">
        <br>
        <input type="text" name="quantity" class="form-control" placeholder="Quantity">
        <br>
        <input type="text" name="department" class="form-control" placeholder="Department"> 
        <br>
        <button class="btn btn-default" style="background-color: black; color: white;" type="submit" name="submit">
          Add To Library
        </button>
     </form>
  </div>


<?php
  if(isset($_POST['submit']))
  {
    if(isset($_SESSION['login_user']))
    {
       $sql="INSERT INTO books values('$_POST[bid]','$_POST[book_name]','$_POST[author_name]','$_POST[edition]','$_POST[status]','$_POST[quantity]','$_POST[department]')";
       $res=mysqli_query($db,$sql);
    ?>
      <script type="text/javascript">
         alert("Book added Successfully");
      </script>
    <?php
    }

    else
    {
   ?>
      <script type="text/javascript">
        alert("Only admin can add books!");
      </script>
   <?php
    }
  }

?>


</div>

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

</body>
</html>