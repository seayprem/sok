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
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">ประเภทสินค้า</th>
                      <th class="text-center">ขนาดของสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">จำนวนที่ต้องสั่งซื้อ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('config/db.php');
                    $sql = "SELECT * FROM inventory INNER JOIN category ON inventory.cate_id = category.cate_id";
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
                      <td data-target="name"><?= $row['inv_name']; ?></td>
                      <td><?= $row['cate_name']; ?></td>
                      <td data-target="size"><?= $row['inv_size']; ?></td>
                      <td data-target="qty"><?= $row['inv_qty']; ?></td>
                      <td data-target="min"><?= $row['inv_min']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">รหัสสินค้า</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">ประเภทสินค้า</th>
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

      

      <!-- Modal Add Data  -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModal">เพิ่มรายการสินค้า</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Form Input  -->

              <label class="form-label">รหัสสินค้า</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="codes"><i class="fa-solid fa-key"></i></span>
                <input type="text" class="form-control" id="code" placeholder="กรุณาป้อนรหัสสินค้า" aria-label="Username" aria-describedby="codes">
              </div>

              <label class="form-label">ชื่อสินค้า</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="names"><i class="fa-solid fa-cart-shopping"></i></span>
                <input type="text" class="form-control" id="name" placeholder="กรุณาป้อนชื่อสินค้า" aria-label="Username" aria-describedby="names">
              </div>

              <label class="form-label">ประเภทสินค้า</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="type"><i class="fa-solid fa-tag"></i></label>
                <select class="form-select" id="type">
                  <option disabled selected>กรุณาเลือกประเภทสินค้า</option>
                  <?php 
                    $category_sql = "SELECT * FROM `category` ORDER BY cate_id DESC";
                    $category_query = mysqli_query($conn, $category_sql);
                    while($category_row = mysqli_fetch_array($category_query)) {
                    ?>
                  <option value="<?= $category_row['cate_id']; ?>"><?= $category_row['cate_name']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <label class="form-label">ขนาดของสินค้า</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="size"><i class="fa-solid fa-arrow-up-big-small"></i></label>
                <select class="form-select" id="size">
                  <option disabled selected>กรุณาเลือกขนาดของสินค้า</option>
                 
                  <option value="XL">XL</option>
                  <option value="L">L</option>
                  <option value="ม้วน">ม้วน</option>
                </select>
              </div>

              <label class="form-label">สีของสินค้า</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="color"><i class="fa-solid fa-eye-dropper"></i></label>
                <select class="form-select" id="color">
                  <option disabled selected>กรุณาเลือกสีของสินค้า</option>
                 
                  <option value="แดง">แดง</option>
                  <option value="ดำ">ดำ</option>
                  <option value="เหลือง">เหลือง</option>
                </select>
              </div>

              <label class="form-label">จำนวนสินค้า</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="qtys"><i class="fa-solid fa-cart-plus"></i></span>
                <input type="number" class="form-control" id="qty" min="0" value="0" aria-label="Username" aria-describedby="qtys">
              </div>       

              <label class="form-label">ขั้นต่ำที่ต้องสั่งซื้อ</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="mins"><i class="fa-solid fa-circle-minus"></i></span>
                <input type="number" class="form-control" id="min" min="0" value="0" aria-label="Username" aria-describedby="mins">
              </div> 

              <label class="form-label">จำนวนสินค้าที่ไม่จำเป็นต้องสั่งเพิ่ม</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="maxs"><i class="fa-solid fa-basket-shopping"></i></span>
                <input type="number" class="form-control" id="max" min="0" value="0" aria-label="Username" aria-describedby="maxs">
              </div> 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="button" id="save" class="btn btn-primary">บันทึก</button>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal Edit Data  -->

      <!-- Modal Add Data  -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModal">เพิ่มรายการสินค้า</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Form Input  -->

              <label class="form-label">รหัสสินค้า</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="codes"><i class="fa-solid fa-key"></i></span>
                <input type="text" class="form-control" disabled id="code2" placeholder="กรุณาป้อนรหัสสินค้า" aria-label="Username" aria-describedby="codes">
              </div>

              <label class="form-label">ชื่อสินค้า</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="names"><i class="fa-solid fa-cart-shopping"></i></span>
                <input type="text" class="form-control" id="name2" placeholder="กรุณาป้อนชื่อสินค้า" aria-label="Username" aria-describedby="names">
              </div>

              <label class="form-label">ประเภทสินค้า</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="type"><i class="fa-solid fa-tag"></i></label>
                <select class="form-select" id="type2">
                  <option disabled selected>กรุณาเลือกประเภทสินค้า</option>
                  <?php 
                    $category2_sql = "SELECT * FROM `category` ORDER BY cate_id DESC";
                    $category2_query = mysqli_query($conn, $category2_sql);
                    while($category2_row = mysqli_fetch_array($category2_query)) {
                    ?>
                  <option value="<?= $category2_row['cate_id']; ?>"><?= $category2_row['cate_name']; ?></option>
                  <?php } ?>
                </select>
              </div>

              <label class="form-label">ขนาดของสินค้า</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="size"><i class="fa-solid fa-arrow-up-big-small"></i></label>
                <select class="form-select" id="size2">
                  <option disabled selected>กรุณาเลือกขนาดของสินค้า</option>
                 
                  <option value="XL">XL</option>
                  <option value="L">L</option>
                  <option value="ม้วน">ม้วน</option>
                </select>
              </div>

              <label class="form-label">สีของสินค้า</label>
              <div class="input-group mb-3">
                <label class="input-group-text" for="color"><i class="fa-solid fa-eye-dropper"></i></label>
                <select class="form-select" id="color2">
                  <option disabled selected>กรุณาเลือกสีของสินค้า</option>
                 
                  <option value="แดง">แดง</option>
                  <option value="ดำ">ดำ</option>
                  <option value="เหลือง">เหลือง</option>
                </select>
              </div>

              <label class="form-label">จำนวนสินค้า</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="qtys"><i class="fa-solid fa-cart-plus"></i></span>
                <input type="number" class="form-control" id="qty2" min="0" value="0" aria-label="Username" aria-describedby="qtys">
              </div>       

              <label class="form-label">ขั้นต่ำที่ต้องสั่งซื้อ</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="mins"><i class="fa-solid fa-circle-minus"></i></span>
                <input type="number" class="form-control" id="min2" min="0" value="0" aria-label="Username" aria-describedby="mins">
              </div> 

              <label class="form-label">จำนวนสินค้าที่ไม่จำเป็นต้องสั่งเพิ่ม</label>
              <div class="input-group mb-3">
                <span class="input-group-text" id="maxs"><i class="fa-solid fa-basket-shopping"></i></span>
                <input type="number" class="form-control" id="max2" min="0" value="0" aria-label="Username" aria-describedby="maxs">
              </div> 

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="button" id="save2" class="btn btn-primary">บันทึก</button>
            </div>
          </div>
        </div>
      </div>



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