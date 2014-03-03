-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 18, 2013 at 08:21 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cyberrange_staging`
--

-- --------------------------------------------------------

--
-- Table structure for table `Participant`
--

DROP TABLE IF EXISTS `Participant`;
CREATE TABLE IF NOT EXISTS `Participant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `work` varchar(20) NOT NULL,
  `isMilitary` tinyint(1) NOT NULL,
  `captain` varchar(20) NOT NULL,
  `cocaptain` varchar(20) NOT NULL,
  `rating` tinyint(10) NOT NULL,
  `insight` varchar(100) NOT NULL,
  `comments` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Participant`
--

INSERT INTO `Participant` VALUES(1, 'asdf', 'asdf', 2147483647, 'foo@bar.com', 'asdf', 1, 'asdf', 'sdf', 6, 'asdf', 'asdf');
INSERT INTO `Participant` VALUES(2, 'asdf', 'fdsa', 2147483647, 'rbvea@hawaii.edu', 'asdf', 1, 'asdf', 'fdsa', 6, 'asdf', 'fdsa');
INSERT INTO `Participant` VALUES(3, 'fdsa', 'fdsa', 1980809129, 'roo@foo.com', 'lkajsdf', 1, 'jfklds;a', 'jkfdls', 6, 'soijef', 'lksjdf');
SET FOREIGN_KEY_CHECKS=1;
