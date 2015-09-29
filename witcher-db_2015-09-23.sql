-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2015 at 10:41 PM
-- Server version: 5.5.41
-- PHP Version: 5.4.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `witcher`
--

-- --------------------------------------------------------

--
-- Table structure for table `character`
--

CREATE TABLE IF NOT EXISTS `character` (
  `ID` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `speed` int(30) NOT NULL,
  `str` int(30) NOT NULL,
  `agi` int(30) NOT NULL,
  `live` int(30) NOT NULL,
  `livemax` int(30) NOT NULL,
  `ap` int(30) NOT NULL,
  `lvl` int(30) NOT NULL,
  `exp` int(30) NOT NULL,
  `expmax` int(30) NOT NULL,
  `userId` int(11) NOT NULL,
  `gold` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `character`
--

INSERT INTO `character` (`ID`, `name`, `speed`, `str`, `agi`, `live`, `livemax`, `ap`, `lvl`, `exp`, `expmax`, `userId`, `gold`) VALUES
(1, '', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '11', 22, 22, 22, 222, 222, 50, 10, 0, 100, 1, 597),
(3, '11', 12, 12, 12, 122, 122, 50, 10, 0, 100, 1, 597),
(4, '11', 12, 12, 12, 122, 122, 50, 10, 0, 100, 1, 597),
(5, '11', 12, 12, 12, 122, 122, 50, 10, 0, 100, 0, 597),
(6, '11', 12, 12, 12, 122, 122, 50, 10, 0, 100, 0, 597),
(7, '11', 12, 12, 12, 122, 122, 50, 10, 0, 100, 0, 597),
(8, '11', 12, 12, 12, 122, 122, 50, 10, 0, 100, 0, 597),
(9, '11', 14, 15, 14, 292, 122, 30, 10, 0, 100, 2, 89097),
(10, 'admin', 10000, 10000, 10000, 100039, 100039, 18, 5, 0, 100, 4, 294);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(11) NOT NULL,
  `itemId` int(20) NOT NULL,
  `charId` int(20) NOT NULL,
  `use` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `itemId`, `charId`, `use`) VALUES
(1, 0, 2, 1),
(2, 2, 2, 0),
(3, 3, 2, 1),
(4, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `itemType` int(20) NOT NULL,
  `bonus` int(20) NOT NULL,
  `minus` int(20) NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `cena` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `itemType`, `bonus`, `minus`, `nazwa`, `cena`) VALUES
(0, 0, 15, 5, 'Miecz starożytnych', 100),
(1, 0, 30, 15, 'Miecz okrucieństwa', 1000),
(2, 1, 15, 5, 'Pancerz Olbrzyma', 100),
(3, 1, 150, 15, 'Pancerz Maltaela', 9100);

-- --------------------------------------------------------

--
-- Table structure for table `monster`
--

CREATE TABLE IF NOT EXISTS `monster` (
  `ID` int(11) NOT NULL,
  `speed` int(30) NOT NULL,
  `str` int(30) NOT NULL,
  `agi` int(30) NOT NULL,
  `live` int(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monster`
--

INSERT INTO `monster` (`ID`, `speed`, `str`, `agi`, `live`, `name`) VALUES
(1, 5, 5, 5, 20, 'zgredek'),
(2, 10, 10, 10, 40, 'poczwarka'),
(3, 20, 20, 20, 70, 'motyl'),
(4, 40, 40, 40, 100, 'Diabolo');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `login`, `pass`, `mail`) VALUES
(1, 'qq', '123', 'qq@qq'),
(2, '11', '11', ''),
(3, '', '', ''),
(4, 'admin', 'qq', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monster`
--
ALTER TABLE `monster`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `character`
--
ALTER TABLE `character`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `monster`
--
ALTER TABLE `monster`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
