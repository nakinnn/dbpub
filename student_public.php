<?php
require_once('config/db.php');
session_start();
?>
<?php
if (isset($_REQUEST['show_id'])) {
    try {
        $student_id = $_REQUEST['show_id'];
        $sql = "SELECT * FROM student_info JOIN student_public ON student_info.student_id = student_public.student_id 
        JOIN student_status ON student_info.student_status_id = student_status.id 
        JOIN student_plan ON student_info.student_plan_id = student_plan.id 
        JOIN student_course ON student_info.student_course_id = student_course.id 
        JOIN publication_data ON student_public.publication_data_id = publication_data.id 
        JOIN publication_type ON student_public.publication_type_id = publication_type.id
        JOIN education_level ON student_info.education_level = education_level.id
        WHERE student_info.student_id = :student_id
        ";
        $select_stmt = $conn->prepare($sql);
        $select_stmt->bindParam(':student_id', $student_id);
        $select_stmt->execute();
        $rowCount = $select_stmt->rowCount();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication - <?php echo $student_id?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php include 'navbar.php';?>
    <div class="container">
      <table id="vertical-2" class="styled-table">
        <thead>
          <tr>
          <th>รหัสนักศึกษา</th>
          </tr>
          <tr>
          <th>ชื่อ-สกุล</th>
          </tr>
          <tr>
          <th>หลักสูตร</th>
          </tr>
          <tr>
          <th>จำนวนการตีพิมพ์</th>
          </tr>
          <tr>
          <th>สถานะนักศึกษา</th>
          </tr>
          <tr>
          <th>แผนการศึกษา</th>
          </tr>
          <tr>
          <th>อาจารย์ที่ปรึกษาหลัก</th>
          </tr>
          <tr>
          <th>อาจารย์ที่ปรึกษาร่วม</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
            $student_id = $row['student_id'];
            $student_name = $row['student_name'];
            $student_status = $row['status'];
            $student_course = $row['course_name'];
            $total_pub = $row['total_pub'];
            $student_principal_advisor = $row['student_principal_advisor'];
            $student_associate_advisor = $row['student_associate_advisor'];
            $student_plan = $row['plan'];
            
          ?>
          <?php 
           /*  if($rowCount >= $total_pub){
              $sql2 = "UPDATE student_info SET student_status_id = 2 WHERE student_id = :student_id";
              $update_stmt = $conn->prepare($sql2);
              $update_stmt->bindParam(':student_id', $student_id);
              $update_stmt->execute();
            }else{
               $sql2 = "UPDATE student_info SET student_status_id = 1 WHERE student_id = :student_id";
              $update_stmt = $conn->prepare($sql2);
              $update_stmt->bindParam(':student_id', $student_id);
              $update_stmt->execute();
            } */
          ?>
          <tr>
              <td><?php echo $student_id?></td>
          </tr>
          <tr>
              <td><?php echo $student_name?></td>
          </tr>
          <tr>
              <td><?php echo $student_course?></td>
          </tr>
          <tr>
              <td><?php echo $rowCount?>/<?php echo $total_pub?></td>
          </tr>
          
          <tr>
              <td><?php echo $student_status?></td>
          </tr>
          <tr>
              <td><?php echo $student_plan?></td>
          </tr>
          <tr>
              <td><?php echo $student_principal_advisor?></td>
          </tr>
          <tr>
              <td><?php echo $student_associate_advisor?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="container">
    <table id="example" class="styled-table table table-hover">
        <thead>
      <tr class="table align-middle text-center">
        <th>ลำดับ</th>
        <th>ชื่อผลงาน</th>
        <th>ประเภทการเผยแพร่</th>
        <th>ฐานข้อมูลวารสาร</th>
        <th>การนำไปใช้ในองค์กร</th>
        <th>ชื่อวารสาร/ชื่องานประชุม,สถานที่</th>
        <th>ปี/เดือน/วัน เริ่มต้น</th>
        <th>ปี/เดือน/วัน สิ้นสุด</th>
        <th>ปีปฎิทิน</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $count=1;
        $student_id = $_REQUEST['show_id'];
        /* $sql = "SELECT * FROM student_info,student_public,publication_data,publication_type,student_plan,student_status,student_course 
        WHERE student_info.student_id = :student_id
        AND student_info.student_id = student_public.student_id 
        AND student_public.publication_data_id = publication_data.id
        AND student_public.publication_type_id = publication_type.id
        AND student_info.student_status_id = student_status.id
        AND student_info.student_course_id = student_course.id
        AND student_info.student_plan_id = student_plan.id
        "; */
        $sql = "SELECT * FROM student_info JOIN student_public ON student_info.student_id = student_public.student_id 
        JOIN student_status ON student_info.student_status_id = student_status.id 
        JOIN student_plan ON student_info.student_plan_id = student_plan.id 
        JOIN student_course ON student_info.student_course_id = student_course.id 
        JOIN publication_data ON student_public.publication_data_id = publication_data.id 
        JOIN publication_type ON student_public.publication_type_id = publication_type.id 
        WHERE student_info.student_id = :student_id 
        ORDER BY publication_year DESC";
        $select_stmt2 = $conn->prepare($sql);
        $select_stmt2->bindParam(':student_id', $student_id);
        $select_stmt2->execute();
        if ($select_stmt2-> rowCount() > 0){
          while ($row=$select_stmt2-> fetch(PDO::FETCH_ASSOC)) {
            
            $publication_name = $row['publication_name'];
            $publication_type_id = $row['publication_type'];
            $publication_data_id = $row['publication_data'];
            $publication_used = $row['publication_used'];
            $publication_description = $row['publication_description'];
            $publication_start = $row['publication_start'];
            $publication_end = $row['publication_end'];
            $publication_year = $row['publication_year'];
          ?>
          <tr class="table align-middle">
            <td class="text-center"><?php echo $count?></td>
            <td><?php echo $publication_name?></td>
            <td><?php echo $publication_type_id?></td>
            <td><?php echo $publication_data_id?></td>
            <td><?php echo $publication_used?></td>
            <td><?php echo $publication_description?></td>
            <td><?php echo $publication_start?></td>
            <td><?php echo $publication_end?></td>
            <td><?php echo $publication_year?></td>
                   
            </tr>
            <?php
                  $count=$count+1;
                }
              }
            ?>
      </tbody>
    </table>
    </div>
</body>
</html>