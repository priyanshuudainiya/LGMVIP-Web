<?php

    require 'DBConnect.php';

    if(isset($_POST['cid'])){
        $db = new DBconnect();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT subject.subject_name,subject.id FROM subjectcombination join  subject on  subject.id=subjectcombination.subject_id WHERE subjectcombination.class_id=".$_POST['cid']." order by subject.subject_name");
        $stmt->execute();

        $subjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($subjects);
    }


?>