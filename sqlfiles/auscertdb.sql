SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `auscertdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `auscertdb`;

DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `answerOrder` int(11) NOT NULL,
  `answerText` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `creator` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `passPercentage` int(7) UNSIGNED NOT NULL DEFAULT '50',
  `description` longtext,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastEdited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `courses` (`courseID`, `courseName`, `category`, `creator`, `active`, `passPercentage`, `description`, `dateCreated`, `lastEdited`) VALUES
(1, 'Online Security Basics #1', 'Introductory', 'leon', 1, 50, '<p>Part 1 of the default courses for all users</p>\n', '2015-09-28 09:58:03', '2015-09-28 10:00:12'),
(2, 'Online Security Basics #2', 'Introductory', 'leon', 0, 50, '<p>Part 2 of the default courses for all users</p>\n', '2015-09-28 10:00:44', '2015-09-28 10:01:45'),
(3, 'Online Security Basics #3', 'Introductory', 'leon', 1, 50, '<p>Part 3 of the default courses for all users</p>\n', '2015-09-28 10:02:22', '2015-09-28 10:03:12'),
(4, 'Phising Scams', 'Safety', 'Tartiner Studios', 1, 50, '<p>This course will teach you about Phishing Scams.&nbsp;By the end of this course you will expect to have learnt:</p>\n\n<ol>\n	<li>What phishing scams are</li>\n	<li>How to identify phishing attempts</li>\n	<li>What to do if you encounter a phishing attempt</li>\n</ol>\n', '2015-03-08 00:00:00', '2015-09-15 12:07:34'),
(5, 'Choosing A Safe Password', 'Security', 'Redones', 1, 50, '<p>This course will guide you through how a password works as well as steps to take to ensure a strong and secure password</p>\r\n', '2015-07-15 00:00:00', '2015-09-02 12:00:18'),
(6, 'Tartiner Studios Training', 'Introductory', 'Tartiner Studios', 1, 50, 'Self made course designed by team tartiner on the importance of spreading nutella the RIGHT way on bread', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(7, 'SQL Injection Attacks', 'Cyber Attacks', 'AusCert', 0, 50, 'Introduction to what SQL Injection Attacks are and how to avoid them', '2015-06-19 00:00:00', '2015-08-25 00:00:00'),
(8, 'Data Encryption', 'Security', 'UQ ITEE', 1, 50, '<p>Detailed course on the various methods of data encyyption</p>\n', '2015-08-12 00:00:00', '2015-09-13 23:39:19'),
(9, 'UQ Staff Security Basics', 'Introductory', 'UQ BEL', 0, 50, 'A compulsory online security course for uq staff', '2015-08-12 00:00:00', '2015-08-17 00:00:00'),
(10, 'Introduction to Online Security', 'Introductory', 'ruchern', 1, 50, 'Ez Workshop.', '2015-08-20 04:13:41', '2015-08-20 04:13:41'),
(11, 'Tartiner Studios UX Design', 'Design', 'ruchern', 1, 50, 'Please submit your UX Video to blog by Tuesday.\r\n\r\n*This is a test post.', '2015-08-21 02:01:23', '2015-08-21 02:01:23'),
(12, 'UQ Privacy and Online Security', 'Sprint Zero', 'RuChern', 1, 50, '2nd Checkpoint', '2015-08-26 12:45:53', '2015-08-26 12:45:53'),
(13, 'Antiviruses - Selection and Usage', 'Introductory', 'RuChern', 0, 50, '<p>Learn to use Children&#39;s Literature Digital Resource (CLDR).</p>\r\n', '2015-09-01 11:43:15', '2015-09-02 11:50:13'),
(14, 'Choosing a Secure Password', 'Security', 'leon', 0, 50, '<p>This course will focus on teaching practices recommended by UQ ITS for choosing a secure password. By the end of this course you will know how to choose a password that is:</p>\n\n<ol>\n	<li>Secure from being guessed by another person</li>\n	<li>Secure from being cracked by password cracking software</li>\n	<li>Easy to remember</li>\n</ol>\n', '2015-09-14 18:50:03', '2015-09-15 12:09:22');

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `groupID` int(11) NOT NULL,
  `organisation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groups` (`groupID`, `organisation`) VALUES
(0, 'AllUsers'),
(1, 'UQ Security'),
(2, 'UQ AusCert'),
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
(16, 'UQ AWMC');

DROP TABLE IF EXISTS `group_courses`;
CREATE TABLE `group_courses` (
  `groupID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `group_courses` (`groupID`, `courseID`) VALUES
(0, 1),
(5, 1),
(9, 1),
(0, 2),
(1, 2),
(3, 2),
(0, 3),
(1, 3),
(2, 3),
(0, 4),
(5, 4),
(0, 5),
(1, 5),
(5, 5),
(0, 6),
(0, 7),
(3, 7),
(0, 8),
(0, 9),
(1, 9),
(2, 9),
(0, 10),
(2, 10),
(0, 11),
(3, 11),
(9, 11),
(16, 11),
(0, 12),
(1, 12),
(0, 14);

DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `questionText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`courseID`, `questionOrder`, `questionText`) VALUES
(12, 0, '<ol>\n	<li>Which of the following is not a primary goal when choosing a new password?</li>\n</ol>\n'),
(12, 1, '<p>When choosing a new password at UQ, which of the following is not part of the core criteria?</p>\n'),
(12, 2, '<p>Which of the following method(s) are recommended by UQ for choosing a secure &ldquo;base&rdquo; for your password?</p>\n'),
(12, 3, '<p>Which of the following are recommended methods for further increasing the security of new passwords?</p>\n'),
(12, 4, '<p>Which of the following password examples don&rsquo;t contain one of the practices to avoid when choosing a new password?</p>\n'),
(12, 5, '<p>Which of the following statements regarding the use of personal details in passwords is true?</p>\n');

DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
  `slideID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `slideOrder` int(3) NOT NULL,
  `slideContent` text,
  `slideTitle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `slides` (`slideID`, `courseID`, `slideOrder`, `slideContent`, `slideTitle`) VALUES
(10, 5, 0, '<p>The&nbsp;<strong>Data Encryption Standard</strong>&nbsp;(<strong>DES</strong>,&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/ˌdiːˌiːˈɛs/</a>&nbsp;or&nbsp;<a href="https://en.wikipedia.org/wiki/Help:IPA_for_English">/ˈdɛz/</a>) was once a predominant&nbsp;<a href="https://en.wikipedia.org/wiki/Symmetric-key_algorithm">symmetric-key algorithm</a>&nbsp;for the<a href="https://en.wikipedia.org/wiki/Encryption">encryption</a>&nbsp;of electronic data. It was highly influential in the advancement of modern&nbsp;<a href="https://en.wikipedia.org/wiki/Cryptography">cryptography</a>&nbsp;in the academic world. Developed in the early 1970s at&nbsp;<a href="https://en.wikipedia.org/wiki/IBM">IBM</a>&nbsp;and based on an earlier design by&nbsp;<a href="https://en.wikipedia.org/wiki/Horst_Feistel">Horst Feistel</a>, the algorithm was submitted to the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Bureau_of_Standards">National Bureau of Standards</a>&nbsp;(NBS) following the agency&#39;s invitation to propose a candidate for the protection of sensitive, unclassified electronic government data. In 1976, after consultation with the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Security_Agency">National Security Agency</a>&nbsp;(NSA), the NBS eventually selected a slightly modified version (strengthened against&nbsp;<a href="https://en.wikipedia.org/wiki/Differential_cryptanalysis">differential cryptanalysis</a>, but weakened against&nbsp;<a href="https://en.wikipedia.org/wiki/Brute_force_attack">brute force attacks</a>), which was published as an official&nbsp;<a href="https://en.wikipedia.org/wiki/Federal_Information_Processing_Standard">Federal Information Processing Standard</a>&nbsp;(FIPS) for the&nbsp;<a href="https://en.wikipedia.org/wiki/United_States">United States</a>&nbsp;in 1977. The publication of an NSA-approved encryption standard simultaneously resulted in its quick international adoption and widespread academic scrutiny. Controversies arose out of&nbsp;<a href="https://en.wikipedia.org/wiki/Classified_information">classified</a>&nbsp;design elements, a relatively short&nbsp;<a href="https://en.wikipedia.org/wiki/Key_length">key length</a>&nbsp;of the&nbsp;<a href="https://en.wikipedia.org/wiki/Symmetric-key_algorithm">symmetric-key</a>&nbsp;<a href="https://en.wikipedia.org/wiki/Block_cipher">block cipher</a>&nbsp;design, and the involvement of the NSA, nourishing suspicions about a&nbsp;<a href="https://en.wikipedia.org/wiki/Backdoor_(computing)">backdoor</a>. The intense academic scrutiny the algorithm received over time led to the modern understanding of block ciphers and their&nbsp;<a href="https://en.wikipedia.org/wiki/Cryptanalysis">cryptanalysis</a>.</p>\n\n<p>&nbsp;</p>\n\n<p><img alt="" src="https://i-msdn.sec.s-msft.com/dynimg/IC155063.gif" style="height:233px; width:350px" /><img alt="" src="https://www.simple-talk.com/iwritefor/articlefiles/948-TDE_1.JPG" style="height:139px; width:350px" /></p>\n\n<p>DES is now considered to be insecure for many applications. This is mainly due to the 56-bit key size being too small; in January 1999,&nbsp;<a href="https://en.wikipedia.org/wiki/Distributed.net">distributed.net</a>&nbsp;and the&nbsp;<a href="https://en.wikipedia.org/wiki/Electronic_Frontier_Foundation">Electronic Frontier Foundation</a>&nbsp;collaborated to publicly break a DES key in 22 hours and 15 minutes (see&nbsp;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#Chronology">chronology</a>). There are also some analytical results which demonstrate theoretical weaknesses in the cipher, although they are infeasible to mount in practice. The algorithm is believed to be practically secure in the form of&nbsp;<a href="https://en.wikipedia.org/wiki/Triple_DES">Triple DES</a>, although there are theoretical attacks. In recent years, the cipher has been superseded by the&nbsp;<a href="https://en.wikipedia.org/wiki/Advanced_Encryption_Standard">Advanced Encryption Standard</a>&nbsp;(AES). Furthermore, DES has been withdrawn as a standard by the&nbsp;<a href="https://en.wikipedia.org/wiki/National_Institute_of_Standards_and_Technology">National Institute of Standards and Technology</a>&nbsp;(formerly the National Bureau of Standards).</p>\n\n<p>Some documentation makes a distinction between DES as a standard and DES as an algorithm, referring to the algorithm as the&nbsp;<strong>DEA</strong>&nbsp;(<strong>Data Encryption Algorithm</strong>).</p>\n', 'Data Encryption Standard'),
(11, 5, 1, '<h2>The origins of DES go back to the early 1970s. In 1972, after concluding a study on the US government&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Computer_security">computer security</a>&nbsp;needs, the US standards body NBS (National Bureau of Standards)&mdash;now named&nbsp;<a href="https://en.wikipedia.org/wiki/NIST">NIST</a>&nbsp;(National Institute of Standards and Technology)&mdash;identified a need for a government-wide standard for encrypting unclassified, sensitive information.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-1">[1]</a>&nbsp;Accordingly, on 15 May 1973, after consulting with the NSA, NBS solicited proposals for a cipher that would meet rigorous design criteria. None of the submissions, however, turned out to be suitable. A second request was issued on 27 August 1974. This time,&nbsp;<a href="https://en.wikipedia.org/wiki/International_Business_Machines">IBM</a>&nbsp;submitted a candidate which was deemed acceptable&mdash;a cipher developed during the period 1973&ndash;1974 based on an earlier algorithm,&nbsp;<a href="https://en.wikipedia.org/wiki/Horst_Feistel">Horst Feistel</a>&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Lucifer_(cipher)">Lucifer</a>&nbsp;cipher. The team at IBM involved in cipher design and analysis included Feistel,&nbsp;<a href="https://en.wikipedia.org/wiki/Walter_Tuchman">Walter Tuchman</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Don_Coppersmith">Don Coppersmith</a>, Alan Konheim, Carl Meyer, Mike Matyas,&nbsp;<a href="https://en.wikipedia.org/wiki/Roy_Adler">Roy Adler</a>,&nbsp;<a href="https://en.wikipedia.org/wiki/Edna_Grossman">Edna Grossman</a>, Bill Notz, Lynn Smith, and&nbsp;<a href="https://en.wikipedia.org/wiki/Bryant_Tuckerman">Bryant Tuckerman</a>.</h2>\n\n<p><img alt="" src="http://icomputerdenver.com/wp-content/uploads/2013/10/Data-Protection.jpg" style="height:208px; width:350px" /></p>\n\n<h3>NSA&#39;s involvement in the design[<a href="https://en.wikipedia.org/w/index.php?title=Data_Encryption_Standard&amp;action=edit&amp;section=2">edit</a>]</h3>\n\n<p>On 17 March 1975, the proposed DES was published in the&nbsp;<em><a href="https://en.wikipedia.org/wiki/Federal_Register">Federal Register</a></em>. Public comments were requested, and in the following year two open workshops were held to discuss the proposed standard. There was some criticism from various parties, including from&nbsp;<a href="https://en.wikipedia.org/wiki/Public-key_cryptography">public-key cryptography</a>&nbsp;pioneers&nbsp;<a href="https://en.wikipedia.org/wiki/Martin_Hellman">Martin Hellman</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Whitfield_Diffie">Whitfield Diffie</a>,<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-2">[2]</a>&nbsp;citing a shortened&nbsp;<a href="https://en.wikipedia.org/wiki/Key_length">key length</a>&nbsp;and the mysterious &quot;<a href="https://en.wikipedia.org/wiki/Substitution_box">S-boxes</a>&quot; as evidence of improper interference from the NSA. The suspicion was that the algorithm had been covertly weakened by the intelligence agency so that they&mdash;but no-one else&mdash;could easily read encrypted messages.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-3">[3]</a>&nbsp;Alan Konheim (one of the designers of DES) commented, &quot;We sent the S-boxes off to Washington. They came back and were all different.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-4">[4]</a>&nbsp;The&nbsp;<a href="https://en.wikipedia.org/wiki/United_States_Senate_Select_Committee_on_Intelligence">United States Senate Select Committee on Intelligence</a>&nbsp;reviewed the NSA&#39;s actions to determine whether there had been any improper involvement. In the unclassified summary of their findings, published in 1978, the Committee wrote:</p>\n\n<blockquote>\n<p>In the development of DES, NSA convinced&nbsp;<a href="https://en.wikipedia.org/wiki/IBM">IBM</a>&nbsp;that a reduced key size was sufficient; indirectly assisted in the development of the S-box structures; and certified that the final DES algorithm was, to the best of their knowledge, free from any statistical or mathematical weakness.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-5">[5]</a></p>\n</blockquote>\n\n<p>However, it also found that</p>\n\n<blockquote>\n<p>NSA did not tamper with the design of the algorithm in any way. IBM invented and designed the algorithm, made all pertinent decisions regarding it, and concurred that the agreed upon key size was more than adequate for all commercial applications for which the DES was intended.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-6">[6]</a></p>\n</blockquote>\n\n<p>Another member of the DES team, Walter Tuchman, stated &quot;We developed the DES algorithm entirely within IBM using IBMers. The NSA did not dictate a single wire!&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-7">[7]</a>&nbsp;In contrast, a declassified NSA book on cryptologic history states:</p>\n\n<blockquote>\n<p>In 1973 NBS solicited private industry for a data encryption standard (DES). The first offerings were disappointing, so NSA began working on its own algorithm. Then Howard Rosenblum, deputy director for research and engineering, discovered that Walter Tuchman of IBM was working on a modification to Lucifer for general use. NSA gave Tuchman a clearance and brought him in to work jointly with the Agency on his Lucifer modification.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-johnson3-8">[8]</a></p>\n</blockquote>\n\n<p>and</p>\n\n<blockquote>\n<p>NSA worked closely with IBM to strengthen the algorithm against all except brute force attacks and to strengthen substitution tables, called S-boxes. Conversely, NSA tried to convince IBM to reduce the length of the key from 64 to 48 bits. Ultimately they compromised on a 56-bit key.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-9">[9]</a></p>\n</blockquote>\n\n<p>Some of the suspicions about hidden weaknesses in the S-boxes were allayed in 1990, with the independent discovery and open publication by&nbsp;<a href="https://en.wikipedia.org/wiki/Eli_Biham">Eli Biham</a>&nbsp;and&nbsp;<a href="https://en.wikipedia.org/wiki/Adi_Shamir">Adi Shamir</a>&nbsp;of&nbsp;<a href="https://en.wikipedia.org/wiki/Differential_cryptanalysis">differential cryptanalysis</a>, a general method for breaking block ciphers. The S-boxes of DES were much more resistant to the attack than if they had been chosen at random, strongly suggesting that IBM knew about the technique in the 1970s. This was indeed the case; in 1994, Don Coppersmith published some of the original design criteria for the S-boxes.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-10">[10]</a>&nbsp;According to&nbsp;<a href="https://en.wikipedia.org/wiki/Steven_Levy">Steven Levy</a>, IBM Watson researchers discovered differential cryptanalytic attacks in 1974 and were asked by the NSA to keep the technique secret.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-Levy-11">[11]</a>&nbsp;Coppersmith explains IBM&#39;s secrecy decision by saying, &quot;that was because [differential cryptanalysis] can be a very powerful tool, used against many schemes, and there was concern that such information in the public domain could adversely affect national security.&quot; Levy quotes Walter Tuchman: &quot;[t]hey asked us to stamp all our documents confidential... We actually put a number on each one and locked them up in safes, because they were considered U.S. government classified. They said do it. So I did it&quot;.<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-Levy-11">[11]</a>&nbsp;Bruce Schneier observed that &quot;It took the academic community two decades to figure out that the NSA &#39;tweaks&#39; actually improved the security of DES.&quot;<a href="https://en.wikipedia.org/wiki/Data_Encryption_Standard#cite_note-schneier20040927-12">[12]</a></p>\n', 'History of DES'),
(12, 12, 0, '<p>In order to encourage a basic level of password security, UQ passwords are recommended to meet the following criteria:</p>\n\n<ol>\n	<li>At least 8 characters long</li>\n	<li>Should not be a dictionary word</li>\n	<li>Contain a combination of upper and lower case characters</li>\n	<li>Cannot be the word &#39;password&#39;</li>\n	<li>Cannot be your UQ username</li>\n	<li>Should be something you can remember</li>\n</ol>\n\n<p>These criteria are partially enforced when you set a new password on the UQ system. However, passwords that fit this criterion aren&rsquo;t necessarily guaranteed to be secure. For this reason, it is highly recommended that further steps be taken to make passwords more difficult to break.</p>\n', 'Basic Criteria at UQ'),
(13, 12, 1, '<p>Choosing a more secure password can be broken down into two steps. Firstly, it is recommended that you chose a concept to &ldquo;base&rdquo; your password on that is both secure and that you are able to easily remember. Secondly, the security of this password should be further increased by implementing methods to make it more difficult to be cracked. &nbsp;</p>\n\n<p>Two different methods for choosing a base for your password that are recommended by UQ are:</p>\n\n<ol>\n	<li>Using two or three unrelated words</li>\n	<li>Taking the first letter from each word of a made up phrase</li>\n</ol>\n\n<p>The following methods can be used to increase the security of your chosen password:</p>\n\n<ol>\n	<li>Adding numbers or symbols</li>\n	<li>Using deliberate misspelling of any words</li>\n	<li>Using 10 or more characters</li>\n</ol>\n', 'Extra Recommended Practices'),
(14, 12, 2, '<p>The following is a list of guidelines on methods you should avoid when choosing a new password. While many of these methods would make passwords easier to remember, they can make your password more vulnerable.</p>\n\n<p>Passwords should never use:</p>\n\n<ol>\n	<li>Repeated characters (eg. rrrtttwww)</li>\n	<li>Single words from any language</li>\n	<li>Keyboard patterns eg. qwertyuiop</li>\n	<li>Any date</li>\n	<li>Passwords from other services</li>\n	<li>Letters replaced with numbers that look the same (eg &lsquo;l&rsquo; with &lsquo;1&rsquo; or &lsquo;o&rsquo; with &lsquo;0&rsquo;)</li>\n</ol>\n\n<p>In addition, passwords should never contain personal details. Examples of commonly used personal details include:</p>\n\n<ol>\n	<li>Maiden name</li>\n	<li>Names of spouses, children, close friends or pets</li>\n	<li>Phone numbers</li>\n	<li>Car registration numbers</li>\n	<li>Your home country, city, or address</li>\n	<li>Work-related terms such as department name or room number</li>\n</ol>\n', 'Practices to Avoid'),
(15, 1, 0, '<p>Phishing scams are an attempt to trick users into giving up personal details to a malicious party. Phishing scams may target your:</p>\n\n<ol>\n	<li>Login credentials (UQ username and Password)</li>\n	<li>Credit card details</li>\n	<li>Financial details</li>\n	<li>Other valuable information</li>\n</ol>\n\n<p>Phishing attempts often take the form of a fraudulent email and/or website that appears to be legitimate. In the most common form, a fraudulent email prompts users to follow a link to a website set up by the attacker. Often users are prompted to input information in order to &ldquo;update&rdquo; or &ldquo;verify&rdquo; it.</p>\n\n<p>While UQ&rsquo;s mail system is able to identify and block the majority of phishing attempts from reaching users, it isn&rsquo;t able to stop 100% of them. For this reason, it is important for users to be able to correctly identify and deal with phishing attempts.</p>\n', 'What are Phishing Scams'),
(16, 1, 1, '<p>Common characteristics of phishing emails identified by UQ ITS are:</p>\n\n<ol>\n	<li>The message is unsolicited and asks you to update, confirm or reveal personal identity information (e.g., Sign-In password, account numbers, financial details, protected health information).</li>\n	<li>The message creates a sense of urgency</li>\n	<li>The message has an unusual From address or an unusual Reply-To address instead of a &quot;@uq.edu.au&quot; address.</li>\n	<li>The message is not personalized. Valid messages from banks and other legitimate sources usually refer to you by name.</li>\n	<li>Grammatical errors</li>\n</ol>\n\n<p>Common characteristics of phishing websites include:</p>\n\n<ol>\n	<li>The (malicious) web site URL doesn&rsquo;t match the name of the institution that it allegedly represents.</li>\n	<li>The web site doesn&rsquo;t have an &quot;s&quot; after &quot;http//:&quot; indicating it is not a secure site.</li>\n	<li>The web address isn&rsquo;t the same as the printed address in the email you receive.</li>\n	<li>The message is not personalized. Valid messages from banks and other legitimate sources usually refer to you by name.</li>\n</ol>\n', 'How to Identify Phishing Attempts'),
(17, 1, 2, '<p>The following guidelines should be followed in order to safeguard yourself from phishing scams:</p>\n\n<ol>\n	<li>Be wary of unsolicited messages. Even though you may recognise the name of the sender, scam artists sometimes use these tactics to get personal information from you. Never give out your UQ Sign-In, password, credit card, date of birth or tax file number in response to an unsolicited request.</li>\n	<li>Verify that you are connected to a certified, encrypted web site. If an organisation wants to have a secure web site that uses encryption, it needs to obtain a site certificate. Look for a closed padlock in the status bar at the bottom of your browser window or in the address bar near the top. &nbsp;Also check for &quot;https:&quot; rather than &quot;http:&quot; in the URL.</li>\n	<li>Use common sense. If it seems too good to be true it&#39;s probably a scam. If you have any doubts, don&rsquo;t respond. Ask your local IT officer, or contact the UQ ITS Help Desk&nbsp;on 3365 6000 for advice.</li>\n	<li>Don&#39;t click the link. Instead, phone the company or do an Internet search for the company&rsquo;s true web address.</li>\n	<li>Don&rsquo;t use forms that are embedded in the body of an email (even if the form appears legitimate). Only provide information over the phone or on certified, encrypted Web sites (see above for help to identify these sites).</li>\n	<li>Don&#39;t open email or attachments from unknown sources. Many viruses arrive as executable files that are harmless until you start running them. .jpg file attachments have recently become a new format for spreading viruses.</li>\n	<li>Do keep your Internet browser and operating system up-to-date on your home computer with the latest security patches and updates.</li>\n</ol>\n\n<p>If you believe you have encountered a phishing scam at UQ, do not respond to the email and report it to UQ ITS.</p>\n', 'How to Deal with Phishing Scams'),
(18, 2, 0, '<p>The information in this course is based on UQ&rsquo;s Phishing/Email Scams Factsheet &amp; Prevention webpage. For further information, it can be visited at:</p>\n\n<p><a href="https://www.its.uq.edu.au/helpdesk/phishingemail-scams-factsheet-prevention">https://www.its.uq.edu.au/helpdesk/phishingemail-scams-factsheet-prevention</a></p>\n', 'Further Information'),
(19, 2, 1, '<p>This course is based on UQ&#39;s&nbsp;Password Guide. For further information, it can be visited at:</p>\n\n<p><a href="https://www.its.uq.edu.au/helpdesk/uq-password-guide">https://www.its.uq.edu.au/helpdesk/uq-password-guide</a></p>\n', 'Further Information'),
(20, 2, 2, '<h1>Online safety</h1>\n\n<p>Access practical government information and helpful advice to help keep children, whole families and businesses safe online.</p>\n\n<h2><a href="https://esafety.gov.au/esafety-information">eSafety information- external site</a></h2>\n\n<p>Provides a range of activities and resources on how to respond to cyberbullying, safeguard yourself and friends when using social networking sites, search engines and online games.</p>\n\n<p>Office of the Children&rsquo;s eSafety Commissioner</p>\n\n<h2><a href="http://www.acorn.gov.au/">Australian Cybercrime Online Reporting Network- external site</a></h2>\n\n<p>A national online system that allows people to securely report instances of cybercrime. Also provides advice to help people recognise and avoid common types of cybercrime.</p>\n\n<p>CrimTrac Agency</p>\n\n<h2><a href="https://www.esafety.gov.au/education-resources/classroom-resources/budde">Budd:e Cybersecurity builder- external site</a></h2>\n\n<p>Offers primary and secondary student a fun way to learn about the risks people take by going online, and the possible consequences. Also covers measures we can all use to help reduce the security risks.</p>\n\n<p>Office of the Children&rsquo;s eSafety Commissioner</p>\n', 'Introduction'),
(21, 3, 0, '<p>In information security circles, 2014 has been a year of what seems like a never-ending stream of cyberthreats and data breaches, affecting retailers, banks, gaming networks, governments and more.</p>\n\n<p>The calendar year may be drawing to a close, but we can expect that the size, severity and complexity of cyber threats to continue increasing, says Steve Durbin, managing director of the&nbsp;<a href="https://www.securityforum.org/" target="_blank">Information Security Forum (ISF)</a>, a nonprofit association that assesses security and risk management issues on behalf of its members.</p>\n\n<p>Looking ahead to 2015, Durbin says the ISF sees five security trends that will dominate the year.</p>\n\n<p>&quot;For me, there&#39;s not a huge amount that&#39;s spectacularly new,&quot; Durbin says. &quot;What is new is the increase in complexity and sophistication.&quot;</p>\n\n<h3>1. Cybercrime</h3>\n\n<p><img alt="cybercrime" src="http://images.techhive.com/images/article/2014/12/cybercrime-100534917-large.idge.jpg" style="height:383px; width:620px" /><small>Thinkstock</small></p>\n\n<p><a href="http://www.cio.com/article/2932982/resumes/it-resume-makeover-how-to-add-flavor-to-a-bland-resume.html"><img alt="resume makeover executive" src="http://core3.staticworld.net/images/article/2015/06/resume_makeover_executive-100589968-carousel.idge.jpg" /></a></p>\n\n<p><a href="http://www.cio.com/article/2932982/resumes/it-resume-makeover-how-to-add-flavor-to-a-bland-resume.html">IT Resume Makeover: How to add flavor to a bland resume</a></p>\n\n<p>Don&#39;t count on your &#39;plain vanilla&#39; resume to get you noticed - your resume needs a personal flavor to</p>\n\n<p><a href="http://www.cio.com/article/2932982/resumes/it-resume-makeover-how-to-add-flavor-to-a-bland-resume.html">READ NOW</a></p>\n\n<p>The Internet is an increasingly attractive hunting ground for criminals, activists and terrorists motivated to make money, get noticed, cause disruption or even bring down corporations and governments through online attacks, Durbin says.</p>\n\n<p>Today&#39;s cybercriminals primarily operate out of the former Soviet states. They are highly skilled and equipped with very modern tools &mdash; as Durbin notes, they often use 21st century tools to take on 20th century systems.</p>\n\n<p>&quot;In 2014 we saw cybercriminals demonstrating a higher degree of collaboration amongst themselves and a degree of technical competency that caught many large organizations unawares,&quot; Durbin says.</p>\n\n<p>&quot;In 2015, organizations must be prepared for the unpredictable so they have the resilience to withstand unforeseen, high impact events,&quot; he adds. &quot;Cybercrime, along with the increase in online causes (hacktivism), the increase in cost of compliance to deal with the uptick in regulatory requirements coupled with the relentless advances in technology against a backdrop of under investment in security departments, can all combine to cause the perfect threat storm. Organizations that identify what the business relies on most will be well placed to quantify the business case to invest in resilience, therefore minimizing the impact of the unforeseen.&quot;</p>\n', 'In-depth look'),
(22, 3, 1, '<h3>&nbsp;</h3>\n\n<p><img alt="privacy policy" src="http://images.techhive.com/images/article/2014/12/privacy_policy-100534918-large.idge.jpg" style="height:599px; width:620px" /><small>Thinkstock</small></p>\n\n<p>Most governments have already created, or are in the process of creating, regulations that impose conditions on the safeguard and use of Personally Identifiable Information (PII), with penalties for organizations that fail to sufficiently protect it. As a result, Durbin notes, organizations need to treat privacy as both a compliance and business risk issue, in order to reduce regulatory sanctions and business costs such as reputational damage and loss of customers due to privacy breaches.</p>\n\n<p>The patchwork nature of regulation around the world is likely to become an increasing burden on organizations in 2015.</p>\n\n<p>&quot;We are seeing increasing plans for regulation around the collection, storage and use of information along with severe penalties for loss of data and breach notification particularly across the European Union,&quot; Durbin says. &quot;Expect this to continue and develop further imposing an overhead in regulatory management above and beyond the security function and necessarily including legal, HR and Board level input.&quot;</p>\n\n<p>He adds that organizations should look upon the EU&#39;s struggles with data breach regulation and privacy regulation as a temperature gauge and plan accordingly.</p>\n\n<p>&quot;Regulators and governments are trying to get involved,&quot; he says. &quot;That&#39;s placing a bigger burden on organizations. They need to have resources in place to respond and they need to be aware of what&#39;s going on. If you&#39;ve got in-house counsel, you&#39;re going to start making more use of them. If you don&#39;t, there&#39;s a cost.&quot;</p>\n', 'Privacy and Regulation'),
(23, 3, 2, '<h3>&nbsp;</h3>\n\n<p><img alt="third party threats" src="http://images.techhive.com/images/article/2014/12/third_party-threats-100534915-large.idge.jpg" style="height:413px; width:620px" /><small>Thinkstock</small></p>\n\n<p>Supply chains are a vital component of every organization&#39;s global business operations and the backbone of today&#39;s global economy. However, Durbin says, security chiefs everywhere are growing more concerned about how open they are to numerous risk factors. A range of valuable and sensitive information is often shared with suppliers, and when that information is shared, direct control is lost. This leads to an increased risk of its confidentiality, integrity or availability being compromised.</p>\n\n<p>Even seemingly innocuous connections can be vectors for attack. The&nbsp;<a href="http://www.cio.com/article/2600345/security0/11-steps-attackers-took-to-crack-target.html" target="_blank">attackers who cracked Target</a>&nbsp;exploited a web services application that the company&#39;s HVAC vendor used to submit invoices.</p>\n\n<p>&quot;Over the next year, third-party providers will continue to come under pressure from targeted attacks and are unlikely to be able to provide assurance of data confidentiality, integrity and/or availability,&quot; Durbin says. &quot;Organizations of all sizes need to think about the consequences of a supplier providing accidental, but harmful, access to their intellectual property, customer or employee information, commercial plans or negotiations. And this thinking should not be confined to manufacturing or distribution partners. It should also embrace your professional services suppliers, your lawyers and accountants, all of whom share access oftentimes to your most valuable data assets.&quot;</p>\n\n<p>Durbin adds that infosec specialists should work closely with those in charge of contracting for services to conduct thorough due diligence on potential arrangements.</p>\n\n<p>&quot;It is imperative that organizations have robust business continuity plans in place to boost both resilience and senior management&#39;s confidence in the functions&#39; abilities,&quot; he says. &quot;A well-structured supply chain information risk assessment approach can provide a detailed, step by step approach to portion an otherwise daunting project into manageable components. This method should be information-driven, and not supplier-centric, so it is scalable and repeatable across the enterprise.&quot;</p>\n', 'Threats From Third-Party Providers');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(65) NOT NULL,
  `lname` varchar(65) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `usertype` varchar(24) NOT NULL,
  `status` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`userID`, `email`, `password`, `fname`, `lname`, `contact`, `usertype`, `status`) VALUES
(0, 'registration@ruchern.com', 'sha256:1000:D1iVJ0Jk5pvS4kgzqvq2mdSnq/6w63pt:Pc91zGeOH8q7OYmerxKl', 'AusCert', 'Administrator', '04 1010 1010', 'admin', b'1'),
(1, 'leonxenarax@gmail.com', 'sha256:1000:Xcp0j5PBSvYuH1JXdMTq7TCQM3zb2xDk:nw39o+xpVCqI2wCYdZGM', 'Leon', 'Teh', '0423 302 776', 'admin', b'0'),
(2, 'ruchern.chong@uqconnect.edu.au', 'sha256:1000:pUtBVN0CYVn7R7Lnw2CpPEcCs2DGTAHy:6OC6nluSbTtYiL9cHWkm', 'Ru Chern', 'Chong', '0451 519 513', 'admin', b'1'),
(3, 'hk2518@hotmail.com', 'sha256:1000:dZ4tUMveakkkCniz/tEpx0pyFaCefuN8:3Qn0ipGeazOmi951PHV9c8RSr5Q82o5c', 'HuiGyeong', 'Shin', '0424 169 232', 'admin', b'0'),
(4, 'cameronpaulsen0@gmail.com', 'sha256:1000:PgpeL0U3tOV+dPTXHPqdIIyT0mXScCCw:+13fqNURp3y46Mlf07WZrm3GoNpW46BL', 'Cameron', 'Paulsen', '0401 603 217', 'admin', b'0'),
(5, 'ravi_khemlani@hotmail.com', 'sha256:1000:Gxc3O1YQ8MjuvS8pKZ7uPyTWG3Qe/bqd:AViHuMUfPxeEu1y4pC1s7IkDcmFjn8eE', 'Ravi', 'Khemlani', '0452 525 020', 'admin', b'0'),
(6, 'mal.j@live.com', 'sha256:1000:dRryUSKi/AvjXGBegDbWW6mO4e20Etb5:eLSoj3n/KrzmPCxonRmj0a4OpIsivcN7', 'Malcolm', 'Joseland', '0450 479 554', 'admin', b'0'),
(7, 'j.steel@uq.edu.au', 'admin', 'Jim', 'Steel', '(07) 3365 4917', 'user', b'0'),
(8, 'b.zheng@uq.edu.au', 'admin', 'Bolong', 'Zheng', '(07) 3365 2447', 'user', b'0'),
(9, 'c.teakle@its.uq.edu.au', 'admin', 'Chris', 'Teakle', '(07) 3365 7555', 'admin', b'0'),
(10, 'S.Cockcroft@business.uq.edu.au', 'admin', 'Sophie', 'Cockcroft', '(07) 3346 8016', 'user', b'0'),
(11, 'bethanie.ong.9@facebook.com', 'admin', 'Bethanie', 'Ball', '01 6475 1111', 'user', b'0'),
(12, 'joyceeng@uq.edu.au', 'admin', 'Joyce', 'Ng', '0452 571 787', 'user', b'0'),
(13, 'gavino@uq.edu.au', 'admin', 'Gavin', 'Norman', '0412 816 417', 'user', b'0'),
(14, 'kuroneko@uq.edu.au', 'admin', 'Rachel', 'Tan', '0451 932 133', 'user', b'0'),
(15, 'aditya@uq.edu.au', 'admin', 'Aditya', 'Rahardi', '0406 504 067', 'user', b'0'),
(16, 'j.hadwen@uq.edu.au', 'admin', 'Jonathan', 'Hadwen', '(07) 3346 8265', 'user', b'0'),
(17, 'c.mills@uq.edu.au', 'admin', 'Catriona', 'Mills', '(07) 3346 8279', 'user', b'0'),
(18, 'm.farquhar@uq.edu.au', 'admin', 'M', 'Farquhar', '(07) 3346 8265', 'user', b'0'),
(27, 'me@ruchern.com', 'sha256:1000:CAToIan2MFNycFaF1GBYMkgBkDrxgPwx:0HgS39vMj2tTTFgOoEYAtr8WDpvNVq1Z', 'Ru Chern', 'Chong', '0451 519 513', 'user', b'0');

DROP TABLE IF EXISTS `user_courses`;
CREATE TABLE `user_courses` (
  `userID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `completion` decimal(5,2) NOT NULL,
  `description` text,
  `grading` varchar(255) DEFAULT NULL,
  `mandatory` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_courses` (`userID`, `courseID`, `completion`, `description`, `grading`, `mandatory`) VALUES
(1, 1, '0.00', NULL, '90.0', NULL),
(1, 2, '0.00', NULL, '0.0', NULL),
(1, 3, '0.00', NULL, '70.0', NULL),
(2, 1, '0.00', NULL, '50.0', NULL),
(2, 2, '0.00', NULL, '70.0', NULL),
(2, 3, '0.00', NULL, '90.0', NULL),
(3, 1, '0.00', NULL, '100.0', NULL),
(3, 2, '0.00', NULL, '0.0', NULL),
(3, 3, '0.00', NULL, '0.0', NULL),
(4, 1, '0.00', NULL, '0.0', NULL),
(4, 2, '0.00', NULL, '0.0', NULL),
(4, 3, '0.00', NULL, '0.0', NULL),
(5, 1, '0.00', NULL, '0.0', NULL),
(5, 2, '0.00', NULL, '0.0', NULL),
(5, 3, '0.00', NULL, '0.0', NULL),
(6, 1, '0.00', NULL, '0.0', NULL),
(6, 2, '0.00', NULL, '0.0', NULL),
(6, 3, '0.00', NULL, '0.0', NULL),
(7, 1, '0.00', NULL, '0.0', NULL),
(7, 2, '0.00', NULL, '0.0', NULL),
(7, 3, '0.00', NULL, '0.0', NULL),
(27, 2, '0.00', NULL, NULL, NULL),
(27, 3, '0.00', NULL, NULL, NULL),
(27, 5, '0.00', NULL, NULL, NULL),
(27, 9, '0.00', NULL, NULL, NULL),
(27, 10, '0.00', NULL, NULL, NULL),
(27, 12, '0.00', NULL, NULL, NULL);

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `userID` int(11) NOT NULL,
  `groupID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_groups` (`userID`, `groupID`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(27, 1),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(10, 2),
(27, 2),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(1, 4),
(10, 4),
(2, 5),
(5, 5),
(13, 5),
(15, 5),
(7, 6),
(8, 6),
(9, 6),
(10, 6),
(16, 6),
(17, 6),
(18, 6),
(1, 7),
(11, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(6, 8),
(11, 8),
(12, 8),
(13, 8),
(14, 8),
(15, 8),
(11, 9),
(9, 14);

DROP TABLE IF EXISTS `user_results`;
CREATE TABLE `user_results` (
  `courseID` int(11) NOT NULL,
  `questionOrder` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `attempt` int(11) NOT NULL,
  `userAnswer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_results` (`courseID`, `questionOrder`, `userID`, `attempt`, `userAnswer`) VALUES
(0, 0, 3, 0, 0),
(0, 1, 3, 0, 0),
(0, 2, 3, 0, 0),
(0, 3, 3, 0, 0),
(0, 4, 3, 0, 0),
(0, 5, 3, 0, 0),
(2, 0, 1, 0, 2),
(2, 0, 3, 0, 0),
(11, 0, 3, 0, 2);


ALTER TABLE `answers`
  ADD PRIMARY KEY (`courseID`,`questionOrder`,`answerOrder`);

ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`);

ALTER TABLE `groups`
  ADD PRIMARY KEY (`groupID`),
  ADD KEY `groupID` (`groupID`);

ALTER TABLE `group_courses`
  ADD PRIMARY KEY (`groupID`,`courseID`),
  ADD KEY `group_courses_ibfk_2` (`courseID`);

ALTER TABLE `questions`
  ADD PRIMARY KEY (`courseID`,`questionOrder`);

ALTER TABLE `slides`
  ADD PRIMARY KEY (`slideID`),
  ADD KEY `courseID` (`courseID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

ALTER TABLE `user_courses`
  ADD PRIMARY KEY (`userID`,`courseID`),
  ADD KEY `courseID` (`courseID`);

ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`userID`,`groupID`),
  ADD KEY `groupID` (`groupID`);

ALTER TABLE `user_results`
  ADD PRIMARY KEY (`courseID`,`questionOrder`,`userID`,`attempt`) USING BTREE;


ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
ALTER TABLE `groups`
  MODIFY `groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
ALTER TABLE `slides`
  MODIFY `slideID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

ALTER TABLE `answers`
  ADD CONSTRAINT `DeleteOnOwnerDeletion` FOREIGN KEY (`courseID`,`questionOrder`) REFERENCES `questions` (`courseID`, `questionOrder`) ON DELETE CASCADE,
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `group_courses`
  ADD CONSTRAINT `group_courses_ibfk_1` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE;

ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE;

ALTER TABLE `slides`
  ADD CONSTRAINT `slides_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

ALTER TABLE `user_courses`
  ADD CONSTRAINT `user_courses_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_courses_ibfk_2` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`) ON DELETE CASCADE;

ALTER TABLE `user_groups`
  ADD CONSTRAINT `user_groups_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_groups_ibfk_2` FOREIGN KEY (`groupID`) REFERENCES `groups` (`groupID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
