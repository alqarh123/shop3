-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 07:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `insert_cart`
--

CREATE TABLE `insert_cart` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `qut` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `insert_cart`
--

INSERT INTO `insert_cart` (`id`, `name`, `price`, `user_id`, `qut`) VALUES
(11, '203m_fmf_d', '100$', 86, 0),
(12, '203m_fmf_d', '100$', 86, 0),
(13, '203m_fmf_d', '100$', 86, 0),
(14, '203m_fmf_d', '100$', 86, 0),
(15, '203m_fmf_d', '100$', 88, 0);

-- --------------------------------------------------------

--
-- Table structure for table `prod`
--

CREATE TABLE `prod` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `price` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `id_va` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prod`
--

INSERT INTO `prod` (`id`, `name`, `price`, `image`, `id_va`, `user_id`) VALUES
(9, 'phoon', '100$', 'images/1.jpg', 6, 0),
(12, 'rr', 'rr', 'images/1.jpg', 6, 87);

-- --------------------------------------------------------

--
-- Table structure for table `uesr`
--

CREATE TABLE `uesr` (
  `id` int(11) NOT NULL,
  `fill_name` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `type` set('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uesr`
--

INSERT INTO `uesr` (`id`, `fill_name`, `name`, `email`, `pass`, `type`) VALUES
(85, 'salah algarh', 'hh', 'alqarh773402891@gmail.com', '8', 'user'),
(86, 'salah', 'salah', 'alqarh773402891@gmail.com', '123', 'user'),
(87, 'salah', 'salah', 'salah@gamil.com', '123', 'admin'),
(88, 'salah', 'sala', 'alqarh773402891@gmail.com', '1234567', 'user'),
(89, 'salah', 'sala', 'alqarh773402891@gmail.coms', '1234567', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `varieties`
--

CREATE TABLE `varieties` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `varieties`
--

INSERT INTO `varieties` (`id`, `name`) VALUES
(6, 'اكترونيات'),
(7, 'مواد غذائيه'),
(8, 'موتد بناء'),
(9, 'بهارات');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insert_cart`
--
ALTER TABLE `insert_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `va` (`id_va`);

--
-- Indexes for table `uesr`
--
ALTER TABLE `uesr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varieties`
--
ALTER TABLE `varieties`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insert_cart`
--
ALTER TABLE `insert_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uesr`
--
ALTER TABLE `uesr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `varieties`
--
ALTER TABLE `varieties`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prod`
--
ALTER TABLE `prod`
  ADD CONSTRAINT `va` FOREIGN KEY (`id_va`) REFERENCES `varieties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
