<!-- Configuation 
database & port -->
<?php 
$DB_SERVER = "localhost";
$DB_USER = "root";
$DB_PASS = "";
$DB_NAME = "sok";

// Create Connection
$conn = mysqli_connect($DB_SERVER, $DB_USER, $DB_PASS, $DB_NAME);

// Check Connection
if(mysqli_connect_errno()) {
  echo "Failed to connect!";
  exit();
} 

// echo "Successfully";
?>