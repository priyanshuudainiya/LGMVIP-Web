<?php
      include 'connection.php'; 

      

      if(isset($_POST['get_result'])){
    $class_name = $_POST['class_name'];
    $roll_no = $_POST['rollno'];
    // print_r($_POST);

    $selectqueryRollno = "SELECT * FROM student WHERE roll_no='$roll_no'";

    $class_id = '';
	$student_id = '';
	$result_id = '';

    $runquery = mysqli_query($con,$selectqueryRollno);
    // print_r($runquery);

        foreach($runquery as $student_data){
            $student_id = $student_data['id'];
            $class_id = $student_data['class_id'];
            $student_name = $student_data['student_name'];
            $student_roll_no = $student_data['roll_no'];
            $student_email = $student_data['email'];
            $student_gender = $student_data['gender'];
            $student_dob = $student_data['dob'];
            $class_name2 = $student_data['class_name'];
        }

        $selectqueryClass = "SELECT * FROM class WHERE class_name='$class_name'";

        $runquery2 = mysqli_query($con,$selectqueryClass);

        $seletqueryResult = "SELECT * FROM result WHERE class_id = '$class_id' AND student_id = '$student_id'";

        $runquery3 = mysqli_query($con,$seletqueryResult);

        foreach($runquery3 as $result){
            $result_id = $result['id'];
            $result_date = $result['result_create_date'];
            $percentage = $result['percentage'];
            $total_marks = $result['total_marks'];
            $status = $result['status'];
            // echo $result_id;
            // echo $result_date;
    
    
            $showResult = "SELECT subject.subject_name, marks.marks FROM marks INNER JOIN subject ON subject.id = marks.subject_id WHERE marks.result_id='$result_id'";

            $runquery4 = mysqli_query($con,$showResult);
            foreach($runquery4 as $marks){
                $subject_name = $marks['subject_name'];
                $marks = $marks['marks'];
            }
            // print_r($subject_name);
            // print_r($marks);
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

    <title>Result</title>
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

      <div class="getResult ">
      <div class="marksheet" id="marksheet">
            <div class="card m-4 p-4">
                <div>
                <table class="table table-striped table-bordered">
                        <tr>
                            <td colspan="2" style="text-align:center;font-size:22px; font-weight:700; color:#594ef7; padding:15px 0px;" id="table_heading"><span>Result - </span><?php echo $class_name2; ?></td>
                                
                        </tr>
                        <tr>
                            <td><b>Student Name:  </b></td>
                            <td><?php echo $student_name; ?></td>
                        </tr>
                        <tr>
                            <td><b>Student Roll No.:  </b></td>
                            <td><?php echo $student_roll_no; ?></td>
                        </tr>
                        <tr>
                            <td><b>Student Email:  </b></td>
                            <td><?php echo $student_email; ?></td>
                        </tr>
                        <tr>
                            <td><b>Class Name:   </b></td>
                            <td><?php echo $class_name2; ?></td>
                        </tr>
                        <tr>
                            <td><b>Gender:  </b></td>
                            <td><?php echo $student_gender; ?></td>
                        </tr>
                        <tr>
                            <td><b>Date Of Birth: </b></td>
                            <td><?php echo $student_dob; ?></td>
                        </tr>
                    </table>
                </div>
                    
                <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            
                    <tr>
                        <th>S.No.</th>
                        <th>Subject Name</th>
                        <th>Obtain Marks</th>
                        <th>Total Marks</th>
                    </tr>
                    <?php 
                    $sn = 1;
                    $total =0;
                        foreach($runquery4 as $marks){
                            $subject_name = $marks['subject_name'];
                            $marks = $marks['marks'];
                            
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $subject_name; ?></td>
                        <td><?php echo $marks; ?></td>
                        <td>100</td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <td></td>
                        <td></td>
                        <td><b>Total Marks</b></td>
                        <td style="font-size:18px;"><?php echo $total_marks; ?>/400</td>
                    </tr>
                        

                    <tr>
                        <td></td>
                        <td><b>Percentage</b></td>
                        <td style="color:#594ef7; font-weight:600; font-size:20px;"><?php echo $percentage; echo "%" ?></td>
                    </tr>

                    <tr>
                        <td></td>
                    </tr>

                    <tr>
                        <td>Result Date</td>
                        <td><?php echo $result_date; ?></td>
                        <td><strong>Status</strong></td>
                        <td style="color:green; font-weight:700;"><?php echo $status; ?></td>
                    </tr>
                            
                </table> <br>
                <button class="btn btn-outline-success" onclick="window.print();">Print</button>
            </div>
        </div>
        
      </div>
      

    </div>
</body>
</html>