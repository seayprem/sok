<?php 
session_start();
if(empty($_SESSION['emp_level'])) {
  echo '<script>alert("คุณไม่ได้รับอนุญาตในการเข้าถึงหน้าต่างนี้");window.location.href = "login.php"</script>';
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
    

    <?php 
    if($_SESSION['emp_level'] == 1) {
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
      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> เพิ่มหมวดหมู่สินค้า</h2>
        <hr>
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-8">
              <form action="#" method="post">
                <div class="input-group mb-3">
                  <input type="text" id="search" name="search" class="form-control" placeholder="ค้นหาข้อมูลรายการเดินสินค้า" aria-label="recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
              </form>
              <div class="table-responsive">
                <table class="table align-middle">
                  <thead class="text-center">
                    <tr>
                      <th>ลำดับ</th>
                      <th>ชื่อประเภทสินค้า</th>
                      <th colspan="2">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody id="showcate" class="text-center">
                    <!-- show data -->
                  </tbody>
                </table>
              </div>
            </div>

            <div class="col-md-4">
              <h2 class="fs-5 text-center"> เพิ่มหมวดหมู่สินค้า</h2>
              <form action="#" method="post" id="frm">
                <div class="input-group mb-3">
                  <span class="input-group-text" id="cate_name"><i class="fa-solid fa-cart-plus"></i></span>
                  <input type="text" class="form-control" id="cate_name_input" placeholder="กรุณาป้อนชื่อหมวดหมู่สินค้า" aria-label="Username" aria-describedby="cate_name">
                </div>
                <div class="d-grid gap-2">
                  <button class="btn btn-warning" id="add_cate">เพิ่มหมวดหมู่สินค้า</button>
                  <button id="add" class="btn btn-success">ยืนยัน</button>
                  <button id="cancel" class="btn btn-danger">ยกเลิก</button>
                </div>
              </form>

              <!-- Update  -->
              <!-- Modal -->
              <div class="modal fade" id="cateModal" tabindex="-1" aria-labelledby="cateModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="cateModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <div id="cate_data"></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                      <button type="button" class="btn btn-primary" id="saved">บันทึก</button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } else {
      echo '<script>alert("หน้าเพจนี้ได้สำหรับพนักงานจัดการคลังสินค้าเท่านั้น!");window.location.href = "index.php"</script>';
    } ?>
  </div>

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/sweetalert2@11.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/logout.js"></script>
  <script src="js/responsive.js"></script>
  <script src="js/addCategory.js"></script>
</body>
</html>