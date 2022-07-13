<?php 
$DB_SERVER = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "sok";

$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

if(!$conn) {
  echo "error";
}
?>