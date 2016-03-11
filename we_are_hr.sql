-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 12, 2016 at 12:49 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `we_are_hr`
--
CREATE DATABASE IF NOT EXISTS `we_are_hr` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `we_are_hr`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `addExam`(IN `T_id` INT(11), IN `E_date` DATE, IN `S_time` TIME, IN `E_time` TIME, IN `T_question` INT(4), IN `P_mark` INT(4), IN `N_mark` INT(4))
    NO SQL
insert into exam_details(Topic_id,Exam_Date,Start_time,End_time,Total_Question,Positive_Mark,Negative_Mark)
values(T_id,E_date,S_time,E_time,T_question,P_mark,N_mark)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addQuestion`(IN `Q_Name` VARCHAR(500), IN `Q_Type` VARCHAR(30), IN `A_Option` VARCHAR(300), IN `Ans` VARCHAR(100), IN `Q_Desc` VARCHAR(500), IN `Tid` INT(11), IN `T_Name` VARCHAR(100))
    NO SQL
insert into question(Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Id,Topic_Name)
values(Q_Name,Q_Type,A_Option,Ans,Q_Desc,Tid,T_Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTopic`(IN `T_Name` VARCHAR(100))
    NO SQL
insert into topic(Topic_Name) values(T_Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CountVisibleQuestion`(IN `T_Name` VARCHAR(100))
    NO SQL
select count(Final_Question) as Visible from Question 
where Final_Question=1 AND Topic_Name=T_Name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ExamTime`(IN `T_id` INT(11))
    NO SQL
select TIMEDIFF(End_time,Start_Time) as Time from exam_details 
where Topic_id=T_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotify`()
    NO SQL
select Topic_id,Exam_Date,Start_Time,End_Time,Total_Question,ID
from exam_details$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotifyWithId`(IN `id` INT(11))
    NO SQL
select Topic_id,Exam_Date,Start_Time,End_Time,Total_Question,Positive_Mark,Negative_Mark,ID
from exam_details where ID=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getQuestion`(IN `C_Name` VARCHAR(100))
    NO SQL
select Question_Name,Question_Type,Answer_Option,Question_Id
from Question where Topic_Id=C_Name AND Final_Question=1
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTopic`()
    NO SQL
select topic_Name from topic$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTopicid`(IN `T_Name` VARCHAR(30))
    NO SQL
select Topic_id from topic where Topic_Name=T_Name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTopicName`(IN `T_id` INT(11))
    NO SQL
select Topic_Name from topic
where Topic_id=T_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `QuestionforEgeneration`(IN `TName` VARCHAR(100))
    NO SQL
select Question_Id,Topic_Name,Question_Name,Exam_Date,Final_Question
from Question where Topic_Name=TName
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectDate`(IN `id` INT(11))
    NO SQL
select Exam_Date from exam_details
where Topic_id=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectExamDate`(IN `T_Id` VARCHAR(100), IN `Today_Date` DATE)
    NO SQL
select Exam_Date,Total_Question from exam_details
where Topic_id=T_Id AND Exam_Date=Today_Date$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectOption`(IN `Opt_id` INT(11))
    NO SQL
select Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Name
from Question
where Question_Id=Opt_id
LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectQuestion`()
    NO SQL
select Topic_Name,Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Question_Id,Final_Question
from Question
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `setQuesVis`(IN `Q_id` INT(11), IN `Vis` BOOLEAN, IN `Edate` VARCHAR(20))
    NO SQL
update `we_are_hr`.`question` set `Final_Question`=Vis,Exam_Date=Edate
where `question`.Question_Id=Q_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateExamDetails`(IN `id` INT(11), IN `Edate` DATE, IN `Stime` TIME, IN `Etime` TIME, IN `Tques` INT(11), IN `Pmark` INT(11), IN `Nmark` INT(11))
    NO SQL
update `we_are_hr`.`exam_details` set `Exam_Date`=Edate,Start_time=Stime,End_time=Etime,Total_Question=Tques,Positive_Mark=Pmark,Negative_Mark=Nmark
where ID=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateQuestionAns`(IN `Q_id` INT(11), IN `Q_Name` VARCHAR(500), IN `Q_Type` VARCHAR(30), IN `A_opt` VARCHAR(200), IN `Ans` VARCHAR(100), IN `Q_Desc` VARCHAR(500), IN `T_Name` VARCHAR(30), IN `T_id` INT(11))
    NO SQL
update `we_are_hr`.`question` set `Question_Name`=Q_Name,Question_Type=Q_Type,Answer_Option=A_opt,Answer=Ans,Question_Desc=Q_Desc,Topic_Name=T_Name,Topic_Id=T_id
where `question`.Question_Id=Q_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTopic`(IN `T_name` VARCHAR(100), IN `N_name` VARCHAR(100))
    NO SQL
update topic set Topic_Name=N_name where Topic_Name=T_name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `userAnswer`(IN `Ans` VARCHAR(200), IN `C_Name` VARCHAR(100))
    NO SQL
insert into user_answer(Answer,Course_Name)
values(Ans,C_Name)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `Name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `employee` int(200) NOT NULL,
  `web` varchar(50) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `contact` int(20) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Name`, `email`, `date`, `employee`, `web`, `country`, `state`, `city`, `pincode`, `contact`, `logo`, `password`) VALUES
('sodhi', 'myname@gmail.com', '2016-12-31', 2147483647, 'sodhi', ' India', ' Himachal Pradesh', 'Gwal Pathar', '21', 55645, 'icon-1.png', 'vis'),
('vishal', 'visans09@gmail.com', '2016-03-03', 123, 'www.xyz.com', ' India', ' Madhya Pradesh', 'Dabra', '475110', 2147483647, 'admit.JPG', '1234'),
('vishal', 'vishanshul91@gmail.c', '2017-03-01', 852, 'vishal.com', ' India', ' Uttar Pradesh', 'Gwalior Grint', '475110', 2147483647, 'client-logo8.png', 'vis'),
('weRhr', 'vishanshul9@gmail.co', '2016-12-05', 89, 'asd.com', ' India', ' Madhya Pradesh', 'Dabra', '475110', 2147483647, 'client-logo1.png', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE IF NOT EXISTS `employers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'employer',
  `act_status` int(1) NOT NULL,
  `sequence` varchar(500) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(12) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `companyWebsite` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `type`, `act_status`, `sequence`, `password`, `firstname`, `lastname`, `email`, `address`, `contact`, `city`, `state`, `country`, `companyName`, `companyWebsite`) VALUES
(15, 'employer', 1, '695032eb15dea5c8e9836192d3072365ddf1b15c', '123456', 'Embok', 'Ramde', 'smearcampaigner@gmail.com', 'Lovely Professional University, BH 6, Block 54(B),', 1234567890, 'Phagwara', 'Punjab', 'ABC Pvt. Ltd.', 'ABC Pvt. Ltd.', 'abcdev.com');

-- --------------------------------------------------------

--
-- Table structure for table `exam_details`
--

CREATE TABLE IF NOT EXISTS `exam_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Topic_id` int(11) NOT NULL,
  `Exam_Date` date NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL,
  `Total_Question` int(4) NOT NULL,
  `Positive_Mark` int(4) NOT NULL,
  `Negative_Mark` int(4) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Topic_id` (`Topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`ID`, `Topic_id`, `Exam_Date`, `Start_time`, `End_time`, `Total_Question`, `Positive_Mark`, `Negative_Mark`) VALUES
(1, 1002, '2016-03-05', '15:00:00', '15:02:00', 40, 4, 1),
(2, 1002, '2016-03-10', '12:00:00', '15:00:00', 40, 4, 1),
(3, 1004, '2016-03-19', '12:00:00', '13:00:00', 30, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `Question_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Question_Name` varchar(500) NOT NULL,
  `Question_Type` varchar(30) NOT NULL,
  `Answer_Option` varchar(200) NOT NULL,
  `Answer` varchar(100) NOT NULL,
  `Question_Desc` varchar(500) NOT NULL,
  `Topic_Id` int(11) NOT NULL,
  `Topic_Name` varchar(30) NOT NULL,
  `Final_Question` tinyint(1) NOT NULL,
  `Exam_Date` varchar(30) NOT NULL,
  PRIMARY KEY (`Question_Id`),
  KEY `Topic_Id` (`Topic_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question_Id`, `Question_Name`, `Question_Type`, `Answer_Option`, `Answer`, `Question_Desc`, `Topic_Id`, `Topic_Name`, `Final_Question`, `Exam_Date`) VALUES
(1, 'Which is not a keyword in java?', 'Single Choice', 'Boolean,static,Integer,String', 'Boolean', 'Tutorials point', 1002, 'Java', 1, '2016-03-10'),
(2, 'What is Garbage collection?', 'Single Choice', 'prevent from wastage of memory,delete unused variable,throw garbage value,garbage collection not implemented', 'Prevent from wastage of memory', 'tutorials ', 1002, 'Java', 1, '2016-03-10'),
(3, 'What is the default value of long variable?', 'Single Choice', '0,0.0,0L,not define', '0L', 'tutorials points', 1002, 'Java', 1, '2016-03-10'),
(4, 'Which method must be implemented by all threads?', 'Single Choice', 'wait(),run(),Stop(),start(', 'run()', 'tutorials point', 1002, 'Java', 1, '2016-03-10'),
(9, 'What is the default value of byte variable?', 'Single Choice', '0,0.0,null,not define', '0', 'tutorials point', 1002, 'Java', 1, '2016-03-10'),
(10, 'Which of the following is Faster, StringBuilder or StringBuffer?', 'Single Choice', 'StringBuilder,StringBuffer,Both of the Above,None of the Above,Nothin', 'StringBuilder', '', 1002, 'Java', 1, '2016-03-10'),
(12, 'Objects are stored on Stack.', 'Single Choice', 'True,False', 'False', 'tutorials Point', 1002, 'Java', 1, '2016-03-10'),
(13, 'What does PHP stand for?', 'Single Choice', 'Personal Hypertext Processor,PHP: Hypertext Preprocessor,Private Home Page', 'PHP: Hypertext Preprocessor', 'W3school', 1004, 'PHP', 1, '2016-03-19'),
(14, 'PHP server scripts are surrounded by delimiters, which?', 'Single Choice', '<?php...?>,<&>...</&>,<?php>...</?>, <script>...</script>', '<?php...?>', 'w3school', 1004, 'PHP', 1, '2016-03-19'),
(15, 'How do you write "Hello World" in PHP', 'Single Choice', '"Hello World";,echo "Hello World";, Document.Write("Hello World");', 'echo "Hello World";', 'w3school', 1004, 'PHP', 1, '2016-03-19'),
(16, 'All variables in PHP start with which symbol?', 'Single Choice', '!,$,&', '$', 'w3school', 1004, 'PHP', 1, '2016-03-19'),
(17, 'What is the correct way to end a PHP statement?', 'Single Choice', ';,.,</php>,NewLine', ';', 'w3school', 1004, 'PHP', 1, '2016-03-19'),
(20, 'Question 1', 'Multiple Choice', 'A,B,C,D,E', 'A,B', 'Sample', 1012, 'C Programing', 0, 'Not Set'),
(21, 'Question 2', 'Multiple Choice', 'U,V,X,Y,Z', 'Z,Y', 'Sample', 1012, 'C Programing', 0, 'Not Set'),
(22, 'What is htmlspecial chars', 'Multiple Choice', 'A,B,C,D,E', 'A,B', 'testing', 1004, 'PHP', 1, '2016-03-19'),
(23, 'C is low level language?', 'Single Choice', 'True,false', 'false', 'Testing', 1012, 'C Programing', 0, 'Not Set'),
(24, 'Question 4', 'Single Choice', 'D,M,R,H', 'D', 'Testing', 1012, 'C Programing', 0, 'Not Set'),
(25, 'Question 5', 'Multiple Choice', 'P,O,I,N,T', 'I,N', 'test', 1012, 'C Programing', 0, 'Not Set');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `Topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Topic_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Topic_id`),
  UNIQUE KEY `Topic_Name` (`Topic_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1014 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`Topic_id`, `Topic_Name`) VALUES
(1009, '.net'),
(1011, 'AnjularJS'),
(1006, 'BOO'),
(1012, 'C Programing'),
(1013, 'Cpp'),
(1002, 'Java'),
(1010, 'JavaScript'),
(1005, 'Pascal'),
(1000, 'Perl'),
(1004, 'PHP'),
(1001, 'Python'),
(1003, 'Ruby');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE IF NOT EXISTS `user1` (
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(10) NOT NULL,
  `city` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`firstname`, `lastname`, `email`, `mobile`, `dob`, `state`, `country`, `city`, `password`, `profile`) VALUES
('ans', 'vis', 'ader@gmail.com', 0, '0000-00-00', '', '', '', 'asd', ''),
('vishal', 'gupta', 'anki345@gmail.com', 8962252508, '2014-01-01', ' Madhya Pradesh', ' India', 'Dabra', 'asd', 'vlcsnap-2016-01-20-00h25m33s138.png'),
('vishal', 'gupta', 'shuvam@gmail.com', 0, '0000-00-00', '', '', '', 'asd', ''),
('vis', 'ans', 'vishalgupta34@gmail.com', 0, '0000-00-00', '', '', '', 'vis', ''),
('vis', 'ans', 'vishalgupta4567@gmail.com', 0, '0000-00-00', '', '', '', 'asw', 'k25.JPG'),
('vishal', 'gupta', 'vishanshul1@gmail.com', 0, '0000-00-00', '', '', '', 'Vis', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `act_status` int(1) NOT NULL COMMENT 'Activation Status = TRUE or FALSE',
  `sequence` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` int(12) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `act_status`, `sequence`, `password`, `firstname`, `lastname`, `email`, `address`, `contact`, `city`, `state`, `country`) VALUES
(29, 'user', 1, '8ff5660c0f394d2f0b7b80bdf9bdcfe32931e561', '123456', 'Embok', 'Ramde', 'embokramde@icloud.com', '', 0, '', '', ''),
(34, 'user', 1, '107e06ee039304bd0cc1165a9d3c58d830303fc8', '98566', 'Da O Hi Paya', 'Lamare', 'lamaredaoyit@yahoo.com', '', 0, '', '', ''),
(35, 'user', 1, '608efacf4aceefe1e6bf3fb604c67da7ea972e4e', '987', 'Vishal', 'Gupta', 'vishalgupta4567@gmail.com', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE IF NOT EXISTS `user_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` varchar(200) NOT NULL,
  `Course_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`Id`, `Answer`, `Course_Name`) VALUES
(1, '["1::opt2","2::opt1","3::opt2","4::opt2","5::opt1","6::opt2,opt3"]', 'PHP'),
(2, '["1::opt1","5::opt1","6::opt5","7::opt2","2::opt3"]', 'Java');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_details`
--
ALTER TABLE `exam_details`
  ADD CONSTRAINT `exam_details_ibfk_1` FOREIGN KEY (`Topic_id`) REFERENCES `topic` (`Topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`Topic_Id`) REFERENCES `topic` (`Topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
