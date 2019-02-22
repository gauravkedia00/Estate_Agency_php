-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2016 at 05:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `acres`
--

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE IF NOT EXISTS `flat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `building_name` varchar(255) DEFAULT NULL,
  `bldg_type` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `ready` text NOT NULL,
  `bedrooms` int(2) NOT NULL,
  `user_id` int(255) NOT NULL,
  `per_sqft` float NOT NULL,
  `area` float NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `building_name` (`building_name`),
  KEY `posted_by` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`id`, `building_name`, `bldg_type`, `location`, `ready`, `bedrooms`, `user_id`, `per_sqft`, `area`, `url`) VALUES
(1, 'seaview', 'residential', 'nerul', 'yes', 2, 4, 12000, 500, 'uploads/seaview.jpg'),
(6, 'wadhwa', 'residential', 'bhainder', 'yes', 2, 4, 13000, 500, 'uploads/wadhwa.jpg'),
(7, 'sai darshan', 'residential', 'nerul', 'yes', 5, 4, 20000, 5000, 'uploads/sai darshan.jpg'),
(12, 'saboo', 'commercial', 'vasi', 'no', 10, 4, 2500, 78889, 'uploads/saboo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(30) NOT NULL,
  `name` varchar(10) NOT NULL,
  `pass` varchar(8) NOT NULL,
  `contact` double NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `pass`, `contact`, `type`) VALUES
(4, 'saurabhkedia88@gmail.com', 'poiuy', 'qwerty', 7789876678, 'builder'),
(8, 'web.siesnerul@gmail.com', 'test', 'test', 9930673152, 'customer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
