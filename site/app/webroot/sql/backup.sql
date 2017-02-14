-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2015 at 05:36 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `events`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
`id` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `DATE_BEGIN` date NOT NULL,
  `DATE_END` date DEFAULT NULL,
  `DESCRIPTION` text NOT NULL,
  `TYPEID` int(11) NOT NULL,
  `TOTAL_DAY` int(2) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `NAME`, `DATE_BEGIN`, `DATE_END`, `DESCRIPTION`, `TYPEID`, `TOTAL_DAY`, `valide`) VALUES
(1, 'European Nodes Meeting 2015', '2015-05-05', '2015-01-07', 'European Node Meeting 2015', 1, 3, 1),
(2, 'Workshop Atlas of Living Europe', '2015-05-04', '2015-05-05', 'Atlas of Living Europe', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events_participants`
--

CREATE TABLE `events_participants` (
`id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `participant_id` int(11) NOT NULL,
  `valide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
`ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `TEL` varchar(15) DEFAULT NULL,
  `INSTITUTION` varchar(100) NOT NULL,
  `FONCTION` varchar(50) DEFAULT NULL,
  `VALIDE` tinyint(1) NOT NULL DEFAULT '0',
  `COUNTRY` varchar(50) NOT NULL,
  `LISTED` tinyint(1) NOT NULL DEFAULT '1',
  `DIETARY` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `TEL`, `INSTITUTION`, `FONCTION`, `VALIDE`, `COUNTRY`, `LISTED`, `DIETARY`) VALUES
(214, 'Marie-Elise', 'Lecoq', 'melecoq@gbif.fr', NULL, 'GBIF France', 'Dev', 0, 'France', 1, 'canibale'),
(215, 'Marie-Elise', 'Lecoq', 'marieelise.lecoq@gmail.com', NULL, 'GBIF France', 'Dev', 0, 'France', 1, 'canNibale'),
(216, 'Sophie', 'Pamerlon', 'pamerlon@gbif.fr', NULL, 'GBIF France', 'Data monster', 0, 'France', 1, 'Kinder addict'),
(217, 'Sophie', 'Pamerlon', 'sophie.pamerlon@gmail.com', NULL, 'GBIF France', 'France', 0, 'France', 1, 'Love cats!'),
(218, 'Anne Sophie', 'Archambeau', 'labeyrie@gbif.fr', NULL, 'Gbif France', 'Node Manager', 0, 'France', 0, 'carrotte');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
`ID` int(11) NOT NULL,
  `TITLE` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `DAY` int(11) NOT NULL,
  `TIME_BEGIN` time NOT NULL,
  `TIME_END` time NOT NULL,
  `DESCRIPTION` text,
  `event_id` int(11) NOT NULL,
  `SPEAKER` varchar(250) DEFAULT NULL,
  `BREAK` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `RUBRICS`
--

CREATE TABLE `RUBRICS` (
`ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `LINK` varchar(50) NOT NULL,
  `VALIDE` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `RUBRICS`
--

INSERT INTO `RUBRICS` (`ID`, `NAME`, `LINK`, `VALIDE`) VALUES
(1, 'Home', '/home/index', 1),
(2, 'Participants', '/participants/view', 1),
(3, 'Registration', '/participants/add', 1),
(4, 'Programmes', '/programmes/view', 1),
(5, 'Information', '/information/show', 1),
(6, 'Workshop', '/workshop/index', 1);

-- --------------------------------------------------------

--
-- Table structure for table `TYPE`
--

CREATE TABLE `TYPE` (
`ID` int(11) NOT NULL,
  `NAME` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `TYPE`
--

INSERT INTO `TYPE` (`ID`, `NAME`) VALUES
(1, 'Meeting'),
(2, 'workshop');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'lecoq', '339861fec003279d6284e079fabf3c36c638d1c2', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_participants`
--
ALTER TABLE `events_participants`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_events_participants_part` (`participant_id`), ADD KEY `fk_events_participants` (`event_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `EMAIL` (`EMAIL`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
 ADD PRIMARY KEY (`ID`), ADD KEY `fk_programmes_events` (`event_id`);

--
-- Indexes for table `RUBRICS`
--
ALTER TABLE `RUBRICS`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `TYPE`
--
ALTER TABLE `TYPE`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events_participants`
--
ALTER TABLE `events_participants`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `RUBRICS`
--
ALTER TABLE `RUBRICS`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `TYPE`
--
ALTER TABLE `TYPE`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `events_participants`
--
ALTER TABLE `events_participants`
ADD CONSTRAINT `fk_events_participants` FOREIGN KEY (`event_id`) REFERENCES `events` (`ID`),
ADD CONSTRAINT `fk_events_participants_part` FOREIGN KEY (`participant_id`) REFERENCES `participants` (`ID`);

--
-- Constraints for table `programmes`
--
ALTER TABLE `programmes`
ADD CONSTRAINT `fk_programmes_events` FOREIGN KEY (`event_id`) REFERENCES `events` (`ID`);
