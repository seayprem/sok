-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 05:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sok`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(11) NOT NULL,
  `emp_user` varchar(255) NOT NULL,
  `emp_pass` varchar(255) NOT NULL,
  `emp_fname` varchar(255) NOT NULL,
  `emp_lname` varchar(255) NOT NULL,
  `emp_address` text NOT NULL,
  `emp_phone` varchar(10) DEFAULT NULL,
  `emp_level` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_user`, `emp_pass`, `emp_fname`, `emp_lname`, `emp_address`, `emp_phone`, `emp_level`) VALUES
('admin101', 'admin', 'admin', 'ผู้แล', 'ระบบ', 'SOK Production', '0123456789', 3),
('adminsun01', 'adminsun', 'adminsun', 'จิรายุทธ', 'มิตรอธิพันธ์', 'ตำบล บัวใหญ่ อำเภอ บัวใหญ่ นครราชสีมา 30120', '0984644447', 3),
('charkit01', 'charkit', 'charkit', 'สมหมาย', 'มือถือ', 'เลขที่ 599 หมู่ 7 ตำบลหนองไผ่ล้อม อำเภอเมือง จังหวัดนครราชสีมา ', '0611465166', 1),
('emp101', 'emp', 'emp', 'พนักงาน', 'คลังสินค้า', 'SOK Production', '0123456789', 1),
('owner101', 'owner', 'owner', 'เจ้าของ', 'บริษัท', 'SOK Production', '0123456789', 2),
('sunny01', 'jirayut', 'jirayut', 'อเนกต์', 'ประสงค์', 'ตำบล บัวใหญ่ อำเภอ บัวใหญ่ นครราชสีมา 30120', '0984644447', 1),
('taray01', 'taray', 'taray', 'ชาคริต', 'โชติ', 'เลขที่ 599 หมู่ 7 ตำบลหนองไผ่ล้อม อำเภอเมือง จังหวัดนครราชสีมา ', '0984442919', 2),
('w1213', 'awdaw', 'awdaw', 'dawd', 'wdawda', 'awdaw', '1231231222', 1),
('wanchai101', 'wanchai', 'wanchai', 'วันชัย', 'แซ่ลิ้ม', '124 หนองกระทุ่ม อ.เมือง จ.นครราชสีมา', '0979645942', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` varchar(11) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_image` text NOT NULL,
  `inv_qty` int(11) NOT NULL DEFAULT 0,
  `inv_min` int(11) DEFAULT NULL,
  `inv_size` varchar(64) DEFAULT NULL,
  `inv_sub_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_image`, `inv_qty`, `inv_min`, `inv_size`, `inv_sub_id`) VALUES
('P001', 'ดำด้ายน้ำเงิน', 'product221011050228490025301.jpg', 0, 0, 'XL', 'P001L'),
('P001L', 'ดำด้ายน้ำเงิน', 'product221011050228490025301.jpg', 0, 0, 'L', NULL),
('P002', 'น้ำตาลอ่อนด้ายทอง', 'product221011050300816726008.jpg', 200, 0, 'XL', 'P002L'),
('P002L', 'น้ำตาลอ่อนด้ายทอง', 'product221011050300816726008.jpg', 0, 0, 'L', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reported`
--

CREATE TABLE `reported` (
  `id` int(11) NOT NULL,
  `path` text NOT NULL,
  `report_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reported`
--

INSERT INTO `reported` (`id`, `path`, `report_datetime`) VALUES
(1, 'sok2022-10-11_05-06-17-pm.pdf', '2022-10-11 15:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_company` varchar(255) NOT NULL,
  `sup_address` text NOT NULL,
  `sup_email` varchar(255) DEFAULT NULL,
  `sup_phone` varchar(10) DEFAULT NULL,
  `sale_name` varchar(255) NOT NULL,
  `sale_position` varchar(255) NOT NULL,
  `sale_phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_company`, `sup_address`, `sup_email`, `sup_phone`, `sale_name`, `sale_position`, `sale_phone`) VALUES
(1, 'บริษัท กัลฟ์ เอ็นเนอร์จี ดีเวลลอปเมนท์ จำกัด (มหาชน)', '87 อาคาร เอ็มไทย ทาวเวอร์ ออลซีซั่น เพลส ชั้น 11 ถนนวิทยุ แขวงลุมพินี เขตปทุมวัน กรุงเทพมหานคร 10330', 'sustainability@gulf.co.th', '0208044990', 'นายสมพงษ์ มะนาว', 'พนักงานขาย', '0984151963'),
(2, 'กันกุล เอ็นจิเนียริ่ง จำกัด (มหาชน)', '1177 อาคารเพิร์ล แบงก์ค็อก ถ. พหลโยธิน แขวง พญาไท เขตพญาไท กรุงเทพมหานคร 10400', 'ir@gunkul.com', '0224258000', 'นางสาวซาร่า จอร์จ', 'พนักงาน', '0821519592'),
(3, 'บริษัท แสนสิริ จำกัด (มหาชน)', 'เลขที่ 59 ซอยริมคลองพระโขนง​ แขวงพระโขนงเหนือ\nเขตวัฒนา​ กรุงเทพมหานคร 10110', 'cs@sansiri.com', '0202778888', 'นางสาวแม่มณี ทองสุก', 'พนักงานขาย', '0912555995'),
(4, 'บริษัท คอมเซเว่น จำกัด (มหาชน)', '549/1 ถนนสรรพาวุธ แขวงบางนาใต้ เขตบางนา กรุงเทพมหานคร 10260', 'ir@comseven.com', '0201777777', 'นางสาวออมเงิน ถอนยาก', 'พนักงานขาย', '0983619878');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `t_id` int(11) NOT NULL,
  `t_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `t_status` int(1) NOT NULL,
  `t_qty` int(11) UNSIGNED NOT NULL,
  `emp_id` varchar(11) DEFAULT NULL,
  `inv_id` varchar(11) NOT NULL,
  `sup_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`t_id`, `t_datetime`, `t_status`, `t_qty`, `emp_id`, `inv_id`, `sup_id`) VALUES
(46, '2022-10-12 05:32:31', 1, 200, 'wanchai101', 'P002', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indexes for table `reported`
--
ALTER TABLE `reported`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `fk_emp` (`emp_id`),
  ADD KEY `fk_inv_trans` (`inv_id`),
  ADD KEY `fk_sup_trans` (`sup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reported`
--
ALTER TABLE `reported`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `fk_emp_trans` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inv_trans` FOREIGN KEY (`inv_id`) REFERENCES `inventory` (`inv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sup_trans` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
