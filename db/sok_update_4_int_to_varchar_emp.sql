-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2022 at 04:17 PM
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
('5', 'emp', 'emp', 'emp', 'emp', 'emp', '12321', 1),
('6', 'admin', 'admin', 'admin', 'admin', 'localhost', '123', 3),
('7', 'owner', 'owner', 'owner', 'owner', 'im your boss', '123123', 2),
('emp001', 'prem', 'prem', 'prem', 'prem', 'prem', '0979645941', 1);

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
('P001', 'พรมรถยนต์', 24, 0, 'XL', 'ดำ', 1, 'P001L'),
('P001L', 'พรมรถยนต์ เหลือ', 2, 0, 'L', 'ดำ', 1, NULL);

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
(1, 'sok2022-08-31_04-15-42-pm.pdf', '2022-08-31 14:15:42');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_company` varchar(255) NOT NULL,
  `sup_address` text NOT NULL,
  `sup_email` varchar(255) DEFAULT NULL,
  `sup_phone` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_company`, `sup_address`, `sup_email`, `sup_phone`) VALUES
(1, 'บริษัท อี.ไอ. โปรดักส์ จำกัด', '99/18 หมู่ 6 ถ.บางบัวทอง-สุพรรณบุรี ต.ราษฎร์นิยม อ.ไทรน้อย จ.นนทบุรี 11150', 'info@eiproducts.com', '026880808'),
(2, 'บริษัท คลีน เท็กซ์ (ไทยแลนด์) จำกัด', '789/76 นิคมอุตสาหกรรมปิ่นทอง ตำบลหนองขาม อำเภอศรีราชา จังหวัดชลบุรี 20110', '', '0382968913'),
(3, 'บริษัท ฮายาชิเทเลมปุ (ประเทศไทย) จำกัด', '700/360 หมู่ 6 นิคมอุตสาหกรรมอมตะนคร ถนนบางนา-ตราด ตำบลดอนหัวฬ่อ อำเภอเมืองชลบุรี จังหวัดชลบุรี 20000', '', '0382144914'),
(4, 'บริษัท ยูนิเวอร์ซัล ไทย ไฟเบอร์ จำกัด', '700/117 หมู่ 1 นิคมอุตสาหกรรมอมตะนคร ตำบลบ้านเก่า อำเภอพานทอง จังหวัดชลบุรี 20160', '', '0387440502'),
(5, 'บริษัท อินเตอร์เฟซฟลอร์ (ประเทศไทย) จำกัด', '700/117 หมู่ 1 นิคมอุตสาหกรรมอมตะนคร ถนนบางนา-ตราด ตำบลบ้านเก่า อำเภอพานทอง จังหวัดชลบุรี 20160', '', '0382143025');

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
(18, '2022-08-31 14:13:10', 2, 1, '5', 'P001L', NULL);

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
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
