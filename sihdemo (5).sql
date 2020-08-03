-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2020 at 12:21 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sihdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `farmerverify`
--

CREATE TABLE `farmerverify` (
  `fvid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fphone` bigint(100) NOT NULL,
  `aadhaar` bigint(100) NOT NULL,
  `lot` int(11) NOT NULL,
  `bag` int(11) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `insofficer` varchar(255) NOT NULL,
  `istatus` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmerverify`
--

INSERT INTO `farmerverify` (`fvid`, `fname`, `fphone`, `aadhaar`, `lot`, `bag`, `address`, `city`, `state`, `pincode`, `image1`, `image2`, `image3`, `image4`, `insofficer`, `istatus`, `created`, `updated`) VALUES
(1, 'Deepak', 8828091784, 3646545454545, 544, 748, 'nbvfnfbvn', 'hyy', 'Madhya Pradesh', 56454, '', '', '', '', 'rahul roy', 'Requested', '2020-08-01 16:54:55', '2020-08-01 16:54:55'),
(2, 'jdbbsk', 7738785911, 689859822, 5989, 988, 'frnfjknkjKE', 'jnFJWNFKJE', 'Chhattisgarh', 659895, '50yrs.png', 'logo1.png', 'logo1.png', 'readmeblog.png', 'deepak mahadik', 'Requested', '2020-08-01 17:27:21', '2020-08-01 17:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_delivery`
--

CREATE TABLE `farmer_delivery` (
  `fdid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fphone` bigint(100) NOT NULL,
  `faddress` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `bag` int(11) NOT NULL,
  `lot` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `d_date` date NOT NULL,
  `dname` varchar(255) NOT NULL,
  `dphone` bigint(100) NOT NULL,
  `sup_phone` bigint(100) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_message` varchar(10000) NOT NULL,
  `ipadd` int(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer_delivery`
--

INSERT INTO `farmer_delivery` (`fdid`, `fname`, `fphone`, `faddress`, `pincode`, `bag`, `lot`, `qty`, `order_id`, `d_date`, `dname`, `dphone`, `sup_phone`, `order_status`, `order_message`, `ipadd`, `created`, `updated`) VALUES
(1, 'ashwini', 8828091784, 'kalyan west', 421301, 4445, 4567, 2, '5d240eaac78f7aa9', '2020-08-05', 'surbhi', 7738785911, 9867292, 'Dispatched', 'Your order has been dispatched and it will be received on $ddate', 789113116, '2020-08-03 05:55:36', '2020-08-03 05:55:36'),
(2, 'ashwini', 8828091784, 'kalyan west', 421301, 4445, 4567, 2, '5d240eaac78f7aa9', '2020-08-05', 'shubham', 9702177695, 9867292, 'Dispatched', 'Your order has been dispatched and it will be received on 2020-08-05', 789113116, '2020-08-03 06:57:03', '2020-08-03 06:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_officer`
--

CREATE TABLE `inspection_officer` (
  `insid` int(11) NOT NULL,
  `insofficer` varchar(255) NOT NULL,
  `inscontact` bigint(100) NOT NULL,
  `state` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inspection_officer`
--

INSERT INTO `inspection_officer` (`insid`, `insofficer`, `inscontact`, `state`) VALUES
(1, 'ravi kumar', 9867292838, 'maharashtra'),
(2, 'shiva rathod', 8828095691, 'uttar pradesh'),
(3, 'avinash patil', 9854695825, 'bihar'),
(4, 'kishor kadam', 9256956262, 'karnataka'),
(5, 'rajesh khanna', 8755257835, 'goa'),
(6, 'rahul roy', 7896451278, 'madhya pradesh'),
(7, 'deepak mahadik', 6892786541, 'Chhattisgarh');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `iid` int(11) NOT NULL,
  `org` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `seedtype` varchar(255) NOT NULL,
  `seed` varchar(255) NOT NULL,
  `qty` float NOT NULL,
  `germination` float NOT NULL,
  `purity` float NOT NULL,
  `lot` bigint(100) NOT NULL,
  `insofficer` varchar(255) NOT NULL,
  `bag` bigint(100) NOT NULL,
  `certificate` varchar(10000) NOT NULL,
  `analysis` varchar(10000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`iid`, `org`, `email`, `supplier`, `seedtype`, `seed`, `qty`, `germination`, `purity`, `lot`, `insofficer`, `bag`, `certificate`, `analysis`, `created`) VALUES
(1, 'nn', 'abc@gmail.com', 'bwehwj', 'zvjhiuae', 'jwhdw', 658, 45, 54, 5485, 'deep', 14455, 'democertificate.pdf', 'Sih analysis report demo.pdf', '2020-07-18 13:21:42'),
(2, 'hjgj', 'de@gmail.com', 'rakseh', 'ndbha', 'moht', 125, 88, 57, 54681, 'Kamal', 545145, '132670.pdf', 'Coursera QYASXBKYQB9R python course5.pdf', '2020-07-19 07:45:04'),
(3, 'bvjgj', 'official@gmail.com', 'szbjb,M', 'mnfsjwe', 'MKJJK', 548, 45, 55, 45854, 'NYUGV', 4545, 'Coursera 5YK5ADJQBSVV Python1.pdf', 'Coursera GXBLA4ATAZRG  python access  web data.pdf', '2020-07-19 13:51:27'),
(4, 'nbgjh', 'deepaksharma7316@gmail.com', 'deepak', 'jfjfEe', 'jute seed', 700, 88, 78, 12345, 'Shubham', 54321, 'B2-32-Ashwini-Paunikar-IP.pdf', 'CG index-batch-2018-2021.pdf', '2020-07-21 06:34:14'),
(5, 'hghg', 'deepaksharma7316@gmail.com', 'Deepak Sharma', 'white', 'j103', 1, 23, 47, 6895, 'Shivaji boss', 9496, 'B2-32-Ashwini-Paunikar-IP.pdf', 'B2-41-Deepak-Sharma-IP.pdf', '2020-07-23 12:00:15'),
(6, 'huyft', 'official@gmail.com', 'Deepak Sharma', 'white', 'j103', 1, 23, 47, 6895, 'Shivaji boss', 9496, 'B2-41-Deepak-Sharma-DMBI.pdf', 'CG index-batch-2018-2021.pdf', '2020-07-24 07:32:19'),
(7, 'JuteB', 'deepaksharma7316@gmail.com', 'Deepak Sharma', 'white', 'j102', 2, 17, 58, 4567, 'Akash', 4445, 'B2-41-Deepak-Sharma-CG.pdf', 'B2-41-Deepak-Sharma-DMBI.pdf', '2020-07-25 12:09:44'),
(8, 'Official NJB', 'official@gmail.com', 'Deepak Sharma', 'white', 'j102', 2, 17, 58, 4567, 'Akash', 4445, 'democertificate.pdf', 'Sih analysis report demo.pdf', '2020-07-30 10:12:53'),
(9, 'JuteB', 'deepaksharma7316@gmail.com', 'Deepak Sharma', 'tossa', 'j101', 2, 35, 40, 1234, 'Anthony', 9875, 'AR247-183-MindFreak-Deepak Sharma.pdf', 'Sih analysis report demo.pdf', '2020-07-30 10:16:26'),
(10, 'Official NJB', 'official@gmail.com', 'Deepak Sharma', 'white', 'j102', 5000, 17, 58, 4567, 'Akash', 4445, 'AR247-183-MindFreak-Deepak Sharma.pdf', 'AR247-183-MindFreak-Deepak Sharma.pdf', '2020-07-30 11:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `nid` int(11) NOT NULL,
  `org` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `msgtype` varchar(255) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `nstatus` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`nid`, `org`, `usertype`, `msgtype`, `message`, `nstatus`, `created`) VALUES
(1, 'abc', 'Seed Producing', 'info', 'bhasjdh\r\n', 'Invisible', '2020-07-28 16:17:17'),
(2, 'bahgyd', 'Distributor', 'danger', 'mdjbedjej', 'Visible', '2020-07-28 16:29:49'),
(6, 'abc', 'Retailer', 'danger', 'demo message', 'Visible', '2020-07-30 15:26:52'),
(5, 'demo', 'Retailer', 'success', 'hello', 'Visible', '2020-07-30 12:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `off_inventory`
--

CREATE TABLE `off_inventory` (
  `offid` int(11) NOT NULL,
  `official` varchar(255) NOT NULL,
  `org` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `offtoken` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `off_inventory`
--

INSERT INTO `off_inventory` (`offid`, `official`, `org`, `supplier`, `email`, `phone`, `address`, `qty`, `status`, `offtoken`, `created`, `updated`) VALUES
(2, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292838, 'Kmjkgytg', 45, 'Done', '', '2020-07-26 08:27:09', '2020-07-26 12:02:43'),
(3, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', 123, 'Done', '', '2020-07-26 08:27:09', '2020-07-26 12:05:52'),
(4, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', 12, 'Done', '7dce39e78e02164285120cfd4394c2a9', '2020-07-28 07:52:06', '2020-07-28 08:14:43'),
(5, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', 788, 'Done', 'ff0c9eaebb2c78de', '2020-07-28 15:47:42', '2020-07-28 16:06:33'),
(6, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', 788, 'Done', '2fafe0378732b5de', '2020-07-28 15:47:55', '2020-07-28 16:04:33'),
(7, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', 788, 'Done', '786a0a25b6eb6001', '2020-07-29 06:30:48', '2020-07-30 10:22:30'),
(8, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292, 'Kalyan ', 1234, 'Done', '353ed01ccb0b932a', '2020-07-30 10:14:29', '2020-07-30 10:22:36'),
(9, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292, 'Kalyan ', 788, 'Done', '6a24f9fe1d9fb5e4', '2020-07-30 10:14:36', '2020-07-30 10:22:39'),
(10, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292, 'Kalyan ', 14, 'Sent', '2334ec9587ede040', '2020-07-30 10:22:57', '2020-07-30 10:22:57'),
(11, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292, 'Kalyan ', 123, 'Done', 'ef6b842d0d75ffeb', '2020-07-30 15:37:54', '2020-07-30 15:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `orderfs`
--

CREATE TABLE `orderfs` (
  `orid` int(11) NOT NULL,
  `org` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `seedtype` varchar(255) NOT NULL,
  `seed` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `qty` bigint(100) NOT NULL,
  `sqty` bigint(100) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `udate` date NOT NULL,
  `otoken` varchar(255) NOT NULL,
  `ostatus` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderfs`
--

INSERT INTO `orderfs` (`orid`, `org`, `email`, `seedtype`, `seed`, `supplier`, `qty`, `sqty`, `phone`, `address`, `udate`, `otoken`, `ostatus`, `created`) VALUES
(1, 'dsgyteg', 'de@gmail.com', 'jvfWGEUYH', 'jute', 'deepak', 500, 125, 3545845, 'kal domb', '2020-07-23', '', 'Sent', '2015-07-19 13:15:41'),
(2, 'dsgyteg', 'de@gmail.com', 'M,NAFHEBW', 'bhSfg', 'yuhghj', 788, 125, 7886888, 'jhuyuj', '2020-07-17', '', 'Unsend', '2016-07-19 13:40:18'),
(3, 'dsgyteg', 'deepaksharma7316@gmail.com', 'MFHGWh', 'mgjthgiu', 'gctrdcg', 545, 125, 7891929, 'jhuygv', '2020-07-24', '4444', 'Done', '2017-07-19 13:40:39'),
(4, 'JuteB', 'deepaksharma7316@gmail.com', 'HFUFR', 'jutes', 'deepak', 400, 600, 984587, 'kalyan', '2020-07-22', '7891', 'Unsend', '2018-07-21 06:36:27'),
(5, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 123, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-16', '1234', 'Received', '2020-07-26 08:26:03'),
(6, 'JuteB', 'deepaksharma7316@gmail.com', 'HFUFR', 'jutes', 'deepak', 400, 600, 984588, 'kalyan', '2020-07-22', '5478', 'Sent', '2019-07-16 06:36:27'),
(7, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 12, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-09', '7dce39e78e02164285120cfd4394c2a9', 'Done', '2020-07-28 07:46:53'),
(8, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 14, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-23', 'b8066487d6a8866d', 'Unsend', '2020-07-28 08:47:50'),
(9, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 788, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-15', '6a24f9fe1d9fb5e4', 'Done', '2020-07-28 09:19:28'),
(10, 'JuteB', 'deepaksharma7316@gmail.com', 'kenaf', 'j103', 'Deepak Sharma', 788, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-23', '786a0a25b6eb6001', 'Done', '2020-07-28 09:21:12'),
(11, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 788, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-30', '2fafe0378732b5de', 'Done', '2020-07-28 09:22:21'),
(12, 'JuteB', 'deepaksharma7316@gmail.com', 'tossa', 'j101', 'Deepak Sharma', 788, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-23', 'ff0c9eaebb2c78de', 'Done', '2020-07-28 09:23:32'),
(13, 'JuteB', 'deepaksharma7316@gmail.com', 'tossa', 'j101', 'Deepak Sharma', 1234, 299, 9867292838, 'Kalyan Domb Mahanagar Palika mncipal Co-orporation KDMC', '2020-07-31', '353ed01ccb0b932a', 'Done', '2020-07-29 06:35:38'),
(14, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 14, 294, 9867292, 'Kalyan ', '2020-07-16', '2334ec9587ede040', 'Sent', '2020-07-30 10:21:01'),
(15, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 10, 294, 9867292, 'Kalyan ', '2020-07-29', '264e927518bbade6', 'Unsend', '2020-07-30 12:52:17'),
(16, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 123, 294, 9867292, 'Kalyan ', '2020-07-31', 'ef6b842d0d75ffeb', 'Done', '2020-07-30 15:28:27'),
(17, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 123, 290, 9867292, 'Kalyan ', '2020-08-13', 'c432daf89f8393f9', 'Unsend', '2020-08-02 12:36:39'),
(18, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 200, 290, 9867292, 'Kalyan ', '2020-08-20', '937420f243c3cd16', 'Unsend', '2020-08-02 12:50:42'),
(19, 'JuteB', 'deepaksharma7316@gmail.com', 'white', 'j102', 'Deepak Sharma', 123, 290, 9867292, 'Kalyan ', '2020-08-19', 'e61537734aa40736', 'Unsend', '2020-08-02 12:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `requestfv`
--

CREATE TABLE `requestfv` (
  `reqid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `fphone` bigint(100) NOT NULL,
  `aadhaar` bigint(100) NOT NULL,
  `lot` int(11) NOT NULL,
  `bag` int(11) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `insofficer` varchar(255) NOT NULL,
  `istatus` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestfv`
--

INSERT INTO `requestfv` (`reqid`, `fname`, `fphone`, `aadhaar`, `lot`, `bag`, `address`, `city`, `state`, `pincode`, `insofficer`, `istatus`, `created`, `updated`) VALUES
(1, 'Deepak', 8828091784, 3646545454545, 544, 748, 'nbvfnfbvn', 'hyy', 'Madhya Pradesh', 56454, '-', 'Requested', '2020-08-01 16:54:55', '2020-08-01 16:54:55');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `fsid` int(11) NOT NULL,
  `org` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `seedtype` varchar(255) NOT NULL,
  `seed` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `fphone` bigint(100) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `lot` bigint(100) NOT NULL,
  `bag` bigint(100) NOT NULL,
  `faddress` varchar(10000) NOT NULL,
  `pincode` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `trackno` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`fsid`, `org`, `email`, `fname`, `seedtype`, `seed`, `qty`, `fphone`, `supplier`, `lot`, `bag`, `faddress`, `pincode`, `created`, `state`, `mode`, `trackno`) VALUES
(13, 'JuteB', 'deepaksharma7316@gmail.com', 'ashwini', 'white', 'j102', 2, 8828091784, 'Deepak Sharma', 4567, 4445, 'kalyan west', 421301, '2020-08-03 04:23:56', '', '', ''),
(14, 'JuteB', 'deepaksharma7316@gmail.com', 'shubham', 'white', 'j102', 2, 9702177695, 'Deepak Sharma', 4567, 4445, 'kalyan', 421301, '2020-08-03 06:58:43', '', '', ''),
(15, 'Raju Seeds', 'desk@asd.com', 'kaju', 'tossa', 'j101', 5, 8976264590, 'Suraj Samsaran', 1234, 9874, '301, F-1, Gokul Nagari, Khadakpada, Kalyan', 421301, '2020-08-03 10:17:02', 'Maharashtra', 'Online', 'EU288434319IN');

-- --------------------------------------------------------

--
-- Table structure for table `seeds`
--

CREATE TABLE `seeds` (
  `ssid` int(11) NOT NULL,
  `seedtype` varchar(255) NOT NULL,
  `seed` varchar(255) NOT NULL,
  `germination` int(11) NOT NULL,
  `purity` int(11) NOT NULL,
  `lot` bigint(100) NOT NULL,
  `bag` bigint(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `insofficer` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seeds`
--

INSERT INTO `seeds` (`ssid`, `seedtype`, `seed`, `germination`, `purity`, `lot`, `bag`, `qty`, `insofficer`, `created`) VALUES
(1, 'tossa', 'j101', 45, 55, 1234, 9876, 5, 'Kamaal', '2020-07-21 02:52:29'),
(2, 'tossa', 'j101', 35, 40, 1234, 9875, 2, 'La jawab', '2020-07-21 02:48:26'),
(3, 'tossa', 'j101', 72, 25, 1234, 9874, 1, 'Anthony', '2020-07-22 04:18:41'),
(4, 'tossa', 'j101', 56, 47, 1235, 9494, 5, 'Amar', '2020-07-22 04:20:58'),
(5, 'tossa', 'j101', 89, 55, 1235, 9495, 2, 'Akbar', '2020-07-22 04:21:22'),
(6, 'kenaf', 'j103', 23, 47, 6895, 9496, 1, 'Shivaji boss', '2020-07-22 04:21:38'),
(7, 'white', 'j102', 81, 28, 4567, 4444, 5, 'Akash', '2020-07-22 04:23:03'),
(8, 'white', 'j102', 17, 58, 4567, 4445, 2, 'Akash', '2020-07-22 04:23:25'),
(9, 'white', 'j102', 39, 76, 4565, 4446, 1, 'luis', '2020-07-22 04:24:01'),
(10, 'kenaf', 'j103', 56, 15, 6894, 1234, 5, 'bekaar', '2020-07-22 05:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `state_name`
--

CREATE TABLE `state_name` (
  `Id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_name`
--

INSERT INTO `state_name` (`Id`, `Name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Manipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikkim'),
(23, 'Tamil Nadu'),
(24, 'Telangana'),
(25, 'Tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(28, 'West Bengal'),
(29, 'Andaman and Nicobar Islands'),
(30, 'Chandigarh'),
(31, 'Dadra and Nagar Haveli'),
(32, 'Daman and Diu'),
(33, 'Delhi'),
(34, 'Jammu and Kashmir'),
(35, 'Lakshadweep'),
(36, 'Puducherry');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sid` int(11) NOT NULL,
  `org` varchar(1000) NOT NULL,
  `type` varchar(255) NOT NULL,
  `address` varchar(10000) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fax` bigint(100) NOT NULL,
  `license` varchar(255) NOT NULL,
  `aadhaar` varchar(255) NOT NULL,
  `phone` bigint(100) NOT NULL,
  `contactp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sid`, `org`, `type`, `address`, `email`, `fax`, `license`, `aadhaar`, `phone`, `contactp`, `password`, `file`, `token`, `status`, `created`, `updated`) VALUES
(4, 'Official NJB', 'Official', 'Madhyapradesh kalyan west', 'official@gmail.com', 123456, '87594875', '12549857', 2121212, 'Deepak Sharma', '25f9e794323b453885f5181f1b624d0b', 'Coursera DDMQSXSPQC4D ML.pdf', 'd0b199ee8b8a5bdaccdb296b3d70dac6', 'Active', '2020-07-19 06:45:45', '2020-07-30 10:11:58'),
(2, 'dsgyteg', 'Retailer', 'dhawfiur', 'de@gmail.com', 455984, '4468789', '48746787', 948469855, 'bhdjwyegf', '25d55ad283aa400af464c76d713c07ad', 'screencapture-localhost-3000-aboutus-html-2020-07-10-23_40_09.pdf', '8732a28fa75df4a418c67c134a1e7c26', 'Active', '2020-07-13 17:22:54', '2020-07-13 17:22:54'),
(5, 'JuteB', 'Retailer', 'Kalyan ', 'deepaksharma7316@gmail.com', 111111, '87458947', '568966546', 9867292, 'Deepak Sharma', '25d55ad283aa400af464c76d713c07ad', 'B2-41-Deepak-Sharma-CG.pdf', 'b59b6ecaefe085123bf2ba3d6b8b53ec', 'Active', '2020-07-20 11:49:04', '2020-07-29 06:42:12'),
(8, 'Raju Seeds', 'Seed Producing', '301, F-1, Gokul Nagari, Khadakpada, Kalyan', 'desk@asd.com', 123456789, '656775', '111144448888', 9876456780, 'Suraj Samsaran', '7815696ecbf1c96e6894b779456d330e', 'Patsan Mitra.pdf', '74c3334a7a855d45f0b35fbeaadfafd3', 'Active', '2020-08-03 10:16:19', '2020-08-03 10:15:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmerverify`
--
ALTER TABLE `farmerverify`
  ADD PRIMARY KEY (`fvid`);

--
-- Indexes for table `farmer_delivery`
--
ALTER TABLE `farmer_delivery`
  ADD PRIMARY KEY (`fdid`);

--
-- Indexes for table `inspection_officer`
--
ALTER TABLE `inspection_officer`
  ADD PRIMARY KEY (`insid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `off_inventory`
--
ALTER TABLE `off_inventory`
  ADD PRIMARY KEY (`offid`);

--
-- Indexes for table `orderfs`
--
ALTER TABLE `orderfs`
  ADD PRIMARY KEY (`orid`);

--
-- Indexes for table `requestfv`
--
ALTER TABLE `requestfv`
  ADD PRIMARY KEY (`reqid`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`fsid`);

--
-- Indexes for table `seeds`
--
ALTER TABLE `seeds`
  ADD PRIMARY KEY (`ssid`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmerverify`
--
ALTER TABLE `farmerverify`
  MODIFY `fvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer_delivery`
--
ALTER TABLE `farmer_delivery`
  MODIFY `fdid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `inspection_officer`
--
ALTER TABLE `inspection_officer`
  MODIFY `insid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `off_inventory`
--
ALTER TABLE `off_inventory`
  MODIFY `offid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderfs`
--
ALTER TABLE `orderfs`
  MODIFY `orid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `requestfv`
--
ALTER TABLE `requestfv`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `fsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `ssid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
