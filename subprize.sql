-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2024 at 05:48 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `subprize`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `productName` varchar(55) NOT NULL,
  `productPlan` varchar(55) NOT NULL,
  `productPrice` int(50) NOT NULL,
  `productDiscount` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `id` int(10) NOT NULL,
  `parent_comment` varchar(500) NOT NULL,
  `student` varchar(1000) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(6, '0', 'Loh', 'What   ...', '2024-06-14 00:23:32'),
(7, '6', 'Wendy', '12333', '2024-06-14 00:23:49'),
(8, '0', 'Loh', '12345', '2024-06-14 00:27:22'),
(9, '8', 'ruby', '147654', '2024-06-14 00:27:34'),
(10, '8', 'yong', 'xzfdxgf', '2024-06-14 00:27:43'),
(11, '0', 'Yong Jun Wei', 'This prodcut is amaziang', '2024-06-14 00:33:28'),
(12, '11', 'Jack', 'I agree', '2024-06-14 00:33:46'),
(13, '0', 'david', '- im a king', '2024-06-14 00:43:10'),
(14, '13', 'jun', 'this is pretty good', '2024-06-14 00:43:25'),
(15, '0', 'juntest', 'testing jun test', '2024-06-14 00:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_history`
--

DROP TABLE IF EXISTS `order_history`;
CREATE TABLE `order_history` (
  `order_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postalCode` int(10) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `productPlan` varchar(50) NOT NULL,
  `productPrice` int(50) NOT NULL,
  `productDiscount` int(20) NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `productName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`order_id`, `email`, `firstName`, `lastName`, `phone`, `address`, `postalCode`, `state`, `city`, `country`, `paymentMethod`, `productPlan`, `productPrice`, `productDiscount`, `totalPrice`, `date`, `productName`) VALUES
(1, 'furnoyong@gmail.com', 'Yong', 'Jun Wei', 0, '26,Lorong 2,Taman Heawood', 31100, 'Sungai Siput', 'Perak', 'Malaysia', 'Credit Card/Debit Card', '', 105, 9, 96, '2024-06-27 16:52:32', '3 Month Plan'),
(2, 'furnoyong@gmail.com', 'Yong', 'Jun Wei', 0, '26, Lorong 2, Taman Heawood', 31100, 'Perak', 'Perak', 'Malaysia', 'Credit Card/Debit Card', '', 420, 60, 360, '2024-06-29 17:29:49', 'Korea Snack Box'),
(3, 'furnoyong@gmail.com', 'Yong', 'Jun Wei', 0, '26, Lorong 2, Taman Heawood', 31100, 'Perak', 'Perak', 'Malaysia', 'Credit Card/Debit Card', '', 420, 60, 360, '2024-06-29 17:34:16', 'Korea Snack Box 12 M');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `role`, `firstName`, `lastName`, `email`, `password`) VALUES
(6, 'user', 'Loh', 'Joe Ying', 'joeyingloh0326@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'admin', 'sub', 'prize', 'admin@gmail.com', '121212'),
(8, 'user', 'Wendy', 'Tan', 'abby1004@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 'user', 'Tan', 'Yong Jin', 'yongjin03@gmail.com', '202cb962ac59075b964b07152d234b70'),
(10, 'user', 'Abby', 'Ng', 'wendyng0303@gmail.com', '202cb962ac59075b964b07152d234b70'),
(11, 'user', 'Liew', 'Jun Wei', 'junwei@gmail.com', '202cb962ac59075b964b07152d234b70'),
(12, 'user', 'jian', 'feng', 'feng@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'user', 'test', 'test', 'test@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
