<?php 
session_start();
error_reporting(0);
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
  // echo '<script>alert("คุณไม่ได้รับอนุญาตในการเข้าถึงหน้าต่างนี้");window.location.href = "login.php"</script>';
}
include_once('config/db.php');
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

      <!-- Dashboard System -->
      <?php
      $total_count = "SELECT COUNT(*) as total FROM `transfer` WHERE CONVERT(`t_datetime`, DATE) = CURRENT_DATE";
      $total_query = mysqli_query($conn, $total_count);
      $total_result = mysqli_fetch_assoc($total_query);

      $input_count = "SELECT COUNT(*) as input FROM `transfer` WHERE CONVERT(`t_datetime`, DATE) = CURRENT_DATE AND `t_status` = 1";
      $input_query = mysqli_query($conn, $input_count);
      $input_result = mysqli_fetch_assoc($input_query);

      $output_count = "SELECT COUNT(*) as output FROM `transfer` WHERE CONVERT(`t_datetime`, DATE) = CURRENT_DATE AND `t_status` = 2";
      $output_query = mysqli_query($conn, $output_count);
      $output_result = mysqli_fetch_assoc($output_query);

      $inv_sum = "SELECT SUM(`inv_qty`) as inv FROM `inventory`";
      $inv_query = mysqli_query($conn, $inv_sum);
      $inv_result = mysqli_fetch_assoc($inv_query);
      ?>

      <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> Dashboard</h2>
        <hr>
        <div class="col-md-12">
          <div class="row">

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-primary text-white">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-arrow-right-arrow-left" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3"><?php echo $total_result['total']; ?></h3>
                      <h6>รายการเดินสินค้าวันนี้</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-success text-white">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-truck" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3"><?php echo $input_result['input']; ?></h3>
                      <h6>สินค้าที่นำเข้าวันนี้</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-warning text-dark">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-dolly" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3"><?php echo $output_result['output']; ?></h3>
                      <h6>สินค้าที่เบิกจ่ายวันนี้</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->

            <!-- Show Detail  -->
            <div class="col-md-3">
              <div class="card text-center">
                <div class="card-header bg-secondary text-white">
                  <div class="row align-items-center">
                    <div class="col">
                      <i class="fa-solid fa-dolly" style="font-size: 5rem;"></i>
                    </div>
                    <div class="col">
                      <h3 class="display-3"><?php echo $inv_result['inv']; ?></h3>
                      <h6>สินค้าคงเหลือทั้งหมด</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Show Detail  -->


          </div>
        </div>

        <!-- Chart Data  -->

        <hr>

        <div class="col-md-12">
          <div class="row">
            <div class="col-md-3">
              
            </div>
            <div class="col-md-6">
              <canvas id="myChartSize" height="500"></canvas>
            </div>
            <div class="col-md-3">
              
            </div>
          </div>
        </div>


        <hr>
        <div class="dashboard-content px-3 pt-4">
        <h2 class="fs-5"> รายการเดินสินค้าทั้งหมด</h2>
        <a href="transfer.php" class="btn btn-warning" id="normal">แสดงรายการทั้งหมด</a>
        <hr>
        <h2 class="fs-5">รายการเดินสินค้า <i class="fa-solid fa-arrow-right-arrow-left"></i></h2>
        <!-- Table Transfer  -->
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
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    if($_GET['status'] == 1) {
                      $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE transfer.t_status = 1";
                    } else if($_GET['status'] == 2) {
                      $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE transfer.t_status = 2";
                    } else if(isset($_POST['time_select'])) {
                      $date_start = $_POST['date_start'];
                      $time_start = $_POST['time_start'];
                      $date_end = $_POST['date_end'];
                      $time_end = $_POST['time_end'];

                      if(empty($date_start) && empty($time_start) && empty($date_end) && empty($time_end)) {
                        $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id";
                      } else if(empty($time_start) && empty($time_end)) {
                        $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE DATE(t_datetime) BETWEEN '$date_start' AND '$date_end'";
                      } else {
                        $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE t_datetime BETWEEN '$date_start $time_start' AND '$date_end $time_end'";
                      }
                      // $sql = "SELECT * FROM `transfer` WHERE DATE(t_datetime) >= '$date_start $time_start' AND DATE(t_datetime) <= '$date_end $time_end'";
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
                    </tr>
                  </thead>
                </table>

                <!-- End Table  -->
        </div>

      </div>
    </div>
  </div>



    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script> -->


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/sweetalert2@11.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/logout.js"></script>
    <script src="js/responsive.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/addTransfer.js"></script>


    <!-- Chart System -->
    <?php
    $chart_sql = "SELECT `inv_color`, SUM(`inv_qty`) as inv_qty FROM `inventory` GROUP BY `inv_color`";
    $chart_query = mysqli_query($conn, $chart_sql);
    // $chart_result = mysqli_fetch_assoc($chart_query);
    $chart_data = "";

    while ($row = mysqli_fetch_array($chart_query)){
      $inv_color[] = $row['inv_color'];
      $inv_qty[] = $row['inv_qty'];
    }

    // print (json_encode($chart_array));
    ?>

    <script>

      const chartSize = document.getElementById('myChartSize');
      const myChartSize = new Chart(chartSize, {
        type: 'bar',
        data: {
          labels: ['ดำ', 'แดง', 'เหลือง'],
          // labels: <?php echo json_encode($inv_color); ?>,
          datasets: [{
            label: 'สินค้าคงคลัง (สีของพรม)',
            data: <?php echo json_encode($inv_qty); ?>,
            backgroundColor: [
              'rgb(0, 0, 0)',
              'rgb(255, 99, 132)',
              'rgb(255, 205, 86)'
            ],
          }]
        },
        options: {
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });




      function popups() {
        // Swal.fire('Any fool can use a computer')
        alert("wd")
      }

      
    </script>





</body>

</html>