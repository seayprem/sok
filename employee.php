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
      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> รายการผู้ใช้</h2>
        <hr>
        <div class="col-md-12">
          <div class="row">
            <!-- <div class="col-md-8"> -->
              <form action="#" method="post">
              </form>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-2">
                <button class="btn btn-success" id="add"><i class="fa-solid fa-user-plus"></i> เพิ่มผู้ใช้</button>
            </div>

              <div class="table-responsive">
                <table class="table align-middle table-hover" id="myTable">
                  <thead class="table-dark">
                    <tr>
                      <th class="text-center">ไอดี</th>
                      <th class="text-center">ชื่อ</th>
                      <th style="display:none;" class="text-center">ชื่อ</th>
                      <th style="display:none;" class="text-center">ชื่อ</th>
                      <th class="text-center">นามสกุล</th>
                      <th class="text-center">ที่อยู่</th>
                      <th class="text-center">เบอร์โทร</th>
                      <th class="text-center">ตำแหน่ง</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                  <tbody id="showemp" class="text-center">
                    <!-- show data -->
                    <?php
                      include_once('config/db.php');
                      $sql = "SELECT * FROM `employee`";
                      $query = mysqli_query($conn, $sql);
                      while($row = mysqli_fetch_array($query)) {
                      ?>
                      <tr id="<?= $row['emp_id']; ?>">
                        <td><?= $row['emp_id']; ?></td>
                        <td style="display:none;" data-target="user"><?= $row['emp_user']; ?></td>
                        <td style="display:none;" data-target="pass"><?= $row['emp_pass']; ?></td>
                        <td data-target="fname"><?= $row['emp_fname']; ?></td>
                        <td data-target="lname"><?= $row['emp_lname']; ?></td>
                        <td data-target="address"><?= $row['emp_address']; ?></td>
                        <td data-target="phone"><?= $row['emp_phone']; ?></td>
                        <td data-target="level"><?= $row['emp_level']; ?></td>
                        <td>
                          <a href="#" data-role="edit" data-id="<?= $row['emp_id']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                          <a href="#" data-role="delete" data-id="<?= $row['emp_id']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                      </tr>
                    <?php } ?>
                  </tbody>
                  <thead class="table-dark">
                  <tr>
                      <th class="text-center">ไอดี</th>
                      <th class="text-center">ชื่อ</th>
                      <th class="text-center">นามสกุล</th>
                      <th class="text-center">ที่อยู่</th>
                      <th class="text-center">เบอร์โทร</th>
                      <th class="text-center">ตำแหน่ง</th>
                      <th class="text-center">จัดการ</th>
                    </tr>
                  </thead>
                </table>
                  
              </div>
                <!-- Modal -->
              <div class="modal fade" id="addEmpModal" tabindex="-1" aria-labelledby="addEmpModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="addEmpModalLabel">เพิ่มผู้ใช้</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <label class="control-label">Username</label>
                          <div>
                              <input type="text" class="form-control input-lg" id="username" name="" value="">
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <div>
                                <input type="password" class="form-control input-lg" id="password" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">ชื่อจริง</label>
                            <div>
                                <input type="text" class="form-control input-lg" id="fname" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">นามสกุล</label>
                            <div>
                                <input type="text" class="form-control input-lg" id="lname" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">ที่อยู่</label>
                            <div>
                                <input type="text" class="form-control input-lg" id="address" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">เบอร์โทร</label>
                            <div>
                                <input type="text" class="form-control input-lg" id="phone" name="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">ตำแหน่ง</label>
                            <div>
                                <select class="form-select" id="level">
                                  <option disabled selected>เลือกตำแหน่งงาน</option>
                                  <option value="1">พนักงานคลังสินค้า</option>
                                  <option value="2">ผู้จัดการ</option>
                                  <option value="3">แอดมิน</option>
                                </select>
                            </div>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                      <button type="button" class="btn btn-primary" id="add_emp">บันทึก</button>
                    </div>
                  </div>
                </div>
              </div>

                <!-- Edit Modal -->
                <div class="modal fade" id="editEmpModal" tabindex="-1" aria-labelledby="addEmpModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editEmpModalLabel">แก้ไขข้อมูล</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form>
                          <div class="form-group">
                            <label class="control-label">รหัสพนักงาน</label>
                            <div>
                                <input type="text" class="form-control input-lg" disabled id="code2" name="" value="">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Username</label>
                            <div>
                                <input type="text" class="form-control input-lg" id="user2" name="" value="">
                            </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label">Password</label>
                              <div>
                                  <input type="password" class="form-control input-lg" id="pass2" name="" value="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label">ชื่อจริง</label>
                              <div>
                                  <input type="text" class="form-control input-lg" id="fname2" name="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label">นามสกุล</label>
                              <div>
                                  <input type="text" class="form-control input-lg" id="lname2" name="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label">ที่อยู่</label>
                              <div>
                                  <input type="text" class="form-control input-lg" id="address2" name="">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="control-label">เบอร์โทร</label>
                              <div>
                                  <input type="text" class="form-control input-lg" id="phone2" name="">
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="control-label">ตำแหน่ง</label>
                            <div>
                                <select class="form-select" id="level2">
                                  <option disabled selected>เลือกตำแหน่งงาน</option>
                                  <option value="1">พนักงานคลังสินค้า</option>
                                  <option value="2">ผู้จัดการ</option>
                                  <option value="3">แอดมิน</option>
                                </select>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="button" class="btn btn-primary" id="edit_emp">บันทึก</button>
                      </div>
                    </div>
                  </div>
                </div>

          </div>
        </div>
      </div>
    </div>
    <?php } else {
      echo '<script>alert("หน้าเพจนี้สำหรับแอดมินเท่านั้น!");window.location.href = "index.php"</script>';
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
  <script src="js/employee.js"></script>
</body>
</html>