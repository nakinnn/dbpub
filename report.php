<?php
require_once('config/db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
        <li class="nav-item"><a href="student_progress.php" class="nav-link">Progress</a></li>
        <li class="nav-item"><a href="report.php" class="nav-link active">Report</a></li>
      </ul>
    </header>
  
    </div>
     <div class="container mt-5">
    <table id="example" class="styled-table table table-hover display table-responsive">
      <thead>
        <tr class="table align-middle text-center">
          <th>ประเภทการตีพิมพ์</th>
        <?php
        $sql2 = "SELECT * FROM publication_data";
        $select_stmt2 = $conn->prepare($sql2);
        $select_stmt2->execute();
        if ($select_stmt2-> rowCount() > 0){
          while ($row=$select_stmt2-> fetch(PDO::FETCH_ASSOC)) {
            $publication_data_name = $row['publication_data'];
            
          ?>
            <th><?php echo $publication_data_name?></th> 
            <?php
                }
              }
            ?>
            <th>Grand Total</th>
            </tr>
    </thead>
    <tbody>
        <tr>
        <?php
        
         $sumall = 0 ;
        $year = 2019;
        while($year<=2023){
            $case1 = 0;
            $case2 = 0;
            $case3 = 0;
            $case4 = 0;
            $case5 = 0;
            $case6 = 0;
            $case7 = 0;
            $case8 = 0;
          $sumtotal = 0;
          $sql = "SELECT publication_data_id,publication_year,COUNT(publication_year) as total FROM student_public WHERE publication_year = $year GROUP BY publication_data_id";
          $select_stmt = $conn->prepare($sql);
          $select_stmt->execute();
          while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
          $publication_data_id = $row['publication_data_id'];
          $publication_year = $row['publication_year'];
          $total = $row['total'];
          $sumtotal += $total;
          $sumall += $total;
          switch($publication_data_id){
                case 1 : $case1 = $total; break;
                case 2 : $case2 = $total; break;
                case 3 : $case3 = $total; break;
                case 4 : $case4 = $total; break;
                case 5 : $case5 = $total; break;
                case 6 : $case6 = $total; break;
                case 7 : $case7 = $total; break;
                case 8 : $case8 = $total; break;
                default : $error = "error";
            }
          }
          
          ?>
           <tr class="table align-middle text-center">
            <th><?php echo $year?></th>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=1"><?php echo $case1?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=2"><?php echo $case2?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=3"><?php echo $case3?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=4"><?php echo $case4?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=5"><?php echo $case5?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=6"><?php echo $case6?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=7"><?php echo $case7?></a></td>
            <td><a href="student_public_year.php?show_year=<?php echo $year?>&data_id=8"><?php echo $case8?></a></td>
            <td><?php echo $sumtotal?></td>
          </tr>
          <?php
          $year++;
        }
        ?>
       
    </tbody>
    <tfoot>
      <tr class="table align-middle text-center">
        <td>Total</td>
      <?php 
          $total1=0;
          $total2=0;
          $total3=0;
          $total4=0;
          $total5=0;
          $total6=0;
          $total7=0;
          $total8=0;
          $sql2 = "SELECT publication_data_id,COUNT(publication_data_id) as total FROM student_public GROUP BY publication_data_id";
          $select_stmt2 = $conn->prepare($sql2);
          $select_stmt2->execute();
          while($row = $select_stmt2->fetch(PDO::FETCH_ASSOC)){
            $total = $row['total'];
            $id = $row['publication_data_id'];
            switch($id){
                case 1 : $total1 = $total; break;
                case 2 : $total2 = $total; break;
                case 3 : $total3 = $total; break;
                case 4 : $total4 = $total; break;
                case 5 : $total5 = $total; break;
                case 6 : $total6 = $total; break;
                case 7 : $total7 = $total; break;
                case 8 : $total8 = $total; break;
                default : $error = "error";
            }
        ?>
      <?php 
      }      
      ?>
      <td><?php echo $total1?></td>
      <td><?php echo $total2?></td>
      <td><?php echo $total3?></td>
      <td><?php echo $total4?></td>
      <td><?php echo $total5?></td>
      <td><?php echo $total6?></td>
      <td><?php echo $total7?></td>
      <td><?php echo $total8?></td>
      <td><?php echo $sumall?></td>
      </tr>
    </tfoot>
  </table>
    <div class="chart-grid">
      <div class="chart-container">
        <canvas id="bar"></canvas>
      </div>
      <div class="chart-container">
        <canvas id="pie"></canvas>
      </div>
      <div class="chart-container">
        <canvas id="doughnut"></canvas>
      </div>
      <div class="chart-container">
        <canvas id="line"></canvas>
      </div>
    </div>
</div>
  


    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        $(document).ready(function() {
            showGraph();
        });
        function showGraph(){
            {
                $.post("data.php", function(data) {
                    console.log(data);
                    let year = [];
                    let pub_id = [];
                    let total = [];

                    for (let i in data) {
                      console.log(data);
                        year.push(data[i].publication_year);
                        pub_id.push(data[i].publication_data);
                        total.push(data[i].total);
                    }

                    let chartdata = {
                        labels: pub_id,
                        datasets: [{
                                label: 'Total',
                                backgroundColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 205, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(201, 203, 207, 1)'
                              ],
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: total,
                        }]
                    };


                    let barTarget = $('#bar');
                    let barGraph = new Chart(barTarget, {
                        type: 'bar',
                        data: chartdata,
                        options: {
                          scales: {
                              yAxes: [{
                                  display: true,
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          }
                      }
                    })

                    let pieTarget = $('#pie');
                    let pieGraph = new Chart(pieTarget, {
                        type: 'pie',
                        data: chartdata,
                        options: {
  
                      }
                    })
                    let donutTarget = $('#doughnut');
                    let donutGraph = new Chart(donutTarget, {
                        type: 'doughnut',
                        data: chartdata,
                        options: {
  
                      }
                    })
                    let lineTarget = $('#line');
                    let lineGraph = new Chart(lineTarget, {
                        type: 'line',
                        data: chartdata,
                        options: {
                          scales: {
                              yAxes: [{
                                  display: true,
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                          }
                      }
                    })
                })
            }
        }
    </script>
</body>


</html>