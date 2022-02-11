-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 01:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `current_balance` double DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `current_balance`, `gender`) VALUES
(1, 'Sourav Dutta', 'sourav5489@gmail.com', 732, 'male'),
(2, 'Ram Roy', 'ramroy56@gmail.com', 826, 'male'),
(3, 'Rima Chandra', 'rima147@gmail.com', 855, 'female'),
(4, 'Sabir Khan', 'sabir@gmail.com', 5000, 'male'),
(5, 'Puja Mondal', 'puja34@gmail.com', 85000, 'female'),
(6, 'Somnath Mondal', 'somnath76@gmail.com', 74100, 'male'),
(7, 'Riya Roy', 'riya78@gmail.com', 3560, 'female'),
(8, 'Soma Roy', 'soma56@gmail.com', 50000, 'female'),
(9, 'Souvik Das', 'souvikdas@gmail.com', 14950, 'male'),
(10, 'Ayan Bari', 'ayanbari96@gmail.com', 45000, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `recever_name` varchar(255) NOT NULL,
  `recever_email` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `sender_name`, `sender_email`, `recever_name`, `recever_email`, `amount`, `date_time`) VALUES
(1, 'Sourav Dutta', 'sourav5489@gmail.com', 'Rima Chandra', 'rima147@gmail.com', 50, '2022-02-06 22:07:33'),
(46, 'Ram Roy', 'ramroy56@gmail.com', 'Rima Chandra', 'rima147@gmail.com', 50, '2022-02-07 19:47:03'),
(47, 'Rima Chandra', 'rima147@gmail.com', 'Sourav Dutta', 'sourav5489@gmail.com', 100, '2022-02-07 19:47:43'),
(48, 'Ram Roy', 'ramroy56@gmail.com', 'Sourav Dutta', 'sourav5489@gmail.com', 50, '2022-02-07 19:48:29'),
(49, 'Rima Chandra', 'rima147@gmail.com', 'Sourav Dutta', 'sourav5489@gmail.com', 50, '2022-02-07 19:50:21'),
(50, 'Ram Roy', 'ramroy56@gmail.com', 'Sourav Dutta', 'sourav5489@gmail.com', 50, '2022-02-07 19:50:44'),
(51, 'Souvik Das', 'souvikdas@gmail.com', 'Somnath Mondal', 'somnath76@gmail.com', 100, '2022-02-07 20:04:01'),
(52, 'Sourav Dutta', 'sourav5489@gmail.com', 'Souvik Das', 'souvikdas@gmail.com', 50, '2022-02-07 20:51:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
