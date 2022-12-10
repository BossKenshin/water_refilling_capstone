-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 11:51 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_pic`) VALUES
(1, 'admin1', 'admin1', '');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `startDate` varchar(20) NOT NULL,
  `dueDate` varchar(20) NOT NULL,
  `cubic` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `status` text NOT NULL DEFAULT 'pending',
  `payment_type` text NOT NULL DEFAULT 'none',
  `staff` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `cid`, `startDate`, `dueDate`, `cubic`, `total`, `status`, `payment_type`, `staff`) VALUES
(2, 3, ' 2022-12-13', '2022-12-29', '12.42', '161.46', 'paid', 'Over the Counter', 'Kylie'),
(4, 1, ' 2022-12-09', '2022-12-16', '23', '299.00', 'paid', 'Over the Counter', 'Kylie'),
(5, 1, ' 2022-12-01', '2022-12-10', '23', '299.00', 'paid', 'Over the Counter', 'Kylie'),
(7, 3, ' 2022-12-06', '2022-12-08', '23', '299.00', 'paid', 'Over the Counter', 'Kylie'),
(10, 4, ' 2022-10-09', '2022-10-11', '34', '442.00', 'paid', 'Over the Counter', 'Kylie'),
(11, 1, ' 2022-12-09', '2022-12-16', '43', '559.00', 'pending', 'none', 'Kylie'),
(12, 3, ' 2022-11-02', '2022-11-03', '23', '299.00', 'pending', 'none', 'Kylie'),
(13, 4, ' 2022-12-02', '2022-12-08', '67', '871.00', 'paid', 'Online', 'Kylie'),
(14, 5, ' 2022-12-08', '2022-12-10', '26', '338.00', 'pending', 'none', 'staff1223');

-- --------------------------------------------------------

--
-- Table structure for table `bill_receipt`
--

CREATE TABLE `bill_receipt` (
  `receipt_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `receipt_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_receipt`
--

INSERT INTO `bill_receipt` (`receipt_id`, `bill_id`, `receipt_file`) VALUES
(1, 13, 'receipt23.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `concern_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `concern_text` varchar(255) NOT NULL,
  `concern_filename` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `concern`
--

INSERT INTO `concern` (`concern_id`, `cid`, `concern_text`, `concern_filename`) VALUES
(1, 1, 'hi', NULL),
(2, 1, 'asdf', NULL),
(3, 1, '', NULL),
(4, 1, 'adsfads', 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `consumer`
--

CREATE TABLE `consumer` (
  `consumer_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `qrcode` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumer`
--

INSERT INTO `consumer` (`consumer_id`, `firstname`, `lastname`, `phone`, `address`, `user`, `pass`, `qrcode`, `profile`) VALUES
(1, 'Kyle', 'Rosales', '09512412342', 'Siocon', 'dfdf', 'admin1', 'dfdfimgnewqr.png', '1239560.jpg'),
(3, 'Christian Lawrenced', 'Rosales', '9502693807', 'Purok Sambag', 'asdfadsf', 'asdf', 'asdfadsfdownload.png', 'Photo-3.jpeg'),
(4, 'Jhonrel', 'Patino', '12321321321', 'Loverslane', 'adsf232af', 'admin1', 'adsf232afqr.png', '1149459.jpg'),
(5, 'Jojo', 'Bizzare', '12321312312', 'Nailon', 'bizzare', 'jojo', 'bizzaredownload23.png', 'IMG_20210406_105901_883.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment_proof`
--

CREATE TABLE `payment_proof` (
  `proof_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `proof_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_proof`
--

INSERT INTO `payment_proof` (`proof_id`, `bill_id`, `proof_filename`) VALUES
(4, 13, 'qr.png');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `staff_firstname` varchar(50) NOT NULL,
  `staff_lastname` varchar(50) NOT NULL,
  `staff_username` varchar(50) NOT NULL,
  `staff_password` varchar(50) NOT NULL,
  `staff_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_firstname`, `staff_lastname`, `staff_username`, `staff_password`, `staff_pic`) VALUES
(4, 'Kylie', 'Rosales', 'staff1223', 'staff123', 'undraw_Online_test_re_kyfx(1).png'),
(7, 'Luke', 'Kelu', 'admin1', 'admin1', 'Photo-1(2).jpeg'),
(8, 'Dees', 'Nuts', 'nuts', 'nuts', 'Photo-2(1).jpeg'),
(11, 'Mother', 'Scuker', '232', 'admin1', '1075417.jpg'),
(13, 'hdhgdhg', 'htdhgdf', '9ioioioi', 'admin1', 'undraw_mathematics_4otb.png'),
(15, 'fdfdf', 'dfd', '23241adfa', 'admin1', '1104327.jpg'),
(16, 'asdfad', 'fadfd', 'fdfd', 'admin1', 'undraw_Usability_testing_re_uu1g.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bill_receipt`
--
ALTER TABLE `bill_receipt`
  ADD PRIMARY KEY (`receipt_id`);

--
-- Indexes for table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`concern_id`);

--
-- Indexes for table `consumer`
--
ALTER TABLE `consumer`
  ADD PRIMARY KEY (`consumer_id`),
  ADD UNIQUE KEY `user` (`user`),
  ADD UNIQUE KEY `qrcode` (`qrcode`);

--
-- Indexes for table `payment_proof`
--
ALTER TABLE `payment_proof`
  ADD PRIMARY KEY (`proof_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_username` (`staff_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `bill_receipt`
--
ALTER TABLE `bill_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `concern`
--
ALTER TABLE `concern`
  MODIFY `concern_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_proof`
--
ALTER TABLE `payment_proof`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
