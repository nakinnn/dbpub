<?php
require_once('config/db.php');
session_start();
?>
<?php
    if(isset($_GET['data_id']) && isset($_GET['show_year'])){
        $year = $_GET['show_year'];
        $data_id = $_GET['data_id'];
        $sql2 = "SELECT * FROM publication_data WHERE id = $data_id";
        $select_stmt2 = $conn->prepare($sql2);
        $select_stmt2->execute();
        $row=$select_stmt2-> fetch(PDO::FETCH_ASSOC);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $year . '-' . $row['publication_data'] ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="style.css">
     
</head>
<body>
<?php include 'navbar.php';?>
<div class="container">
  
    <table id="example" class="styled-table table table-hover">
        <thead>
      <tr class="table align-middle text-center">
        <th>หลักสูตร</th>
        <th>รหัสนักศึกษา</th>
        <th>ชื่อ-สกุล</th>
        <th>แผนการศึกษา</th>
        <th>อาจารย์ที่ปรึกษาหลัก</th>
        <th>อาจารย์ที่ปรึกษาร่วม</th>
        <th>ชื่อผลงาน</th>
        <th>ประเภทการเผยแพร่</th>
        <th>ฐานข้อมูลวารสาร</th>
        <th>การนำไปใช้ในองค์กร</th>
        <th>ปีปฎิทิน</th>
      </tr>
    </thead>
    <tbody>
      <?php
        /* $sql = "SELECT * FROM student_info,student_public,publication_data,publication_type,student_plan,student_status,student_course
        WHERE student_info.student_id = student_public.student_id
        AND student_public.publication_year = $year
        AND student_public.publication_data_id = $data_id 
        AND student_public.publication_data_id = publication_data.id
        AND student_public.publication_type_id = publication_type.id
        AND student_info.student_status_id = student_status.id
        AND student_info.student_course_id = student_course.id
        AND student_info.student_plan_id = student_plan.id
        ORDER BY student_public.publication_id DESC;
        "; */
        $sql = "SELECT * FROM student_info JOIN student_public ON student_info.student_id = student_public.student_id 
        JOIN student_status ON student_info.student_status_id = student_status.id 
        JOIN student_plan ON student_info.student_plan_id = student_plan.id 
        JOIN student_course ON student_info.student_course_id = student_course.id 
        JOIN publication_data ON student_public.publication_data_id = publication_data.id 
        JOIN publication_type ON student_public.publication_type_id = publication_type.id
        WHERE student_public.publication_year = $year
        AND student_public.publication_data_id = $data_id";
        $select_stmt = $conn->prepare($sql);
        $select_stmt->execute();

        if ($select_stmt-> rowCount() > 0){
          while ($row=$select_stmt-> fetch(PDO::FETCH_ASSOC)) {
            $student_id = $row['student_id'];
            $student_name = $row['student_name'];
            $student_course = $row['course_name'];
            $student_principal_advisor = $row['student_principal_advisor'];
            $student_associate_advisor = $row['student_associate_advisor'];
            $student_plan = $row['plan'];
            $publication_name = $row['publication_name'];
            $publication_type_id = $row['publication_type'];
            $publication_data_id = $row['publication_data'];
            $publication_used = $row['publication_used'];
            $publication_description = $row['publication_description'];
            $publication_start = $row['publication_start'];
            $publication_end = $row['publication_end'];
            $publication_year = $row['publication_year'];
          ?>
          <tr class="table align-middle text-center">
            <td><?php echo $student_course?></td>
            <td><?php echo $student_id?></td>
            <td><a href="student_public.php?show_id=<?php echo $student_id;?>" target="_blank"><?php echo $student_name?></a></td>    
            <td><?php echo $student_plan?></td>
            <td><?php echo $student_principal_advisor?></td>
            <td><?php echo $student_associate_advisor?></td>
            <td><?php echo $publication_name?></td>
            <td><?php echo $publication_type_id?></td>
            <td><?php echo $publication_data_id?></td>
            <td><?php echo $publication_used?></td>
            <td><?php echo $publication_year?></td>
                   
            </tr>
            <?php

                }
              }else {
                ?>
                <tr class="text-center">
                  <td colspan="14">Data Not Found</td>
                </tr>
                <?php
              }
            ?>
      </tbody>
    </table>
</body>
</html>