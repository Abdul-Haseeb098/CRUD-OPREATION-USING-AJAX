-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2024 at 12:29 PM
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
-- Database: `haseeb`
--

-- --------------------------------------------------------

--
-- Table structure for table `haseeb`
--

CREATE TABLE `haseeb` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `cpassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `haseeb`
--

INSERT INTO `haseeb` (`id`, `fname`, `uname`, `email`, `number`, `password`, `cpassword`) VALUES
(33, 'Haseeb Ansari', 'Haseeb', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(35, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(36, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(37, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(38, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(39, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(40, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(41, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(42, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(43, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(44, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(45, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(46, 'abdul', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(48, 'Haseeb Ansari', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(49, 'Haseeb Ansari', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(50, 'Haseeb Ansari', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(51, 'Haseeb', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456'),
(52, 'Haseeb Ansari', 'owner', 'haseebbadshah098@gmail.com', 2147483647, '123456', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `haseeb`
--
ALTER TABLE `haseeb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `haseeb`
--
ALTER TABLE `haseeb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
