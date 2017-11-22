-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2016 at 07:09 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branches`
--

CREATE TABLE `tbl_branches` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`id`, `firstname`, `middlename`, `lastname`, `address`, `email`, `contact`) VALUES
(1, 'BRYLE', '12zxczxc3', 'zxczxc', 'zxc', 'asd@yahoo.com', 'zxc'),
(2, 'qweqweqwe', 'qweqwe123123', 'qweqwe123', 'qweqwe1231', 'eqweqwe123@yahoo.com', '12312323123'),
(3, '123123', '1231', '23123', '3123', '123@yahoo.com', '12312');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `baking_order` varchar(30) NOT NULL,
  `pick_up` varchar(30) NOT NULL,
  `delivery_method` varchar(30) NOT NULL,
  `payment_method` varchar(30) NOT NULL,
  `total_paid` float(15,2) NOT NULL,
  `customer_id` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `claimdate` date NOT NULL,
  `time1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `baking_order`, `pick_up`, `delivery_method`, `payment_method`, `total_paid`, `customer_id`, `status`, `description`, `claimdate`, `time1`) VALUES
(1, 'B0ATNHSS0', '', '', '', 0.00, '', 'Prepared', 'Instruction<br><br><br>Cake Message<br>', '2016-04-03', '2016-03-30 14:58:55'),
(2, 'XTRWN5YRD', '', '', '', 0.00, '', 'Cooking', 'Instruction<br><br><br>Cake Message<br>', '2016-04-03', '2016-03-30 14:41:59'),
(3, 'XZKIY1OZ4', '', '', '', 0.00, '', 'Pending', 'Instruction<br><br><br>Cake Message<br>', '2016-04-07', '2016-04-07 06:37:56'),
(4, '2Y4SZH0F5', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-07', '2016-04-07 06:47:11'),
(5, '4ZWAZXLU0', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-07', '2016-04-07 06:47:53'),
(6, 'FUKC5PGHX', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-07', '2016-04-07 06:48:31'),
(7, 'R3UR2DCKO', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-07', '2016-04-07 08:48:04'),
(8, 'QT25DXX3Z', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-09', '2016-04-09 05:28:37'),
(9, 'XQ2403UHX', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-10', '2016-04-10 08:36:25'),
(10, 'QZT6R4HHZ', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-10', '2016-04-10 08:46:17'),
(11, 'NP3YJ2M1D', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-10', '2016-04-10 08:48:45'),
(12, 'ZZJHIX4KO', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-10', '2016-04-10 09:09:14'),
(13, 'UOEN2ZUDV', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-10', '2016-04-10 09:15:05'),
(14, 'A1YK225U6', '', '', '', 0.00, '', 'Pending', 'Instruction<br>none<br><br>Cake Message<br>none', '2016-04-10', '2016-04-10 09:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `price` float(15,2) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_name`, `price`, `category`, `description`, `picture`) VALUES
(1, 'FRUITY CHOCO', 12000.00, 'Cake', '12 X 16', ''),
(2, 'WEDDING CAKE', 1000.00, 'Cake', '12 X 78', ''),
(3, 'ROLL CHOCO', 1231.12, 'Cake', 'NONE', ''),
(4, 'CHIFFON CAKE', 1000.00, 'Cake', 'mahalon nih', ''),
(5, 'CHIFFON', 2000.00, 'Cake Type', 'MURAG CHIFFON', ''),
(6, 'Strawberry', 120.00, 'Design', 'XL', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE `tbl_sales` (
  `id` int(11) NOT NULL,
  `sales_id` varchar(30) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float(15,2) NOT NULL,
  `total` float(15,2) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `sales_id`, `product_name`, `description`, `price`, `total`, `quantity`) VALUES
(1, 'B0ATNHSS0', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(2, 'B0ATNHSS0', 'Strawberry', 'XL', 120.00, 120.00, 1),
(3, 'XTRWN5YRD', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(4, 'FWPNA22F0', 'CHIFFON CAKE', 'mahalon nih', 1000.00, 1000.00, 1),
(5, 'XZKIY1OZ4', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(6, 'XZKIY1OZ4', 'Strawberry', 'XL', 120.00, 120.00, 1),
(7, '2Y4SZH0F5', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(8, '4ZWAZXLU0', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(9, 'FUKC5PGHX', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(10, 'TQMT2CPRC', 'CHIFFON CAKE', 'mahalon nih', 1000.00, 1000.00, 1),
(11, 'QBQZZQSFV', 'CHIFFON CAKE', 'mahalon nih', 1000.00, 1000.00, 1),
(12, 'R3UR2DCKO', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(13, 'QT25DXX3Z', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(14, 'QT25DXX3Z', 'Strawberry', 'XL', 120.00, 120.00, 1),
(15, 'XQ2403UHX', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(16, 'QZT6R4HHZ', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(17, 'NP3YJ2M1D', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(18, 'ZZJHIX4KO', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(19, 'UOEN2ZUDV', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1),
(20, 'A1YK225U6', 'CHIFFON', 'MURAG CHIFFON', 2000.00, 2000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL,
  `refund_rates` float(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `refund_rates`) VALUES
(1, 0.05),
(2, 0.05);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transactions`
--

CREATE TABLE `tbl_transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `customer_name` varchar(40) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `order_type` varchar(30) NOT NULL,
  `claimdate` date NOT NULL,
  `date_trans` date NOT NULL,
  `total_payment` float(15,2) NOT NULL,
  `balance` float(15,2) NOT NULL,
  `amount_tender` float(15,2) NOT NULL,
  `status` varchar(30) NOT NULL,
  `time1` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transactions`
--

INSERT INTO `tbl_transactions` (`id`, `transaction_id`, `customer_name`, `user_name`, `order_type`, `claimdate`, `date_trans`, `total_payment`, `balance`, `amount_tender`, `status`, `time1`) VALUES
(1, 'B0ATNHSS0', '', '', 'Motif', '2016-04-03', '2016-04-03', 2120.00, 0.00, 1060.00, 'Reserved', '2016-04-03 12:12:49'),
(2, 'XTRWN5YRD', '', '', 'Motif', '2016-04-03', '2016-04-03', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-03 12:14:55'),
(3, 'FWPNA22F0', '', '', 'Non-Motif', '2016-07-02', '2016-07-02', 1000.00, 0.00, 1000.00, 'Reserved', '2016-07-02 02:42:50'),
(4, 'XZKIY1OZ4', '', '', 'Motif', '2016-04-07', '2016-04-07', 2120.00, 0.00, 1060.00, 'Reserved', '2016-04-07 06:37:56'),
(5, '2Y4SZH0F5', '', '', 'Motif', '2016-04-07', '2016-04-07', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-07 06:47:11'),
(6, '4ZWAZXLU0', '', '', 'Motif', '2016-04-07', '2016-04-07', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-07 06:47:53'),
(7, 'FUKC5PGHX', '', '', 'Motif', '2016-04-07', '2016-04-07', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-07 06:48:31'),
(8, 'R3UR2DCKO', '', '', 'Motif', '2016-04-07', '2016-04-07', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-07 08:48:04'),
(9, 'QT25DXX3Z', '', '', 'Motif', '2016-04-09', '2016-04-09', 2120.00, 0.00, 1060.00, 'Reserved', '2016-04-09 05:28:37'),
(10, 'XQ2403UHX', '', '', 'Motif', '2016-04-10', '2016-04-10', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-10 08:36:24'),
(11, 'QZT6R4HHZ', '', '', 'Motif', '2016-04-10', '2016-04-10', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-10 08:46:17'),
(12, 'NP3YJ2M1D', '', '', 'Motif', '2016-04-10', '2016-04-10', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-10 08:48:45'),
(13, 'ZZJHIX4KO', '', '', 'Motif', '2016-04-10', '2016-04-10', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-10 09:09:14'),
(14, 'UOEN2ZUDV', '', '', 'Motif', '2016-04-10', '2016-04-10', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-10 09:15:05'),
(15, 'A1YK225U6', '', '', 'Motif', '2016-04-10', '2016-04-10', 2000.00, 0.00, 1000.00, 'Reserved', '2016-04-10 09:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `type` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `contact`, `type`, `status`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'default', 'active'),
(2, '', '', '', '', '', '', 'Claim', ''),
(3, 'cashier', 'cashier', 'cashier', 'cashier', 'cashier', 'cashier', 'cashier', 'disable'),
(4, 'mis', 'mis', 'adawd', 'awd', 'awd', '0932', 'manager', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_branches`
--
ALTER TABLE `tbl_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_branches`
--
ALTER TABLE `tbl_branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_sales`
--
ALTER TABLE `tbl_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_transactions`
--
ALTER TABLE `tbl_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
