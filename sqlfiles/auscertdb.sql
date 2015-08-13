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

CREATE TABLE IF NOT EXISTS `lessons` (
  `lessonID` int(11) NOT NULL AUTO_INCREMENT,
  `lessonName` varchar(100) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `creator` varchar(30) DEFAULT NULL,
  `material` text NOT NULL,
  `description` longtext,
  PRIMARY KEY (`lessonID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;


INSERT INTO `lessons` (`lessonID`, `lessonName`, `category`, `creator`, `material`, `description`) VALUES
(1, 'Phising Email', 'Online Safety', 'Tartiner Studios', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', NULL),
(2, 'Choosing Safe Password', 'Account Security', 'Redones', 'Testing Data', 'description Data'),
(3, 'Tartiner Studios Training', 'Introduction to the team', 'Tartiner Studios', 'Material goes here', 'description Data');


CREATE TABLE IF NOT EXISTS `quiz` (
  `quizID` int(11) NOT NULL AUTO_INCREMENT,
  `lessonID` int(11) NOT NULL,
  `question` text NOT NULL,
  `option` text NOT NULL,
  `answer` int(11) NOT NULL,
  PRIMARY KEY (`quizID`),
  FOREIGN KEY (`lessonID`) REFERENCES lessons(`lessonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `slide` (
  `slideID` int(11) NOT NULL AUTO_INCREMENT,
  `lessonID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL,
  PRIMARY KEY (`slideID`),
  FOREIGN KEY (`lessonID`) REFERENCES lessons(`lessonID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


INSERT INTO `slide` (`lessonID`, `slideID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\n                  terry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(1, 2, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(2, 3, 1, 'Lesson 2 Page 1', 'Lesson 2 Page 1'),
(2, 4, 2, 'Lesson 2 Page 2', 'Lesson 2 Page 2');


CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `userType` varchar(24) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `user` (`userID`, `username`, `password`, `email`, `userType`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'leon', 'admin', 'leonxenarax@gmail.com', 'creator'),
(3, 'ruchern', 'admin', 'iruchern@gmail.com', 'admin');


CREATE TABLE IF NOT EXISTS `user_lesson` (
  `userID` int(11) NOT NULL,
  `lessonID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`userID`, `lessonID`),
  FOREIGN KEY (`userID`) REFERENCES user(`userID`),
  FOREIGN KEY (`lessonID`) REFERENCES lessons(`lessonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
