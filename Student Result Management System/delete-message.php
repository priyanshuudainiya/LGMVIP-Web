<?php

    include 'connection.php';

    $id = $_GET['id'];

    $deletequery = "DELETE FROM message WHERE id=$id";

    $dquery = mysqli_query($con,$deletequery);

    if ($dquery) {
        ?>
        <script>
            alert("Message Deleted Sucessfully");
        </script>
        <?php
    }

    header('location:message.php');
?>