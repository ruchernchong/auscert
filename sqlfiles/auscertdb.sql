-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2015 at 02:13 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

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
DROP DATABASE IF EXISTS `auscertdb`;

CREATE DATABASE `auscertdb`;

USE `auscertdb`;


CREATE TABLE IF NOT EXISTS `answers` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `answerOrder` int(11) NOT NULL,
  `answerText` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`courseID`, `questionOrder`, `answerOrder`, `answerText`) VALUES
(12, 0, 0, 'Being quick to type'),
(12, 0, 1, 'Reduced likelihood of being cracked by password cracking software'),
(12, 0, 2, 'Being quick to type'),
(12, 0, 3, 'Unlikely to be guessed by another person'),
(12, 0, 4, 'Being easy to remember'),
(12, 1, 0, 'Contain at least 1 number or symbol'),
(12, 1, 1, 'Contain a combination of upper and lower case characters.'),
(12, 1, 2, 'Consist of at least 8 characters in length'),
(12, 1, 3, 'Cannot be your UQ username'),
(12, 1, 4, 'Should be something you can remember'),
(12, 1, 5, 'Should not be a dictionary word'),
(12, 1, 6, 'Contain at least 1 number or symbol'),
(12, 2, 0, 'a and d'),
(12, 2, 1, 'Taking the first letter from each word of a made up phrase'),
(12, 2, 2, 'Choosing a memorable word with numbers and/or symbols mixed throughout'),
(12, 2, 3, 'Choosing a technical term that isn’t in the English dictionary'),
(12, 2, 4, 'Using two or three unrelated words'),
(12, 2, 5, 'a and c'),
(12, 2, 6, 'b and d'),
(12, 2, 7, 'a and d'),
(12, 3, 0, 'All of the above'),
(12, 3, 1, 'Adding numbers or symbols'),
(12, 3, 2, 'Using deliberate misspelling of any words'),
(12, 3, 3, 'Using 10 or more characters'),
(12, 3, 4, 'All of the above'),
(12, 3, 5, 'a and c'),
(12, 4, 0, 'The name of a food followed by the name of a country'),
(12, 4, 1, 'The date of a celebrity’s birthday'),
(12, 4, 2, 'The same password you use for your personal email account'),
(12, 4, 3, 'The row of keys from “A” to “L”'),
(12, 4, 4, 'The name of a food followed by the name of a country'),
(12, 4, 5, 'Two characters repeated until you hit the character limit'),
(12, 4, 6, 'A Spanish word'),
(12, 4, 7, 'A password which consists of a word with the letter “A” replaced with the number “4” and the letter the letter “T” replaced with the number “7”'),
(12, 5, 0, 'In order to make your password more difficult to guess, personal details should never be used.'),
(12, 5, 1, 'You should consider using personal details as this makes passwords easier to remember.'),
(12, 5, 2, 'Personal details can be used in passwords as long as random characters are added to scramble the message.'),
(12, 5, 3, 'Personal details that you share with large groups of people can be used because they aren’t strictly related to your user account.'),
(12, 5, 4, 'In order to make your password more difficult to guess, personal details should never be used.');

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
  `passPercentage` int(7) unsigned NOT NULL DEFAULT '50',
  `description` longtext,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastEdited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `passPercentage`, `description`, `dateCreated`, `lastEdited`) VALUES
(1, 'Phising Scams', 'Safety', 'Tartiner Studios', 1, 50, '<p>This course will teach you about Phishing Scams.&nbsp;By the end of this course you will expect to have learnt:</p>\n\n<ol>\n	<li>What phishing scams are</li>\n	<li>How to identify phishing attempts</li>\n	<li>What to do if you encounter a phishing attempt</li>\n</ol>\n', '2015-03-08 00:00:00', '2015-09-15 12:07:34'),
(2, 'Choosing A Safe Password', 'Security', 'Redones', 0, 50,  '<p>This course will guide you through how a password works as well as steps to take to ensure a strong and secure password</p>\r\n', '2015-07-15 00:00:00', '2015-09-02 12:00:18'),
(3, 'Tartiner Studios Training', 'Introductory', 'Tartiner Studios', 0, 50,  'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(4, 'SQL Injection Attacks', 'Cyber Attacks', 'AusCert', 0, 50,  'Introduction to what SQL Injection Attacks are and how to avoid them', '2015-06-19 00:00:00', '2015-08-25 00:00:00'),
(5, 'Data Encryption', 'Security', 'UQ ITEE', 0, 50,  '<p>Detailed course on the various methods of data encyyption</p>\n', '2015-08-12 00:00:00', '2015-09-13 23:39:19'),
(6, 'UQ Staff Security Basics', 'Introductory', 'UQ BEL', 0, 50,  'A compulsory online security course for uq staff', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(7, 'Introduction to Online Security', 'Introductory', 'ruchern', 0, 50,  'Ez Workshop.', '2015-08-20 04:13:41', '2015-08-20 04:13:41'),
(9, 'Tartiner Studios UX Design', 'Design', 'ruchern', 0, 50,  'Please submit your UX Video to blog by Tuesday.\r\n\r\n*This is a test post.', '2015-08-21 02:01:23', '2015-08-21 02:01:23'),
(10, 'UQ Privacy and Online Security', 'Sprint Zero', 'RuChern', 0, 50,  '2nd Checkpoint', '2015-08-26 12:45:53', '2015-08-26 12:45:53'),
(11, 'Antiviruses - Selection and Usage', 'Introductory', 'RuChern', 0, 50,  '<p>Learn to use Children&#39;s Literature Digital Resource (CLDR).</p>\r\n', '2015-09-01 11:43:15', '2015-09-02 11:50:13'),
(12, 'Choosing a Secure Password', 'Security', 'leon', 1, 50,  '<p>This course will focus on teaching practices recommended by UQ ITS for choosing a secure password. By the end of this course you will know how to choose a password that is:</p>\n\n<ol>\n	<li>Secure from being guessed by another person</li>\n	<li>Secure from being cracked by password cracking software</li>\n	<li>Easy to remember</li>\n</ol>\n', '2015-09-14 18:50:03', '2015-09-15 12:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groupID` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `group_courses` (
  `groupID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(18, 11),
(1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `questionText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`courseID`, `questionOrder`, `questionText`) VALUES
(12, 0, '<ol>\n	<li>Which of the following is not a primary goal when choosing a new password?</li>\n</ol>\n'),
(12, 1, '<p>When choosing a new password at UQ, which of the following is not part of the core criteria?</p>\n'),
(12, 2, '<p>Which of the following method(s) are recommended by UQ for choosing a secure &ldquo;base&rdquo; for your password?</p>\n'),
(12, 3, '<p>Which of the following are recommended methods for further increasing the security of new passwords?</p>\n'),
(12, 4, '<p>Which of the following password examples don&rsquo;t contain one of the practices to avoid when choosing a new password?</p>\n'),
(12, 5, '<p>Which of the following statements regarding the use of personal details in passwords is true?</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE IF NOT EXISTS `slides` (
  `slideID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`slideID`, `courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(10, 5, 0, '<p>The&nbsp;<strong>Data Encryption Standard</strong>&nbsp;(<strong>DES</strong>,&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/ˌdiːˌiːˈɛs/</a>&nbsp;or&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/ˈdɛz/</a>) was once a predominant&nbsp;<a href="https://en.wikipedia.org/wiki/Symmetric-key_algorithm">symmetric-key algorithm</a>&nbsp;for the<a href="https://en.wikipedia.org/wiki/Encryption">encryption</a>&nbsp;of electronic data. It was highly influential in the advancement of modern&nbsp;<a href="https://en.wikipedia.org/wiki/Cryptography">cryptography</a>&nbsp;in the academic world. Developed in the early 1970s at&nbsp;<a href="https://en.wikipedia.org/wiki/IBM">IBM</a>&nbsp;and based on an earlier design by&nbsp;<a href="https://en.wikipedia.org/wiki/Horst_Feistel">Horst Feistel</a>, the algorithm was submitted to the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Bureau_of_Standards">National Bureau of Standards</a>&nbsp;(NBS) following the agency&#39;s invitation to propose a candidate for the protection of sensitive, unclassified electronic government data. In 1976, after consultation with the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Security_Agency">National Security Agency</a>&nbsp;(NSA), the NBS eventually selected a slightly modified version (strengthened against&nbsp;<a href="https://en.wikipedia.org/wiki/Differential_cryptanalysis">differential cryptanalysis</a>, but weakened against&nbsp;<a href="https://en.wikipedia.org/wiki/Brute_force_attack">brute force attacks</a>), which was published as an official&nbsp;<a href="https://en.wikipedia.org/wiki/Federal_Information_Processing_Standard">Federal Information Processing Standard</a>&nbsp;(FIPS) for the&nbsp;<a href="https://en.wikipedia.org/wiki/United_States">United States</a>&nbsp;in 1977. The publication of an NSA-approved encryption standard simultaneously resulted in its quick international adoption and widespread academic scrutiny. Controversies arose out of&nbsp;<a href="https://en.wikipedia.org/wiki/Classified_information">classified</a>&nbsp;design elements, a relatively short&nbsp;<a href="https://en.wikipedia.org/wiki/Key_length">key length</a>&nbsp;of the&nbsp;<a href="https://en.wikipedia.org/wiki/Symmetric-key_algorithm">symmetric-key</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Block_cipher">block cipher</a>&nbsp;design, and the involvement of the NSA, nourishing suspicions about a&nbsp;<a href="https://en.wikipedia.org/wiki/Backdoor_(computing)">backdoor</a>. The intense academic scrutiny the algorithm received over time led to the modern understanding of block ciphers and their&nbsp;<a href="https://en.wikipedia.org/wiki/Cryptanalysis">cryptanalysis</a>.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt="" src="https://i-msdn.sec.s-msft.com/dynimg/IC155063.gif" style="height:233px; width:350px" /><img alt="" src="https://www.simple-talk.com/iwritefor/articlefiles/948-TDE_1.JPG" style="height:139px; width:350px" /></p>\n\n<p>DES is now considered to be insecure for many applications. This is mainly due to the 56-bit key size being too small; in January 1999,&nbsp;<a href="https://en.wikipedia.org/wiki/Distributed.net">distributed.net</a>&nbsp;and the&nbsp;<a href="https://en.wikipedia.org/wiki/Electronic_Frontier_Foundation">Electronic Frontier Foundation</a>&nbsp;collaborated to publicly break a DES key in 22 hours and 15 minutes (see&nbsp;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#Chronology">chronology</a>). There are also some analytical results which demonstrate theoretical weaknesses in the cipher, although they are infeasible to mount in practice. The algorithm is believed to be practically secure in the form of&nbsp;<a href="https://en.wikipedia.org/wiki/Triple_DES">Triple DES</a>, although there are theoretical attacks. In recent years, the cipher has been superseded by the&nbsp;<a href="https://en.wikipedia.org/wiki/Advanced_Encryption_Standard">Advanced Encryption Standard</a>&nbsp;(AES). Furthermore, DES has been withdrawn as a standard by the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology">National Institute of Standards and Technology</a>&nbsp;(formerly the National Bureau of Standards).</p>\n\n<p>Some documentation makes a distinction between DES as a standard and DES as an algorithm, referring to the algorithm as the&nbsp;<strong>DEA</strong>&nbsp;(<strong>Data Encryption Algorithm</strong>).</p>\n', 'Data Encryption Standard'),
(11, 5, 1, '<h2>The origins of DES go back to the early 1970s. In 1972, after concluding a study on the US government&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Computer_security">computer security</a>&nbsp;needs, the US standards body NBS (National Bureau of Standards)&mdash;now named&nbsp;<a href="https://en.wikipedia.org/wiki/NIST">NIST</a>&nbsp;(National Institute of Standards and Technology)&mdash;identified a need for a government-wide standard for encrypting unclassified, sensitive information.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-1">[1]</a>&nbsp;Accordingly, on 15 May 1973, after consulting with the NSA, NBS solicited proposals for a cipher that would meet rigorous design criteria. None of the submissions, however, turned out to be suitable. A second request was issued on 27 August 1974. This time,&nbsp;<a href="https://en.wikipedia.org/wiki/International_Business_Machines">IBM</a>&nbsp;submitted a candidate which was deemed acceptable&mdash;a cipher developed during the period 1973&ndash;1974 based on an earlier algorithm,&nbsp;<a href="https://en.wikipedia.org/wiki/Horst_Feistel">Horst Feistel</a>&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Lucifer_(cipher)">Lucifer</a>&nbsp;cipher. The team at IBM involved in cipher design and analysis included Feistel,&nbsp;<a href="https://en.wikipedia.org/wiki/Walter_Tuchman">Walter Tuchman</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Don_Coppersmith">Don Coppersmith</a>, Alan Konheim, Carl Meyer, Mike Matyas,&nbsp;<a href="https://en.wikipedia.org/wiki/Roy_Adler">Roy Adler</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Edna_Grossman">Edna Grossman</a>, Bill Notz, Lynn Smith, and&nbsp;<a href="https://en.wikipedia.org/wiki/Bryant_Tuckerman">Bryant Tuckerman</a>.</h2>\n\n<p><img alt="" src="http://icomputerdenver.com/wp-content/uploads/2013/10/Data-Protection.jpg" style="height:208px; width:350px" /></p>\n\n<h3>NSA&#39;s involvement in the design[<a href="https://en.wikipedia.org/w/index.php?title=Data_Encryption_Standard&amp;action=edit&amp;section=2">edit</a>]</h3>\n\n<p>On 17 March 1975, the proposed DES was published in the&nbsp;<em><a href="https://en.wikipedia.org/wiki/Federal_Register">Federal Register</a></em>. Public comments were requested, and in the following year two open workshops were held to discuss the proposed standard. There was some criticism from various parties, including from&nbsp;<a href="https://en.wikipedia.org/wiki/Public-key_cryptography">public-key cryptography</a>&nbsp;pioneers&nbsp;<a href="https://en.wikipedia.org/wiki/Martin_Hellman">Martin Hellman</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Whitfield_Diffie">Whitfield Diffie</a>,<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-2">[2]</a>&nbsp;citing a shortened&nbsp;<a href="https://en.wikipedia.org/wiki/Key_length">key length</a>&nbsp;and the mysterious &quot;<a href="https://en.wikipedia.org/wiki/Substitution_box">S-boxes</a>&quot; as evidence of improper interference from the NSA. The suspicion was that the algorithm had been covertly weakened by the intelligence agency so that they&mdash;but no-one else&mdash;could easily read encrypted messages.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-3">[3]</a>&nbsp;Alan Konheim (one of the designers of DES) commented, &quot;We sent the S-boxes off to Washington. They came back and were all different.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-4">[4]</a>&nbsp;The&nbsp;<a href="https://en.wikipedia.org/wiki/United_States_Senate_Select_Committee_on_Intelligence">United States Senate Select Committee on Intelligence</a>&nbsp;reviewed the NSA&#39;s actions to determine whether there had been any improper involvement. In the unclassified summary of their findings, published in 1978, the Committee wrote:</p>\n\n<blockquote>\n<p>In the development of DES, NSA convinced&nbsp;<a href="https://en.wikipedia.org/wiki/IBM">IBM</a>&nbsp;that a reduced key size was sufficient; indirectly assisted in the development of the S-box structures; and certified that the final DES algorithm was, to the best of their knowledge, free from any statistical or mathematical weakness.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-5">[5]</a></p>\n</blockquote>\n\n<p>However, it also found that</p>\n\n<blockquote>\n<p>NSA did not tamper with the design of the algorithm in any way. IBM invented and designed the algorithm, made all pertinent decisions regarding it, and concurred that the agreed upon key size was more than adequate for all commercial applications for which the DES was intended.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-6">[6]</a></p>\n</blockquote>\n\n<p>Another member of the DES team, Walter Tuchman, stated &quot;We developed the DES algorithm entirely within IBM using IBMers. The NSA did not dictate a single wire!&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-7">[7]</a>&nbsp;In contrast, a declassified NSA book on cryptologic history states:</p>\n\n<blockquote>\n<p>In 1973 NBS solicited private industry for a data encryption standard (DES). The first offerings were disappointing, so NSA began working on its own algorithm. Then Howard Rosenblum, deputy director for research and engineering, discovered that Walter Tuchman of IBM was working on a modification to Lucifer for general use. NSA gave Tuchman a clearance and brought him in to work jointly with the Agency on his Lucifer modification.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-johnson3-8">[8]</a></p>\n</blockquote>\n\n<p>and</p>\n\n<blockquote>\n<p>NSA worked closely with IBM to strengthen the algorithm against all except brute force attacks and to strengthen substitution tables, called S-boxes. Conversely, NSA tried to convince IBM to reduce the length of the key from 64 to 48 bits. Ultimately they compromised on a 56-bit key.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-9">[9]</a></p>\n</blockquote>\n\n<p>Some of the suspicions about hidden weaknesses in the S-boxes were allayed in 1990, with the independent discovery and open publication by&nbsp;<a href="https://en.wikipedia.org/wiki/Eli_Biham">Eli Biham</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Adi_Shamir">Adi Shamir</a>&nbsp;of&nbsp;<a href="https://en.wikipedia.org/wiki/Differential_cryptanalysis">differential cryptanalysis</a>, a general method for breaking block ciphers. The S-boxes of DES were much more resistant to the attack than if they had been chosen at random, strongly suggesting that IBM knew about the technique in the 1970s. This was indeed the case; in 1994, Don Coppersmith published some of the original design criteria for the S-boxes.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-10">[10]</a>&nbsp;According to&nbsp;<a href="https://en.wikipedia.org/wiki/Steven_Levy">Steven Levy</a>, IBM Watson researchers discovered differential cryptanalytic attacks in 1974 and were asked by the NSA to keep the technique secret.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-Levy-11">[11]</a>&nbsp;Coppersmith explains IBM&#39;s secrecy decision by saying, &quot;that was because [differential cryptanalysis] can be a very powerful tool, used against many schemes, and there was concern that such information in the public domain could adversely affect national security.&quot; Levy quotes Walter Tuchman: &quot;[t]hey asked us to stamp all our documents confidential... We actually put a number on each one and locked them up in safes, because they were considered U.S. government classified. They said do it. So I did it&quot;.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-Levy-11">[11]</a>&nbsp;Bruce Schneier observed that &quot;It took the academic community two decades to figure out that the NSA &#39;tweaks&#39; actually improved the security of DES.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-schneier20040927-12">[12]</a></p>\n', 'History of DES'),
(12, 12, 0, '<p>In order to encourage a basic level of password security, UQ passwords are recommended to meet the following criteria:</p>\n\n<ol>\n	<li>At least 8 characters long</li>\n	<li>Should not be a dictionary word</li>\n	<li>Contain a combination of upper and lower case characters</li>\n	<li>Cannot be the word &#39;password&#39;</li>\n	<li>Cannot be your UQ username</li>\n	<li>Should be something you can remember</li>\n</ol>\n\n<p>These criteria are partially enforced when you set a new password on the UQ system. However, passwords that fit this criterion aren&rsquo;t necessarily guaranteed to be secure. For this reason, it is highly recommended that further steps be taken to make passwords more difficult to break.</p>\n', 'Basic Criteria at UQ'),
(13, 12, 1, '<p>Choosing a more secure password can be broken down into two steps. Firstly, it is recommended that you chose a concept to &ldquo;base&rdquo; your password on that is both secure and that you are able to easily remember. Secondly, the security of this password should be further increased by implementing methods to make it more difficult to be cracked. &nbsp;</p>\n\n<p>Two different methods for choosing a base for your password that are recommended by UQ are:</p>\n\n<ol>\n	<li>Using two or three unrelated words</li>\n	<li>Taking the first letter from each word of a made up phrase</li>\n</ol>\n\n<p>The following methods can be used to increase the security of your chosen password:</p>\n\n<ol>\n	<li>Adding numbers or symbols</li>\n	<li>Using deliberate misspelling of any words</li>\n	<li>Using 10 or more characters</li>\n</ol>\n', 'Extra Recommended Practices'),
(14, 12, 2, '<p>The following is a list of guidelines on methods you should avoid when choosing a new password. While many of these methods would make passwords easier to remember, they can make your password more vulnerable.</p>\n\n<p>Passwords should never use:</p>\n\n<ol>\n	<li>Repeated characters (eg. rrrtttwww)</li>\n	<li>Single words from any language</li>\n	<li>Keyboard patterns eg. qwertyuiop</li>\n	<li>Any date</li>\n	<li>Passwords from other services</li>\n	<li>Letters replaced with numbers that look the same (eg &lsquo;l&rsquo; with &lsquo;1&rsquo; or &lsquo;o&rsquo; with &lsquo;0&rsquo;)</li>\n</ol>\n\n<p>In addition, passwords should never contain personal details. Examples of commonly used personal details include:</p>\n\n<ol>\n	<li>Maiden name</li>\n	<li>Names of spouses, children, close friends or pets</li>\n	<li>Phone numbers</li>\n	<li>Car registration numbers</li>\n	<li>Your home country, city, or address</li>\n	<li>Work-related terms such as department name or room number</li>\n</ol>\n', 'Practices to Avoid'),
(15, 1, 0, '<p>Phishing scams are an attempt to trick users into giving up personal details to a malicious party. Phishing scams may target your:</p>\n\n<ol>\n	<li>Login credentials (UQ username and Password)</li>\n	<li>Credit card details</li>\n	<li>Financial details</li>\n	<li>Other valuable information</li>\n</ol>\n\n<p>Phishing attempts often take the form of a fraudulent email and/or website that appears to be legitimate. In the most common form, a fraudulent email prompts users to follow a link to a website set up by the attacker. Often users are prompted to input information in order to &ldquo;update&rdquo; or &ldquo;verify&rdquo; it.</p>\n\n<p>While UQ&rsquo;s mail system is able to identify and block the majority of phishing attempts from reaching users, it isn&rsquo;t able to stop 100% of them. For this reason, it is important for users to be able to correctly identify and deal with phishing attempts.</p>\n', 'What are Phishing Scams'),
(16, 1, 1, '<p>Common characteristics of phishing emails identified by UQ ITS are:</p>\n\n<ol>\n	<li>The message is unsolicited and asks you to update, confirm or reveal personal identity information (e.g., Sign-In password, account numbers, financial details, protected health information).</li>\n	<li>The message creates a sense of urgency</li>\n	<li>The message has an unusual From address or an unusual Reply-To address instead of a &quot;@uq.edu.au&quot; address.</li>\n	<li>The message is not personalized. Valid messages from banks and other legitimate sources usually refer to you by name.</li>\n	<li>Grammatical errors</li>\n</ol>\n\n<p>Common characteristics of phishing websites include:</p>\n\n<ol>\n	<li>The (malicious) web site URL doesn&rsquo;t match the name of the institution that it allegedly represents.</li>\n	<li>The web site doesn&rsquo;t have an &quot;s&quot; after &quot;http//:&quot; indicating it is not a secure site.</li>\n	<li>The web address isn&rsquo;t the same as the printed address in the email you receive.</li>\n	<li>The message is not personalized. Valid messages from banks and other legitimate sources usually refer to you by name.</li>\n</ol>\n', 'How to Identify Phishing Attempts'),
(17, 1, 2, '<p>The following guidelines should be followed in order to safeguard yourself from phishing scams:</p>\n\n<ol>\n	<li>Be wary of unsolicited messages. Even though you may recognise the name of the sender, scam artists sometimes use these tactics to get personal information from you. Never give out your UQ Sign-In, password, credit card, date of birth or tax file number in response to an unsolicited request.</li>\n	<li>Verify that you are connected to a certified, encrypted web site. If an organisation wants to have a secure web site that uses encryption, it needs to obtain a site certificate. Look for a closed padlock in the status bar at the bottom of your browser window or in the address bar near the top. &nbsp;Also check for &quot;https:&quot; rather than &quot;http:&quot; in the URL.</li>\n	<li>Use common sense. If it seems too good to be true it&#39;s probably a scam. If you have any doubts, don&rsquo;t respond. Ask your local IT officer, or contact the UQ ITS Help Desk&nbsp;on 3365 6000 for advice.</li>\n	<li>Don&#39;t click the link. Instead, phone the company or do an Internet search for the company&rsquo;s true web address.</li>\n	<li>Don&rsquo;t use forms that are embedded in the body of an email (even if the form appears legitimate). Only provide information over the phone or on certified, encrypted Web sites (see above for help to identify these sites).</li>\n	<li>Don&#39;t open email or attachments from unknown sources. Many viruses arrive as executable files that are harmless until you start running them. .jpg file attachments have recently become a new format for spreading viruses.</li>\n	<li>Do keep your Internet browser and operating system up-to-date on your home computer with the latest security patches and updates.</li>\n</ol>\n\n<p>If you believe you have encountered a phishing scam at UQ, do not respond to the email and report it to UQ ITS.</p>\n', 'How to Deal with Phishing Scams'),
(18, 1, 3, '<p>The information in this course is based on UQ&rsquo;s Phishing/Email Scams Factsheet &amp; Prevention webpage. For further information, it can be visited at:</p>\n\n<p><a href="https://www.its.uq.edu.au/helpdesk/phishingemail-scams-factsheet-prevention">https://www.its.uq.edu.au/helpdesk/phishingemail-scams-factsheet-prevention</a></p>\n', 'Further Information'),
(19, 12, 3, '<p>This course is based on UQ&#39;s&nbsp;Password Guide. For further information, it can be visited at:</p>\n\n<p><a href="https://www.its.uq.edu.au/helpdesk/uq-password-guide">https://www.its.uq.edu.au/helpdesk/uq-password-guide</a></p>\n', 'Further Information');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(65) NOT NULL,
  `email` varchar(65) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `userType` varchar(24) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `user_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `completion` int(11) NOT NULL,
  `description` text,
  `grading` varchar(255) DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`userID`, `courseID`, `completion`, `description`, `grading`, `mandatory`) VALUES
(2, 1, '0', NULL, '0.0', NULL),
(2, 3, '3', '', '90', 0),
(2, 12, '2', NULL, '0.0', NULL),
(3, 3, '3', '', '85', 0),
(3, 7, '3', '', '100', 0),
(3, 9, '1', '', '49', 0),
(7, 1, '2', NULL, '0.0', NULL),
(7, 12, '1', NULL, '0.0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE IF NOT EXISTS `user_results` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `userAnswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
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
