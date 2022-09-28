<?php 
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
  <title>สินค้าคงเหลือ - SOK Dashboard</title>
  <link rel="stylesheet" href="css/all.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/jquery.dataTables.min.css">
  <style>
    .dataTables_filter input {
      margin-bottom: 5px;
    }

    .highlight-zero {
      background: #f57a7a !important;
    }

    .highlight-min {
      background: yellow !important;
    }
  </style>
</head>
<body>

  <div class="main-container d-flex">
    <!-- menu Navbar  -->
    <?php include("includes/menuNavbar.inc.php"); ?>
    

    <?php 
    if($_SESSION['emp_level'] == 1 || $_SESSION['emp_level'] == 2) {
    ?>
    <!-- navbar Body  -->
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

      <!-- end navbar body  -->


      <!-- content body  -->

      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> รายการสินค้าคงเหลือ</h2>
        <hr>
        
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table align-middle table-hover" id="myTable">
                  <thead class="table-dark">
                    <tr>
                      <th style="display: none;" class="text-center"></th>
                      <th class="text-center">รหัสสินค้า</th>
                      <th class="text-center">ภาพสินค้า</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">ขนาดของสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">จำนวนที่ต้องสั่งซื้อ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('config/db.php');
                    $sql = "SELECT * FROM inventory";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($query)) {

                    
                    ?>
                    <tr id="<?= $row['inv_id']; ?>" class="text-center <?php 
                    if($row['inv_qty'] == 0) { 
                      echo 'highlight-zero'; 
                    } else if($row['inv_qty'] <= $row['inv_min']) {
                      echo 'highlight-min';
                    }
                    ?>">
                      <td data-target="type" style="display: none;"><?= $row['cate_id']; ?></td>
                      <td><?= $row['inv_id']; ?></td>
                      <td><img src="images/<?= $row['inv_image']; ?>" alt="" width="150" height="150"></td>
                      <td data-target="name"><?= $row['inv_name']; ?></td>
                      <td data-target="size"><?= $row['inv_size']; ?></td>
                      <td data-target="qty"><?= $row['inv_qty']; ?></td>
                      <td data-target="min"><?= $row['inv_min']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">รหัสสินค้า</th>
                      <th class="text-center">ภาพสินค้า</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">ขนาดของสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">จำนวนที่ต้องสั่งซื้อ</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end content body  -->
    </div>
    <?php } else {
      echo '<script src="js/sweetalert2@11.js"></script>';
      echo '<script src="js/jquery-3.6.0.min.js"></script>';
      echo "<script>
      $(document).ready(function() {
        $('div').hide();
        Swal.fire({
          icon: 'error',
          title: 'หน้าเพจนี้ได้สำหรับพนักงานจัดการคลังสินค้า หรือ เจ้าของกิจการเท่านั้น!',
        }).then((result) => {
          history.back();
        });
      });
      </script>";
      // echo '<script>alert("หน้าเพจนี้ได้สำหรับพนักงานจัดการคลังสินค้า หรือ เจ้าของกิจการเท่านั้น!");window.location.href = "index.php"</script>';
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
  <script src="js/addProduct.js"></script>

</body>
</html>