<?php

    require 'DBConnect.php';

    if(isset($_POST['cid'])){
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM class WHERE id = ".$_POST['cid']);
        $stmt->execute();

        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($students);
    }

?>