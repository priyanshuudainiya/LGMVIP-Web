<?php

include "connection.php";

if(isset($_POST['submit'])){
  $email = $_POST['uname'];
  $pswd = $_POST['pswd'];


  $select = "SELECT * FROM  admin_login WHERE username='$email' && password='$pswd' ";
  $query = mysqli_query($con,$select);

  $email_count = mysqli_num_rows($query);

  if($email_count == 1){

$_SESSION['email'] = $email;
?>
  <script>
    location.replace("admin-dash.php");
  </script>
<?php
  }
  else{
      ?>
          <script>
              alert("Wrong Login Information");
          </script>
      <?php
  }  
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title> Admin-Login </title>
</head>
<body>
    <div class="container-fluid adminlogBack ">

      <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img src="image/logo6.png" alt="Site Logo" class="logo">
          </a>
          
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php"> <i class='bx bx-home'></i> <b> Home </b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="contact.php"> <i class='bx bx-info-circle'></i> <b> Contact-Us </b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="aboutus.php"> <i class='bx bx-conversation'></i> <b> About-Us </b></a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="admin-login.php"> <i class='bx bx-log-in'></i> <b> Admin Login </b></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container getlogin">
        <form action="" method="POST">
          <header><strong> Login </strong></header>
          <hr>

          <label for=""><strong> Student Result Management System </strong></label> <br> <br>

          <label for="username"> Username : </label> <br>
          <input type="text" name="uname" class="form-control box1" placeholder="Enter your username..." required > <br>
          
          <label for="password"> Password : </label> <br>
          <input type="password" name="pswd" class="form-control box2" placeholder="Enter your password..." required > <br><br>

          <button type="submit" class="btn btn-primary bttn" name="submit"> Submit </button> <br>
        </form>

        <p class="text-center> Copyright © 2022 </p>
      </div>
      

    </div>
</body>
</html>
