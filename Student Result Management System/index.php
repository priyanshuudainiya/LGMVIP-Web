<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <title>Home</title>
</head>
<body>
    <div class="container-fluid homeBack ">

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

      <div class="container getData">
        <form  method="post" action="result.php">
          <header><strong> Student Result Management System </strong></header>
          <hr>

          <label for=""><strong> Get your result here! </strong></label> <br> <br>

          <label for="rollno"> Roll No. :</label> <br>
          <input type="text" name="rollno" class="form-control box1" placeholder="Please enter the roll no..." required > <br>
          
          <label for="std"> Standard : </label> <br>
                    <select name="class_name" id="class_name" class="form-control" required>
                        <option required>Select Class Name</option>
                        <?Php 
                            require 'data.php';
                            $classes = loadClass();
                            foreach ($classes as $class) {
                                echo "<option id='".$class['id']."' value='".$class['id']."'>".$class['class_name']."</option>";
                            }
                        ?>
                    </select><br>

          <button class="btn btn-primary bttn" type="submit" name="get_result"> Search </button> <br>
        </form>
      </div>
      

    </div>
</body>
</html>