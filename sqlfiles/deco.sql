-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 08:07 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deco`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
`lessonID` int(11) NOT NULL,
  `lName` varchar(100) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `material` text NOT NULL,
  `description` longtext
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonID`, `lName`, `category`, `material`, `description`) VALUES
(1, 'Phising Email', 'Security', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', NULL),
(2, 'Choosing Safe Password', 'Privacy', 'Testing Data', 'description Data');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `lessonID` int(11) NOT NULL,
  `question` text NOT NULL,
  `option` text NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
`sid` int(11) NOT NULL,
  `sOrder` int(3) NOT NULL,
  `sContent` text,
  `sTitle` varchar(50) NOT NULL,
  `lessonID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`sid`, `sOrder`, `sContent`, `sTitle`, `lessonID`) VALUES
(1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\n                  terry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email', 1),
(2, 2, 'Testing Content of Further Study', 'Special Phishing Emails', 1),
(3, 1, 'Added by leon!', 'Introduction to Lightsabers', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `password`) VALUES
('admin', 'admin'),
('deco', '3800');

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson`
--

CREATE TABLE IF NOT EXISTS `user_lesson` (
  `userID` varchar(65) NOT NULL,
  `lessonID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
 ADD PRIMARY KEY (`lessonID`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD PRIMARY KEY (`sid`), ADD KEY `lessonID` (`lessonID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_lesson`
--
ALTER TABLE `user_lesson`
 ADD PRIMARY KEY (`userID`,`lessonID`), ADD KEY `fk_lesson` (`lessonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
ADD CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`);

--
-- Constraints for table `user_lesson`
--
ALTER TABLE `user_lesson`
ADD CONSTRAINT `fk_lesson` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`),
ADD CONSTRAINT `user_lesson_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
