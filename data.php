<?php 
    header('Content-Type: application/json');
    
    require_once('config/db.php');
    
    $sql = "SELECT publication_year,publication_data_id,publication_data,COUNT(*) as total FROM student_public 
    JOIN publication_data ON student_public.publication_data_id = publication_data.id
    GROUP BY publication_data_id ORDER BY publication_data_id";
    $select_stmt = $conn->prepare($sql);
    
    $select_stmt->execute();

    $data = array();
    foreach($select_stmt as $row){
        $data[] = $row;
    }

    $conn = null;

    echo json_encode($data);



?>