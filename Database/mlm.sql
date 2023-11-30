-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 07:10 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `upline` varchar(255) DEFAULT NULL,
  `amount` float NOT NULL,
  `fd` int(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `date1` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `upline`, `amount`, `fd`, `date`, `date1`) VALUES
(34, 'dimplesoni', 'kjs', 600000, 100000, '2023-03-01 21:25:32', '2023-04-14 12:09:56'),
(35, 'nishasoni', 'dimplesoni', 225000, 1300000, '2023-03-01 21:25:51', '2023-11-16 12:37:48'),
(37, 'tirth', 'dimplesoni', 10000, 0, '2023-03-01 21:30:55', NULL),
(38, 'anitasoni', 'dimplesoni', 10000, 0, '2023-03-01 21:31:38', NULL),
(39, 'kkthakor', 'dimplesoni', 25000, 0, '2023-03-01 21:31:58', NULL),
(42, 'niketan', 'nishasoni ', 80000, 0, '2023-03-01 21:33:01', NULL),
(43, 'sarika', 'nishasoni', 90000, 0, '2023-03-01 21:33:22', NULL),
(44, 'ansuya', 'nishasoni', 750000, 0, '2023-03-01 21:33:42', NULL),
(46, 'vipulgohil', 'nishasoni', 50000, 0, '2023-03-05 10:42:44', NULL),
(59, 'alpita', 'nishasoni', 27000, 0, '2023-04-08 12:34:24', NULL),
(60, 'pinkybhatt', 'nishasoni', 20000, 0, '2023-04-13 18:50:39', NULL),
(64, 'gayatri', 'dimplesoni', 150000, 0, '2023-04-15 14:02:37', NULL),
(65, 'palaksoni', 'dimplesoni', 750000, 0, '2023-05-08 23:59:46', NULL),
(66, 'parthpatel', 'dimplesoni', 100000, 0, '2023-07-08 15:02:23', NULL),
(67, 'anil', 'niketan', 600000, 0, '2023-07-11 13:19:25', NULL),
(68, 'arvinda', 'dimplesoni', 30000, 0, '2023-07-14 21:32:39', NULL),
(69, 'bipindarji', 'dimplesoni', 20000, 0, '2023-07-14 21:33:12', NULL),
(70, 'pravinamam', 'nishasoni', 1850000, 0, '2023-09-28 09:50:24', NULL),
(71, 'rajniben-A', 'nishasoni', 30000, 0, '2023-09-28 09:50:54', NULL),
(72, 'swapanaben', 'nishasoni', 100000, 0, '2023-09-28 09:51:17', NULL),
(73, 'rasikbhai', 'gayatri', 50000, 0, '2023-09-28 09:51:37', NULL),
(74, 'jyotiben', 'dimplesoni', 100000, 0, '2023-09-28 12:22:18', NULL),
(75, 'chandu', 'pravinamam', 100000, 0, '2023-10-06 11:50:00', NULL),
(76, 'bhavanaben', 'nishasoni', 10000, 0, '2023-10-09 20:16:15', NULL),
(78, 'mitul', 'vipulgohil', 150000, 0, '2023-11-15 10:04:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `phone` bigint(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `joinDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `phone`, `password`, `joinDate`) VALUES
(15, 'dimplesoni', 'Dimple', 'Soni', 9427080543, '123456', '2023-02-18 19:42:02'),
(16, 'nikunjsoni', 'Nikunj', 'Soni', 9427080543, '123456', '2023-04-03 14:20:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
