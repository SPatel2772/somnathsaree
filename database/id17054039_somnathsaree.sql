-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2022 at 04:36 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17054039_somnathsaree`
--

-- --------------------------------------------------------

--
-- Table structure for table `customerlist`
--

CREATE TABLE `customerlist` (
  `S.No` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `total_saree` int(10) NOT NULL,
  `return_saree` int(10) NOT NULL,
  `customer_merchant_id` int(10) NOT NULL,
  `customer_merchant_name` text NOT NULL,
  `price` int(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerlist`
--

INSERT INTO `customerlist` (`S.No`, `customer_name`, `total_saree`, `return_saree`, `customer_merchant_id`, `customer_merchant_name`, `price`, `date`) VALUES
(2, 'Shyam Borsaniya', 10, 10, 54, 'Mahesh bhai', 70, '2022-02-25 09:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchant_id` int(10) NOT NULL,
  `merchant_name` varchar(100) NOT NULL,
  `saree_name` varchar(100) NOT NULL,
  `total_saree` int(10) NOT NULL,
  `merchant_price` int(50) NOT NULL,
  `saree_price` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchant_id`, `merchant_name`, `saree_name`, `total_saree`, `merchant_price`, `saree_price`, `date`) VALUES
(2, 'Isho surat', 'Sive puja', 77, 130, 90, '2021-07-02'),
(3, 'Isho surat', 'Sive puja', 69, 130, 90, '2021-07-04'),
(4, 'Isho surat', 'Sive puja', 76, 130, 90, '2021-07-07'),
(5, 'Raju bhai', 'D.n 53', 80, 60, 40, '2021-07-07'),
(6, 'Vipul bhai', 'D.n 908', 77, 115, 90, '2021-07-14'),
(7, 'Raju bhai', 'D .n 1', 75, 50, 35, '2021-07-19'),
(8, 'Raju bhai', 'D.n 66', 56, 57, 40, '2021-07-29'),
(9, 'Mahesh bhai', 'D.n. 148', 77, 48, 25, '2021-08-01'),
(10, 'Vipul bhai', 'D.n.1061', 150, 95, 70, '2021-08-03'),
(11, 'Isho surat', 'Maruti', 70, 140, 100, '2021-08-03'),
(12, 'Raju bhai', 'D.n.22', 48, 54, 35, '2021-08-03'),
(13, 'Raju bhai', 'D.n.1', 50, 50, 35, '2021-08-03'),
(14, 'Vipul bhai', 'D.n 1003', 100, 45, 30, '2021-08-06'),
(15, 'Isho surat', 'Tanaka c palu', 75, 175, 145, '2021-08-12'),
(16, 'Raju bhai', 'D.n.1', 100, 50, 35, '2021-08-12'),
(17, 'Vipul bhai', 'D.n 121', 100, 70, 45, '2021-08-15'),
(18, 'Raju bhai', 'D.n.142', 110, 60, 40, '2021-08-18'),
(19, 'Mahesh bhai', 'D.n.82', 60, 125, 100, '2021-08-17'),
(20, 'Raju bhai', 'D.n.130', 90, 60, 40, '2021-08-23'),
(21, 'Isho surat', 'Double C vel', 56, 175, 130, '2021-08-25'),
(22, 'Raju bhai', 'D. N. 130', 90, 60, 40, '2021-08-26'),
(25, 'Raju bhai', 'D. N. 130', 105, 60, 40, '2021-08-28'),
(26, 'Isho surat', 'Sive puja', 68, 130, 90, '2021-09-02'),
(27, 'Mahesh bhai', 'D.n.196', 60, 115, 90, '2021-09-02'),
(28, 'Hari bhai', 'C .palu', 199, 40, 30, '2021-09-02'),
(29, 'Bharat bhai', 'Keri vel', 79, 100, 65, '2021-09-04'),
(30, 'Mahesh bhai', 'D.n 182 jarkan', 80, 105, 80, '2021-09-03'),
(31, 'Mahesh bhaai', 'D.n.148 ', 80, 48, 28, '2021-09-06'),
(32, 'Mahesh bhai', 'D.n.163', 64, 40, 25, '2021-09-09'),
(33, 'Hari bhai', '890', 119, 41, 30, '2021-09-11'),
(34, 'Mahesh bhai', 'Gre jan', 60, 57, 35, '2021-09-10'),
(35, 'Mahesh bhai', 'D.n.188', 100, 108, 90, '2021-09-01'),
(36, 'Isho surat', 'Matka', 64, 195, 150, '2021-09-09'),
(37, 'Isho surat', 'Maglsutra', 86, 123, 85, '2021-09-12'),
(38, 'Mahesh bhai', 'D.n.148', 79, 48, 28, '2021-09-14'),
(39, 'Mahesh bhai', 'D.n 163', 52, 40, 25, '2021-09-15'),
(40, 'Vipul bhai', 'D.n. 157', 60, 85, 60, '2021-09-16'),
(41, 'Vipul bhai', 'D.n.116', 60, 60, 40, '2021-09-16'),
(42, 'Mahesh bhai', 'D.n.189', 70, 78, 50, '2021-09-14'),
(43, 'Raju bhai', 'D.n.', 100, 60, 40, '2021-09-01'),
(44, 'Mahesh bhai', 'D.n. 194', 60, 108, 75, '2021-09-16'),
(45, 'Mahesh bhai', 'D.n.81', 16, 160, 110, '2021-09-16'),
(46, 'Mahesh bhai', 'D.n.82', 16, 125, 90, '2021-09-16'),
(47, 'Mahesh bhai', '5222', 94, 102, 80, '2021-09-18'),
(48, 'Mahesh bhai', 'D.n.163', 32, 40, 25, '2021-09-18'),
(49, 'Isho surat', 'Bodar leriya dabal c palu', 74, 180, 130, '2021-09-16'),
(50, 'Isho surat', 'Sarovar kuj buta', 100, 145, 100, '2021-09-17'),
(51, 'Mahesh bhai', 'D n. 196', 60, 115, 80, '2021-09-21'),
(52, 'Mahesh bhai', 'D.n.196', 28, 115, 80, '2021-09-22'),
(53, 'Mahesh bhai', 'D.n. 194', 32, 108, 70, '2021-09-22'),
(54, 'Mahesh bhai', 'D n. 194', 54, 108, 70, '2021-09-23'),
(55, 'Vipul bhai', 'D.n.116', 118, 43, 25, '2021-09-25'),
(56, 'Bharat bhai', 'Dabal keri', 148, 157, 110, '2021-09-14'),
(57, 'Bharat bhai', 'Raund vare', 40, 85, 45, '2021-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `s.no` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  `type` int(10) NOT NULL DEFAULT 0,
  `password` varchar(250) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`s.no`, `name`, `username`, `type`, `password`, `date`) VALUES
(6, 'Admin', 'Admin123', 1, '$2y$10$ImAtQ/gh73p/A1KOvi.i8O1vmQf3TVEXO0VFzcXcr8SwbuNkCcno2', '2021-06-12 16:23:42'),
(12, 'Avni', 'Avni', 0, '$2y$10$pWK35NzdlJt.fIW9FVUFHOz5gcZuZi2MHJxRNhv21/llFwSNjKr6m', '2021-06-25 03:32:53'),
(13, 'Dixsita', 'Dixsita', 0, '$2y$10$VozHndcv2EzEmPwweupgOeL8m6SQFBGRXHBNtFRw0q2MtBsc5iUcG', '2021-06-27 14:35:48'),
(14, 'Anjali vadhavana', 'Anjali vadhavana', 0, '$2y$10$gRvlvix3AcnDZDPJk/l7T.5yhFgBA17ahmVORi3dVY59dmMBYwya2', '2021-06-28 05:08:19'),
(16, 'Shyam Borsaniya', 'Shyam Borsaniya', 0, '$2y$10$ulV/BD/XxHJiY5W9UaVSU.Zk3QJqPnAm/I7HVx3FMi.GdTFAM2l6m', '2022-02-25 09:36:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customerlist`
--
ALTER TABLE `customerlist`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`s.no`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customerlist`
--
ALTER TABLE `customerlist`
  MODIFY `S.No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `merchant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `s.no` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
