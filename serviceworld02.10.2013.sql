-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2013 at 11:19 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `serviceworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `styleClass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `createdDate` int(11) DEFAULT NULL,
  `createdBy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `siteinfo`
--

DROP TABLE IF EXISTS `siteinfo`;
CREATE TABLE IF NOT EXISTS `siteinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `siteName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `siteUrl` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attachInfo` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `user_site` (`userId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `description`, `url`, `order`, `state`) VALUES
(1, 'tr', '#441.png', 'rt', 'tet', 0, 0),
(2, 'hh', 'IMG_04092013_001302.png', 'hh', 'hh', 1, 1),
(3, 'fgdg', '#441.png', 'ut', 'uyt', 2, 1),
(4, 'tre', '#441.png', 'ttttt', '', 0, 1),
(5, 'test', 'addRecipient.png', 'test', 'test', 0, 1),
(6, 'test slider', 'Fix_Task#40.png', 'test slider', 'dantri.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `birthday` int(11) DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phoneNumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyAddress` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `companyPhone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateCreate` int(11) DEFAULT NULL,
  `lastVisit` int(11) DEFAULT NULL,
  `privilege` int(11) DEFAULT '100',
  `state` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `password`, `firstName`, `lastName`, `gender`, `birthday`, `address`, `email`, `phoneNumber`, `companyName`, `companyAddress`, `companyPhone`, `dateCreate`, `lastVisit`, `privilege`, `state`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'trinh', 'duy luong', 1, NULL, 'Nam dinh', ' duyluongnd@gmail.com', '0986636039', 'Smartphp', 'My dinh', '0986636039', NULL, NULL, 1, 1),
(3, 'tess', '8b8be2799a2796a36a02004608426bdb', NULL, 'Tes', 1, 0, 'te', 'eee@gmail.com', '32321313', 'sdasd', 'dasda', 'sada', 1380097377, 1380097377, 100, 0),
(4, 'eerwe', '7b91e738dcdcd9011b3bea8c2f8c46d8', NULL, 'da', 0, 0, 'das', 'info@gmail.com', '31', 'dad', 'dasd', 'da', 1380097432, 1380097432, 100, 0),
(5, 'duyluong', '0192023a7bbd73250516f069df18b500', NULL, 'duy luong', 1, 0, 'nam dinh', 'duyluongnd@gmail.com', '0986636039', 'Smartphp', 'Ha Noi', '84986636039', 1380097761, 1380097761, 100, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siteinfo`
--
ALTER TABLE `siteinfo`
  ADD CONSTRAINT `siteinfo_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
