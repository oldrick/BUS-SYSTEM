-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2017 at 12:38 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musango`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `numberCode` varchar(5) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT '70',
  `imageName` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`numberCode`, `capacity`, `imageName`) VALUES
('MU001', 40, 'bus.jpeg'),
('MU002', 45, 'bus2.jpeg'),
('MU003', 456, 'IMG_0600.jpg'),
('MU004', 45, 'bus.jpeg'),
('MU006', 46, '41.jpg'),
('MU011', 43, 'IMG_0600.jpg'),
('MU012', 454, '1399789_1395541774020823_770451351_o.jpg'),
('MU013', 3, 'ARMEL ORG 20160730_163321.jpg'),
('MU014', 70, 'ARMEL ORG 20160725_161851.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `body`, `time`, `region`) VALUES
(6, 'stephen', 'nembosteph@gmail.com', 'ticket problem', 'have a problem with my ticket. It lost it. So how\r\ncan i get a new one???', '2017-02-23 15:37:34', ''),
(11, 'stephen', 'nembosteph@gmail.com', 'ticket problem', 'have a problem with my ticket. It lost it. So how\r\ncan i get a new one???', '2017-02-23 15:37:38', ''),
(12, 'oldrick', 'oldrick@gmail.com', 'appreciate the app', 'nice app', '2017-02-23 15:38:08', ''),
(13, 'valere', 'valere@gmail.com', 'i have a problem with my ticket', 'i lost my ticket an i will to know how i can\ntravel without it', '2017-02-23 16:07:56', ''),
(14, 'tsafack voufo audrey mesmer', 'mesmervoufo@gmail.com', 'complain', 'ticket problem for journey number 0120', '2017-04-13 09:18:58', ''),
(15, 'mesmer ', 'mesmervoufo@gmail.com', 'complain', 'ticket problem', '2017-04-13 21:44:52', '');

-- --------------------------------------------------------

--
-- Table structure for table `contactReply`
--

CREATE TABLE `contactReply` (
  `id` int(11) NOT NULL,
  `sentTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replyTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `body` varchar(500) NOT NULL,
  `admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactReply`
--

INSERT INTO `contactReply` (`id`, `sentTime`, `replyTime`, `body`, `admin`) VALUES
(21, '2017-02-23 16:07:56', '2017-04-11 17:59:15', 'jklj', 'tsaffi'),
(23, '2017-02-23 15:38:08', '2017-04-11 18:11:43', 'm,m,mm,', 'mesmer'),
(24, '2017-02-23 15:38:08', '2017-04-11 18:12:14', 'mml, ,,', 'mesmer'),
(25, '2017-02-23 16:07:56', '2017-04-11 18:12:29', 'm, , m, mm', 'mesmer'),
(26, '2017-04-13 09:18:58', '2017-04-13 17:19:48', 'fdgdfd\r\n\r\n', 'mesmer'),
(27, '2017-04-13 09:18:58', '2017-04-13 17:20:05', 'fdfddfdf', 'mesmer');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` int(4) UNSIGNED ZEROFILL NOT NULL,
  `journeyId` int(4) UNSIGNED ZEROFILL NOT NULL,
  `customerName` varchar(100) NOT NULL,
  `telNo` varchar(9) NOT NULL,
  `seat` int(11) NOT NULL,
  `regTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `setSeat` varchar(3) NOT NULL,
  `regTime2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idCard` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `journeyId`, `customerName`, `telNo`, `seat`, `regTime`, `setSeat`, `regTime2`, `idCard`) VALUES
(0076, 0199, 'mesmer', '680053020', 3, '2017-04-10 09:48:06', 'off', '2017-04-10 12:38:17', 'f5df45a4df4'),
(0077, 0199, 'mesmer voufo', '680053020', 3, '2017-04-10 09:52:05', 'on', '2017-04-10 12:37:07', '46464'),
(0078, 0199, 'je', 'k', 3, '2017-04-10 10:10:32', 'on', '2017-04-10 12:37:07', 'jjk'),
(0079, 0199, 'je', 'k', 3, '2017-04-10 10:12:21', 'on', '2017-04-10 12:37:08', 'jjk'),
(0080, 0199, 'tsaffi', '666666666', 4, '2017-04-12 14:57:15', 'on', '2017-04-12 14:57:15', '5646464164'),
(0081, 0200, 'm,kn,', '666666666', 3, '2017-04-12 15:00:49', 'on', '2017-04-13 06:35:41', '56446');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `name` varchar(50) NOT NULL,
  `telNo` varchar(9) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `residence` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`name`, `telNo`, `sex`, `residence`, `salary`) VALUES
('adfa', '564146646', 'M', 'Yaounde', 200000),
('djfa', '454544444', 'M', 'Yaounde', 0),
('joel pangui', '691655398', 'M', 'Douala', 0),
('john', '9689914+5', 'F', 'Yaounde', 0),
('kaka', '691655398', 'F', 'Buea', 0),
('Mesmer voufo', '680053020', 'M', 'Yaounde', 0),
('ngesb', '656494644', 'M', 'Buea', 0),
('stephen', '781466615', 'M', 'Ngaoundere', 0),
('tsaffi', '456466664', 'M', 'Garoua', 0);

-- --------------------------------------------------------

--
-- Table structure for table `journey`
--

CREATE TABLE `journey` (
  `journeyId` int(4) UNSIGNED ZEROFILL NOT NULL,
  `numberCode` varchar(5) NOT NULL,
  `setJourney` int(11) NOT NULL DEFAULT '0',
  `journey` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `takeOffDate` date NOT NULL,
  `takeOffTime` time NOT NULL,
  `arrivalDate` date NOT NULL,
  `arrivalTime` time NOT NULL,
  `driver` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journey`
--

INSERT INTO `journey` (`journeyId`, `numberCode`, `setJourney`, `journey`, `price`, `takeOffDate`, `takeOffTime`, `arrivalDate`, `arrivalTime`, `driver`) VALUES
(0199, 'MU001', 1, 'Douala-Yaounde', 5500, '2017-02-23', '22:00:00', '2017-02-24', '06:00:00', 'john'),
(0200, 'MU002', 1, 'Douala-Buea', 4500, '2017-04-12', '16:00:00', '2017-02-27', '18:00:00', 'joel pangui');

-- --------------------------------------------------------

--
-- Table structure for table `journeyRecord`
--

CREATE TABLE `journeyRecord` (
  `id` int(11) NOT NULL,
  `journeyId` int(4) UNSIGNED ZEROFILL NOT NULL,
  `numberCode` varchar(5) NOT NULL,
  `setJourney` int(11) NOT NULL DEFAULT '0',
  `journey` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `takeOffDate` date NOT NULL,
  `takeOffTime` time NOT NULL,
  `arrivalDate` date NOT NULL,
  `arrivalTime` time NOT NULL,
  `driver` varchar(50) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journeyRecord`
--

INSERT INTO `journeyRecord` (`id`, `journeyId`, `numberCode`, `setJourney`, `journey`, `price`, `takeOffDate`, `takeOffTime`, `arrivalDate`, `arrivalTime`, `driver`, `userName`, `time`, `action`) VALUES
(4, 0203, 'MU001', 1, 'Douala-Bertoua', 8000, '2017-02-24', '23:00:00', '2017-02-26', '06:00:00', 'Mesmer voufo', 'mesmer', '2017-04-12 10:53:30', 'delete'),
(5, 0200, 'MU002', 1, 'Douala-Buea', 4500, '2017-04-12', '16:10:00', '2017-02-27', '18:00:00', 'joel pangui', 'mesmer', '2017-04-12 10:54:08', 'update'),
(6, 0200, 'MU002', 0, 'Douala-Buea', 4500, '2017-02-27', '06:00:00', '2017-02-27', '18:00:00', 'joel pangui', 'mesmer', '2017-04-12 10:54:33', 'update'),
(9, 0199, 'MU001', 1, 'Douala-Yaounde', 5500, '2017-02-23', '22:00:00', '2017-02-24', '06:00:00', 'john', 'mesmer', '2017-04-12 11:29:55', 'update');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `telNo` varchar(9) NOT NULL,
  `residence` varchar(20) NOT NULL,
  `salary` int(11) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`firstName`, `lastName`, `userName`, `telNo`, `residence`, `salary`, `password`) VALUES
('mesmer', 'audrey', 'mesmer', '680053020', 'Douala', 200000, '$2y$13$emgBTFMdlCM6XsXP0Wnb.OqQAvn5sov5gZYv/4TN4LhTCWCBmukQa'),
('tsafack', 'voufo', 'tsaffi', '691655398', 'Yaounde', 500000, '$2y$13$D0tjIiW1ER7CxILw/dt1TefFlox/23RG1cy7rVcHoBrz74G.sdLLO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`numberCode`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactReply`
--
ALTER TABLE `contactReply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`),
  ADD KEY `journey_id` (`journeyId`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `journey`
--
ALTER TABLE `journey`
  ADD PRIMARY KEY (`journeyId`),
  ADD KEY `number_code` (`numberCode`);

--
-- Indexes for table `journeyRecord`
--
ALTER TABLE `journeyRecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_code` (`numberCode`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `contactReply`
--
ALTER TABLE `contactReply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerId` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `journey`
--
ALTER TABLE `journey`
  MODIFY `journeyId` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;
--
-- AUTO_INCREMENT for table `journeyRecord`
--
ALTER TABLE `journeyRecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
