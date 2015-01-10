-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2013 at 01:06 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `photo_gallery`
--
CREATE DATABASE `photo_gallery` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `photo_gallery`;

-- --------------------------------------------------------

--
-- Table structure for table `photographs`
--

CREATE TABLE IF NOT EXISTS `photographs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `photographs`
--

INSERT INTO `photographs` (`id`, `user_id`, `filename`, `type`, `size`, `caption`) VALUES
(10, 1, 'hana0501.jpg', 'image/jpeg', 51907, 'test'),
(9, 1, 'Bike.jpg', 'image/jpeg', 91567, 'Bike test'),
(11, 20, 'IMG012.jpg', 'image/jpeg', 375225, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `verify` varchar(60) DEFAULT NULL,
  `date_registered` datetime DEFAULT NULL,
  `type` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `gender`, `address`, `contact_number`, `email`, `password`, `status`, `verify`, `date_registered`, `type`) VALUES
(1, 'Admin', 'Good', 'Female', 'Address ni nako', '123', 'celpitogo@spcfi.edu.ph', 'd033e22ae348aeb5660fc2140aec35850c4da997', b'1', NULL, '2013-06-07 14:41:24', b'0'),
(20, 'Saint', 'Paulo', 'Male', 'asd', '123', 'spcfi@spcfi.edu.ph', '7b380cf3f8d48dee4c8b8244fd529ca5aef2c987', b'1', NULL, '2013-08-10 07:48:58', b'1'),
(21, 'Chloe', 'Pitogo', 'Female', 'Minglanilla', '123', 'chloe@yahoo.com', '7785db84585b09fc9bc5e7e763fca1095488c446', b'1', NULL, '2013-08-11 09:33:29', b'1'),
(26, 'yx', 'y', 'Male', 'y', 'y', 'y@yahoo.com', '95cb0bfd2977c761298d9624e4b4d4c72a39974a', b'1', NULL, '2013-08-24 02:12:04', b'1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
