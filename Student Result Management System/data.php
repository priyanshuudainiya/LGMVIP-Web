<?php

    require 'DBConnect.php';

    if(isset($_POST['cid'])){
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM student WHERE class_id = ".$_POST['cid']);
        $stmt->execute();

        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($students);
    }



    function loadClass() {
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM class");
        $stmt->execute();

        $class = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $class;

    }

    function loadSubject() {
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM subject");
        $stmt->execute();

        $subject = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $subject;
    }


?>