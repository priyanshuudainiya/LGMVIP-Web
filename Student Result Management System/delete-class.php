<?php

    include 'connection.php';

    $id = $_GET['id'];

    $deletequery = "DELETE FROM class WHERE id='$id'";

    $dquery = mysqli_query($con,$deletequery);

    if ($dquery) {
        ?>
        <script>
            alert("Data Deleted Sucessfully");
        </script>
        <?php
    }

    header('location:manage-class.php');
?>