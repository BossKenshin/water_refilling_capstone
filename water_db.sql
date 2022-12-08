-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 08:59 PM
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
  `admin_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(5, 1, ' 2022-12-09', '2022-12-09', '23', '299.00', 'pending', 'none', 'Kylie'),
(7, 3, ' 2022-12-16', '2022-12-23', '23', '299.00', 'pending', 'none', 'Kylie');

-- --------------------------------------------------------

--
-- Table structure for table `bill_receipt`
--

CREATE TABLE `bill_receipt` (
  `receipt_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `receipt_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `concern`
--

CREATE TABLE `concern` (
  `concern_id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `concern_text` varchar(255) NOT NULL,
  `concern_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 'Christian Lawrenced', 'Rosales', '9502693807', 'Purok Sambag', 'asdfadsf', 'asdf', 'asdfadsfdownload.png', 'Photo-3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `payment_proof`
--

CREATE TABLE `payment_proof` (
  `proof_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `proof_filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bill_receipt`
--
ALTER TABLE `bill_receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consumer`
--
ALTER TABLE `consumer`
  MODIFY `consumer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment_proof`
--
ALTER TABLE `payment_proof`
  MODIFY `proof_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
