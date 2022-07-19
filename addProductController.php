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

  $sql = "INSERT INTO `inventory` (inv_id, inv_name, inv_qty, inv_min, inv_max, inv_size, inv_color, cate_id) VALUES ('".$code."', '".$name."', $qty, $min, $max, '$size', '$color', $type)";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

if(isset($_POST['update'])) {
  $code = $_POST['code'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $color = $_POST['color'];
  $qty = $_POST['qty'];
  $min = $_POST['min'];
  $max = $_POST['max'];

  $sql = "UPDATE `inventory` SET inv_name = '".$name."', inv_qty = $qty, inv_min = $min, inv_max = $max, inv_size = '$size', inv_color = '$color', cate_id = $type WHERE inv_id = '".$code."' ";
  $query = mysqli_query($conn, $sql);
  
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

if(isset($_POST['delete'])) {
  $code = $_POST['code'];
  $sql = "DELETE FROM `inventory` WHERE inv_id = '".$code."' ";
  $query = mysqli_query($conn, $sql);
  
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

?>