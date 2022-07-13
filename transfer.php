<?php 
session_start();
if(empty($_SESSION['emp_level'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOK Dashboard</title>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <div class="main-container d-flex">
    <!-- menu Navbar  -->
    <?php include("includes/menuNavbar.inc.php"); ?>
    

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
      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> รายการเดินสินค้า</h2>
        <hr>
        <form action="#" method="POST">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="ค้นหาข้อมูลรายการเดินสินค้า" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr class="text-center">
                <th>ลำดับรายการเดินสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ชนิดสินค้า</th>
                <th>จำนวนสินค้า</th>
                <th>พนักงาน / บริษัท</th>
                <th>ประเภทการทำรายการ</th>
                <th>วัน/เดือน/ปี</th>
                <th>รายละเอียด</th>
              </tr>
            </thead>
            <tbody>
              <tr class="text-center">
                <td>1</td>
                <td>พรมรถยนต์ดำแดง</td>
                <td>ไหมพรม</td>
                <td>3</td>
                <td>ชาคริต โชติ</td>
                <td><h5><span class="badge rounded-pill bg-success mt-2">นำเข้า</span></h5></td>
                <td>14/7/2565 1:47</td>
                <td>
                  <a href="#" class="btn btn-secondary"><i class="fa-solid fa-eye"></i> รายละเอียด</a>
                </td>
              </tr>
            </tbody>
            <thead>
              <tr class="text-center">
                <th>ลำดับรายการเดินสินค้า</th>
                <th>ชื่อสินค้า</th>
                <th>ชนิดสินค้า</th>
                <th>จำนวนสินค้า</th>
                <th>พนักงาน / บริษัท</th>
                <th>ประเภทการทำรายการ</th>
                <th>วัน/เดือน/ปี</th>
                <th>รายละเอียด</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/logout.js"></script>
</body>
</html>