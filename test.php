<?php
require_once('config/db.php');
session_start();
?>
<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Add select drop-down filter to DataTable</title>
  <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script defer src="script.js"></script>
 
  
<style>
  select.form-control{
    display: inline;
    width: 200px;
    margin-left: 25px;
  }
</style>
</head>

<body>
    <table cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
  <div class="container mt-4">
    <!-- Create the drop down filter -->
    <div class="category-filter">
      <select id="categoryFilter" class="form-control">
        <option value="">หลักสูตรทั้งหมด</option>
        <option value="MBA">MBA</option>
        <option value="Hip Hop">MBA.Mk</option>
        <option value="IMBA">IMBA</option>
        <option value="M.Acc">M.Acc</option>
        <option value="MPA">MPA</option>
        <option value="Ph.D.">Ph.D.</option>
        <option value="CoE">CoE</option>
      </select>
    </div>
    
    

    <!-- Set up the datatable -->
    <table class="table" id="example">
      <thead>
      <tr>
        <th>รหัสนักศึกษา</th>
        <th>ชื่อ-สกุล</th>
        <th>สถานะนักศึกษา</th>
        <th>แผนการศึกษา</th>
        <th>อาจารย์ที่ปรึกษาหลัก</th>
        <th>อาจารย์ที่ปรึกษาร่วม</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $select_stmt = $conn->prepare("SELECT * FROM student_info");
        $select_stmt->execute();
        $count=1;

        if ($select_stmt-> rowCount() > 0){
          while ($row=$select_stmt-> fetch(PDO::FETCH_ASSOC)) {
            $student_id = $row['student_id'];
            $student_name = $row['student_name'];
            $student_status = $row['student_status'];
            $student_course = $row['student_course'];
            $student_principal_advisor = $row['student_principal_advisor'];
            $student_associate_advisor = $row['student_associate_advisor'];

          ?>
          <tr>
            <td><?php echo $student_id?></td>
            <td><?php echo $student_name?></td>      
            <td><?php echo $student_status?></td> 
            <td><?php echo $student_course?></td>
            <td><?php echo $student_principal_advisor?></td>
            <td><?php echo $student_associate_advisor?></td>     
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