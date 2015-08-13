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

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `userType` varchar(24) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `user` (`userID`, `username`, `password`, `email`, `userType`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'leon', 'admin', 'leonxenarax@gmail.com', 'creator'),
(3, 'mal', 'admin', 'iruchern@gmail.com', 'user'),
(4, 'helen', 'admin', 'helen@gmail.com', 'user'),
(5, 'cameron', 'admin', 'cameron@gmail.com', 'user'),
(6, 'ravi', 'admin', 'ravi@gmail.com', 'user');



CREATE TABLE IF NOT EXISTS `courses` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `creator` varchar(255) DEFAULT NULL,
  `active` boolean NOT NULL,
  `description` longtext,
  PRIMARY KEY (`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `description`) VALUES
(1, 'Phising Email', 'Online Safety', 'Tartiner Studios', 0, 'Introduciton to the phishing emails. What they are and what you can do to avoid being a victim'),
(2, 'Choosing A Safe Password', 'Account Security', 'Redones', 1, 'This course will guide you through how a password works as well as steps to take to ensure a strong and secure password'),
(3, 'Tartiner Studios Training', 'Introduction to the team', 'Tartiner Studios', 1, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread');



CREATE TABLE IF NOT EXISTS `user_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text NOT NULL,
  `grading` varchar(255) NOT NULL,
  `mandatory` boolean NOT NULL,
  PRIMARY KEY (`userID`, `courseID`),
  FOREIGN KEY (`userID`) REFERENCES user(`userID`),
  FOREIGN KEY (`courseID`) REFERENCES courses(`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `usergroups` (
`usergroupID` int(11) NOT NULL AUTO_INCREMENT,
`organisation` varchar(255) NOT NULL,
`members` varchar(255),
PRIMARY KEY (`usergroupID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `quiz` (
  `quizID` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL,
  PRIMARY KEY (`quizID`),
  FOREIGN KEY (`courseID`) REFERENCES courses(`courseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `questions` (
  `questionID` int(11) NOT NULL AUTO_INCREMENT,
  `quizID` int(11) NOT NULL,
  `questionText` text NOT NULL,
  `options` text NOT NULL,
  `answer` int(11) NOT NULL,
  PRIMARY KEY (`questionID`),
  FOREIGN KEY (`quizID`) REFERENCES quiz(`quizID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `slide` (
  `slideID` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL,
  PRIMARY KEY (`slideID`),
  FOREIGN KEY (`courseID`) REFERENCES courses(`courseID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `slide` (`courseID`, `slideID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\n                  terry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(1, 2, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(2, 3, 1, 'course 2 Page 1', 'Course 2 Page 1'),
(2, 4, 2, 'Course 2 Page 2', 'Course 2 Page 2');

