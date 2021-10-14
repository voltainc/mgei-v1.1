-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2021 at 08:00 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majanghm_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `days` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `account` varchar(100) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`id`, `name`, `address`, `account`, `company`, `created_by`, `salt`, `reg_date`) VALUES
(1, 'MAJAN GLOBAL ENTERPRISES', 'MEETAQ BANK', '0612001998130001', 1, 1, '2hoGaFL1rLCBGLh', '2020-02-23 08:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `clerk`
--

CREATE TABLE `clerk` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clerk`
--

INSERT INTO `clerk` (`id`, `username`, `password`, `reg_date`) VALUES
(1, 'admin', 'admin', '2020-02-17 07:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `clerk_wh`
--

CREATE TABLE `clerk_wh` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `owner` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `prefix` varchar(10) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `cr` varchar(100) NOT NULL,
  `other_gsm` varchar(100) NOT NULL,
  `created_by` int(11) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `owner`, `address`, `phone`, `prefix`, `fax`, `cr`, `other_gsm`, `created_by`, `salt`, `reg_date`) VALUES
(1, 'MAJAN GLOBAL ENTERPRISES', 'HAMOOD SALEH RASHID AL KINDI', 'P.O BOX: 1262, POSTAL CODE: 611, KIRSHA SANAIYA, NIZWA, SULTANATE OF OMAN', '25437642', 'MAJAN GLOB', '', '1010827', '97991727', 1, '3XgGyZSg1cquFkV', '2020-02-23 08:46:16'),
(2, 'Majan Global Enterprises ( DRM Panel )', 'Hamood Al Kindi', 'Karsha', '99453884', 'UPVC Doors', '25431911', '1010826', '95725468', 1, 'PlzlWkdlZf64UyO', '2021-10-11 12:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `email` text NOT NULL,
  `customer_company` text NOT NULL,
  `remarks` text NOT NULL,
  `salt` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `company`, `created_by`, `name`, `address`, `phone`, `fax`, `email`, `customer_company`, `remarks`, `salt`, `status`, `reg_date`) VALUES
(1, 1, 1, 'General', '', 12345678, 0, '', '', '', 'lYFDj', 1, '2020-07-15 07:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` int(11) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `visa_date` date NOT NULL,
  `visa_expire` date DEFAULT NULL,
  `dob` date NOT NULL,
  `joined` date NOT NULL,
  `cid` varchar(100) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `insurance_date` date NOT NULL,
  `insurance_expire` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `place` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `amount` float NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grouping`
--

CREATE TABLE `grouping` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouping`
--

INSERT INTO `grouping` (`id`, `company`, `created_by`, `name`, `qty`, `status`, `reg_date`) VALUES
(1, 1, 1, 'Sash', 1, 0, '2020-07-15 03:06:04'),
(2, 1, 1, '3D Hindges (Black)', 1, 0, '2020-07-15 04:15:47'),
(3, 1, 1, '3D Hindges', 1, 0, '2020-07-15 15:18:17'),
(4, 1, 1, 'Dozen', 12, 1, '2020-07-21 03:24:26'),
(5, 1, 1, 'single piece', 1, 1, '2020-07-26 02:04:36'),
(6, 1, 1, 'PACKET', 4, 1, '2020-07-26 02:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `volume` float NOT NULL,
  `unit` int(11) NOT NULL,
  `price_per_unit` float NOT NULL,
  `sale_item_desc` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `company`, `created_by`, `name`, `quantity`, `volume`, `unit`, `price_per_unit`, `sale_item_desc`, `status`, `reg_date`) VALUES
(1, 1, 1, 'Sash', 11, 6, 1, 1, NULL, 0, '2020-07-15 08:20:54'),
(2, 1, 1, '3D Hindges', 50, 100, 2, 3, NULL, 0, '2020-07-15 08:20:48'),
(3, 1, 1, '3D Hindges', 200, 1, 2, 3, NULL, 0, '2020-07-15 08:23:24'),
(4, 1, 1, '3D Hindges ', 655, 1, 2, 3, NULL, 0, '2020-07-20 08:11:45'),
(5, 1, 1, '3D Hindges ', 200, 1, 2, 3.1, NULL, 0, '2020-07-20 08:11:41'),
(6, 1, 1, '3D Hindges ', 100, 1, 2, 2.6, NULL, 0, '2020-07-20 08:11:04'),
(7, 1, 1, '3D Hindges ', 10, 1, 2, 12, NULL, 0, '2020-07-15 19:16:19'),
(8, 1, 1, 'a b c', 1, 1, 3, 1, NULL, 0, '2020-07-15 19:16:27'),
(9, 1, 1, '3D Hindges ', 1, 1, 3, 1, NULL, 0, '2020-07-15 19:16:23'),
(10, 1, 1, '1111111 eee', 1, 1, 3, 1, NULL, 0, '2020-07-15 19:17:39'),
(11, 1, 1, 'L', 11, 1, 2, 11, NULL, 0, '2020-07-15 19:55:04'),
(12, 1, 1, '1111111119', 1, 1, 3, 1, NULL, 0, '2020-07-15 19:54:54'),
(13, 1, 1, '11111111119', 11, 1, 3, 1, NULL, 0, '2020-07-15 19:54:49'),
(14, 1, 1, '11111111111', 2, 1, 3, 1, NULL, 0, '2020-07-15 19:55:01'),
(15, 1, 1, '11111111111', 1, 1, 3, 1, NULL, 0, '2020-07-15 19:54:58'),
(16, 1, 1, 'Door Handle', 138, 25, 3, 2, NULL, 0, '2020-07-20 08:11:33'),
(17, 1, 1, '3D Hindges ', 100, 24, 3, 3, NULL, 0, '2020-07-20 08:11:09'),
(18, 1, 1, '3D hinges (', 12, 1, 2, 3, '', 0, '2020-07-20 08:10:52'),
(19, 1, 1, '3D Hinges', 12, 1, 2, 33, '', 0, '2020-07-20 08:10:59'),
(20, 1, 1, 'www', 1, 1, 3, 1, '', 0, '2020-07-20 08:10:26'),
(21, 1, 1, 'qq', 1, 1, 3, 1, '', 0, '2020-07-20 08:13:27'),
(22, 1, 1, '3D hinges', 100, 1, 2, 3, 'BLACK', 0, '2020-07-26 06:43:55'),
(23, 1, 1, 'Glass Packi', 21, 21000, 2, 0, '', 0, '2020-07-26 06:28:47'),
(24, 1, 1, 'Glass Packi', 21, 21000, 2, 0, '', 0, '2020-07-26 06:28:50'),
(25, 1, 1, 'glass packing', -1, 1, 3, 1, '', 0, '2020-07-26 06:18:55'),
(26, 1, 1, 'Window Sash', 30, 120, 2, 1, '', 0, '2020-07-26 06:29:04'),
(27, 1, 1, 'ww', 1, 1, 3, 1, '', 0, '2020-07-26 06:18:57'),
(28, 1, 1, '1', 1, 1, 3, 1, '', 0, '2020-07-26 06:19:00'),
(29, 1, 1, '2', 2, 2, 3, 2, '', 0, '2020-07-26 06:19:02'),
(30, 1, 1, '3', 3, 3, 3, 3, '', 0, '2020-07-26 06:18:51'),
(31, 1, 1, '4', 4, 4, 3, 4, '', 0, '2020-07-26 06:18:47'),
(32, 1, 1, '7', 1, 1, 3, 1, '', 0, '2020-07-26 06:28:39'),
(33, 1, 1, '5', 5, 5, 3, 5, '', 0, '2020-07-26 06:28:32'),
(34, 1, 1, '23', 2, 2, 2, 1, '', 0, '2020-07-26 06:28:36'),
(35, 1, 1, 'Door Sash 24mm', 1, 12, 2, 1, '', 0, '2020-07-26 06:28:42'),
(36, 1, 1, 'Window Sash 24mm', 110, 30, 3, 1, '', 0, '2020-07-26 06:41:29'),
(37, 1, 1, 'Door Sash 24mm', 45, 4, 2, 1, '', 0, '2020-07-26 06:41:36'),
(38, 1, 1, 'Window Sash 24mm', 360, 1, 2, 1, '', 0, '2020-10-15 13:57:06'),
(39, 1, 1, 'Door Sash 24mm', 200, 1, 2, 1, '', 0, '2020-10-15 13:54:41'),
(40, 1, 1, 'Mullion T 24mm', 160, 1, 2, 1, '', 0, '2020-10-15 13:54:01'),
(41, 1, 1, '24mm Box Panel white ( china)', 2100, 1, 2, 1, 'each pkt 6 pcs', 0, '2020-10-15 13:59:56'),
(42, 1, 1, 'Double Door Moving Mullion', 24, 1, 2, 1, '', 0, '2020-10-15 13:47:52'),
(43, 1, 1, 'Beading 24mm', 600, 1, 2, 1, '', 0, '2020-10-15 13:58:22'),
(44, 1, 1, 'Overlap Frame', 572, 1, 2, 6, '', 0, '2020-10-15 13:58:17'),
(45, 1, 1, 'Single Glass Beading', 150, 1, 2, 1, '', 0, '2020-10-15 13:53:46'),
(46, 1, 1, 'Mullion Concetor', 4000, 400, 2, 1, '', 0, '2020-07-26 08:03:52'),
(47, 1, 1, 'test', 12, 1, 3, 1, 'test description', 0, '2020-07-26 07:49:22'),
(48, 1, 1, 'L Frame (W/O Overlap Frame) my win', 180, 6, 1, 1, 'Each Pkt 4 Pcs', 0, '2020-10-15 13:54:08'),
(49, 1, 1, 'ss test', 1, 1, 3, 1, '', 0, '2020-07-26 07:49:26'),
(50, 1, 1, 'test 2', 1, 1, 3, 1, '24mm', 0, '2020-07-26 07:49:28'),
(51, 1, 1, '40mm Extra Overlap', 100, 6, 1, 1, 'each packet 10 pcs', 0, '2020-10-15 13:49:20'),
(52, 1, 1, 'Mullion Connector', 4000, 1, 2, 1, 'each Box 400 pcs', 0, '2020-08-13 06:25:55'),
(53, 1, 1, 'Drilling screw  4.8x60mm', 6000, 1, 2, 1, 'each box 3000 pcs', 0, '2020-10-15 14:01:22'),
(54, 1, 1, 'Bearing Sash', 3400, 1, 2, 1, 'each box 100 pcs', 0, '2020-10-15 14:01:13'),
(55, 1, 1, 'Lock with cylinder 153P', 180, 1, 2, 1, 'each box 30 pcs', 0, '2020-10-15 13:54:34'),
(56, 1, 1, 'Glass Packing', 21, 1000, 2, 1, '', 0, '2020-10-15 13:47:46'),
(57, 1, 1, 'WC lock for UPVC door 269Pwc', 240, 1, 2, 1, '', 0, '2020-10-15 13:54:53'),
(58, 1, 1, 'Double Door Strike', 300, 1, 2, 1, '', 0, '2020-10-15 13:54:58'),
(59, 1, 1, 'Toilet cylinder door', 330, 1, 2, 1, '', 0, '2020-10-15 13:56:56'),
(60, 1, 1, 'Sliding Striker', 300, 1, 2, 1, '', 0, '2020-10-15 13:55:03'),
(61, 1, 1, 'Door Cylinder 90mm', 108, 1, 2, 1, '', 0, '2020-10-15 13:49:39'),
(62, 1, 1, 'Sliding Hidden Handle', 50, 1, 2, 1, '', 0, '2020-10-15 13:43:27'),
(63, 1, 1, 'Screw 3.9x25mm', 6250, 1, 2, 1, 'each box 1250', 0, '2020-10-15 14:01:27'),
(64, 1, 1, 'Moving Mullion Cap', 750, 1, 2, 1, '', 0, '2020-10-15 13:58:36'),
(65, 1, 1, 'Tilt & Turn Sticker Plate 9mm', 1800, 1, 2, 1, 'each box 100pcs', 0, '2020-10-15 13:59:51'),
(66, 1, 1, 'Tilt Turn Striker Plate', 1, 1, 4, 1, '111', 0, '2020-07-27 06:04:30'),
(67, 1, 1, 'Tilt', 1, 1, 4, 1, '22222', 0, '2020-07-27 06:04:36'),
(68, 1, 0, 'Tilt', 1, 1, 4, 1, 'test', 1, '2020-07-27 06:05:24'),
(69, 1, 1, 'Tilt 2', 1, 1, 4, 1, 'test', 0, '2020-07-27 06:06:45'),
(70, 1, 1, 'Locking Small Plate', 1000, 1, 2, 1, 'each box 100pcs', 0, '2020-09-30 14:02:59'),
(71, 1, 1, 'Big Locking Plate', 800, 1, 2, 1, 'Response Lock Big', 0, '2020-10-15 13:58:40'),
(72, 1, 1, 'Tilt 22', 1, 1, 4, 1, 'test', 0, '2020-07-27 06:28:57'),
(73, 1, 1, 'AKPEN 3D Hinges Brown', 48, 1, 2, 1, 'each box 24pcs', 0, '2020-10-15 13:47:56'),
(74, 1, 1, 'White Toilet Handle (W/O Cylinder)', 110, 1, 2, 1, '', 0, '2020-10-15 13:49:47'),
(75, 1, 1, 'White Roto Handle', 86, 1, 2, 1, '', 0, '2020-10-15 13:49:03'),
(76, 1, 1, 'sturdy White 3D Hinges', 51, 1, 2, 1, '', 0, '2020-09-30 09:33:21'),
(77, 1, 1, 'Fonwex White 3D Hinges', 10, 1, 2, 1, '', 0, '2020-09-30 09:33:29'),
(78, 1, 1, 'Window Striker', 9000, 1, 2, 0.1, 'Each CTN 1000 Pcs', 0, '2020-10-15 14:01:32'),
(79, 1, 1, 'Winex Window Handle', 80, 1, 2, 1, '', 0, '2020-10-15 13:48:58'),
(80, 1, 1, 'Pavo Black 3D Hinges', 87, 1, 2, 1, '', 0, '2020-10-15 13:49:08'),
(81, 1, 1, 'White 3D Hinges', 672, 1, 2, 2.5, 'White Colour', 0, '2020-10-15 13:58:31'),
(82, 1, 1, 'Winex Brown 3D Hinges', 2, 1, 2, 1, '', 0, '2020-09-30 09:32:58'),
(83, 1, 1, 'Dark Brown Toilet Handle W/O cylinder', 100, 1, 2, 1, '', 0, '2020-10-15 13:49:27'),
(84, 1, 1, 'Dark Brown Room Door Handle W/O Cylinder', 126, 1, 2, 1, '', 0, '2020-10-15 13:53:20'),
(85, 1, 1, 'Brown Toilet Handle W/O Cylinder', 60, 1, 2, 1, '', 0, '2020-10-15 13:48:04'),
(86, 1, 1, 'Sliding GV Gear 60cm', 450, 1, 2, 1, '', 0, '2020-10-15 13:57:29'),
(87, 1, 1, 'Brown Door Handle with Cylinder', 200, 1, 2, 3, 'Brown Colour Hndle', 0, '2020-10-15 13:54:46'),
(88, 1, 1, 'White Door Handle with Cylinder', 2100, 21, 2, 1.8, 'White Colour Handle', 0, '2020-10-15 14:00:01'),
(89, 1, 1, 'Small White Quick Hinges', 980, 1, 2, 1, '', 0, '2020-10-15 13:59:13'),
(90, 1, 1, 'Quick Hinges White 90mm Door', 1100, 1, 2, 0.5, 'Each CTN 100 Pcs', 0, '2020-10-15 13:59:22'),
(91, 1, 1, 'Small Brown Quick Hinges', 450, 1, 2, 1, '', 0, '2020-10-15 13:57:33'),
(92, 1, 1, 'Normal Window Handle', 145, 1, 2, 1, '', 0, '2020-10-15 13:53:29'),
(93, 1, 1, 'Tilt m', 1, 1, 4, 1, 'test', 0, '2020-07-27 08:25:24'),
(94, 1, 1, 'Tilt & Turn Sticker Plate 13mm', 1400, 1, 2, 1, '', 0, '2020-10-15 13:59:28'),
(95, 1, 1, 'Mullion Conector My Win', 3600, 1, 2, 0.17, 'Each Box 400 Pcs', 0, '2020-10-15 14:01:17'),
(96, 1, 1, 'Mulion Conector Perfect', 800, 1, 2, 0.17, 'Each CTN 400 PCS', 0, '2020-10-15 13:58:51'),
(97, 1, 0, '3D HINDGES BROWN', 96, 1, 2, 24, 'Brown Colour', 1, '2020-09-30 12:52:22'),
(98, 1, 1, '3D HINDGES BROWN', 96, 24, 2, 3, 'EACH CTN 24 PCS', 0, '2020-10-15 13:49:14'),
(99, 1, 1, 'lOCKING PLATE SMALL', 400, 100, 2, 0.2, 'RESPONSE FOR LOCK SMALL', 0, '2020-10-15 13:57:13'),
(100, 1, 1, 'LOCKING PLATE LONG', 400, 1, 2, 0.25, 'RESPONSE FOR LOCK BIG', 0, '2020-09-30 14:02:11'),
(101, 1, 1, 'door handle toilet ( Brown )', 300, 3, 2, 2, 'Brown colour toilet knock handle', 0, '2020-10-15 13:55:48'),
(102, 1, 1, 'Toilet White Door Handle ( Knock)', 2100, 630, 2, 1.9, 'Each CTN 100 PCS', 0, '2020-10-15 14:01:09'),
(103, 1, 1, 'Door Hinges 75mm  White', 500, 5, 2, 0.3, 'Each Ctn 100 Pcs', 0, '2020-10-15 13:57:39'),
(104, 1, 1, 'Door Hindges Normal 90mm ( Brown)', 500, 5, 2, 0.4, 'Each Ctn 100 Pcs', 0, '2020-10-15 13:57:45'),
(105, 1, 1, 'Cylinder 90mm  With Pin Kele ( One Knock)', 200, 1, 2, 3.2, 'One Side Knock Cylinder', 0, '2020-10-15 13:54:50'),
(106, 1, 1, 'Cylinder 90mm  Without Pin Kale', 50, 1, 2, 2.8, 'Both Side Key', 0, '2020-10-15 13:48:00'),
(107, 1, 1, 'PVC LOCK ROOM ( KALE)', 600, 1, 2, 1.9, 'Without Cilynder', 0, '2020-10-15 13:58:27'),
(108, 1, 0, 'Single Door Striker', 500, 1, 2, 0.1, 'Each CTN 1000 Pcs', 1, '2020-09-30 15:29:09'),
(109, 1, 0, 'Fly Screen Corner 17x25', 1000, 1, 2, 0.1, 'Net Corner', 1, '2020-10-01 07:54:17'),
(110, 1, 1, 'Fly Screen Net Corner', 1500, 1, 2, 0.1, 'Net Corner', 0, '2020-10-15 13:59:32'),
(111, 1, 1, 'Frame Steel', 143, 1, 4, 2.7, 'Overlape&Mulion T', 0, '2020-10-15 13:53:25'),
(112, 1, 1, 'Frame Steel', 150, 1, 4, 2.7, 'Overlape&Mulion T', 0, '2020-10-03 15:53:25'),
(113, 1, 1, 'Window Steel', 100, 1, 4, 2.1, 'Window Sash Steel', 0, '2020-10-15 13:49:31'),
(114, 1, 0, 'GV GEAR 450/700 T&T', 150, 1, 2, 1, 'Each Pkt 10 pcs', 1, '2020-10-04 03:30:11'),
(115, 1, 1, 'Fly Screen Corner', 100, 1, 3, 0.08, 'Net Corner', 0, '2020-10-04 15:18:10'),
(116, 1, 1, 'Fly Screen Handle', 400, 1, 3, 0.08, 'Net Handle', 0, '2020-10-15 13:57:22'),
(117, 1, 1, 'Fly Screen Hindge', 1500, 1, 3, 0.08, 'Net Hindge', 0, '2020-10-15 13:59:46'),
(118, 1, 1, 'Locking Plate T&T', 500, 1, 2, 0.14, 'T&T Locking Plate', 0, '2020-10-15 13:58:12'),
(119, 1, 1, '3 D HINDGES BROWN', 92, 96, 2, 3, 'EACH PKT 24 PCS', 0, '2021-09-27 13:23:52'),
(120, 1, 1, '3 D HINDGES WHITE', 288, 288, 2, 2.5, 'EACH CTN 24 PCS', 0, '2021-09-28 06:26:43'),
(121, 1, 1, 'RESPONSE FOR LOCK LONG', 1000, 1000, 2, 0.3, 'LOCKING PLATE BIG', 0, '2021-09-28 06:47:29'),
(122, 1, 1, 'RESPONSE LOCK SMALL', 1000, 1000, 2, 0.25, 'LOCKING PLATE SMALL', 0, '2021-09-28 06:48:00'),
(123, 1, 1, 'ROOM DOOR HANDLE WHITE', 475, 175, 2, 1.6, 'EACH BOX 25 PCS', 0, '2021-09-28 06:40:50'),
(124, 1, 1, 'ROOM DOOR HANDLE BROWN', 75, 75, 2, 2, 'EACH BOX 25 PCS', 0, '2021-09-27 13:22:52'),
(125, 1, 1, 'TOILET DOOR HANDLE WHITE', 1000, 1000, 2, 1.7, 'KNOCK HANDLE', 0, '2021-09-28 07:11:48'),
(126, 1, 1, 'TOILET DOOR HANDLE BROWN', 25, 25, 2, 2, 'KNOCK HANDLE', 0, '2021-09-27 13:04:52'),
(127, 1, 1, 'DOOR QUICK HINDGES 90MM WHITE', 1350, 1350, 2, 0.55, 'EACH BOX 150 PCS', 0, '2021-09-28 07:12:40'),
(128, 1, 0, 'DOOR HINDGES 75 MM', 1050, 1050, 2, 0.3, 'EACH BOX 150 PCS', 1, '2020-10-22 08:08:21'),
(129, 1, 1, 'DOOR HINDGES 90 MM BROWN', 450, 450, 2, 0.45, 'BROWN COLOUR', 0, '2021-09-28 06:39:35'),
(130, 1, 1, 'CYLINDER 90MM', 100, 100, 2, 3.2, 'WITH PIN', 0, '2021-09-27 13:24:04'),
(131, 1, 1, 'CYLINDER 90 MM WITHOUT PIN', 150, 150, 2, 2.6, 'WITHOUT PIN', 0, '2021-09-27 13:26:49'),
(132, 1, 1, 'PVC LOCK ROOM', 400, 400, 2, 2, 'FOR ROOM', 0, '2021-09-28 06:38:20'),
(133, 1, 1, 'PVC TOILET', 360, 360, 2, 2, 'FOR TOILET', 0, '2021-09-28 06:37:46'),
(134, 1, 1, 'SINGLE DOOR STRIKER', 500, 500, 2, 0.1, 'EACH CTN 1000 PCS', 0, '2021-09-28 06:42:33'),
(135, 1, 1, 'DOUBLE DOOR STRIKER', 500, 500, 2, 0.1, 'EACH CTN 1000 PCS', 0, '2021-09-28 06:42:39'),
(136, 1, 1, 'TOWER BOLT', 700, 700, 2, 2.5, 'EACH CTN 100', 0, '2021-09-28 06:45:34'),
(137, 1, 1, 'DOUBLE DOOR T CONECTOR WHITE', 50, 50, 2, 0.2, 'T CONECTOR', 0, '2021-09-27 13:05:56'),
(138, 1, 1, 'DOUBLE DOOR T CONECTOR BROWN', 25, 25, 2, 0.4, 'T CONECTOR BROWN', 0, '2021-09-27 13:04:57'),
(139, 1, 1, '160MM ESPAGNOLETTERS DOOR LOCK', 150, 150, 2, 2.2, 'DOOR LOCK 160 EACH PKT 10 PCS', 0, '2021-09-27 13:26:59'),
(140, 1, 1, '180MM ESPAGNOLETTERS DOOR LOCK', 480, 480, 2, 2.3, '180 DOOR LOCK', 0, '2021-09-28 06:40:55'),
(141, 1, 1, '200MM ESPAGNOLETTERS DOOR LOCK', 220, 220, 2, 2.8, '200 DOOR LOCK', 0, '2021-09-27 13:30:57'),
(142, 1, 1, 'WATER CAP WHITE', 3000, 3000, 2, 0.05, 'EACH PKT 500', 0, '2021-09-28 07:14:16'),
(143, 1, 1, 'WATER CAP BROWN', 1000, 1000, 2, 0.05, 'EACH PKT 500', 0, '2021-09-28 07:11:57'),
(144, 1, 1, 'SILICON BAUTECH', 720, 720, 2, 0.375, 'EACH CTN 24 PCS', 0, '2021-09-28 06:46:25'),
(145, 1, 1, 'ABC SILICON WHITE', 5940, 5940, 2, 0.4, 'EACH CTN 30', 0, '2021-09-28 07:14:25'),
(146, 1, 1, 'L FRAME WHITE MY WIN', 160, 160, 4, 6, 'EACH PKT 4 PCS', 0, '2021-09-27 13:28:23'),
(147, 1, 1, 'L FRAME LAMINATED', 34, 34, 4, 9.3, 'BROWN COLOUR', 0, '2021-09-27 13:05:36'),
(148, 1, 1, 'OVERLAPE FRAME MYWIN WHITE', 87, 100, 4, 6, 'EACH PKT 4 LENTH', 0, '2021-09-27 13:23:40'),
(149, 1, 0, 'OVERLAPE FRAME LAMINATED MY WIN', 117, 117, 4, 13.8, 'BROWN COLOUR', 1, '2020-10-22 13:29:25'),
(150, 1, 1, 'OVERLAPE FRAME LAMINAMATED', 117, 117, 4, 13.8, 'BROWN COLOUR', 0, '2021-09-27 13:26:14'),
(151, 1, 1, 'MULION T PROFILE MY WIN WHITE', 137, 140, 4, 6.6, 'MY WIN WHITE', 0, '2021-09-27 13:26:36'),
(152, 1, 1, 'MULION T MY WIN LAMINATED', 85, 85, 4, 13.8, 'WOOD COLOUR', 0, '2021-09-27 13:22:56'),
(153, 1, 1, 'WINDOW SASH MY WIN WHITE', 99, 112, 4, 6.12, 'MY WIN WHITE', 0, '2021-09-27 13:23:57'),
(154, 1, 1, 'INSIDE DOOR SASH MY WIN LAMINATED', 16, 17.4, 4, 17.4, 'BROWN COLOUR', 0, '2021-09-27 13:04:29'),
(155, 1, 1, 'OUTER DOOR SASH WHITE', 12, 12, 4, 9, 'MY WIN OUTER DOOR', 0, '2021-09-27 13:03:53'),
(156, 1, 1, 'OUTSIDE MYWIN DOOR SASH LAMINATED', 12, 12, 4, 19.2, 'MYWIN BROWN', 0, '2021-09-27 13:03:58'),
(157, 1, 1, 'SINGLE GLASS BEADING MYWIN', 200, 200, 4, 0.4, 'WHITE BEADING', 0, '2021-09-27 13:30:06'),
(158, 1, 1, 'SINGLE GLASS BEADING BROWN', 100, 100, 4, 0.6, 'BROWN BEADING', 0, '2021-09-27 13:24:09'),
(159, 1, 1, 'DOUBLE GLASS BEADING 20MM WHITE', 750, 750, 4, 0.26, 'DOUBLE GLASS BEADING MYWIN', 0, '2021-09-28 06:46:44'),
(160, 1, 1, 'DOUBLE GLASS BEADING LAMINATED 20MM', 250, 250, 4, 0.4, 'LAMINATED BEADING', 0, '2021-09-27 13:31:09'),
(161, 1, 1, 'DOUBLE GLASS BEADING 24MM WHITE', 237, 375, 4, 1.5, 'DOUBLE GLASS BEADING WHITE', 0, '2021-09-27 13:31:01'),
(162, 1, 1, 'DOOR BOX PANEL CHINA WHITE', 1800, 1800, 4, 6, 'CHAINA BOX PANEL', 0, '2021-09-28 07:13:44'),
(163, 1, 1, 'BOX PANEL LAMINATED', 40, 40, 4, 6, 'LAMINATED', 0, '2021-09-27 13:05:50'),
(164, 1, 1, 'ROUND CORNER PROFILE WHITE', 60, 60, 4, 3.6, 'ROUND PIPE', 0, '2021-09-27 13:22:42'),
(165, 1, 1, 'ROUND CORNER PROFILE', 12, 12, 4, 7, 'ROUND PIPE LAMINATED', 0, '2021-09-27 13:04:03'),
(166, 1, 1, 'CORNER PIPE ADOPTER WHITE', 30, 30, 4, 4.2, 'WHITE COLOUR', 0, '2021-09-27 13:05:23'),
(167, 1, 1, 'CORNER PIPE ADOPTER LAMINATED', 7, 7, 4, 9.9, 'BROWN COLOUR', 0, '2021-09-27 13:02:06'),
(168, 1, 1, 'EXTRA OVERLAPE MYWIN', 20, 25, 4, 3, 'MYWIN EXTRA OVERLAPE', 0, '2021-09-27 13:04:34'),
(169, 1, 1, 'EXTRA OVERLAPE LAMINATED', 30, 30, 4, 5.4, 'BROWN COLOUR', 0, '2021-09-27 13:05:30'),
(170, 1, 1, 'WINDOW SASH MYWIN LAMINATED', 56, 56, 4, 9, 'BROWN COLOUR', 0, '2021-09-27 13:06:08'),
(171, 1, 1, 'WINDOW HANDLE WHITE', 180, 180, 2, 0.6, 'NORMALE HANDLE TOILET', 0, '2021-09-27 13:28:27'),
(172, 1, 1, 'WINDOW HANDLE BROWN', 60, 60, 2, 0.8, 'BROWN COLOUR HANDLE', 0, '2021-09-27 13:22:47'),
(173, 1, 1, 'ROTO HANDLE WHITE', 350, 350, 2, 2, 'EACH BOX 90 PCS', 0, '2021-09-28 06:37:35'),
(174, 1, 1, 'ROTO HANDLE GOLDEN', 180, 180, 2, 2.2, 'GOLD COLOUR', 0, '2021-09-27 13:28:31'),
(175, 1, 1, 'WINDOW STRIKER MY WIN', 9000, 9000, 2, 0.1, 'EACH BOX 1000', 0, '2021-09-28 07:14:29'),
(176, 1, 1, 'MULLION CONECTOR MY WIN', 3979, 4000, 2, 0.17, 'EACH BOX 400 PCS', 0, '2021-09-28 07:14:20'),
(177, 1, 1, '28-ESPAGNOLETTERS', 200, 500, 2, 0.4, 'T&T GV GEAR ONE SIDE OPEN', 0, '2021-09-27 13:30:18'),
(178, 1, 1, '60-ESPAGNOLETTERS', 650, 650, 2, 0.75, 'GV GEAR ONESIDE OPEN', 0, '2021-09-28 06:45:19'),
(179, 1, 1, '80 - ESPAGNOLETTERS', 650, 650, 2, 0.9, 'ONE SIDE OPEN GV GEAR', 0, '2021-09-28 06:45:26'),
(180, 1, 1, '100-ESPAGNOLETTERS', 1600, 1600, 4, 1.1, 'ONE SIDE GV GEAR', 0, '2021-09-28 07:13:13'),
(181, 1, 1, '120-ESPAGNOLETTERS', 1100, 1100, 2, 1.3, 'ONE SIDE OPEN GV GEAR', 0, '2021-09-28 07:12:26'),
(182, 1, 1, '140-ESPAGNOLETTERS', 1400, 1400, 2, 1.6, 'ONE SIDE OPEN', 0, '2021-09-28 07:13:03'),
(183, 1, 1, '160-ESPAGNOLETTERS-', 1600, 1600, 2, 1.9, 'ONE SIDE OPEN', 0, '2021-09-28 07:13:17'),
(184, 1, 1, '180-ESPANGOLETTERS', 1400, 1400, 2, 2.1, 'ONE SIDE OPEN', 0, '2021-09-28 07:13:07'),
(185, 1, 1, '200-ESPANGOLETTERS', 1100, 1100, 2, 2.3, 'ONE SIDE OPEN', 0, '2021-09-28 07:12:35'),
(186, 1, 1, 'BOTOM EXTENSION', 1600, 1600, 2, 0.35, 'T&T ACCES', 0, '2021-09-28 07:13:22'),
(187, 1, 1, 'CORNER BEARING', 2300, 2300, 4, 0.35, 'T&T ACCES', 0, '2021-09-28 07:14:10'),
(188, 1, 1, 'CORNER TRANSMISION', 2200, 2200, 2, 0.7, 'T&T ACCES', 0, '2021-09-28 07:13:59'),
(189, 1, 1, 'DRILL CORNER HINDGE', 1800, 1800, 2, 0.65, 'T&T ACCES', 0, '2021-09-28 07:13:49'),
(190, 1, 1, 'STAY ARM BEARING', 1600, 1600, 2, 0.25, 'T&T ACCES', 0, '2021-09-28 07:13:30'),
(191, 1, 1, 'STAY ARM HINDGE 13/20', 1600, 1600, 2, 0.31, 'T&T ACCES', 0, '2021-09-28 07:13:37'),
(192, 1, 1, 'STAY ARM HINDGE 9/20', 200, 200, 2, 0.31, 'T&T ACCES', 0, '2021-09-27 13:30:22'),
(193, 1, 1, 'GV GEAR 450/700', 1000, 1000, 2, 1.05, 'EACH PKT 10 PCS', 0, '2021-09-28 07:12:22'),
(194, 1, 1, 'GV GEAR 700/1200', 700, 700, 2, 1.15, 'EACH PKT 10 PCS', 0, '2021-09-28 06:45:39'),
(195, 1, 1, 'GV GEAR 900/1400', 400, 400, 2, 1.2, 'EACH PKT 10 PCS', 0, '2021-09-28 06:38:32'),
(196, 1, 1, 'GV GEAR 1200/1700', 400, 400, 2, 1.35, 'T&T GV GEAR', 0, '2021-09-28 06:38:39'),
(197, 1, 1, 'GV GEAR 1700/2200', 400, 400, 2, 1.2, 'T&T GV GEAR', 0, '2021-09-28 06:38:44'),
(198, 1, 1, 'MIDDLE LOCK 1200/1700', 300, 300, 2, 0.6, 'T&T MIDDLE LOCK', 0, '2021-09-28 06:37:00'),
(199, 1, 1, 'MIDDLE LOCK 1700/2200', 100, 100, 2, 1.2, 'T&T MIIDLE LOCK', 0, '2021-09-27 13:24:14'),
(200, 1, 1, 'MIDDLE LOCK 1700/2200', 400, 400, 2, 1.2, 'T&T MIDDLE LOCK', 0, '2021-09-28 06:38:50'),
(201, 1, 1, 'MIDDLE LOCK 800/1200', 520, 520, 2, 0.7, 'T&T MIDDLE LOCK', 0, '2021-09-28 06:44:04'),
(202, 1, 1, 'STAY ARM 280/600', 100, 100, 2, 1.1, 'T*T STAY ARM', 0, '2021-09-27 13:24:17'),
(203, 1, 1, 'STAY ARM 600/850', 1800, 1800, 2, 1.5, '1.500', 0, '2021-09-28 07:13:55'),
(204, 1, 1, 'STAY ARM 850/1100', 300, 300, 2, 1.7, 'STAY ARM', 0, '2021-09-28 06:37:07'),
(205, 1, 1, 'SLIDING ADJUSTABLE ROLLER', 10, 10, 2, 1.05, 'SLIDING', 0, '2021-09-27 13:02:22'),
(206, 1, 1, 'SLIDING HANDLE WHITE', 100, 100, 2, 1, 'SLIDING HANDLE', 0, '2021-09-27 13:24:24'),
(207, 1, 1, 'SLIDING INTERLOCK WHITE', 15, 15, 4, 4.2, 'SLIDING BLOCK', 0, '2021-09-27 13:04:17'),
(208, 1, 1, 'SLIDING INTERLOCK BROWN', 20, 20, 2, 5.4, 'SLIDING BLOCK', 0, '2021-09-27 13:04:40'),
(209, 1, 1, 'SLIDING STRICKER', 300, 300, 2, 0.15, 'SLIDING STRICKER', 0, '2021-09-28 06:37:15'),
(210, 1, 1, 'SLIDING GV GEAR 40CM', 200, 200, 2, 0.6, 'SLIDING GV GEAR', 0, '2021-09-27 13:30:30'),
(211, 1, 1, 'SLIDING GV GEAR 60CM', 450, 450, 2, 0.7, 'SLIDING GV GEAR', 0, '2021-09-28 06:39:42'),
(212, 1, 1, 'SLIDING GV GEAR 80CM', 450, 450, 2, 0.8, 'SLIDING GV GEAR', 0, '2021-09-28 06:40:36'),
(213, 1, 1, 'SLIDING GV GEAR 100 CM', 400, 400, 2, 0.9, 'SLIDING GV GEAR', 0, '2021-09-28 06:38:55'),
(214, 1, 1, 'SLIDING GV GEAR 120', 500, 500, 2, 1.05, 'SLIDING GV GEAR', 0, '2021-09-28 06:43:38'),
(215, 1, 1, 'SLIDING GV GEAR 140', 500, 500, 2, 1.25, 'SLIDING GV GEAR', 0, '2021-09-28 06:43:58'),
(216, 1, 1, 'SLIDING GV GEAR 160CM', 400, 400, 2, 1.25, 'SLIDING GV GEAR', 0, '2021-09-28 06:39:17'),
(217, 1, 1, 'SLIDING GV GEAR 180CM', 350, 350, 2, 1.9, 'SLIDING GV GEAR', 0, '2021-09-28 06:37:41'),
(218, 1, 1, 'SLIDING GV GEAR 200CM', 100, 100, 2, 2.2, 'SLIDING GV GEAR', 0, '2021-09-27 13:24:32'),
(219, 1, 1, 'SLIDING FRAME WHITE', 14, 14, 4, 10.5, 'SLIDING FRAME', 0, '2021-09-27 13:04:13'),
(220, 1, 1, 'SLIDING FRAME LAMINATED', 28, 28, 4, 14.1, 'SLIDING FRAME LAMINATED', 0, '2021-09-27 13:05:07'),
(221, 1, 1, 'SLIDING FIXED FRAME WHITE', 10, 10, 4, 12.9, 'SLIDING FIX FRAME', 0, '2021-09-27 13:02:28'),
(222, 1, 0, 'SLIDING FIXED FRAME LAMINATED', 14, 14, 4, 17.7, 'BROWN COLOUR', 1, '2020-10-29 14:44:19'),
(223, 1, 1, 'SLIDING SASH LAMINATED', 12, 12, 4, 18.9, 'LAMINATED', 0, '2021-09-27 13:04:09'),
(224, 1, 1, 'SLIDING INTERLOCK WHITE', 10, 10, 4, 4.2, '6 MTR', 0, '2021-09-27 13:03:41'),
(225, 1, 1, 'SLIDING ALUMINIUM RAIL', 10, 10, 4, 5.4, 'SLIDING RAIL', 0, '2021-09-27 13:03:46'),
(226, 1, 1, 'FLY SCREEN CORNER', 600, 600, 2, 0.1, 'EACH PKT 50 PCS', 0, '2021-09-28 06:44:33'),
(227, 1, 1, 'FLY SCREEN CORNER LAMINATED', 400, 400, 2, 0.3, 'BROWN COLOUR', 0, '2021-09-28 06:39:23'),
(228, 1, 0, 'FLY SCREEN HANDLE  WHITE', 700, 700, 2, 0.2, 'NET HANDLE', 1, '2020-10-31 05:22:49'),
(229, 1, 1, 'FLY SCREEN HANDLE', 750, 750, 2, 0.3, 'NET HANDLE', 0, '2021-09-28 06:47:02'),
(230, 1, 1, 'FLY SCREEN HANDLE BROWN', 250, 250, 2, 0.5, 'BROWN NET HANDLE', 0, '2021-09-27 13:33:15'),
(231, 1, 1, 'FLY SCREEN HINDGE', 600, 600, 2, 0.2, 'NET HINDGE', 0, '2021-09-28 06:44:40'),
(232, 1, 1, 'FLY SCREEN HINDGE BROWN', 100, 100, 2, 0.5, 'NET HINDGE BROWN', 0, '2021-09-27 13:24:38'),
(233, 1, 1, 'FLY SCREEN LOCK', 700, 700, 2, 0.2, 'NET SCREEN LOCK', 0, '2021-09-28 06:46:09'),
(234, 1, 1, 'FLY SCREEN LOCK BROWN', 150, 150, 2, 0.4, 'NET LOCK BROWN', 0, '2021-09-27 13:27:24'),
(235, 1, 1, 'NET ROLL 120', 1, 1, 3, 5, 'ONE BIG ROLL', 0, '2021-09-27 13:01:52'),
(236, 1, 1, 'NET ROLL 100', 3, 3, 3, 10, 'ROLL', 0, '2021-09-27 13:02:01'),
(237, 1, 1, 'NET ROLL 140', 7, 7, 3, 10, 'NET ROLL', 0, '2021-09-27 13:02:15'),
(238, 1, 1, 'NET RUBBER WHITE', 15, 15, 2, 5, 'NET RUBBER', 0, '2021-09-27 13:04:23'),
(239, 1, 1, 'BOSSY HANDLE BLACK', 100, 100, 2, 7, 'WHITE HANDLE', 0, '2021-09-27 13:24:46'),
(240, 1, 1, 'BOSSY HANDLE SILVER', 100, 100, 2, 7, 'SILVER HANDLE', 0, '2021-09-27 13:25:53'),
(241, 1, 1, 'CURTAINWALL STAY ARM', 330, 330, 4, 5, 'STAY ARM CW LEFT AND RIGHT', 0, '2021-09-28 06:37:22'),
(242, 1, 1, 'SILICON BIOTEC', 180, 180, 3, 7, 'EACH BOX 24 PCS', 0, '2021-09-27 13:29:14'),
(243, 1, 1, 'SILICON ABC WHITE', 195, 195, 3, 12, 'EACH CTN 30 PCS', 0, '2021-09-27 13:29:59'),
(244, 1, 1, 'TILT AND SLIDE ACCES', 482, 500, 3, 50, 'T&T ACES', 0, '2021-09-28 06:42:27'),
(245, 1, 1, 'T&T ACES', 24, 24, 3, 14, 'T&T', 0, '2021-09-27 13:04:46'),
(246, 1, 1, 'DOOR SASH', 124, 150, 4, 7.8, 'mywin', 0, '2021-09-27 13:26:24'),
(247, 1, 1, 'frame steel', 38, 100, 4, 2.7, 'Frame Steel', 0, '2021-09-27 13:05:44'),
(248, 1, 1, 'window steel', 150, 150, 4, 2.1, 'Window Steel', 0, '2021-09-27 13:28:11'),
(249, 1, 1, 'Door Steel', 100, 100, 4, 3.3, 'Door Steel', 0, '2021-09-27 13:25:59'),
(250, 1, 1, 'Self Thread', 2225, 2500, 2, 0.1, 'Screw', 0, '2021-09-28 07:14:05'),
(251, 1, 1, 'TILT & TURN ACCES', 249, 250, 3, 14, 'T&T', 0, '2021-09-27 13:31:05'),
(252, 1, 1, '3 D HINDGES BLACK', 47, 1, 2, 2.6, '', 1, '2021-10-11 05:04:40'),
(253, 1, 1, '3 D HINDGES BROWN', 240, 1, 2, 2.6, '', 1, '2021-09-29 04:36:10'),
(254, 1, 1, '3 D HINDGES WHITE', 368, 1, 2, 2.6, '', 1, '2021-09-29 04:35:43'),
(255, 1, 1, 'LOCKING PLATE SMALL', 600, 1, 2, 0.15, '', 1, '2021-09-29 04:51:26'),
(256, 1, 1, 'LOCKING PLATE LONG', 10, 1, 2, 0.25, '', 1, '2021-09-29 04:52:07'),
(257, 1, 1, 'DOOR HANDLE BROWN', 150, 1, 2, 2, '', 1, '2021-09-29 05:11:29'),
(258, 1, 1, 'DOOR HANDLE WHITE', 655, 1, 2, 1.6, '', 1, '2021-09-29 05:12:24'),
(259, 1, 1, 'TOILET WINDOW HANDLE BROWN', 98, 1, 2, 0.8, '', 1, '2021-09-29 05:14:59'),
(260, 1, 1, 'TOILET NORMAL WINDOW HANDLE WHITE', 267, 1, 2, 0.5, '', 1, '2021-09-29 05:15:49'),
(261, 1, 1, 'TOILET DOOR HANDLE WHITE', 1943, 1, 2, 1.6, '', 1, '2021-09-29 05:23:34'),
(262, 1, 1, 'TOILET DOOR HANDLE BROWN', 75, 1, 2, 2, '', 1, '2021-09-29 05:25:33'),
(263, 1, 0, 'QUICK DOOR HINDGES 90MM WHITE', 10, 1, 2, 0.4, '', 1, '2021-09-29 12:07:37'),
(264, 1, 1, '90MM QUICK DOOR HINDGES WHITE', 10, 1, 2, 0.4, '', 1, '2021-09-29 12:09:17'),
(265, 1, 0, 'Quick Hindges 75mm White', 2700, 1, 2, 0.3, '', 1, '2021-09-29 13:42:24'),
(266, 1, 1, '75 mm Hindges White', 2700, 1, 2, 0.3, '', 1, '2021-09-29 13:44:09'),
(267, 1, 1, '75 mm hindges brown', 750, 1, 2, 0.35, '', 1, '2021-09-29 13:44:56'),
(268, 1, 1, 'Door Quick Hindges 90 Mm Brown', 50, 1, 2, 0.45, '', 1, '2021-09-29 13:57:10'),
(269, 1, 1, 'Normal Hindges White', 750, 1, 2, 0.45, '', 1, '2021-09-29 14:24:50'),
(270, 1, 1, 'cilinder 90mm  ( PIN )', 14, 1, 2, 3.2, '', 1, '2021-09-29 14:25:53'),
(271, 1, 1, 'cilinder 90mm ( Knob )', 969, 1, 2, 2.6, '', 1, '2021-09-29 14:28:05'),
(272, 1, 1, 'PVC LOCK 153P', 528, 1, 2, 1.9, '', 1, '2021-09-29 14:30:00'),
(273, 1, 1, 'PVC LOCK 269 P', 836, 1, 2, 1.9, '', 1, '2021-09-29 14:31:17'),
(274, 1, 1, 'Tower Bolt ( Set )', 1050, 2, 2, 1.6, '', 1, '2021-09-29 14:33:26'),
(275, 1, 1, 'Moving Mulion Cover (White )', 100, 1, 2, 0.2, '', 1, '2021-09-29 14:36:30'),
(276, 1, 1, 'Moving Mulion Cover ( Brown )', 100, 1, 2, 0.3, '', 1, '2021-09-29 14:37:11'),
(277, 1, 1, 'Moving Mulion Cover ( Dark Brown )', 200, 1, 2, 0.3, '', 1, '2021-09-29 14:45:37'),
(278, 1, 1, '160 Door Big Lock', 16, 1, 2, 2.2, '', 1, '2021-09-29 14:47:45'),
(279, 1, 1, '180 Door Big Lock', 958, 1, 2, 2.3, '', 1, '2021-09-29 14:48:24'),
(280, 1, 1, '200 Door Big Lock', 200, 1, 2, 2.8, '', 1, '2021-09-29 14:49:00'),
(281, 1, 1, 'Water Cap ( White )', 2555, 1, 2, 0.05, '', 1, '2021-09-29 15:00:42'),
(282, 1, 1, 'Water Cap ( Brown )', 5000, 1, 2, 0.05, '', 1, '2021-09-29 15:01:26'),
(283, 1, 1, 'Dark Brown Room Door Handle', 105, 1, 2, 1.8, '', 1, '2021-09-29 15:08:10'),
(284, 1, 1, 'Frame Profile 70mm', 91, 1, 4, 6, '', 1, '2021-10-04 14:15:42'),
(285, 1, 1, 'Frame Profile 70mm (Laminated)', 73, 1, 4, 9.3, '', 1, '2021-10-02 08:11:58'),
(286, 1, 1, 'Overlap Frame Profile 70mm', 225, 1, 4, 6, '', 1, '2021-10-02 08:21:32'),
(287, 1, 1, 'Overlap Frame Profile 70mm (Laminated)', 146, 1, 4, 13.8, '', 1, '2021-10-02 08:22:12'),
(288, 1, 1, 'Mullion T-Profile 70mm', 208, 1, 4, 6, '', 1, '2021-10-02 08:22:37'),
(289, 1, 1, 'Window Sash', 128, 1, 4, 7.035, '', 1, '2021-10-02 08:23:08'),
(290, 1, 1, 'Window Sash (Laminated)', 125, 1, 4, 9.3, '', 1, '2021-10-02 08:23:48'),
(291, 1, 1, 'Mullion T-Profile 70mm (Laminated)', 65, 1, 4, 13.8, '', 1, '2021-10-02 08:24:26'),
(292, 1, 1, 'Inside Door Sash 62mm', 97, 1, 4, 7.8, '', 1, '2021-10-02 08:24:54'),
(293, 1, 1, 'Outside Door Sash 62mm', 40, 1, 4, 9, '', 1, '2021-10-02 08:26:15'),
(294, 1, 1, 'Outside Door Sash 62mm (Laminated)', 5, 1, 4, 19.2, '', 1, '2021-10-02 08:26:46'),
(295, 1, 1, 'Moving Mullion Profile 65mm', 8, 1, 4, 6.6, '', 1, '2021-10-02 08:27:11'),
(296, 1, 1, 'Moving Mullion Profile 65mm (Laminated)', 16, 1, 4, 12.6, '', 1, '2021-10-02 08:27:39'),
(297, 1, 1, 'Single Glass Beading 24mm', 44, 1, 4, 2.4, '', 1, '2021-10-02 08:28:33'),
(298, 1, 1, 'Double Glass Beading 20mm', 2820, 1, 4, 1.56, '', 1, '2021-10-02 08:29:20'),
(299, 1, 1, 'Double Glass Beading 20mm (Laminated)', 1260, 1, 4, 2.4, '', 1, '2021-10-02 08:29:51'),
(300, 1, 1, 'Double Glass Beading 24mm', 1378, 1, 4, 1.56, '', 1, '2021-10-02 08:30:30'),
(301, 1, 1, 'Door Box Panel China', 1199, 1, 4, 5, '', 1, '2021-10-02 08:31:01'),
(302, 1, 1, 'Door Box Panel Turkey', 300, 1, 4, 4, '', 1, '2021-10-02 08:31:28'),
(303, 1, 1, 'Round Corner Profile 60mm', 64, 1, 4, 4.2, '', 1, '2021-10-02 08:32:03'),
(304, 1, 1, 'Round Corner Profile 60mm (Laminated)', 17, 1, 4, 10.5, '', 1, '2021-10-02 08:32:39'),
(305, 1, 1, 'Corner Pipe', 47, 1, 4, 3.6, '', 1, '2021-10-02 08:33:02'),
(306, 1, 1, 'Corner Pipe Adapter', 114, 1, 4, 4.2, '', 1, '2021-10-02 08:33:23'),
(307, 1, 1, 'Corner Pipe Adapter (Laminated)', 14, 1, 4, 3.15, '', 1, '2021-10-02 08:33:50'),
(308, 1, 1, 'Overlap Extra (Laminated)', 37, 1, 4, 5.4, '', 1, '2021-10-02 08:34:22'),
(309, 1, 1, 'Box Panel (Laminated)', 90, 1, 4, 8, '', 1, '2021-10-02 08:39:25'),
(310, 1, 1, 'Window Handle Roto (White)', 107, 1, 2, 1.8, '', 1, '2021-10-02 13:30:01'),
(311, 1, 1, 'Window Handle Roto (Golden)', 172, 1, 2, 2.2, '', 1, '2021-10-02 13:30:48'),
(312, 1, 1, 'Window Handle (Silver)', 290, 1, 2, 2.2, '', 1, '2021-10-02 13:31:22'),
(313, 1, 1, 'Window Lock Striker 13Axis', 12500, 1, 2, 0.1, '', 1, '2021-10-02 13:31:51'),
(314, 1, 1, 'Mullion Connector My Win', 6400, 1, 2, 0.196, '', 1, '2021-10-02 13:32:14'),
(315, 1, 1, '28 - Espagnoletters', 700, 1, 2, 0.4, 'One Side', 1, '2021-10-02 13:32:56'),
(316, 1, 1, '60 - Espagnoletters', 620, 1, 2, 0.75, 'One Side', 1, '2021-10-02 13:33:22'),
(317, 1, 1, '80 - Espagnoletters', 790, 1, 2, 0.9, 'One Side', 1, '2021-10-02 13:33:49'),
(318, 1, 1, '100 - Espagnoletters', 640, 1, 2, 1.1, 'One Side', 1, '2021-10-02 13:34:13'),
(319, 1, 1, '120 - Espagnoletters', 850, 1, 2, 1.3, 'One Side', 1, '2021-10-02 13:34:39'),
(320, 1, 1, '140 - Espagnoletters', 710, 1, 2, 1.6, 'One Side', 1, '2021-10-02 13:35:11'),
(321, 1, 1, '160 - Espagnoletters', 877, 1, 2, 1.9, 'One Side', 1, '2021-10-02 13:35:35'),
(322, 1, 1, '180 - Espagnoletters', 800, 1, 2, 2.1, 'One Side', 1, '2021-10-02 13:35:58'),
(323, 1, 1, '200 - Espagnoletters', 800, 1, 2, 2.3, 'One Side', 1, '2021-10-02 13:36:18'),
(324, 1, 1, '75*100 Fixing Screw', 2320, 1, 2, 0.023, '', 1, '2021-10-02 13:39:58'),
(325, 1, 1, '4.2x25 mm Drywal Screw', 81000, 1, 2, 0.053, '', 1, '2021-10-02 13:40:21'),
(326, 1, 1, '4.2X38 mm Drywall Screw', 46000, 1, 2, 0.053, '', 1, '2021-10-02 13:41:14'),
(327, 1, 1, '4.2X38 mm Drywall Screw', 46000, 1, 2, 0.053, '', 0, '2021-10-02 13:42:20'),
(328, 1, 1, '4.2X38 mm Screw', 8000, 1, 2, 0.053, '', 1, '2021-10-02 13:42:53'),
(329, 1, 1, '3.9x16 Tapping Screw', 40000, 1, 2, 0.06, '', 1, '2021-10-02 13:43:19'),
(330, 1, 1, '3.9x25 Self Dril Screw', 4950, 1, 2, 0.0036, '', 1, '2021-10-02 13:43:50'),
(331, 1, 1, 'Adjustable Double Glass Wedge ( Packing) ( 2 &3&5 Ml)', 1910, 1, 2, 0.03, '', 1, '2021-10-02 13:44:43'),
(332, 1, 1, 'Adjustable Double Glass Wedge ( Packing) 24 mm', 4720, 1, 2, 0.07, '', 1, '2021-10-03 08:28:15'),
(333, 1, 1, 'Hindges Cover (White)', 94, 1, 2, 0.08, '', 1, '2021-10-03 08:28:55'),
(334, 1, 1, 'Hindges Cover', 198, 1, 2, 0.08, '', 1, '2021-10-03 08:29:19'),
(335, 1, 1, 'Finger Catch', 100, 1, 2, 0.15, '', 1, '2021-10-03 08:29:53'),
(336, 1, 1, 'Aluminium Treshold', 60, 1, 4, 12, '', 1, '2021-10-03 08:30:12'),
(337, 1, 1, 'Coupling Profile', 30, 1, 4, 1, '', 1, '2021-10-03 08:30:45'),
(338, 1, 1, 'Window Handle Brown', 100, 1, 2, 0.6, '', 1, '2021-10-03 08:31:07'),
(339, 1, 1, 'Window Handle Silver', 290, 1, 2, 0.7, '', 1, '2021-10-03 08:31:31'),
(340, 1, 1, 'Child Lock (White)', 20, 1, 2, 1, '', 1, '2021-10-03 08:32:20'),
(341, 1, 1, 'Child Lock (Brown)', 14, 1, 2, 1, '', 1, '2021-10-03 08:32:58'),
(342, 1, 1, 'Lap Joint (Brown)', 16, 1, 4, 3, '', 1, '2021-10-03 09:40:21'),
(343, 1, 1, 'Bottom Extension', 3000, 1, 2, 0.35, '', 1, '2021-10-03 09:46:55'),
(344, 1, 1, 'Corner Bearing', 2400, 1, 2, 0.35, '', 1, '2021-10-03 09:50:36'),
(345, 1, 1, 'Corner Transmission', 1700, 1, 2, 0.8, '', 1, '2021-10-03 09:51:03'),
(346, 1, 1, 'Drill in Corner Hindged', 2600, 1, 2, 0.65, '', 1, '2021-10-03 09:51:36'),
(347, 1, 1, 'Stay Arm Bearing', 2300, 1, 2, 0.25, '', 1, '2021-10-03 09:52:02'),
(348, 1, 1, 'Stay Arm Hinged 13/20', 2200, 1, 2, 0.31, '', 1, '2021-10-03 09:52:38'),
(349, 1, 1, 'Stay Arm Hinged 9/20', 1500, 1, 2, 0.31, '', 1, '2021-10-03 09:52:54'),
(350, 1, 1, 'GV Gear 450/700', 1350, 1, 2, 1.05, '', 1, '2021-10-03 09:53:23'),
(351, 1, 1, 'GV Gear 700/1200', 570, 1, 2, 1.15, '', 1, '2021-10-03 09:53:40'),
(352, 1, 1, 'GV Gear 900/1400', 600, 1, 2, 1.2, '', 1, '2021-10-03 09:53:59'),
(353, 1, 1, 'GV Gear 1200/1700', 540, 1, 2, 1.35, '', 1, '2021-10-03 09:54:18'),
(354, 1, 1, 'GV Gear 1700/2200', 650, 1, 2, 1.75, '', 1, '2021-10-03 09:54:36'),
(355, 1, 1, 'Middle Lock 1200/1700', 100, 1, 2, 1.35, '', 1, '2021-10-03 09:55:07'),
(356, 1, 1, 'Middle Lock 1700/2200', 140, 1, 2, 1.75, '', 1, '2021-10-03 09:55:27'),
(357, 1, 1, 'Middle Lock 800/1200', 520, 1, 2, 0.65, '', 1, '2021-10-03 09:55:45'),
(358, 1, 1, 'Middle Lock 850/1400', 400, 1, 2, 1, '', 1, '2021-10-03 09:56:07'),
(359, 1, 1, 'Stay Arm 600/850', 1830, 1, 2, 1.45, '', 1, '2021-10-03 09:56:38'),
(360, 1, 1, 'Stay Arm 850/1100', 1150, 1, 2, 1.65, '', 1, '2021-10-03 09:57:00'),
(361, 1, 1, 'T&T Locking Plate 13mm', 600, 1, 2, 1.6, '', 1, '2021-10-03 09:57:17'),
(362, 1, 1, 'T&T Locking Plate 9mm', 1400, 1, 2, 1.4, '', 1, '2021-10-03 09:57:31'),
(363, 1, 1, 'Sliding Adjustable Roller', 3000, 1, 2, 1, 'Sliding Wheal', 1, '2021-10-03 13:27:10'),
(364, 1, 1, 'Sliding Pool Handle White', 120, 1, 2, 1, '', 1, '2021-10-03 13:27:46'),
(365, 1, 1, 'Sliding Pool Handle Brown', 150, 1, 2, 1, '', 1, '2021-10-03 13:28:52'),
(366, 1, 1, 'Sliding Interlock', 188, 1, 4, 4.2, '', 1, '2021-10-03 13:30:39'),
(367, 1, 1, 'Sliding Block ( Brown )', 50, 1, 2, 0.2, '', 1, '2021-10-03 13:31:46'),
(368, 1, 1, 'Sliding Block ( White )', 119, 0.15, 2, 1, '', 1, '2021-10-03 13:32:20'),
(369, 1, 1, 'Sliding Striker ( A )', 2484, 1, 2, 0.1, '', 1, '2021-10-03 13:33:17'),
(370, 1, 1, 'Sliding Striker ( B )', 3000, 1, 2, 0.1, '', 1, '2021-10-03 13:34:10'),
(371, 1, 1, 'Sliding GV Gear 40cm', 148, 1, 2, 0.6, '', 1, '2021-10-03 13:37:32'),
(372, 1, 1, 'Sliding GV Gear 60cm', 600, 1, 2, 0.7, '', 1, '2021-10-03 13:38:54'),
(373, 1, 1, 'Sliding GV Gear 80cm', 400, 1, 2, 0.8, '', 1, '2021-10-03 13:39:41'),
(374, 1, 1, 'Sliding GV Gear 100cm', 515, 1, 2, 0.9, '', 1, '2021-10-03 13:45:59'),
(375, 1, 1, 'Sliding GV Gear 120cm', 500, 1, 2, 1, '', 1, '2021-10-03 13:46:37'),
(376, 1, 1, 'Sliding GV Gear 140cm', 610, 1, 2, 1.2, '', 1, '2021-10-03 13:47:20'),
(377, 1, 1, 'Sliding GV Gear 160cm', 500, 1, 2, 1.3, '', 1, '2021-10-03 13:48:30'),
(378, 1, 1, 'Sliding GV Gear 180cm', 500, 1, 2, 1.9, '', 1, '2021-10-03 13:49:27'),
(379, 1, 1, 'Sliding GV Gear 200cm', 212, 1, 2, 2.2, '', 1, '2021-10-03 13:50:18'),
(380, 1, 1, 'Slidding Frame (White)', 106, 1, 4, 10.5, '', 1, '2021-10-04 11:10:17'),
(381, 1, 1, 'Slidding Frame (Laminated)', 28, 1, 4, 14.1, '', 1, '2021-10-04 11:10:41'),
(382, 1, 1, 'Slidding Fixed Frame (White)', 120, 1, 4, 12.9, '', 1, '2021-10-04 11:11:09'),
(383, 1, 1, 'Slidding Fixed Frame (Laminated)', 16, 1, 4, 17.7, '', 1, '2021-10-04 11:12:19'),
(384, 1, 1, 'Slidding Sash (White)', 252, 1, 4, 13.8, '', 1, '2021-10-04 11:12:45'),
(385, 1, 1, 'Slidding Sash (Laminated)', 44, 1, 4, 18.9, '', 1, '2021-10-04 11:13:28'),
(386, 1, 1, 'Slidding Inter Lock (Laminated)', 14, 1, 4, 4.2, '', 1, '2021-10-04 11:21:36'),
(387, 1, 1, 'Slidding Aluminyum Rail', 68, 1, 4, 5.4, '', 1, '2021-10-04 11:21:51'),
(388, 1, 1, 'Slidding Aluminyum Interlock', 42, 1, 4, 12, '', 1, '2021-10-04 11:22:08'),
(389, 1, 1, 'Fly Screen Corner 17x25 (White)', 200, 1, 2, 0.06, '', 1, '2021-10-04 11:22:45'),
(390, 1, 1, 'Fly Screen Corner 17x25 (Laminated)', 600, 1, 2, 0.07, '', 1, '2021-10-04 11:23:15'),
(391, 1, 1, 'Fly Screen Handle 17x25 (White)', 1700, 1, 2, 0.06, '', 1, '2021-10-04 11:23:45'),
(392, 1, 1, 'Fly Screen Handle 17x25 (Laminated)', 600, 1, 2, 0.07, '', 1, '2021-10-04 11:24:21'),
(393, 1, 1, 'Fly Screen Handle 17x25 (Dark Brown)', 50, 1, 2, 0.07, '', 1, '2021-10-04 11:24:47'),
(394, 1, 1, 'Fly Screen Hindges 17x25 (White)', 100, 1, 2, 0.06, '', 1, '2021-10-04 11:29:33'),
(395, 1, 1, 'Fly Screen Hindges 17x25 (Laminated)', 800, 1, 2, 0.07, '', 1, '2021-10-04 11:29:57'),
(396, 1, 1, 'Fly Screen Lock 17x25 (Laminated)', 500, 1, 2, 0.07, '', 1, '2021-10-04 11:32:34'),
(397, 1, 1, 'Fly Screen Frame (White)', 72, 1, 4, 6, '', 1, '2021-10-04 11:33:03'),
(398, 1, 1, 'PVC Fly Screen 120cm', 2, 1, 2, 23, '', 1, '2021-10-04 11:33:28'),
(399, 1, 1, 'Spline cardon rubber (White)', 9, 1, 2, 7.7, '', 1, '2021-10-04 11:34:16'),
(400, 1, 1, 'Spline cardon rubber (Black)', 2, 1, 2, 7.7, '', 1, '2021-10-04 11:34:46'),
(401, 1, 1, 'Curtainwal Handle Bossy (Black)', 100, 1, 2, 6.5, '', 1, '2021-10-04 11:35:21'),
(402, 1, 1, 'Curtainwal Stay Arm', 170, 1, 2, 5.5, '', 1, '2021-10-04 11:35:40'),
(403, 1, 1, 'Overlape Profile (Perfect)', 212, 1, 4, 6.9, '', 1, '2021-10-04 14:05:41'),
(404, 1, 1, 'L Frame (Perfect)', 89, 1, 4, 6.9, '', 1, '2021-10-04 11:38:48'),
(405, 1, 1, 'Mullion T (Perfect)', 135, 1, 4, 6.9, '', 1, '2021-10-04 14:05:41'),
(406, 1, 1, 'Window Sash (Perfect)', 50, 1, 4, 7.038, '', 1, '2021-10-04 14:05:41'),
(407, 1, 1, 'Door Sash Inside (Perfect)', 70, 1, 4, 8.97, '', 1, '2021-10-04 11:40:09'),
(408, 1, 1, 'Double Glass Beading (Perfect)', 345, 1, 4, 1.725, '', 1, '2021-10-04 14:05:41'),
(409, 1, 1, 'Single Glass Beading (Perfect)', 200, 1, 4, 2.4, '', 1, '2021-10-04 11:40:58'),
(410, 1, 1, 'Moving Mullion (Perfect)', 36, 1, 4, 6.9, '', 1, '2021-10-04 11:41:21'),
(411, 1, 1, 'Mulion Conector (Perfect)', 1040, 1, 2, 0.196, '', 1, '2021-10-04 11:41:56'),
(412, 1, 1, 'Moving Mullion Cover (Perfect)', 50, 1, 2, 0.3, '', 1, '2021-10-04 11:42:22'),
(413, 1, 1, 'Extra Overlape (Perfect)', 90, 1, 4, 2.76, '', 1, '2021-10-04 11:43:02'),
(414, 1, 1, 'Reinforcement steel Frame (Perfect)', 169, 1, 4, 3.105, '', 1, '2021-10-04 14:05:41'),
(415, 1, 1, 'Window Sash Steel (Perfect)', 84, 1, 4, 2.415, '', 1, '2021-10-04 14:05:41'),
(416, 1, 1, 'Door Sash Steel (Perfect)', 58, 1, 4, 3.795, '', 1, '2021-10-04 11:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `item_purchase`
--

CREATE TABLE `item_purchase` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_purchase`
--

INSERT INTO `item_purchase` (`id`, `company`, `created_by`, `name`, `status`, `reg_date`) VALUES
(1, 1, 0, 'Perfect Profile', 1, '2020-07-14 14:52:28'),
(2, 1, 1, 'Frame Steel', 0, '2020-10-03 15:31:37'),
(3, 1, 1, 'Frame Steel', 0, '2020-10-03 15:33:37'),
(4, 1, 1, 'Frame Steel', 0, '2021-09-28 07:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `item_warehouse`
--

CREATE TABLE `item_warehouse` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `volume` float NOT NULL,
  `unit` varchar(11) NOT NULL,
  `price_per_unit` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `hour` int(11) NOT NULL,
  `min` int(11) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_voucher`
--

CREATE TABLE `payment_voucher` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `payment_method` varchar(11) NOT NULL,
  `pv_number` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `issue_to` varchar(100) NOT NULL,
  `cash_amount` float NOT NULL,
  `bank` text NOT NULL,
  `cheque_number` varchar(100) NOT NULL,
  `cheque_amount` float NOT NULL,
  `cheque_date` date NOT NULL,
  `description` longtext NOT NULL,
  `salt` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `punchcard`
--

CREATE TABLE `punchcard` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `tbl` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `punchcard`
--

INSERT INTO `punchcard` (`id`, `user_id`, `ip`, `tbl`, `reg_date`) VALUES
(1, 1, '85.154.204.6', 'clerk', '2020-02-17 08:12:29'),
(2, 1, '85.154.204.6', 'clerk', '2020-02-17 08:12:48'),
(3, 1, '85.154.204.6', 'clerk', '2020-02-17 08:14:45'),
(4, 1, '85.154.204.6', 'clerk', '2020-02-17 08:21:32'),
(5, 1, '37.41.201.123', 'clerk', '2020-02-23 08:24:56'),
(6, 1, '82.178.90.81', 'clerk', '2020-02-23 08:42:03'),
(7, 1, '82.178.90.81', 'clerk', '2020-02-23 08:44:26'),
(8, 1, '82.178.90.81', 'clerk', '2020-02-23 08:48:18'),
(9, 1, '82.178.84.100', 'clerk', '2020-06-07 04:47:28'),
(10, 1, '82.178.84.100', 'clerk', '2020-06-07 04:50:17'),
(11, 1, '62.61.191.72', 'clerk', '2020-07-14 09:01:31'),
(12, 1, '62.61.191.72', 'clerk', '2020-07-15 06:09:10'),
(13, 1, '82.178.93.0', 'clerk', '2020-07-15 06:27:59'),
(14, 1, '62.61.191.72', 'clerk', '2020-07-15 08:12:12'),
(15, 1, '82.178.93.0', 'clerk', '2020-07-15 11:38:18'),
(16, 1, '37.40.225.138', 'clerk', '2020-07-15 19:09:58'),
(17, 1, '62.61.191.72', 'clerk', '2020-07-16 05:01:37'),
(18, 1, '62.61.191.72', 'clerk', '2020-07-19 04:32:55'),
(19, 1, '37.41.87.122', 'clerk', '2020-07-20 04:39:51'),
(20, 1, '37.41.52.226', 'clerk', '2020-07-20 07:48:14'),
(21, 1, '37.41.87.122', 'clerk', '2020-07-20 07:57:59'),
(22, 1, '37.41.52.226', 'clerk', '2020-07-20 08:08:41'),
(23, 1, '37.41.52.226', 'clerk', '2020-07-20 08:30:06'),
(24, 1, '37.41.87.122', 'clerk', '2020-07-21 06:22:12'),
(25, 1, '37.41.87.122', 'clerk', '2020-07-22 05:08:11'),
(26, 1, '37.41.87.122', 'clerk', '2020-07-22 05:10:14'),
(27, 1, '62.61.166.206', 'clerk', '2020-07-22 05:50:12'),
(28, 1, '37.41.87.122', 'clerk', '2020-07-23 06:27:46'),
(29, 1, '62.61.161.91', 'clerk', '2020-07-26 05:58:54'),
(30, 1, '5.36.128.157', 'clerk', '2020-07-26 07:40:31'),
(31, 1, '62.61.161.91', 'clerk', '2020-07-27 05:29:20'),
(32, 1, '62.61.161.91', 'clerk', '2020-07-27 05:35:17'),
(33, 1, '62.61.161.91', 'clerk', '2020-07-27 05:41:45'),
(34, 1, '62.61.161.91', 'clerk', '2020-07-27 06:05:46'),
(35, 1, '62.61.161.91', 'clerk', '2020-07-27 06:13:49'),
(36, 1, '62.61.161.91', 'clerk', '2020-07-27 08:32:08'),
(37, 1, '5.37.132.29', 'clerk', '2020-07-27 15:35:04'),
(38, 1, '62.61.161.91', 'clerk', '2020-07-28 05:14:50'),
(39, 1, '62.61.161.91', 'clerk', '2020-07-29 06:42:33'),
(40, 1, '5.36.174.124', 'clerk', '2020-07-29 09:24:21'),
(41, 1, '62.61.161.91', 'clerk', '2020-07-29 10:40:51'),
(42, 1, '82.178.232.75', 'clerk', '2020-08-04 05:18:02'),
(43, 1, '5.37.156.45', 'clerk', '2020-08-06 06:05:22'),
(44, 1, '85.154.226.150', 'clerk', '2020-08-10 04:58:12'),
(45, 1, '5.37.145.238', 'clerk', '2020-08-13 04:58:54'),
(46, 1, '5.37.145.238', 'clerk', '2020-08-13 05:52:12'),
(47, 1, '85.154.69.234', 'clerk', '2020-08-18 06:44:11'),
(48, 1, '85.154.69.234', 'clerk', '2020-08-19 06:19:04'),
(49, 1, '85.154.69.234', 'clerk', '2020-08-19 07:33:29'),
(50, 1, '5.36.74.122', 'clerk', '2020-09-01 15:37:49'),
(51, 1, '5.36.74.122', 'clerk', '2020-09-01 15:39:24'),
(52, 1, '5.37.212.37', 'clerk', '2020-09-27 08:43:21'),
(53, 1, '5.37.187.3', 'clerk', '2020-09-30 09:06:02'),
(54, 1, '5.37.187.3', 'clerk', '2020-09-30 12:52:52'),
(55, 1, '5.37.187.3', 'clerk', '2020-09-30 15:29:43'),
(56, 1, '5.36.74.145', 'clerk', '2020-10-01 07:54:30'),
(57, 1, '85.154.206.29', 'clerk', '2020-10-03 13:05:00'),
(58, 1, '85.154.206.29', 'clerk', '2020-10-03 13:12:17'),
(59, 1, '85.154.206.29', 'clerk', '2020-10-03 14:45:37'),
(60, 1, '37.41.169.10', 'clerk', '2020-10-04 03:30:27'),
(61, 1, '82.178.39.211', 'clerk', '2020-10-04 08:55:42'),
(62, 1, '37.41.169.10', 'clerk', '2020-10-04 13:05:40'),
(63, 1, '37.41.169.10', 'clerk', '2020-10-04 15:07:10'),
(64, 1, '37.41.170.217', 'clerk', '2020-10-15 12:56:26'),
(65, 1, '5.36.24.159', 'clerk', '2020-10-17 09:12:20'),
(66, 1, '5.36.77.59', 'clerk', '2020-10-20 03:45:27'),
(67, 1, '5.36.77.191', 'clerk', '2020-10-20 17:44:30'),
(68, 1, '5.37.149.179', 'clerk', '2020-10-22 05:57:34'),
(69, 1, '5.37.149.179', 'clerk', '2020-10-22 08:09:06'),
(70, 1, '5.37.149.179', 'clerk', '2020-10-22 13:29:42'),
(71, 1, '85.154.165.207', 'clerk', '2020-10-24 18:07:08'),
(72, 1, '37.41.140.117', 'clerk', '2020-10-29 07:06:42'),
(73, 1, '37.41.140.117', 'clerk', '2020-10-29 13:43:26'),
(74, 1, '37.41.140.117', 'clerk', '2020-10-29 15:25:12'),
(75, 1, '82.178.187.116', 'clerk', '2020-10-31 03:20:58'),
(76, 1, '82.178.187.116', 'clerk', '2020-10-31 05:30:00'),
(77, 1, '85.154.35.165', 'clerk', '2020-11-03 07:16:17'),
(78, 1, '5.36.32.229', 'clerk', '2020-11-07 06:56:02'),
(79, 1, '5.37.185.15', 'clerk', '2020-11-09 14:10:56'),
(80, 1, '5.36.136.146', 'clerk', '2020-11-24 15:40:24'),
(81, 1, '82.178.6.79', 'clerk', '2021-09-21 03:41:17'),
(82, 1, '85.154.47.149', 'clerk', '2021-09-27 12:58:50'),
(83, 1, '82.178.105.68', 'clerk', '2021-09-28 06:27:53'),
(84, 1, '82.178.105.68', 'clerk', '2021-09-28 12:31:01'),
(85, 1, '82.178.80.154', 'clerk', '2021-09-29 04:17:28'),
(86, 1, '82.178.7.96', 'clerk', '2021-09-29 12:08:29'),
(87, 1, '5.37.228.122', 'clerk', '2021-09-29 13:43:06'),
(88, 1, '5.36.202.43', 'clerk', '2021-10-02 08:05:01'),
(89, 1, '85.154.149.154', 'clerk', '2021-10-02 08:05:10'),
(90, 1, '85.154.149.154', 'clerk', '2021-10-02 11:47:30'),
(91, 1, '5.36.202.43', 'clerk', '2021-10-02 13:29:10'),
(92, 1, '5.36.202.43', 'clerk', '2021-10-03 08:16:33'),
(93, 1, '5.36.202.43', 'clerk', '2021-10-03 09:39:00'),
(94, 1, '5.36.20.161', 'clerk', '2021-10-03 12:51:26'),
(95, 1, '85.154.68.207', 'clerk', '2021-10-04 08:21:29'),
(96, 1, '5.36.202.43', 'clerk', '2021-10-04 10:48:20'),
(97, 1, '5.36.121.221', 'clerk', '2021-10-04 13:18:21'),
(98, 1, '82.178.43.222', 'clerk', '2021-10-07 05:50:17'),
(99, 1, '85.154.125.67', 'clerk', '2021-10-11 04:58:07'),
(100, 1, '82.178.111.186', 'clerk', '2021-10-11 12:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_invoice`
--

CREATE TABLE `purchase_invoice` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `supplier` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(11) NOT NULL DEFAULT 'percentage',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `volume` float NOT NULL,
  `unit` float NOT NULL,
  `price` float NOT NULL,
  `type` int(11) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_paid`
--

CREATE TABLE `purchase_paid` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `type` varchar(11) NOT NULL DEFAULT 'cash',
  `paid` float NOT NULL,
  `description` text,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_paid_cheque`
--

CREATE TABLE `purchase_paid_cheque` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `purchase_paid_id` int(11) NOT NULL,
  `to_assigned` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `c_number` varchar(100) NOT NULL,
  `dated` datetime NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_stock`
--

CREATE TABLE `purchase_stock` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `volume` float NOT NULL,
  `unit` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_usage`
--

CREATE TABLE `purchase_usage` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `stock_item` int(11) NOT NULL,
  `quantity` float NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `receive_voucher`
--

CREATE TABLE `receive_voucher` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `payment_method` varchar(11) NOT NULL,
  `rv_number` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `issue_from` varchar(100) NOT NULL,
  `cash_amount` float NOT NULL,
  `bank` text NOT NULL,
  `cheque_number` varchar(100) NOT NULL,
  `cheque_amount` float NOT NULL,
  `cheque_date` date NOT NULL,
  `description` longtext NOT NULL,
  `salt` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `present` int(11) NOT NULL,
  `present_val` float NOT NULL,
  `overtime` int(11) NOT NULL,
  `overtime_val` float NOT NULL,
  `allowance` float NOT NULL,
  `other_allowance` float NOT NULL,
  `gross_salary` float NOT NULL,
  `advance` float NOT NULL,
  `other_deduction` float NOT NULL,
  `total_deduction` float NOT NULL,
  `salary_to_be_paid` float NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoice`
--

CREATE TABLE `sale_invoice` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(11) NOT NULL DEFAULT 'percentage',
  `aging` float NOT NULL,
  `type` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_invoice`
--

INSERT INTO `sale_invoice` (`id`, `company`, `created_by`, `customer`, `discount`, `discount_type`, `aging`, `type`, `status`, `reg_date`) VALUES
(1, 1, 1, 1, 1, 'fixed', 0, 'cash', 1, '2020-06-15 00:00:00'),
(2, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-07-15 00:00:00'),
(3, 1, 1, 1, 3, 'fixed', 15, 'credit', 1, '2020-07-15 00:00:00'),
(4, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-07-16 00:00:00'),
(5, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-07-16 00:00:00'),
(6, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-07-26 00:00:00'),
(7, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-07-26 00:00:00'),
(8, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-07-26 00:00:00'),
(9, 1, 1, 1, 10, 'fixed', 0, 'credit', 1, '2020-08-13 00:00:00'),
(10, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2021-07-01 00:00:00'),
(11, 1, 1, 0, 400, '', 0, 'credit', 1, '2021-07-01 00:00:00'),
(12, 1, 1, 1, 0, 'percentage', 0, 'credit', 1, '2020-10-01 00:00:00'),
(13, 0, 1, 1, 100, 'percentage', 0, 'credit', 1, '2020-10-01 00:00:00'),
(14, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-01 00:00:00'),
(15, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(16, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-10-04 00:00:00'),
(17, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(18, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(19, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(20, 0, 1, 0, 100, '', 0, 'credit', 1, '2020-10-04 00:00:00'),
(21, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(22, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(23, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(24, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-10-04 00:00:00'),
(25, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2020-11-22 00:00:00'),
(26, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(27, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(28, 1, 1, 1, 21, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(29, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(30, 1, 1, 1, 5, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(31, 1, 1, 0, 1, '', 3, 'credit', 1, '2020-11-03 00:00:00'),
(32, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(33, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(34, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(35, 0, 1, 1, 8, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(36, 1, 1, 1, 9, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(37, 1, 1, 1, 0, '', 8, 'credit', 1, '2021-01-03 00:00:00'),
(38, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(39, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(40, 0, 1, 0, 0, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(41, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(42, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(43, 0, 1, 1, 0, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(44, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(45, 1, 1, 1, 0, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(46, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(47, 0, 1, 0, 0, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(48, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(49, 1, 1, 1, 0, '', 0, 'credit', 1, '2020-11-03 00:00:00'),
(50, 1, 1, 1, 0, 'fixed', 0, 'credit', 1, '2020-11-03 00:00:00'),
(51, 1, 1, 1, 0, 'fixed', 0, 'cash', 1, '2021-11-04 00:00:00'),
(52, 1, 1, 0, 0, 'fixed', 0, 'cash', 1, '2021-08-04 00:00:00'),
(53, 1, 1, 1, 0.1, 'fixed', 0, 'cash', 1, '2021-10-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoice_wh`
--

CREATE TABLE `sale_invoice_wh` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `customer` int(11) NOT NULL,
  `discount` float NOT NULL,
  `discount_type` varchar(11) NOT NULL DEFAULT 'percentage',
  `aging` float NOT NULL,
  `type` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_inv_order`
--

CREATE TABLE `sale_inv_order` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_inv_order`
--

INSERT INTO `sale_inv_order` (`id`, `company`, `created_by`, `inv`, `status`, `remarks`, `reg_date`) VALUES
(1, 1, 1, 1, 'delivered', 'Enter Remarks', '2020-06-15 00:00:00'),
(2, 1, 1, 2, 'delivered', 'Enter Remarks', '2020-07-15 00:00:00'),
(3, 1, 1, 3, 'delivered', 'Enter Remarks', '2020-07-15 00:00:00'),
(4, 1, 1, 4, 'delivered', 'Enter Remarks', '2020-07-16 00:00:00'),
(5, 1, 1, 5, 'delivered', 'Enter Remarks', '2020-07-16 00:00:00'),
(6, 1, 1, 6, 'nondelivered', 'Enter Remarks', '2020-07-26 00:00:00'),
(7, 1, 1, 7, 'delivered', 'Enter Remarks', '2020-07-26 00:00:00'),
(8, 1, 1, 8, 'delivered', 'Enter Remarks', '2020-07-26 00:00:00'),
(9, 1, 1, 9, 'delivered', 'Enter Remarks', '2020-08-13 00:00:00'),
(10, 1, 1, 10, 'delivered', 'Enter Remarks', '2021-07-01 00:00:00'),
(11, 1, 1, 11, 'delivered', 'Enter Remarks', '2021-07-01 00:00:00'),
(12, 1, 1, 12, 'delivered', 'Enter Remarks', '2020-10-01 00:00:00'),
(13, 0, 1, 13, 'delivered', 'Enter Remarks', '2020-10-01 00:00:00'),
(14, 1, 1, 14, 'delivered', 'Material Delivered To Factory', '2020-10-01 00:00:00'),
(15, 1, 1, 15, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(16, 1, 1, 16, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(17, 1, 1, 17, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(18, 1, 1, 18, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(19, 1, 1, 19, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(20, 0, 1, 20, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(21, 1, 1, 21, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(22, 1, 1, 22, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(23, 1, 1, 23, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(24, 1, 1, 24, 'delivered', 'Enter Remarks', '2020-10-04 00:00:00'),
(25, 1, 1, 25, 'delivered', 'Enter Remarks', '2020-11-22 00:00:00'),
(26, 1, 1, 26, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(27, 1, 1, 27, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(28, 1, 1, 28, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(29, 1, 1, 29, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(30, 1, 1, 30, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(31, 1, 1, 31, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(32, 1, 1, 32, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(33, 1, 1, 33, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(34, 1, 1, 34, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(35, 0, 1, 35, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(36, 1, 1, 36, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(37, 1, 1, 37, 'delivered', 'Enter Remarks', '2021-01-03 00:00:00'),
(38, 1, 1, 38, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(39, 1, 1, 39, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(40, 0, 1, 40, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(41, 1, 1, 41, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(42, 1, 1, 42, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(43, 0, 1, 43, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(44, 1, 1, 44, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(45, 1, 1, 45, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(46, 1, 1, 46, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(47, 0, 1, 47, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(48, 1, 1, 48, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(49, 1, 1, 49, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(50, 1, 1, 50, 'delivered', 'Enter Remarks', '2020-11-03 00:00:00'),
(51, 1, 1, 51, 'delivered', 'Enter Remarks', '2021-11-04 00:00:00'),
(52, 1, 1, 52, 'delivered', 'Enter Remarks', '2021-08-04 00:00:00'),
(53, 1, 1, 53, 'delivered', 'Enter Remarks', '2021-10-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sale_inv_order_wh`
--

CREATE TABLE `sale_inv_order_wh` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remarks` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_item`
--

CREATE TABLE `sale_item` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `volume` float NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price_per_unit` float NOT NULL,
  `grouping` varchar(100) NOT NULL,
  `grouping_qty` float NOT NULL,
  `returned` tinyint(1) NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_item`
--

INSERT INTO `sale_item` (`id`, `inv`, `item_id`, `item`, `quantity`, `volume`, `unit`, `price_per_unit`, `grouping`, `grouping_qty`, `returned`, `reg_date`) VALUES
(1, 1, 1, 'Sash', 9, 6, 'meter', 1, 'Sash', 1, 0, '2020-07-15 03:08:55'),
(2, 2, 2, '3D Hindges', 50, 100, 'pcs', 3, '3D Hindges (Black)', 1, 0, '2020-07-15 04:19:05'),
(3, 3, 4, '3D Hindges ', 25, 1, 'pcs', 3, '3D Hindges (Black)', 1, 0, '2020-07-15 04:28:34'),
(4, 4, 16, 'Door Handle', 12, 25, 'Packet', 2, '3D Hindges', 1, 0, '2020-07-16 01:13:37'),
(5, 5, 4, '3D Hindges ', 20, 1, 'pcs', 3, '3D Hindges', 1, 0, '2020-07-16 01:20:09'),
(6, 6, 25, 'glass packing', 2, 1, 'Packet', 1, 'single piece', 1, 0, '2020-07-26 02:05:21'),
(7, 7, 36, 'Window Sash 24mm', 10, 30, 'Packet', 1, 'single piece', 1, 0, '2020-07-26 02:31:30'),
(8, 8, 37, 'Door Sash 24mm', 5, 4, 'pcs', 1, 'single piece', 1, 0, '2020-07-26 02:38:58'),
(9, 9, 44, 'Overlap Frame', 80, 1, 'pcs', 1, 'single piece', 1, 0, '2020-08-13 02:22:44'),
(10, 10, 110, 'Fly Screen Net Corner', 400, 1, 'pcs', 0.1, 'PACKET', 4, 0, '2020-10-01 04:02:37'),
(11, 11, 110, 'Fly Screen Net Corner', 400, 1, 'pcs', 0.1, 'single piece', 1, 0, '2020-10-01 04:04:54'),
(12, 12, 110, 'Fly Screen Net Corner', 100, 1, 'pcs', 0.1, 'single piece', 1, 0, '2020-10-01 04:30:35'),
(13, 13, 110, 'Fly Screen Net Corner', 400, 1, 'pcs', 0.1, 'single piece', 1, 0, '2020-10-01 04:31:43'),
(14, 14, 110, 'Fly Screen Net Corner', 400, 1, 'pcs', 0.1, 'single piece', 1, 0, '2020-10-01 04:33:53'),
(15, 15, 44, 'Overlap Frame', 4, 1, 'pcs', 1, 'single piece', 1, 0, '2020-10-04 09:13:37'),
(16, 15, 44, 'Overlap Frame', 7, 1, 'pcs', 1, 'single piece', 1, 0, '2020-10-04 09:13:37'),
(17, 16, 44, 'Overlap Frame', 6, 1, 'pcs', 1, 'single piece', 1, 0, '2020-10-04 09:19:55'),
(18, 16, 44, 'Overlap Frame', 7, 1, 'pcs', 1, 'single piece', 1, 0, '2020-10-04 09:19:55'),
(19, 17, 111, 'Frame Steel', 7, 1, 'Length', 2.7, 'single piece', 1, 0, '2020-10-04 09:38:58'),
(20, 18, 44, 'Overlap Frame', 4, 1, 'pcs', 6, 'single piece', 1, 0, '2020-10-04 09:43:06'),
(21, 19, 110, 'Fly Screen Net Corner', 100, 1, 'pcs', 0.1, 'PACKET', 4, 0, '2020-10-04 11:30:17'),
(22, 20, 110, 'Fly Screen Net Corner', 100, 1, 'pcs', 0.1, 'single piece', 1, 0, '2020-10-04 11:31:31'),
(23, 21, 117, 'Fly Screen Hindge', 100, 1, 'Packet', 0.08, 'single piece', 1, 0, '2020-10-04 11:39:29'),
(24, 22, 110, 'Fly Screen Net Corner', 100, 1, 'pcs', 0.1, 'single piece', 1, 0, '2020-10-04 11:44:24'),
(25, 23, 0, '', 200, 0, 'X(O', 0, 'single piece', 1, 0, '2020-10-04 11:46:53'),
(26, 24, 116, 'Fly Screen Handle', 200, 1, 'Packet', 0.08, 'single piece', 1, 0, '2020-10-04 11:52:11'),
(27, 25, 119, '3 D HINDGES BROWN', 3, 96, 'pcs', 3, 'single piece', 1, 0, '2020-10-22 02:24:20'),
(28, 26, 244, 'TILT AND TURN ACCES', 2, 500, 'Packet', 50, 'PACKET', 4, 0, '2020-11-03 02:23:55'),
(29, 27, 176, 'MULLION CONECTOR MY WIN', 21, 4000, 'pcs', 0.17, 'single piece', 1, 0, '2020-11-03 02:29:06'),
(30, 28, 168, 'EXTRA OVERLAPE MYWIN', 5, 25, 'Length', 3, 'single piece', 1, 0, '2020-11-03 02:34:15'),
(31, 29, 148, 'OVERLAPE FRAME MYWIN WHITE', 5, 100, 'Length', 6, 'single piece', 1, 0, '2020-11-03 02:52:55'),
(32, 29, 148, 'OVERLAPE FRAME MYWIN WHITE', 3, 100, 'Length', 6, 'single piece', 1, 0, '2020-11-03 02:52:55'),
(33, 30, 153, 'WINDOW SASH MY WIN WHITE', 1, 112, 'Length', 6.12, 'Dozen', 12, 0, '2020-11-03 02:58:50'),
(34, 31, 153, 'WINDOW SASH MY WIN WHITE', 1, 112, 'Length', 6.12, 'single piece', 1, 0, '2020-11-03 02:59:46'),
(35, 32, 246, 'DOOR SASH', 2, 150, 'Length', 7.8, 'Dozen', 12, 0, '2020-11-03 03:02:52'),
(36, 33, 246, 'DOOR SASH', 2, 150, 'Length', 7.8, 'single piece', 1, 0, '2020-11-03 03:04:40'),
(37, 34, 247, 'frame steel', 8, 100, 'Length', 2.7, 'single piece', 1, 0, '2020-11-03 03:07:14'),
(38, 35, 247, 'frame steel', 9, 100, 'Length', 2.7, 'single piece', 1, 0, '2020-11-03 03:12:11'),
(39, 36, 247, 'frame steel', 9, 100, 'Length', 2.7, 'single piece', 1, 0, '2020-11-03 03:13:55'),
(40, 37, 247, 'frame steel', 9, 100, 'Length', 2.7, 'single piece', 1, 0, '2020-11-03 03:15:00'),
(41, 38, 161, 'DOUBLE GLASS BEADING 24MM WHITE', 9, 375, 'Length', 0.25, 'single piece', 1, 0, '2020-11-03 03:17:55'),
(42, 39, 161, 'DOUBLE GLASS BEADING 24MM WHITE', 9, 375, 'Length', 1.5, 'Dozen', 12, 0, '2020-11-03 03:19:01'),
(43, 40, 161, 'DOUBLE GLASS BEADING 24MM WHITE', 9, 375, 'Length', 1.5, 'single piece', 1, 0, '2020-11-03 03:19:40'),
(44, 41, 161, 'DOUBLE GLASS BEADING 24MM WHITE', 12, 375, 'Length', 1.5, 'single piece', 1, 0, '2020-11-03 03:20:55'),
(45, 42, 250, 'Self Thread', 250, 2500, 'pcs', 0.1, 'single piece', 1, 0, '2020-11-03 03:28:45'),
(46, 43, 250, 'Self Thread', 25, 2500, 'pcs', 0.1, 'single piece', 1, 0, '2020-11-03 03:29:14'),
(47, 44, 247, 'frame steel', 12, 100, 'Length', 2.7, 'single piece', 1, 0, '2020-11-03 03:31:07'),
(48, 45, 247, 'frame steel', 15, 100, 'Length', 2.7, 'single piece', 1, 0, '2020-11-03 03:32:51'),
(49, 46, 244, 'TILT AND SLIDE ACCES', 2, 500, 'Packet', 50, 'PACKET', 4, 0, '2020-11-03 03:36:00'),
(50, 47, 244, 'TILT AND SLIDE ACCES', 2, 500, 'Packet', 50, 'single piece', 1, 0, '2020-11-03 03:36:41'),
(51, 48, 251, 'TILT & TURN ACCES', 1, 250, 'Packet', 14, 'single piece', 1, 0, '2020-11-03 03:37:47'),
(52, 49, 148, 'OVERLAPE FRAME MYWIN WHITE', 5, 100, 'Length', 6, 'single piece', 1, 0, '2020-11-03 03:53:26'),
(53, 50, 151, 'MULION T PROFILE MY WIN WHITE', 3, 140, 'Length', 6.6, 'single piece', 1, 0, '2020-11-03 03:57:51'),
(54, 51, 403, 'Overlape Profile (Perfect)', 5, 1, 'Length', 6.9, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(55, 51, 414, 'Reinforcement steel Frame (Perfect)', 3, 1, 'Length', 3.105, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(56, 51, 406, 'Window Sash (Perfect)', 2, 1, 'Length', 7.038, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(57, 51, 415, 'Window Sash Steel (Perfect)', 2, 1, 'Length', 2.415, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(58, 51, 405, 'Mullion T (Perfect)', 3, 1, 'Length', 6.9, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(59, 51, 414, 'Reinforcement steel Frame (Perfect)', 3, 1, 'Length', 3.105, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(60, 51, 408, 'Double Glass Beading (Perfect)', 8, 1, 'Length', 1.725, 'single piece', 1, 0, '2021-10-04 10:05:41'),
(61, 52, 284, 'Frame Profile 70mm', 1, 1, 'Length', 6, 'single piece', 1, 0, '2021-10-04 10:15:42'),
(62, 53, 252, '3 D HINDGES BLACK', 1, 1, 'pcs', 2.6, 'single piece', 1, 0, '2021-10-11 01:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `sale_item_returned`
--

CREATE TABLE `sale_item_returned` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sale_item_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `volume` float NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price_per_unit` float NOT NULL,
  `remarks` text,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_item_returned_wh`
--

CREATE TABLE `sale_item_returned_wh` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `sale_item_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `volume` float NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price_per_unit` float NOT NULL,
  `remarks` text,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_item_wh`
--

CREATE TABLE `sale_item_wh` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantity` float NOT NULL,
  `volume` float NOT NULL,
  `unit` varchar(100) NOT NULL,
  `price_per_unit` float NOT NULL,
  `grouping` varchar(100) NOT NULL,
  `grouping_qty` float NOT NULL,
  `returned` tinyint(1) NOT NULL DEFAULT '0',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_paid`
--

CREATE TABLE `sale_paid` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `paid` float NOT NULL,
  `description` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale_paid`
--

INSERT INTO `sale_paid` (`id`, `inv`, `type`, `paid`, `description`, `reg_date`) VALUES
(2, 1, 'cash', 5, 'inst 1', '2020-07-15 03:10:39'),
(3, 1, 'cash', 3, 'secnd inst', '2020-07-15 03:11:08'),
(4, 2, '', 120, '', '2020-07-15 04:19:05'),
(5, 2, 'cash', 30, '', '2020-07-15 04:19:43'),
(6, 5, 'cash', 60, 'sold', '2020-07-16 01:20:44'),
(7, 6, '', 1, '', '2020-07-26 02:05:21'),
(8, 30, '', 3, '', '2020-11-03 02:58:50'),
(9, 31, '', 5, '', '2020-11-03 02:59:46'),
(10, 36, '', 8, '', '2020-11-03 03:13:55'),
(11, 51, '', 106.53, '', '2021-10-04 10:05:41'),
(12, 52, '', 6, '', '2021-10-04 10:15:42'),
(13, 53, '', 2.5, '', '2021-10-11 01:04:40');

-- --------------------------------------------------------

--
-- Table structure for table `sale_paid_cheque`
--

CREATE TABLE `sale_paid_cheque` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `sale_paid_id` int(11) NOT NULL,
  `to_assigned` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `c_number` varchar(100) NOT NULL,
  `dated` datetime NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_paid_cheque_wh`
--

CREATE TABLE `sale_paid_cheque_wh` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `sale_paid_id` int(11) NOT NULL,
  `to_assigned` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `c_number` varchar(100) NOT NULL,
  `dated` datetime NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sale_paid_wh`
--

CREATE TABLE `sale_paid_wh` (
  `id` int(11) NOT NULL,
  `inv` int(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `paid` float NOT NULL,
  `description` text NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `item_threshold` int(15) NOT NULL,
  `aging_days` int(9) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `item_threshold`, `aging_days`, `status`, `reg_date`) VALUES
(1, 15, 15, 1, '2020-02-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `phone` int(11) NOT NULL,
  `fax` int(11) NOT NULL,
  `email` text NOT NULL,
  `supplier_company` text NOT NULL,
  `remarks` text NOT NULL,
  `salt` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE `transaction_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `company`, `created_by`, `name`, `status`, `reg_date`) VALUES
(1, 1, 1, 'meter', 1, '2020-07-15 07:03:07'),
(2, 1, 1, 'pcs', 1, '2020-07-15 08:13:35'),
(3, 1, 1, 'Packet', 1, '2020-07-15 08:25:53'),
(4, 1, 1, 'Length', 1, '2020-07-27 05:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `update_log`
--

CREATE TABLE `update_log` (
  `id` int(11) NOT NULL,
  `tbl` varchar(100) NOT NULL,
  `entity_id` int(11) NOT NULL COMMENT 'id of that update row',
  `data_before` text NOT NULL COMMENT 'data before update',
  `data_after` text NOT NULL COMMENT 'data after update',
  `status` tinyint(1) NOT NULL,
  `reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_log`
--

INSERT INTO `update_log` (`id`, `tbl`, `entity_id`, `data_before`, `data_after`, `status`, `reg_date`) VALUES
(1, 'item', 78, '{\"id\":\"78\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Window Restrictor\",\"quantity\":\"20\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 03:11:46\"}', '{\"item\":\"78\",\"name\":\"Window Restrictors\",\"qty\":\"20\",\"desc\":\"\"}', 1, '2020-07-27 11:35:35'),
(2, 'item', 65, '{\"id\":\"65\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Tilt\",\"quantity\":\"1800\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"each box 100pcs\",\"status\":\"1\",\"reg_date\":\"2020-07-27 01:52:29\"}', '{\"item\":\"65\",\"name\":\"Tilt & Turn Sticker Plate 9mm\",\"qty\":\"1800\",\"desc\":\"each box 100pcs\"}', 1, '2020-07-28 01:32:41'),
(3, 'item', 82, '{\"id\":\"82\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Winex Brown 3D Hinges\",\"quantity\":\"2\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 03:15:59\"}', '{\"item\":\"82\",\"name\":\"Winex Brown 3D Hinges\",\"qty\":\"22\",\"volume\":\"11\",\"unit\":\"4\",\"price_per_unit\":\"11\",\"desc\":\"test\"}', 1, '2020-07-29 05:24:58'),
(4, 'item', 82, '{\"id\":\"82\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Winex Brown 3D Hinges\",\"quantity\":\"22\",\"volume\":\"11\",\"unit\":\"Length\",\"price_per_unit\":\"11\",\"sale_item_desc\":\"test\",\"status\":\"1\",\"reg_date\":\"2020-07-29 05:24:58\"}', '{\"item\":\"82\",\"name\":\"Winex Brown 3D Hinges\",\"qty\":\"2\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"1\",\"desc\":\"\"}', 1, '2020-07-29 05:25:31'),
(5, 'item', 82, '{\"id\":\"82\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Winex Brown 3D Hinges\",\"quantity\":\"2\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-29 05:25:31\"}', '{\"item\":\"82\",\"name\":\"Winex Brown 3D Hinges\",\"qty\":\"2\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"1\",\"desc\":\"\"}', 1, '2020-08-19 03:35:49'),
(6, 'item', 81, '{\"id\":\"81\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Winex White 3D Hinges\",\"quantity\":\"5\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 03:15:11\"}', '{\"item\":\"81\",\"name\":\"White 3D Hinges\",\"qty\":\"672\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"2.5\",\"desc\":\"White Colour\"}', 1, '2020-09-30 05:35:22'),
(7, 'item', 78, '{\"id\":\"78\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Window Restrictors\",\"quantity\":\"20\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 11:35:35\"}', '{\"item\":\"78\",\"name\":\"Window Striker\",\"qty\":\"9000\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\".100\",\"desc\":\"Each CTN 1000 Pcs\"}', 1, '2020-09-30 05:41:09'),
(8, 'item', 95, '{\"id\":\"95\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Mullion Conector\",\"quantity\":\"6000\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"0.17\",\"sale_item_desc\":\"Each Box 400 Pcs\",\"status\":\"1\",\"reg_date\":\"2020-08-13 02:25:36\"}', '{\"item\":\"95\",\"name\":\"Mullion Conector My Win\",\"qty\":\"3600\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"0.17\",\"desc\":\"Each Box 400 Pcs\"}', 1, '2020-09-30 05:42:30'),
(9, 'item', 87, '{\"id\":\"87\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Brown Door Handle with Cylinder\",\"quantity\":\"50\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 03:24:22\"}', '{\"item\":\"87\",\"name\":\"Brown Door Handle with Cylinder\",\"qty\":\"200\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"3\",\"desc\":\"Brown Colour Hndle\"}', 1, '2020-09-30 09:07:49'),
(10, 'item', 88, '{\"id\":\"88\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"White Door Handle with Cylinder\",\"quantity\":\"123\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 03:27:16\"}', '{\"item\":\"88\",\"name\":\"White Door Handle with Cylinder\",\"qty\":\"2100\",\"volume\":\"21\",\"unit\":\"2\",\"price_per_unit\":\"1.800\",\"desc\":\"White Colour Handle\"}', 1, '2020-09-30 09:09:06'),
(11, 'item', 101, '{\"id\":\"101\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"door handle toilet\",\"quantity\":\"300\",\"volume\":\"3\",\"unit\":\"Length\",\"price_per_unit\":\"2\",\"sale_item_desc\":\"Brown colour toilet knock handle\",\"status\":\"1\",\"reg_date\":\"2020-09-30 09:10:26\"}', '{\"item\":\"101\",\"name\":\"door handle toilet\",\"qty\":\"300\",\"volume\":\"3\",\"unit\":\"2\",\"price_per_unit\":\"2\",\"desc\":\"Brown colour toilet knock handle\"}', 1, '2020-09-30 09:10:49'),
(12, 'item', 101, '{\"id\":\"101\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"door handle toilet\",\"quantity\":\"300\",\"volume\":\"3\",\"unit\":\"pcs\",\"price_per_unit\":\"2\",\"sale_item_desc\":\"Brown colour toilet knock handle\",\"status\":\"1\",\"reg_date\":\"2020-09-30 09:10:49\"}', '{\"item\":\"101\",\"name\":\"door handle toilet ( Brown )\",\"qty\":\"300\",\"volume\":\"3\",\"unit\":\"2\",\"price_per_unit\":\"2\",\"desc\":\"Brown colour toilet knock handle\"}', 1, '2020-09-30 09:34:51'),
(13, 'item', 88, '{\"id\":\"88\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"White Door Handle with Cylinder\",\"quantity\":\"2100\",\"volume\":\"21\",\"unit\":\"pcs\",\"price_per_unit\":\"1.8\",\"sale_item_desc\":\"White Colour Handle\",\"status\":\"1\",\"reg_date\":\"2020-09-30 09:09:06\"}', '{\"item\":\"88\",\"name\":\"White Door Handle with Cylinder\",\"qty\":\"2100\",\"volume\":\"21\",\"unit\":\"2\",\"price_per_unit\":\"1.8\",\"desc\":\"White Colour Handle\"}', 1, '2020-09-30 09:38:22'),
(14, 'item', 90, '{\"id\":\"90\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Big White Quick Hinges\",\"quantity\":\"630\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-27 03:47:00\"}', '{\"item\":\"90\",\"name\":\"Quick Hinges White 90mm Door\",\"qty\":\"1100\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"0.500\",\"desc\":\"Each CTN 100 Pcs\"}', 1, '2020-09-30 09:45:12'),
(15, 'item', 99, '{\"id\":\"99\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"lOCKING PLATE SMALL\",\"quantity\":\"400\",\"volume\":\"100\",\"unit\":\"pcs\",\"price_per_unit\":\"0.2\",\"sale_item_desc\":\"RESPONSE FOR LOCK LONG\",\"status\":\"1\",\"reg_date\":\"2020-09-30 09:02:19\"}', '{\"item\":\"99\",\"name\":\"lOCKING PLATE SMALL\",\"qty\":\"400\",\"volume\":\"100\",\"unit\":\"2\",\"price_per_unit\":\"0.2\",\"desc\":\"RESPONSE FOR LOCK SMALL\"}', 1, '2020-09-30 10:03:34'),
(16, 'item', 71, '{\"id\":\"71\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Big Locking Plate\",\"quantity\":\"800\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"each box 100pcs\",\"status\":\"1\",\"reg_date\":\"2020-07-27 02:11:57\"}', '{\"item\":\"71\",\"name\":\"Big Locking Plate\",\"qty\":\"800\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"1\",\"desc\":\"Response Lock Big\"}', 1, '2020-09-30 10:04:37'),
(17, 'item', 110, '{\"id\":\"110\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Fly Screen Net Corner\",\"quantity\":\"0\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"0.1\",\"sale_item_desc\":\"Net Corner\",\"status\":\"1\",\"reg_date\":\"2020-10-01 04:04:54\"}', '{\"item\":\"110\",\"name\":\"Fly Screen Net Corner\",\"qty\":\"1500\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"0.1\",\"desc\":\"Net Corner\"}', 1, '2020-10-01 04:23:32'),
(18, 'item', 44, '{\"id\":\"44\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Overlap Frame\",\"quantity\":\"576\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-10-04 09:19:55\"}', '{\"item\":\"44\",\"name\":\"Overlap Frame\",\"qty\":\"576\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"6\",\"desc\":\"\"}', 1, '2020-10-04 09:23:30'),
(19, 'item', 111, '{\"id\":\"111\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Frame Steel\",\"quantity\":\"150\",\"volume\":\"1\",\"unit\":\"Length\",\"price_per_unit\":\"2.7\",\"sale_item_desc\":\"Overlape&Mulion T\",\"status\":\"1\",\"reg_date\":\"2020-10-03 11:53:06\"}', '{\"item\":\"111\",\"name\":\"Frame Steel\",\"qty\":\"150\",\"volume\":\"1\",\"unit\":\"4\",\"price_per_unit\":\"2.7\",\"desc\":\"Overlape&Mulion T\"}', 1, '2020-10-04 09:36:16'),
(20, 'item', 116, '{\"id\":\"116\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Fly Screen Handle\",\"quantity\":\"100\",\"volume\":\"1\",\"unit\":\"Packet\",\"price_per_unit\":\"0.08\",\"sale_item_desc\":\"Net Handle\",\"status\":\"1\",\"reg_date\":\"2020-10-04 11:12:27\"}', '{\"item\":\"116\",\"name\":\"Fly Screen Handle\",\"qty\":\"600\",\"volume\":\"1\",\"unit\":\"3\",\"price_per_unit\":\"0.08\",\"desc\":\"Net Handle\"}', 1, '2020-10-04 11:51:17'),
(21, 'item', 118, '{\"id\":\"118\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Locking Plate T&T\",\"quantity\":\"100\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"0.14\",\"sale_item_desc\":\"T&T Locking Plate\",\"status\":\"1\",\"reg_date\":\"2020-10-04 11:25:13\"}', '{\"item\":\"118\",\"name\":\"Locking Plate T&T\",\"qty\":\"500\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"0.14\",\"desc\":\"T&T Locking Plate\"}', 1, '2020-10-04 11:53:41'),
(22, 'item', 111, '{\"id\":\"111\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Frame Steel\",\"quantity\":\"143\",\"volume\":\"1\",\"unit\":\"Length\",\"price_per_unit\":\"2.7\",\"sale_item_desc\":\"Overlape&Mulion T\",\"status\":\"1\",\"reg_date\":\"2020-10-04 09:38:58\"}', '{\"item\":\"111\",\"name\":\"Frame Steel\",\"qty\":\"143\",\"volume\":\"1\",\"unit\":\"4\",\"price_per_unit\":\"2.7\",\"desc\":\"Overlape&Mulion T\"}', 1, '2020-10-04 12:12:32'),
(23, 'item', 110, '{\"id\":\"110\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Fly Screen Net Corner\",\"quantity\":\"0\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"0.1\",\"sale_item_desc\":\"Net Corner\",\"status\":\"1\",\"reg_date\":\"2020-10-04 11:44:24\"}', '{\"item\":\"110\",\"name\":\"Fly Screen Net Corner\",\"qty\":\"1500\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"0.1\",\"desc\":\"Net Corner\"}', 1, '2020-10-04 12:16:46'),
(24, 'item', 117, '{\"id\":\"117\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Fly Screen Hindge\",\"quantity\":\"0\",\"volume\":\"1\",\"unit\":\"Packet\",\"price_per_unit\":\"0.08\",\"sale_item_desc\":\"Net Hindge\",\"status\":\"1\",\"reg_date\":\"2020-10-04 11:39:29\"}', '{\"item\":\"117\",\"name\":\"Fly Screen Hindge\",\"qty\":\"1500\",\"volume\":\"1\",\"unit\":\"3\",\"price_per_unit\":\"0.08\",\"desc\":\"Net Hindge\"}', 1, '2020-10-04 12:16:56'),
(25, 'item', 41, '{\"id\":\"41\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"24mm Box Panel white\",\"quantity\":\"75\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-08-13 02:13:44\"}', '{\"item\":\"41\",\"name\":\"24mm Box Panel white ( china)\",\"qty\":\"2100\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"1\",\"desc\":\"each pkt 6 pcs\"}', 1, '2020-10-15 09:45:36'),
(26, 'item', 48, '{\"id\":\"48\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"L Frame (W/O Overlap Frame)\",\"quantity\":\"80\",\"volume\":\"6\",\"unit\":\"meter\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2020-07-26 03:41:58\"}', '{\"item\":\"48\",\"name\":\"L Frame (W/O Overlap Frame) my win\",\"qty\":\"180\",\"volume\":\"6\",\"unit\":\"1\",\"price_per_unit\":\"1\",\"desc\":\"Each Pkt 4 Pcs\"}', 1, '2020-10-15 09:47:15'),
(27, 'item', 119, '{\"id\":\"119\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"3 D HINDGES BROWN\",\"quantity\":\"95\",\"volume\":\"96\",\"unit\":\"pcs\",\"price_per_unit\":\"3\",\"sale_item_desc\":\"EACH PKT 24 PCS\",\"status\":\"1\",\"reg_date\":\"2020-10-22 02:20:26\"}', '{\"item\":\"119\",\"name\":\"3 D HINDGES BROWN\",\"qty\":\"95\",\"volume\":\"96\",\"unit\":\"2\",\"price_per_unit\":\"3\",\"desc\":\"EACH PKT 24 PCS\"}', 1, '2020-10-22 02:22:35'),
(28, 'item', 124, '{\"id\":\"124\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"DOOR HANDLE BROWN\",\"quantity\":\"75\",\"volume\":\"75\",\"unit\":\"pcs\",\"price_per_unit\":\"2\",\"sale_item_desc\":\"EACH BOX 25 PCS\",\"status\":\"1\",\"reg_date\":\"2020-10-22 02:41:05\"}', '{\"item\":\"124\",\"name\":\"ROOM DOOR HANDLE BROWN\",\"qty\":\"75\",\"volume\":\"75\",\"unit\":\"2\",\"price_per_unit\":\"2\",\"desc\":\"EACH BOX 25 PCS\"}', 1, '2020-10-22 02:41:35'),
(29, 'item', 123, '{\"id\":\"123\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"DOOR HANDLE WHITE\",\"quantity\":\"475\",\"volume\":\"175\",\"unit\":\"pcs\",\"price_per_unit\":\"1.6\",\"sale_item_desc\":\"EACH BOX 25 PCS\",\"status\":\"1\",\"reg_date\":\"2020-10-22 02:39:40\"}', '{\"item\":\"123\",\"name\":\"ROOM DOOR HANDLE WHITE\",\"qty\":\"475\",\"volume\":\"175\",\"unit\":\"2\",\"price_per_unit\":\"1.6\",\"desc\":\"EACH BOX 25 PCS\"}', 1, '2020-10-22 02:41:51'),
(30, 'item', 146, '{\"id\":\"146\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"OVERLAPE FRAME WHITE MY WIN\",\"quantity\":\"160\",\"volume\":\"160\",\"unit\":\"Length\",\"price_per_unit\":\"6\",\"sale_item_desc\":\"EACH PKT 4 PCS\",\"status\":\"1\",\"reg_date\":\"2020-10-22 04:57:50\"}', '{\"item\":\"146\",\"name\":\"L FRAME WHITE MY WIN\",\"qty\":\"160\",\"volume\":\"160\",\"unit\":\"4\",\"price_per_unit\":\"6\",\"desc\":\"EACH PKT 4 PCS\"}', 1, '2020-10-22 05:01:50'),
(31, 'item', 147, '{\"id\":\"147\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"OVERLAPE FRAME LAMINATED\",\"quantity\":\"34\",\"volume\":\"34\",\"unit\":\"Length\",\"price_per_unit\":\"9.3\",\"sale_item_desc\":\"BROWN COLOUR\",\"status\":\"1\",\"reg_date\":\"2020-10-22 05:01:10\"}', '{\"item\":\"147\",\"name\":\"L FRAME LAMINATED\",\"qty\":\"34\",\"volume\":\"34\",\"unit\":\"4\",\"price_per_unit\":\"9.3\",\"desc\":\"BROWN COLOUR\"}', 1, '2020-10-22 05:02:13'),
(32, 'item', 173, '{\"id\":\"173\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"ROTO HANDLE WHITE\",\"quantity\":\"350\",\"volume\":\"350\",\"unit\":\"Length\",\"price_per_unit\":\"2\",\"sale_item_desc\":\"EACH BOX 90 PCS\",\"status\":\"1\",\"reg_date\":\"2020-10-24 14:20:21\"}', '{\"item\":\"173\",\"name\":\"ROTO HANDLE WHITE\",\"qty\":\"350\",\"volume\":\"350\",\"unit\":\"2\",\"price_per_unit\":\"2\",\"desc\":\"EACH BOX 90 PCS\"}', 1, '2020-10-24 14:20:52'),
(33, 'item', 185, '{\"id\":\"185\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"200-ESPANGOLETTERS\",\"quantity\":\"1100\",\"volume\":\"1100\",\"unit\":\"pcs\",\"price_per_unit\":\"2.3\",\"sale_item_desc\":\"ONE SIDE OPEN\",\"status\":\"1\",\"reg_date\":\"2020-10-24 14:40:26\"}', '{\"item\":\"185\",\"name\":\"200-ESPANGOLETTERS\",\"qty\":\"1100\",\"volume\":\"1100\",\"unit\":\"2\",\"price_per_unit\":\"2.3\",\"desc\":\"ONE SIDE OPEN\"}', 1, '2020-10-29 03:15:20'),
(34, 'item', 176, '{\"id\":\"176\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"MULLION CONECTOR MY WIN\",\"quantity\":\"4000\",\"volume\":\"4000\",\"unit\":\"pcs\",\"price_per_unit\":\"0.4\",\"sale_item_desc\":\"EACH BOX 400 PCS\",\"status\":\"1\",\"reg_date\":\"2020-10-24 14:25:14\"}', '{\"item\":\"176\",\"name\":\"MULLION CONECTOR MY WIN\",\"qty\":\"4000\",\"volume\":\"4000\",\"unit\":\"2\",\"price_per_unit\":\"0.170\",\"desc\":\"EACH BOX 400 PCS\"}', 1, '2020-11-03 02:27:31'),
(35, 'item', 148, '{\"id\":\"148\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"OVERLAPE FRAME MYWIN WHITE\",\"quantity\":\"100\",\"volume\":\"100\",\"unit\":\"Length\",\"price_per_unit\":\"6.6\",\"sale_item_desc\":\"EACH PKT 4 LENTH\",\"status\":\"1\",\"reg_date\":\"2020-10-22 05:04:43\"}', '{\"item\":\"148\",\"name\":\"OVERLAPE FRAME MYWIN WHITE\",\"qty\":\"100\",\"volume\":\"100\",\"unit\":\"4\",\"price_per_unit\":\"6\",\"desc\":\"EACH PKT 4 LENTH\"}', 1, '2020-11-03 02:47:23'),
(36, 'item', 155, '{\"id\":\"155\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"OUTER DOOR SASH WHITE\",\"quantity\":\"12\",\"volume\":\"12\",\"unit\":\"Length\",\"price_per_unit\":\"9\",\"sale_item_desc\":\"MY WIN OUTER DOOR\",\"status\":\"1\",\"reg_date\":\"2020-10-22 10:00:51\"}', '{\"item\":\"155\",\"name\":\"OUTER DOOR SASH WHITE\",\"qty\":\"12\",\"volume\":\"12\",\"unit\":\"4\",\"price_per_unit\":\"9\",\"desc\":\"MY WIN OUTER DOOR\"}', 1, '2020-11-03 02:47:44'),
(37, 'item', 246, '{\"id\":\"246\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"DOOR SASH\",\"quantity\":\"150\",\"volume\":\"150\",\"unit\":\"Length\",\"price_per_unit\":\"6\",\"sale_item_desc\":\"mywin\",\"status\":\"1\",\"reg_date\":\"2020-11-03 02:48:30\"}', '{\"item\":\"246\",\"name\":\"DOOR SASH\",\"qty\":\"150\",\"volume\":\"150\",\"unit\":\"4\",\"price_per_unit\":\"7.8\",\"desc\":\"mywin\"}', 1, '2020-11-03 03:02:22'),
(38, 'item', 161, '{\"id\":\"161\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"DOUBLE GLASS BEADING 24MM WHITE\",\"quantity\":\"375\",\"volume\":\"375\",\"unit\":\"Length\",\"price_per_unit\":\"0.26\",\"sale_item_desc\":\"DOUBLE GLASS BEADING WHITE\",\"status\":\"1\",\"reg_date\":\"2020-10-22 10:10:21\"}', '{\"item\":\"161\",\"name\":\"DOUBLE GLASS BEADING 24MM WHITE\",\"qty\":\"375\",\"volume\":\"375\",\"unit\":\"4\",\"price_per_unit\":\"0.25\",\"desc\":\"DOUBLE GLASS BEADING WHITE\"}', 1, '2020-11-03 03:16:33'),
(39, 'item', 161, '{\"id\":\"161\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"DOUBLE GLASS BEADING 24MM WHITE\",\"quantity\":\"366\",\"volume\":\"375\",\"unit\":\"Length\",\"price_per_unit\":\"0.25\",\"sale_item_desc\":\"DOUBLE GLASS BEADING WHITE\",\"status\":\"1\",\"reg_date\":\"2020-11-03 03:17:55\"}', '{\"item\":\"161\",\"name\":\"DOUBLE GLASS BEADING 24MM WHITE\",\"qty\":\"366\",\"volume\":\"375\",\"unit\":\"4\",\"price_per_unit\":\"1.500\",\"desc\":\"DOUBLE GLASS BEADING WHITE\"}', 1, '2020-11-03 03:18:33'),
(40, 'item', 244, '{\"id\":\"244\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"TILT AND TURN ACCES\",\"quantity\":\"492\",\"volume\":\"500\",\"unit\":\"Packet\",\"price_per_unit\":\"50\",\"sale_item_desc\":\"T&T ACES\",\"status\":\"1\",\"reg_date\":\"2020-11-03 02:23:55\"}', '{\"item\":\"244\",\"name\":\"TILT AND SLIDE ACCES\",\"qty\":\"492\",\"volume\":\"500\",\"unit\":\"3\",\"price_per_unit\":\"50\",\"desc\":\"T&T ACES\"}', 1, '2020-11-03 03:34:44'),
(41, 'item', 253, '{\"id\":\"253\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"3 D HINDGES BROWN\",\"quantity\":\"240\",\"volume\":\"1\",\"unit\":\"pcs\",\"price_per_unit\":\"1\",\"sale_item_desc\":\"3.100\",\"status\":\"1\",\"reg_date\":\"2021-09-29 00:34:46\"}', '{\"item\":\"253\",\"name\":\"3 D HINDGES BROWN\",\"qty\":\"240\",\"volume\":\"1\",\"unit\":\"2\",\"price_per_unit\":\"2.600\",\"desc\":\"\"}', 1, '2021-09-29 00:36:10'),
(42, 'item', 403, '{\"id\":\"403\",\"company\":\"1\",\"created_by\":\"1\",\"name\":\"Overlape Profile (Perfect)\",\"quantity\":\"217\",\"volume\":\"1\",\"unit\":\"Length\",\"price_per_unit\":\"6.9\",\"sale_item_desc\":\"\",\"status\":\"1\",\"reg_date\":\"2021-10-04 07:38:10\"}', '{\"item\":\"403\",\"name\":\"Overlape Profile (Perfect)\",\"qty\":\"217\",\"volume\":\"1\",\"unit\":\"4\",\"price_per_unit\":\"6.9\",\"desc\":\"\"}', 1, '2021-10-04 09:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `registration_number` varchar(100) NOT NULL,
  `color` varchar(10) NOT NULL,
  `malkiya_date` date NOT NULL,
  `malkiya_expire` date NOT NULL,
  `insurance_date` date NOT NULL,
  `insurance_expire` date NOT NULL,
  `value` float NOT NULL,
  `salt` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `company`, `created_by`, `model`, `registration_number`, `color`, `malkiya_date`, `malkiya_expire`, `insurance_date`, `insurance_expire`, `value`, `salt`, `reg_date`) VALUES
(1, 1, 1, 'Ø§ÙŠØ³ÙˆØ²Ùˆ Ø¨ÙŠÙƒØ§Ø¨', '8690/Ùˆ Ùƒ', 'Ø£Ø¨ÙŠØ¶', '2020-01-16', '2021-01-09', '2020-01-10', '2021-01-09', 1, 'ShHXE', '2020-07-21 08:21:58'),
(2, 1, 1, 'Ø§ÙŠØ³ÙˆØ²Ùˆ Ø´Ø§Ø­Ù†Ø©', 'Ù… Ø¯/7157', 'Ø£Ø¨ÙŠØ¶', '2019-10-09', '2020-10-07', '2019-10-08', '2020-10-07', 1, 'rew60', '2020-07-21 08:42:58'),
(3, 1, 1, 'Ø³ÙˆØ²ÙˆÙƒÙŠ Ø³ØªÙŠØ´Ù† ÙˆØ§Ø¬Ù† Ø§ÙŠÙ‡ Ø¨ÙŠ ÙÙŠ', 'Ùˆ/13934', 'Ø£Ø¨ÙŠØ¶', '2020-03-18', '2021-03-19', '2020-03-20', '2021-03-19', 1, '6beof', '2020-07-21 08:37:33'),
(4, 1, 1, 'Ø¬ÙŠÙ„ÙŠ ØµØ§Ù„ÙˆÙ† Ø§Ù…Ø¬Ø±Ù†Ø¯ Ø§ÙŠ Ø³ÙŠ 7', 'Ø±/37193', 'Ø£Ø¨ÙŠØ¶', '2019-11-26', '2020-11-26', '2019-11-26', '2020-11-25', 1, 'F8hYr', '2020-07-21 08:41:08'),
(5, 1, 1, 'ØªÙˆÙŠÙˆØªØ§ ØµØ§Ù„ÙˆÙ† ÙƒØ§Ù…Ø±ÙŠ', 'ÙŠ/74806', 'Ø£Ø®Ø¶Ø±', '2020-03-18', '2021-03-19', '2020-03-20', '2021-03-19', 1, 'YHgdw', '2020-07-21 08:50:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clerk`
--
ALTER TABLE `clerk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clerk_wh`
--
ALTER TABLE `clerk_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grouping`
--
ALTER TABLE `grouping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_purchase`
--
ALTER TABLE `item_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_warehouse`
--
ALTER TABLE `item_warehouse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `punchcard`
--
ALTER TABLE `punchcard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_invoice`
--
ALTER TABLE `purchase_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_paid`
--
ALTER TABLE `purchase_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_paid_cheque`
--
ALTER TABLE `purchase_paid_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_usage`
--
ALTER TABLE `purchase_usage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_voucher`
--
ALTER TABLE `receive_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoice`
--
ALTER TABLE `sale_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoice_wh`
--
ALTER TABLE `sale_invoice_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_inv_order`
--
ALTER TABLE `sale_inv_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_inv_order_wh`
--
ALTER TABLE `sale_inv_order_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_item`
--
ALTER TABLE `sale_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_item_returned`
--
ALTER TABLE `sale_item_returned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_item_returned_wh`
--
ALTER TABLE `sale_item_returned_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_item_wh`
--
ALTER TABLE `sale_item_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_paid`
--
ALTER TABLE `sale_paid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_paid_cheque`
--
ALTER TABLE `sale_paid_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_paid_cheque_wh`
--
ALTER TABLE `sale_paid_cheque_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_paid_wh`
--
ALTER TABLE `sale_paid_wh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_type`
--
ALTER TABLE `transaction_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_log`
--
ALTER TABLE `update_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_account`
--
ALTER TABLE `bank_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clerk`
--
ALTER TABLE `clerk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clerk_wh`
--
ALTER TABLE `clerk_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grouping`
--
ALTER TABLE `grouping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=417;

--
-- AUTO_INCREMENT for table `item_purchase`
--
ALTER TABLE `item_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item_warehouse`
--
ALTER TABLE `item_warehouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `punchcard`
--
ALTER TABLE `punchcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `purchase_invoice`
--
ALTER TABLE `purchase_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_paid`
--
ALTER TABLE `purchase_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_paid_cheque`
--
ALTER TABLE `purchase_paid_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_usage`
--
ALTER TABLE `purchase_usage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receive_voucher`
--
ALTER TABLE `receive_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_invoice`
--
ALTER TABLE `sale_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sale_invoice_wh`
--
ALTER TABLE `sale_invoice_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_inv_order`
--
ALTER TABLE `sale_inv_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `sale_inv_order_wh`
--
ALTER TABLE `sale_inv_order_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_item`
--
ALTER TABLE `sale_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `sale_item_returned`
--
ALTER TABLE `sale_item_returned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_item_returned_wh`
--
ALTER TABLE `sale_item_returned_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_item_wh`
--
ALTER TABLE `sale_item_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_paid`
--
ALTER TABLE `sale_paid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sale_paid_cheque`
--
ALTER TABLE `sale_paid_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_paid_cheque_wh`
--
ALTER TABLE `sale_paid_cheque_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_paid_wh`
--
ALTER TABLE `sale_paid_wh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_type`
--
ALTER TABLE `transaction_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `update_log`
--
ALTER TABLE `update_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
