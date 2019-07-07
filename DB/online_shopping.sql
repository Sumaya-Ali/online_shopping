-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2019 at 04:31 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `chk_id` int(11) NOT NULL,
  `chk_item` int(11) NOT NULL,
  `chk_ref` text NOT NULL,
  `chk_timing` datetime NOT NULL,
  `chk_qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`chk_id`, `chk_item`, `chk_ref`, `chk_timing`, `chk_qty`) VALUES
(1, 3, '2019-06-28 05:11:22_268598701', '2019-06-28 05:11:22', 0),
(2, 2, '2019-06-28 05:11:22_268598701', '2019-06-28 05:11:41', 0),
(3, 4, '2019-06-28 09:20:29_1131942351', '2019-06-28 09:20:29', 0),
(4, 1, '2019-06-28 09:20:29_1131942351', '2019-06-28 09:52:34', 0),
(5, 5, '2019-06-28 09:20:29_1131942351', '2019-06-28 09:53:16', 0),
(8, 6, '2019-06-28 09:20:29_1131942351', '2019-06-28 10:46:40', 0),
(15, 2, '2019-06-30 08:40:35_182534192', '2019-06-30 11:01:45', 1),
(18, 5, '2019-06-30 08:40:35_182534192', '2019-06-30 12:00:49', 1),
(19, 3, '2019-06-30 08:40:35_182534192', '2019-06-30 12:05:10', 1),
(25, 8, '2019-07-01 02:20:40_28277210', '2019-07-01 06:40:25', 1),
(27, 3, '2019-07-02 01:51:15_2094855840', '2019-07-02 01:51:37', 1),
(28, 1, '2019-07-02 01:51:15_2094855840', '2019-07-02 01:54:50', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_image` text NOT NULL,
  `item_title` text NOT NULL,
  `item_description` text NOT NULL,
  `item_qty` int(11) NOT NULL,
  `item_cost` int(11) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_discount` int(11) NOT NULL,
  `item_cat` text NOT NULL,
  `item_delivery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_image`, `item_title`, `item_description`, `item_qty`, `item_cost`, `item_price`, `item_discount`, `item_cat`, `item_delivery`) VALUES
(1, 'images/products/product4.jpg', 'Samsung Watches', '<p>This is a very beautiful watch. it\'s purely made of metal. you can buy this watch by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Made of metal</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 50, 400, 500, 50, 'watches', 20),
(2, 'images/products/product8.jpg', 'Galaxy Watches', '<p>This is a very beautiful watch. it\'s purely made of metal. you can buy this watch by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Made of metal</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 60, 700, 1000, 75, 'watches', 30),
(3, 'images/products/product6.jpg', 'Disney Glasses', '<p>This is a very beautiful Glasses. it\'s very comfortable. you can buy this glasses by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Very Comfortable</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 100, 50, 70, 5, 'glasses', 15),
(4, 'images/products/product9.jpg', 'RJ Watches', '<p>This is a very beautiful watch. it\'s purely made of metal. you can buy this watch by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Made of metal</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 80, 300, 400, 50, 'watches', 20),
(5, 'images/products/product2.jpg', 'Sinn Uhren Watches', '<p>This is a very beautiful watch. it\'s purely made of metal. you can buy this watch by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Made of metal</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 30, 150, 250, 30, 'watches', 10),
(6, 'images/products/product3.jpg', 'Awesome Watches', '<p>This is a very beautiful watch. it\'s purely made of metal. you can buy this watch by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Made of metal</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 40, 200, 300, 20, 'watches', 15),
(7, 'images/products/product5.jpg', 'Apple Watches', '<p>This is a very beautiful watch. it\'s purely made of metal. you can buy this watch by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Made of metal</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 120, 600, 800, 50, 'watches', 25),
(8, 'images/products/product7.jpg', 'Cartier Glasses', '<p>This is a very beautiful Glasses. it\'s very comfortable. you can buy this glasses by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Very Comfortable</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 400, 80, 100, 10, 'glasses', 20),
(9, 'images/products/product1.jpg', 'Paris Glasses', '<p>This is a very beautiful Glasses. it\'s very comfortable. you can buy this glasses by click on the buy button.</p>\r\n						<ul>\r\n							<li>it\'s beautiful</li>\r\n							<li>Very Comfortable</li>\r\n							<li>An Original and branded quality</li>\r\n							<li>Free shipping overall the country</li>\r\n							<li>Pay Securely via <b>CASH ON DELIVERY</b> method</li>\r\n						</ul>', 90, 200, 300, 30, 'glasses', 10),
(10, 'images/products/product10.jpg', 'Cool Glasses', '<p><span style=\"font-size: 18pt;\"><strong>It\'s very beautiful cool glasses, you will like it cause of:</strong></span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">1. it\'s comfotable</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">2. hight quality</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">3. <strong><em><span style=\"color: #e74c3c;\">cheap price</span></em></strong></span></p>', 100, 150, 200, 10, 'glasses', 20),
(11, 'images/products/product11.jpg', 'Comfortable Glasses', '<p><span style=\"font-size: 18pt;\"><strong>It\'s very beautiful cool glasses, you will like it cause of:</strong></span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">1. it\'s comfotable</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">2. hight quality</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">3.&nbsp;<strong><em><span style=\"color: #e74c3c;\">cheap price</span></em></strong></span></p>', 170, 50, 100, 10, 'glasses', 15),
(12, 'images/products/product12.jpg', 'Gunnar Glasses', '<p><span style=\"font-size: 18pt;\"><strong>it\'s&nbsp;<span style=\"color: #e74c3c;\">The Best</span>&nbsp;blue light-reducing Glasses for computer users &amp; gamers, you will like it cause of:</strong></span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">1. very comfortable</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">2. hight quality</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">3.&nbsp;<span style=\"color: #e74c3c;\">cheap price</span></span></p>', 250, 170, 300, 40, 'glasses', 12),
(13, 'images/products/product13.png', 'Amazing Sun-Glasses', '<p><span style=\"font-size: 18pt;\"><strong>it\'s&nbsp;<span style=\"color: #e74c3c;\">The Best</span>&nbsp;Sun-Glasses for every man &amp; women, you will like it cause of:</strong></span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">1. very comfortable</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">2. hight quality</span></p>\r\n<p style=\"padding-left: 40px;\"><span style=\"font-size: 18pt;\">3.&nbsp;<span style=\"color: #e74c3c;\">cheap price</span></span></p>', 170, 50, 150, 20, 'glasses', 12);

-- --------------------------------------------------------

--
-- Table structure for table `item_cat`
--

CREATE TABLE `item_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `cat_slug` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_cat`
--

INSERT INTO `item_cat` (`cat_id`, `cat_name`, `cat_slug`) VALUES
(1, 'watches', 'watches'),
(2, 'glasses', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_name` text NOT NULL,
  `order_email` text NOT NULL,
  `order_contact_number` text NOT NULL,
  `order_city` text NOT NULL,
  `order_delivery_address` text NOT NULL,
  `chk_session_ref` text NOT NULL,
  `chk_total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_name`, `order_email`, `order_contact_number`, `order_city`, `order_delivery_address`, `chk_session_ref`, `chk_total_price`) VALUES
(1, 'Sumaya Ali', 'susu-sy@outlook.sa', '0937823211', 'Damascus', 'Bab Toma', '2019-06-30 08:40:35_182534192', 1265),
(2, 'Sumaya Ali', 'samar@outlook.com', '0937823211', 'Damascus', 'bab toma', '2019-07-01 02:20:40_28277210', 1100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`chk_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `item_cat`
--
ALTER TABLE `item_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `chk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item_cat`
--
ALTER TABLE `item_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
