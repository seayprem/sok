<?php 
include_once('config/db.php');

if(isset($_POST['addproduct'])) {

  $code = $_POST['code'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $color = $_POST['color'];
  $qty = $_POST['qty'];
  $min = $_POST['min'];
  $max = $_POST['max'];

  $sql = "INSERT INTO `inventory` (inv_id, inv_name, inv_qty, inv_min, inv_max, inv_size, inv_color, cate_id) VALUES ('".$code."', '".$name."', $qty, $min, $max, $size, $color, $type)";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

?>