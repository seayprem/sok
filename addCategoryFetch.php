<?php 
include_once('config/db.php');
$output = '';

if(isset($_POST['query'])) {
  $query = $_POST['query'];
  $sql = "SELECT * FROM `category` WHERE cate_name LIKE '%".$query."%'";
} else {
  $sql = "SELECT * FROM `category` ORDER BY cate_id DESC";
}

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
  $totalfound = mysqli_num_rows($result);
  // $output .= '<h4 align="center">ผลการค้นหา</h4>';
  // $output .= '<h3 align="center">พบ '.$totalfound.' รายการ</h3>';
  $output .= '<div class="table-responsive">
    <table class="table table bordered">
      <tr>
        <th>ลำดับ</th> 
        <th>ชื่อประเภทสินค้า</th> 
        <th col="2">จัดการ</th> 
      </tr>';
  while($row = mysqli_fetch_array($result)) {
    $output .= '
    <tr>
      <td>'.$row['cate_id'].'</td> 
      <td>'.$row['cate_name'].'</td> 
      <td>
        <a class="btn btn-warning" id="edit">แก้ไข</a>
        <a class="btn btn-danger" id="delete">ลบ</a>
      </td> 
    </tr> 
    ';
  }
  echo $output;
} else {
  echo '<p align="center">ไม่พบข้อมูล</p>';
}
?>