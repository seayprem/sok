<?php 
session_start();
if(empty($_SESSION['emp_level'])) {
  echo '<script>alert("คุณไม่ได้รับอนุญาตในการเข้าถึงหน้าต่างนี้");window.location.href = "login.php"</script>';
}

include_once('config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>เพิ่มรายการเดินสินค้า - SOK Dashboard</title>
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
                <a class="nav-link active" aria-current="page" href="#">
                  <?= $_SESSION['emp_fname']; ?>
                  <?= $_SESSION['emp_lname']; ?>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- end navbar body  -->


      <!-- content body  -->

      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> เพิ่มรายการเดินสินค้า</h2>
        <button class="btn btn-success" id="add">เพิ่มข้อมูลรายการเดินสินค้า</button>
        <a href="addTransfer.php" class="btn btn-success" id="normal">แสดงรายการทั้งหมดแบบปกติ</a>
        <a href="addTransfer.php?status=1" class="btn btn-success" id="import">แสดงรายการนำเข้า</a>
        <a href="addTransfer.php?status=2" class="btn btn-success" id="export">แสดงรายการเบิกจ่าย</a>
        <hr>

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">

              <div class="table-responsive">

                <!-- Table  -->

                <table class="table align-middle table-hover" id="myTable">
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">ลำดับเลขทำรายการ</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th style="display: none;"></th>
                      <th style="display: none;"></th>
                      <th style="display: none;"></th>
                      <th style="display: none;"></th>
                      <th class="text-center">ประเภทสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">ประเภทการทำรายการ</th>
                      <th class="text-center">เบิกโดย พนัก/บริษัท</th>
                      <th class="text-center">เวลาทำรายการ</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    error_reporting(0); // ปิด Error
                    if($_GET['status'] == 1) {
                      $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE transfer.t_status = 1";
                    } else if($_GET['status'] == 2) {
                      $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE transfer.t_status = 2";
                    } else {
                      $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE (transfer.emp_id IS NULL or transfer.emp_id = '') OR (transfer.emp_id IS NOT NULL or transfer.emp_id != '') OR (transfer.sup_id IS NULL or transfer.sup_id = '') OR (transfer.sup_id IS NOT NULL or transfer.sup_id != '') OR (transfer.inv_id IS NULL or transfer.inv_id = '') OR (transfer.inv_id IS NOT NULL or transfer.inv_id != '')";
                    }
                    
                    
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($query)) {

                    
                    ?>
                    <tr id="<?= $row['t_id']; ?>" class="text-center">
                      <td><?= $row['t_id']; ?></td>
                      <td data-target="product"><?= $row['inv_name']; ?></td>
                      <td data-target="category"><?= $row['cate_name']; ?></td>
                      <td data-target="amount"><?= $row['t_qty']; ?></td>
                      <td data-target="status2" style="display: none;"><?= $row['t_status']; ?></td>
                      <td data-target="empid" style="display: none;"><?= $row['emp_id']; ?></td>
                      <td data-target="supid" style="display: none;"><?= $row['sup_id']; ?></td>
                      <td data-target="productId" style="display: none;"><?= $row['inv_id']; ?></td>
                      <td data-target="statut">
                        <?php 
                        if($row['t_status'] == 1) {
                          ?>
                          <h5><span class="badge rounded-pill bg-success">นำเข้า</span></h5>
                        <?php } ?>
                        <?php 
                        if($row['t_status'] == 2) {
                          ?>
                          <h5><span class="badge rounded-pill bg-danger">เบิกจ่าย</span></h5>
                        <?php } ?>
                      </td>
                      <td data-target="empname"><?= $row['emp_fname'] ?><?= $row['sup_company']; ?></td>
                      <td data-target="timedate"><?php echo DateThai($row['t_datetime']); ?></td>
                      <td>
                        <a data-id="<?= $row['t_id']; ?>" data-role="info" href="#" class="btn btn-secondary"><i class="fa-solid fa-circle-info"></i></a>
                        <a data-id="<?= $row['t_id']; ?>" data-role="edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a data-id="<?= $row['t_id']; ?>" data-role="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">ลำดับเลขทำรายการ</th>
                      <th class="text-center">ชื่อสินค้า</th>
                      <th class="text-center">ประเภทสินค้า</th>
                      <th class="text-center">จำนวนสินค้า</th>
                      <th class="text-center">ประเภทการทำรายการ</th>
                      <th class="text-center">เบิกโดย พนัก/บริษัท</th>
                      <th class="text-center">เวลาทำรายการ</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                </table>

                <!-- End Table  -->

              </div>

            </div>
          </div>
        </div>
      </div>
      <!-- end content body  -->

      <!-- Modal -->
      <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addModalLabel">เพิ่มรายการเดินสินค้า</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="#" method="POST">
                <div class="mb-3">
                  <label class="form-label">รายการสินค้า</label>
                  <select class="form-select" id="inv_id">
                    <option selected disabled>----- กรุณาเลือกสินค้า -----</option>
                    <?php 
                    $inventory_sql = "SELECT * FROM inventory INNER JOIN category ON inventory.cate_id = category.cate_id ORDER BY inv_id DESC";
                    $inventory_query = mysqli_query($conn, $inventory_sql);
                    while($inventory_row = mysqli_fetch_array($inventory_query)) {

                    
                    ?>
                    <option value="<?= $inventory_row['inv_id']; ?>"><?= $inventory_row['inv_id']; ?> - <?= $inventory_row['inv_name']; ?> - <?= $inventory_row['cate_name']; ?> - <?= $inventory_row['inv_color']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">จำนวนสินค้า</label>
                  <input type="number" class="form-control" value="0" id="qty" placeholder="กรุณาป้อนจำนวนสินค้า" min="0">
                </div>
                <div class="mb-3">
                  <label class="form-label">ประเภทการทำรายการ</label>
                  <select class="form-select" id="status">
                    <option selected disabled>----- กรุณาเลือกประเภททำรายการ ----</option>
                    <option value="1">นำเข้า</option>
                    <option value="2">เบิกจ่าย</option>
                  </select>
                </div>
                <!-- <div class="mb-3" >
                  <label class="form-label">พนักงาน / บริษัท</label>
                  <select class="form-select" id="selectMode">
                    <option selected disabled>----- กรุณาเลือกบุคคลที่ทำรายการ ----</option>
                    <option value="1">พนักงาน</option>
                    <option value="2">บริษัท</option>
                  </select>
                </div> -->
                <div class="mb-3" id="emp">
                  <label class="form-label">พนักงาน</label>
                  <select class="form-select" id="empId">
                    <option selected disabled>----- กรุณาเลือกพนักงาน ----</option>
                    <?php 
                    $employee_sql = "SELECT * FROM employee WHERE emp_level = 1 ORDER BY emp_id DESC";
                    $employee_query = mysqli_query($conn, $employee_sql);
                    while($employee_row = mysqli_fetch_array($employee_query)) {
                    ?>
                    <option value="<?= $employee_row['emp_id']; ?>"><?= $employee_row['emp_fname']; ?>&nbsp;&nbsp;<?= $employee_row['emp_lname']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3" id="company">
                  <label class="form-label">บริษัท</label>
                  <select class="form-select" id="supId">
                    <option selected disabled>----- กรุณาเลือกบริษัท ----</option>
                    <?php 
                    $company_sql = "SELECT * FROM `supplier` ORDER BY sup_id DESC";
                    $company_query = mysqli_query($conn, $company_sql);
                    while($company_row = mysqli_fetch_array($company_query)) {
                    ?>
                    <option value="<?= $company_row['sup_id']; ?>"><?= $company_row['sup_company']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
              <button type="button" class="btn btn-primary" id="save">บันทึก</button>
            </div>
          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="infoModalLabel">รายละเอียดรายการเดินสินค้า</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <h5><b>ลำดับเลขทำรายการ: </b><a id="infoId"></a></h5>
              <h5><b>ชื่อสินค้า: </b><a id="infoProduct"></a></h5>
              <h5><b>ประเภทสินค้า: </b><a id="infoType"></a></h5>
              <h5><b>จำนวนสินค้า: </b><a id="infoAmount"></a></h5>
              <h5><b>สถานะทำรายการ: </b>
                <p id="infoStatus" class="badge rounded-pill bg-secondary" data-status="import"></p>
              </h5>
              <h5><b>พนักงาน / บริษัท: </b><a id="infoEmpname"></a></h5>
              <h5><b>วันที่เวลาทำรายการ: </b><a id="infoDatetime"></a></h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="editModalLabel">รายละเอียดรายการเดินสินค้า</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="#" method="POST">
                <div class="mb-3">
                  <label class="form-label">รายการสินค้า</label>
                  <select class="form-select" id="inv_id2">
                    <option value="" id="productId" selected></option>
                    <option disabled>----- กรุณาเลือกสินค้า -----</option>
                    <?php 
                    $inventory_sql = "SELECT * FROM `inventory` ORDER BY inv_id DESC";
                    $inventory_query = mysqli_query($conn, $inventory_sql);
                    while($inventory_row = mysqli_fetch_array($inventory_query)) {

                    
                    ?>
                    <option value="<?= $inventory_row['inv_id']; ?>"><?= $inventory_row['inv_name']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label class="form-label">จำนวนสินค้า</label>
                  <input type="number" class="form-control" value="0" id="qty2" placeholder="กรุณาป้อนจำนวนสินค้า" min="0">
                </div>
                <div class="mb-3">
                  <label class="form-label">ประเภทการทำรายการ</label>
                  <select class="form-select" id="status2">
                    <option id="st2" value="" selected></option>
                    <option  disabled>----- กรุณาเลือกประเภททำรายการ ----</option>
                    <option value="1">นำเข้า</option>
                    <option value="2">เบิกจ่าย</option>
                  </select>
                </div>
                <!-- <div class="mb-3" >
                  <label class="form-label">พนักงาน / บริษัท</label>
                  <select class="form-select" id="selectMode">
                    <option selected disabled>----- กรุณาเลือกบุคคลที่ทำรายการ ----</option>
                    <option value="1">พนักงาน</option>
                    <option value="2">บริษัท</option>
                  </select>
                </div> -->
                <div class="mb-3" id="emp2">
                  <label class="form-label">พนักงาน</label>
                  <select class="form-select" id="empId2">
                    <option id="selempid2" value="" selected></option>
                    <option disabled>----- กรุณาเลือกพนักงาน ----</option>
                    <?php 
                    $employee_sql = "SELECT * FROM employee ORDER BY emp_id DESC";
                    $employee_query = mysqli_query($conn, $employee_sql);
                    while($employee_row = mysqli_fetch_array($employee_query)) {
                    ?>
                    <option value="<?= $employee_row['emp_id']; ?>"><?= $employee_row['emp_fname']; ?>&nbsp;&nbsp;<?= $employee_row['emp_lname']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3" id="company2">
                  <label class="form-label">บริษัท</label>
                  <select class="form-select" id="supId2">
                    <option id="selsupid2" value="" selected></option>
                    <option  disabled>----- กรุณาเลือกบริษัท ----</option>
                    <?php 
                    $company_sql = "SELECT * FROM `supplier` ORDER BY sup_id DESC";
                    $company_query = mysqli_query($conn, $company_sql);
                    while($company_row = mysqli_fetch_array($company_query)) {
                    ?>
                    <option value="<?= $company_row['sup_id']; ?>"><?= $company_row['sup_company']; ?></option>
                    <?php } ?>
                  </select>
                </div>
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
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/addTransfer.js"></script>

</body>

</html>