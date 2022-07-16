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
        <h2 class="fs-5"> เพิ่มข้อมูลบริษัทคู่ค้าการผลิต</h2>
        <button class="btn btn-success" id="add">เพิ่มข้อมูลบริษัทคู่ค้าการผลิต</button>
        <hr>
        
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">

              <div class="table-responsive">
                <table class="table align-middle table-hover" id="myTable">
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">ชื่อบริษัท</th>
                      <th class="text-center">ที่อยู่</th>
                      <th class="text-center">อีเมล์</th>
                      <th class="text-center">เบอร์โทรติดต่อ</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('config/db.php');
                    $sql = "SELECT * FROM supplier";
                    $query = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_array($query)) {

                    
                    ?>
                    <tr class="text-center" id="<?= $row['sup_id']; ?>">
                      <td data-target="name"><?= $row['sup_company']; ?></td>
                      <td data-target="address"><?= $row['sup_address']; ?></td>
                      <td data-target="email"><?= $row['sup_email']; ?></td>
                      <td data-target="phone"><?= $row['sup_phone']; ?></td>
                      <td>
                        <a data-id="<?= $row['sup_id']; ?>" data-role="edit" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a data-id="<?= $row['sup_id']; ?>" data-role="delete" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">ชื่อบริษัท</th>
                      <th class="text-center">ที่อยู่</th>
                      <th class="text-center">อีเมล์</th>
                      <th class="text-center">เบอร์โทรติดต่อ</th>
                      <th class="text-center">จัดการ</th>
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
  <script src="js/supplier.js"></script>

</body>
</html>