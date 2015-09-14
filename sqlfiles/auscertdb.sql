-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2015 at 12:23 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auscertdb`
--
CREATE DATABASE IF NOT EXISTS `auscertdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `auscertdb`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `answerOrder` int(11) NOT NULL,
  `answerText` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `answers`:
--   `courseID`
--       `questions` -> `courseID`
--   `questionOrder`
--       `questions` -> `questionOrder`
--   `courseID`
--       `courses` -> `courseID`
--

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

--
-- RELATIONS FOR TABLE `courses`:
--

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `description`, `dateCreated`, `lastEdited`) VALUES
(1, 'Phising Emails', 'Safety', 'Tartiner Studios', 1, 'Introduciton to the phishing emails. What they are and what you can do to avoid being a victim', '2015-03-08 00:00:00', '2015-03-08 00:00:00'),
(2, 'Choosing A Safe Password', 'Security', 'Redones', 1, '<p>This course will guide you through how a password works as well as steps to take to ensure a strong and secure password</p>\r\n', '2015-07-15 00:00:00', '2015-09-02 12:00:18'),
(3, 'Tartiner Studios Training', 'Introductory', 'Tartiner Studios', 1, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(4, 'SQL Injection Attacks', 'Cyber Attacks', 'AusCert', 1, 'Introduction to what SQL Injection Attacks are and how to avoid them', '2015-06-19 00:00:00', '2015-08-25 00:00:00'),
(5, 'Data Encryption', 'Security', 'UQ ITEE', 1, '<p>Detailed course on the various methods of data encyyption</p>\n', '2015-08-12 00:00:00', '2015-09-13 23:39:19'),
(6, 'UQ Staff Security Basics', 'Introductory', 'UQ BEL', 1, 'A compulsory online security course for uq staff', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(7, 'Introduction to Online Security', 'Introductory', 'ruchern', 1, 'Ez Workshop.', '2015-08-20 04:13:41', '2015-08-20 04:13:41'),
(9, 'Tartiner Studios UX Design', 'Design', 'ruchern', 1, 'Please submit your UX Video to blog by Tuesday.\r\n\r\n*This is a test post.', '2015-08-21 02:01:23', '2015-08-21 02:01:23'),
(10, 'UQ Privacy and Online Security', 'Sprint Zero', 'RuChern', 1, '2nd Checkpoint', '2015-08-26 12:45:53', '2015-08-26 12:45:53'),
(11, 'Antiviruses - Selection and Usage', 'Introductory', 'RuChern', 1, '<p>Learn to use Children&#39;s Literature Digital Resource (CLDR).</p>\r\n', '2015-09-01 11:43:15', '2015-09-02 11:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `groups`:
--

--
-- Dumping data for table `groups`
--

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

-- --------------------------------------------------------

--
-- Table structure for table `group_courses`
--

DROP TABLE IF EXISTS `group_courses`;
CREATE TABLE IF NOT EXISTS `group_courses` (
  `groupID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `group_courses`:
--   `groupID`
--       `groups` -> `groupID`
--   `courseID`
--       `courses` -> `courseID`
--

--
-- Dumping data for table `group_courses`
--

INSERT INTO `group_courses` (`groupID`, `courseID`) VALUES
(0, 1),
(5, 1),
(9, 1),
(0, 2),
(1, 2),
(3, 2),
(1, 3),
(2, 3),
(0, 4),
(5, 4),
(0, 5),
(1, 5),
(5, 5),
(0, 7),
(3, 7),
(1, 9),
(2, 9),
(2, 10),
(0, 11),
(3, 11),
(9, 11),
(18, 11);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `passPercentage` tinyint(3) unsigned NOT NULL DEFAULT '50',
  `questionText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `questions`:
--   `courseID`
--       `courses` -> `courseID`
--

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

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `slideID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `slides`:
--   `courseID`
--       `courses` -> `courseID`
--

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slideID`, `courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(1, 1, 1, 'Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus\r\nterry richardson ad squid. 3 wolf moon officia aute, non cupidatat\r\n                  skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.\r\n                  Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid\r\n                  single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh\r\n                  helvetica, craft beer labore wes anderson cred nesciunt sapiente ea\r\n                  proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft\r\n                  beer farm-to-table, raw denim aesthetic synth nesciunt you probably\r\n                  haven''t heard of them accusamus labore sustainable VHS.', 'Introduction to Phishing Email'),
(2, 1, 2, 'Team Tartiner Testing Content of Further Study', 'Special Phishing Emails'),
(3, 2, 1, '<p>So, how do you have a &ldquo;strong&rdquo; password that is easy to remember? While it may seem tough to do this, there are a few simple tips that can make it easy.Note: the examples below illustrate just the concepts being discussed. No single technique should be used on its own, but rather should be used with other techniques. The combination of several will produce a strong password.</p>\r\n', ' General Guidelines'),
(4, 2, 2, '<p>You want to choose something that is easy to remember with a minimum of 8 characters that uses as many of the techniques above as possible. One way to do this is to pick a phrase you will remember, pick all the first or last letters from each word and then substitute some letters with numbers and symbols. You can then apply capitals to some letters (perhaps the first and last, or second to last, etc.) You could also perhaps keep or add punctuation.</p>\r\n', 'Passwords to choose'),
(6, 11, 0, '<p>AustLit is a Lorem ipsum dolor si du met...</p>\r\n', 'Introduction to AustLit'),
(8, 2, 3, '<p>If you only use words from a dictionary or a purely numeric password, a hacker only has to try a limited list of possibilities. A hacking program can try the full set in under one minute. If you use the full set of characters and the techniques above, you force a hacker to continue trying every possible combination to find yours. If we assume that the password is 8 characters long, this table shows how many times a hacker may have to before guessing your password. Most password crackers have rules that can try millions of word variants per second, so the more algorithmically complex your password, the better.</p>\r\n', 'Passwords not to choose'),
(10, 5, 0, '<p>The&nbsp;<strong>Data Encryption Standard</strong>&nbsp;(<strong>DES</strong>,&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/ˌdiːˌiːˈɛs/</a>&nbsp;or&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/ˈdɛz/</a>) was once a predominant&nbsp;<a href="https://en.wikipedia.org/wiki/Symmetric-key_algorithm">symmetric-key algorithm</a>&nbsp;for the<a href="https://en.wikipedia.org/wiki/Encryption">encryption</a>&nbsp;of electronic data. It was highly influential in the advancement of modern&nbsp;<a href="https://en.wikipedia.org/wiki/Cryptography">cryptography</a>&nbsp;in the academic world. Developed in the early 1970s at&nbsp;<a href="https://en.wikipedia.org/wiki/IBM">IBM</a>&nbsp;and based on an earlier design by&nbsp;<a href="https://en.wikipedia.org/wiki/Horst_Feistel">Horst Feistel</a>, the algorithm was submitted to the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Bureau_of_Standards">National Bureau of Standards</a>&nbsp;(NBS) following the agency&#39;s invitation to propose a candidate for the protection of sensitive, unclassified electronic government data. In 1976, after consultation with the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Security_Agency">National Security Agency</a>&nbsp;(NSA), the NBS eventually selected a slightly modified version (strengthened against&nbsp;<a href="https://en.wikipedia.org/wiki/Differential_cryptanalysis">differential cryptanalysis</a>, but weakened against&nbsp;<a href="https://en.wikipedia.org/wiki/Brute_force_attack">brute force attacks</a>), which was published as an official&nbsp;<a href="https://en.wikipedia.org/wiki/Federal_Information_Processing_Standard">Federal Information Processing Standard</a>&nbsp;(FIPS) for the&nbsp;<a href="https://en.wikipedia.org/wiki/United_States">United States</a>&nbsp;in 1977. The publication of an NSA-approved encryption standard simultaneously resulted in its quick international adoption and widespread academic scrutiny. Controversies arose out of&nbsp;<a href="https://en.wikipedia.org/wiki/Classified_information">classified</a>&nbsp;design elements, a relatively short&nbsp;<a href="https://en.wikipedia.org/wiki/Key_length">key length</a>&nbsp;of the&nbsp;<a href="https://en.wikipedia.org/wiki/Symmetric-key_algorithm">symmetric-key</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Block_cipher">block cipher</a>&nbsp;design, and the involvement of the NSA, nourishing suspicions about a&nbsp;<a href="https://en.wikipedia.org/wiki/Backdoor_(computing)">backdoor</a>. The intense academic scrutiny the algorithm received over time led to the modern understanding of block ciphers and their&nbsp;<a href="https://en.wikipedia.org/wiki/Cryptanalysis">cryptanalysis</a>.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt="" src="https://i-msdn.sec.s-msft.com/dynimg/IC155063.gif" style="height:233px; width:350px" /><img alt="" src="https://www.simple-talk.com/iwritefor/articlefiles/948-TDE_1.JPG" style="height:139px; width:350px" /></p>\n\n<p>DES is now considered to be insecure for many applications. This is mainly due to the 56-bit key size being too small; in January 1999,&nbsp;<a href="https://en.wikipedia.org/wiki/Distributed.net">distributed.net</a>&nbsp;and the&nbsp;<a href="https://en.wikipedia.org/wiki/Electronic_Frontier_Foundation">Electronic Frontier Foundation</a>&nbsp;collaborated to publicly break a DES key in 22 hours and 15 minutes (see&nbsp;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#Chronology">chronology</a>). There are also some analytical results which demonstrate theoretical weaknesses in the cipher, although they are infeasible to mount in practice. The algorithm is believed to be practically secure in the form of&nbsp;<a href="https://en.wikipedia.org/wiki/Triple_DES">Triple DES</a>, although there are theoretical attacks. In recent years, the cipher has been superseded by the&nbsp;<a href="https://en.wikipedia.org/wiki/Advanced_Encryption_Standard">Advanced Encryption Standard</a>&nbsp;(AES). Furthermore, DES has been withdrawn as a standard by the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology">National Institute of Standards and Technology</a>&nbsp;(formerly the National Bureau of Standards).</p>\n\n<p>Some documentation makes a distinction between DES as a standard and DES as an algorithm, referring to the algorithm as the&nbsp;<strong>DEA</strong>&nbsp;(<strong>Data Encryption Algorithm</strong>).</p>\n', 'Data Encryption Standard'),
(11, 5, 1, '<h2>The origins of DES go back to the early 1970s. In 1972, after concluding a study on the US government&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Computer_security">computer security</a>&nbsp;needs, the US standards body NBS (National Bureau of Standards)&mdash;now named&nbsp;<a href="https://en.wikipedia.org/wiki/NIST">NIST</a>&nbsp;(National Institute of Standards and Technology)&mdash;identified a need for a government-wide standard for encrypting unclassified, sensitive information.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-1">[1]</a>&nbsp;Accordingly, on 15 May 1973, after consulting with the NSA, NBS solicited proposals for a cipher that would meet rigorous design criteria. None of the submissions, however, turned out to be suitable. A second request was issued on 27 August 1974. This time,&nbsp;<a href="https://en.wikipedia.org/wiki/International_Business_Machines">IBM</a>&nbsp;submitted a candidate which was deemed acceptable&mdash;a cipher developed during the period 1973&ndash;1974 based on an earlier algorithm,&nbsp;<a href="https://en.wikipedia.org/wiki/Horst_Feistel">Horst Feistel</a>&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Lucifer_(cipher)">Lucifer</a>&nbsp;cipher. The team at IBM involved in cipher design and analysis included Feistel,&nbsp;<a href="https://en.wikipedia.org/wiki/Walter_Tuchman">Walter Tuchman</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Don_Coppersmith">Don Coppersmith</a>, Alan Konheim, Carl Meyer, Mike Matyas,&nbsp;<a href="https://en.wikipedia.org/wiki/Roy_Adler">Roy Adler</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Edna_Grossman">Edna Grossman</a>, Bill Notz, Lynn Smith, and&nbsp;<a href="https://en.wikipedia.org/wiki/Bryant_Tuckerman">Bryant Tuckerman</a>.</h2>\n\n<p><img alt="" src="http://icomputerdenver.com/wp-content/uploads/2013/10/Data-Protection.jpg" style="height:208px; width:350px" /></p>\n\n<h3>NSA&#39;s involvement in the design[<a href="https://en.wikipedia.org/w/index.php?title=Data_Encryption_Standard&amp;action=edit&amp;section=2">edit</a>]</h3>\n\n<p>On 17 March 1975, the proposed DES was published in the&nbsp;<em><a href="https://en.wikipedia.org/wiki/Federal_Register">Federal Register</a></em>. Public comments were requested, and in the following year two open workshops were held to discuss the proposed standard. There was some criticism from various parties, including from&nbsp;<a href="https://en.wikipedia.org/wiki/Public-key_cryptography">public-key cryptography</a>&nbsp;pioneers&nbsp;<a href="https://en.wikipedia.org/wiki/Martin_Hellman">Martin Hellman</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Whitfield_Diffie">Whitfield Diffie</a>,<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-2">[2]</a>&nbsp;citing a shortened&nbsp;<a href="https://en.wikipedia.org/wiki/Key_length">key length</a>&nbsp;and the mysterious &quot;<a href="https://en.wikipedia.org/wiki/Substitution_box">S-boxes</a>&quot; as evidence of improper interference from the NSA. The suspicion was that the algorithm had been covertly weakened by the intelligence agency so that they&mdash;but no-one else&mdash;could easily read encrypted messages.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-3">[3]</a>&nbsp;Alan Konheim (one of the designers of DES) commented, &quot;We sent the S-boxes off to Washington. They came back and were all different.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-4">[4]</a>&nbsp;The&nbsp;<a href="https://en.wikipedia.org/wiki/United_States_Senate_Select_Committee_on_Intelligence">United States Senate Select Committee on Intelligence</a>&nbsp;reviewed the NSA&#39;s actions to determine whether there had been any improper involvement. In the unclassified summary of their findings, published in 1978, the Committee wrote:</p>\n\n<blockquote>\n<p>In the development of DES, NSA convinced&nbsp;<a href="https://en.wikipedia.org/wiki/IBM">IBM</a>&nbsp;that a reduced key size was sufficient; indirectly assisted in the development of the S-box structures; and certified that the final DES algorithm was, to the best of their knowledge, free from any statistical or mathematical weakness.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-5">[5]</a></p>\n</blockquote>\n\n<p>However, it also found that</p>\n\n<blockquote>\n<p>NSA did not tamper with the design of the algorithm in any way. IBM invented and designed the algorithm, made all pertinent decisions regarding it, and concurred that the agreed upon key size was more than adequate for all commercial applications for which the DES was intended.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-6">[6]</a></p>\n</blockquote>\n\n<p>Another member of the DES team, Walter Tuchman, stated &quot;We developed the DES algorithm entirely within IBM using IBMers. The NSA did not dictate a single wire!&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-7">[7]</a>&nbsp;In contrast, a declassified NSA book on cryptologic history states:</p>\n\n<blockquote>\n<p>In 1973 NBS solicited private industry for a data encryption standard (DES). The first offerings were disappointing, so NSA began working on its own algorithm. Then Howard Rosenblum, deputy director for research and engineering, discovered that Walter Tuchman of IBM was working on a modification to Lucifer for general use. NSA gave Tuchman a clearance and brought him in to work jointly with the Agency on his Lucifer modification.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-johnson3-8">[8]</a></p>\n</blockquote>\n\n<p>and</p>\n\n<blockquote>\n<p>NSA worked closely with IBM to strengthen the algorithm against all except brute force attacks and to strengthen substitution tables, called S-boxes. Conversely, NSA tried to convince IBM to reduce the length of the key from 64 to 48 bits. Ultimately they compromised on a 56-bit key.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-9">[9]</a></p>\n</blockquote>\n\n<p>Some of the suspicions about hidden weaknesses in the S-boxes were allayed in 1990, with the independent discovery and open publication by&nbsp;<a href="https://en.wikipedia.org/wiki/Eli_Biham">Eli Biham</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Adi_Shamir">Adi Shamir</a>&nbsp;of&nbsp;<a href="https://en.wikipedia.org/wiki/Differential_cryptanalysis">differential cryptanalysis</a>, a general method for breaking block ciphers. The S-boxes of DES were much more resistant to the attack than if they had been chosen at random, strongly suggesting that IBM knew about the technique in the 1970s. This was indeed the case; in 1994, Don Coppersmith published some of the original design criteria for the S-boxes.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-10">[10]</a>&nbsp;According to&nbsp;<a href="https://en.wikipedia.org/wiki/Steven_Levy">Steven Levy</a>, IBM Watson researchers discovered differential cryptanalytic attacks in 1974 and were asked by the NSA to keep the technique secret.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-Levy-11">[11]</a>&nbsp;Coppersmith explains IBM&#39;s secrecy decision by saying, &quot;that was because [differential cryptanalysis] can be a very powerful tool, used against many schemes, and there was concern that such information in the public domain could adversely affect national security.&quot; Levy quotes Walter Tuchman: &quot;[t]hey asked us to stamp all our documents confidential... We actually put a number on each one and locked them up in safes, because they were considered U.S. government classified. They said do it. So I did it&quot;.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-Levy-11">[11]</a>&nbsp;Bruce Schneier observed that &quot;It took the academic community two decades to figure out that the NSA &#39;tweaks&#39; actually improved the security of DES.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-schneier20040927-12">[12]</a></p>\n', 'History of DES');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `userType` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`, `email`, `contact`, `userType`) VALUES
(1, 'admin', 'admin', 'admin@tartiner.com', '04 1010 1010', 'admin'),
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
(12, 'bethanieong', 'admin', 'bethanie.ong.9@facebook.com', '01 6475 1111', 'user'),
(13, 'joyceng', 'admin', 'joyceeng@uq.edu.au', '0452 571 787', 'user'),
(14, 'gavino', 'admin', 'gavino@uq.edu.au', '0412 816 417', 'user'),
(15, 'kuroneko', 'admin', 'kuroneko@uq.edu.au', '0451 932 133', 'user'),
(16, 'adityarahardi', 'admin', 'aditya@uq.edu.au', '0406 504 067', 'user'),
(17, 'j.hadwen', 'admin', 'j.hadwen@uq.edu.au', '(07) 3346 8265', 'user'),
(18, 'c.mills', 'admin', 'c.mills@uq.edu.au', '(07) 3346 8279', 'user'),
(19, 'm.farquhar', 'admin', 'm.farquhar@uq.edu.au', '(07) 3346 8265', 'user'),
(20, 'k.kilner', 'admin', 'k.kilner@uq.edu.au', '(07) 3365 3313', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

DROP TABLE IF EXISTS `user_courses`;
CREATE TABLE IF NOT EXISTS `user_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text,
  `grading` varchar(255) DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `user_courses`:
--   `userID`
--       `users` -> `userID`
--   `courseID`
--       `courses` -> `courseID`
--

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
(3, 7, '101.00', '', '100', 0),
(3, 9, '100.00', '', '49', 0),
(3, 11, '0.00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `user_groups`:
--   `userID`
--       `users` -> `userID`
--   `groupID`
--       `groups` -> `groupID`
--

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`userID`, `groupID`) VALUES
(1, 0),
(2, 0),
(3, 0),
(8, 0),
(14, 0),
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
(9, 6),
(12, 6),
(18, 6),
(2, 7),
(12, 7),
(6, 8),
(12, 9),
(18, 10),
(1, 11),
(16, 11),
(1, 12),
(16, 12),
(10, 14),
(1, 15),
(5, 15),
(6, 15),
(7, 15),
(9, 15),
(12, 15),
(14, 15),
(16, 15),
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

-- --------------------------------------------------------

--
-- Table structure for table `user_results`
--

DROP TABLE IF EXISTS `user_results`;
CREATE TABLE IF NOT EXISTS `user_results` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `userAnswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- RELATIONS FOR TABLE `user_results`:
--

--
-- Dumping data for table `user_results`
--

INSERT INTO `user_results` (`courseID`, `questionOrder`, `userID`, `attempt`, `userAnswer`) VALUES
(2, 0, 1, 0, 2),
(2, 0, 3, 0, 0),
(11, 0, 3, 0, 2);

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
-- Indexes for table `group_courses`
--
ALTER TABLE `group_courses`
  ADD PRIMARY KEY (`groupID`,`courseID`),
  ADD KEY `group_courses_ibfk_2` (`courseID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`courseID`,`questionOrder`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slideID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`userID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`userID`,`groupID`),
  ADD KEY `groupID` (`groupID`);

--
-- Indexes for table `user_results`
--
ALTER TABLE `user_results`
  ADD PRIMARY KEY (`courseID`,`questionOrder`,`userID`,`attempt`) USING BTREE;

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
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
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
-- Constraints for table `group_courses`
--
ALTER TABLE `group_courses`
  ADD CONSTRAINT `group_courses_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`),
  ADD CONSTRAINT `group_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

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
-- Constraints for table `user_courses`
--
ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`),
  ADD CONSTRAINT `user_groups_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
