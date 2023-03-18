<?php
require_once('config/db.php');
session_start();
            if(isset($_POST['btn_submit'])){
                    $student_id = $_POST['student_id'];
                    $publication_name = $_POST['publication_name'];
                    $publication_type_id = $_POST['publication_type'];
                    $publication_data_id = $_POST['publication_data'];
                    $publication_used = $_POST['publication_used'];
                    $publication_description = $_POST['publication_description'];
                    $publication_start = $_POST['publication_start'];
                    $publication_end = $_POST['publication_end'];
                    $publication_year = $_POST['publication_year'];
                if(empty($student_id)){
                    $errorMsg = "กรุณากรอกรหัสนักศึกษา !";
                }else if(empty($publication_name)){
                    $errorMsg = "กรุณากรอกชื่อผลงาน !";
                }else if(empty($publication_type_id)){
                    $errorMsg = "กรุณาเลือกประเภทฐานการเผยแพร่ !";
                }else if(empty($publication_data_id)){
                    $errorMsg = "กรุณาเลือกประเภทฐานข้อมูล !";
                }else if(empty($publication_start)){
                    $errorMsg = "กรุณากรอกปีเริ่มต้น !";
                }else if(empty($publication_end)){
                    $errorMsg = "กรุณากรอกปีสิ้นสุด !";
                }else if(empty($publication_year)){
                    $errorMsg = "กรุณากรอกปีปฎิทิน !";
                }
                
                
                error_reporting(E_ALL ^ E_NOTICE);
                $check_student_id = $conn->prepare("SELECT student_id FROM student_info WHERE student_id = :student_id");
                $check_student_id->bindParam(":student_id", $student_id);
                $check_student_id->execute();
                $row=$check_student_id-> fetch(PDO::FETCH_ASSOC);
                if($row['student_id'] != $student_id){
                        $errorMsg = "รหัสนักศึกษาไม่ถูกต้อง";
                }else{
                    if(!isset($errorMsg)){
                        $sql = "INSERT INTO student_public(publication_name,publication_type_id,publication_data_id,publication_used,publication_description,publication_start,publication_end,publication_year,student_id) 
                        VALUES(:publication_name,:publication_type_id,:publication_data_id,:publication_used,:publication_description,:publication_start,:publication_end,:publication_year,:student_id)";
                        $insert_stmt = $conn->prepare($sql);
                        $insert_stmt->bindParam(":publication_name",$publication_name);
                        $insert_stmt->bindParam(":publication_type_id",$publication_type_id);
                        $insert_stmt->bindParam(":publication_data_id",$publication_data_id);
                        $insert_stmt->bindParam(":publication_used",$publication_used);
                        $insert_stmt->bindParam(":publication_description",$publication_description);
                        $insert_stmt->bindParam(":publication_start",$publication_start);
                        $insert_stmt->bindParam(":publication_end",$publication_end);
                        $insert_stmt->bindParam(":publication_year",$publication_year);
                        $insert_stmt->bindParam(":student_id",$student_id);
                        if($insert_stmt->execute()){
                            $updateMsg = "Record Successfully";
                            header("refresh:2; student_progress.php");
                            }
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
    <title>Add - Publication</title>
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
     </style>
</head>
<body>
 
    <div class="mycontainer">
        <div class="box">
            <h2 class="text-center">เพิ่มผลงานตีพิมพ์</h2>
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
                        <div class="col-md-5">
                            <div class="list-group" id="show-list" style="position: absolute; width: 261px;"></div>
                        </div>
                    </div>
                </div>
            </div>
                    
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">ชื่อผลงาน</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="text" name="publication_name" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">ประเภทการเผยแพร่</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <select name="publication_type" class="form-control">
                            <option value="">-</option>
                            <option value="1">วารสาร</option>
                            <option value="2">การประชุมวิชาการระดับชาติ</option>
                            <option value="3">การประชุมวิชาการระดับนานาชาติ</option>
                            <option value="4">ตีพิมพ์ลักษณะใดลักษณะหนึ่ง</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">ฐานข้อมูลวารสาร</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <select name="publication_data" class="form-control">
                        <option value="">-</option>
                        <option value="1">ฐานข้อมูลระดับนานาชาติอื่น</option>
                        <option value="2">TCI กลุ่ม 1</option>
                        <option value="3">Scopus</option>
                        <option value="4">WoS</option>
                        <option value="5">TCI กลุ่ม 2</option>
                        <option value="6">SSRN</option>
                        <option value="7">EBSCO</option>
                        <option value="8">ไม่อยู่ในฐานข้อมูล</option>
                   </select>
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">การนำไปใช้ในองค์กร</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="text" name="publication_used" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup mb-4">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">ชื่อวารสาร/ชื่องานประชุม/สถานที่</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <textarea name="publication_description" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">วัน-เดือน-ปี เริ่มต้น</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        
                        <input type="date" name="publication_start" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">วัน-เดือน-ปี สิ้นสุด</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="date" name="publication_end" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-goup">
                <div class="row">
                    <label for="lastname" class="col-sm-5 form-control-label mb-5">ปีปฏิทิน</label>
                    <div class="col-sm-6" style="margin-left: 2.7rem;">
                        <input type="number" name="publication_year" class="form-control" value="">
                    </div>
                </div>
            </div>
            <div class="form-group text-center">
                <div class="mt-3">
                    <input type="submit" name="btn_submit" class="btn btn-success" value="Submit">
                    <a href="student_progress.php" class="btn btn-danger" >Cancel</a>
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