-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2022 at 04:20 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`) VALUES
(1, '7D');

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
('adminsun01', 'adminsun', 'adminsun', 'จิรายุทธ', 'มิตรอธิพันธ์', 'ตำบล บัวใหญ่ อำเภอ บัวใหญ่ นครราชสีมา 30120', '0984644447', 3),
('charkit01', 'charkit', 'charkit', 'สมหมาย', 'มือถือ', 'เลขที่ 599 หมู่ 7 ตำบลหนองไผ่ล้อม อำเภอเมือง จังหวัดนครราชสีมา ', '0611465166', 1),
('sunny01', 'jirayut', 'jirayut', 'อเนกต์', 'ประสงค์', 'ตำบล บัวใหญ่ อำเภอ บัวใหญ่ นครราชสีมา 30120', '0984644447', 1),
('taray01', 'taray', 'taray', 'ชาคริต', 'โชติ', 'เลขที่ 599 หมู่ 7 ตำบลหนองไผ่ล้อม อำเภอเมือง จังหวัดนครราชสีมา ', '0984442919', 2),
('wanchai101', 'wanchai', 'wanchai', 'วันชัย', 'แซ่ลิ้ม', '124 หนองกระทุ่ม อ.เมือง จ.นครราชสีมา', '0979645941', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` varchar(11) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_qty` int(11) NOT NULL DEFAULT 0,
  `inv_min` int(11) DEFAULT NULL,
  `inv_size` varchar(64) DEFAULT NULL,
  `inv_color` varchar(64) DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `inv_sub_id` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_qty`, `inv_min`, `inv_size`, `inv_color`, `cate_id`, `inv_sub_id`) VALUES
('P001', 'พรมรถยนต์', 2, 0, 'XL', 'ดำด้ายแดง', 1, 'P001L'),
('P001L', 'พรมรถยนต์', 0, 0, 'L', 'ดำด้ายแดง', 1, NULL),
('P002', 'พรมรถยนต์', 7, 0, 'XL', 'ดำด้ายดำ', 1, 'P002L'),
('P002L', 'พรมรถยนต์', 0, 0, 'L', 'ดำด้ายดำ', 1, NULL),
('P003', 'พรมรถยนต์', 17, 0, 'XL', 'ดำด้ายทอง', 1, 'P003L'),
('P003L', 'พรมรถยนต์', 3, 0, 'L', 'ดำด้ายทอง', 1, NULL),
('P004', 'พรมรถยนต์', 0, 0, 'XL', 'ดำด้ายน้ำเงิน', 1, 'P004L'),
('P004L', 'พรมรถยนต์', 0, 0, 'L', 'ดำด้ายน้ำเงิน', 1, NULL),
('P005', 'พรมรถยนต์', 25, 30, 'XL', 'ดำด้ายฟ้า', 1, 'P005L'),
('P005L', 'พรมรถยนต์', 5, 0, 'L', 'ดำด้ายฟ้า', 1, NULL);

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
(1, 'sok2022-09-07_04-01-06-pm.pdf', '2022-09-07 14:01:06');

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
(1, '2022-09-07 13:54:23', 1, 30, 'wanchai101', 'P005', 2),
(2, '2022-09-07 13:55:07', 2, 5, 'wanchai101', 'P005', NULL),
(3, '2022-09-07 13:58:18', 1, 20, 'sunny01', 'P003', 3),
(4, '2022-09-07 13:58:47', 2, 3, 'sunny01', 'P003', NULL),
(5, '2022-09-07 14:19:06', 1, 2, 'wanchai101', 'P001', 4),
(6, '2022-09-07 14:19:23', 1, 7, 'wanchai101', 'P002', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reported`
--
ALTER TABLE `reported`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
