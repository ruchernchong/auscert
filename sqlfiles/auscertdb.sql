SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP DATABASE IF EXISTS `auscertdb`;
CREATE DATABASE IF NOT EXISTS `auscertdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auscertdb`;

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `answerOrder` int(11) NOT NULL,
  `answerText` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `courses`;
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

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `description`, `dateCreated`, `lastEdited`) VALUES
(1, 'Phising Emails', 'Safety', 'Tartiner Studios', 1, 'Introduciton to the phishing emails. What they are and what you can do to avoid being a victim', '2015-03-08 10:00:00', '2015-03-08 10:00:00'),
(2, 'Choosing A Safe Password', 'Security', 'Redones', 1, '<p>This course will guide you through how a password works as well as steps to take to ensure a strong and secure password</p>\r\n', '2015-07-15 10:00:00', '2015-09-02 22:00:18'),
(3, 'Tartiner Studios Training', 'Introductory', 'Tartiner Studios', 0, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '2015-08-12 10:00:00', '2015-08-17 10:00:00'),
(4, 'SQL Injection Attacks', 'Cyber Attacks', 'AusCert', 1, 'Introduction to what SQL Injection Attacks are and how to avoid them', '2015-06-19 10:00:00', '2015-08-25 10:00:00'),
(5, 'Data Encryption', 'Security', 'UQ ITEE', 1, 'Detailed course on the various methods of data encyyption', '2015-08-12 10:00:00', '2015-08-17 10:00:00'),
(6, 'UQ Staff Security Basics', 'Introductory', 'UQ BEL', 1, 'A compulsory online security course for uq staff', '2015-08-12 10:00:00', '2015-08-17 10:00:00'),
(7, 'Ru Chern Workshop', 'Introductory', 'ruchern', 0, 'Ez Workshop.', '2015-08-20 14:13:41', '2015-08-20 14:13:41'),
(9, 'Tartiner Studios UX Design', 'Design', 'ruchern', 0, 'Please submit your UX Video to blog by Tuesday.\r\n\r\n*This is a test post.', '2015-08-21 12:01:23', '2015-08-21 12:01:23'),
(10, 'Tartiner Week 6 2nd Sprint', 'Sprint Zero', 'RuChern', 0, '2nd Checkpoint', '2015-08-26 22:45:53', '2015-08-26 22:45:53'),
(11, 'Old School - AustLit', 'Introductory', 'RuChern', 0, '<p>Learn to use Children&#39;s Literature Digital Resource (CLDR).</p>\r\n', '2015-09-01 21:43:15', '2015-09-02 21:50:13');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`groupID`, `organisation`) VALUES
(0, 'Administrators'),
(1, 'Tartiner Studios'),
(2, 'AusCert'),
(3, 'UQ ITEE'),
(4, 'UQ BEL'),
(5, 'UQ EAIT'),
(6, 'UQ Staff'),
(7, 'UQ Union'),
(8, 'UQ Students'),
(9, 'UQ HABS'),
(10, 'UQ HASS'),
(11, 'UQ MBS'),
(12, 'UQ Science Faculty'),
(14, 'UQ ITS'),
(15, 'UQ MAME'),
(16, 'UQ AWMC'),
(17, 'Noblest Creative'),
(18, 'AUSTLit');

DROP TABLE IF EXISTS `group_courses`;
CREATE TABLE IF NOT EXISTS `group_courses` (
  `groupID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `group_courses` (`groupID`, `courseID`) VALUES
(5, 1),
(3, 2),
(1, 3),
(2, 3),
(5, 4),
(5, 5),
(1, 9),
(2, 9),
(1, 10),
(2, 10),
(18, 11);

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `passPercentage` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `questionText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`courseID`, `questionOrder`, `passPercentage`, `questionText`) VALUES
(2, 0, 50, '<p>Which of these is a safe password?</p>\r\n'),
(11, 0, 50, '<p>Who is the project manager for &quot;Old School&quot;</p>\r\n');

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `slideID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `slides` (`slideID`, `courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\nterry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(2, 1, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(3, 2, 1, '<p>So, how do you have a &ldquo;strong&rdquo; password that is easy to remember? While it may seem tough to do this, there are a few simple tips that can make it easy.Note: the examples below illustrate just the concepts being discussed. No single technique should be used on its own, but rather should be used with other techniques. The combination of several will produce a strong password.</p>\r\n', ' General Guidelines'),
(4, 2, 2, '<p>You want to choose something that is easy to remember with a minimum of 8 characters that uses as many of the techniques above as possible. One way to do this is to pick a phrase you will remember, pick all the first or last letters from each word and then substitute some letters with numbers and symbols. You can then apply capitals to some letters (perhaps the first and last, or second to last, etc.) You could also perhaps keep or add punctuation.</p>\r\n', 'Passwords to choose'),
(6, 11, 0, '<p>AustLit is a Lorem ipsum dolor si du met...</p>\r\n', 'Introduction to AustLit'),
(8, 2, 3, '<p>If you only use words from a dictionary or a purely numeric password, a hacker only has to try a limited list of possibilities. A hacking program can try the full set in under one minute. If you use the full set of characters and the techniques above, you force a hacker to continue trying every possible combination to find yours. If we assume that the password is 8 characters long, this table shows how many times a hacker may have to before guessing your password. Most password crackers have rules that can try millions of word variants per second, so the more algorithmically complex your password, the better.</p>\r\n', 'Passwords not to choose');

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `userType` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `contact`, `userType`) VALUES
(1, 'admin', 'admin', 'admin@tartiner.com', '', 'admin'),
(2, 'leon', 'admin', 'leonxenarax@gmail.com', '0423 302 776', 'admin'),
(3, 'ruchern', 'admin', 'ruchern.chong@uqconnect.edu.au', '0451 519 513', 'admin'),
(4, 'huigyeong', 'admin', 'hk2518@hotmail.com', '0424 169 232', 'admin'),
(5, 'cameron', 'admin', 'cameronpaulsen0@gmail.com', '0401 603 217', 'admin'),
(6, 'ravi', 'admin', 'ravi_khemlani@hotmail.com', '0452 525 020', 'admin'),
(7, 'mal', 'admin', 'mal.j@live.com', '0450 479 554', 'admin'),
(8, 'jimsteel', 'admin', 'j.steel@uq.edu.au', '(07) 3365 4917', 'user'),
(9, 'bolong', 'admin', 'b.zheng@uq.edu.au', '(07) 3365 2447', 'user'),
(10, 'christeakle', 'admin', 'c.teakle@its.uq.edu.au', '(07) 3365 7555', 'admin'),
(11, 's.cockcroft', 'admin', 'S.Cockcroft@business.uq.edu.au', '(07) 3346 8016', 'user'),
(12, 'bethanieong', 'admin', 'bethanie.ong.9@facebook.com', '', 'user'),
(13, 'joyceng', 'admin', '', '0452 571 787', 'user'),
(14, 'gavino', 'admin', '', '0412 816 417', 'user'),
(15, 'kuroneko', 'admin', '', '0451 932 133', 'user'),
(16, 'adityarahardi', 'admin', '', '0406 504 067', 'user'),
(17, 'j.hadwen', 'admin', 'j.hadwen@uq.edu.au', '(07) 3346 8265', 'user'),
(18, 'c.mills', 'admin', 'c.mills@uq.edu.au', '(07) 3346 8279', 'user'),
(19, 'm.farquhar', 'admin', 'm.farquhar@uq.edu.au', '(07) 3346 8265', 'user'),
(20, 'k.kilner', 'admin', 'k.kilner@uq.edu.au', '(07) 3365 3313', 'user');

DROP TABLE IF EXISTS `user_courses`;
CREATE TABLE IF NOT EXISTS `user_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text,
  `grading` varchar(255) DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_courses` (`userID`, `courseID`, `completion`, `description`, `grading`, `mandatory`) VALUES
(1, 2, '0.00', '', '', 0),
(2, 1, '20.00', '', '80', 1),
(2, 2, '0.00', '', '0', 1),
(2, 3, '100.00', '', '90', 0),
(3, 1, '65.00', '', '100', 1),
(3, 2, '10.00', '', '10', 1),
(3, 3, '100.00', '', '85', 0),
(3, 7, '101.00', '', '100', 0),
(3, 9, '100.00', '', '49', 0),
(3, 11, '0.00', NULL, NULL, NULL);

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_groups` (`userID`, `groupID`) VALUES
(1, 0),
(2, 0),
(3, 0),
(16, 0),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(10, 2),
(2, 3),
(3, 3),
(7, 3),
(8, 3),
(7, 4),
(11, 4),
(2, 5),
(3, 5),
(6, 5),
(8, 5),
(9, 5),
(2, 7),
(12, 7),
(6, 8),
(12, 9),
(18, 10),
(10, 14),
(2, 17),
(3, 17),
(13, 17),
(14, 17),
(15, 17),
(16, 17),
(17, 17),
(2, 18),
(3, 18),
(13, 18),
(14, 18),
(15, 18),
(16, 18),
(17, 18),
(19, 18),
(20, 18);

DROP TABLE IF EXISTS `user_results`;
CREATE TABLE IF NOT EXISTS `user_results` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `userAnswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_results` (`courseID`, `questionOrder`, `userID`, `attempt`, `userAnswer`) VALUES
(2, 0, 1, 0, 2),
(2, 0, 3, 0, 0),
(11, 0, 3, 0, 2);


ALTER TABLE `answers`
ADD PRIMARY KEY (`courseID`,`questionOrder`,`answerOrder`);

ALTER TABLE `courses`
ADD PRIMARY KEY (`courseID`);

ALTER TABLE `groups`
ADD PRIMARY KEY (`groupID`), ADD KEY `groupID` (`groupID`);

ALTER TABLE `group_courses`
ADD PRIMARY KEY (`groupID`,`courseID`), ADD KEY `group_courses_ibfk_2` (`courseID`);

ALTER TABLE `questions`
ADD PRIMARY KEY (`courseID`,`questionOrder`);

ALTER TABLE `slides`
ADD PRIMARY KEY (`slideID`), ADD KEY `courseID` (`courseID`);

ALTER TABLE `users`
ADD PRIMARY KEY (`userID`);

ALTER TABLE `user_courses`
ADD PRIMARY KEY (`userID`,`courseID`), ADD KEY `courseID` (`courseID`);

ALTER TABLE `user_groups`
ADD PRIMARY KEY (`userID`,`groupID`), ADD KEY `groupID` (`groupID`);

ALTER TABLE `user_results`
ADD PRIMARY KEY (`courseID`,`questionOrder`,`userID`,`attempt`) USING BTREE;


ALTER TABLE `courses`
MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
ALTER TABLE `groups`
MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
ALTER TABLE `slides`
MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
ALTER TABLE `users`
MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;

ALTER TABLE `answers`
ADD CONSTRAINT `DeleteOnOwnerDeletion` FOREIGN KEY (`courseID`, `questionOrder`) REFERENCES `questions` (`courseID`, `questionOrder`) ON DELETE CASCADE,
ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `group_courses`
ADD CONSTRAINT `group_courses_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`),
ADD CONSTRAINT `group_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE;

ALTER TABLE `slides`
ADD CONSTRAINT `slides_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `user_courses`
ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `user_groups`
ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
ADD CONSTRAINT `user_groups_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
