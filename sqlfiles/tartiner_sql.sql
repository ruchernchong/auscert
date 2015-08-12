-- Create a database called auscertdb
-- Create a super user called auscert.
-- Grant all privilages to auscert


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `lessons` (
  `lessonID` int NOT NULL AUTO_INCREMENT,
  `lessonName` varchar(100) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `creator` varchar(30) DEFAULT NULL,
  `material` text NOT NULL,
  `description` longtext,
  PRIMARY KEY (`lessonID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `lessons` (`lessonName`, `category`, `creator`, `material`, `description`) VALUES
('Phising Email', 'Online Safety', 'Tartiner Studios', 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven''t heard of them accusamus labore sustainable VHS.', NULL),
('Choosing Safe Password', 'Account Security', 'Redones', 'Testing Data', 'description Data'),
('Tartiner Studios Training', 'Introduction to the team', 'Tartiner Studios', 'Material goes here', 'description Data');



CREATE TABLE IF NOT EXISTS `quiz` (
  `quizID` int NOT NULL AUTO_INCREMENT,
  `lessonID` int(11) NOT NULL,
  `question` text NOT NULL,
  `option` text NOT NULL,
  `answer` int(11) NOT NULL,
  PRIMARY KEY (`quizID`),
  FOREIGN KEY (`lessonID`) REFERENCES lessons(`lessonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `slide` (
  `slideID` int(11) NOT NULL AUTO_INCREMENT,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL,
  `lessonID` int(11) NOT NULL,
  PRIMARY KEY (`slideID`),
  FOREIGN KEY (`lessonID`) REFERENCES lessons(`lessonID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


INSERT INTO `slide` (`slideOrder`, `slideContent`, `slideTitle`, `lessonID`) VALUES
(1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\n                  terry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email', 1),
(2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails', 1);



CREATE TABLE IF NOT EXISTS `user` (
  `userID` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `userType` varchar(24) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `user` (`userID`, `password`, `email`, `userType`) VALUES
('admin', 'admin', 'admin@gmail.com', 'admin'),
('Leon', 'admin', 'leonxenarax@gmail.com', 'creator'),
('ruchern', 'admin', 'rc@gmail.com', 'admin');



CREATE TABLE IF NOT EXISTS `user_lesson` (
  `userID` varchar(65) NOT NULL,
  `lessonID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text,
  PRIMARY KEY (`userID`, `lessonID`),
  FOREIGN KEY (`userID`) REFERENCES user(`userID`),
  FOREIGN KEY (`lessonID`) REFERENCES lessons(`lessonID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


