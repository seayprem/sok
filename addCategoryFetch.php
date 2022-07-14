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
  // $output .= '<h5 align="right">มี '.$totalfound.' รายการ</h5>';
  while($row = mysqli_fetch_array($result)) {
    $output .= '
    <tr>
      <td>'.$row['cate_id'].'</td> 
      <td>'.$row['cate_name'].'</td> 
      <td>
        <a data-id="'.$row['cate_id'].'" data-bs-toggle="modal" data-bs-target="#cateModal" class="btn btn-warning edit" id="edit">แก้ไข</a>
        <a data-id="'.$row['cate_id'].'" class="btn btn-danger delete" id="delete">ลบ</a>
      </td> 
    </tr> 
    ';
  }
  echo $output;
} else {
  echo '<p align="center">ไม่พบข้อมูล</p>';
}
?>