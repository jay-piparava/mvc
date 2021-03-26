-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2021 at 03:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zipcode` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipcode`, `country`, `type`) VALUES
(1, 1, 'billings', 'rajkots', 'rajkopys', 23000, 'Indias', 'billing'),
(3, 2, 'vadodara', 'rajkot', 'gujarat', 2222222, 'india', 'billing'),
(4, 2, 'surat', 'ahemdabad', 'gujarat', 30000, 'india', 'shipping'),
(5, 3, 'shipping', 'ahemb=dabad', 'india', 2000, 'Australia', 'billing'),
(6, 3, '', '', '', 0, '', 'shipping'),
(7, 4, 'billing1', 'rajkot', 'rajkopy', 23000, 'India', 'billing'),
(8, 4, 'rajkit1', 'rajkot', 'gujarat', 2222222, 'India', 'shipping'),
(13, 1, 'abcd', '', '', 0, '', 'shipping'),
(14, 14, 'Rajkots', 'rajkot', 'gujarat', 200000, 'india', 'billing'),
(15, 14, 'Rajkot', 'Rajkot', 'Gujarat', 300000, 'india', 'shipping'),
(16, 15, 'rajkot', 'rajkot', 'rajkot', 22222, 'rajkot', 'billing'),
(17, 15, 'rajkots', 'rajkot', 'rajkot', 1234546, 'rajkot', 'shipping');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(10) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 1,
  `createdDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `userName`, `password`, `status`, `createdDate`) VALUES
(3, 'jay', '111', 1, '2021-03-07 | 08:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `attributeId` int(11) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(20) NOT NULL,
  `setOrder` varchar(20) NOT NULL,
  `backendModel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`attributeId`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `setOrder`, `backendModel`) VALUES
(11, 'product', 'hello', '200', 'text', 'varchar(256)', '6', 'none'),
(12, 'product', 'colors', '200', 'select', 'varchar(256)', '4', 'none'),
(13, 'product', 'Hobby', '', 'checkbox', 'int(11)', '6', '');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_option`
--

CREATE TABLE `attribute_option` (
  `optionId` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attribute_option`
--

INSERT INTO `attribute_option` (`optionId`, `name`, `attributeId`, `sortOrder`) VALUES
(46, 'Red', 12, 1),
(47, 'Green', 12, 2),
(48, 'Yellow', 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `bname` varchar(50) NOT NULL DEFAULT 'No Name',
  `image` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sortOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `bname`, `image`, `status`, `sortOrder`) VALUES
(2, 'Raymond', '1616471595-1612-screen3.png', 0, 2),
(3, 'Bata', '1616471632-7742-screen2.png', 0, 1),
(4, 'Vimal', '1616471636-2246-screen5.png', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parentId` varchar(10) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `description` varchar(50) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `updatedAt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `name`, `parentId`, `path`, `status`, `description`, `createdAt`, `updatedAt`) VALUES
(49, 'BedRoom', '0', '49', 0, 'abcd', '2021-03-18 | 09:56:03', ''),
(50, 'Bed', '54', '54=>50', 0, 'abcd', '2021-03-18 | 10:02:51', ''),
(51, 'Panel Bed', '50', '54=>50=>51', 0, 'abcd', '2021-03-18 | 09:56:17', ''),
(52, 'Footer', '51', '54=>50=>51=>52', 0, 'abcd', '2021-03-18 | 09:56:23', ''),
(53, 'Header', '51', '54=>50=>51=>53', 0, 'abcd', '2021-03-18 | 09:56:31', ''),
(54, 'Sofa', '0', '54', 0, 'aaa', '2021-03-18 | 10:02:24', '');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `pageId` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `identifier` int(11) NOT NULL,
  `content` longtext NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`pageId`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(6, 'proust', 12345, '<p><strong><em>Hello i mn jay</em></strong></p>', 0, '2021-03-15 | 10:54:57'),
(7, 'proustsss', 789, '<p><strong>hello donbe sssss</strong></p>', 1, '2021-03-15 | 10:57:40');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(20) NOT NULL,
  `groupId` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(4) NOT NULL,
  `createdAt` varchar(50) NOT NULL,
  `updatedAt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `groupId`, `firstName`, `lastName`, `email`, `mobile`, `password`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 14, 'jays', 'piparava1111', 'jaypiparava123@gmail.com', '8128211139', '413020463', 0, '2021-03-06 | 11:36:56', '2021-03-15 | 10:00:16'),
(2, 14, 'jay', 'piparava', 'jaypiparava123@gmail.com', '8128211139', '42220364', 0, '2021-03-08 | 02:45:12', ''),
(4, 14, 'jay', 'patel', 'jaypiparava123@gmail.coa', '8128211139', '459365506', 0, '2021-03-09 | 09:25:09', ''),
(7, 14, 'aa', 'aa', 'jaypiparava@gmail.com', 'aa', '217748809', 0, '2021-03-15 | 09:13:12', ''),
(11, 15, 'jay', 'piparava', 'jaypiparava123@gmail.com', '8128211139', '661450413', 0, '2021-03-15 | 09:34:34', ''),
(12, 14, 'jay', 'piparava', 'jaypiparava123@gmail.com', '8128211139', '367184958', 0, '2021-03-15 | 09:34:39', ''),
(13, 14, 'jay', 'piparava', 'jaypiparava123@gmail.com', '8128211139', '794990578', 0, '2021-03-15 | 09:35:01', ''),
(14, 14, 'jay', 'piparava1111', 'jaypiparava@gmail.com', 'aa', '110859127', 1, '2021-03-15 | 12:16:56', '2021-03-18 | 12:11:27'),
(15, 15, 'Heml', 'piparava', 'jaypiparava@gmail.com', 'aa', '39805226', 1, '2021-03-15 | 12:23:53', ''),
(16, 14, 'jay111', 'ewgvr', 'jaypiparava@gmail.com', '1222', '234272677', 0, '2021-03-18 | 10:58:23', '2021-03-18 | 11:10:35'),
(17, 14, 'jay', 'piparava1111', 'jaypiparava@gmail.com', '1222', '583633960', 1, '2021-03-18 | 11:10:38', '2021-03-18 | 11:56:56');

-- --------------------------------------------------------

--
-- Table structure for table `customer_group`
--

CREATE TABLE `customer_group` (
  `groupId` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `default` int(10) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_group`
--

INSERT INTO `customer_group` (`groupId`, `name`, `default`, `createdAt`) VALUES
(14, 'Regulars', 1, '2021-03-15 | 10:14:43'),
(15, 'Wholsaler', 0, '2021-03-15 | 10:15:00'),
(17, 'AAA', 1, '2021-03-18 | 11:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `mediaId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT 'No Label',
  `small` int(11) NOT NULL,
  `thumb` int(11) NOT NULL,
  `base` int(11) NOT NULL,
  `gallery` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`mediaId`, `productId`, `image`, `label`, `small`, `thumb`, `base`, `gallery`) VALUES
(8, 59, '1615964662-9831-screen5.png', 'No Label', 1, 1, 1, 1),
(22, 58, '1616009548-1422-screen5.png', 'No Label', 1, 1, 1, 1),
(23, 58, '1616009549-2475-screen5.png', 'No Label', 0, 0, 0, 0),
(24, 58, '1616009569-1039-screen4.png', 'No Label', 0, 0, 0, 0),
(30, 57, '1616038071-1117-screen6.png', 'No Label', 0, 1, 1, 1),
(35, 57, '1616039079-2171-screen6.png', 'No Label', 0, 0, 0, 0),
(38, 57, '1616052012-1046-screen7.png', 'No Label', 0, 0, 0, 0),
(39, 57, '1616516924-2334-screen6.png', 'karan', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `methodId` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `createdDate` varchar(50) NOT NULL,
  `updatedDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`methodId`, `name`, `code`, `description`, `status`, `createdDate`, `updatedDate`) VALUES
(5, 'hemal', '11111', '1111', 0, '2021-03-10 | 12:18:39', '2021-03-15 | 10:32:24'),
(7, 'hemal', '200000', 'abcd', 0, '2021-03-15 | 10:34:37', ''),
(10, 'jay', '2001', 'abcdef', 0, '2021-03-23 | 09:43:09', ''),
(11, 'hemal', '44444', 'abcdef', 0, '2021-03-23 | 09:43:18', ''),
(12, 'jay', '200', '5g Phone', 0, '', ''),
(13, 'hemal', '200', '5g Phone', 1, '', ''),
(14, 'jay', '200', '5g Phone', 1, '', ''),
(15, 'hemal', '200', '5g Phone', 1, '', ''),
(16, 'jay', '200', '5g Phone', 1, '', ''),
(17, 'hemal', '200', '5g Phone', 1, '', ''),
(18, 'jay', '200', '5g Phone', 1, '', ''),
(19, 'hemal', '200', '5g Phone', 1, '', ''),
(20, 'jay', '200', '5g Phone', 1, '', ''),
(21, 'jay', '200', '5g Phone', 1, '', ''),
(22, 'jay', '200', '5g Phone', 1, '', ''),
(23, 'jay', '200', '5g Phone', 0, '', ''),
(24, 'jay', '200', '5g Phone', 1, '', ''),
(25, 'jay', '200', '5g Phone', 1, '', ''),
(26, 'jay', '200', '5g Phone', 1, '', ''),
(27, 'jay', '200', '5g Phone', 1, '', ''),
(28, 'jay', '200', '5g Phone', 1, '', ''),
(29, 'jay', '200', '5g Phone', 1, '', ''),
(30, 'jay', '200', '5g Phone', 1, '', ''),
(31, 'jay', '200', '5g Phone', 1, '', ''),
(32, 'jay', '200', '5g Phone', 1, '', ''),
(33, 'jay', '200', '5g Phone', 1, '', ''),
(34, 'jay', '200', '5g Phone', 1, '', ''),
(35, 'jay', '200', '5g Phone', 1, '', ''),
(36, 'jay', '200', '5g Phone', 1, '', ''),
(37, 'Hemal', '44444', 'abcd', 0, '2021-03-23 | 07:38:35', ''),
(38, 'Hemal', '44444', 'abcd', 0, '2021-03-23 | 07:38:36', ''),
(39, 'Hemal', '44444', 'abcd', 0, '2021-03-23 | 07:41:40', ''),
(40, 'Hemal', '44444', 'abcd', 0, '2021-03-23 | 07:41:41', ''),
(41, 'Hemal', '', 'abcdef', 0, '2021-03-23 | 07:42:27', '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(10) NOT NULL,
  `brandId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `discount` int(50) NOT NULL,
  `quantity` int(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `sku` varchar(50) NOT NULL,
  `status` int(5) NOT NULL,
  `createdDate` varchar(50) NOT NULL,
  `updatedDate` varchar(50) NOT NULL,
  `hello` varchar(256) DEFAULT NULL,
  `colors` varchar(256) DEFAULT NULL,
  `Hobby` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `brandId`, `name`, `price`, `discount`, `quantity`, `description`, `sku`, `status`, `createdDate`, `updatedDate`, `hello`, `colors`, `Hobby`) VALUES
(57, 2, 'Mobile', 201, 212, 2300, 'abcd1', '3ad7df3f9db8bd', 1, '2021-03-15 | 10:51:59', '2021-03-25 | 09:13:36', 'hii', 'Green', NULL),
(58, 0, 'Mobile', 200, 2, 2300, 'abcd1', '991b2bab2f4bad', 0, '2021-03-16 | 08:58:38', '', '2', 'Green', NULL),
(59, 0, 'Mobile', 200, 2, 2300, 'abcd1', '48fa1edb809830', 0, '2021-03-17 | 12:34:08', '2021-03-17 | 12:34:13', NULL, NULL, NULL),
(60, 0, 'Mobile1', 2001, 21, 23001, 'abcd1', '56228701a69182', 1, '2021-03-17 | 05:05:49', '2021-03-18 | 12:56:44', NULL, NULL, NULL),
(62, 4, 'Mobile', 200, 21, 2300, 'abcd1s11', '9f7e765333d5e8', 1, '2021-03-24 | 12:08:03', '', NULL, NULL, NULL),
(63, 2, 'BUSKOT', 200, 20, 0, 'kOTAN NO', '4c0ecfc45400e6', 1, '2021-03-24 | 12:08:35', '', NULL, NULL, NULL),
(64, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(65, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(66, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(67, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(68, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(69, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(70, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(71, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(72, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(73, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(74, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(75, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(76, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(77, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(78, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(79, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(80, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(81, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(82, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(83, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(84, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(85, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(86, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(87, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(88, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(89, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(90, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(91, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(92, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(93, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(94, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(95, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(96, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(97, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(98, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(99, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(100, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL),
(101, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_customer_group_price`
--

CREATE TABLE `product_customer_group_price` (
  `groupPriceId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `price` decimal(20,0) NOT NULL,
  `createdAt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_customer_group_price`
--

INSERT INTO `product_customer_group_price` (`groupPriceId`, `productId`, `groupId`, `price`, `createdAt`) VALUES
(1, 1, 1, '2004', '2021-03-12 | 10:10:28'),
(2, 1, 3, '2003', '2021-03-12 | 10:10:28'),
(3, 1, 5, '2', '2021-03-12 | 10:10:28'),
(4, 1, 7, '2', '2021-03-11 | 11:35:36'),
(5, 8, 1, '20', '2021-03-13 | 11:27:53'),
(6, 8, 3, '20', '2021-03-13 | 11:27:53'),
(7, 8, 5, '200', '2021-03-13 | 11:27:53'),
(8, 8, 7, '20001', '2021-03-11 | 02:32:11'),
(10, 9, 1, '200', '2021-03-11 | 11:55:11'),
(14, 9, 3, '11', '2021-03-11 | 11:55:11'),
(15, 9, 5, '11', '2021-03-11 | 11:55:11'),
(16, 9, 7, '11', '2021-03-11 | 11:55:11'),
(17, 10, 1, '150', '2021-03-14 | 06:51:37'),
(18, 10, 3, '2000', '2021-03-14 | 06:51:37'),
(19, 10, 5, '175', '2021-03-14 | 06:51:37'),
(20, 10, 7, '190', '2021-03-11 | 01:06:13'),
(21, 1, 10, '200', '2021-03-12 | 10:04:14'),
(22, 1, 11, '3001', '2021-03-12 | 10:10:28'),
(23, 8, 11, '200', '2021-03-13 | 11:27:53'),
(24, 8, 11, '20', '2021-03-13 | 11:27:53'),
(25, 15, 1, '200', '2021-03-14 | 06:27:58'),
(26, 15, 3, '2000', '2021-03-14 | 06:27:58'),
(27, 15, 5, '2000', '2021-03-14 | 06:27:59'),
(28, 15, 11, '2000', '2021-03-14 | 06:27:59'),
(29, 10, 11, '0', '2021-03-14 | 06:51:37'),
(30, 52, 14, '200', '2021-03-15 | 12:15:31'),
(31, 52, 15, '200', '2021-03-15 | 12:15:31'),
(32, 54, 14, '200', '2021-03-15 | 12:29:42'),
(33, 54, 15, '200', '2021-03-15 | 12:29:42'),
(34, 10, 14, '200', '2021-03-15 | 08:49:08'),
(35, 10, 15, '200', '2021-03-15 | 08:49:08'),
(36, 57, 14, '200', '2021-03-18 | 12:47:12'),
(37, 57, 15, '201', '2021-03-18 | 12:47:12'),
(38, 59, 14, '20', '2021-03-18 | 12:56:07'),
(39, 59, 15, '200', '2021-03-18 | 12:56:07'),
(40, 58, 14, '200', '2021-03-18 | 12:55:43'),
(41, 58, 15, '200', '2021-03-18 | 12:55:43'),
(42, 60, 14, '200', '2021-03-18 | 12:56:19'),
(43, 60, 15, '200', '2021-03-18 | 12:56:19'),
(44, 57, 17, '200', '2021-03-18 | 12:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `shiping`
--

CREATE TABLE `shiping` (
  `methodId` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `discription` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `createdDate` varchar(50) NOT NULL,
  `updatedDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiping`
--

INSERT INTO `shiping` (`methodId`, `name`, `code`, `amount`, `discription`, `status`, `createdDate`, `updatedDate`) VALUES
(4, 'jayssss', '200sss', 5000, 'abcdss', 0, '2021-03-15 | 10:41:57', '2021-03-15 | 10:45:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`addressId`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`attributeId`);

--
-- Indexes for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD PRIMARY KEY (`optionId`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`pageId`),
  ADD UNIQUE KEY `identifier` (`identifier`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `customer_group`
--
ALTER TABLE `customer_group`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mediaId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_customer_group_price`
--
ALTER TABLE `product_customer_group_price`
  ADD PRIMARY KEY (`groupPriceId`);

--
-- Indexes for table `shiping`
--
ALTER TABLE `shiping`
  ADD PRIMARY KEY (`methodId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `pageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `product_customer_group_price`
--
ALTER TABLE `product_customer_group_price`
  MODIFY `groupPriceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `shiping`
--
ALTER TABLE `shiping`
  MODIFY `methodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_option`
--
ALTER TABLE `attribute_option`
  ADD CONSTRAINT `attribute_option_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`attributeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
