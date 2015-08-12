-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2015 at 06:24 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auscertdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
`lessonID` int(11) NOT NULL,
  `lessonName` varchar(100) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `creator` varchar(30) DEFAULT NULL,
  `material` text NOT NULL,
  `description` longtext
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lessonID`, `lessonName`, `category`, `creator`, `material`, `description`) VALUES
(1, 'Phising Email', 'Online Safety', 'Tartiner Studios', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', NULL),
(2, 'Choosing Safe Password', 'Account Security', 'Redones', 'Testing Data', 'description Data'),
(3, 'Tartiner Studios Training', 'Introduction to the team', 'Tartiner Studios', 'Material goes here', 'description Data');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
`quizID` int(11) NOT NULL,
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
  `lessonID` int(11) NOT NULL,
`slideID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`lessonID`, `slideID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\n                  terry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(1, 2, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(2, 3, 1, 'Lesson 2 Page 1', 'Lesson 2 Page 1'),
(2, 4, 2, 'Lesson 2 Page 2', 'Lesson 2 Page 2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `userType` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `userType`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'leon', 'admin', 'leonxenarax@gmail.com', 'creator'),
(3, 'ruchern', 'admin', 'iruchern@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_lesson`
--

CREATE TABLE IF NOT EXISTS `user_lesson` (
  `userID` int(11) NOT NULL,
  `lessonID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
 ADD PRIMARY KEY (`lessonID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
 ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD KEY `slideID` (`slideID`), ADD KEY `lessonID` (`lessonID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userID`), ADD KEY `userID` (`userID`);

--
-- Indexes for table `user_lesson`
--
ALTER TABLE `user_lesson`
 ADD PRIMARY KEY (`userID`,`lessonID`), ADD KEY `lessonID` (`lessonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
MODIFY `lessonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
MODIFY `quizID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
ADD CONSTRAINT `user_lesson_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
ADD CONSTRAINT `user_lesson_ibfk_2` FOREIGN KEY (`lessonID`) REFERENCES `lessons` (`lessonID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
