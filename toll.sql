-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2018 at 09:57 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toll`
--

-- --------------------------------------------------------

--
-- Table structure for table `fgusers3`
--

CREATE TABLE `fgusers3` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `vehicle_number` varchar(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `confirmcode` varchar(32) DEFAULT NULL,
  `recharge` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fgusers3`
--

INSERT INTO `fgusers3` (`id_user`, `name`, `email`, `phone_number`, `vehicle_number`, `username`, `password`, `confirmcode`, `recharge`) VALUES
(14, 'Justin d', 'hdjakh@123.com', '9995033593', 'KL16K1269', 'justin', '53dd9c6005f3cdfc5a69c5c07388016d', 'y', 0),
(15, 'jhon', 'jhondoe@566.com', '9995033593', 'TN21AT4849', 'jhon', '4c25b32a72699ed712dfa80df77fc582', 'y', 200);

-- --------------------------------------------------------

--
-- Table structure for table `theft_data`
--

CREATE TABLE `theft_data` (
  `theft_id` int(10) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theft_data`
--

INSERT INTO `theft_data` (`theft_id`, `vehicle_number`) VALUES
(7, ''),
(11, 'KL16K12677'),
(3, 'KL16K1269');

-- --------------------------------------------------------

--
-- Table structure for table `toll_data`
--

CREATE TABLE `toll_data` (
  `toll_id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `toll_status` varchar(10) NOT NULL,
  `pay_time` varchar(30) NOT NULL,
  `generated_time` varchar(30) NOT NULL,
  `recharge` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toll_data`
--

INSERT INTO `toll_data` (`toll_id`, `id_user`, `amount`, `vehicle_number`, `image_path`, `toll_status`, `pay_time`, `generated_time`, `recharge`) VALUES
(47, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '25-04-2018 23:42:57', 200),
(48, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '25-04-2018 23:43:41', 200),
(49, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:19:51', 200),
(50, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:22:15', 200),
(51, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:23:05', 200),
(52, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:24:09', 200),
(53, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:27:03', 200),
(54, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:27:46', 200),
(55, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:28:56', 200),
(56, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:31:55', 200),
(57, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:34:46', 200),
(58, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:34:55', 200),
(59, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:38:06', 200),
(60, 0, '50', 'TN21AT4849', '2.jpg', 'Pending', '', '26-04-2018 00:38:43', 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fgusers3`
--
ALTER TABLE `fgusers3`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `theft_data`
--
ALTER TABLE `theft_data`
  ADD PRIMARY KEY (`theft_id`),
  ADD UNIQUE KEY `vehicle_number` (`vehicle_number`);

--
-- Indexes for table `toll_data`
--
ALTER TABLE `toll_data`
  ADD PRIMARY KEY (`toll_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fgusers3`
--
ALTER TABLE `fgusers3`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `theft_data`
--
ALTER TABLE `theft_data`
  MODIFY `theft_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `toll_data`
--
ALTER TABLE `toll_data`
  MODIFY `toll_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
