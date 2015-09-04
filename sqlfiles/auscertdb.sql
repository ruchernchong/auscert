-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2015 at 02:46 AM
-- Server version: 5.6.25
-- PHP Version: 5.5.27




DROP DATABASE IF EXISTS `auscertdb`;
CREATE DATABASE IF NOT EXISTS `auscertdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auscertdb`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auscertdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `answerOrder` int(11) NOT NULL,
  `answerText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`courseID`, `questionOrder`, `answerOrder`, `answerText`) VALUES
(2, 0, 0, 'Tl|_|,BwwB2R'),
(2, 0, 1, 'password'),
(2, 0, 2, 'admin'),
(2, 0, 3, '09Oct1992'),
(2, 0, 4, 'Tl|_|,BwwB2R'),
(11, 0, 0, 'Jonathan'),
(11, 0, 1, 'Mael'),
(11, 0, 2, 'Jonathan'),
(11, 0, 3, 'Kerry'),
(11, 0, 4, 'Catriona');

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
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastEdited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `description`, `dateCreated`, `lastEdited`) VALUES
(1, 'Phising Emails', 'Safety', 'Tartiner Studios', 0, 'Introduciton to the phishing emails. What they are and what you can do to avoid being a victim', '2015-03-08 00:00:00', '2015-03-08 00:00:00'),
(2, 'Choosing A Safe Password', 'Security', 'Redones', 1, '<p>This course will guide you through how a password works as well as steps to take to ensure a strong and secure password</p>\r\n', '2015-07-15 00:00:00', '2015-09-02 12:00:18'),
(3, 'Tartiner Studios Training', 'Introductory', 'Tartiner Studios', 0, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(4, 'SQL Injection Attacks', 'Cyber Attacks', 'AusCert', 1, 'Introduction to what SQL Injection Attacks are and how to avoid them', '2015-06-19 00:00:00', '2015-08-25 00:00:00'),
(5, 'Data Encryption', 'Security', 'UQ ITEE', 1, 'Detailed course on the various methods of data encyyption', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(6, 'UQ Staff Security Basics', 'Introductory', 'UQ BEL', 1, 'A compulsory online security course for uq staff', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(7, 'Ru Chern Workshop', 'Introductory', 'ruchern', 0, 'Ez Workshop.', '2015-08-20 04:13:41', '2015-08-20 04:13:41'),
(9, 'Tartiner Studios UX Design', 'Design', 'ruchern', 0, 'Please submit your UX Video to blog by Tuesday.\r\n\r\n*This is a test post.', '2015-08-21 02:01:23', '2015-08-21 02:01:23'),
(10, 'Tartiner Week 6 2nd Sprint', 'Sprint Zero', 'RuChern', 0, '2nd Checkpoint', '2015-08-26 12:45:53', '2015-08-26 12:45:53'),
(11, 'Old School - AustLit', 'Introductory', 'RuChern', 1, '<p>Learn to use Children&#39;s Literature Digital Resource (CLDR).</p>\r\n', '2015-09-01 11:43:15', '2015-09-02 11:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`groupID`, `organisation`) VALUES
(1, 'Tartiner Studios'),
(2, 'AusCert'),
(3, 'UQ ITEE'),
(4, 'BEL Faculty'),
(5, 'UQ Engineering'),
(6, 'UQ Staff'),
(7, 'UQ Union'),
(8, 'UQ Student');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `passPercentage` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `questionText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`courseID`, `questionOrder`, `passPercentage`, `questionText`) VALUES
(2, 0, 50, '<p>Which of these is a safe password?</p>\r\n'),
(11, 0, 50, '<p>Who is the project manager for &quot;Old School&quot;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\nterry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(1, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(2, 1, '<p>So, how do you have a &ldquo;strong&rdquo; password that is easy to remember? While it may seem tough to do this, there are a few simple tips that can make it easy.Note: the examples below illustrate just the concepts being discussed. No single technique should be used on its own, but rather should be used with other techniques. The combination of several will produce a strong password.</p>\r\n', ' General Guidelines'),
(2, 2, '<p>You want to choose something that is easy to remember with a minimum of 8 characters that uses as many of the techniques above as possible. One way to do this is to pick a phrase you will remember, pick all the first or last letters from each word and then substitute some letters with numbers and symbols. You can then apply capitals to some letters (perhaps the first and last, or second to last, etc.) You could also perhaps keep or add punctuation.</p>\r\n', 'Passwords to choose'),
(2, 3, '<p>So, how do you have a &ldquo;strong&rdquo; password that is easy to remember? While it may seem tough to do this, there are a few simple tips that can make it easy.Note: the examples below illustrate just the concepts being discussed. No single technique should be used on its own, but rather should be used with other techniques. The combination of several will produce a strong password.</p>\r\n', 'General Guidelines'),
(11, 1, '<p>AustLit is a Lorem ipsum dolor si du met...</p>\r\n', 'Introduction to AustLit'),
(2, 4, '<p>So, how do you have a &ldquo;strong&rdquo; password that is easy to remember? While it may seem tough to do this, there are a few simple tips that can make it easy.Note: the examples below illustrate just the concepts being discussed. No single technique should be used on its own, but rather should be used with other techniques. The combination of several will produce a strong password.</p>\r\n', 'General Guidelines'),
(2, 5, '<p>If you only use words from a dictionary or a purely numeric password, a hacker only has to try a limited list of possibilities. A hacking program can try the full set in under one minute. If you use the full set of characters and the techniques above, you force a hacker to continue trying every possible combination to find yours. If we assume that the password is 8 characters long, this table shows how many times a hacker may have to before guessing your password. Most password crackers have rules that can try millions of word variants per second, so the more algorithmically complex your password, the better.</p>\r\n', 'Passwords not to choose');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `userType` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `groupID`, `username`, `password`, `email`, `contact`, `userType`) VALUES
(1, 1, 'admin', 'admin', 'admin@gmail.com', '000', 'admin'),
(2, 1, 'leon', 'admin', 'leonxenarax@gmail.com', '000', 'creator'),
(3, 1, 'RuChern', 'admin', 'iruchern@gmail.com', '+61 451 519 513', 'admin'),
(4, 1, 'helen', 'admin', 'helen@gmail.com', '000', 'admin'),
(5, 1, 'cameron', 'admin', 'cameron@gmail.com', '000', 'admin'),
(6, 1, 'ravi', 'admin', 'ravi@gmail.com', '+61 452 525 020', 'admin'),
(7, 1, 'mal', 'admin', 'mal.joseland@live.com', '000', 'admin'),
(8, 8, 'StudentTest', 'test', 'studenttest@uq.edu.au', '+61  1234 5678', 'student'),
(9, 6, 'StaffTest', 'test', 'StaffTest@uq.edu.au', '+61 1234 5678', 'staff');

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
(1, 2, '0.00', '', '', 0),
(2, 1, '20.00', '', '80', 1),
(2, 2, '0.00', '', '0', 1),
(2, 3, '100.00', '', '90', 0),
(3, 1, '65.00', '', '100', 1),
(3, 2, '10.00', '', '10', 1),
(3, 3, '100.00', '', '85', 0),
(3, 7, '100.00', '', '100', 0),
(3, 9, '0.00', '', '', 0),
(3, 11, '0.00', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`courseID`,`questionOrder`,`answerOrder`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`courseID`,`questionOrder`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slideOrder`, `courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`userID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `DeleteOnOwnerDeletion` FOREIGN KEY (`courseID`, `questionOrder`) REFERENCES `questions` (`courseID`, `questionOrder`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

--
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
