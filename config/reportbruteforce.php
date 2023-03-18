<?php
require_once('config/db.php');
session_start();
?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Report</title>
  <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
  
  
<div class="mycontainer mt-5">
      <table id="example" class="display table-responsive nowrap">
      <thead>
        <tr>
          <th>ประเภทการตีพิมพ์</th>
        <?php
        $sql2 = "SELECT * FROM publication_data";
        $select_stmt2 = $conn->prepare($sql2);
        $select_stmt2->execute();
        if ($select_stmt2-> rowCount() > 0){
          while ($row=$select_stmt2-> fetch(PDO::FETCH_ASSOC)) {
            $publication_data_name = $row['publication_data'];
          ?>s
            <th><?php echo $publication_data_name?></th> 
            <?php
                }
              }
            ?>
            <th>Grand Total</th>
            </tr>
    </thead>
    <tbody>

      <?php
        $sql2 = "SELECT * FROM student_public";
        $select_stmt2 = $conn->prepare($sql2);
        $select_stmt2->execute();
        
        $count2015_1 = 0;
        $count2015_2 = 0;
        $count2015_3 = 0;
        $count2015_4 = 0;
        $count2015_5 = 0;
        $count2015_6 = 0;
        $count2015_7 = 0;
        $count2015_8 = 0;
        $count2016_1 = 0;
        $count2016_2 = 0;
        $count2016_3 = 0;
        $count2016_4 = 0;
        $count2016_5 = 0;
        $count2016_6 = 0;
        $count2016_7 = 0;
        $count2016_8 = 0;
        $count2017_1 = 0;
        $count2017_2 = 0;
        $count2017_3 = 0;
        $count2017_4 = 0;
        $count2017_5 = 0;
        $count2017_6 = 0;
        $count2017_7 = 0;
        $count2017_8 = 0;
        $count2018_1 = 0;
        $count2018_2 = 0;
        $count2018_3 = 0;
        $count2018_4 = 0;
        $count2018_5 = 0;
        $count2018_6 = 0;
        $count2018_7 = 0;
        $count2018_8 = 0;
        $count2019_1 = 0;
        $count2019_2 = 0;
        $count2019_3 = 0;
        $count2019_4 = 0;
        $count2019_5 = 0;
        $count2019_6 = 0;
        $count2019_7 = 0;
        $count2019_8 = 0;
        $count2020_1 = 0;
        $count2020_2 = 0;
        $count2020_3 = 0;
        $count2020_4 = 0;
        $count2020_5 = 0;
        $count2020_6 = 0;
        $count2020_7 = 0;
        $count2020_8 = 0;
        $count2021_1 = 0;
        $count2021_2 = 0;
        $count2021_3 = 0;
        $count2021_4 = 0;
        $count2021_5 = 0;
        $count2021_6 = 0;
        $count2021_7 = 0;
        $count2021_8 = 0;
        $count2022_1 = 0;
        $count2022_2 = 0;
        $count2022_3 = 0;
        $count2022_4 = 0;
        $count2022_5 = 0;
        $count2022_6 = 0;
        $count2022_7 = 0;
        $count2022_8 = 0;
        $count2023_1 = 0;
        $count2023_2 = 0;
        $count2023_3 = 0;
        $count2023_4 = 0;
        $count2023_5 = 0;
        $count2023_6 = 0;
        $count2023_7 = 0;
        $count2023_8 = 0;
        if ($select_stmt2-> rowCount() > 0){
          while ($row=$select_stmt2-> fetch(PDO::FETCH_ASSOC)){
            $checked_year = $row['publication_year'];
            $checked_data = $row['publication_data_id'];
            if($checked_data==1 & $checked_year==2015){
              $count2015_1 += 1;
            }
            if($checked_data==2 & $checked_year==2015){
              $count2015_2 += 1;
            }
            if($checked_data==3 & $checked_year==2015){
              $count2015_3 += 1;
            }
            if($checked_data==4 & $checked_year==2015){
              $count2015_4 += 1;
            }
            if($checked_data==5 & $checked_year==2015){
              $count2015_5 += 1;
            }
            if($checked_data==6 & $checked_year==2015){
              $count2015_6 += 1;
            }
            if($checked_data==7 & $checked_year==2015){
              $count2015_7 += 1;
            }
            if($checked_data==8 & $checked_year==2015){
              $count2015_8 += 1;
            }
            if($checked_data==1 & $checked_year==2016){
              $count2016_1 += 1;
            }
            if($checked_data==2 & $checked_year==2016){
              $count2016_2 += 1;
            }
            if($checked_data==3 & $checked_year==2016){
              $count2016_3 += 1;
            }
            if($checked_data==4 & $checked_year==2016){
              $count2016_4 += 1;
            }
            if($checked_data==5 & $checked_year==2016){
              $count2016_5 += 1;
            }
            if($checked_data==6 & $checked_year==2016){
              $count2016_6 += 1;
            }
            if($checked_data==7 & $checked_year==2016){
              $count2016_7 += 1;
            }
            if($checked_data==8 & $checked_year==2016){
              $count2016_8 += 1;
            }
            if($checked_data==1 & $checked_year==2017){
              $count2017_1 += 1;
            }
            if($checked_data==2 & $checked_year==2017){
              $count2017_2 += 1;
            }
            if($checked_data==3 & $checked_year==2017){
              $count2017_3 += 1;
            }
            if($checked_data==4 & $checked_year==2017){
              $count2017_4 += 1;
            }
            if($checked_data==5 & $checked_year==2017){
              $count2017_5 += 1;
            }
            if($checked_data==6 & $checked_year==2017){
              $count2017_6 += 1;
            }
            if($checked_data==7 & $checked_year==2017){
              $count2017_7 += 1;
            }
            if($checked_data==8 & $checked_year==2017){
              $count2017_8 += 1;
            }
            if($checked_data==1 & $checked_year==2018){
              $count2018_1 += 1;
            }
            if($checked_data==2 & $checked_year==2018){
              $count2018_2 += 1;
            }
            if($checked_data==3 & $checked_year==2018){
              $count2018_3 += 1;
            }
            if($checked_data==4 & $checked_year==2018){
              $count2018_4 += 1;
            }
            if($checked_data==5 & $checked_year==2018){
              $count2018_5 += 1;
            }
            if($checked_data==6 & $checked_year==2018){
              $count2018_6 += 1;
            }
            if($checked_data==7 & $checked_year==2018){
              $count2018_7 += 1;
            }
            if($checked_data==8 & $checked_year==2018){
              $count2018_8 += 1;
            }
            if($checked_data==1 & $checked_year==2019){
              $count2019_1 += 1;
            }
            if($checked_data==2 & $checked_year==2019){
              $count2019_2 += 1;
            }
            if($checked_data==3 & $checked_year==2019){
              $count2019_3 += 1;
            }
            if($checked_data==4 & $checked_year==2019){
              $count2019_4 += 1;
            }
            if($checked_data==5 & $checked_year==2019){
              $count2019_5 += 1;
            }
            if($checked_data==6 & $checked_year==2019){
              $count2019_6 += 1;
            }
            if($checked_data==7 & $checked_year==2019){
              $count2019_7 += 1;
            }
            if($checked_data==8 & $checked_year==2019){
              $count2019_8 += 1;
            }
            if($checked_data==1 & $checked_year==2020){
              $count2020_1 += 1;
            }
            if($checked_data==2 & $checked_year==2020){
              $count2020_2 += 1;
            }
            if($checked_data==3 & $checked_year==2020){
              $count2020_3 += 1;
            }
            if($checked_data==4 & $checked_year==2020){
              $count2020_4 += 1;
            }
            if($checked_data==5 & $checked_year==2020){
              $count2020_5 += 1;
            }
            if($checked_data==6 & $checked_year==2020){
              $count2020_6 += 1;
            }
            if($checked_data==7 & $checked_year==2020){
              $count2020_7 += 1;
            }
            if($checked_data==8 & $checked_year==2020){
              $count2020_8 += 1;
            }
            if($checked_data==1 & $checked_year==2021){
              $count2021_1 += 1;
            }
            if($checked_data==2 & $checked_year==2021){
              $count2021_2 += 1;
            }
            if($checked_data==3 & $checked_year==2021){
              $count2021_3 += 1;
            }
            if($checked_data==4 & $checked_year==2021){
              $count2021_4 += 1;
            }
            if($checked_data==5 & $checked_year==2021){
              $count2021_5 += 1;
            }
            if($checked_data==6 & $checked_year==2021){
              $count2021_6 += 1;
            }
            if($checked_data==7 & $checked_year==2021){
              $count2021_7 += 1;
            }
            if($checked_data==8 & $checked_year==2021){
              $count2021_8 += 1;
            }
            if($checked_data==1 & $checked_year==2022){
              $count2022_1 += 1;
            }
            if($checked_data==2 & $checked_year==2022){
              $count2022_2 += 1;
            }
            if($checked_data==3 & $checked_year==2022){
              $count2022_3 += 1;
            }
            if($checked_data==4 & $checked_year==2022){
              $count2022_4 += 1;
            }
            if($checked_data==5 & $checked_year==2022){
              $count2022_5 += 1;
            }
            if($checked_data==6 & $checked_year==2022){
              $count2022_6 += 1;
            }
            if($checked_data==7 & $checked_year==2022){
              $count2022_7 += 1;
            }
            if($checked_data==8 & $checked_year==2022){
              $count2022_8 += 1;
            }
            if($checked_data==1 & $checked_year==2023){
              $count2023_1 += 1;
            }
            if($checked_data==2 & $checked_year==2023){
              $count2023_2 += 1;
            }
            if($checked_data==3 & $checked_year==2023){
              $count2023_3 += 1;
            }
            if($checked_data==4 & $checked_year==2023){
              $count2023_4 += 1;
            }
            if($checked_data==5 & $checked_year==2023){
              $count2023_5 += 1;
            }
            if($checked_data==6 & $checked_year==2023){
              $count2023_6 += 1;
            }
            if($checked_data==7 & $checked_year==2023){
              $count2023_7 += 1;
            }
            if($checked_data==8 & $checked_year==2023){
              $count2023_8 += 1;
            }
            ?>
            
            <?php
            $sum2015 = $count2015_1 + $count2015_2 + $count2015_3 + $count2015_4 + $count2015_5 + $count2015_6 + $count2015_7 + $count2015_8;
            $sum2016 = $count2016_1 + $count2016_2 + $count2016_3 + $count2016_4 + $count2016_5 + $count2016_6 + $count2016_7 + $count2016_8;
            $sum2017 = $count2017_1 + $count2017_2 + $count2017_3 + $count2017_4 + $count2017_5 + $count2017_6 + $count2017_7 + $count2017_8;
            $sum2018 = $count2018_1 + $count2018_2 + $count2018_3 + $count2018_4 + $count2018_5 + $count2018_6 + $count2018_7 + $count2018_8;
            $sum2019 = $count2019_1 + $count2019_2 + $count2019_3 + $count2019_4 + $count2019_5 + $count2019_6 + $count2019_7 + $count2019_8;
            $sum2020 = $count2020_1 + $count2020_2 + $count2020_3 + $count2020_4 + $count2020_5 + $count2020_6 + $count2020_7 + $count2020_8;
            $sum2021 = $count2021_1 + $count2021_2 + $count2021_3 + $count2021_4 + $count2021_5 + $count2021_6 + $count2021_7 + $count2021_8;
            $sum2022 = $count2022_1 + $count2022_2 + $count2022_3 + $count2022_4 + $count2022_5 + $count2022_6 + $count2022_7 + $count2022_8;
            $sum2023 = $count2023_1 + $count2023_2 + $count2023_3 + $count2023_4 + $count2023_5 + $count2023_6 + $count2023_7 + $count2023_8;
            $sum1 = $count2015_1 + $count2016_1 + $count2017_1 + $count2018_1 + $count2019_1 + $count2020_1 + $count2021_1 + $count2022_1 + $count2023_1;
            $sum2 = $count2015_2 + $count2016_2 + $count2017_2 + $count2018_2 + $count2019_2 + $count2020_2 + $count2021_2 + $count2022_2 + $count2023_2;
            $sum3 = $count2015_3 + $count2016_3 + $count2017_3 + $count2018_3 + $count2019_3 + $count2020_3 + $count2021_3 + $count2022_3 + $count2023_3;
            $sum4 = $count2015_4 + $count2016_4 + $count2017_4 + $count2018_4 + $count2019_4 + $count2020_4 + $count2021_4 + $count2022_4 + $count2023_4;
            $sum5 = $count2015_5 + $count2016_5 + $count2017_5 + $count2018_5 + $count2019_5 + $count2020_5 + $count2021_5 + $count2022_5 + $count2023_5;
            $sum6 = $count2015_6 + $count2016_6 + $count2017_6 + $count2018_6 + $count2019_6 + $count2020_6 + $count2021_6 + $count2022_6 + $count2023_6;
            $sum7 = $count2015_7 + $count2016_7 + $count2017_7 + $count2018_7 + $count2019_7 + $count2020_7 + $count2021_7 + $count2022_7 + $count2023_7;
            $sum8 = $count2015_8 + $count2016_8 + $count2017_8 + $count2018_8 + $count2019_8 + $count2020_8 + $count2021_8 + $count2022_8 + $count2023_8;
            $grandtotal = $sum2015 + $sum2016 + $sum2017 + $sum2018 + $sum2019 + $sum2020 + $sum2021 + $sum2022 + $sum2023;
                }
              }
            ?>
           <tr>
              <td>2015</td>
              <td><a href="student_public_year.php?show_year=2015&data_id=1" target="_blank"><?php echo $count2015_1?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=2" target="_blank"><?php echo $count2015_2?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=3" target="_blank"><?php echo $count2015_3?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=4" target="_blank"><?php echo $count2015_4?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=5" target="_blank"><?php echo $count2015_5?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=6" target="_blank"><?php echo $count2015_6?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=7" target="_blank"><?php echo $count2015_7?></td>
              <td><a href="student_public_year.php?show_year=2015&data_id=8" target="_blank"><?php echo $count2015_8?></td>
              <td><?php echo $sum2015?></td>
            </tr>
            <tr>
              <td>2016</td>
              <td><a href="student_public_year.php?show_year=2016&data_id=1" target="_blank"><?php echo $count2016_1?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=2" target="_blank"><?php echo $count2016_2?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=3" target="_blank"><?php echo $count2016_3?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=4" target="_blank"><?php echo $count2016_4?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=5" target="_blank"><?php echo $count2016_5?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=6" target="_blank"><?php echo $count2016_6?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=7" target="_blank"><?php echo $count2016_7?></td>
              <td><a href="student_public_year.php?show_year=2016&data_id=8" target="_blank"><?php echo $count2016_8?></td>
              <td><?php echo $sum2016?></td>
            </tr>
            <tr>
              <td>2017</td>
              <td><a href="student_public_year.php?show_year=2017&data_id=1" target="_blank"><?php echo $count2017_1?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=2" target="_blank"><?php echo $count2017_2?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=3" target="_blank"><?php echo $count2017_3?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=4" target="_blank"><?php echo $count2017_4?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=5" target="_blank"><?php echo $count2017_5?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=6" target="_blank"><?php echo $count2017_6?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=7" target="_blank"><?php echo $count2017_7?></td>
              <td><a href="student_public_year.php?show_year=2017&data_id=8" target="_blank"><?php echo $count2017_8?></td>
              <td><?php echo $sum2017?></td>
            </tr> 
            <tr>
              <td>2018</td>
              <td><a href="student_public_year.php?show_year=2018&data_id=1" target="_blank"><?php echo $count2018_1?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=2" target="_blank"><?php echo $count2018_2?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=3" target="_blank"><?php echo $count2018_3?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=4" target="_blank"><?php echo $count2018_4?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=5" target="_blank"><?php echo $count2018_5?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=6" target="_blank"><?php echo $count2018_6?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=7" target="_blank"><?php echo $count2018_7?></td>
              <td><a href="student_public_year.php?show_year=2018&data_id=8" target="_blank"><?php echo $count2018_8?></td>
              <td><?php echo $sum2018?></td>
            </tr> 
            <tr>
              <td>2019</td>
              <td><a href="student_public_year.php?show_year=2019&data_id=1" target="_blank"><?php echo $count2019_1?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=2" target="_blank"><?php echo $count2019_2?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=3" target="_blank"><?php echo $count2019_3?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=4" target="_blank"><?php echo $count2019_4?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=5" target="_blank"><?php echo $count2019_5?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=6" target="_blank"><?php echo $count2019_6?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=7" target="_blank"><?php echo $count2019_7?></a></td>
              <td><a href="student_public_year.php?show_year=2019&data_id=8" target="_blank"><?php echo $count2019_8?></a></td>
              <td><?php echo $sum2019?></td>
            </tr> 
            <tr>
              <td>2020</td>
              <td><a href="student_public_year.php?show_year=2020&data_id=1" target="_blank"><?php echo $count2020_1?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=2" target="_blank"><?php echo $count2020_2?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=3" target="_blank"><?php echo $count2020_3?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=4" target="_blank"><?php echo $count2020_4?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=5" target="_blank"><?php echo $count2020_5?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=6" target="_blank"><?php echo $count2020_6?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=7" target="_blank"><?php echo $count2020_7?></a></td>
              <td><a href="student_public_year.php?show_year=2020&data_id=8" target="_blank"><?php echo $count2020_8?></a></td>
              <td><?php echo $sum2020?></td>
            </tr> 
            <tr>
              <td>2021</td>
              <td><a href="student_public_year.php?show_year=2021&data_id=1" target="_blank"><?php echo $count2021_1?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=2" target="_blank"><?php echo $count2021_2?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=3" target="_blank"><?php echo $count2021_3?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=4" target="_blank"><?php echo $count2021_4?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=5" target="_blank"><?php echo $count2021_5?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=6" target="_blank"><?php echo $count2021_6?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=7" target="_blank"><?php echo $count2021_7?></a></td>
              <td><a href="student_public_year.php?show_year=2021&data_id=8" target="_blank"><?php echo $count2021_8?></a></td>
              <td><?php echo $sum2021?></td>
            </tr> 
            <tr>
              <td>2022</td>
              <td><a href="student_public_year.php?show_year=2022&data_id=1" target="_blank"><?php echo $count2022_1?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=2" target="_blank"><?php echo $count2022_2?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=3" target="_blank"><?php echo $count2022_3?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=4" target="_blank"><?php echo $count2022_4?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=5" target="_blank"><?php echo $count2022_5?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=6" target="_blank"><?php echo $count2022_6?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=7" target="_blank"><?php echo $count2022_7?></a></td>
              <td><a href="student_public_year.php?show_year=2022&data_id=8" target="_blank"><?php echo $count2022_8?></a></td>
              <td><?php echo $sum2022?></td>
            </tr> 
            <tr>
              <?php 
              ?>
              <td>2023</td>
              <td><a href="student_public_year.php?show_year=2023&data_id=1" target="_blank"><?php echo $count2023_1?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=2" target="_blank"><?php echo $count2023_2?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=3" target="_blank"><?php echo $count2023_3?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=4" target="_blank"><?php echo $count2023_4?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=5" target="_blank"><?php echo $count2023_5?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=6" target="_blank"><?php echo $count2023_6?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=7" target="_blank"><?php echo $count2023_7?></a></td>
              <td><a href="student_public_year.php?show_year=2023&data_id=8" target="_blank"><?php echo $count2023_8?></a></td>
              <td><?php echo $sum2023?></td>
            </tr>
             
      </tbody>
      <tfoot>
              <tr>
              <td>Total</td>
              <td><?php echo $sum1?></td>
              <td><?php echo $sum2?></td>
              <td><?php echo $sum3?></td>
              <td><?php echo $sum4?></td>
              <td><?php echo $sum5?></td>
              <td><?php echo $sum6?></td>
              <td><?php echo $sum7?></td>
              <td><?php echo $sum8?></td>
              <td><?php echo $grandtotal?></td>
            </tr>
      </tfoot>
    </table>
    </div>
</body>

</html>