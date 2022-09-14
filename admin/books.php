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

.dashboard:hover{
    background-color: #00544c;
    color: white;
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
        
           <input style="width: 350px; height: 40px; font-size: 20px;" type="text" name="search" placeholder="Search for available boobs.." required="">
           <button style="background-color: #6db6b9e6; height: 40px; width: 40px;" type="submit" name="submit" class="btn btn-default">
             <span class="glyphicon glyphicon-search" style="font-size: 10px;"></span>
           </button>
        
      </form>
      <!-- TO DELETE A BOOK -->

      <form style="margin-top: 20px;" class="navbar-form" method="post" name="form1">
        
           <input style="width: 350px; height: 40px; font-size: 20px;" type="text" name="bid" placeholder="Delete using Book ID" required="">
           <button style="background-color: #6db6b9e6; height: 40px; width: 80px;" type="submit" name="submit1" class="btn btn-default">Delete
           </button>
        
      </form>

   </div>
<br><br>
   <h2 style="background-color: #3c763d4a; width: 1300px; text-align: center; margin-left: 100px; font-size: 40px;" >Available Books in Library</h2>

<div style="padding-left: 200px; width: 1300px;">  
   <?php

  if(isset($_POST['submit1']))
     {
        if(isset($_SESSION['login_user']))
        { $sql2="SELECT * from `books` where `bid`='$_POST[bid]'"; 
          $res2=mysqli_query($db,$sql2);

          if(mysqli_num_rows($res2)>0 )
          {
            ?>
              <script type="text/javascript">
                alert("Book Deleted Successfully"); 
              </script>
             <?php
          }
          else 
          {
            ?>
              <script type="text/javascript">
                alert("Book NOT Found!!") ;
              </script>
             <?php
          }
          $sql2="DELETE FROM books WHERE `bid`='$_POST[bid]'";
          mysqli_query($db,$sql2);

        }

        else
        {
          ?>
              <script type="text/javascript">
                alert("Only ADMIN can delete books!!") ;
              </script>
             <?php
        }

     }

      if(isset($_POST['submit']))
      {
             $sql1="SELECT * from `books` where `book_name` like '%$_POST[search]%' ";
             $res1=mysqli_query($db,$sql1);
             if(mysqli_num_rows($res1)==0)
             {
              echo "no books found!";
             }
             else
             {
                echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";

       echo "<th >";  echo "ID" ;echo "</th>";
       echo "<th >";  echo "Book Name" ;echo "</th>";
       echo "<th >";  echo "Authors" ;echo "</th>";
       echo "<th >";  echo "Edition" ;echo "</th>";
       echo "<th >";  echo "Status" ;echo "</th>";      
       echo "<th >";  echo "Quantity" ;echo "</th>";
       echo "<th >";  echo "Department" ;echo "</th>"; 

      echo "</tr>"; 


      while($row =mysqli_fetch_assoc($res1))
      {
         echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
         echo "<td>"; echo $row['bid']; echo "</td>";
         echo "<td>"; echo $row['book_name']; echo "</td>";
         echo "<td>"; echo $row['author_name']; echo "</td>";
         echo "<td>"; echo $row['edition']; echo "</td>";
         echo "<td>"; echo $row['status']; echo "</td>";
         echo "<td>"; echo $row['quantity']; echo "</td>";
         echo "<td>"; echo $row['department']; echo "</td>";
         echo "</tr >";
             }

         }
      }

       else 
    {
       $sql="SELECT * from `books` ORDER BY `book_name`,'author_name'";
       $res=mysqli_query($db,$sql);
       echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";

       echo "<th >";  echo "ID" ;echo "</th>";
       echo "<th >";  echo "Book Name" ;echo "</th>";
       echo "<th >";  echo "Authors" ;echo "</th>";
       echo "<th >";  echo "Edition" ;echo "</th>";
       echo "<th >";  echo "Status" ;echo "</th>";      
       echo "<th >";  echo "Quantity" ;echo "</th>";
       echo "<th >";  echo "Department" ;echo "</th>"; 

      echo "</tr>"; 

      while($row =mysqli_fetch_assoc($res))
      {
      	 echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
      	 echo "<td>"; echo $row['bid']; echo "</td>";
      	 echo "<td>"; echo $row['book_name']; echo "</td>";
      	 echo "<td>"; echo $row['author_name']; echo "</td>";
      	 echo "<td>"; echo $row['edition']; echo "</td>";
      	 echo "<td>"; echo $row['status']; echo "</td>";
      	 echo "<td>"; echo $row['quantity']; echo "</td>";
      	 echo "<td>"; echo $row['department']; echo "</td>";
      	 echo "</tr >";
      }
     }

     
?>
</div> 
</body>
</html>