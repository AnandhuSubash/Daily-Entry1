-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 01:19 PM
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
  `pincode` bigint(25) DEFAULT NULL,
  `addr_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_reg`
--

INSERT INTO `cust_reg` (`cust_id`, `log_id`, `fname`, `lname`, `mobile`, `house`, `town`, `place`, `district`, `state`, `pincode`, `addr_status`) VALUES
(1, 26, 'soho', 's', 9658558855, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 28, 'Sanju', 'S', 9631554488, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 29, 'Savio', 'S', 9658774488, NULL, NULL, NULL, NULL, NULL, NULL, 0);

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
  `district` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `pincode` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deal_addr`
--

INSERT INTO `deal_addr` (`addr_id`, `deal_id`, `store_name`, `town`, `place`, `district`, `state`, `pincode`) VALUES
(1, 6, 'Sams mart', 'pala', 'pala', 7, 13, 698588),
(2, 7, 'jis', 'pala', 'paika', 7, 13, 686558),
(3, 8, 'Tim fmart', 'pala', 'paika', 7, 13, 686558),
(4, 9, 'jeffshop', 'pala', 'paika', 7, 13, 686558);

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
(8, 27, 'tim', 't', 9688554488, 235544886966),
(9, 30, 'Jeffin', 'J', 9658774488, 644569885644);

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
(29, 'savio@gmail.com', '4e298bd40057dc09e2785fdeb35ac9fd', 'customer', 1, 1),
(30, 'jeffin@gmail.com', 'b4a7770882d0160b9f2dc0ccd15881f0', 'dealer', 1, 1);

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
(1, 5, 1, 4, 100, '15562508212.Fabric-Bed_2048x2048.jpeg', 400, 'Bed'),
(5, 7, 1, 2, 100, '1556515359aa.jpg', 200, 'Dining table'),
(22, 6, 2, 3, 1200, '1556344089product_500.jpg', 3600, 'chair'),
(23, 10, 2, 1, 1000, '15566148Bright-green-kitchen-chairs-around-a-white-table.jpg', 1000, 'Kitchen chair'),
(24, 12, 2, 2, 4500, '1557130682sofa.jpg', 4500, 'Sofa'),
(25, 11, 2, 2, 1500, '1556615247imageService.jpg', 1500, 'Bedroom chair'),
(26, 1, 1, 1, 3000, '1556177290vn_470_Vanity_FA18.jpg', 3000, 'table');

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
(16, 11, 60, 45, 25, 13),
(17, 12, 100, 85, 45, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `did` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL,
  `sid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`did`, `dname`, `sid`, `status`) VALUES
(5, 'Kasaragod', 13, 1),
(4, 'Kannur', 13, 1),
(3, 'Idukki', 13, 1),
(2, 'Ernakulam', 13, 1),
(1, 'Alappuzha', 13, 1),
(6, 'Kollam', 13, 1),
(7, 'Kottayam', 13, 1),
(8, 'Kozhikode', 13, 1),
(9, 'Malappuram', 13, 1),
(10, 'Palakkad', 13, 1),
(11, 'Pathanamthitta', 13, 1),
(12, 'Thiruvananthapuram', 13, 1),
(13, 'Thrissur', 13, 1),
(14, 'Wayanad', 13, 1),
(15, 'Bagalkot', 12, 1),
(16, 'Bangalore', 12, 1),
(17, 'Bangalore Rural', 12, 1),
(18, 'Belgaum', 12, 1),
(19, 'Bellary', 12, 1),
(20, 'Bidar', 12, 1),
(21, 'Bijapur', 12, 1),
(22, 'Chamarajanagar', 12, 1),
(23, 'Chikkaballapura', 12, 1),
(24, 'Chikmagalur', 12, 1),
(25, 'Chitradurga', 12, 1),
(26, 'Dakshina Kannada', 12, 1),
(27, 'Davanagere', 12, 1),
(28, 'Dharwad', 12, 1),
(29, 'Gadag', 12, 1),
(30, 'Gulbarga', 12, 1),
(31, 'Hassan', 12, 1),
(32, 'Haveri', 12, 1),
(33, 'Kodagu', 12, 1),
(34, 'Kolar', 12, 1),
(35, 'Koppal', 12, 1),
(36, 'Mandya', 12, 1),
(37, 'Mysore', 12, 1),
(38, 'Raichur', 12, 1),
(39, 'Ramanagara', 12, 1),
(40, 'Shimoga', 12, 1),
(41, 'Tumkur', 12, 1),
(42, 'Udupi', 12, 1),
(43, 'Uttara Kannada', 12, 1),
(44, 'Yadgir', 12, 1),
(45, 'Anantapur', 1, 1),
(46, 'Chittoor', 1, 1),
(47, 'East Godavari', 1, 1),
(48, 'Guntur', 1, 1),
(49, 'Krishna', 1, 1),
(50, 'Kurnool', 1, 1),
(51, 'Prakasam', 1, 1),
(52, 'Sri Potti Sriramulu Nellore', 1, 1),
(53, 'Srikakulam', 1, 1),
(54, 'Visakhapatnam', 1, 1),
(55, 'Vizianagaram', 1, 1),
(56, 'West Godavari', 1, 1),
(57, 'YSR (Kadapa)', 1, 1),
(58, 'Anjaw', 2, 1),
(59, 'Changlang', 2, 1),
(60, 'Dibang Valley', 2, 1),
(61, 'East Kameng', 2, 1),
(62, 'East Siang', 2, 1),
(63, 'Kurung Kumey', 2, 1),
(64, 'Lohit', 2, 1),
(65, 'Longding', 2, 1),
(66, 'Lower Dibang Valley', 2, 1),
(67, 'Lower Subansiri', 2, 1),
(68, 'Papum Pare', 2, 1),
(69, 'Tawang', 2, 1),
(70, 'Tirap', 2, 1),
(71, 'Upper Siang', 2, 1),
(72, 'Upper Subansiri', 2, 1),
(73, 'West Kameng', 2, 1),
(74, 'West Siang', 2, 1),
(75, 'Baksa', 3, 1),
(76, 'Barpeta', 3, 1),
(77, 'Bongaigaon', 3, 1),
(78, 'Cachar', 3, 1),
(79, 'Chirang', 3, 1),
(80, 'Darrang', 3, 1),
(81, 'Dhemaji', 3, 1),
(82, 'Dhubri', 3, 1),
(83, 'Dibrugarh', 3, 1),
(84, 'Dima Hasao', 3, 1),
(85, 'Goalpara', 3, 1),
(86, 'Golaghat', 3, 1),
(87, 'Hailakandi', 3, 1),
(88, 'Jorhat', 3, 1),
(89, 'Kamrup', 3, 1),
(90, 'Kamrup Metropolitan', 3, 1),
(91, 'Karbi Anglong', 3, 1),
(92, 'Karimganj', 3, 1),
(93, 'Kokrajhar', 3, 1),
(94, 'Lakhimpur', 3, 1),
(95, 'Morigaon', 3, 1),
(96, 'Nagaon', 3, 1),
(97, 'Nalbari', 3, 1),
(98, 'Sivasagar', 3, 1),
(99, 'Sonitpur', 3, 1),
(100, 'Tinsukia', 3, 1),
(101, 'Udalguri', 3, 1),
(102, 'Biswanath', 3, 1),
(103, 'Charaideo', 3, 1),
(104, 'Hojai', 3, 1),
(105, 'Majuli', 3, 1),
(106, 'South Salamara-Mankachar', 3, 1),
(107, 'West Karbi Anglong', 3, 1),
(108, 'Araria', 4, 1),
(109, 'Arwal', 4, 1),
(110, 'Aurangabad', 4, 1),
(111, 'Banka', 4, 1),
(112, 'Begusarai', 4, 1),
(113, 'Bhagalpur', 4, 1),
(114, 'Bhojpur', 4, 1),
(115, 'Buxar', 4, 1),
(116, 'Darbhanga', 4, 1),
(117, 'East Champaran', 4, 1),
(118, 'Gaya', 4, 1),
(119, 'Gopalganj', 4, 1),
(120, 'Jamui', 4, 1),
(121, 'Jehanabad', 4, 1),
(122, 'Kaimur', 4, 1),
(123, 'Katihar', 4, 1),
(124, 'Khagaria', 4, 1),
(125, 'Kishanganj', 4, 1),
(126, 'Lakhisarai', 4, 1),
(127, 'Madhepura', 4, 1),
(128, 'Madhubani', 4, 1),
(129, 'Munger', 4, 1),
(130, 'Muzaffarpur', 4, 1),
(131, 'Nalanda', 4, 1),
(132, 'Nawada', 4, 1),
(133, 'Patna', 4, 1),
(134, 'Purnia', 4, 1),
(135, 'Rohtas', 4, 1),
(136, 'Saharsa', 4, 1),
(137, 'Samastipur', 4, 1),
(138, 'Saran', 4, 1),
(139, 'Sheikhpura', 4, 1),
(140, 'Sheohar', 4, 1),
(141, 'Sitamarhi', 4, 1),
(142, 'Siwan', 4, 1),
(143, 'Supaul', 4, 1),
(144, 'Vaishali', 4, 1),
(145, 'West Champaran', 4, 1),
(146, 'Balod', 5, 1),
(147, 'Baloda Bazar', 5, 1),
(148, 'Balrampur', 5, 1),
(149, 'Bastar', 5, 1),
(150, 'Bemetara', 5, 1),
(151, 'Bijapur', 5, 1),
(152, 'Bilaspur', 5, 1),
(153, 'Dantewada', 5, 1),
(154, 'Dhamtari', 5, 1),
(155, 'Durg', 5, 1),
(156, 'Gariaband', 5, 1),
(157, 'Janjgir Champa', 5, 1),
(158, 'Jashpur', 5, 1),
(159, 'Kabirdham', 5, 1),
(160, 'Kanker', 5, 1),
(161, 'Kondagaon', 5, 1),
(162, 'Korba', 5, 1),
(163, 'Koriya', 5, 1),
(164, 'Mahasamund', 5, 1),
(165, 'Mungeli', 5, 1),
(166, 'Narayanpur', 5, 1),
(167, 'Raigarh', 5, 1),
(168, 'Raipur', 5, 1),
(169, 'Rajnandgaon', 5, 1),
(170, 'Sukma', 5, 1),
(171, 'Surajpur', 5, 1),
(172, 'Surguja', 5, 1),
(173, 'North Goa', 6, 1),
(174, 'South Goa', 6, 1),
(175, 'Ahmedabad', 7, 1),
(176, 'Amreli', 7, 1),
(177, 'Anand', 7, 1),
(178, 'Aravalli', 7, 1),
(179, 'Banaskantha', 7, 1),
(180, 'Botad', 7, 1),
(181, 'Bharuch', 7, 1),
(182, 'Bhavnagar', 7, 1),
(183, 'Chhota Udaipur', 7, 1),
(184, 'Dahod', 7, 1),
(185, 'Devbhoomi Dwarka', 7, 1),
(186, 'Gandhinagar', 7, 1),
(187, 'Gir Somnath', 7, 1),
(188, 'Jamnagar', 7, 1),
(189, 'Junagadh', 7, 1),
(190, 'Kheda', 7, 1),
(191, 'Kutch', 7, 1),
(192, 'Mahisagar', 7, 1),
(193, 'Mahesana', 7, 1),
(194, 'Morbi', 7, 1),
(195, 'Narmada', 7, 1),
(196, 'Navsari', 7, 1),
(197, 'Panchmahal', 7, 1),
(198, 'Patan', 7, 1),
(199, 'Porbandar', 7, 1),
(200, 'Rajkot', 7, 1),
(201, 'Sabarkantha', 7, 1),
(202, 'Surat', 7, 1),
(203, 'Surendranagar', 7, 1),
(204, 'Tapi', 7, 1),
(205, 'The Dangs', 7, 1),
(206, 'Vadodara', 7, 1),
(207, 'Valsad', 7, 1),
(208, 'Ambala', 8, 1),
(209, 'Bhiwani', 8, 1),
(210, 'Faridabad', 8, 1),
(211, 'Fatehabad', 8, 1),
(212, 'Gurgaon', 8, 1),
(213, 'Hisar', 8, 1),
(214, 'Jhajjar', 8, 1),
(215, 'Jind', 8, 1),
(216, 'Kaithal', 8, 1),
(217, 'Karnal', 8, 1),
(218, 'Kurukshetra', 8, 1),
(219, 'Mahendragarh', 8, 1),
(220, 'Mewat', 8, 1),
(221, 'Palwal', 8, 1),
(222, 'Panchkula', 8, 1),
(223, 'Panipat', 8, 1),
(224, 'Rewari', 8, 1),
(225, 'Rohtak', 8, 1),
(226, 'Sirsa', 8, 1),
(227, 'Sonipat', 8, 1),
(228, 'Yamunanagar', 8, 1),
(229, 'Charkhi Dadri', 8, 1),
(230, 'Bilaspur', 9, 1),
(231, 'Chamba', 9, 1),
(232, 'Hamirpur', 9, 1),
(233, 'Kangra', 9, 1),
(234, 'Kinnaur', 9, 1),
(235, 'Kullu', 9, 1),
(236, 'Lahaul and Spiti', 9, 1),
(237, 'Mandi', 9, 1),
(238, 'Shimla', 9, 1),
(239, 'Sirmaur', 9, 1),
(240, 'Solan', 9, 1),
(241, 'Una', 9, 1),
(242, 'Anantnag', 10, 1),
(243, 'Badgam', 10, 1),
(244, 'Bandipora', 10, 1),
(245, 'Baramulla', 10, 1),
(246, 'Doda', 10, 1),
(247, 'Ganderbal', 10, 1),
(248, 'Jammu', 10, 1),
(249, 'Kargil', 10, 1),
(250, 'Kathua', 10, 1),
(251, 'Kishtwar', 10, 1),
(252, 'Kulgam', 10, 1),
(253, 'Kupwara', 10, 1),
(254, 'Leh', 10, 1),
(255, 'Poonch', 10, 1),
(256, 'Pulwama', 10, 1),
(257, 'Rajouri', 10, 1),
(258, 'Ramban', 10, 1),
(259, 'Reasi', 10, 1),
(260, 'Samba', 10, 1),
(261, 'Shopian', 10, 1),
(262, 'Srinagar', 10, 1),
(263, 'Udhampur', 10, 1),
(264, 'Bokaro', 11, 1),
(265, 'Chatra', 11, 1),
(266, 'Deoghar', 11, 1),
(267, 'Dhanbad', 11, 1),
(268, 'Dumka', 11, 1),
(269, 'East Singhbhum', 11, 1),
(270, 'Garhwa', 11, 1),
(271, 'Giridih', 11, 1),
(272, 'Godda', 11, 1),
(273, 'Gumla', 11, 1),
(274, 'Hazaribagh', 11, 1),
(275, 'Jamtara', 11, 1),
(276, 'Khunti', 11, 1),
(277, 'Koderma', 11, 1),
(278, 'Latehar', 11, 1),
(279, 'Lohardaga', 11, 1),
(280, 'Pakur', 11, 1),
(281, 'Palamu', 11, 1),
(282, 'Ramgarh', 11, 1),
(283, 'Ranchi', 11, 1),
(284, 'Sahibganj', 11, 1),
(285, 'Saraikela Kharsawan', 11, 1),
(286, 'Simdega', 11, 1),
(287, 'West Singhbhum', 11, 1),
(288, 'Agar Malwa', 14, 1),
(289, 'Alirajpur', 14, 1),
(290, 'Anuppur', 14, 1),
(291, 'Ashoknagar', 14, 1),
(292, 'Balaghat', 14, 1),
(293, 'Barwani', 14, 1),
(294, 'Betul', 14, 1),
(295, 'Bhind', 14, 1),
(296, 'Bhopal', 14, 1),
(297, 'Burhanpur', 14, 1),
(298, 'Chhatarpur', 14, 1),
(299, 'Chhindwara', 14, 1),
(300, 'Damoh', 14, 1),
(301, 'Datia', 14, 1),
(302, 'Dewas', 14, 1),
(303, 'Dhar', 14, 1),
(304, 'Dindori', 14, 1),
(305, 'East Nimar', 14, 1),
(306, 'Guna', 14, 1),
(307, 'Gwalior', 14, 1),
(308, 'Harda', 14, 1),
(309, 'Hoshangabad', 14, 1),
(310, 'Indore', 14, 1),
(311, 'Jabalpur', 14, 1),
(312, 'Jhabua', 14, 1),
(313, 'Katni', 14, 1),
(314, 'Mandla', 14, 1),
(315, 'Mandsaur', 14, 1),
(316, 'Morena', 14, 1),
(317, 'Narsinghpur', 14, 1),
(318, 'Neemuch', 14, 1),
(319, 'Panna', 14, 1),
(320, 'Raisen', 14, 1),
(321, 'Rajgarh', 14, 1),
(322, 'Ratlam', 14, 1),
(323, 'Rewa', 14, 1),
(324, 'Sagar', 14, 1),
(325, 'Satna', 14, 1),
(326, 'Sehore', 14, 1),
(327, 'Seoni', 14, 1),
(328, 'Shahdol', 14, 1),
(329, 'Shajapur', 14, 1),
(330, 'Sheopur', 14, 1),
(331, 'Shivpuri', 14, 1),
(332, 'Sidhi', 14, 1),
(333, 'Singrauli', 14, 1),
(334, 'Tikamgarh', 14, 1),
(335, 'Ujjain', 14, 1),
(336, 'Umaria', 14, 1),
(337, 'Vidisha', 14, 1),
(338, 'West Nimar', 14, 1),
(339, 'Ahmednagar', 15, 1),
(340, 'Akola', 15, 1),
(341, 'Amravati', 15, 1),
(342, 'Aurangabad', 15, 1),
(343, 'Beed', 15, 1),
(344, 'Bhandara', 15, 1),
(345, 'Buldhana', 15, 1),
(346, 'Chandrapur', 15, 1),
(347, 'Dhule', 15, 1),
(348, 'Gadchiroli', 15, 1),
(349, 'Gondia', 15, 1),
(350, 'Hingoli', 15, 1),
(351, 'Jalgaon', 15, 1),
(352, 'Jalna', 15, 1),
(353, 'Kolhapur', 15, 1),
(354, 'Latur', 15, 1),
(355, 'Mumbai City', 15, 1),
(356, 'Mumbai Suburban', 15, 1),
(357, 'Nagpur', 15, 1),
(358, 'Nanded', 15, 1),
(359, 'Nandurbar', 15, 1),
(360, 'Nashik', 15, 1),
(361, 'Osmanabad', 15, 1),
(362, 'Parbhani', 15, 1),
(363, 'Pune', 15, 1),
(364, 'Raigad', 15, 1),
(365, 'Ratnagiri', 15, 1),
(366, 'Sangli', 15, 1),
(367, 'Satara', 15, 1),
(368, 'Sindhudurg', 15, 1),
(369, 'Solapur', 15, 1),
(370, 'Thane', 15, 1),
(371, 'Wardha', 15, 1),
(372, 'Washim', 15, 1),
(373, 'Yavatmal', 15, 1),
(374, 'Palghar', 15, 1),
(375, 'Bishnupur', 16, 1),
(376, 'Chandel', 16, 1),
(377, 'Churachandpur', 16, 1),
(378, 'Imphal East', 16, 1),
(379, 'Imphal West', 16, 1),
(380, 'Senapati', 16, 1),
(381, 'Tamenglong', 16, 1),
(382, 'Thoubal', 16, 1),
(383, 'Ukhrul', 16, 1),
(384, 'Jiribam', 16, 1),
(385, 'Kangpokpi', 16, 1),
(386, 'Kakching district', 16, 1),
(387, 'Tengnoupal', 16, 1),
(388, 'Kamjong', 16, 1),
(389, 'Noney', 16, 1),
(390, 'Pherzawl', 16, 1),
(391, 'East Garo Hills', 17, 1),
(392, 'West Garo Hills', 17, 1),
(393, 'North Garo Hills', 17, 1),
(394, 'South Garo Hills', 17, 1),
(395, 'South West Garo Hills', 17, 1),
(396, 'East Jaintia Hills', 17, 1),
(397, 'West Jaintia Hills', 17, 1),
(398, 'East Khasi Hills', 17, 1),
(399, 'South West Khasi Hills', 17, 1),
(400, 'West Khasi Hills', 17, 1),
(401, 'Ri-Bhoi', 17, 1),
(402, 'Aizawl', 18, 1),
(403, 'Champhai', 18, 1),
(404, 'Kolasib', 18, 1),
(405, 'Lawngtlai', 18, 1),
(406, 'Lunglei', 18, 1),
(407, 'Mamit', 18, 1),
(408, 'Saiha', 18, 1),
(409, 'Serchhip', 18, 1),
(410, 'Dimapur', 19, 1),
(411, 'Kiphire', 19, 1),
(412, 'Kohima', 19, 1),
(413, 'Longleng', 19, 1),
(414, 'Mokokchung', 19, 1),
(415, 'Mon', 19, 1),
(416, 'Peren', 19, 1),
(417, 'Phek', 19, 1),
(418, 'Tuensang', 19, 1),
(419, 'Wokha', 19, 1),
(420, 'Zunheboto', 19, 1),
(421, 'Angul', 20, 1),
(422, 'Balangir', 20, 1),
(423, 'Baleshwar', 20, 1),
(424, 'Bargarh', 20, 1),
(425, 'Bhadrak', 20, 1),
(426, 'Boudh', 20, 1),
(427, 'Cuttack', 20, 1),
(428, 'Debagarh', 20, 1),
(429, 'Dhenkanal', 20, 1),
(430, 'Gajapati', 20, 1),
(431, 'Ganjam', 20, 1),
(432, 'Jagatsinghpur', 20, 1),
(433, 'Jajpur', 20, 1),
(434, 'Jharsuguda', 20, 1),
(435, 'Kalahandi', 20, 1),
(436, 'Kandhamal', 20, 1),
(437, 'Kendrapara', 20, 1),
(438, 'Kendujhar', 20, 1),
(439, 'Khordha', 20, 1),
(440, 'Koraput', 20, 1),
(441, 'Malkangiri', 20, 1),
(442, 'Mayurbhanj', 20, 1),
(443, 'Nabarangapur', 20, 1),
(444, 'Nayagarh', 20, 1),
(445, 'Nuapada', 20, 1),
(446, 'Puri', 20, 1),
(447, 'Rayagada', 20, 1),
(448, 'Sambalpur', 20, 1),
(449, 'Subarnapur', 20, 1),
(450, 'Sundergarh', 20, 1),
(451, 'Amritsar', 21, 1),
(452, 'Barnala', 21, 1),
(453, 'Bathinda', 21, 1),
(454, 'Fazilka', 21, 1),
(455, 'Faridkot', 21, 1),
(456, 'Fatehgarh Sahib', 21, 1),
(457, 'Firozpur', 21, 1),
(458, 'Gurdaspur', 21, 1),
(459, 'Hoshiarpur', 21, 1),
(460, 'Jalandhar', 21, 1),
(461, 'Kapurthala', 21, 1),
(462, 'Ludhiana', 21, 1),
(463, 'Mansa', 21, 1),
(464, 'Moga', 21, 1),
(465, 'Mohali', 21, 1),
(466, 'Muktsar', 21, 1),
(467, 'Pathankot', 21, 1),
(468, 'Patiala', 21, 1),
(469, 'Rupnagar', 21, 1),
(470, 'Sangrur', 21, 1),
(471, 'Shahid Bhagat Singh Nagar', 21, 1),
(472, 'Tarn Taran', 21, 1),
(473, 'Ajmer', 22, 1),
(474, 'Alwar', 22, 1),
(475, 'Banswara', 22, 1),
(476, 'Baran', 22, 1),
(477, 'Barmer', 22, 1),
(478, 'Bharatpur', 22, 1),
(479, 'Bhilwara', 22, 1),
(480, 'Bikaner', 22, 1),
(481, 'Bundi', 22, 1),
(482, 'Chittaurgarh', 22, 1),
(483, 'Churu', 22, 1),
(484, 'Dausa', 22, 1),
(485, 'Dhaulpur', 22, 1),
(486, 'Dungarpur', 22, 1),
(487, 'Ganganagar', 22, 1),
(488, 'Hanumangarh', 22, 1),
(489, 'Jaipur', 22, 1),
(490, 'Jaisalmer', 22, 1),
(491, 'Jalor', 22, 1),
(492, 'Jhalawar', 22, 1),
(493, 'Jhunjhunun', 22, 1),
(494, 'Jodhpur', 22, 1),
(495, 'Karauli', 22, 1),
(496, 'Kota', 22, 1),
(497, 'Nagaur', 22, 1),
(498, 'Pali', 22, 1),
(499, 'Pratapgarh', 22, 1),
(500, 'Rajsamand', 22, 1),
(501, 'Sawai Madhopur', 22, 1),
(502, 'Sikar', 22, 1),
(503, 'Sirohi', 22, 1),
(504, 'Tonk', 22, 1),
(505, 'Udaipur', 22, 1),
(506, 'East Sikkim', 23, 1),
(507, 'North Sikkim', 23, 1),
(508, 'South Sikkim', 23, 1),
(509, 'West Sikkim', 23, 1),
(510, 'Ariyalur', 24, 1),
(511, 'Chennai', 24, 1),
(512, 'Coimbatore', 24, 1),
(513, 'Cuddalore', 24, 1),
(514, 'Dharmapuri', 24, 1),
(515, 'Dindigul', 24, 1),
(516, 'Erode', 24, 1),
(517, 'Kanchipuram', 24, 1),
(518, 'Kanyakumari', 24, 1),
(519, 'Karur', 24, 1),
(520, 'Krishnagiri', 24, 1),
(521, 'Madurai', 24, 1),
(522, 'Nagapattinam', 24, 1),
(523, 'Namakkal', 24, 1),
(524, 'Perambalur', 24, 1),
(525, 'Pudukkottai', 24, 1),
(526, 'Ramanathapuram', 24, 1),
(527, 'Salem', 24, 1),
(528, 'Sivaganga', 24, 1),
(529, 'Thanjavur', 24, 1),
(530, 'The Nilgiris', 24, 1),
(531, 'Theni', 24, 1),
(532, 'Thiruvallur', 24, 1),
(533, 'Thiruvarur', 24, 1),
(534, 'Thoothukudi', 24, 1),
(535, 'Tiruchirappalli', 24, 1),
(536, 'Tirunelveli', 24, 1),
(537, 'Tirupur', 24, 1),
(538, 'Tiruvannamalai', 24, 1),
(539, 'Vellore', 24, 1),
(540, 'Viluppuram', 24, 1),
(541, 'Virudhunagar', 24, 1),
(542, 'Dhalai', 26, 1),
(543, 'Gomati', 26, 1),
(544, 'Khowai', 26, 1),
(545, 'North Tripura', 26, 1),
(546, 'Sepahijala', 26, 1),
(547, 'South Tripura', 26, 1),
(548, 'Unakoti', 26, 1),
(549, 'West Tripura', 26, 1),
(550, 'Agra', 27, 1),
(551, 'Aligarh', 27, 1),
(552, 'Allahabad', 27, 1),
(553, 'Ambedkar Nagar', 27, 1),
(554, 'Amethi', 27, 1),
(555, 'Amroha', 27, 1),
(556, 'Auraiya', 27, 1),
(557, 'Azamgarh', 27, 1),
(558, 'Baghpat', 27, 1),
(559, 'Bahraich', 27, 1),
(560, 'Ballia', 27, 1),
(561, 'Balrampur', 27, 1),
(562, 'Banda', 27, 1),
(563, 'Barabanki', 27, 1),
(564, 'Bareilly', 27, 1),
(565, 'Basti', 27, 1),
(566, 'Bijnor', 27, 1),
(567, 'Budaun', 27, 1),
(568, 'Bulandshahr', 27, 1),
(569, 'Chandauli', 27, 1),
(570, 'Chitrakoot', 27, 1),
(571, 'Deoria', 27, 1),
(572, 'Etah', 27, 1),
(573, 'Etawah', 27, 1),
(574, 'Faizabad', 27, 1),
(575, 'Farrukhabad', 27, 1),
(576, 'Fatehpur', 27, 1),
(577, 'Firozabad', 27, 1),
(578, 'Gautam Buddha Nagar', 27, 1),
(579, 'Ghaziabad', 27, 1),
(580, 'Ghazipur', 27, 1),
(581, 'Gonda', 27, 1),
(582, 'Gorakhpur', 27, 1),
(583, 'Hamirpur', 27, 1),
(584, 'Hardoi', 27, 1),
(585, 'Hathras (Mahamaya Nagar)', 27, 1),
(586, 'Jalaun', 27, 1),
(587, 'Jaunpur', 27, 1),
(588, 'Jhansi', 27, 1),
(589, 'Jyotiba Phule Nagar', 27, 1),
(590, 'Kannauj', 27, 1),
(591, 'Kanpur Dehat (Ramabai Nagar)', 27, 1),
(592, 'Kanpur Nagar', 27, 1),
(593, 'Kanshiram Nagar', 27, 1),
(594, 'Kaushambi', 27, 1),
(595, 'Kheri', 27, 1),
(596, 'Kushinagar', 27, 1),
(597, 'Lalitpur', 27, 1),
(598, 'Lucknow', 27, 1),
(599, 'Maharajganj', 27, 1),
(600, 'Mahoba', 27, 1),
(601, 'Mainpuri', 27, 1),
(602, 'Mathura', 27, 1),
(603, 'Mau', 27, 1),
(604, 'Meerut', 27, 1),
(605, 'Mirzapur', 27, 1),
(606, 'Moradabad', 27, 1),
(607, 'Muzaffarnagar', 27, 1),
(608, 'Panchsheel Nagar district (Hapur)', 27, 1),
(609, 'Pilibhit', 27, 1),
(610, 'Pratapgarh', 27, 1),
(611, 'Raebareli', 27, 1),
(612, 'Rampur', 27, 1),
(613, 'Saharanpur', 27, 1),
(614, 'Sant Kabir Nagar', 27, 1),
(615, 'Sant Ravidas Nagar', 27, 1),
(616, 'Shahjahanpur', 27, 1),
(617, 'Shamli', 27, 1),
(618, 'Shravasti', 27, 1),
(619, 'Siddharthnagar', 27, 1),
(620, 'Sitapur', 27, 1),
(621, 'Sonbhadra', 27, 1),
(622, 'Sultanpur', 27, 1),
(623, 'Unnao', 27, 1),
(624, 'Varanasi', 27, 1),
(625, 'Almora', 28, 1),
(626, 'Bageshwar', 28, 1),
(627, 'Chamoli', 28, 1),
(628, 'Champawat', 28, 1),
(629, 'Dehradun', 28, 1),
(630, 'Haridwar', 28, 1),
(631, 'Nainital', 28, 1),
(632, 'Pauri Garhwal', 28, 1),
(633, 'Pithoragarh', 28, 1),
(634, 'Rudraprayag', 28, 1),
(635, 'Tehri Garhwal', 28, 1),
(636, 'Udham Singh Nagar', 28, 1),
(637, 'Uttarkashi', 28, 1),
(638, 'Bankura', 29, 1),
(639, 'Bardhaman', 29, 1),
(640, 'Birbhum', 29, 1),
(641, 'Cooch Behar', 29, 1),
(642, 'Dakshin Dinajpur', 29, 1),
(643, 'Darjeeling', 29, 1),
(644, 'Hooghly', 29, 1),
(645, 'Howrah', 29, 1),
(646, 'Jalpaiguri', 29, 1),
(647, 'Kolkata', 29, 1),
(648, 'Malda', 29, 1),
(649, 'Murshidabad', 29, 1),
(650, 'Nadia', 29, 1),
(651, 'North 24 Parganas', 29, 1),
(652, 'Paschim Medinipur', 29, 1),
(653, 'Purba Medinipur', 29, 1),
(654, 'Purulia', 29, 1),
(655, 'South 24 Parganas', 29, 1),
(656, 'Uttar Dinajpur', 29, 1),
(657, 'Alipurduar', 29, 1),
(658, 'Burdwan', 29, 1),
(659, 'Jhargram', 29, 1),
(660, 'Kalimpong', 29, 1),
(661, 'West Burdwan', 29, 1),
(662, 'Adilabad', 25, 1),
(663, 'Bhadradri Kothagudem', 25, 1),
(664, 'Hyderabad', 25, 1),
(665, 'Jagtial', 25, 1),
(666, 'Jangaon', 25, 1),
(667, 'Jayashankar Bhupalpally', 25, 1),
(668, 'Jogulamba Gadwal', 25, 1),
(669, 'Kamareddy', 25, 1),
(670, 'Karimnagar', 25, 1),
(671, 'Khammam', 25, 1),
(672, 'Kumuram Bheem', 25, 1),
(673, 'Mahabubabad', 25, 1),
(674, 'Mahabubnagar', 25, 1),
(675, 'Mancherial', 25, 1),
(676, 'Medak', 25, 1),
(677, 'Medchal', 25, 1),
(678, 'Mulugu', 25, 1),
(679, 'Nagarkurnool', 25, 1),
(680, 'Nalgonda', 25, 1),
(681, 'Narayanpet', 25, 1),
(682, 'Nirmal', 25, 1),
(683, 'Nizamabad', 25, 1),
(684, 'Peddapalli', 25, 1),
(685, 'Rajanna Sircilla', 25, 1),
(686, 'Rangareddy', 25, 1),
(687, 'Sangareddy', 25, 1),
(688, 'Siddipet', 25, 1),
(689, 'Suryapet', 25, 1),
(690, 'Vikarabad', 25, 1),
(691, 'Wanaparthy', 25, 1),
(692, 'Warangal (Rural)', 25, 1),
(693, 'Warangal (Urban)', 25, 1),
(694, 'Yadadri Bhuvanagiri', 25, 1);

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
(11, 6, 1, 6, 3, 'Bedroom chair', 1500, 'Bedroom chair ', '1556615247imageService.jpg'),
(12, 6, 9, 9, 3, 'Sofa', 4500, 'White colour sofa made with teak wood with fine cusion ', '1557130682sofa.jpg');

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
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int(11) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `sname`, `status`) VALUES
(1, 'Andhra Pradesh', '1'),
(2, 'Arunachal Pradesh', '1'),
(3, 'Assam', '1'),
(4, 'Bihar', '1'),
(5, 'Chhattisgarh', '1'),
(6, 'Goa', '1'),
(7, 'Gujarat', '1'),
(8, 'Haryana', '1'),
(9, 'Himachal Pradesh', '1'),
(10, 'Jammu and Kashmir', '1'),
(11, 'Jharkhand', '1'),
(12, 'Karnataka', '1'),
(13, 'Kerala', '1'),
(14, 'Madhya Pradesh', '1'),
(15, 'Maharashtra', '1'),
(16, 'Manipur', '1'),
(17, 'Meghalaya', '1'),
(18, 'Mizoram', '1'),
(19, 'Nagaland', '1'),
(20, 'Odisha', '1'),
(21, 'Punjab', '1'),
(22, 'Rajasthan', '1'),
(23, 'Sikkim', '1'),
(24, 'Tamil Nadu', '1'),
(25, 'Telangana', '1'),
(26, 'Tripura', '1'),
(27, 'Uttar Pradesh', '1'),
(28, 'Uttarakhand', '1'),
(29, 'West Bengal', '1');

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
(11, 11, 52),
(12, 12, 6);

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
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`did`);

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
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `addr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `deal_reg`
--
ALTER TABLE `deal_reg`
  MODIFY `deal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `log_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  MODIFY `colour_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dimension`
--
ALTER TABLE `tbl_dimension`
  MODIFY `dim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;

--
-- AUTO_INCREMENT for table `tbl_furniture`
--
ALTER TABLE `tbl_furniture`
  MODIFY `furniture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
