<?php
require_once('config/db.php');
session_start();


?>

<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">

  <title>Home</title>
  <meta name="description" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script defer src="script.js"></script>
    <link rel="stylesheet" href="style.css?v9999">
</head>
<body>
  <div class="container text text-center">

    <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
      <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Publication</span>
      </a>

      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="student_progress.php" class="nav-link">Progress</a></li>
        <li class="nav-item"><a href="report.php" class="nav-link">Report</a></li>
      </ul>
    </header>
      <div class="container">
        <h1>My Teams</h1>
      </div>
      <div class="homecontainer">
          
          <div class="main">
            <div class="img">
                <img src="image/1.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510060</h4>
                  <h5>ฐิติรัตน์ ประกอบเขาทอง</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>ER Diagram</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/2.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510095</h4>
                  <h5>ธัญพิมล พิริยะนันทกร</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Web App Design</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/3.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510117</h4>
                  <h5>นิรุสดี หะยีนิมะ</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Data Analysis</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/4.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510135</h4>
                  <h5>ปวีณ์สุดา อำพะมะ</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Data Dictionary</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/5.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510154</h4>
                  <h5>พิมพิสา แก้วหณี</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Web App Design</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/6.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510184</h4>
                  <h5>มูฮัมหมัดอัซรอฟ จูมะ</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Data Analysis</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/7.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510185</h4>
                  <h5>มูฮัมหมัดนาอีม เฮ็งปิยา</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Data Analysis</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/8.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510233</h4>
                  <h5>ศุภภัชรา เดชดี</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>ER Diagram</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/9.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510327</h4>
                  <h5>ณัฐวัตร บุญสิน</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Data Analysis</h5>
                </div>
            </div>
          </div>
          <div class="main">
            <div class="img">
                <img src="image/10.jpg" alt="">
            </div>
            <div class="content">
                <div class="info">
                  <h4>6410510450</h4>
                  <h5>สุปวีณ์ มณีฉาย</h5>
                </div>
            </div>
            <div class="footer">
                <div class="ft-r">
                  <h5>Data Dictionary</h5>
                </div>
            </div>
          </div>


       </div>
        

</body>

</html>