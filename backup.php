<?php 
include_once('config/db.php');
error_reporting(0);
session_start();
if(empty($_SESSION['emp_level'])) {
  echo '<script src="js/sweetalert2@11.js"></script>';
  echo '<script src="js/jquery-3.6.0.min.js"></script>';
  echo "<script>
  $(document).ready(function() {
    $('div').hide();
    Swal.fire({
      icon: 'error',
      title: 'คุณไม่ได้รับอนุญาตในการเข้าถึงหน้าต่างนี้',
      text: 'กรุณาเข้าสู่ระบบ!',
    }).then((result) => {
      window.location.href = 'login.php';
    });
  });
  </script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>จัดการผู้ใช้ - SOK Dashboard</title>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <style>
    .dataTables_filter input {
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

  <div class="main-container d-flex">
    <!-- menu Navbar  -->
    <?php include("includes/menuNavbar.inc.php"); ?>
    

    <?php 
    if($_SESSION['emp_level'] == 3) {
    ?>
    <!-- Content Body  -->
    <div class="content">
      <nav class="navbar navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">

          <div class="d-flex justify-content-between d-md-none d-block">
            <button class="btn px-1 py-0 open-btn me-2"><i class="fa-solid fa-bars-staggered"></i></button>
            <a class="navbar-brand" href="#"><span class="bg-dark rounded px-2 py-0 text-white">SOK</span></a>
          </div>

          <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fa-solid fa-bars-staggered"></i>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><?= $_SESSION['emp_fname']; ?> <?= $_SESSION['emp_lname']; ?></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- end content body  -->

      <div class="container">

        <h3 class="text-center mt-5 mb-3">สำรองข้อมูล</h3>
        <form action="backupController.php" method="POST">
          <input type="hidden" value="<?= $DB_SERVER; ?>" name="server">
          <input type="hidden" value="<?= $DB_USER; ?>" name="username">
          <input type="hidden" value="<?= $DB_PASS; ?>" name="password">
          <input type="hidden" value="<?= $DB_NAME; ?>" name="dbname">
          <div class="d-grid gap-2 col-3 mx-auto">
            <button type="submit" name="backupnow" class="btn btn-info btn-rounded">สำรองข้อมูล</button>
          </div> 
        </form>
        
      </div>



    </div>
    <!-- close tag div -->
      


    <?php } else {
      echo '<script src="js/sweetalert2@11.js"></script>';
      echo '<script src="js/jquery-3.6.0.min.js"></script>';
      echo "<script>
      $(document).ready(function() {
        $('div').hide();
        Swal.fire({
          icon: 'error',
          title: 'หน้าเพจนี้สำหรับแอดมินเท่านั้น',
        }).then((result) => {
          history.back();
        });
      });
      </script>";
    } ?>
  </div>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/logout.js"></script>
  <script src="js/responsive.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
</body>
</html>