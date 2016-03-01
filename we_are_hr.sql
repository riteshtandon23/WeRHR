-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2016 at 04:54 AM
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
insert into exam_details
values(T_id,E_date,S_time,E_time,T_question,P_mark,N_mark)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addQuestion`(IN `Q_Name` VARCHAR(500), IN `Q_Type` VARCHAR(30), IN `A_Option` VARCHAR(300), IN `Ans` VARCHAR(100), IN `Q_Desc` VARCHAR(500), IN `Tid` INT(11), IN `T_Name` VARCHAR(100))
    NO SQL
insert into question(Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Id,Topic_Name)
values(Q_Name,Q_Type,A_Option,Ans,Q_Desc,Tid,T_Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTopic`(IN `T_Name` VARCHAR(100))
    NO SQL
insert into topic(Topic_Name) values(T_Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ExamTime`(IN `T_id` INT(11))
    NO SQL
select TIMEDIFF(End_time,Start_Time) as Time from exam_details 
where Topic_id=T_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getQuestion`(IN `C_Name` VARCHAR(100))
    NO SQL
select Question_Name,Question_Type,Answer_Option,Question_Id
from Question where Topic_Id=C_Name
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTopic`()
    NO SQL
select topic_Name from topic$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTopicid`(IN `T_Name` VARCHAR(30))
    NO SQL
select Topic_id from topic where Topic_Name=T_Name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectOption`(IN `Opt_id` INT(11))
    NO SQL
select Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Name
from Question
where Question_Id=Opt_id
LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectQuestion`()
    NO SQL
select Topic_Name,Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Question_Id
from Question
ORDER BY Question_Id ASC$$

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
-- Table structure for table `exam_details`
--

CREATE TABLE IF NOT EXISTS `exam_details` (
  `Topic_id` int(11) NOT NULL,
  `Exam_Date` date NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL,
  `Total_Question` int(4) NOT NULL,
  `Positive_Mark` int(4) NOT NULL,
  `Negative_Mark` int(4) NOT NULL,
  KEY `Topic_id` (`Topic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`Topic_id`, `Exam_Date`, `Start_time`, `End_time`, `Total_Question`, `Positive_Mark`, `Negative_Mark`) VALUES
(1002, '2016-02-26', '12:00:00', '12:02:00', 40, 4, 1),
(1004, '2016-02-27', '15:00:00', '15:01:00', 10, 4, 1),
(1012, '2016-03-03', '15:00:00', '15:01:00', 2, 4, 1);

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
  PRIMARY KEY (`Question_Id`),
  KEY `Topic_Id` (`Topic_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question_Id`, `Question_Name`, `Question_Type`, `Answer_Option`, `Answer`, `Question_Desc`, `Topic_Id`, `Topic_Name`) VALUES
(1, 'Which is not a keyword in java?', 'Single Choice', 'Boolean,static,Integer,String', 'Boolean', 'Tutorials point', 1002, 'Java'),
(2, 'What is Garbage collection?', 'Single Choice', 'prevent from wastage of memory,delete unused variable,throw garbage value,garbage collection not implemented', 'Prevent from wastage of memory', 'tutorials ', 1002, 'Java'),
(3, 'What is the default value of long variable?', 'Single Choice', '0,0.0,0L,not define', '0L', 'tutorials points', 1002, 'Java'),
(4, 'Which method must be implemented by all threads?', 'Single Choice', 'wait(),run(),Stop(),start(', 'run()', 'tutorials point', 1002, 'Java'),
(9, 'What is the default value of byte variable?', 'Single Choice', '0,0.0,null,not define', '0', 'tutorials point', 1002, 'Java'),
(10, 'Which of the following is Faster, StringBuilder or StringBuffer?', 'Single Choice', 'StringBuilder,StringBuffer,Both of the Above,None of the Above,Nothin', 'StringBuilder', '', 1002, 'Java'),
(12, 'Objects are stored on Stack.', 'Single Choice', 'True,False', 'False', 'tutorials Point', 1002, 'Java'),
(13, 'What does PHP stand for?', 'Single Choice', 'Personal Hypertext Processor,PHP: Hypertext Preprocessor,Private Home Page', 'PHP: Hypertext Preprocessor', 'W3school', 1004, 'PHP'),
(14, 'PHP server scripts are surrounded by delimiters, which?', 'Single Choice', '<?php...?>,<&>...</&>,<?php>...</?>, <script>...</script>', '<?php...?>', 'w3school', 1004, 'PHP'),
(15, 'How do you write "Hello World" in PHP', 'Single Choice', '"Hello World";,echo "Hello World";, Document.Write("Hello World");', 'echo "Hello World";', 'w3school', 1004, 'PHP'),
(16, 'All variables in PHP start with which symbol?', 'Single Choice', '!,$,&', '$', 'w3school', 1004, 'PHP'),
(17, 'What is the correct way to end a PHP statement?', 'Single Choice', ';,.,</php>,NewLine', ';', 'w3school', 1004, 'PHP'),
(20, 'Question 1', 'Multiple Choice', 'A,B,C,D,E', 'A,B', 'Sample', 1012, 'C Programing'),
(21, 'Question 2', 'Multiple Choice', 'U,V,X,Y,Z', 'Z,Y', 'Sample', 1012, 'C Programing'),
(22, 'What is htmlspecial chars', 'Multiple Choice', 'A,B,C,D,E', 'A,B', 'testing', 1004, 'PHP'),
(23, 'C is low level language?', 'Single Choice', 'True,false', 'false', 'Testing', 1012, 'C Programing');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE IF NOT EXISTS `topic` (
  `Topic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Topic_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Topic_id`),
  UNIQUE KEY `Topic_Name` (`Topic_Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1013 ;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`Topic_id`, `Topic_Name`) VALUES
(1009, '.net'),
(1011, 'AnjularJS'),
(1006, 'BOO'),
(1012, 'C Programing'),
(1008, 'C++'),
(1002, 'Java'),
(1010, 'JavaScript'),
(1005, 'Pascal'),
(1000, 'Perl'),
(1004, 'PHP'),
(1001, 'Python'),
(1003, 'Ruby');

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
(1, '["0::opt0"]', 'PHP'),
(2, 'null', 'PHP');

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
