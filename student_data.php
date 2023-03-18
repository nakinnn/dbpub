<?php 
    require_once('config/db.php');

    if(isset($_POST['query'])){
        $inputtext = $_POST['query'];
        $sql = "SELECT student_id FROM student_info WHERE student_id LIKE :student_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['student_id' => '%' . $inputtext . '%']);
        $result = $stmt->fetchAll();

        if($result){
            foreach($result as $row){
                echo '<a class="list-group-item list-group-item-action border-1">'. $row['student_id'] .'</a>';
            }
        }else{
            echo '<p class="list-group-item border-1">No Student Found.</p>';
        }
    }


?>