
<?php

$username = "root";
$password = "";
$server = "localhost";
$database = "result_management";


$con = mysqli_connect($server,$username,$password,$database);

if($con){
   // echo "Connection Succesful...";

    ?>

    <script>
        // alert('Connection Succesful...')
    </script>

    <?php

}else{

    // echo "No Connection...";
    die("No Connection..." . mysqli_connect_error());
}

?>