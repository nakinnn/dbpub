<?php
require_once('config/db.php');
session_start();
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Student Progress</title>
  <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script defer src="script.js?v9999"></script>
    <link rel="stylesheet" href="style.css?v9999">
  
</head>
<body>
  <div class="container">

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Publication</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="student_progress.php" class="nav-link active">Progress</a></li>
        <li class="nav-item"><a href="report.php" class="nav-link">Report</a></li>
      </ul>
    </header>
  
    </div>
  <div class="container col-sm-6 mt-5">
      <div class="row">
        <div class="col">
          <thead>
                <th>
                  <label class="col-sm-2 col-form-label">Course :</label>
                </th>
              </thead>
              <tbody>
                <td>
                  <select id="courseFilter" class="form-control">
                          <option value="">หลักสูตรทั้งหมด</option>
                          <option value="MBA">MBA</option>
                          <option value="MBA.Mk">MBA.Mk</option>
                          <option value="IMBA">IMBA</option>
                          <option value="M.Acc">M.Acc</option>
                          <option value="MPA">MPA</option>
                          <option value="Ph.D.">Ph.D.</option>
                        </select>
                </td>
              </tbody>
        </div>
        <div class="col">
          <thead>
                <th>
                  <label class="col-sm-2 col-form-label">Status :</label>
                </th>
              </thead>
              <tbody>
                <td>
                  <select id="statusFilter" class="form-control">
                      <option value="">สถานะนักศึกษา</option>
                      <option value="กำลังศึกษา">กำลังศึกษา</option>
                      <option value="สำเร็จการศึกษา">สำเร็จการศึกษา</option>
                      <option value="ไม่มาลงทะเบียน">ไม่มาลงทะเบียน</option>
                   </select>
                </td>
              </tbody>
        </div>
        
      </div>
      <div class="row mt-2">
        <div class="col">
                  <label class="col-sm-2 col-form-label">Start :</label>
                  <input type="text" id="min" name="min" placeholder="Start Date" class="form-control">
        </div>
        <div class="col">
                  <label class="col-sm-2 col-form-label">End :</label>
                  <input type="text" id="max" name="max" placeholder="End Date" class="form-control">
        </div>
      </div>
  </div>
</div>

<div class="container mt-3">
    <a href="addPublication.php" class="btn btn-success mb-2" style="height:40px">Add Publication</a>
    <a href="addStudent.php" class="btn btn-success mb-2" style="height:40px">Add Student</a>
    <table id="example" class="styled-table table table-hover display table-responsive nowrap">
        <thead>
      <tr class="text text-center">
        <th>ลำดับ</th>
        <th>หลักสูตร</th>
        <th>รหัสนักศึกษา</th>
        <th>ชื่อ-สกุล</th>
        <th>สถานะนักศึกษา</th>

        <th>แผนการศึกษา</th>
        <th>อาจารย์ที่ปรึกษาหลัก</th>
        <th>อาจารย์ที่ปรึกษาร่วม</th>
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
      
      $sql3 = "SELECT student_id,COUNT(student_id) as total FROM student_public  GROUP BY student_id";
        $select_stmt3 = $conn->prepare($sql3);
        $select_stmt3->execute();
        if ($select_stmt3-> rowCount() > 0){
          while ($row=$select_stmt3-> fetch(PDO::FETCH_ASSOC)) {
            $student_id = $row['student_id'];
            $student_pub = $row['total'];
            $sql2 = "SELECT * FROM student_info JOIN education_level ON student_info.education_level = education_level.id WHERE student_id = :student_id";
              $select_stmt2 = $conn->prepare($sql2);
              $select_stmt2->bindParam(':student_id', $student_id);
              $select_stmt2->execute();
              if ($select_stmt2-> rowCount() > 0){
                while ($row=$select_stmt2-> fetch(PDO::FETCH_ASSOC)) {
                  $total_pub = $row['total_pub'];
                  if($student_pub >= $total_pub){
                    $sql2 = "UPDATE student_info SET student_status_id = 2 WHERE student_id = :student_id";
                    $update_stmt = $conn->prepare($sql2);
                    $update_stmt->bindParam(':student_id', $student_id);
                    $update_stmt->execute();
                  }/* else{
                    $sql2 = "UPDATE student_info SET student_status_id = 1 WHERE student_id = :student_id";
                    $update_stmt = $conn->prepare($sql2);
                    $update_stmt->bindParam(':student_id', $student_id);
                    $update_stmt->execute();
                  } */
                }
              }
          }
        }
        /* $sql = "SELECT * FROM student_info,student_public,publication_data,publication_type,student_plan,student_status,student_course 
        WHERE student_info.student_id = student_public.student_id 
        AND student_public.publication_data_id = publication_data.id
        AND student_public.publication_type_id = publication_type.id
        AND student_info.student_status_id = student_status.id
        AND student_info.student_course_id = student_course.id
        AND student_info.student_plan_id = student_plan.id
        ORDER BY student_public.publication_id DESC;
        "; */
        $sql = "SELECT * FROM student_public JOIN student_info ON student_public.student_id = student_info.student_id
        JOIN student_status ON student_info.student_status_id = student_status.id 
        JOIN student_plan ON student_info.student_plan_id = student_plan.id 
        JOIN student_course ON student_info.student_course_id = student_course.id 
        JOIN publication_data ON student_public.publication_data_id = publication_data.id 
        JOIN publication_type ON student_public.publication_type_id = publication_type.id 
        ORDER BY student_public.publication_end DESC";
        $select_stmt = $conn->prepare($sql);
        $select_stmt->execute();
        $count=1;

        if ($select_stmt-> rowCount() > 0){
          while ($row=$select_stmt-> fetch(PDO::FETCH_ASSOC)) {
            $student_id = $row['student_id'];
            $student_name = $row['student_name'];
            $student_status = $row['status'];
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
          
          <tr>
            <td class="text-center"><?php echo $count?></td>
            <td><?php echo $student_course?></td>
            <td><?php echo $student_id?></td>
            <td><a href="student_public.php?show_id=<?php echo $student_id;?>" ><?php echo $student_name?></a></td>    
            <td><?php echo $student_status?></td>

            <td><?php echo $student_plan?></td>
            <td><?php echo $student_principal_advisor?></td>
            <td><?php echo $student_associate_advisor?></td>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>