<?php 
include_once('config/db.php');
if(isset($_POST['add'])) {
  $product_id = $_POST['productid'];
  $qty = $_POST['qty'];
  $status = $_POST['status'];
  $employee = $_POST['employee'];
  $company = $_POST['company'];



  // DEBUG TESTER 
  // echo "<br>";
  // echo $product_id;
  // echo "<br>";
  // echo $qty;
  // echo "<br>";
  // echo $status;
  // echo "<br>";
  // echo $employee;
  // echo "<br>";
  // echo $company;
  // echo "<br>";

  if(empty($employee)) {

    if($status == 1) {

      if($qty <= 0) {
        echo "notzeroadd";
      } else {
        $sql = "INSERT INTO `transfer` (`t_id`, `t_datetime`, `t_status`, `t_qty`, `emp_id`, `inv_id`, `sup_id`) VALUES (NULL, current_timestamp(), $status, $qty, NULL, '".$product_id."', $company)";
        $query = mysqli_query($conn, $sql);
        if($query) {
          $update_sql = "UPDATE inventory SET inventory.inv_qty = (SELECT t_qty FROM transfer ORDER BY t_id DESC LIMIT 1) + inventory.inv_qty WHERE inventory.inv_id = '$product_id'";
          $update_query = mysqli_query($conn, $update_sql);
          if($update_query) {
            echo "success";
          } else {
            echo "failed";
          }
        } else {
          echo "failed";
        }
      }

      
    }
  }

  if(empty($company)) {
    if($status == 2) {
      // $sql = "INSERT INTO `transfer` (`t_id`, `t_datetime`, `t_status`, `t_qty`, `emp_id`, `inv_id`, `sup_id`) VALUES (NULL, current_timestamp(), $status, $qty, $employee, '$product_id', NULL)";
      // $query = mysqli_query($conn, $sql);
      

         // if($query) {

        // test for export with qty zero
        $selete_inventory_sql = "SELECT * FROM inventory WHERE inv_id = '$product_id'";
        $select_inventory_query = mysqli_query($conn, $selete_inventory_sql);
        $select_inventory_row = mysqli_fetch_array($select_inventory_query);

        $qtyInventory = $select_inventory_row['inv_qty'];

        if($qty <= 0) {
          echo "notzero";
        } else {
          if($qty > $qtyInventory || $qty == 0) {
            echo "unsuccess";
          } else {
            $sql = "INSERT INTO `transfer` (`t_id`, `t_datetime`, `t_status`, `t_qty`, `emp_id`, `inv_id`, `sup_id`) VALUES (NULL, current_timestamp(), $status, $qty, '$employee', '$product_id', NULL)";
            $query = mysqli_query($conn, $sql);
            if($query) {


              $update_sql = "UPDATE inventory SET inventory.inv_qty = inventory.inv_qty - (SELECT t_qty FROM transfer ORDER BY t_id DESC LIMIT 1) WHERE inventory.inv_id = '$product_id'";
              $update_query = mysqli_query($conn, $update_sql);
              if(!empty($select_inventory_row["inv_sub_id"])) {
                $update_sub_sql = "UPDATE inventory SET inventory.inv_qty = inventory.inv_qty + (SELECT t_qty FROM transfer ORDER BY t_id DESC LIMIT 1) WHERE inventory.inv_id = '".$select_inventory_row["inv_sub_id"]."'";
                $update_sub_query = mysqli_query($conn, $update_sub_sql);
              }
              if($update_query) {
                echo "success";
              } else {
                echo "unsuccess";
              }

              // $update_sql = "UPDATE inventory SET inventory.inv_qty = inventory.inv_qty - (SELECT t_qty FROM transfer ORDER BY t_id DESC LIMIT 1) WHERE inventory.inv_id = '$product_id'";
              // $update_query = mysqli_query($conn, $update_sql);
              // if($update_query) {

                  // โค้ดนี้เมื่อเบิกจ่ายแล้ว ก็จะไปเพิ่มไซต์ L อัตโนมัติ
                  // $originColor = $select_inventory_row['inv_color'];

                  // $sizeL_sql = "SELECT * FROM `inventory` WHERE inv_size = 'L' AND inv_color = '$originColor'";
                  // $sizeL_query = mysqli_query($conn, $sizeL_sql);
                  // $sizeL_row = mysqli_fetch_array($sizeL_query);

                  // $color = $sizeL_row['inv_color'];
                  // $idl = $sizeL_row['inv_id'];

                  // if($select_inventory_row['inv_size'] == "XL" && $select_inventory_row['inv_color'] == $color) {

                  //   $update_size_l_sql = "UPDATE inventory SET inventory.inv_qty = (SELECT t_qty FROM transfer ORDER BY t_id DESC LIMIT 1) + inventory.inv_qty WHERE inventory.inv_id = '$idl'";
                  //   $update_size_l_query = mysqli_query($conn, $update_size_l_sql);

                  //   if($update_size_l_query) {
                  //     echo "success";
                  //   }

                  // echo "success";

                // } else {
                //   echo "success";
                // }

              } else {
                echo "unsuccess";
              }
            }
          }
        }

        

        // $update_sql = "UPDATE inventory SET inventory.inv_qty = inventory.inv_qty - (SELECT t_qty FROM transfer ORDER BY t_id DESC LIMIT 1) WHERE inventory.inv_id = '$product_id'";
        // $update_query = mysqli_query($conn, $update_sql);
        // if($update_query) {
        //   echo "success";
        // } else {
        //   echo "failed";
        // }
      // } else {
        // echo "failed";
      // }
    }
  }

 

  // if($status == 1) { // นำเข้า
  //   $sql = "INSERT INTO `transfer` (t_status, t_qty, emp_id, inv_id, sup_id) VALUES ('".$status."', '".$qty."', '".$employee."', '".$product_id."', '".$company."')";
  //   $query = mysqli_query($conn, $sql);
  //   if($query) {
  //     echo "success";
  //     $update_sql = "UPDATE inventory SET inventory.inv_qty = (SELECT t_qty FROM `transfer` ORDER BY t_id DESC LIMIT 1) + inventory.inv_qty WHERE inventory.inv_id = $product_id";
  //     $update_query = mysqli_query($conn, $update_sql);
  //     if($update_query) {
  //       echo "success";
  //     }
  //   }
  // } else if($status == 2) { // เบิกจ่าย
  //   $sql = "INSERT INTO `transfer` (t_status, t_qty, emp_id, inv_id, sup_id) VALUES ('".$status."', '".$qty."', '".$employee."', '".$product_id."', '".$company."')";
  //   $query = mysqli_query($conn, $sql);
  //   if($query) {
  //     echo "success";
  //     $update_sql = "UPDATE inventory SET inventory.inv_qty = inventory.inv_qty - (SELECT t_qty FROM `transfer` ORDER BY t_id DESC LIMIT 1) WHERE inventory.inv_id = $product_id";
  //     $update_query = mysqli_query($conn, $update_sql);
  //     if($update_query) {
  //       echo "success";
  //     }
  //   }
  // } else {
  //   echo "failed";
  // }

// }

// DELETE 

if(isset($_POST['delete'])) {
  $id = $_POST['id'];
  $sql = "DELETE FROM `transfer` WHERE `t_id` = $id ";
  $query = mysqli_query($conn, $sql);
  if($query) {
    echo "success";
  } else {
    echo "failed";
  }
}

?>