<?php
require_once('config/db.php');
session_start();
            if(isset($_POST['btn_submit'])){
                    $student_id = $_POST['student_id'];
                    $student_name = $_POST['student_name'];
                    $student_status_id = $_POST['student_status_id'];
                    $student_course_id = $_POST['student_course_id'];
                    $student_principal_advisor = $_POST['student_principal_advisor'];
                    $student_associate_advisor = $_POST['student_associate_advisor'];
                    $student_plan_id = $_POST['student_plan_id'];
                    $education_level = $_POST['education_level'];
                if(empty($student_id)){
                    $errorMsg = "กรุณากรอกรหัสนักศึกษา !";
                }else if(empty($student_name)){
                    $errorMsg = "กรุณากรอกชื่อนักศึกษา !";
                }else if(empty($student_status_id)){
                    $errorMsg = "กรุณาเลือกสถานะนักศึกษา !";
                }else if(empty($student_principal_advisor)){
                    $errorMsg = "กรุณากรอกอาจารย์ที่ปรึกษาหลัก !";
                }else if(empty($student_associate_advisor)){
                    $errorMsg = "กรุณากรอกอาจารย์ที่ปรึกษาร่วม !";
                }else if(empty($student_plan_id)){
                    $errorMsg = "กรุณาเลือกแผนการศึกษา !";
                }else if(empty($education_level)){
                    $errorMsg = "กรุณาเลือกระดับการศึกษา !";
                }else if(!isset($errorMsg)){
                        $sql = "INSERT INTO student_info(student_id,student_name,student_status_id,student_course_id,student_principal_advisor,student_associate_advisor,student_plan_id,education_level) 
                        VALUES(:student_id,:student_name,:student_status_id,:student_course_id,:student_principal_advisor,:student_associate_advisor,:student_plan_id,:education_level)";
                        $insert_stmt = $conn->prepare($sql);
                        $insert_stmt->bindParam(":student_id",$student_id);
                        $insert_stmt->bindParam(":student_name",$student_name);
                        $insert_stmt->bindParam(":student_status_id",$student_status_id);
                        $insert_stmt->bindParam(":student_course_id",$student_course_id);
                        $insert_stmt->bindParam(":student_principal_advisor",$student_principal_advisor);
                        $insert_stmt->bindParam(":student_associate_advisor",$student_associate_advisor);
                        $insert_stmt->bindParam(":student_plan_id",$student_plan_id);
                        $insert_stmt->bindParam(":education_level",$education_level);
                        if($insert_stmt->execute()){
                            $updateMsg = "Record Successfully";
                            header("refresh:2; student_progress.php");
                            }
                    }
                }
                
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add - Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <style>
        *{
            margin-left: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }
        .mycontainer{
            display: flex;
            margin: 1rem 0;
            width: 100%;
            justify-content: center;
            box-sizing: border-box;
 
        }
        .box{
            padding: 2.7rem;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            justify-content: center;
            align-items: center;
        }
        .formgroup{
            text-align: center;
            align-items: center;
        }
        .row {
            --bs-gutter-x: 5.5rem;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) * -.5);
            margin-left: calc(var(--bs-gutter-x) * -.5);
        }
     </style>
</head>
<body>
 
    <div class="mycontainer">
        <div class="box">
            <h2 class="text-center">เพิ่มนักศึกษา</h2>
               <div class="content">
                <form method="post" class="form-horizontal mt-5">
            <?php
                if(isset($errorMsg)){
            ?>
            <div class="alert alert-danger">
                <strong><?php echo $errorMsg; ?></strong>
            </div>
            <?php }?>
            <?php
                if(isset($updateMsg)){
            ?>
            <div class="alert alert-success">
                <strong>Success !<?php echo $updateMsg; ?></strong>
            </div>
            <?php }?>
            <div class="form-goup" style="position: relative;">
                <div class="row">
                    <label for="firstname" class="col-sm-5 form-control-label mb-5">รหัสนักศึกษา</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="text" name="student_id" id="student_id" class="form-control" value="">
                    </div>
                </div>
            </div>
                    
            <div class="form-goup">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-5">ชื่อ-นามสกุล</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="text" name="student_name" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-5">สถานะนักศึกษา</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <select name="student_status_id" class="form-control">
                          <option value="">สถานะนักศึกษา</option>
                          <option value="1">กำลังศึกษา</option>
                          <option value="2">สำเร็จการศึกษา</option>
                          <option value="3">ไม่มาลงทะเบียน</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-5">หลักสูตร</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <select name="student_course_id" class="form-control">
                          <option value="">หลักสูตร</option>
                          <option value="1">MBA</option>
                          <option value="2">MBA.Mk</option>
                          <option value="3">IMBA</option>
                          <option value="4">M.Acc</option>
                          <option value="5">MPA</option>
                          <option value="6">Ph.D.</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-goup mb-4">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-4">อาจารย์ที่ปรึกษาหลัก</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="text" name="student_principal_advisor" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-5">อาจารย์ที่ปรึกษาร่วม</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="text" name="student_associate_advisor" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-5">แผนการศึกษา</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <select name="student_plan_id" class="form-control">
                          <option value="">แผนการศึกษา</option>
                          <option value="1">วิทยานิพนธ์</option>
                          <option value="2">สารนิพนธ์</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="" class="col-sm-5 form-control-label mb-5">ระดับการศึกษา</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <select name="education_level" class="form-control">
                          <option value="">ระดับการศึกษา</option>
                          <option value="1">ปริญญาโท</option>
                          <option value="2">ปริญญาเอก</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="mt-3">
                    <input type="submit" name="btn_submit" class="btn btn-success" value="Submit">
                    <a href="student_progress.php" class="btn btn-danger">Cancel</a>
                </div>
            </div>    
                </div>
                </form>
               </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="add.js"></script>
</body>
</html>