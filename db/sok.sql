-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 01:07 PM
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
(4, 'ไหมพรม'),
(5, 'พรมไหม'),
(9, ' ทำไมถึงลบไม่ได้วะ งง'),
(10, 'firebase'),
(11, 'AWS'),
(12, 'mammothz'),
(13, 'getprobots'),
(14, 'ninokunang'),
(18, 'eurusd'),
(19, 'awdawd'),
(27, 'อิอิ'),
(30, 'sstest'),
(32, 'asasdasda'),
(34, 'working'),
(35, 'worked!'),
(36, 'awdawd');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
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
(1, 'prem', 'prem', 'วันชัย', 'แซ่ลิ้ม', '124 จังหวัด นครราชสีมา', '0979645941', 3),
(2, 'sun', 'sun', 'จิรายุทธ', 'มิตรอธิพันธ์', 'บัวใหญ่มั้ง ', '1234567890', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inv_id` varchar(11) NOT NULL,
  `inv_name` varchar(255) NOT NULL,
  `inv_qty` int(11) NOT NULL DEFAULT 0,
  `inv_min` int(11) DEFAULT NULL,
  `inv_max` int(11) DEFAULT NULL,
  `inv_size` int(1) DEFAULT NULL,
  `inv_color` int(1) DEFAULT NULL,
  `cate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `inv_name`, `inv_qty`, `inv_min`, `inv_max`, `inv_size`, `inv_color`, `cate_id`) VALUES
('P0001', 'พรมรถยนต์', 0, 0, 0, 3, 1, 35),
('P0003', 'ไหมพรมรถยนต์', 0, 0, 0, 2, 2, 34);

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
(1, 'แสนสิริไก่ย่าง', 'กรุงเทพมหานคร', 'sansiri@email.com', '123122222'),
(2, 'งบประมาณ จำกัด', 'กรุงเทพมหานคร\naw', 'pamaan@jumgus.com', '1231222222'),
(4, 'ซันนี่วันนี้วันหยุด', 'Work from hone', 'itsun@email.com', '1231231324'),
(7, 'testworked!', 'work', 'work@email.com', '1234'),
(9, 'sssawd', 'sssawd', 'sssawd', 'sssawd');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `t_id` int(11) NOT NULL,
  `t_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `t_status` int(1) NOT NULL,
  `t_qty` int(11) UNSIGNED NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `inv_id` varchar(11) NOT NULL,
  `sup_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`t_id`, `t_datetime`, `t_status`, `t_qty`, `emp_id`, `inv_id`, `sup_id`) VALUES
(9, '2022-07-16 10:13:12', 1, 5, NULL, 'P0001', 4),
(10, '2022-07-16 10:13:58', 1, 5, NULL, 'P0001', 4),
(11, '2022-07-16 10:16:50', 1, 5, 1, 'P0001', 1),
(16, '2022-07-16 10:20:03', 1, 4, NULL, 'P0003', 2),
(17, '2022-07-16 10:21:34', 1, 3, NULL, 'P0003', 2),
(18, '2022-07-16 10:24:10', 1, 4, NULL, 'P0001', 7),
(19, '2022-07-16 10:24:23', 1, 4, NULL, 'P0003', 2),
(20, '2022-07-16 10:24:32', 1, 7, NULL, 'P0003', 2),
(21, '2022-07-16 10:24:39', 1, 7, NULL, 'P0001', 2),
(22, '2022-07-16 10:28:27', 1, 1, NULL, 'P0003', 4),
(23, '2022-07-16 10:29:22', 2, 4, 1, 'P0003', NULL),
(24, '2022-07-16 10:30:26', 2, 3, 2, 'P0001', NULL),
(25, '2022-07-16 10:30:37', 2, 8, 2, 'P0001', NULL);

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
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `fk_emp` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inv_trans` FOREIGN KEY (`inv_id`) REFERENCES `inventory` (`inv_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sup_trans` FOREIGN KEY (`sup_id`) REFERENCES `supplier` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
