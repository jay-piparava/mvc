-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 12:59 PM
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
  `zipCode` int(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `addressType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`addressId`, `customerId`, `address`, `city`, `state`, `zipCode`, `country`, `addressType`) VALUES
(1, 1, 'Rajkot', 'rajkot', 'gujarat', 23000, 'india', 'billing'),
(4, 1, 'Rajkot', 'rajkot', 'gujarat', 23000, 'india', 'shipping'),
(5, 3, 'Junagadh', 'junagadh', 'gujarat', 23000, 'india', 'billing'),
(6, 3, 'Junagadh1', 'mumbai', 'Maharastra', 2300, 'india', 'shipping'),
(7, 4, 'Hathikhana', 'Rajkot', 'Gujarat', 20000, 'India', 'billing'),
(8, 4, '', '', '', 0, '', 'shipping'),
(9, 5, 'Ralnagar', 'Rajkot', 'Gujaraty', 36002, 'India', 'billing'),
(10, 5, 'Ralnagar', 'Rajkot', 'Gujaraty', 36002, 'India', 'shipping'),
(11, 6, 'Rajkot', 'rajkot', 'gujarat', 23000, 'india', 'billing'),
(12, 6, 'Rajkot', 'rajkot', 'gujarat', 23000, 'india', 'shipping');

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
(28, 'hemal', '234', 0, ''),
(29, 'hemal', '234', 1, ''),
(31, 'hemal', '11111', 1, '2021-04-01 | 03:39:42'),
(32, 'hemal11', '234', 1, '');

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
(12, 'product', 'colors', '200', 'select', 'varchar(256)', '4', 'none');

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
(46, 'Red', 12, 4),
(47, 'Green', 12, 2),
(48, 'Yellow', 12, 3),
(49, 'magento', 12, 1);

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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `sessionId` varchar(45) NOT NULL,
  `customerId` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `paymentMethodId` int(11) NOT NULL,
  `shippingMethodId` int(11) NOT NULL,
  `shippingAmount` int(10) NOT NULL,
  `grantTotal` decimal(10,0) DEFAULT NULL,
  `createdDate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `sessionId`, `customerId`, `total`, `discount`, `paymentMethodId`, `shippingMethodId`, `shippingAmount`, `grantTotal`, `createdDate`) VALUES
(1, '', 13, '0', '0', 0, 0, 0, NULL, 2021),
(2, '', 1, '1260', '0', 43, 7, 100, '1360', 2021),
(3, '', 3, '900', '0', 44, 9, 0, '900', 2021),
(4, '', 4, '1434', '0', 43, 9, 0, '1434', 2021),
(5, '', 2, '0', '0', 0, 0, 0, NULL, 2021),
(6, '', 5, '900', '0', 0, 0, 0, '900', 2021),
(7, '', 0, '0', '0', 0, 0, 0, NULL, 2021),
(8, '', 6, '900', '0', 0, 7, 100, '1000', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `cartaddress`
--

CREATE TABLE `cartaddress` (
  `cartAddressId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `firstName` varchar(11) NOT NULL,
  `lastName` varchar(11) NOT NULL,
  `address` varchar(56) NOT NULL,
  `city` varchar(11) NOT NULL,
  `state` varchar(11) NOT NULL,
  `country` varchar(11) NOT NULL,
  `zipCode` int(11) NOT NULL,
  `addressType` varchar(11) NOT NULL,
  `sameAsBilling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartaddress`
--

INSERT INTO `cartaddress` (`cartAddressId`, `cartId`, `firstName`, `lastName`, `address`, `city`, `state`, `country`, `zipCode`, `addressType`, `sameAsBilling`) VALUES
(1, 2, 'jay', 'piparava', 'Rajkot', 'rajkot', 'gujarat', 'india', 23000, 'billing', 0),
(2, 2, 'jay1', 'piparava', 'Rajkot', 'rajkot', 'gujarat', 'india', 23000, 'shipping', 0),
(3, 3, 'Rohit', 'Lalwani', '', 'junagadh', 'gujarat', 'india', 23000, 'billing', 0),
(4, 3, 'Rohit', 'Lalwani', '', 'mumbai', 'Maharastra', 'india', 2300, 'shipping', 0),
(5, 4, 'Mahir', 'Patel', '', 'Rajkot', 'Gujarat', 'India', 20000, 'billing', 0),
(6, 4, 'Mahir', 'Patel', '', 'Rajkot', 'Gujarat', 'India', 20000, 'shipping', 0),
(7, 6, 'Mayur', 'Purusvani', 'Ralnagar', 'Rajkot', 'Gujaraty', 'India', 36002, 'billing', 0),
(8, 6, 'Mayur', 'Purusvani', 'Ralnagar', 'Rajkot', 'Gujaraty', 'India', 36002, 'shipping', 0),
(9, 8, 'jay', 'piparava', 'Rajkot', 'rajkot', 'gujarat', 'india', 23000, 'billing', 0),
(10, 8, 'jay', 'piparava', 'Rajkot', 'rajkot', 'gujarat', 'india', 23000, 'shipping', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cartitem`
--

CREATE TABLE `cartitem` (
  `cartItemId` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `basePrice` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cartitem`
--

INSERT INTO `cartitem` (`cartItemId`, `cartId`, `productId`, `quantity`, `basePrice`, `discount`, `createdDate`) VALUES
(1, 1, 57, 1, '200', '20', '2021-03-30 02:57:16'),
(4, 3, 57, 5, '200', '20', '2021-03-30 04:03:58'),
(5, 3, 62, 1, '200', '21', '2021-03-30 05:07:08'),
(8, 4, 62, 6, '200', '21', '2021-03-30 05:17:08'),
(10, 2, 57, 2, '200', '20', '2021-03-30 12:59:36'),
(11, 2, 63, 5, '200', '20', '2021-03-30 12:59:54'),
(12, 6, 57, 5, '200', '20', '2021-03-30 13:01:16'),
(13, 8, 57, 5, '200', '20', '2021-03-31 08:55:23');

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
(1, 1, 'Jay', 'Piparava', 'jaypiparava1123@gamil.com', '8128211139', '12345', 1, '', ''),
(2, 1, 'Ronaks', 'rafadiya', 'jaypiparava@gmail.com', '8128211139', '1060300759', 1, '2021-03-30 | 12:41:50', '2021-03-30 | 12:41:56'),
(3, 1, 'Rohit', 'Lalwani', 'jaypiparava@gmail.com', '8128211139', '787350391', 1, '2021-03-30 | 01:02:22', '2021-03-30 | 01:02:35'),
(4, 1, 'Mahir', 'Patel', 'mahir@gmial.com', '9033028606', '197404214', 1, '2021-03-30 | 02:06:56', ''),
(5, 1, 'Mayur', 'purusvani', 'mahir@gmial.com', '9033028606', '368605370', 1, '2021-03-30 | 10:01:03', ''),
(6, 1, 'jauy', 'piparava', 'jaypiparava@gmail.com', '8128211139', '983398603', 1, '2021-03-31 | 05:55:00', '');

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
(1, 'Retailer', 1, '');

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
(42, 'Credit Card', '1', 'Abcd', 1, '2021-03-30 | 12:20:56', ''),
(43, 'Debit Card', '2', 'abcd', 1, '2021-03-30 | 12:21:12', ''),
(44, 'PayPal', '3', 'abcd', 1, '2021-03-30 | 12:21:36', ''),
(45, 'Cash On Delivery', '5', 'abcdef', 1, '2021-03-30 | 12:22:05', '');

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
  `colors` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `brandId`, `name`, `price`, `discount`, `quantity`, `description`, `sku`, `status`, `createdDate`, `updatedDate`, `hello`, `colors`) VALUES
(57, 2, 'Mobile', 200, 20, 2300, 'abcd1', '3ad7df3f9db8bd', 1, '2021-03-15 | 10:51:59', '2021-03-30 | 11:31:44', 'hii', 'magento'),
(58, 0, 'Mobile', 200, 2, 2300, 'abcd1', '991b2bab2f4bad', 0, '2021-03-16 | 08:58:38', '', '2', 'Green'),
(59, 0, 'Mobile', 200, 2, 2300, 'abcd1', '48fa1edb809830', 0, '2021-03-17 | 12:34:08', '2021-03-17 | 12:34:13', NULL, NULL),
(60, 0, 'Mobile1', 2001, 21, 23001, 'abcd1', '56228701a69182', 1, '2021-03-17 | 05:05:49', '2021-03-18 | 12:56:44', NULL, NULL),
(62, 4, 'Mobile', 200, 21, 2300, 'abcd1s11', '9f7e765333d5e8', 1, '2021-03-24 | 12:08:03', '', NULL, NULL),
(63, 2, 'BUSKOT', 200, 20, 0, 'kOTAN NO', '4c0ecfc45400e6', 1, '2021-03-24 | 12:08:35', '', NULL, NULL),
(64, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(65, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(66, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(67, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(68, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(69, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(70, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(71, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(72, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(73, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(74, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(75, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(76, 2, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(77, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(78, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(79, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(80, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(81, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(82, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(83, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(84, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(85, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(86, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(87, 3, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(88, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(89, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(90, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(91, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(92, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(93, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(94, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(95, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(96, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(97, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(98, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(99, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(100, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL),
(101, 4, 'jay', 200, 20, 200, '5g Phone', 'mobuile', 1, '', '', NULL, NULL);

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
(7, 'Express  - 1 day', '1', 100, 'aabcvs', 1, '2021-03-30 | 12:22:37', '2021-03-30 | 12:23:45'),
(8, 'Platinium - 3days', '2', 50, 'zbcd', 1, '2021-03-30 | 12:23:00', '2021-03-30 | 12:23:56'),
(9, 'Free Delivery - 7 days', '3', 0, 'abcdss', 1, '2021-03-30 | 12:23:35', '2021-03-30 | 12:52:13');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `cartaddress`
--
ALTER TABLE `cartaddress`
  ADD PRIMARY KEY (`cartAddressId`);

--
-- Indexes for table `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`cartItemId`);

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
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `attributeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `attribute_option`
--
ALTER TABLE `attribute_option`
  MODIFY `optionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cartaddress`
--
ALTER TABLE `cartaddress`
  MODIFY `cartAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `cartItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `customerId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_group`
--
ALTER TABLE `customer_group`
  MODIFY `groupId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `mediaId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `methodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

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
  MODIFY `methodId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
