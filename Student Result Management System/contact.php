<?php

  include 'connection.php';

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

    <title>Contact-Us</title>
</head>
<body>
    <div class="container-fluid contactBack ">

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

      <div class="container getMessage">
      <form method="POST">

        <header><strong> Send us a Message </strong></header>
          <hr>

        <label for="name">Name :</label>
        <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name..." required><br>
    
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your eamil..." required><br>
    
        <label for="mobile">Mobile No. :</label>
        <input type="number" id="mobile" name="mobile" class="form-control" placeholder="Enter your mobile no..." required><br>
    
        <label for="message">Type Message :</label>
        <textarea id="message" name="message" class="form-control" placeholder="Write something..." style="height:200px" required></textarea>
        <br><br>
    
        <button type="submit" class="btn btn-success bttn" name="send_msg"> Submit </button>
    
      </form>

    </div>


    </div>
</body>
</html>



<?php

if(isset($_POST['send_msg'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $message = $_POST['message'];


    $insertquery = "INSERT INTO message (name, email, mobile, message) VALUES ('$name','$email','$mobile','$message')";

    $res = mysqli_query($con,$insertquery);

    if($res){
        ?>
        <script>
            alert("Message send successfully");
        </script>
        <?php
    }
}


?>