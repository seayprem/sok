<?php 
include_once('config/db.php');
$output = '';

if(isset($_POST['query'])) {
  $query = $_POST['query'];
  $sql = "SELECT * FROM `employee` WHERE emp_fname LIKE '%".$query."%'";
} else {
  $sql = "SELECT * FROM `employee` ORDER BY emp_id DESC";
}

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0) {
  $totalfound = mysqli_num_rows($result);
  // $output .= '<h4 align="center">ผลการค้นหา</h4>';
  // $output .= '<h5 align="right">มี '.$totalfound.' รายการ</h5>';
  while($row = mysqli_fetch_array($result)) {
    $output .= '
    <tr>
      <td>'.$row['emp_id'].'</td> 
      <td>'.$row['emp_fname'].'</td> 
      <td>'.$row['emp_lname'].'</td> 
      <td>'.$row['emp_address'].'</td> 
      <td>'.$row['emp_phone'].'</td> 
      <td>'.$row['emp_level'].'</td> 
      <td>
        <a data-id="'.$row['emp_id'].'" data-bs-toggle="modal" data-bs-target="#cateModal" class="btn btn-warning edit" id="edit">แก้ไข</a>
        <a data-id="'.$row['emp_id'].'" data-names="'.$row['emp_fname'].'" class="btn btn-danger delete" id="delete">ลบ</a>
      </td> 
    </tr> 
    ';
  }
  echo $output;
} else {
  echo '<p align="center">ไม่พบข้อมูล</p>';
}
?>