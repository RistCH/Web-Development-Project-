-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2023 at 09:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dreambite`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `availability` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `fullname`, `username`, `password`, `contact_no`, `email`, `availability`, `status`) VALUES
(1, 'Rist Escoto', 'rist', '$2y$10$Y7EH/Fw3L3XeFYvZ5aGaA.pr4ZNLNpHkxf4pox4.g4fmDP/bQoqJ.', '09154174528', 'rist@gmail.com', 0, 1),
(4, 'Bea Canlas', 'bea', '$2y$10$8Flxm/AZyiDDfoePcZfLve9YUBautpKx2nkR0y//u02nXm0Ap2Cgy', '09974820613', 'canlas@gmail.com', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact_no` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(32) NOT NULL,
  `end_time` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `fullname`, `email`, `contact_no`, `date`, `start_time`, `end_time`) VALUES
(1, 'Beatriz Canlas', 'bea@gmail.com', '09154174528', '2023-06-05', '07:00 am', '10:00 am'),
(2, 'Edward Magtoto', 'edward@gmail.com', '09974820613', '2023-06-05', '07:00 am', '10:00 am');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(32) NOT NULL,
  `end_time` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `fullname`, `date`, `start_time`, `end_time`) VALUES
(3, 'Rist Escoto', '2023-06-05', '07:00 am', '10:00 am');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(128) NOT NULL,
  `fullname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contact_no` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `contact_no`, `password`, `status`) VALUES
(1, 'Rist Escoto', 'rist@gmail.com', '09154174528', '$2y$10$ehFDiCJNTbH1fsI5cbyAAelK3dC1c7hTl1SxyAoH937idpWlI8lHW', 1),
(2, 'Beatriz Canlas', 'canlas@gmail.com', '09974820613', '$2y$10$OTzBRBuX3LIKrJnqVXmI6ecYaQBy2OU94xA8F1a3YBHz5rNZUWBM.', 0),
(3, 'sadas asdasdas', 'asdasdsa@gmail.com', '09123123123', '$2y$10$v8AW6LzfQR3Sr4hAVyQUkO9m3E8Vy8lH.NvNp2kmalN.yh6Dxhi8C', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
