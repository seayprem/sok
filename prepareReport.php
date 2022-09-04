<?php 
error_reporting(0);
require_once('fpdf/fpdf.php');

$conn = mysqli_connect("localhost", "root", "", "sok");
$conn->set_charset("utf8");

function DateThai($strDate) {
  $strYear = date("Y",strtotime($strDate))+543;
  $strMonth= date("n",strtotime($strDate));
  $strDay= date("j",strtotime($strDate));
  $strHour= date("H",strtotime($strDate));
  $strMinute= date("i",strtotime($strDate));
  $strSeconds= date("s",strtotime($strDate));
  $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
  $strMonthThai=$strMonthCut[$strMonth];
  return "$strDay $strMonthThai $strYear, $strHour:$strMinute";

}

$product_count_sql = "SELECT * FROM `inventory`";
$product_count_query = mysqli_query($conn, $product_count_sql);
$product_count_total = mysqli_num_rows($product_count_query);


if(isset($_POST['report'])) {
  $date_start = $_POST['date_start'];
  $time_start = $_POST['time_start'];
  $date_end = $_POST['date_end'];
  $time_end = $_POST['time_end'];
} else {
  header("Location: report.php");
}

if(empty($date_start) && empty($time_start) && empty($date_end) && empty($time_end)) {
  // $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id";
} else if(empty($time_start) && empty($time_end)) {
  $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE DATE(t_datetime) BETWEEN '$date_start' AND '$date_end'";
} else {
  $sql = "SELECT * FROM `transfer` LEFT JOIN `employee` ON employee.emp_id = transfer.emp_id LEFT JOIN supplier ON transfer.sup_id = supplier.sup_id LEFT JOIN inventory ON transfer.inv_id = inventory.inv_id LEFT JOIN category ON inventory.cate_id = category.cate_id WHERE t_datetime BETWEEN '$date_start $time_start' AND '$date_end $time_end'";
}

$query = mysqli_query($conn, $sql);
$query_count = mysqli_num_rows($query);

$pdf = new FPDF('L', 'mm', 'A4'); // Change แนวตั้ง L = นอน P = ตั้งละมั้ง ลืมหมดละ ไม่ได้เขียนมา 21 วัน

$pdf->AddPage();

$pdf->AddFont('angsa','','angsa.php');

$pdf->SetFont('angsa', '', 20);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'บริษัท เอส.โอ.เค.โปรดักชั่น จำกัด'), 0, 1, 'C');
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'รายงานสรุปรายการเดินสินค้า'), 0, 1, 'C');
$pdf->SetFont('angsa', '', 16);
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'จากวันที่ '.$date_start.' '.$time_start.' ถึง '.$date_end.' '.$time_end.''), 0, 1, 'R');

$pdf->Cell(12,10, iconv('UTF-8', 'TIS-620', 'ลำดับ'), 1, 0, 'C');
$pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', 'รหัสสินค้า'), 1, 0, 'C');
$pdf->Cell(78,10, iconv('UTF-8', 'TIS-620', 'ชื่อสินค้า'), 1, 0, 'C');
$pdf->Cell(20,10, iconv('UTF-8', 'TIS-620', 'จำนวนสินค้า'), 1, 0, 'C');
$pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', 'สีของสินค้า'), 1, 0, 'C');
$pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', 'สถานะ'), 1, 0, 'C');
$pdf->Cell(40,10, iconv('UTF-8', 'TIS-620', 'ผู้ทำรายการ'), 1, 0, 'C');
$pdf->Cell(40,10, iconv('UTF-8', 'TIS-620', 'วันเวลา'), 1, 1, 'C');

$msg = "";

$count_order = 1;

// List
while($row = mysqli_fetch_array($query)) {
  if($row['t_status'] == 1) {
    $msg = "นำเข้า";
  } else {
    $msg = "เบิกจ่าย";
  }
  $pdf->Cell(12,10, iconv('UTF-8', 'TIS-620', $count_order++), 1, 0, 'C');
  $pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', $row['inv_id']), 1, 0, 'C');
  $pdf->Cell(78,10, iconv('UTF-8', 'TIS-620', $row['inv_name']), 1, 0, 'C');
  $pdf->Cell(20,10, iconv('UTF-8', 'TIS-620', $row['t_qty']), 1, 0, 'C');
  $pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', $row['inv_color']), 1, 0, 'C');
  $pdf->Cell(30,10, iconv('UTF-8', 'TIS-620', $msg), 1, 0, 'C');
  $pdf->Cell(40,10, iconv('UTF-8', 'TIS-620', $row['emp_fname']), 1, 0, 'C');
  $pdf->Cell(40,10, iconv('UTF-8', 'TIS-620', DateThai($row['t_datetime'])), 1, 1, 'C');
}

$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'จำรายการเดินสินค้าทั้งหมด : '.$query_count.' '), 0, 1, 'L');
// $pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'จำนวนรายการนำเข้าทั้งหมด : '), 0, 1, 'L');
// $pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'จำนวนรายเบิกจ่ายทั้งหมด : '), 0, 1, 'L');
$pdf->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'จำนวนสินค้าคงคลัง ณ ปัจจุบัน : '.$product_count_total.' '), 0, 1, 'L');

$datesss = date("Y-m-d_h-i-s-a");

$math_random = "sok".$datesss.".pdf";

$filename = "report/".$math_random."";

$reported_sql = "INSERT INTO `reported` (`path`, `report_datetime`) VALUES ('$math_random', current_timestamp())";
mysqli_query($conn, $reported_sql);

$pdf->OutPut('F', $filename, true);

$pdf->OutPut();