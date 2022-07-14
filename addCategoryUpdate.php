<?php 
include_once('config/db.php');
$output = '';

if(isset($_POST['cateid'])) {
  $cate_id = $_POST['cateid'];
  $sql = "SELECT * FROM `category` WHERE cate_id = '".$cate_id."'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)) {
    echo $output .= '
    <div class="input-group mb-3">
      <span class="input-group-text" id="cate_name"><i class="fa-solid fa-cart-plus"></i></span>
      <input type="text" class="form-control" id="catename" placeholder="กรุณาป้อนชื่อหมวดหมู่สินค้า" value="'.$row['cate_name'].'" aria-label="Username" aria-describedby="cate_name">
      <input type="hidden" id="cateid" value="'.$row['cate_id'].'">
    </div>
    ';
  }

}

if(isset($_POST['update'])) {
  $update_id = $_POST['update'];
  $name = $_POST['name'];
  $update_sql = "UPDATE `category` SET cate_name = '".$name."' WHERE cate_id = '".$update_id."'";
  $update_query = mysqli_query($conn, $update_sql);
  if($update_query) {
    echo "success";
  } else {
    echo "failed";
  }
}



?>