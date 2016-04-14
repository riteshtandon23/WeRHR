-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2016 at 10:30 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `Academic_Result`(IN `qua` VARCHAR(30), IN `pr` VARCHAR(10))
    NO SQL
select Percentage from academic where Qualification=qua AND PercentageRange=pr$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addacademicnAPercentage`(IN `quali` VARCHAR(50), IN `val` VARCHAR(5), IN `Prange` VARCHAR(10), IN `comp` VARCHAR(30))
    NO SQL
insert into academic(Qualification,Percentage,PercentageRange,Company) values(quali,val,Prange,comp)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addAdmin`(IN `Aname` VARCHAR(100), IN `Alname` VARCHAR(100), IN `Apass` VARCHAR(50), IN `type` VARCHAR(20), IN `Acontact` VARCHAR(20), IN `Aaddress` VARCHAR(200), IN `Email` VARCHAR(100))
    NO SQL
insert into we_are_hr_admin(Admin_Name,Admin_Lastname,Admin_password,type,Contact,Address,Email)
values(Aname,Alname,Apass,type,Acontact,Aaddress,Email)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addAgeRangePercentage`(IN `A_range` VARCHAR(20), IN `val` VARCHAR(5), IN `comp` VARCHAR(30))
    NO SQL
insert into age(Age_Range,Percentage,Company) values(A_range,val,comp)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addBackgroundnPercentage`(IN `exp` VARCHAR(100), IN `val` VARCHAR(5), IN `comp` VARCHAR(30))
    NO SQL
insert into background(Experience,Percentage,Company) values(exp,val,comp)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addExam`(IN `T_id` INT(11), IN `E_date` DATE, IN `S_time` TIME, IN `E_time` TIME, IN `T_question` INT(4))
    NO SQL
insert into exam_details(Topic_id,Exam_Date,Start_time,End_time,Total_Question)
values(T_id,E_date,S_time,E_time,T_question)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addQuestion`(IN `Q_Name` VARCHAR(500), IN `Q_Type` VARCHAR(30), IN `A_Option` VARCHAR(300), IN `Ans` VARCHAR(100), IN `Q_Desc` VARCHAR(500), IN `Tid` INT(11), IN `T_Name` VARCHAR(100), IN `P_mark` VARCHAR(5), IN `N_mark` VARCHAR(5))
    NO SQL
insert into question(Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Id,Topic_Name,Positive_Mark,Negative_Mark)
values(Q_Name,Q_Type,A_Option,Ans,Q_Desc,Tid,T_Name,P_mark,N_mark)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTestnPercentage`(IN `Tname` VARCHAR(50), IN `val` VARCHAR(5), IN `comp` VARCHAR(30))
    NO SQL
insert into test_conduct(Test_Name,Percentage,Company) values(Tname,val,comp)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `addTopic`(IN `T_Name` VARCHAR(100))
    NO SQL
insert into topic(Topic_Name) values(T_Name)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `adduserresult`(IN `email` VARCHAR(30), IN `Tscore` VARCHAR(5), IN `TotalQ` INT, IN `CName` VARCHAR(30), IN `Edate` DATE, IN `EName` VARCHAR(30))
    NO SQL
INSERT INTO `userresults`(`users`, `Scores`, `Total`, `Course_Name`, `Exam_Date`, `ExamName`) 
VALUES (email,Tscore,TotalQ,CName,Edate,EName)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AdminPfofilepic`(IN `id` INT(11))
    NO SQL
select Profile_pic
from we_are_hr_admin where A_ID=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AgeRange_Result`(IN `agr` VARCHAR(10))
    NO SQL
select Percentage from age where Age_Range=agr$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Background_Result`(IN `expe` VARCHAR(30))
    NO SQL
select Percentage from background where Experience=expe$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `blockEmployer`(IN `uname` VARCHAR(30), IN `vis` INT(1))
    NO SQL
update employers set act_status=vis where email=uname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `blockuser`(IN `uname` VARCHAR(30), IN `vis` INT(1))
    NO SQL
update users set act_status=vis where email=uname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `countTotalQuestion`(IN `E_Date` DATE, IN `T_Name` VARCHAR(30))
    NO SQL
select count(Exam_Date) as TotalSet from question
where Exam_Date=E_Date AND Topic_Name=T_Name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CountVisibleQuestion`(IN `T_Name` VARCHAR(100))
    NO SQL
select count(Final_Question) as Visible from Question 
where Final_Question=1 AND Topic_Name=T_Name LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ExamTime`(IN `T_id` INT(11))
    NO SQL
select TIMEDIFF(End_time,Start_Time) as Time from exam_details 
where Topic_id=T_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAcademicId`()
    NO SQL
select Academic_id from academic
ORDER BY Academic_id DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getAgeId`()
    NO SQL
select Age_ID from age
ORDER BY Age_ID DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getBackgroundId`()
    NO SQL
select Background_Id from background
ORDER BY Background_Id DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotify`()
    NO SQL
select Topic_id,Exam_Date,Start_Time,End_Time,Total_Question,ID
from exam_details
where Exam_Date > DATE_SUB(CURDATE(),INTERVAL 1 DAY) ORDER BY Exam_Date ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getNotifyWithId`(IN `iddd` INT(11))
    NO SQL
select Topic_id,Exam_Date,Start_Time,End_Time,Total_Question,ID
FROM  exam_details
WHERE ID =iddd$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getQuestion`(IN `C_Name` VARCHAR(100))
    NO SQL
select Question_Name,Question_Type,Answer_Option,Question_Id
from Question where Topic_Id=C_Name AND Final_Question=1
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getTestId`()
    NO SQL
select Test_ID from test_conduct
ORDER BY Test_ID DESC LIMIT 1$$

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

CREATE DEFINER=`root`@`localhost` PROCEDURE `getUserAnswer`(IN `cname` VARCHAR(30))
    NO SQL
select Answer from user_answer where course_name=cname 
ORDER BY Id DESC
LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Profilepic`(IN `eml` VARCHAR(50))
    NO SQL
select Profile_pic
from users where email=eml$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `QuestionforEgeneration`(IN `TName` VARCHAR(100))
    NO SQL
select Question_Id,Topic_Name,Question_Name,Exam_Date,Final_Question
from Question where Topic_Name=TName
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAcademic`()
    NO SQL
select DISTINCT Qualification from academic$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectAddress`(IN `eml` VARCHAR(50))
    NO SQL
select address,city,state,country
from users where email=eml$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAgeRange`()
    NO SQL
select Age_Range from age$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectAgeRangeValue`(IN `Arange` VARCHAR(10))
    NO SQL
select Percentage from Age where Age_Range=Arange$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectBackground`()
    NO SQL
select Experience from Background$$

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
select Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Topic_Name,Positive_Mark,Negative_Mark
from Question
where Question_Id=Opt_id
LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPercentage`(IN `id` VARCHAR(30))
    NO SQL
select PercentageRange from academic where Qualification=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectPwdUnm`(IN `Aid` INT(11), IN `pwd` VARCHAR(100))
    NO SQL
select Admin_Name,Admin_Lastname,Contact,Address,A_ID,type
from we_are_hr_admin where Admin_password=pwd AND A_ID=Aid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectQuestion`()
    NO SQL
select Topic_Name,Question_Name,Question_Type,Answer_Option,Answer,Question_Desc,Question_Id,Final_Question,Positive_Mark,Negative_Mark
from Question
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SelectQuestionAnswer`(IN `C_Name` VARCHAR(30))
    NO SQL
select Question_Type,Answer_Option,Answer
from Question where Topic_Name=C_Name AND Final_Question=1
ORDER BY Question_Id ASC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectTest`()
    NO SQL
select Test_Name from test_conduct$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `selectTotalQuestion`(IN `E_Date` DATE)
    NO SQL
select Total_Question from exam_details 
where Exam_Date=E_Date$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `setParticipant`(IN `uname` VARCHAR(50), IN `examname` VARCHAR(30))
    NO SQL
insert into participant(ExamName,Users) values(examname,uname)$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `setQuesVis`(IN `Q_id` INT(11), IN `Vis` BOOLEAN, IN `Edate` VARCHAR(20))
    NO SQL
update `we_are_hr`.`question` set `Final_Question`=Vis,Exam_Date=Edate
where `question`.Question_Id=Q_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `slectAdminProfile`(IN `aid` INT(11))
    NO SQL
select Admin_Name,Admin_Lastname,Contact,Address,Email
from we_are_hr_admin where A_ID=aid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statuscomp`(IN `uname` VARCHAR(30), IN `stat` VARCHAR(10))
    NO SQL
update employers set Status=stat where email=uname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statususer`(IN `uname` VARCHAR(30), IN `sta` VARCHAR(10))
    NO SQL
update users set Status=sta where email=uname$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `TestName_Result`(IN `tnam` VARCHAR(30))
    NO SQL
select Percentage from test_conduct where Test_Name=tnam$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `unsetParticipant`(IN `uname` VARCHAR(50), IN `ename` VARCHAR(30))
    NO SQL
DELETE from participant where Users=uname AND ExamName=ename$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAdminPassword`(IN `id` INT(11), IN `op` VARCHAR(30), IN `np` VARCHAR(30))
    NO SQL
update we_are_hr_admin set Admin_password=np where A_ID=id AND Admin_password=op$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdateAdminProfile`(IN `id` INT(11), IN `Aname` VARCHAR(100), IN `Alname` VARCHAR(100), IN `contact` VARCHAR(20), IN `address` VARCHAR(200), IN `pic` VARCHAR(50), IN `email` VARCHAR(100))
    NO SQL
update `we_are_hr`.`we_are_hr_admin` set `Admin_Name`=Aname,Admin_Lastname=Alname,Contact=contact,Address=address,Profile_pic=pic,Email=email
where ID=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateExamDetails`(IN `id` INT(11), IN `Edate` DATE, IN `Stime` TIME, IN `Etime` TIME, IN `Tques` INT(11))
    NO SQL
update `we_are_hr`.`exam_details` set `Exam_Date`=Edate,Start_time=Stime,End_time=Etime,Total_Question=Tques
where ID=id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateQuestionAns`(IN `Q_id` INT(11), IN `Q_Name` VARCHAR(500), IN `Q_Type` VARCHAR(30), IN `A_opt` VARCHAR(200), IN `Ans` VARCHAR(100), IN `Q_Desc` VARCHAR(500), IN `T_Name` VARCHAR(30), IN `T_id` INT(11), IN `P_mark` VARCHAR(5), IN `N_mark` VARCHAR(5))
    NO SQL
update `we_are_hr`.`question` set `Question_Name`=Q_Name,Question_Type=Q_Type,Answer_Option=A_opt,Answer=Ans,Question_Desc=Q_Desc,Topic_Name=T_Name,Topic_Id=T_id,Positive_Mark=P_mark,Negative_Mark=N_mark
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
-- Table structure for table `academic`
--

CREATE TABLE IF NOT EXISTS `academic` (
  `Academic_id` int(11) NOT NULL AUTO_INCREMENT,
  `Qualification` varchar(50) NOT NULL,
  `Percentage` varchar(6) NOT NULL,
  `PercentageRange` varchar(10) NOT NULL,
  `Company` varchar(30) NOT NULL,
  PRIMARY KEY (`Academic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `academic`
--

INSERT INTO `academic` (`Academic_id`, `Qualification`, `Percentage`, `PercentageRange`, `Company`) VALUES
(1, 'BCA', '10%', '50-59', 'ABC'),
(2, 'BCA', '15%', '60-69', 'ABC'),
(3, 'BCA', '18%', '70-79', 'ABC'),
(4, 'BCA', '20%', '80-99', 'ABC'),
(5, 'MBA', '10%', '50-59', 'ABC'),
(6, 'BBA', '15%', '60-69', 'ABC'),
(7, 'BBA', '18%', '70-80', 'ABC'),
(8, 'BBA', '20%', '80-99', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `age`
--

CREATE TABLE IF NOT EXISTS `age` (
  `Age_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Age_Range` varchar(20) NOT NULL,
  `Percentage` varchar(6) NOT NULL,
  `Company` varchar(30) NOT NULL,
  PRIMARY KEY (`Age_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `age`
--

INSERT INTO `age` (`Age_ID`, `Age_Range`, `Percentage`, `Company`) VALUES
(1, '18-25', '15%', 'ABC'),
(2, '26-30', '20%', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE IF NOT EXISTS `background` (
  `Background_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Experience` varchar(100) NOT NULL,
  `Percentage` varchar(6) NOT NULL,
  `Company` varchar(30) NOT NULL,
  PRIMARY KEY (`Background_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`Background_Id`, `Experience`, `Percentage`, `Company`) VALUES
(1, 'Experience', '30%', 'ABC'),
(2, 'Fresh', '20%', 'ABC');

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
  `Profile_pic` varchar(50) NOT NULL,
  `reg_date` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`id`, `type`, `act_status`, `sequence`, `password`, `firstname`, `lastname`, `email`, `address`, `contact`, `city`, `state`, `country`, `companyName`, `companyWebsite`, `Profile_pic`, `reg_date`, `Status`) VALUES
(15, 'employer', 1, '695032eb15dea5c8e9836192d3072365ddf1b15c', '123456', 'Embok', 'Ramde', 'smearcampaigner@gmail.com', 'Lovely Professional University, BH 6, Block 54(B),', 1234567890, 'Phagwara', 'Punjab', 'ABC Pvt. Ltd.', 'ABC Pvt. Ltd.', 'abcdev.com', '', '0000-00-00', 'InActive'),
(16, 'employer', 0, '45a21a8045d8e66dc87de342cbba17def92d1156', 'bmw', 'Bmw', 'Bmw', 'bmw@gmail.com', 'Delhi', 2147483647, 'Delhi', 'Delhi', 'India', 'BMW', 'www.bmw.com', 'Bmw_16.jpg', '0000-00-00', 'InActive');

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
  PRIMARY KEY (`ID`),
  KEY `Topic_id` (`Topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `exam_details`
--

INSERT INTO `exam_details` (`ID`, `Topic_id`, `Exam_Date`, `Start_time`, `End_time`, `Total_Question`) VALUES
(1, 1002, '2016-04-14', '10:00:00', '11:00:00', 10),
(2, 1004, '2016-04-14', '10:00:00', '11:00:00', 10),
(3, 1002, '2016-04-14', '10:00:00', '11:00:00', 10),
(4, 1002, '2016-04-14', '10:00:00', '11:00:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `exam_generation`
--

CREATE TABLE IF NOT EXISTS `exam_generation` (
  `course_name` varchar(20) NOT NULL,
  `exam_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `email` text NOT NULL,
  `total_que` int(20) NOT NULL,
  `positive_marks` int(20) NOT NULL,
  `negative_marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_generation`
--

INSERT INTO `exam_generation` (`course_name`, `exam_date`, `start_time`, `end_time`, `email`, `total_que`, `positive_marks`, `negative_marks`) VALUES
('Java', '0000-00-00', '01:20:00', '03:20:00', 'shuvam.jha007@gmail.', 10, 4, 1),
('Java', '0000-00-00', '01:20:00', '03:20:00', 'shuvam.jha007@gmail.', 10, 4, 1),
('Java', '0000-00-00', '01:20:00', '03:20:00', 'shuvam.jha007@gmail.com, vishanshul9@gmail.com', 10, 4, 1),
('Java', '0000-00-00', '01:20:00', '03:20:00', 'shuvam.jha007@gmail.com, vishanshul9@gmail.com', 10, 4, 1),
('Java', '0000-00-00', '01:20:00', '03:20:00', 'shuvam.jha007@gmail.com, vishanshul9@gmail.com', 10, 4, 1),
('Java', '0000-00-00', '11:05:00', '10:30:00', 'vishanshul9@gmail.com, ', 10, 4, 1),
('Java', '0000-00-00', '11:05:00', '10:30:00', 'vishanshul9@gmail.com, ', 10, 4, 1),
('Java', '0000-00-00', '11:05:00', '10:30:00', 'vishanshul9@gmail.com', 10, 4, 1),
('Java', '0000-00-00', '11:05:00', '10:30:00', 'vishanshul9@gmail.com', 10, 4, 1),
('.net', '0000-00-00', '12:15:00', '12:10:00', 'vishanshul9@gmail.com', 10, 4, 1),
('.net', '0000-00-00', '07:30:00', '11:50:00', 'shuvam.jha007@gmail.com', 10, 2, 1),
('.net', '0000-00-00', '07:30:00', '11:50:00', 'shuvam.jha007@gmail.com', 10, 2, 1),
('.net', '0000-00-00', '07:30:00', '11:50:00', 'shuvam.jha007@gmail.com', 10, 2, 1),
('.net', '0000-00-00', '07:30:00', '11:50:00', 'shuvam.jha007@gmail.com', 10, 2, 1),
('.net', '0000-00-00', '07:30:00', '11:50:00', 'shuvam.jha007@gmail.com', 10, 2, 1),
('.net', '0000-00-00', '07:30:00', '11:50:00', 'shuvam.jha007@gmail.com', 10, 2, 1),
('.net', '2016-04-05', '07:30:00', '11:50:00', 'vishanshul9@gmail.com', 10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_name`
--

CREATE TABLE IF NOT EXISTS `exam_name` (
  `name` varchar(20) NOT NULL,
  `topic` varchar(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_name`
--

INSERT INTO `exam_name` (`name`, `topic`, `date`) VALUES
('Java', '2016-03-05', '0000-00-00'),
('PHP', '2016-03-19', '2016-03-19'),
('Java 2016-03-05', 'Java', '2016-03-05'),
('PHP_ 2016-03-19', 'PHP', '2016-03-19'),
('Java_ 2016-03-05', 'Java', '2016-03-05'),
('Java_ 2016-03-05', 'Java', '2016-03-05'),
('Java_ 2016-03-05', 'Java', '2016-03-05');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT,
  `ExamName` varchar(50) NOT NULL,
  `Users` varchar(50) NOT NULL,
  PRIMARY KEY (`SerialNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`SerialNo`, `ExamName`, `Users`) VALUES
(8, 'Java2016-04-16', 'gashminson@gmail.com'),
(9, 'Java2016-04-16', 'lamaredaoyit@yahoo.com'),
(10, 'Java2016-04-16', 'embokramde@icloud.com'),
(11, 'Java2016-04-13', 'lamaredaoyit@yahoo.com'),
(12, 'PHP2016-04-14', 'lamaredaoyit@yahoo.com');

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
  `Positive_Mark` varchar(5) NOT NULL,
  `Negative_Mark` varchar(5) NOT NULL,
  PRIMARY KEY (`Question_Id`),
  KEY `Topic_Id` (`Topic_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Question_Id`, `Question_Name`, `Question_Type`, `Answer_Option`, `Answer`, `Question_Desc`, `Topic_Id`, `Topic_Name`, `Final_Question`, `Exam_Date`, `Positive_Mark`, `Negative_Mark`) VALUES
(1, 'Which is not a keyword in java?', 'Single Choice', 'Boolean,static,Integer,String', 'Boolean', 'Tutorials point', 1002, 'Java', 1, '2016-04-13', '4', '2'),
(2, 'What is Garbage collection?', 'Single Choice', 'Prevent from wastage of memory,delete unused variable,throw garbage value,garbage collection not implemented', 'Prevent from wastage of memory', 'tutorials ', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(3, 'What is the default value of long variable?', 'Single Choice', '0,0.0,0L,not define', '0L', 'tutorials points', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(4, 'Which method must be implemented by all threads?', 'Single Choice', 'wait(),run(),Stop(),start(', 'run()', 'tutorials point', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(9, 'What is the default value of byte variable?', 'Single Choice', '0,0.0,null,not define', '0', 'tutorials point', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(10, 'Which of the following is Faster, StringBuilder or StringBuffer?', 'Single Choice', 'StringBuilder,StringBuffer,Both of the Above,None of the Above,Nothin', 'StringBuilder', '', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(12, 'Objects are stored on Stack.', 'Single Choice', 'True,False', 'False', 'tutorials Point', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(13, 'What does PHP stand for?', 'Single Choice', 'Personal Hypertext Processor,PHP: Hypertext Preprocessor,Private Home Page', 'PHP: Hypertext Preprocessor', 'W3school', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(14, 'PHP server scripts are surrounded by delimiters, which?', 'Single Choice', '<?php...?>,<&>...</&>,<?php>...</?>, <script>...</script>', '<?php...?>', 'w3school', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(15, 'How do you write ', 'Single Choice', 'kkk,echo , Document.Write(', 'echo ', 'w3school', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(16, 'All variables in PHP start with which symbol?', 'Single Choice', '!,$,&', '$', 'w3school', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(17, 'What is the correct way to end a PHP statement?', 'Single Choice', ';,.,<php>,NewLine', ';', 'w3school', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(20, 'Question 1', 'Multiple Choice', 'A,B,C,D,E', 'A,B', 'Sample', 1012, 'CPrograming', 1, '2016-03-19', '4', '1'),
(21, 'Question 2', 'Multiple Choice', 'U,V,X,Y,Z', 'Z,Y', 'Sample', 1012, 'CPrograming', 1, '2016-03-19', '4', '1'),
(22, 'What is htmlspecial chars', 'Multiple Choice', 'A,B,C,D,E', 'A/B', 'testing', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(23, 'C is low level language?', 'Single Choice', 'True,false', 'false', 'Testing', 1012, 'CPrograming', 1, '2016-03-19', '4', '1'),
(24, 'Question 4', 'Multiple Choice', 'D,M,R,H', 'D,M', 'Testing', 1012, 'CPrograming', 1, '2016-03-19', '4', '1'),
(25, 'Question 5', 'Multiple Choice', 'P,O,I,N,T', 'I,N', 'test', 1012, 'CPrograming', 1, '2016-03-19', '4', '1'),
(26, 'A macro can execute faster than a function.', 'Single Choice', 'True,False', 'True', 'Tutorials point', 1012, 'CPrograming', 0, 'Not Set', '4', '1'),
(27, 'The C library function rewind() reposition the file pointer at the begining of the file', 'Single Choice', 'True,False', 'True', 'Tutorials point', 1012, 'CPrograming', 0, 'Not Set', '4', '1'),
(28, 'What is oak?', 'Single Choice', 'Java First Name,Java CEO name,None of the above', 'Java First Name', 'testing', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(29, 'hhhhhhhhhhhhhhh', 'Single Choice', 'a,c', 'a', 'xxx', 1002, 'Java', 0, 'Not Set', '4', '1'),
(30, 'nnnnnnnnnnnnnnnn', 'Single Choice', 'A,x', 'A', 'ddd', 1002, 'Java', 0, 'Not Set', '4', '1'),
(31, 'Question 5', 'Single Choice', 'L,A,V,H', 'L', 'hhhhhhhh', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(32, 'Question 3', 'Single Choice', 'T,F', 'T', 'nnnn', 1002, 'Java', 1, '2016-04-13', '4', '1'),
(33, 'jkjkjkkkkkkkkkkkkkkkkkkkkkkkk', 'Multiple Choice', 'P,A,U,L,S', '/P/A', '', 1002, 'Java', 0, 'Not Set', '4', '1'),
(34, 'KKKKKKKKKKKKKKKKKKKKKKKKKKK', 'Multiple Choice', 'JJ/KK/LL/MM/NN', 'JJ/KK', '', 1002, 'Java', 0, 'Not Set', '4', '1'),
(35, 'MMMMMMMMMMM', 'Multiple Choice', 'H,K,M,N', 'K/H', '', 1004, 'PHP', 1, '2016-04-14', '4', '1'),
(36, 'BBBBBBBBBBBB', 'Multiple Choice', 'M,A,P,S', 'M/A', '', 1004, 'PHP', 1, '2016-04-14', '4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `salarydetails`
--

CREATE TABLE IF NOT EXISTS `salarydetails` (
  `slno` int(11) NOT NULL AUTO_INCREMENT,
  `Roles` varchar(50) NOT NULL,
  `Salary_P_A` varchar(20) NOT NULL,
  `Company` varchar(30) NOT NULL,
  PRIMARY KEY (`slno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `salarydetails`
--

INSERT INTO `salarydetails` (`slno`, `Roles`, `Salary_P_A`, `Company`) VALUES
(1, 'Software Developer/Programer', '8', 'ABC'),
(2, 'System Adminstrator', '6', 'ABC'),
(3, 'System Security Engineer', '12', 'ABC'),
(4, 'Management trainee', '6', 'ABC'),
(5, 'Database Architect Design', '15', 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `test_conduct`
--

CREATE TABLE IF NOT EXISTS `test_conduct` (
  `Test_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Test_Name` varchar(50) NOT NULL,
  `Percentage` varchar(6) NOT NULL,
  `Company` varchar(30) NOT NULL,
  PRIMARY KEY (`Test_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `test_conduct`
--

INSERT INTO `test_conduct` (`Test_ID`, `Test_Name`, `Percentage`, `Company`) VALUES
(1, 'Test1', '20%', 'ABC'),
(2, 'Test2', '20%', 'ABC');

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
(1013, 'Cpp'),
(1012, 'CPrograming'),
(1002, 'Java'),
(1010, 'JavaScript'),
(1005, 'Pascal'),
(1000, 'Perl'),
(1004, 'PHP'),
(1001, 'Python'),
(1003, 'Ruby');

-- --------------------------------------------------------

--
-- Table structure for table `userresults`
--

CREATE TABLE IF NOT EXISTS `userresults` (
  `SerialNo` int(11) NOT NULL AUTO_INCREMENT,
  `users` varchar(50) NOT NULL,
  `Scores` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Course_Name` varchar(30) NOT NULL,
  `Exam_Date` date NOT NULL,
  `ExamName` varchar(30) NOT NULL,
  PRIMARY KEY (`SerialNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `userresults`
--

INSERT INTO `userresults` (`SerialNo`, `users`, `Scores`, `Total`, `Course_Name`, `Exam_Date`, `ExamName`) VALUES
(1, 'lamaredaoyit@yahoo.com', 8, 10, 'Java', '2016-04-16', 'Test1'),
(3, 'lamaredaoyit@yahoo.com', 8, 10, 'Java', '2016-04-13', 'Java2016-04-13'),
(4, 'lamaredaoyit@yahoo.com', 2, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(5, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(6, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(7, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(8, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(9, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(10, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(11, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(12, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(13, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(14, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(15, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(16, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(17, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(18, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(19, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(20, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(21, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(22, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(23, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(24, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(25, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(26, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(27, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(28, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(29, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(30, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(31, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(32, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(33, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(34, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(35, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(36, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(37, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(38, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(39, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(40, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(41, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(42, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(43, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(44, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(45, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(46, 'lamaredaoyit@yahoo.com', 0, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(47, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(48, 'lamaredaoyit@yahoo.com', 7, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(49, 'lamaredaoyit@yahoo.com', 3, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(50, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(51, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14'),
(52, 'lamaredaoyit@yahoo.com', 1, 8, 'PHP', '2016-04-14', 'PHP2016-04-14');

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
  `DOB` date NOT NULL,
  `address` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `Profile_pic` varchar(100) NOT NULL,
  `reg_date` date NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `act_status`, `sequence`, `password`, `firstname`, `lastname`, `email`, `DOB`, `address`, `contact`, `city`, `state`, `country`, `Profile_pic`, `reg_date`, `Status`) VALUES
(29, 'user', 1, '8ff5660c0f394d2f0b7b80bdf9bdcfe32931e561', '123456', 'Embok', 'Ramde', 'embokramde@icloud.com', '0000-00-00', '', '0', '', '', '', '', '2016-04-03', 'InActive'),
(40, 'user', 1, 'ba188fc5cf2da4d626c131e0be3a1c6999c5ce7b', '123', 'John', 'Nongbri', 'aamm@yahoo.com', '0000-00-00', '', '', '', '', '', '', '2016-03-31', 'InActive'),
(41, 'user', 1, '107e06ee039304bd0cc1165a9d3c58d830303fc8', '9856600758', 'Da O Hi Paya', 'Lamare', 'lamaredaoyit@yahoo.com', '1991-11-22', 'Raliang Village', '9856600758', 'Shillong', ' Meghalaya', ' India', 'Untitled-1.jpg', '2016-03-27', 'InActive'),
(42, 'user', 1, '47456a42ddf5b9c4bf9cd2b40ac0c886d833cfd8', 'testtest', 'John', 'John', 'riteshtandon23@gmail.com', '1981-10-09', 'jalandhar', '934934943934', 'Jalandhar', ' Punjab', ' India', '010.jpg', '2016-04-01', 'InActive'),
(43, 'user', 1, '161e614271a67707c07643f42d1c1a62769bd2eb', '123456', 'Mahesh', 'Lamin', 'gashminson@gmail.com', '1992-12-06', '', '', '', '', '', '', '2016-04-05', 'InActive');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE IF NOT EXISTS `user_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Answer` varchar(200) NOT NULL,
  `Course_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`Id`, `Answer`, `Course_Name`) VALUES
(1, '1::opt1,2::opt1,3::opt3,4::opt2,5::opt1,6::opt1,7::opt2,8::opt1', 'Java'),
(2, '1::opt1,2::opt1,3::opt3,4::opt2,5::opt1,6::opt1,7::opt2,8::opt1', 'Java'),
(3, '6::opt1/opt2,7::opt1/opt2,8::opt1/opt2', 'PHP'),
(4, '6::opt1/opt2', 'PHP'),
(5, '6::opt2/opt1,7::opt1/opt2', 'PHP'),
(6, '6::opt2/opt1', 'PHP'),
(7, '1::opt2,2::opt1,3::opt2,4::opt2,5::opt1,6::opt1/opt2,7::opt1/opt2', 'PHP'),
(8, '6::opt2/opt1,7::opt1/opt2,8::opt2/opt1', 'PHP'),
(9, '6::opt1/opt2,7::opt1/opt2,8::opt3/opt4', 'PHP');

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

CREATE TABLE IF NOT EXISTS `user_courses` (
  `username` varchar(80) NOT NULL,
  `courses` varchar(2000) NOT NULL,
  `total_courses` int(100) NOT NULL,
  `courses_id` varchar(200) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_courses`
--

INSERT INTO `user_courses` (`username`, `courses`, `total_courses`, `courses_id`) VALUES
('gashminson@gmail.com', 'PHP#CPrograming#Java', 3, '1004#1012#1002#'),
('lamaredaoyit@yahoo.com', 'PHP#Pascal#.net#Java', 3, '100#100#100');

-- --------------------------------------------------------

--
-- Table structure for table `user_data_foralgo`
--

CREATE TABLE IF NOT EXISTS `user_data_foralgo` (
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Academics` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `Percentage` int(100) NOT NULL,
  `Background` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_data_foralgo`
--

INSERT INTO `user_data_foralgo` (`username`, `Academics`, `Percentage`, `Background`) VALUES
('lamaredaoyit@yahoo.com', 'BCA', 55, 'Fresh');

-- --------------------------------------------------------

--
-- Table structure for table `we_are_hr_admin`
--

CREATE TABLE IF NOT EXISTS `we_are_hr_admin` (
  `A_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(100) NOT NULL,
  `Admin_Lastname` varchar(100) NOT NULL,
  `Admin_password` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Profile_pic` varchar(50) NOT NULL,
  PRIMARY KEY (`A_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10801 ;

--
-- Dumping data for table `we_are_hr_admin`
--

INSERT INTO `we_are_hr_admin` (`A_ID`, `Admin_Name`, `Admin_Lastname`, `Admin_password`, `type`, `Contact`, `Address`, `Email`, `Profile_pic`) VALUES
(10800, 'Da O Hi Paya', 'Lamare', 'Admini', 'Admin', '9856600758', 'Raliang village', 'lamaredaoyit@yahoo.com', '10800.jpg');

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
