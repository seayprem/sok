<?php 
include_once('config/db.php');
if(isset($_POST['add'])) {

  $name = $_POST['name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // DEBUG Check

  // echo "<br>";
  // echo $name;
  // echo "<br>";
  // echo $address;
  // echo "<br>";
  // echo $email;
  // echo "<br>";
  // echo $phone;
  // echo "<br>";

  if(empty($name) || empty($address) || empty($email) || empty($phone)) {
    echo "checkyourdata";
  } else if(strlen($phone) != 10) {
    echo "phone";
  } else {
    $sql = "INSERT INTO `supplier` (sup_company, sup_address, sup_email, sup_phone) VALUES ('".$name."', '".$address."','".$email."','".$phone."')";
    $query = mysqli_query($conn, $sql);
    if($query) {
      echo "success";
    } else {
      echo "failed";
    }
  }

  // $sql = "INSERT INTO `supplier` (sup_company, sup_address, sup_email, sup_phone) VALUES ('".$name."', '".$address."','".$email."','".$phone."')";
  // $query = mysqli_query($conn, $sql);
  // if($query) {
  //   echo "success";
  // } else {
  //   echo "failed";
  // }

}

if(isset($_POST['update'])) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $sql = "UPDATE `supplier` SET sup_company = '".$name."', sup_address = '".$address."', sup_email = '".$email."', sup_phone = '".$phone."' WHERE sup_id = $id ";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

if(isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM `supplier` WHERE sup_id = $id";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }
}
?>