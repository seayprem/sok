<?php 
include_once('config/db.php');
if(isset($_POST['add'])) {
  $name = $_POST['name'];

  $sql = "INSERT INTO `category` (cate_name) VALUES ('".$name."')";
  $query = mysqli_query($conn, $sql);

  if($query) {
    echo "success";
  } else {
    echo "failed";
  }
}

if(isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $sql = "UPDATE `category` SET `cate_name` = '".$name."' WHERE `cate_id` = '".$id."'";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }
}

if(isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM `category` WHERE cate_id = '".$id."'";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }
}
?>