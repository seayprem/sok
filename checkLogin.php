<?php 
include_once('config/db.php');
session_start();
if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT emp_user, emp_pass, emp_level, emp_fname, emp_lname FROM employee WHERE emp_user = '".$username."' AND emp_pass = '".$password."'";
  $query = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($query);
  if(mysqli_num_rows($query) > 0) {
    $_SESSION['emp_level'] = $row['emp_level'];
    $_SESSION['emp_fname'] = $row['emp_fname'];
    $_SESSION['emp_lname'] = $row['emp_lname'];
    echo "success";
  } else {
    echo "failed";
  }
}
?>