<?php 
include_once('config/db.php');
if(isset($_POST['add_emp'])) {
  $code = $_POST['code'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $level = $_POST['level'];

  $sql = "SELECT COUNT(*) AS num_rows FROM `employee` WHERE emp_id = '".$code."'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  if($row["num_rows"] > 0) {
    echo "error_emp_id";
  } else {
    $sql = "SELECT COUNT(*) AS num_rows FROM `employee` WHERE emp_user = '".$username."'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if($row["num_rows"] > 0) {
      echo "error_emp_user";
    } else {
      $sql = "INSERT INTO `employee` (emp_id, emp_user, emp_pass, emp_fname, emp_lname, emp_address, emp_phone, emp_level) VALUES ('".$code."', '".$username."', '".$password."', '".$fname."', '".$lname."', '".$address."', '".$phone."', '".$level."')";
      $query = mysqli_query($conn, $sql);

      if($query) {
        echo "success";
      } else {
        echo "failed";
      }
    }
  }
}

if(isset($_POST['update'])) {
  $code = $_POST['code'];
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $level = $_POST['level'];

  $sql = "UPDATE `employee` SET emp_user = '".$user."', emp_pass = '".$pass."', emp_fname = '".$fname."', emp_lname = '".$lname."', emp_address = '".$address."', emp_phone = '".$phone."', emp_level = '".$level."' WHERE emp_id = '".$code."' ";
  $query = mysqli_query($conn, $sql);
  
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

if(isset($_POST['delete'])) {
  $code = $_POST['code'];
  $sql = "DELETE FROM `employee` WHERE emp_id = '".$code."' ";
  $query = mysqli_query($conn, $sql);
  
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }

}

?>