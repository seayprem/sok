-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2022 at 04:38 PM
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
('5', 'emp', 'emp', 'emp', 'emp', 'emp', '0123456789', 1),
('6', 'admin', 'admin', 'admin', 'admin', 'localhost', '0123456789', 3),
('7', 'owner', 'owner', 'owner', 'owner', 'im your boss', '0123456789', 2),
('8', 'prem', 'prem', 'Wanchai', 'Saelim', '124 M.2', '0979645941', 1),
('charkit01', 'charkit', 'charkit', 'charkit', 'choti', '124 M.2', '0979645941', 1),
('wanchai101', 'wanchai', 'wanchai', 'วันชัย', 'แซ่ลิ้ม', '124 M.2', '0979645941', 1);

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
('awdawd02', 'พรมรถยนต์พรมหนัง', 5, 0, 'XL', 'ดำ', 1, 'awdawd02L'),
('awdawd02L', 'พรมรถยนต์พรมหนัง เหลือ', 15, 0, 'L', 'ดำ', 1, NULL),
('P0003', 'อะไรก็ได้ทดสอบ', 8, 0, 'XL', 'ดำ', 1, 'P0003L'),
('P0003L', 'อะไรก็ได้ทดสอบ เหลือ', 4, 0, 'L', 'ดำ', 1, NULL),
('P001', 'พรมรถยนต์', 24, 0, 'XL', 'ดำ', 1, 'P001L'),
('P001L', 'พรมรถยนต์ เหลือ', 2, 0, 'L', 'ดำ', 1, NULL),
('P002', 'พรมเช็คเท้าแบบวงกลมผ้ากำมะยี่่', 11, 10, 'XL', 'ดำ', 1, 'P002L'),
('p0023', 'พรมรถ', 13, 0, 'XL', 'แดง', 1, 'p0023L'),
('p0023L', 'พรมรถ เหลือ', 7, 0, 'L', 'แดง', 1, NULL),
('P002L', 'พรมเช็คเท้าแบบวงกลมผ้ากำมะยี่่ เหลือ', 40, 0, 'L', 'ดำ', 1, NULL);

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
(1, 'sok2022-08-31_04-15-42-pm.pdf', '2022-08-31 14:15:42'),
(3, 'sok2022-09-01_08-52-51-am.pdf', '2022-09-01 06:52:51'),
(4, 'sok2022-09-04_04-42-11-pm.pdf', '2022-09-04 14:42:11'),
(5, 'sok2022-09-04_04-42-49-pm.pdf', '2022-09-04 14:42:49'),
(6, 'sok2022-09-04_04-42-55-pm.pdf', '2022-09-04 14:42:55'),
(7, 'sok2022-09-04_04-42-59-pm.pdf', '2022-09-04 14:42:59'),
(8, 'sok2022-09-04_04-43-09-pm.pdf', '2022-09-04 14:43:09'),
(9, 'sok2022-09-04_04-43-18-pm.pdf', '2022-09-04 14:43:18'),
(10, 'sok2022-09-04_04-43-33-pm.pdf', '2022-09-04 14:43:33'),
(11, 'sok2022-09-04_04-44-50-pm.pdf', '2022-09-04 14:44:50'),
(12, 'sok2022-09-04_04-45-07-pm.pdf', '2022-09-04 14:45:07'),
(13, 'sok2022-09-04_04-45-15-pm.pdf', '2022-09-04 14:45:15'),
(14, 'sok2022-09-04_04-47-28-pm.pdf', '2022-09-04 14:47:28'),
(15, 'sok2022-09-04_04-47-37-pm.pdf', '2022-09-04 14:47:37'),
(16, 'sok2022-09-04_04-47-49-pm.pdf', '2022-09-04 14:47:49'),
(17, 'sok2022-09-04_04-47-55-pm.pdf', '2022-09-04 14:47:55'),
(18, 'sok2022-09-04_04-48-09-pm.pdf', '2022-09-04 14:48:09'),
(19, 'sok2022-09-04_04-51-25-pm.pdf', '2022-09-04 14:51:25'),
(20, 'sok2022-09-04_04-53-56-pm.pdf', '2022-09-04 14:53:56'),
(21, 'sok2022-09-04_04-54-11-pm.pdf', '2022-09-04 14:54:11'),
(22, 'sok2022-09-04_04-54-30-pm.pdf', '2022-09-04 14:54:30'),
(23, 'sok2022-09-04_04-54-42-pm.pdf', '2022-09-04 14:54:42'),
(24, 'sok2022-09-04_04-54-47-pm.pdf', '2022-09-04 14:54:47'),
(25, 'sok2022-09-04_04-55-38-pm.pdf', '2022-09-04 14:55:38'),
(26, 'sok2022-09-04_04-56-27-pm.pdf', '2022-09-04 14:56:27'),
(27, 'sok2022-09-05_03-41-00-pm.pdf', '2022-09-05 13:41:00'),
(28, 'sok2022-09-05_04-06-26-pm.pdf', '2022-09-05 14:06:26'),
(29, 'sok2022-09-05_04-07-36-pm.pdf', '2022-09-05 14:07:36'),
(30, 'sok2022-09-05_04-08-23-pm.pdf', '2022-09-05 14:08:23'),
(31, 'sok2022-09-05_04-08-50-pm.pdf', '2022-09-05 14:08:50'),
(32, 'sok2022-09-05_04-08-59-pm.pdf', '2022-09-05 14:08:59'),
(33, 'sok2022-09-05_04-09-40-pm.pdf', '2022-09-05 14:09:40'),
(34, 'sok2022-09-05_04-09-50-pm.pdf', '2022-09-05 14:09:50'),
(35, 'sok2022-09-05_04-11-57-pm.pdf', '2022-09-05 14:11:57'),
(36, 'sok2022-09-05_04-12-09-pm.pdf', '2022-09-05 14:12:09'),
(37, 'sok2022-09-05_04-20-13-pm.pdf', '2022-09-05 14:20:13'),
(38, 'sok2022-09-05_04-20-29-pm.pdf', '2022-09-05 14:20:29'),
(39, 'sok2022-09-05_04-21-04-pm.pdf', '2022-09-05 14:21:04'),
(40, 'sok2022-09-05_04-22-13-pm.pdf', '2022-09-05 14:22:13'),
(41, 'sok2022-09-05_04-22-28-pm.pdf', '2022-09-05 14:22:28'),
(42, 'sok2022-09-05_04-22-39-pm.pdf', '2022-09-05 14:22:39');

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
(1, 'บริษัท อี.ไอ. โปรดักส์ จำกัด', '99/18 หมู่ 6 ถ.บางบัวทอง-สุพรรณบุรี ต.ราษฎร์นิยม อ.ไทรน้อย จ.นนทบุรี 11150', 'info@eiproducts.com', '026880808', '', '', ''),
(2, 'บริษัท คลีน เท็กซ์ (ไทยแลนด์) จำกัด', '789/76 นิคมอุตสาหกรรมปิ่นทอง ตำบลหนองขาม อำเภอศรีราชา จังหวัดชลบุรี 20110', '', '0382968912', '', '', ''),
(3, 'บริษัท ฮายาชิเทเลมปุ (ประเทศไทย) จำกัด', '700/360 หมู่ 6 นิคมอุตสาหกรรมอมตะนคร ถนนบางนา-ตราด ตำบลดอนหัวฬ่อ อำเภอเมืองชลบุรี จังหวัดชลบุรี 20000', '', '0382144914', '', '', ''),
(4, 'บริษัท ยูนิเวอร์ซัล ไทย ไฟเบอร์ จำกัด', '700/117 หมู่ 1 นิคมอุตสาหกรรมอมตะนคร ตำบลบ้านเก่า อำเภอพานทอง จังหวัดชลบุรี 20160', '', '0387440502', '', '', ''),
(5, 'บริษัท อินเตอร์เฟซฟลอร์ (ประเทศไทย) จำกัด', '700/117 หมู่ 1 นิคมอุตสาหกรรมอมตะนคร ถนนบางนา-ตราด ตำบลบ้านเก่า อำเภอพานทอง จังหวัดชลบุรี 20160', '', '0382143025', '', '', ''),
(36, 'Wanchai Saelim', '124 M.2\nTumbon Nongkhatum', 'seayprem@hotmail.com', '0979645941', '123123', '123', '55552');

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
(16, '2022-08-31 14:12:25', 1, 27, NULL, 'P001', 3),
(17, '2022-08-31 14:12:53', 2, 3, '5', 'P001', NULL),
(18, '2022-08-31 14:13:10', 2, 1, '5', 'P001L', NULL),
(19, '2022-09-01 06:45:24', 1, 20, NULL, 'p0023', 3),
(20, '2022-09-01 06:47:52', 2, 7, '5', 'p0023', NULL),
(21, '2022-09-01 06:51:00', 2, 16, '5', 'P002', NULL),
(22, '2022-09-02 14:33:51', 1, 20, NULL, 'awdawd02', 3),
(23, '2022-09-02 14:35:20', 2, 10, '5', 'awdawd02', NULL),
(24, '2022-09-02 14:37:49', 2, 2, '5', 'awdawd02', NULL),
(25, '2022-09-02 14:39:41', 2, 2, '8', 'awdawd02', NULL),
(26, '2022-09-02 15:06:00', 2, 1, 'wanchai101', 'awdawd02', NULL),
(27, '2022-09-04 14:23:44', 2, 2, 'wanchai101', 'P002', NULL),
(28, '2022-09-04 14:29:21', 1, 2, NULL, 'P002', 3),
(29, '2022-09-04 14:31:10', 1, 5, NULL, 'P002', 3),
(30, '2022-09-04 14:31:18', 2, 5, 'wanchai101', 'P002', NULL),
(31, '2022-09-04 14:33:07', 1, 12, NULL, 'P002', 1),
(32, '2022-09-04 16:25:49', 2, 1, 'wanchai101', 'P002', NULL),
(34, '2022-09-05 13:51:23', 1, 5, NULL, 'P002', 3),
(35, '2022-09-05 13:53:57', 2, 5, 'charkit01', 'P002', NULL),
(36, '2022-09-05 13:54:14', 2, 11, 'charkit01', 'P002', NULL),
(38, '2022-09-05 13:55:19', 1, 2, 'charkit01', 'P002', 4),
(39, '2022-09-05 14:37:36', 1, 10, 'wanchai101', 'P0003', 3),
(40, '2022-09-05 14:37:52', 2, 2, 'wanchai101', 'P0003', NULL),
(41, '2022-09-05 14:38:13', 2, 2, 'charkit01', 'P0003', NULL),
(42, '2022-09-05 14:38:26', 1, 2, 'charkit01', 'P0003', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
