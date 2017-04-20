-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2017 at 09:14 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `redb`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_preferences`
--

CREATE TABLE IF NOT EXISTS `user_preferences` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `sort_field` varchar(250) NOT NULL,
  `sort_order` varchar(250) NOT NULL,
  `page` varchar(250) NOT NULL,
  `user_id` int(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_preferences`
--

INSERT INTO `user_preferences` (`id`, `sort_field`, `sort_order`, `page`, `user_id`) VALUES
(10, 'Pattern_Family', 'desc', 'products', 6080),
(11, 'usuario_id', 'asc', 'clients', 6080);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
