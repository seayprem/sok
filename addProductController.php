<?php 
include_once('config/db.php');

if(isset($_POST['addproduct'])) {

  $code = $_POST['code'];
  $name = $_POST['name'];
  $size = $_POST['size'];
  $qty = $_POST['qty'];
  $min = $_POST['min'];
  // $max = $_POST['max'];
  $filename = $_FILES['file']['name'];
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

  $checkImage = pathinfo($filename);

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
      if($checkImage['extension'] == "jpg" || $checkImage['extension'] == "png") {
        move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $newname);
    
        $sql = "INSERT INTO `inventory` (inv_id, inv_name, inv_image, inv_qty, inv_min, inv_size, inv_sub_id) VALUES ('".$code."', '".$name."', '".$newname."', $qty, $min, '$size', '".$code_sub."'), ('".$code_sub."', '".$name_sub."', '".$newname."', 0, 0, 'L', null)";
        $query = mysqli_query($conn, $sql);
        if($query) {
          echo "success";
        } else {
          echo "failed";
        }
      } else {
        echo "onlyimage";
      }
      
    }
    
  } else {
    $sql = "INSERT INTO `inventory` (inv_id, inv_name, inv_image, inv_qty, inv_min, inv_size) VALUES ('".$code."', '".$newname."', '".$name."', $qty, $min, '$size')";
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
  $size = $_POST['size'];
  $qty = $_POST['qty'];
  $min = $_POST['min'];

  

  if(empty($_FILES['file']['name'])) {
    
    $sql = "UPDATE `inventory` SET inv_name = '".$name."', inv_qty = $qty, inv_min = $min, inv_size = '$size' WHERE inv_id = '".$code."' ";
    $query = mysqli_query($conn, $sql);
    if($query) {
      echo "success";
    } else {
      echo "failed";
    }
  } else {
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $filename = $_FILES['file']['name'];
    $checkImage = pathinfo($filename);
    $random = rand(0, 999999999);
    $rename = 'product'.date('ymdhis').$random;
    $newname = $rename . '.' . $extension;
    if($checkImage['extension'] == "jpg" || $checkImage['extension'] == "png") {
      move_uploaded_file($_FILES['file']['tmp_name'], "images/" . $newname);
      $sql = "UPDATE `inventory` SET inv_name = '".$name."', inv_image = '".$newname."', inv_qty = $qty, inv_min = $min, inv_size = '$size' WHERE inv_id = '".$code."' ";
      $query = mysqli_query($conn, $sql);
      if($query) {
        echo "success";
      } else {
        echo "failed";
      }
    } else {
      echo "onlyimage";
    }
    
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