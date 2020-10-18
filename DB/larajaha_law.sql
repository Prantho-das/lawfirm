-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2020 at 08:09 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larajaha_law`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `email`, `password`, `adminname`, `role`, `time`) VALUES
(2, 'hori@gmail.com', '123456789', 'hori', 0, '2020-08-30 16:14:45');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `clname` varchar(50) NOT NULL,
  `lid` int(11) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `vname` varchar(255) NOT NULL,
  `rel` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment` varchar(10) NOT NULL,
  `pexpr` int(6) NOT NULL,
  `pno` int(50) NOT NULL,
  `cdet` text NOT NULL,
  `atime` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `cid`, `clname`, `lid`, `lname`, `vname`, `rel`, `address`, `payment`, `pexpr`, `pno`, `cdet`, `atime`, `status`, `time`) VALUES
(23, 13, 'monir@gmail.com', 23, 'safiur@gmail.com', 'Monir', 'Myself', 'Dhaka', '', 0, 0, 'Netwok law', '2020-09-25 19:30:00', 1, '2020-09-19 13:58:12'),
(24, 12, 'shawon@gmail.com', 23, 'safiur@gmail.com', 'Azizul Islam', 'Uncle ', 'ambari,dinajpur ', '', 0, 0, 'murder', '2020-09-22 20:20:00', 1, '2020-09-19 14:21:13'),
(27, 15, 'sahin@gmail.com', 24, 'diptodas@gmail.com', 'Sahin', 'Self', 'Dhaka', '', 0, 0, 'Miss use of wifi.', '2020-09-30 20:20:00', 1, '2020-09-20 04:45:48'),
(28, 16, 'mamun@gmail.com', 23, 'safiur@gmail.com', 'Nazmul', 'Friend ', 'noakhali', '', 0, 0, 'Wifi hack', '2020-09-23 17:50:00', 1, '2020-09-20 09:51:48'),
(29, 15, 'sahin@gmail.com', 25, 'riaz@gmail.com', 'Sahin', 'Self', 'Dhaka', '', 0, 0, 'Land hack', '2020-10-20 17:40:00', 1, '2020-09-20 10:41:10'),
(30, 17, 'tusar@gmail.com', 23, 'safiur@gmail.com', 'Tusar', 'Self', 'Dhaka', '', 0, 0, 'Bad use of my website..', '2020-10-20 19:31:00', 1, '2020-09-20 15:31:37'),
(31, 18, 'dipto@gmail.com', 27, 'dip@gmail.com', 'Dipto', 'Son', 'Dhaka', '', 0, 0, 'Jani na', '2020-09-22 17:35:00', 1, '2020-09-20 16:36:47'),
(32, 20, 'hasan@gmail.com', 25, 'riaz@gmail.com', 'Hasan', 'Myself', '', '', 0, 0, 'Tree cutting..', '2020-10-21 20:17:00', 1, '2020-09-21 06:17:30'),
(33, 17, 'tusar@gmail.com', 31, 'shajahan@gmail.com', 'Tusar', 'Myself', 'Dhaka', '', 0, 0, 'Bussiness problem ', '2020-10-21 19:30:00', 1, '2020-09-21 14:21:39'),
(34, 12, 'shawon@gmail.com', 31, 'shajahan@gmail.com', 'aminul', 'Friend ', 'mohakhali', '', 0, 0, 'stolen the money ', '2020-09-25 16:37:00', 1, '2020-09-22 05:38:18'),
(37, 20, 'hasan@gmail.com', 24, 'diptodas@gmail.com', 'Hasan', 'Myself', 'Rangpur', '', 0, 0, 'About Cyber crime case.', '2020-11-22 21:42:00', 0, '2020-09-22 15:42:50'),
(47, 15, 'sahin@gmail.com', 28, 'hasan11@gmail.com', 'Sahin', 'Myself', 'Rangpur', 'bkash', 700, 700, 'Land case problem ', '2020-10-25 20:30:00', 1, '2020-09-25 02:43:24'),
(48, 24, 'sagor@gmail.com', 29, 'diptoadhikary@gmail.com', 'Azizul Islam', 'Friend ', 'ambari,dinajpur ', 'bkash', 500, 174666446, 'murder', '2024-09-27 21:36:00', 0, '2020-09-25 03:36:51'),
(49, 24, 'sagor@gmail.com', 31, 'shajahan@gmail.com', 'gghj', 'Friend ', 'noakhali', 'bkash', 500, 174666446, 'stolen ', '2020-09-29 09:38:00', 1, '2020-09-25 03:39:19'),
(50, 25, 'rabbi@gmail.com', 37, 'rafid@gmail.com', 'Sazzad Hossain', 'Uncle ', 'dinajpur', 'bkash', 500, 174666446, 'murder', '2020-09-30 16:28:00', 1, '2020-09-25 15:52:08'),
(52, 26, 'fazla244@yahoo.com', 38, 'nitaisarkar@gmail.com', 'kazi shihab', 'friend', '', 'bkash', 500, 6411265, 'dadadadad', '2020-09-18 07:39:00', 1, '2020-09-27 10:36:46'),
(53, 29, 'Pranthokumardas786@gmail.com', 41, 'pranthodasshoccho@gmail.com', 'fffffffff', 'fffffffffff', 'prnaotolflasdjflsdfjlsjdflkjsdlfkjsdlfslfksldfsd', 'bkash', 500, 1794188835, 'ggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2020-09-28 16:51:00', 1, '2020-09-28 10:47:39'),
(54, 29, 'Pranthokumardas786@gmail.com', 47, 'Pranthokumardas786@gmail.com', 'fffffffff', 'fffffffffff', 'prnaotolflasdjflsdfjlsjdflkjsdlfkjsdlfslfksldfsd', 'bkash', 700, 1794188835, 'prnaotolflasdjflsdfjlsjdflkjsdlfkjsdlfslfksldfsd', '2020-09-28 21:38:00', 1, '2020-09-28 15:36:45'),
(55, 20, 'hasan@gmail.com', 28, 'hasan11@gmail.com', 'Shahjahan Ali', 'Myself', 'Dinajpur', 'bkash', 700, 1762902854, 'Murder', '2020-09-30 07:35:00', 1, '2020-09-28 17:40:20'),
(56, 28, 'pranthodasshoccho@gmail.com', 47, 'Pranthokumardas786@gmail.com', 'ddddddddddddd', 'ddddddd', 'ddddddddddd', 'bkash', 700, 1982837799, 'fadfsasdfsfsdfsdfafasdf', '0000-00-00 00:00:00', 1, '2020-09-28 19:57:11'),
(57, 33, 'shahin@gmail.com', 28, 'hasan11@gmail.com', 'Shahin Ahmed', 'Myself', 'Badda, Dhaka', 'bkash', 700, 1710741464, 'Business case', '2020-10-02 12:24:00', 0, '2020-09-29 06:25:59'),
(58, 33, 'shahin@gmail.com', 51, 'toufiqur@gmail.com', 'Shahin', 'Myself', 'Badda, Dhaka', 'bkash', 1000, 1710741464, 'Business case', '2020-10-08 12:35:00', 1, '2020-09-29 06:36:30'),
(59, 20, 'hasan@gmail.com', 52, 'rubel@gmail.com', 'Sazzad Hossain', 'Uncle ', 'dhaka,bangladesh ', 'bkash', 500, 174666446, 'murder', '2020-09-30 04:53:00', 1, '2020-09-29 06:58:55'),
(60, 34, 'billal@gmail.com', 46, 'diptocmt@gmail.com', 'Billal', 'Me', '', 'bkash', 500, 1771434742, 'Income Tax Return', '2020-09-30 14:58:00', 1, '2020-09-29 08:59:59'),
(61, 36, 'sohan@gmail.com', 43, 'saiful@gmail.com', 'Sohan', 'Myself', 'dhaka,miepur', 'bkash', 1000, 1762902854, 'income come tax', '2020-11-03 20:00:00', 1, '2020-09-30 04:27:13'),
(62, 20, 'hasan@gmail.com', 44, 'khademul@gmail.com', 'Hasan', 'Myself', '', 'nagad', 500, 172564232, 'Tax return ', '2020-10-30 12:44:00', 1, '2020-09-30 06:45:00'),
(63, 17, 'tusar@gmail.com', 46, 'diptocmt@gmail.com', 'Tusar', 'Myself', 'Gazipur ', 'nagad', 500, 172564251, 'Need contact sir ', '2020-10-30 13:05:00', 2, '2020-09-30 07:05:33'),
(64, 17, 'tusar@gmail.com', 30, 'sahinad@gmail.com', 'Tusar', 'Myself', 'Dhaka', 'nagad', 1000, 172564232, 'Test ', '2020-11-30 13:08:00', 1, '2020-09-30 07:08:18'),
(65, 38, 'diptocse@gmail.com', 56, 'diptocse01@gmail.com', 'Billal', 'Friend', '', 'bkash', 0, 1724110298, 'Religious haregment   ', '2020-10-01 16:30:00', 0, '2020-09-30 08:34:04'),
(66, 39, 'sagor@gmail.com', 43, 'saiful@gmail.com', 'Sagor Ali', 'Myself ', 'Dhaka', 'bkash', 1000, 1746093441, 'murder', '2020-09-02 16:19:00', 1, '2020-09-30 11:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `case_name` varchar(30) NOT NULL,
  `case_det` varchar(100) NOT NULL,
  `result` varchar(15) NOT NULL,
  `lawyerid` int(11) NOT NULL,
  `time` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `case_name`, `case_det`, `result`, `lawyerid`, `time`) VALUES
(3, 'dipto das', 'this a a case of mauder', 'won', 11, 2147483647),
(4, 'grammenphone case', 'this is a murder case', 'won', 12, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `cid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'userp.png',
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`cid`, `name`, `uname`, `email`, `phone`, `nid`, `password`, `img`, `time`) VALUES
(10, 'Shahjajan Ali', 'Shahjahan124353', 'shahjahanparamanik1@gmail.vom', 1762902854, '123456789', 'b45cfe2dccca8876162cf79919c9540e8b96fa9f', 'user.jpg', '2020-09-19 07:57:32'),
(11, 'Hori', 'Horidiu', 'hori.ieb@gmail.com', 1722999, '01234576', '56933f86ccb40b89d1394fc9a58e014c280617e4', 'user.jpg', '2020-09-19 08:00:30'),
(12, 'Md Shawon Ali', 'shawon123456', 'shawon@gmail.com', 1846658034, '34423441333', 'b45cfe2dccca8876162cf79919c9540e8b96fa9f', 'user.jpg', '2020-09-19 09:37:24'),
(13, 'Monir', 'Monirdiu', 'monir@gmail.com', 1711115, '012223355', '96da802b7ff03c79c72c747a0da3506d77e9a771', 'DIU5f689e07b5854images (2).png', '2020-09-19 13:23:17'),
(14, 'Md Liton', 'litkn1234', 'liton@gmail.com', 1846658034, '9262788831', '53c2c1467bccec70fca4093bb8eea95e76474abb', 'DIU5f6618fa1355dvideo-popup-bg.jpg', '2020-09-19 14:40:51'),
(15, 'Sahin Akter', 'Sahin', 'sahin@gmail.com', 1226633, '4411156', '886e6b3d951423ee03feecc255f4778c47e85569', 'DIU5f689cb29f6e4images (4).jpeg', '2020-09-20 04:21:12'),
(16, 'Mamun ', 'mamun12', 'mamun@gmail.com', 1762963212, '028737373', 'b9df9dfc1a65010117aecee3aaf2fec5416e1aee', 'DIU5f672565ebba2video-popup-bg-2.jpg', '2020-09-20 09:45:29'),
(17, 'Tusar', 'Tusar1', 'tusar@gmail.com', 17223362, '44433466', 'f39092075261c70512e4dc17079d508f49983a45', 'DIU5f6d55e9e8b1aimages (2).png', '2020-09-20 15:30:11'),
(18, 'Dipto', 'Dipto', 'dipto@gmail.com', 1724110298, '1234577888', '7c222fb2927d828af22f592134e8932480637c0d', 'DIU5f6783b3ebe8einbound599201857032380658.jpg', '2020-09-20 16:13:07'),
(20, 'Hassan ali', 'Hasan ', 'hasan@gmail.com', 17225533, '2225678', '28b25c344d253e7665e6dd53851b70bba9a1ee90', 'DIU5f6a1981c549aimages (8).jpeg', '2020-09-21 05:47:47'),
(27, 'Nasir', 'Nasir', 'nasir@gmail.com', 17552232, '2225557', '298f73a9929eac29a6b657c69232883fcedc36ad', 'DIU5f70c865952bdimages (2).png', '2020-09-27 17:10:31'),
(28, 'Pranthokumarda', 'pma', 'pranthodasshoccho@gmail.com', 1794188835, 'twt2twe', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f', 'user.jpg', '2020-09-28 06:45:05'),
(29, 'Pranthokumardas786@gmail.com', 'root', 'Pranthokumardas786@gmail.com', 1794188835, 'twt2twe', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f', 'user.jpg', '2020-09-28 07:37:53'),
(30, 'adadadad', 'adadada', 'adadad@gmail.com', 0, 'adadad', '38f2279f58fdd8ad2b6f6f62095658ab9a896c96', 'user.jpg', '2020-09-28 16:18:45'),
(31, 'Prantho', 'Pppp', 'pranthokumardaa786@gmail.com', 1794188835, '9843217999', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f', 'user.jpg', '2020-09-28 16:47:19'),
(32, 'MUZAHIDUL ISLAM', 'Muja', 'arifkhanjoy269@gmail.com', 1963658663, '19967915517000006', 'd76d0997d96b48213c6cfa657625866dceacc2a5', 'user.jpg', '2020-09-28 18:00:12'),
(33, 'Md Shahin Aktar', 'shahin', 'shahin@gmail.com', 1710741464, '19961522011', '2575572e754a044889a1c26ec9be1a836f5115e4', 'DIU5f72d28aebc7320200620_221651.jpg', '2020-09-29 05:24:31'),
(34, 'Billal', 'billal', 'billal@gmail.com', 1771434742, '9856256486423', '7c222fb2927d828af22f592134e8932480637c0d', 'userp.png', '2020-09-29 08:56:32'),
(35, '1', '1', '1@1', 1, '1', '7c222fb2927d828af22f592134e8932480637c0d', 'userp.png', '2020-09-29 13:13:18'),
(36, 'sohan@gmail.com', 'sohoan12', 'sohan@gmail.com', 1762902854, '732456899999', '08355e1ad30720da9896f9929e617f0f8b3ac0ca', 'userp.png', '2020-09-30 03:49:41'),
(37, 'Dipto dipto', 'dipto', 'diptocs@gmail.com', 1721525280, '5634858963795', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'userp.png', '2020-09-30 08:16:02'),
(38, 'Adhikary Dipto', 'Dipto', 'diptocse@gmail.com', 1724002020, '4574368545785', '7c222fb2927d828af22f592134e8932480637c0d', 'userp.png', '2020-09-30 08:31:46'),
(39, 'Sagor Ali', 'sagor12', 'sagor@gmail.com', 2147483647, '72288281919', '2d97b3fbdaece2f85ab9e752b53fc3e190e8baa2', 'userp.png', '2020-09-30 10:00:49');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contid` int(11) NOT NULL,
  `fn` varchar(50) NOT NULL,
  `ln` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `sub` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contid`, `fn`, `ln`, `email`, `msg`, `sub`, `status`, `time`) VALUES
(7, 'prantho', 'das', 'Pranthokumardas786@gmail.com', 'i have a family case of murder what should i do', 'muder case', 0, '2020-09-03 09:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `Lid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `barr` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `expart` varchar(11) NOT NULL,
  `expr` int(10) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'lawyerp.jpeg',
  `password` varchar(255) NOT NULL,
  `rating` int(5) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`Lid`, `name`, `barr`, `email`, `phone`, `expart`, `expr`, `addr`, `image`, `password`, `rating`, `time`) VALUES
(20, 'Md Shahjahan Ali', '42973572882', 'shahjahanparamanik1@gmail.com', 1762902854, '17', 500, 'arjidebipur,dinajpur ', 'user-1.jpg', 'b45cfe2dccca8876162cf79919c9540e8b96fa9f', 0, '2020-09-19 09:25:03'),
(23, 'Safiur Islam', '21333448', 'safiur@gmail.com', 122339955, '17', 700, 'Dhaka', 'DIU5f689b03e3873images (6).jpeg', 'cd60dca916b78e5d853cafaa9cdca141e9135e65', 0, '2020-09-19 13:39:06'),
(24, 'Barrister Dipto Das', 'B44009', 'diptodas@gmail.com', 13222666, '17', 1000, 'Tangail', 'DIU5f689b7a346acimages (1).png', '8c57cb0910926bcc50f1fc4950d8bf3e01c556b2', 0, '2020-09-20 04:15:05'),
(25, 'Barrister Riaz Uddin', 'BA125544', 'riaz@gmail.com', 17222333, '16', 1000, 'Rangpur', 'DIU5f68993904964images.png', 'd0593d58600d4a34fe7a3d642a827f794d9bcf2a', 0, '2020-09-20 10:36:21'),
(26, 'Shahin Ahmed', '0022008412', 'shahincse7@gmail.com', 2147483647, '17', 500, 'Kaliakair, Ullapra, Sirajgonj', 'user-1.jpg', '5af686f3007ddac7cda314810705d6269ae4a2b1', 0, '2020-09-20 11:38:01'),
(28, 'Hassan khan', 'BA02557', 'hasan11@gmail.com', 17225336, '36', 700, 'Rangpur', 'DIU5f68acff3c64bimages (9).jpeg', '28b25c344d253e7665e6dd53851b70bba9a1ee90', 0, '2020-09-21 13:31:44'),
(29, 'Advocate Dipto Adhikari', 'BC03115', 'diptoadhikary@gmail.com', 17556633, '34', 500, 'Gazipur ', 'DIU5f68afbc0ed5fimages (8).jpeg', '827f90098d55bf965f275accb1969d065dca9183', 0, '2020-09-21 13:43:46'),
(30, 'Advocate Sahin Islam', 'BA02667', 'sahinad@gmail.com', 16708556, '35', 1000, 'Tangail', 'DIU5f68b0c6a044aimages (6).jpeg', '41a851198cc1c8b294db45e8ad2c7875653a1a41', 5, '2020-09-21 13:54:35'),
(31, 'Advocat. Shajan Ali ', 'BA02559', 'shajahan@gmail.com', 175522336, '36', 500, 'Rangpur', 'DIU5f68b1a6be69cimages.png', '452c6e879eabed6ce9acb6f3be0941a9a240d2a8', 0, '2020-09-21 13:58:36'),
(32, 'Barrister Abdul Hakim', '6107777900', 'hakim@gmail.com', 2147483647, '37', 700, 'nilphamari', 'user-1.jpg', '25531db05b15b8107b79b88a885af39ce6c4b31c', 0, '2020-09-21 14:01:11'),
(33, 'Anik Hasan', 'BA222444', 'anik@gmail.com', 175522335, '35', 1000, 'Rangpur', 'DIU5f68b43ddc5abimages (2).png', '3f8c94e05806c35224923f852300f56ab1cee286', 0, '2020-09-21 14:09:29'),
(34, 'Advocate Jalal Khan', 'BA02556', 'jalal@gmail.com', 175522393, '34', 700, 'Tangail', 'user-1.jpg', 'ecb31142759b526fa5dc4f0eb5bebb813080be60', 0, '2020-09-22 09:57:45'),
(37, 'Advocate Rafid MujtaFiz', '61891929292', 'rafid@gmail.com', 156666766, '34', 500, 'dhaka', 'user-1.jpg', '6bd0b18e0ddfa7d9192846c8123eae0c09688f32', 0, '2020-09-25 15:44:38'),
(38, 'Nitai chandro sarkar', '525356', 'nitaisarkar@gmail.com', 136952778, '34', 500, 'dhaka', 'user-1.jpg', 'bfe54caa6d483cc3887dce9d1b8eb91408f1ea7a', 0, '2020-09-27 10:31:14'),
(40, 'Advocat Dipak Kumar', 'BA025667', 'dipok@gmail.com', 175522352, '17', 700, 'Gazipur ', 'user-1.jpg', 'ef47398e6bc890c38e957a6d397b8ede91100c87', 0, '2020-09-28 08:09:08'),
(43, 'Barister Saiful A. Chowdhury', 'BA02523', 'saiful@gmail.com', 171125363, '39', 1000, 'Hosaf Tower,2nd Floor,Gazipur ', 'DIU5f71f5c908cbabf5546bcc77f9afc3a8ec15b1cf1f94a.0.jpg', '641ca71deb4b5b63fc5601aab042152032b7d730', 5, '2020-09-28 14:29:21'),
(44, 'Advocate khademul Islam', 'BC03123', 'khademul@gmail.com', 175522252, '39', 500, 'Hosen Market,1st Floor,Gazipur ', 'DIU5f71f730bf512IMG_20200928_203544.png', '6d886a5a174f7de84e2eaf35d2fa82065ca74e26', 0, '2020-09-28 14:45:30'),
(45, 'Advocate Salah Uddin Sohel ', 'BC032467', 'salah@gmail.com', 175522745, '40', 500, 'Noor Market,Farmgate,Dhaka', 'DIU5f71f906be656IMG_20200928_205356.png', '41db33862582729b10b23a89d78badcf727a78af', 0, '2020-09-28 14:51:22'),
(46, 'Dipto', '1234', 'diptocmt@gmail.com', 1724110298, '39', 500, 'Dhaka', 'user-1.jpg', '7c222fb2927d828af22f592134e8932480637c0d', 4, '2020-09-28 14:57:42'),
(47, 'Prantho kumar das', 'ddddddddddddddd34', 'Pranthokumardas786@gmail.com', 1794188834, '17', 700, 'prnaotolflasdjflsdfjlsjdflkjsdlfkjsdlfslfksldfsdfasfdsdfsdfsfsdfsfsdfsafa', 'DIU5f72595a7ce26Screenshot_81.png', '9048ead9080d9b27d6b2b6ed363cbf8cce795f7f', 7, '2020-09-28 15:29:19'),
(48, 'Advocate Mr.Amir Hossain Sarkar', 'BC041252', 'amir@gmail.com', 175352399, '40', 700, 'Rangpur', 'user-1.jpg', '9d12a945db32e3aeb9f754bd13e87b77b46950f5', 0, '2020-09-28 15:43:32'),
(49, 'Asst.Prof.Roksana Akther', 'BA02582', 'roksana@gmail.com', 175526258, '34', 1000, 'Tangail', 'DIU5f72080265e92profile_photo_file_432.jpg', '1530678dbc26bcae08b2fd5fef59adfba92b4cb6', 0, '2020-09-28 15:55:59'),
(50, 'Nahid Sardar', '896532', 'nahid@gmail.com', 52589988, '34', 700, 'dhaka', 'user-1.jpg', '38f2279f58fdd8ad2b6f6f62095658ab9a896c96', 0, '2020-09-28 16:22:06'),
(51, 'Barister Toufiqur Rahman', '9987658', 'toufiqur@gmail.com', 1760998760, '36', 1000, 'Dhaka Suprem Court , Dhaka', 'DIU5f72d521df9eeOR 6319.jpg', '61da428fadf2bbef6955fd7173ba40ac40fba081', 0, '2020-09-29 06:31:51'),
(52, 'Md Rubel Hasan', '61781819191', 'rubel@gmail.com', 1846658034, '34', 500, 'Road No- 3 , Shaymoli,Mirpur Road,Dhaka-1207', 'lawyerp.jpeg', '8c026e413a1a0e06210e5429f126239851daf2d0', 4, '2020-09-29 06:54:44'),
(53, 'Advocat Arafat Hosain ', 'BA02584', 'arafat@gmail.com', 175522241, '39', 700, 'Rajshahi', 'lawyerp.jpeg', '6bddc143973798573fa5ff52a482a231853a7038', 0, '2020-09-29 11:55:56'),
(55, 'Dipto AD', '217', 'diptocmt04@gmail.com', 1720655050, '41', 0, 'Dhaka', 'lawyerp.jpeg', '7c222fb2927d828af22f592134e8932480637c0d', 0, '2020-09-29 17:20:55'),
(56, 'Dipto Adkari', '7654', 'diptocse01@gmail.com', 1727972571, '41', 0, 'Dhaka', 'lawyerp.jpeg', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 0, '2020-09-29 17:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE `msg` (
  `mid` int(11) NOT NULL,
  `frm` varchar(100) NOT NULL,
  `to` varchar(100) NOT NULL,
  `msg` text NOT NULL,
  `cid` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`mid`, `frm`, `to`, `msg`, `cid`, `time`) VALUES
(72, 'pranthodasshoccho@gmail.com', 'Pranthokumardas786@gmail.com', 'hi sir  i am messae', 'pra5f649b35a96be', '2020-09-18 11:34:41'),
(73, 'Pranthokumardas786@gmail.com', 'pranthodasshoccho@gmail.com', 'yes tel me what is your promblem', 'pra5f649b35a96be', '2020-09-18 11:35:31'),
(74, 'pranthodasshoccho@gmail.com', 'Pranthokumardas786@gmail.com', 'hi sir i am pranhot', 'pra5f649b35a96be', '2020-09-19 10:06:41'),
(75, 'shawon@gmail.com', 'shahjahanparamanik1@gmail.com', 'hi', 'pra5f65d1d66807d', '2020-09-19 14:22:03'),
(76, 'shahjahanparamanik1@gmail.com', 'shawon@gmail.com', 'hlw', 'pra5f65d1d66807d', '2020-09-19 14:25:58'),
(77, 'pranthodasshoccho@gmail.com', 'shahjahanparamanik1@gmail.com', 'hi sir\r\n', 'pra5f6703fd3aaac', '2020-09-20 07:25:58'),
(78, 'mamun@gmail.com', 'safiur@gmail.com', 'hi', 'pra5f6725d7c08da', '2020-09-20 09:50:21'),
(79, 'safiur@gmail.com', 'mamun@gmail.com', 'hlw', 'pra5f6725d7c08da', '2020-09-20 09:53:52'),
(80, 'safiur@gmail.com', 'mamun@gmail.com', 'à¦­à¦¾à¦‡ à¦†à¦®à¦¿ à§® à¦Ÿà¦¾à¦° à¦¦à¦¿à¦•à§‡ à¦«à§à¦°à¦¿ à¦†à¦›à¦¿', 'pra5f6725d7c08da', '2020-09-20 09:54:45'),
(81, 'mamun@gmail.com', 'safiur@gmail.com', 'à¦“à¦•à§‡ à¦¸à§à¦¯à¦¾à¦° à¦†à¦®à¦¿ à§® à¦Ÿà¦¾à§Ÿ à¦†à¦¸à¦¬', 'pra5f6725d7c08da', '2020-09-20 09:57:05'),
(82, 'Pranthokumardas786@gmail.com ', 'pranthodasshoccho@gmail.com', 'Hi sir', 'pra5f649b35a96be', '2020-09-20 12:32:40'),
(83, 'dipto@gmail.com', 'dip@gmail.com', 'Hi', 'pra5f6783e9bb9d1', '2020-09-20 16:31:45'),
(84, 'pranthodasshoccho@gmail.com', 'Pranthokumardas786@gmail.com', 'Yes tell me', 'pra5f649b35a96be', '2020-09-20 16:36:55'),
(85, 'hasan@gmail.com', 'riaz@gmail.com', 'Riaz vi free asen 3pm e....', 'pra5f683f3553ff8', '2020-09-21 05:51:27'),
(86, 'riaz@gmail.com', 'hasan@gmail.com', 'Ha office e aisen.. ', 'pra5f683f3553ff8', '2020-09-21 06:21:39'),
(87, 'tusar@gmail.com', 'diptoadhikary@gmail.com', 'Sir apni ki free asen?', 'pra5f68b830d2231', '2020-09-21 14:27:17'),
(88, 'Pranthokumardas786@gmail.com', 'Pranthokumardas786@gmail.com', 'hi sir how are you', 'pra5f69ea317feef', '2020-09-22 12:12:45'),
(89, 'Pranthokumardas786@gmail.com', 'Pranthokumardas786@gmail.com', 'i am goodd you', 'pra5f69ea317feef', '2020-09-22 12:13:23'),
(90, 'sagor@gmail.com', 'shajahan@gmail.com', 'hi', 'pra5f6d66af88e90', '2020-09-25 03:40:37'),
(91, 'rabbi@gmail.com', 'rafid@gmail.com', 'sir apni ki free achen?', 'pra5f6e12ebca0ce', '2020-09-25 15:55:47'),
(92, 'rafid@gmail.com', 'rabbi@gmail.com', 'hmm..achi', 'pra5f6e12ebca0ce', '2020-09-25 16:09:08'),
(93, 'fazla244@yahoo.com', 'nitaisarkar@gmail.com', 'hi', 'pra5f706ca956ef8', '2020-09-27 10:43:53'),
(94, 'nitaisarkar@gmail.com', 'fazla244@yahoo.com', 'hmm', 'pra5f706ca956ef8', '2020-09-27 10:44:33'),
(95, 'shahin@gmail.com', 'toufiqur@gmail.com', 'Sir , Are you free ? Can I talk with you ? ', 'pra5f72d6d26a0cc', '2020-09-29 06:41:05'),
(96, 'toufiqur@gmail.com', 'shahin@gmail.com', 'Yes , I am free. You can text me.', 'pra5f72d6d26a0cc', '2020-09-29 06:43:25'),
(97, 'hasan@gmail.com', 'riaz@gmail.com', 'hi', 'pra5f683f3553ff8', '2020-09-29 07:01:11'),
(98, 'hasan@gmail.com', 'rubel@gmail.com', 'hi', 'pra5f72dbcba1415', '2020-09-29 07:01:36'),
(99, 'billal@gmail.com', 'diptocmt@gmail.com', 'Hello Sir, Inform you that I did not submit Income Tax return of previous year. So what I do at now?', 'pra5f72f81d4989f', '2020-09-29 09:04:54'),
(100, 'sohan@gmail.com', 'saiful@gmail.com', 'sir,apni ki free achen?', 'pra5f740b45a9385', '2020-09-30 04:36:45'),
(101, 'saiful@gmail.com', 'sohan@gmail.com', 'ok.\r\nasen', 'pra5f740b45a9385', '2020-09-30 04:39:13'),
(102, 'sagor@gmail.com', 'saiful@gmail.com', 'sir apni ki free achen??', 'pra5f746a736d7d5', '2020-09-30 11:22:41'),
(103, 'saiful@gmail.com', 'sagor@gmail.com', 'ha...free achi', 'pra5f746a736d7d5', '2020-09-30 11:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `msgroom`
--

CREATE TABLE `msgroom` (
  `id` int(11) NOT NULL,
  `coid` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `sid` int(11) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `rid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `msgroom`
--

INSERT INTO `msgroom` (`id`, `coid`, `sender`, `sid`, `receiver`, `rid`, `time`) VALUES
(27, 'pra5f649b35a96be', 'pranthodasshoccho@gmail.com', 8, 'Pranthokumardas786@gmail.com', 16, '2020-09-18 11:34:13'),
(28, 'pra5f65d1d66807d', 'shawon@gmail.com', 12, 'shahjahanparamanik1@gmail.com', 20, '2020-09-19 09:39:34'),
(29, 'pra5f65d42a8e4f2', 'shawon@gmail.com', 12, '', 0, '2020-09-19 09:49:30'),
(30, 'pra5f6703fd3aaac', 'pranthodasshoccho@gmail.com', 8, 'shahjahanparamanik1@gmail.com', 20, '2020-09-20 07:25:49'),
(31, 'pra5f6725d7c08da', 'mamun@gmail.com', 16, 'safiur@gmail.com', 23, '2020-09-20 09:50:15'),
(32, 'pra5f6783e9bb9d1', 'dipto@gmail.com', 18, 'dip@gmail.com', 27, '2020-09-20 16:31:37'),
(33, 'pra5f683f3553ff8', 'hasan@gmail.com', 20, 'riaz@gmail.com', 25, '2020-09-21 05:50:45'),
(34, 'pra5f68b830d2231', 'tusar@gmail.com', 17, 'diptoadhikary@gmail.com', 29, '2020-09-21 14:26:56'),
(35, 'pra5f69ea317feef', 'Pranthokumardas786@gmail.com', 23, 'Pranthokumardas786@gmail.com', 35, '2020-09-22 12:12:33'),
(36, 'pra5f69ea586b414', 'Pranthokumardas786@gmail.com', 23, '', 0, '2020-09-22 12:13:12'),
(37, 'pra5f6d66af88e90', 'sagor@gmail.com', 24, 'shajahan@gmail.com', 31, '2020-09-25 03:40:31'),
(38, 'pra5f6e12ebca0ce', 'rabbi@gmail.com', 25, 'rafid@gmail.com', 37, '2020-09-25 15:55:23'),
(39, 'pra5f706ca956ef8', 'fazla244@yahoo.com', 26, 'nitaisarkar@gmail.com', 38, '2020-09-27 10:42:49'),
(40, 'pra5f72d6d26a0cc', 'shahin@gmail.com', 33, 'toufiqur@gmail.com', 51, '2020-09-29 06:40:18'),
(41, 'pra5f72dbcba1415', 'hasan@gmail.com', 20, 'rubel@gmail.com', 52, '2020-09-29 07:01:31'),
(42, 'pra5f72f81d4989f', 'billal@gmail.com', 34, 'diptocmt@gmail.com', 46, '2020-09-29 09:02:21'),
(43, 'pra5f740b45a9385', 'sohan@gmail.com', 36, 'saiful@gmail.com', 43, '2020-09-30 04:36:21'),
(44, 'pra5f746a736d7d5', 'sagor@gmail.com', 39, 'saiful@gmail.com', 43, '2020-09-30 11:22:27');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `pay_man` varchar(50) NOT NULL,
  `pay_rec` varchar(50) NOT NULL,
  `pay_met` varchar(30) NOT NULL,
  `pay_am` int(11) NOT NULL,
  `pay_amnt` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `pay_man`, `pay_rec`, `pay_met`, `pay_am`, `pay_amnt`, `time`) VALUES
(4, 'sahin@gmail.com', 'hasan11@gmail.com', 'bkash', 1794188835, 700, '2020-09-24 19:45:39'),
(5, 'sagor@gmail.com', 'shajahan@gmail.com', 'bkash', 174666446, 500, '2020-09-24 20:40:01'),
(6, 'rabbi@gmail.com', 'rafid@gmail.com', 'bkash', 174666446, 500, '2020-09-25 08:53:26'),
(8, 'Pranthokumardas786@gmail.com', 'pranthodasshoccho@gmail.com', 'bkash', 1794188835, 500, '2020-09-28 03:48:16'),
(9, 'Pranthokumardas786@gmail.com', 'Pranthokumardas786@gmail.com', 'bkash', 1794188835, 700, '2020-09-28 08:37:22'),
(10, 'hasan@gmail.com', 'hasan11@gmail.com', 'bkash', 1762902854, 700, '2020-09-28 10:41:52'),
(11, 'pranthodasshoccho@gmail.com', 'Pranthokumardas786@gmail.com', 'bkash', 1982837799, 700, '2020-09-28 12:57:53'),
(12, 'shahin@gmail.com', 'toufiqur@gmail.com', 'bkash', 1710741464, 1000, '2020-09-28 23:38:33'),
(13, 'hasan@gmail.com', 'rubel@gmail.com', 'bkash', 174666446, 500, '2020-09-28 23:59:34'),
(14, 'billal@gmail.com', 'diptocmt@gmail.com', 'bkash', 1771434742, 500, '2020-09-29 02:00:48'),
(15, 'billal@gmail.com', 'diptocmt@gmail.com', 'bkash', 1771434742, 500, '2020-09-29 02:00:48'),
(16, 'sohan@gmail.com', 'saiful@gmail.com', 'bkash', 1762902854, 1000, '2020-09-29 21:30:00'),
(17, 'hasan@gmail.com', 'khademul@gmail.com', 'nagad', 172564232, 500, '2020-09-29 23:45:46'),
(18, 'tusar@gmail.com', 'sahinad@gmail.com', 'nagad', 172564232, 1000, '2020-09-30 00:10:59'),
(19, 'sagor@gmail.com', 'saiful@gmail.com', 'bkash', 1746093441, 1000, '2020-09-30 04:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rid` int(11) NOT NULL,
  `crid` int(11) NOT NULL,
  `lrid` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `rstatus` int(11) NOT NULL DEFAULT 0,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rid`, `crid`, `lrid`, `rating`, `rstatus`, `time`) VALUES
(9, 15, 25, NULL, 0, '2020-09-28 07:03:39'),
(12, 20, 52, 4, 1, '2020-09-28 23:59:40'),
(13, 34, 46, 4, 1, '2020-09-29 02:00:52'),
(28, 36, 43, 5, 1, '2020-09-29 21:40:39'),
(33, 29, 47, NULL, 0, '2020-09-29 23:52:29'),
(34, 28, 47, NULL, 0, '2020-09-29 23:52:41'),
(35, 17, 30, 5, 1, '2020-09-30 00:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `sid` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`sid`, `service_name`, `time`) VALUES
(16, 'Real Estate Law', '2020-09-03 08:31:13'),
(17, 'Cyber Crime', '2020-09-03 08:31:40'),
(34, 'Human RightLaw', '2020-09-21 12:47:05'),
(35, 'Crime Law', '2020-09-21 12:47:37'),
(36, 'Business Law ', '2020-09-21 12:50:12'),
(37, 'Land Law', '2020-09-21 13:59:15'),
(39, 'Income Tax Law ', '2020-09-28 14:22:38'),
(40, 'Civil Law', '2020-09-28 14:22:56'),
(41, 'Religious law', '2020-09-29 17:11:59'),
(42, 'NGO Law', '2020-09-29 17:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `hid` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`hid`, `title`, `time`) VALUES
(1, 'Diu Lawfirm', '2020-08-19 07:00:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adid`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contid`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`Lid`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `msgroom`
--
ALTER TABLE `msgroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`hid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `Lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `msgroom`
--
ALTER TABLE `msgroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
