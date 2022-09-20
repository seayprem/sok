<?php 
include_once('config/db.php');

if(isset($_POST['addproduct'])) {

  $code = $_POST['code'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $qty = $_POST['qty'];
  $min = $_POST['min'];
  // $max = $_POST['max'];
  $filename = $_FILES['file']['name'];
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  $random = rand(0, 999999999);
  $rename = 'product'.date('ymdhis').$random;
  $newname = $rename . '.' . $extension;

  $code_sub = $_POST['code'].'L';
  $name_sub = $_POST['name'].'';

  $sql = "SELECT COUNT(*) AS num_rows FROM `inventory` WHERE inv_id = '".$code."'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  if($row["num_rows"] > 0) {
    echo "error_inv_id";
  } else if ($size == 'XL') {

    if(empty($filename)) {
      echo "failed";
    } else {
      move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $newname);
    
      $sql = "INSERT INTO `inventory` (inv_id, inv_name, inv_image, inv_qty, inv_min, inv_size, cate_id, inv_sub_id) VALUES ('".$code."', '".$name."', '".$newname."', $qty, $min, '$size', $type, '".$code_sub."'), ('".$code_sub."', '".$name_sub."', '".$newname."', 0, 0, 'L', $type, null)";
      $query = mysqli_query($conn, $sql);
      if($query) {
        echo "success";
      } else {
        echo "failed";
      }
    }
    
  } else {
    $sql = "INSERT INTO `inventory` (inv_id, inv_name, inv_image, inv_qty, inv_min, inv_size, cate_id) VALUES ('".$code."', '".$newname."', '".$name."', $qty, $min, '$size', $type)";
    $query = mysqli_query($conn, $sql);
    if($query) {
      echo "success";
    } else {
      echo "failed";
    }
  }

}

if(isset($_POST['update'])) {
  $code = $_POST['code'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $qty = $_POST['qty'];
  $min = $_POST['min'];

  $sql = "UPDATE `inventory` SET inv_name = '".$name."', inv_qty = $qty, inv_min = $min, inv_size = '$size', cate_id = $type WHERE inv_id = '".$code."' ";
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