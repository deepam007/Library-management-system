
<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
   <title>Student Registration</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" type="text/css" href="style.css">
  
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title></title>

<style type="text/css">
  nav{
    float: right;
    word-spacing: 30px; 
    padding: 20px;
    margin-top: -20px;
}
li a{
    color: white;
    text-decoration: none;
}

nav li{
    display: inline-block;
    
}
nav i{
    margin-top: 20px;
}
</style>

</head>
<body>
  <header>
     <div class="logo">
      <img src="images/image1.jpg" >
      <h3> LIBRARY MANAGEMENT SYSTEM </h3>
     </div>
      <nav>
         <i class="fa fa-home" style="font-size: 52px;" aria-hidden="true"></i>
         <i class="fa fa-book" style="font-size: 45px;
         padding-left: 5px;"  aria-hidden="true"></i>     
         <i class="fa fa-sign-in" style="font-size: 45px;
         padding-left: 37px;"  aria-hidden="true"></i>  
         <i class="fa fa-lock" style="font-size: 45px;
         padding-left: 54px;"   aria-hidden="true"></i> 
         <i class="fa fa-comments" style="font-size: 45px;
         padding-left: 20px;" aria-hidden="true"></i>     
        <ul>
              
          <li><a href="index.php">HOME</a></li>
          <li><a href="books.php">BOOKS</a></li>
          <li><a href="login.php">LOGIN</a></li>
         
          <li><a href="feedbak.php">Feedback</a></li>
        </ul>

      </nav>

    </header>
<br><br>
  <section style="width: 400px; height: 400px; background-color: black; color: white; margin-left: 500px;">
    <form style="text-align: center;padding-top: 100px;" method="post" action="">

      <p style="padding-left:10px; font-size: 25px; "> Login as:</p>
      <br><br>
          <input type="radio" name="user" id="admin" value="admin">
          <label for="admin">Admin</label>
          <input type="radio" name="user" id="student" value="student" checked="">
          <labe for="student">Student</label>
            <br><br>
            <button type="submit" name="submit">
              OK
            </button>
    </form>

  </section>
     
     <?php
        if(isset($_POST['submit']))
        {
          if($_POST['user']=='admin')
          {
            ?>
            <script type="text/javascript">
              window.location="admin/registration.php";
            </script>
            <?php
          }

          else
        {
          ?>
            <script type="text/javascript">
              window.location="student/registration.php";
            </script>
            <?php
        }

     }

  ?>

</body>
</html>

