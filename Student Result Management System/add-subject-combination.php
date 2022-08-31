<?php

    include 'connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/style2.css">

    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

    <title> Add Subject Combination </title>
</head>
<body>

<!-- -------------------------------------------------------------------------------------------------------------->
<!-- -------------------------------------------------------------------------------------------------------------->

<section class="sidebar">
        <div class="logo">
            <a href="admin-dash.php"><img src="image/avtar.png"><span> Welcome Admin! </span></a>
        </div>
        <ul class="side-menu">
            <li class="nav-item active">
                <a href="admin-dash.php">
                    <i class='bx bxs-dashboard' ></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a href="#">
                    <i class='bx bxs-dashboard' ></i>
                    <span>Dashboard</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Dashboard</a></li>
                </ul>
            </li> -->
            <li class="nav-item">
                <a href="#" class="dropdown-btn">
                    <i class='bx bx-user'></i>
                    <span>Students</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="add-student.php">Add Students</a></li>
                    <li><a href="manage-student.php">Manage Students</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="dropdown-btn">
                    <i class='bx bxs-widget'></i>
                    <span>Class</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="create-class.php">Create Class</a></li>
                    <li><a href="manage-class.php">Manage Classes</a></li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href="#" class="dropdown-btn">
                    <i class='bx bxs-book-content'></i>
                    <span>Subjects</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="create-subject.php">Create Subject</a></li>
                    <li><a href="manage-subject.php">Manage Subject</a></li>
                    <li><a href="add-subject-combination.php">Add Subject Combination</a></li>
                    <li><a href="manage-subject-combination.php">Manage Subject Combination</a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="dropdown-btn">
                    <i class='bx bx-info-circle' ></i>
                    <span>Result</span>
                    <i class="bx bxs-chevron-right"></i>
                </a>
                <ul class="sub-menu">
                    <li><a href="add-result.php">Add Result</a></li>
                    <li><a href="manage-result.php">Manage Result</a></li>
                </ul>
            </li>
        </ul>
        <ul class="log">
            <li class="nav-item">
                <a href="admin-logout.php">
                    <i class='bx bx-log-out'></i>
                    <span>Log Out</span>
                </a>
            </li>
        </ul>
    </section>

  <!-- ----------------------------------------------------------------------------------------------------------------
  -----------------------------------------------------------------------------------------------------------------   -->

    <section class="main">
        <div class="navigation">
            <div class="n1">
                <div class="search">
                    <i class='bx bx-search-alt'></i>
                    <input type="text" name="search" id="search" placeholder="Search Here...">
                </div>
            </div>
            <div class="profile">
                <a href="message.php"><i class='bx bx-bell'></i></a>
                <img src="image/avtar.png" alt="image/avtar">
            </div>
        </div>


<!-- ---------------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------------- -->

        <div class="page-name">
            <h3>Add Subject Combination</h3>
        </div>

        <div class="card">
            <form method="post">
                    <label>Class Name:</label>
                    <select name="class_id" class="form-control mt-2">
                        <option>Select Class</option>
                        <?Php 
                                            require 'data.php';
                                            $classes = loadClass();
                                            foreach ($classes as $class) {
                                                echo "<option id='".$class['id']."' value='".$class['id']."'>".$class['class_name']."</option>";
                                            }
                                        ?>
                    </select><br>
                    <label>Subject Name:</label>
                    <select name="subject_id" class="form-control mt-2">
                        <option>Select Subject</option>
                        <?Php
                                            $subjects = loadSubject();
                                            foreach ($subjects as $subject) {
                                                echo "<option id='".$subject['id']."' value='".$subject['id']."'>".$subject['subject_name']."</option>";
                                            }
                                        ?>
                    </select><br>
                    <button class="btn btn-success" name="add_subject_combination" type="submit">ADD</button>
            </form>
        </div>
        
    </section>




    <script src="js/jquery.main.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
    </script>

</body>
</html>

<?php
if(isset($_POST['add_subject_combination'])){
    $class_id = $_POST['class_id'];
    $subject_id = $_POST['subject_id'];
    $subjectCombination_create_date  = date("d-m-Y");

    $insertquery = "INSERT INTO subjectCombination (class_id,subject_id,subjectCombination_create_date ) VALUES ('$class_id','$subject_id','$subjectCombination_create_date ')";

    $res = mysqli_query($con,$insertquery);

    if($res){
        ?>
        <script>
            alert("Subject Combination Added Successfully");
        </script>
        <?php
    }
}


?>