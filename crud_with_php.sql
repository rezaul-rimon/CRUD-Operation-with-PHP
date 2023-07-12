-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 06:11 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(5) NOT NULL,
  `emp_name` varchar(20) NOT NULL,
  `emp_email` varchar(30) NOT NULL,
  `emp_phone` text NOT NULL,
  `emp_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp_name`, `emp_email`, `emp_phone`, `emp_status`) VALUES
(1, 'Rezaul', 'rezaul0495@gmail.com', '01634518110 ', 1),
(2, 'Mymuna', 'mymu@rimon.me', '+8801566028001 ', 0),
(3, 'Mymuna', 'mymu@rimon.me', '01634518110 ', 1),
(4, 'Munmun', 'habibmail35@gmail.com', '01634518110 ', 0),
(5, 'Moni', 'mymu@rimon.me', '01634518110 ', 0),
(6, 'harami', 'bluesky117468@gmail.com', '01634518110 ', 1),
(7, 'sohel vai', 'bluesky117468@gmail.com', '+8801566028001 ', 1),
(8, 'Rimon', 'rezaul.islam.rimon@gmail.com', '+8801566028001 ', 1),
(9, 'MyRimon', 'mymu@rimon.me', '+8801566028001 ', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
