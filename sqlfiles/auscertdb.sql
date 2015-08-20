SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP DATABASE IF EXISTS `auscertdb`;
CREATE DATABASE IF NOT EXISTS `auscertdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auscertdb`;

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
	`courseID` int(11) NOT NULL,
	`courseName` varchar(255) NOT NULL,
	`category` varchar(255) DEFAULT NULL,
	`creator` varchar(255) DEFAULT NULL,
	`active` tinyint(1) NOT NULL,
	`description` longtext,
	`date_created` varchar(255) NOT NULL,
	`last_edited` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `description`, `date_created`, `last_edited`) VALUES
(1, 'Phising Emails', 'Online Safety', 'Tartiner Studios', 0, 'Introduciton to the phishing emails. What they are and what you can do to avoid being a victim', '8/3/2015', '8/3/2015'),
(2, 'Choosing A Safe Password', 'Account Security', 'Redones', 1, 'This course will guide you through how a password works as well as steps to take to ensure a strong and secure password', '15/7/2015', '19/7/2015'),
(3, 'Tartiner Studios Training', 'Introduction to the team', 'Tartiner Studios', 1, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '12/8/2015', '17/8/2015'),
(4, 'SQL Injection Attacks', 'Cyber Attacks', 'AusCert', 1, 'Introduction to what SQL Injection Attacks are and how to avoid them', '19/6/2015', '25/8/2015'),
(5, 'Data Encryption', 'Data Security', 'UQ ITEE', 1, 'Detailed course on the various methods of data encyyption', '12/8/2015', '17/8/2015'),
(6, 'UQ Staff Security Basics', 'Staff Introductory Courses', 'UQ BEL', 1, 'A compulsory online security course for uq staff', '12/8/2015', '17/8/2015');

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
	`questionID` int(11) NOT NULL,
	`courseID` int(11) NOT NULL,
	`questionText` text NOT NULL,
	`options` text NOT NULL,
	`answer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
	`slideID` int(11) NOT NULL,
	`courseID` int(11) NOT NULL,
	`slideOrder` int(3) NOT NULL,
	`slideContent` text,
	`slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `slides` (`slideID`, `courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\nterry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(2, 1, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(3, 2, 1, 'So, how do you have a “strong” password that is easy to remember? While it may seem tough to do this, there are a few simple tips that can make it easy.Note: the examples below illustrate just the concepts being discussed.  No single technique should be used on its own, but rather should be used with other techniques. The combination of several will produce a strong password.', 'General Guidelines'),
(4, 2, 2, 'You want to choose something that is easy to remember with a minimum of 8 characters that uses as many of the techniques above as possible. One way to do this is to pick a phrase you will remember, pick all the first or last letters from each word and then substitute some letters with numbers and symbols. You can then apply capitals to some letters (perhaps the first and last, or second to last, etc.) You could also perhaps keep or add punctuation.', 'Choose'),
(5, 2, 3, 'If you only use words from a dictionary or a purely numeric password, a hacker only has to try a limited list of possibilities. A hacking program can try the full set in under one minute. If you use the full set of characters and the techniques above, you force a hacker to continue trying every possible combination to find yours. If we assume that the password is 8 characters long, this table shows how many times a hacker may have to before guessing your password. Most password crackers have rules that can try millions of word variants per second, so the more algorithmically complex your password, the better.', 'Do not Choose');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
	`userID` int(11) NOT NULL,
	`groupID` int(11) NOT NULL,
	`username` varchar(65) NOT NULL,
	`password` varchar(65) NOT NULL,
	`email` varchar(65) NOT NULL,
	`contact` varchar(255) NOT NULL,
	`userType` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`userID`, `groupID`, `username`, `password`, `email`, `contact`, `userType`) VALUES
(1, 1, 'admin', 'admin', 'admin@gmail.com', '000', 'admin'),
(2, 1, 'leon', 'admin', 'leonxenarax@gmail.com', '000', 'creator'),
(3, 1, 'ruchern', 'admin', 'iruchern@gmail.com', '+61 451 519 513', 'admin'),
(4, 1, 'helen', 'admin', 'helen@gmail.com', '000', 'user'),
(5, 1, 'cameron', 'admin', 'cameron@gmail.com', '000', 'user'),
(6, 1, 'ravi', 'admin', 'ravi@gmail.com', '+61 452 525 020', 'user'),
(7, 1, 'mal', 'admin', 'mal.joseland@live.com', '000', 'user');

DROP TABLE IF EXISTS `user_courses`;
CREATE TABLE IF NOT EXISTS `user_courses` (
	`userID` int(11) NOT NULL,
	`courseID` int(11) NOT NULL,
	`completion` decimal(5,2) NOT NULL,
	`description` text NOT NULL,
	`grading` varchar(255) NOT NULL,
	`mandatory` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_courses` (`userID`, `courseID`, `completion`, `description`, `grading`, `mandatory`) VALUES
(2, 1, '20.00', '', '80', 1),
(2, 2, '0.00', 'Not started.', '0', 1),
(2, 3, '100.00', '', '90', 0),
(3, 1, '65.00', 'Testing 1', '100', 1),
(3, 2, '10.00', 'Does nothing', '10', 1);

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
	`groupID` int(11) NOT NULL,
	`organisation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`groupID`, `organisation`) VALUES
(1, 'Tartiner Studios'),
(2, 'AusCert'),
(3, 'UQ ITEE'),
(4, 'BEL Faculty'),
(5, 'UQ Engineering'),
(6, 'UQ Staff'),
(7, 'UQ Union');


ALTER TABLE `courses`
ADD PRIMARY KEY (`courseID`);

ALTER TABLE `questions`
ADD PRIMARY KEY (`questionID`), ADD KEY `courseID` (`courseID`);

ALTER TABLE `slides`
ADD PRIMARY KEY (`slideID`), ADD KEY `courseID` (`courseID`);

ALTER TABLE `users`
ADD PRIMARY KEY (`userID`), ADD KEY `groupID` (`groupID`);

ALTER TABLE `user_courses`
ADD PRIMARY KEY (`userID`,`courseID`), ADD KEY `courseID` (`courseID`);

ALTER TABLE `groups`
ADD PRIMARY KEY (`groupID`), ADD KEY `groupID` (`groupID`);


ALTER TABLE `courses`
MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE `questions`
MODIFY `questionID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `slides`
MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
ALTER TABLE `groups`
MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;

ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `slides`
ADD CONSTRAINT `slides_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `users`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

ALTER TABLE `user_courses`
ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
