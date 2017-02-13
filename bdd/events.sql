-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2017 at 10:35 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  `DATE_BEGIN` date NOT NULL,
  `DATE_END` date DEFAULT NULL,
  `DESCRIPTION` text NOT NULL,
  `TYPEID` int(11) NOT NULL,
  `TOTAL_DAY` int(2) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `events_participants`
--

CREATE TABLE IF NOT EXISTS `events_participants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `fk_events_participants_part` (`participant_id`),
  KEY `fk_events_participants` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=254 ;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TEL` varchar(15) DEFAULT NULL,
  `INSTITUTION` varchar(300) NOT NULL,
  `FONCTION` varchar(50) DEFAULT NULL,
  `VALIDE` tinyint(1) NOT NULL DEFAULT '0',
  `COUNTRY` varchar(50) NOT NULL,
  `LISTED` tinyint(1) NOT NULL DEFAULT '1',
  `DIETARY` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=473 ;

-- --------------------------------------------------------

--
-- Table structure for table `posters`
--

CREATE TABLE IF NOT EXISTS `posters` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(50) CHARACTER SET utf8 NOT NULL,
  `URL` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `FIRST_NAME` varchar(50) CHARACTER SET utf8 NOT NULL,
  `LAST_NAME` varchar(50) CHARACTER SET utf8 NOT NULL,
  `INSTITUTION` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE IF NOT EXISTS `programmes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `DAY` int(11) NOT NULL,
  `TIME_BEGIN` time NOT NULL,
  `TIME_END` time NOT NULL,
  `DESCRIPTION` text,
  `event_id` int(11) NOT NULL,
  `SPEAKER` varchar(250) DEFAULT NULL,
  `BREAK` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `fk_programmes_events` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=110 ;

-- --------------------------------------------------------

--
-- Table structure for table `rubrics`
--

CREATE TABLE IF NOT EXISTS `rubrics` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(50) NOT NULL,
  `LINK` varchar(50) NOT NULL,
  `VALIDE` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events_participants`
--
ALTER TABLE `events_participants`
  ADD CONSTRAINT `fk_events_participants` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `fk_events_participants_part` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`ID`);

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
  ADD CONSTRAINT `fk_programmes_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
