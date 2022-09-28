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
  <title>เพิ่มข้อมูลบริษัทคู่ค้าการผลิต - SOK Dashboard</title>
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
    if($_SESSION['emp_level'] == 1) {
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
        <h2 class="fs-5"> ออกรายงานสรุป</h2>
        <a href="reportSummary.php" class="btn btn-primary">ประวัติการทำรายงานสรุป</a>
        <!-- Date Picker  -->
        <form action="report.php" method="POST">
        <div class="row">
          <div class="col-md-3">
                <div class="mb-3 mt-3">
                  <label class="form-label">เลือกวันที่เริ่มต้น</label>
                  <input type="date" name="date_start" class="form-control">
                  <label class="form-label">เวลา</label>
                  <input type="time" name="time_start" class="form-control">

                </div>
                <button class="btn btn-primary" id="time_select" name="time_select">ตกลง</button>
          </div>
          <div class="col-md-3">
            <div class="mb-3 mt-3">
              <label class="form-label">เลือกวันที่สิ้นสุด</label>
              <input type="date" name="date_end" class="form-control">
              <label class="form-label">เวลา</label>
              <input type="time" name="time_end" class="form-control">
            </div>
            
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="d-grid 2-gap">
                
              </div>
            </div>
          </div>
          
        </div>
        </form>
        <!-- Date Picker  -->




        <?php 
        if($_GET['status'] == 1) {
          $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE transfer.t_status = 1";
        } else if($_GET['status'] == 2) {
          $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE transfer.t_status = 2";
          // เลือกวันที่เวลา 
        } else if(isset($_POST['time_select'])) {


          $date_start = $_POST['date_start'];
          $time_start = $_POST['time_start'];
          $date_end = $_POST['date_end'];
          $time_end = $_POST['time_end'];

          $status_show_btn_report = 1;
         

          if(empty($date_start) && empty($time_start) && empty($date_end) && empty($time_end)) {
            // $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id";
            $status_show_btn_report = 2;

          } else if(empty($time_start) && empty($time_end)) {
            $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id WHERE DATE(t_datetime) BETWEEN '$date_start' AND '$date_end'";
          } else {
            $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id WHERE t_datetime BETWEEN '$date_start $time_start' AND '$date_end $time_end'";
          }
          // $sql = "SELECT * FROM `transfer` WHERE DATE(t_datetime) >= '$date_start $time_start' AND DATE(t_datetime) <= '$date_end $time_end'";

        } else {
          // $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE (transfer.emp_id IS NULL or transfer.emp_id = '') OR (transfer.emp_id IS NOT NULL or transfer.emp_id != '') OR (transfer.sup_id IS NULL or transfer.sup_id = '') OR (transfer.sup_id IS NOT NULL or transfer.sup_id != '') OR (transfer.inv_id IS NULL or transfer.inv_id = '') OR (transfer.inv_id IS NOT NULL or transfer.inv_id != '')";
        }
        ?>

        <!-- ออกรายงาน -->
        
        <?php 
        if($status_show_btn_report == 1) {

        
        ?>
        <br>
        <div class="justify-content-end">
          <form action="prepareReport.php" method="POST" target="_blank">
            <input type="hidden" name="date_start" value="<?= $date_start; ?>">
            <input type="hidden" name="time_start" value="<?= $time_start; ?>">
            <input type="hidden" name="date_end" value="<?= $date_end; ?>">
            <input type="hidden" name="time_end" value="<?= $time_end; ?>">
            <input type="submit" name="report" class="btn btn-success" value="ออกรายงาน">
          </form>
        </div>
        <?php } ?>
        <!-- ออกรายงาน -->

        <hr>
        
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">

              <div class="table-responsive">
                <table class="table align-middle table-hover" id="myTable">
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">รหัสสินค้า</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">สถานะ</th>
                      <th class="text-center">วันเวลา</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    
                    $query = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($query)) {

                    
                    ?>
                    <tr class="text-center">
                      <td><?= $row['inv_id']; ?></td>
                      <td><?= $row['inv_name']; ?></td>
                      <td><?= $row['t_qty']; ?></td>
                      <td><?php 
                        if($row['t_status'] == 1) {
                          ?>
                          <h5><span class="badge rounded-pill bg-success">นำเข้า</span></h5>
                        <?php } ?>
                        <?php 
                        if($row['t_status'] == 2) {
                          ?>
                          <h5><span class="badge rounded-pill bg-danger">เบิกจ่าย</span></h5>
                        <?php } ?></td>
                      <td><?php echo DateThai($row['t_datetime']); ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">รหัสสินค้า</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">สถานะ</th>
                      <th class="text-center">วันเวลา</th>
                    </tr>
                  </thead>
                </table>
                
              </div>

            </div>
          </div>
        </div>
      </div>

      
      <!-- end content body  -->

      <!-- Modal ADD DATA -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">เพิ่มข้อมูลบริษัทคู่ค้าการผลิต</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- FORM SUPPLIER TO ADD IN DATABASE  -->
              <form action="#" method="POST">
                <div class="mb-3">
                  <label class="col-form-label">ชื่อบริษัท:</label>
                  <input type="text" class="form-control" id="name">
                </div>
                <div class="mb-3">
                  <label class="col-form-label">ที่อยู่บริษัท:</label>
                  <textarea class="form-control" rows="4" id="address"></textarea>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">อีเมล์ติดต่อ:</label>
                  <input type="text" class="form-control" id="email">
                </div>
                <div class="mb-3">
                  <label class="col-form-label">เบอร์โทรติดต่อ:</label>
                  <input type="text" class="form-control" id="phone">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-primary" id="addtosave">บันทึก</button>
            </div>
          </div>
        </div>
      </div>



      <!-- Modal EDIT INFO & UPDATE DATA -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">เพิ่มข้อมูลบริษัทคู่ค้าการผลิต</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- FORM SUPPLIER TO ADD IN DATABASE  -->
              <form action="#" method="POST">
                <div class="mb-3">
                  <label class="col-form-label">ชื่อบริษัท:</label>
                  <input type="text" class="form-control" id="name2">
                </div>
                <div class="mb-3">
                  <label class="col-form-label">ที่อยู่บริษัท:</label>
                  <textarea class="form-control" rows="4" id="address2"></textarea>
                </div>
                <div class="mb-3">
                  <label class="col-form-label">อีเมล์ติดต่อ:</label>
                  <input type="text" class="form-control" id="email2">
                </div>
                <div class="mb-3">
                  <label class="col-form-label">เบอร์โทรติดต่อ:</label>
                  <input type="text" class="form-control" id="phone2">
                </div>
                <input type="hidden" id="id2">
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-primary" id="update">บันทึก</button>
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
          title: 'หน้าเพจนี้ได้สำหรับพนักงานจัดการคลังสินค้าเท่านั้น',
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
  <script src="js/report.js"></script>

</body>
</html>