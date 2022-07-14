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
?>