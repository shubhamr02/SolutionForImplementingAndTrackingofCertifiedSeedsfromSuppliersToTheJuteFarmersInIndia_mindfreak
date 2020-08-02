-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2020 at 12:37 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(10, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'Shubham', 'tossa', 'j101', 10, 99, 99, 1234, 'Anthony', 9874, 'QualityForm.pdf', 'QualityForm.pdf', '2020-07-30 13:52:56'),
(11, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'Shubham', 'kenaf', 'j103', 5, 99, 97, 6895, 'Shivaji boss', 9496, 'QualityForm.pdf', 'QualityForm.pdf', '2020-07-30 13:53:37'),
(12, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'Shubham', 'white', 'j102', 5, 99, 99, 4567, 'Akash', 4444, 'QualityForm.pdf', 'QualityForm.pdf', '2020-07-30 13:53:58'),
(13, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'Shubham', 'kenaf', 'j103', 5, 99, 99, 6895, 'Shivaji boss', 9496, 'QualityForm.pdf', 'QualityForm.pdf', '2020-07-30 19:56:15'),
(14, 'Raju Seeds', 'feroz.raju@gmail.com', 'Raju', 'white', 'j102', 5, 99, 99, 4567, 'Akash', 4444, 'QualityForm.pdf', 'QualityForm.pdf', '2020-07-31 18:13:54'),
(15, 'Raju Seeds', 'feroz.raju@gmail.com', 'Raju', 'white', 'j102', 10, 99, 99, 4567, 'Akash', 4444, 'QualityForm.pdf', 'QualityForm.pdf', '2020-07-31 19:01:56'),
(16, 'Official NJB', 'official@gmail.com', 'Deepak Sharma', 'white', 'j102', 5, 99, 99, 4567, 'shubham', 4444, 'QualityForm.pdf', 'QualityForm.pdf', '2020-08-01 08:53:48'),
(17, 'Shubham seeds', 'shubham@gm.com', 'shubham', 'kenaf', 'j103', 5, 99, 99, 6895, 'Shivaji boss', 9496, 'QualityForm.pdf', 'QualityForm.pdf', '2020-08-01 09:01:07'),
(18, 'Shubham seeds', 'shubham@gm.com', 'shubham', 'tossa', 'j101', 5, 99, 99, 1234, 'Anthony', 9874, 'QualityForm.pdf', 'QualityForm.pdf', '2020-08-01 12:43:04');

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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`nid`, `org`, `usertype`, `msgtype`, `message`, `nstatus`, `created`) VALUES
(1, 'abc', 'Seed Producing', 'info', 'bhasjdh\r\n', 'Invisible', '2020-07-28 16:17:17'),
(2, 'bahgyd', 'Distributor', 'danger', 'mdjbedjej', 'Visible', '2020-07-28 16:29:49'),
(3, 'mndfkjwe', 'all', 'warning', 'nbdhbej\r\n', 'Invisible', '2020-07-28 16:31:24'),
(5, 'Bamboo Seeds pvt ltd', 'Seed Producing', 'warning', 'You have been authenticated. \r\nPlease login to access\r\nhttp://localhost/JUTracker/Main/Main/login.php', 'Invisible', '2020-07-30 14:00:07'),
(6, 'bamboo.woods20@gmail.com', 'all', 'warning', 'Please login', 'Visible', '2020-07-30 13:59:41');

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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
(10, 'official@gmail.com', 'JuteB', 'Deepak Sharma', 'deepaksharma7316@gmail.com', 9867292, 'Kalyan ', 14, 'Sent', '2334ec9587ede040', '2020-07-30 10:22:57', '2020-07-30 10:22:57');

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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(15, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'tossa', 'j101', 'Shubham', 20, 18, 9082227311, 'Khadak Road Kolkata', '2020-07-30', '4636f9e80a0f132b', 'Unsend', '2020-07-30 13:58:18'),
(16, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'white', 'j102', 'Shubham', 5, 18, 9082227311, 'Khadak Road Kolkata', '2020-07-30', '79498d4b465a9708', 'Unsend', '2020-07-30 14:02:18');

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
  `state` varchar(255) NOT NULL,
  `mode` varchar(255) NOT NULL,
  `trackno` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`fsid`, `org`, `email`, `fname`, `seedtype`, `seed`, `qty`, `fphone`, `supplier`, `lot`, `bag`, `faddress`, `pincode`, `state`, `mode`, `trackno`, `created`) VALUES
(1, 'dsgyteg', 'de@gmail.com', 'brij', 'mnfjk', 'hja', 54, 9746584, 'ash', 5485, 65891, 'bhfgh kalyan', 54875, '', '', '', '2020-06-19 11:35:14'),
(2, 'dsgyteg', 'de@gmail.com', 'bnxbj', 'fyewf', 'jute', 21, 6787, 'jbigb', 1245, 2566, 'ygyubhjb', 57455, '', '', '', '2020-07-20 07:00:44'),
(3, 'JuteB', 'deepaksharma7316@gmail.com', 'ashu', 'tossa', 'jute', 100, 588155, 'deepak', 12345, 54321, 'kalyan', 42135, '', '', '', '2020-08-21 06:35:36'),
(4, 'JuteB', 'deepaksharma7316@gmail.com', 'shdiue', 'kenaf', 'jute', 150, 595636, 'deepak', 659896, 659895, 'kalyan', 53596, '', '', '', '2020-09-21 10:41:34'),
(5, 'JuteB', 'deepaksharma7316@gmail.com', 'deepak', 'mfkjse', 'jutes', 150, 2895985, 'sunlight', 5485, 56596, 'kalyan', 54895, '', '', '', '2020-10-21 15:13:48'),
(6, 'JuteB', 'deepaksharma7316@gmail.com', 'deepak', 'nbdfh', 'j102', 2, 9867292838, 'Deepak Sharma', 4567, 4445, 'kalyan', 58788, '', '', '', '2020-04-23 08:20:53'),
(7, 'JuteB', 'deepaksharma7316@gmail.com', 'deep', 'white', 'j102', 2, 9867292838, 'Deepak Sharma', 4567, 4445, 'nagpur', 58985, '', '', '', '2020-05-24 04:47:31'),
(8, 'JuteB', 'deepaksharma7316@gmail.com', 'ashwini', 'tossa', 'j101', 5, 9867292, 'Deepak Sharma', 1234, 9876, 'kalyan west', 421301, '', '', '', '2020-07-30 10:17:25'),
(9, 'JuteB', 'deepaksharma7316@gmail.com', 'ashwini p', 'white', 'j102', 2, 8828091784, 'Deepak Sharma', 4567, 4445, 'kalyan west', 421302, '', '', '', '2020-07-30 10:20:18'),
(10, 'Bamboo Seeds Pvt Ltd', 'bamboo.woods20@gmail.com', 'Shantaram', 'white', 'j102', 2, 9988776622, 'Shubham', 4567, 4444, 'Jagran Road Guwahati', 321456, '', '', '', '2020-07-30 13:55:17'),
(11, 'Shubham seeds', 'shubham@gm.com', 'chotu', 'tossa', 'j101', 12, 987456321, 'shubham', 1234, 9874, 'asdd, adasd, gsfdg', 456895, '', '', '', '2020-08-02 07:50:39'),
(13, 'Shubham seeds', 'shubham@gm.com', 'kaju', 'tossa', 'j101', 12, 789456258, 'shubham', 1234, 9874, 'ad, asdasd, adasd', 852464, 'maha', 'Online', 'ASDD5455F', '2020-08-02 08:18:35'),
(14, 'Shubham seeds', 'shubham@gm.com', 'shyam', 'tossa', 'j101', 12, 7412589630, 'shubham', 1234, 9874, 'sf, sfsf, sfsf', 632589, 'maharashtra', 'Online', 'EK041455465IN', '2020-08-02 10:12:29');

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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
(10, 'kenaf', 'j103', 56, 15, 6894, 1234, 5, 'bekaar', '2020-07-22 05:00:22'),
(11, '', 'jute', 0, 0, 4567, 23456, 10, '', '2020-08-01 08:46:14');

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
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sid`, `org`, `type`, `address`, `email`, `fax`, `license`, `aadhaar`, `phone`, `contactp`, `password`, `file`, `token`, `status`, `created`, `updated`) VALUES
(4, 'Official NJB', 'Official', 'Madhyapradesh kalyan west', 'official@gmail.com', 123456, '87594875', '12549857', 2121212, 'Deepak Sharma', '25f9e794323b453885f5181f1b624d0b', 'Coursera DDMQSXSPQC4D ML.pdf', 'd0b199ee8b8a5bdaccdb296b3d70dac6', 'Active', '2020-07-19 06:45:45', '2020-07-30 10:11:58'),
(2, 'dsgyteg', 'Retailer', 'dhawfiur', 'de@gmail.com', 455984, '4468789', '48746787', 948469855, 'bhdjwyegf', '25d55ad283aa400af464c76d713c07ad', 'screencapture-localhost-3000-aboutus-html-2020-07-10-23_40_09.pdf', '8732a28fa75df4a418c67c134a1e7c26', 'Active', '2020-07-13 17:22:54', '2020-07-13 17:22:54'),
(5, 'JuteB', 'Retailer', 'Kalyan ', 'deepaksharma7316@gmail.com', 111111, '87458947', '568966546', 9867292, 'Deepak Sharma', '25d55ad283aa400af464c76d713c07ad', 'B2-41-Deepak-Sharma-CG.pdf', 'b59b6ecaefe085123bf2ba3d6b8b53ec', 'Active', '2020-07-20 11:49:04', '2020-07-29 06:42:12'),
(6, 'Bamboo Seeds Pvt Ltd', 'Seed Producing', 'Khadak Road Kolkata', 'bamboo.woods20@gmail.com', 9082227311, '4567123', '111166667777', 9082227311, 'Shubham', 'd6de191dfe7b443a9e8ed6439dadfd9e', 'QualityForm.pdf', 'd25f5453740f4d306eeaa3a867348df2', 'Active', '2020-07-30 13:47:31', '2020-07-30 13:41:20'),
(7, 'Feeroj Seeds pvt ltd', 'Seed Producing', 'kolkata', 'suraj.feroj@gmail.com', 22981234, '3344556', '111122227777', 9671234111, 'Suraj', '8127a1ad276367223d9d0a2d264e4b2e', 'QualityForm.pdf', '55c1ea73e890b06f2e343f578bcf2f83', 'Inactive', '2020-07-30 15:15:34', '2020-07-30 15:15:34'),
(8, 'Raju Seeds', 'Retailer', 'kolkata', 'feroz.raju@gmail.com', 22998764, '234567', '222233334444', 9900223344, 'Raju', 'fe783d3587fb00d99a0045324acb861c', 'QualityForm.pdf', 'fbcc39535fba1ca8c958fb1b2c0488f4', 'Active', '2020-07-31 18:12:57', '2020-07-31 18:11:40'),
(9, 'NSC', 'Seed Producing', 'Bheej Bhavan Delhi', 'abc.nsc@gmail.com', 229988776, '5678123', '333366667777', 9977665522, 'Dinesh', '72ea9b10ad081b41a57c4982649ee7fd', 'QualityForm.pdf', 'cb1dea1dadddcee7fabfe74e88871cb5', 'Inactive', '2020-08-01 05:01:30', '2020-08-01 05:01:30'),
(10, 'Shubham seeds', 'Seed Producing', 'kalyan', 'shubham@gm.com', 228976544, '2345672', '333355556666', 8877665544, 'shubham', '3c4ff022e1b180c77a15853cc2b85471', 'QualityForm.pdf', '052ef11f9f09928b24c83c4a8a1aaedd', 'Active', '2020-08-01 08:43:36', '2020-08-01 08:42:42'),
(11, 'sky seeds', 'Seed Producing', 'altamount road, mumbai', 'skyseeds@gmail.com', 123456789, '123456', '000033336666', 9895678464, 'tom', '912ec803b2ce49e4a541068d495ab570', 'Ch08.pdf', '4ed886c148ef2681bb0042cb97b08662', 'Inactive', '2020-08-01 18:47:19', '2020-08-01 18:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `yield`
--

CREATE TABLE `yield` (
  `fid` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `bagno` bigint(100) NOT NULL,
  `lotno` bigint(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `aadhaar` varchar(255) NOT NULL,
  `file1` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yield`
--

INSERT INTO `yield` (`fid`, `fname`, `contactno`, `bagno`, `lotno`, `city`, `state`, `address`, `pincode`, `aadhaar`, `file1`, `created`) VALUES
(1, 'kaju', '1234567890', 123456, 1234, 'mumbai', '1', 'altamount road, mumbai', 4000001, '333344445555', 'Ch08.pdf', '2020-08-02 04:36:26'),
(2, 'shan', '7788992211', 556677, 23456, 'kolkata', 'Andhra Pradesh', 'kchli road', 456123, '444422221111', 'QualityForm.pdf', '2020-08-02 04:36:18'),
(3, 'rajuram', '9082227311', 223311, 23456, 'kolkata', 'West Bengal', 'Siholi street ', 321456, '222233331111', 'QualityForm.pdf', '2020-08-02 04:36:05'),
(4, 'Rajuram', '9082227311', 445566, 223344, 'Kolkata', 'West Bengal', 'Kattu Road', 321421, '777788889999', 'QualityForm.pdf', '2020-08-02 04:35:31');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `yield`
--
ALTER TABLE `yield`
  ADD PRIMARY KEY (`fid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `iid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `off_inventory`
--
ALTER TABLE `off_inventory`
  MODIFY `offid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orderfs`
--
ALTER TABLE `orderfs`
  MODIFY `orid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `fsid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `seeds`
--
ALTER TABLE `seeds`
  MODIFY `ssid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `yield`
--
ALTER TABLE `yield`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
