-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2019 at 01:41 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust_reg`
--

CREATE TABLE `cust_reg` (
  `cust_id` int(15) NOT NULL,
  `log_id` int(11) NOT NULL,
  `fname` char(30) NOT NULL,
  `lname` char(30) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `house` varchar(30) DEFAULT NULL,
  `town` char(30) DEFAULT NULL,
  `place` char(30) DEFAULT NULL,
  `district` char(30) DEFAULT NULL,
  `state` char(30) DEFAULT NULL,
  `pincode` bigint(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_reg`
--

INSERT INTO `cust_reg` (`cust_id`, `log_id`, `fname`, `lname`, `mobile`, `house`, `town`, `place`, `district`, `state`, `pincode`) VALUES
(1, 26, 'soho', 's', 9658558855, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 28, 'Sanju', 'S', 9631554488, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 29, 'Savio', 'S', 9658774488, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deal_addr`
--

CREATE TABLE `deal_addr` (
  `addr_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `town` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `district` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `pincode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_addr`
--

INSERT INTO `deal_addr` (`addr_id`, `deal_id`, `store_name`, `town`, `place`, `district`, `state`, `pincode`) VALUES
(1, 1, 'Qmart', '', 'pala', 'Kottayam', 'Kerala', 686558),
(6, 6, 'sam mart', 'pala', 'paika', 'Kottayam', 'Kerala', 686558),
(7, 7, 'jis', 'pala', 'paika', 'Kottayam', 'Kerala', 686558),
(8, 8, 'Tim Fmart', 'Paika', 'paika', 'Kottayam', 'Kerala', 686577);

-- --------------------------------------------------------

--
-- Table structure for table `deal_reg`
--

CREATE TABLE `deal_reg` (
  `deal_id` int(11) NOT NULL,
  `log_id` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `pan` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_reg`
--

INSERT INTO `deal_reg` (`deal_id`, `log_id`, `fname`, `lname`, `mobile`, `pan`) VALUES
(6, 24, 'sam', 's', 9658558855, 668855778855),
(7, 25, 'jis', 's', 9658558855, 54645435546435468),
(8, 27, 'tim', 't', 9688554488, 235544886966);

-- --------------------------------------------------------

--
-- Table structure for table `f_category`
--

CREATE TABLE `f_category` (
  `category_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_category`
--

INSERT INTO `f_category` (`category_id`, `c_name`) VALUES
(1, 'Bedroom'),
(7, 'Dining room'),
(8, 'Kitchen'),
(9, 'Drawing room');

-- --------------------------------------------------------

--
-- Table structure for table `f_type`
--

CREATE TABLE `f_type` (
  `type_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `t_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_type`
--

INSERT INTO `f_type` (`type_id`, `category_id`, `t_name`) VALUES
(2, 7, 'Dining Table'),
(4, 1, 'Bed'),
(5, 1, 'Bedroom Table'),
(6, 1, 'Bedroom Chair'),
(7, 7, 'Chair'),
(8, 9, 'Sofa'),
(9, 9, 'Chair'),
(10, 9, 'Tea table'),
(11, 8, 'Table'),
(12, 8, 'Chair');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `img`) VALUES
(1, '1555955922bgbg.jpg'),
(2, '1555956872');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` char(15) NOT NULL,
  `status` tinyint(5) NOT NULL DEFAULT '0',
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`log_id`, `email`, `password`, `usertype`, `status`, `approval`) VALUES
(5, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', 'admin', 1, 1),
(24, 'sam@gmail.com', 'ba0e7885b32f0b4b52c51de350069a2f', 'dealer', 1, 1),
(25, 'jis@gmail.com', '3dbaa307ab5b3c009e6f3908a6b3a30f', 'dealer', 1, 1),
(26, 'soho@gmail.com', '4eb7036648ac204bf09492503de0585e', 'customer', 1, 1),
(27, 'tim@gmail.com', '33ff20bae0a80ee0929226ee8dad931d', 'dealer', 0, 1),
(28, 'sanju@gmail.com', 'cb0d409b113e754ae98c02c92f02041f', 'customer', 1, 1),
(29, 'savio@gmail.com', '4e298bd40057dc09e2785fdeb35ac9fd', 'customer', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `name` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `name`) VALUES
(1, 'unblocked'),
(2, 'blocked'),
(3, 'approved'),
(4, 'not_approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `furniture_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(60) NOT NULL,
  `rate` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `furniture_id`, `cust_id`, `quantity`, `price`, `image`, `rate`, `name`) VALUES
(1, 5, 1, 1, 100, '15562508212.Fabric-Bed_2048x2048.jpeg', 0, 'Bed'),
(3, 3, 1, 4, 100, '1556186238download.jpg', 3000, ''),
(4, 3, 1, 4, 100, '1556186238download.jpg', 3000, ''),
(5, 7, 1, 1, 100, '1556515359aa.jpg', 4500, 'Dining table'),
(6, 1, 2, 1, 3000, '1556177290vn_470_Vanity_FA18.jpg', 3000, 'table'),
(7, 6, 1, 1, 1200, '1556344089product_500.jpg', 1200, 'chair');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colour`
--

CREATE TABLE `tbl_colour` (
  `colour_id` int(11) NOT NULL,
  `colour` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dimension`
--

CREATE TABLE `tbl_dimension` (
  `dim_id` int(11) NOT NULL,
  `furniture_id` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `depth` int(11) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dimension`
--

INSERT INTO `tbl_dimension` (`dim_id`, `furniture_id`, `height`, `width`, `depth`, `weight`) VALUES
(3, 2, 50, 60, 54, 20),
(4, 3, 50, 150, 137, 45),
(5, 4, 66, 55, 55, 12),
(6, 1, 180, 55, 45, 40),
(7, 2, 90, 150, 55, 80),
(8, 3, 59, 90, 55, 55),
(9, 4, 75, 45, 66, 15),
(10, 5, 172, 50, 50, 52),
(11, 6, 70, 45, 22, 10),
(12, 7, 100, 80, 52, 35),
(13, 8, 67, 45, 55, 10),
(14, 9, 68, 22, 56, 22),
(15, 10, 55, 33, 55, 10),
(16, 11, 60, 45, 25, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_furniture`
--

CREATE TABLE `tbl_furniture` (
  `furniture_id` int(11) NOT NULL,
  `deal_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_furniture`
--

INSERT INTO `tbl_furniture` (`furniture_id`, `deal_id`, `category_id`, `type_id`, `material_id`, `name`, `price`, `description`, `image`) VALUES
(1, 6, 1, 5, 3, 'table', 3000, 'bedroom table', '1556177290vn_470_Vanity_FA18.jpg'),
(2, 6, 7, 2, 3, 'Dining table', 4500, 'Wooden dining table', '1556186128dining-table.jpg'),
(3, 6, 1, 4, 3, 'Bed', 3000, 'Wooden bed', '1556186238download.jpg'),
(4, 6, 9, 8, 3, 'Sofa', 2500, 'Sofa for drawing room', '1556186360imageService.jpg'),
(5, 6, 1, 4, 3, 'Double coat', 65000, 'Best Bed in Town', '15562508212.Fabric-Bed_2048x2048.jpeg'),
(6, 6, 7, 7, 3, 'chair', 1200, 'Dining chair', '1556344089product_500.jpg'),
(7, 6, 7, 2, 3, 'Dining table', 4500, 'Wooden dining table for six seats.\r\n', '1556515359aa.jpg'),
(8, 8, 9, 9, 2, 'Chair', 1000, 'Plastic chair ideal for drawing room', '15565169Dinign_Chair_a_Coaster_83ad1181cd.jpg'),
(9, 6, 8, 11, 3, 'Kitchen table', 4550, 'Table ideal for kitchen', '1556614793yt.jpg'),
(10, 6, 8, 12, 2, 'Kitchen chair', 1000, 'Plastic chair for kitchen', '15566148Bright-green-kitchen-chairs-around-a-white-table.jpg'),
(11, 6, 1, 6, 3, 'Bedroom chair', 1500, 'Bedroom chair ', '1556615247imageService.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_image`
--

CREATE TABLE `tbl_image` (
  `img_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_image`
--

INSERT INTO `tbl_image` (`img_id`, `f_id`, `image`) VALUES
(1, 1, '1556177290sofa.jpg'),
(2, 2, '1556186128qwwee.jpg'),
(3, 3, '1556186238download.jpg'),
(4, 4, '1556186360imageService.jpg'),
(5, 5, '15562508212.Fabric-Bed_2048x2048.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `material_id` int(11) NOT NULL,
  `material` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`material_id`, `material`) VALUES
(2, 'Plastic'),
(3, 'wood'),
(4, 'Fiber');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `f_id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `f_id`, `number`) VALUES
(1, 1, 3),
(2, 2, 40),
(3, 3, 5),
(4, 4, 10),
(5, 5, 2),
(6, 6, 10),
(7, 7, 50),
(8, 8, 22),
(9, 9, 15),
(10, 10, 55),
(11, 11, 52);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cust_reg`
--
ALTER TABLE `cust_reg`
  ADD PRIMARY KEY (`cust_id`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `deal_addr`
--
ALTER TABLE `deal_addr`
  ADD PRIMARY KEY (`addr_id`),
  ADD KEY `deal_id` (`deal_id`);

--
-- Indexes for table `deal_reg`
--
ALTER TABLE `deal_reg`
  ADD PRIMARY KEY (`deal_id`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `f_category`
--
ALTER TABLE `f_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `f_type`
--
ALTER TABLE `f_type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  ADD PRIMARY KEY (`colour_id`);

--
-- Indexes for table `tbl_dimension`
--
ALTER TABLE `tbl_dimension`
  ADD PRIMARY KEY (`dim_id`),
  ADD KEY `furniture_id` (`furniture_id`);

--
-- Indexes for table `tbl_furniture`
--
ALTER TABLE `tbl_furniture`
  ADD PRIMARY KEY (`furniture_id`),
  ADD KEY `deal_id` (`deal_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `f_id` (`f_id`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `f_id` (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust_reg`
--
ALTER TABLE `cust_reg`
  MODIFY `cust_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deal_addr`
--
ALTER TABLE `deal_addr`
  MODIFY `addr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `deal_reg`
--
ALTER TABLE `deal_reg`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `f_category`
--
ALTER TABLE `f_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `f_type`
--
ALTER TABLE `f_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  MODIFY `colour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dimension`
--
ALTER TABLE `tbl_dimension`
  MODIFY `dim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_furniture`
--
ALTER TABLE `tbl_furniture`
  MODIFY `furniture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_image`
--
ALTER TABLE `tbl_image`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cust_reg`
--
ALTER TABLE `cust_reg`
  ADD CONSTRAINT `cust_reg_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `login` (`log_id`);

--
-- Constraints for table `deal_addr`
--
ALTER TABLE `deal_addr`
  ADD CONSTRAINT `deal_addr_ibfk_1` FOREIGN KEY (`deal_id`) REFERENCES `deal_reg` (`deal_id`);

--
-- Constraints for table `deal_reg`
--
ALTER TABLE `deal_reg`
  ADD CONSTRAINT `deal_reg_ibfk_1` FOREIGN KEY (`log_id`) REFERENCES `login` (`log_id`);

--
-- Constraints for table `f_type`
--
ALTER TABLE `f_type`
  ADD CONSTRAINT `f_type_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `f_category` (`category_id`);

--
-- Constraints for table `tbl_dimension`
--
ALTER TABLE `tbl_dimension`
  ADD CONSTRAINT `tbl_dimension_ibfk_1` FOREIGN KEY (`furniture_id`) REFERENCES `tbl_furniture` (`furniture_id`);

--
-- Constraints for table `tbl_furniture`
--
ALTER TABLE `tbl_furniture`
  ADD CONSTRAINT `tbl_furniture_ibfk_1` FOREIGN KEY (`deal_id`) REFERENCES `deal_reg` (`deal_id`),
  ADD CONSTRAINT `tbl_furniture_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `f_category` (`category_id`),
  ADD CONSTRAINT `tbl_furniture_ibfk_4` FOREIGN KEY (`type_id`) REFERENCES `f_type` (`type_id`),
  ADD CONSTRAINT `tbl_furniture_ibfk_5` FOREIGN KEY (`material_id`) REFERENCES `tbl_material` (`material_id`);

--
-- Constraints for table `tbl_image`
--
ALTER TABLE `tbl_image`
  ADD CONSTRAINT `tbl_image_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `tbl_furniture` (`furniture_id`);

--
-- Constraints for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD CONSTRAINT `tbl_stock_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `tbl_furniture` (`furniture_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
