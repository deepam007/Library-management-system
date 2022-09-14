<?php
  include "navbar.php";
  include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Book Requested</title>
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
.scroll{
   width: 100%;
   height: 400px;
   overflow: auto;
}
th,td{
  width: 10%;
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
           height=120 width=120 src='images/".$_SESSION['img1']." '>";
           echo "<br>"; 
        //  echo $_SESSION['img'];
           echo "<div style='margin-top:10px;
           margin-left:20px;
           font-size:30px; color:white;'>";
             echo "&nbsp <b>$_SESSION[login_user]</b>";
             echo "</div>";
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

  <div style="width: 1100px; text-align: center;margin-left: 250px; margin-top: 100px;">
 <!--   <h2 style="text-align: center; font-size: 40px;">Information Of Issued Books</h2>  -->


  <form method="post" action="">
      <input type="text" name="username" class="form-control" placeholder="Username" required=""> 
      <input style="margin-top: 10px;" type="text" name="bid" class="form-control" placeholder="bid" required=""> <br>
      <button class="btn btn-default" name="submit" type="submit" style="background-color: black; color: white;">
        Submit
      </button>
   </form>
   <br><br>
      <form style="margin-left: 00px;" action="" method="post">
        <button class="btn btn-default" name="submit1" type="submit" style="background-color: black; color: white;">
        Returned
      </button>

        <button class="btn btn-default" name="expired" type="submit" style="background-color: black; color: white;">
        Expired
      </button>

      </form>
<?php
     if(isset($_SESSION['login_user']))
     {
        if(isset($_POST['submit']))
        {

// fine claculation
         
         $x=mysqli_query($db,"SELECT return_date from issue_book where username='$_POST[username]' and bid='$_POST[bid]'");
    while($row=mysqli_fetch_assoc($x))
    {
       $rtrn_date=strtotime($row['return_date']);
       $crnt=strtotime(date("Y-m-d"));
       if($crnt>$rtrn_date)
       {
         $diff=$crnt-$rtrn_date;
         $day=floor($diff/(60*60*24));
         $fine=$day*.10;
         $y=date("Y-m-d");
         mysqli_query($db,"INSERT into fine VALUES('$_POST[username]', '$_POST[bid]' , '$y' , '$day','$fine','not paid')");
       }
    }

         


          ////////////////////

          mysqli_query($db,"UPDATE issue_book SET approve='Returned' where username='$_POST[username]' and bid='$_POST[bid]'; ");
          mysqli_query($db,"UPDATE books SET quantity=quantity+1 where bid='$_POST[bid]'; ");
          

        }
     }
?>


 

 <?php
    
      if(isset($_SESSION['login_user']))
{  

      ?>
      

        <h2 style="font-size: 40px; padding-top: 5px; height: 60px; width: 800px; margin-left: 100px; background-color: black; color: white;">About Issued Books..</h2>


        <?php

//  returned  books///////////////////////////////////////////////
        if(isset($_POST['submit1']))
          {
            $sql1="SELECT * from `student`,`issue_book`,`books` where `books`.`bid`=`issue_book`.`bid` AND `student`.`username`=`issue_book`.`username` AND approve='Returned' ";
             $res1=mysqli_query($db,$sql1);
             if(mysqli_num_rows($res1)==0)
             {
              echo "no one has requested for a books!";
             }
             else
             {
         
                echo "<table class ='table table-bordered table-hover' style='width:98%;'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";
       echo "<th >";  echo "Roll no." ;echo "</th>";
       echo "<th >";  echo "Username" ;echo "</th>";
       echo "<th >";  echo "Book-ID" ;echo "</th>";
       echo "<th >";  echo "Book Name" ;echo "</th>";
       echo "<th >";  echo "Authors" ;echo "</th>";
       echo "<th >";  echo "Edition" ;echo "</th>";
       echo "<th >";  echo " Approve Status" ;echo "</th>";      
       echo "<th >";  echo "Issued Date" ;echo "</th>";
       echo "<th >";  echo "Return Date" ;echo "</th>"; 

      echo "</tr>"; 
     echo "</table>";
    echo "<div class='scroll'>";
    echo "<table class ='table table-bordered table-hover'>";
      while($row =mysqli_fetch_assoc($res1))
      {         
         echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
         echo "<td>"; echo $row['rollno']; 
           echo "</td>";
         echo "<td>"; echo $row['username']; 
           echo "</td>";
         echo "<td>"; echo $row['bid']; 
           echo "</td>";
         echo "<td>"; echo $row['book_name']; 
           echo "</td>";
         echo "<td>"; echo $row['author_name']; 
           echo "</td>";
         echo "<td>"; echo $row['edition']; 
           echo "</td>";
         if($row['approve']=="Expired")
        { echo "<td>"; echo "<p style='background-color:red;'>";
         echo $row['approve']; 
           echo "</p>";
           echo "</td>";}
           else
           {echo "<td>"; echo $row['approve']; 
           echo "</td>";}

         echo "<td>"; echo $row['issue_date']; 
           echo "</td>";
         echo "<td>"; echo $row['return_date']; 
           echo "</td>";
         echo "</tr >";
      }
      echo "</table>";
      echo "</div>";
         }
   }


// expired books      ////////////////////////////////////////////////////////////////
      elseif (isset($_POST['expired'])) 
   {
        $sql1="SELECT * from `student`,`issue_book`,`books` where `books`.`bid`=`issue_book`.`bid` AND `student`.`username`=`issue_book`.`username` AND approve='Expired' ";
             $res1=mysqli_query($db,$sql1);
             if(mysqli_num_rows($res1)==0)
             {
              echo "no one has requested for a books!";
             }
             else
             {
          
                echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";
       echo "<th >";  echo "Roll no." ;echo "</th>";
       echo "<th >";  echo "Username" ;echo "</th>";
       echo "<th >";  echo "Book-ID" ;echo "</th>";
       echo "<th >";  echo "Book Name" ;echo "</th>";
       echo "<th >";  echo "Authors" ;echo "</th>";
       echo "<th >";  echo "Edition" ;echo "</th>";
       echo "<th >";  echo " Approve Status" ;echo "</th>";      
       echo "<th >";  echo "Issued Date" ;echo "</th>";
       echo "<th >";  echo "Return Date" ;echo "</th>"; 

      echo "</tr>"; 
     echo "</table>";
    echo "<div class='scroll'>";
    echo "<table class ='table table-bordered table-hover'>";
      while($row =mysqli_fetch_assoc($res1))
      {         
         echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
         echo "<td>"; echo $row['rollno']; 
           echo "</td>";
         echo "<td>"; echo $row['username']; 
           echo "</td>";
         echo "<td>"; echo $row['bid']; 
           echo "</td>";
         echo "<td>"; echo $row['book_name']; 
           echo "</td>";
         echo "<td>"; echo $row['author_name']; 
           echo "</td>";
         echo "<td>"; echo $row['edition']; 
           echo "</td>";
         if($row['approve']=="Expired")
        { echo "<td>"; echo "<p style='background-color:red;'>";
         echo $row['approve']; 
           echo "</p>";
           echo "</td>";}
           else
           {echo "<td>"; echo $row['approve']; 
           echo "</td>";}

         echo "<td>"; echo $row['issue_date']; 
           echo "</td>";
         echo "<td>"; echo $row['return_date']; 
           echo "</td>";
         echo "</tr >";
      }
      echo "</table>";
      echo "</div>";
         }
    }
      
    
   else
  {    
             $sql1="SELECT * from `student`,`issue_book`,`books` where `books`.`bid`=`issue_book`.`bid` AND `student`.`username`=`issue_book`.`username` AND approve!='' ";
             $res1=mysqli_query($db,$sql1);
             if(mysqli_num_rows($res1)==0)
             {
              echo "no one has requested for a books!";
             }
             else
             {
          
                echo "<table class ='table table-bordered table-hover'>";
       echo "<tr style='background-color: #3c765161; font-size:20px;'>";
       echo "<th >";  echo "Roll no." ;echo "</th>";
       echo "<th >";  echo "Username" ;echo "</th>";
       echo "<th >";  echo "Book-ID" ;echo "</th>";
       echo "<th >";  echo "Book Name" ;echo "</th>";
       echo "<th >";  echo "Authors" ;echo "</th>";
       echo "<th >";  echo "Edition" ;echo "</th>";
       echo "<th >";  echo " Approve Status" ;echo "</th>";      
       echo "<th >";  echo "Issued Date" ;echo "</th>";
       echo "<th >";  echo "Return Date" ;echo "</th>"; 

       echo "</tr>"; 
         echo "</table>";
          echo "<div class='scroll'>";
      echo "<table class ='table table-bordered table-hover'>";
      while($row =mysqli_fetch_assoc($res1))
      {         
         echo "<tr style=' background-color: #33b75c1f;font-size:18px;'>";
         echo "<td>"; echo $row['rollno']; 
           echo "</td>";
         echo "<td>"; echo $row['username']; 
           echo "</td>";
         echo "<td>"; echo $row['bid']; 
           echo "</td>";
         echo "<td>"; echo $row['book_name']; 
           echo "</td>";
         echo "<td>"; echo $row['author_name']; 
           echo "</td>";
         echo "<td>"; echo $row['edition']; 
           echo "</td>";
           if($row['approve']=="Expired")
          { echo "<td>"; echo "<p style='background-color:red;'>";
           echo $row['approve']; 
           echo "</p>";
           echo "</td>";}
           else
           {echo "<td>"; echo $row['approve']; 
           echo "</td>";}

         echo "<td>"; echo $row['issue_date']; 
           echo "</td>";
         echo "<td>"; echo $row['return_date']; 
           echo "</td>";
         echo "</tr >";
         }
         echo "</table>";
         echo "</div>";
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

  </div>
</div>
</body>
</html> 