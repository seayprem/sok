<?php 
include_once('config/db.php');
if(isset($_POST['add_emp'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $level = $_POST['level'];

  $sql = "INSERT INTO `employee` (emp_user, emp_pass, emp_fname, emp_lname, emp_address, emp_phone, emp_level) VALUES ('".$username."', '".$password."', '".$fname."', '".$lname."', '".$address."', '".$phone."', '".$level."')";
  $query = mysqli_query($conn, $sql);

  if($query) {
    echo "success";
  } else {
    echo "failed";
  }
}
?>