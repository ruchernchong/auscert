-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2015 at 09:11 AM
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
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`courseID` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `creator` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `description` longtext,
  `last_edited` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `description`, `last_edited`) VALUES
(1, 'Phising Email', 'Online Safety', 'Tartiner Studios', 0, 'Introduciton to the phishing emails. What they are and what you can do to avoid being a victim', '8/03/2015'),
(2, 'Choosing A Safe Password', 'Account Security', 'Redones', 1, 'This course will guide you through how a password works as well as steps to take to ensure a strong and secure password', '19/7/2015'),
(3, 'Tartiner Studios Training', 'Introduction to the team', 'Tartiner Studios', 1, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '17/8/2015');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`questionID` int(11) NOT NULL,
  `quizID` int(11) NOT NULL,
  `questionText` text NOT NULL,
  `options` text NOT NULL,
  `answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
`quizID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
`slideID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slideID`, `courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\nterry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(2, 1, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(3, 2, 1, 'course 2 Page 1', 'Course 2 Page 1'),
(4, 2, 2, 'Course 2 Page 2', 'Course 2 Page 2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`userID` int(11) NOT NULL,
  `usergroupID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `userType` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `usergroupID`, `username`, `password`, `email`, `contact`, `userType`) VALUES
(1, 1, 'admin', 'admin', 'admin@gmail.com', '000', 'admin'),
(2, 1, 'leon', 'admin', 'leonxenarax@gmail.com', '000', 'creator'),
(3, 1, 'ruchern', 'admin', 'iruchern@gmail.com', '0451 519 513', 'admin'),
(4, 1, 'helen', 'admin', 'helen@gmail.com', '000', 'user'),
(5, 1, 'cameron', 'admin', 'cameron@gmail.com', '000', 'user'),
(6, 1, 'ravi', 'admin', 'ravi@gmail.com', '000', 'user'),
(7, 1, 'mal', 'admin', 'mal.joseland@live.com', '000', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `usergroups`
--

CREATE TABLE IF NOT EXISTS `usergroups` (
`usergroupID` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usergroups`
--

INSERT INTO `usergroups` (`usergroupID`, `organisation`) VALUES
(1, 'Tartiner Studios');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE IF NOT EXISTS `user_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text NOT NULL,
  `grading` varchar(255) NOT NULL,
  `mandatory` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`userID`, `courseID`, `completion`, `description`, `grading`, `mandatory`) VALUES
(2, 1, '20.00', '', '80', 1),
(2, 3, '100.00', '', '90', 0),
(3, 1, '100.00', 'Testing 1', '100', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`questionID`), ADD KEY `quizID` (`quizID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
 ADD PRIMARY KEY (`quizID`), ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
 ADD PRIMARY KEY (`slideID`), ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`userID`), ADD KEY `userGroupID` (`usergroupID`);

--
-- Indexes for table `usergroups`
--
ALTER TABLE `usergroups`
 ADD PRIMARY KEY (`usergroupID`), ADD KEY `usergroupID` (`usergroupID`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
 ADD PRIMARY KEY (`userID`,`courseID`), ADD KEY `courseID` (`courseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usergroups`
--
ALTER TABLE `usergroups`
MODIFY `usergroupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`quizID`) REFERENCES `quiz` (`quizID`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
ADD CONSTRAINT `slide_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`usergroupID`) REFERENCES `usergroups` (`usergroupID`);

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
