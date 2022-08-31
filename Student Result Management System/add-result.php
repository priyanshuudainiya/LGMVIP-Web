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

    <title> Declare Result </title>
   
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
            <h3>Declare Result</h3>
        </div>
        <div class="card">
            <form method="post">
            <label>Class:</label>
                                    <select class="form-select" aria-label="Default select example" name="class_id" id="class">
                                        <option>Select a Class</option>
                                        <?Php 
                                            require 'data.php';
                                            $classes = loadClass();
                                            foreach ($classes as $class) {
                                                echo "<option id='".$class['id']."' value='".$class['id']."'>".$class['class_name']."</option>";
                                            }
                                        ?>
                                    </select><br>
                                    <label>Student Name:</label>
                                    <select class="form-select" aria-label="Default select example" name="student_id" id="student_id">
                                        <option>Select a Name</option>
                                    </select><br>
                                    <div id="subject_name"> Subject Name</div>
                                    <div id="class_name"></div>
                                
                        
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="add_result">ADD</button>
                            </div>
            </form>
        </div>
        
        
    </section>




    <script src="js/jquery.main.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#class").change(function(){
                var cid = $("#class").val();
                $.ajax({
                    url : 'data.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(students){
                        console.log(students);
                        students = JSON.parse(students);
                        $('#student_id').empty();
                        var student_html = '';
                        for(var i=0; i<students.length; i++){
                            
                            student_html += '<div class="form-group">';
                            student_html += '<option value="'+students[i].id+'">' + students[i].student_name + '</option>';
                            student_html += '</div>';
                        }
                        $('#student_id').html(student_html);
                    })
            })
        })

        $(document).ready(function(){
            $("#class").change(function(){
                var cid = $("#class").val();
                $.ajax({
                    url : 'data_class.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(classes){
                        console.log(classes);
                        classes = JSON.parse(classes);
                        $('#class_name').empty();
                        var class_html = '';
                        for(var i=0; i<classes.length; i++){
                            
                            class_html += '<div class="form-group">';
                            class_html += '<input type="hidden" name="class_name" value="'+classes[i].class_name+'" />';
                            class_html += '</div>';
                        }
                        $('#class_name').html(class_html);
                    })
            })
        })

        $(document).ready(function(){
            $("#class").change(function(){
                var cid = $("#class").val();
                $.ajax({
                    url : 'data_subject.php',
                    method : 'POST',
                    data : 'cid=' + cid
                }).done(function(subjects){
                        console.log(subjects);
                        subjects = JSON.parse(subjects);
                        $('#subject_name').empty();
                        var subject_html = '';
                        for(var i=0; i<subjects.length; i++){
                            
                            subject_html += '<div class="form-group">';
                            subject_html += '<label>'+subjects[i].subject_name+'</label>';
                            subject_html += '<input type="text" name="marks[]" class="form-control" required data-parsley-type="integer" data-parsley-trigger="keyup" />';
                            subject_html += '<input type="hidden" name="subject_id[]" value="'+subjects[i].id+'" />';
                            subject_html += '</div>';
                            // console.log(subjects);
                        }
                        $('#subject_name').html(subject_html);
                    })
            })
        })
    </script>

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

if(isset($_POST['add_result'])){
    $class_id = $_POST['class_id'];
    $subject_id_input = $_POST['subject_id'];
    $student_id = $_POST['student_id'];
    $marks_input = $_POST["marks"];
    $result_created_date = date("d-m-Y");

    $count = 0;
    $total =0;

    for($i=0; $i < count($marks_input); $i++){
        $total = $total + $marks_input[$i];   
    }
    $percentage = ($total)/count($marks_input);
    $status = "";
    if($percentage <= 33){
        $status = "FAIL";
    }
    else{
        $status = "PASS";
    }

    $insertquery = "INSERT INTO result (class_id,student_id,total_marks,percentage,status,result_create_date) VALUES ('$class_id','$student_id','$total','$percentage','$status','$result_created_date')";

    $res = mysqli_query($con,$insertquery);

        if($res){
            ?>
            <script>
                // alert("Data Inserted");
            </script>
            <?php
        }

    $result_id = mysqli_insert_id($con);
    for($i=0; $i < count($subject_id_input); $i++){
        $marks_data = array(
            $subject_id = $subject_id_input[$i],
            $marks = $marks_input[$i],
            
        );
        $insertquery1 = "INSERT INTO marks (result_id,subject_id,marks) VALUES ('$result_id','$subject_id','$marks')";

        $res1 = mysqli_query($con,$insertquery1);

        if($res1){
            ?>
            <!-- <script>
                alert("Data Marks Inserted");
            </script> -->
            <?php
        }
    }
}

?>