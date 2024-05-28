-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 11:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collegemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(10) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `adminname`, `loginid`, `password`, `usertype`, `status`) VALUES
(1, 'Raj Mahesh kiran', 'admin', 'adminadminadmin', 'Admin', 'Active'),
(5, 'madam', '145', '456789', 'Employee', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(10) NOT NULL,
  `attendancetype` varchar(20) NOT NULL,
  `studentid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `attendancedate` date NOT NULL,
  `remark` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `attendancetype`, `studentid`, `subjectid`, `attendancedate`, `remark`, `status`) VALUES
(130, 'Present', 1, 7, '2018-03-07', 'hi', 'Active'),
(131, 'Present', 2, 7, '2018-03-07', 'fine', 'Active'),
(132, 'Present', 3, 7, '2018-03-07', '', 'Active'),
(133, 'Present', 25, 7, '2018-03-07', '', 'Active'),
(134, 'Present', 26, 7, '2018-03-07', '', 'Active'),
(135, 'Present', 27, 7, '2018-03-07', '', 'Active'),
(136, 'Present', 28, 7, '2018-03-07', '', 'Active'),
(137, 'Present', 29, 7, '2018-03-07', '', 'Active'),
(138, 'Present', 30, 7, '2018-03-07', '', 'Active'),
(139, 'Present', 31, 7, '2018-03-07', '', 'Active'),
(140, 'Present', 32, 7, '2018-03-07', '', 'Active'),
(141, 'Present', 33, 7, '2018-03-07', '', 'Active'),
(142, 'Present', 34, 7, '2018-03-07', '', 'Active'),
(143, 'Present', 35, 7, '2018-03-07', '', 'Active'),
(144, 'Present', 36, 7, '2018-03-07', '', 'Active'),
(145, 'Present', 37, 7, '2018-03-07', '', 'Active'),
(146, 'Present', 38, 7, '2018-03-07', '', 'Active'),
(147, 'Present', 39, 7, '2018-03-07', '', 'Active'),
(148, 'Present', 40, 7, '2018-03-07', '', 'Active'),
(149, 'Present', 41, 7, '2018-03-07', '', 'Active'),
(150, 'Present', 42, 7, '2018-03-07', '', 'Active'),
(151, 'Present', 43, 7, '2018-03-07', '', 'Active'),
(380, 'Present', 40, 7, '2018-02-07', 'Hi', 'Active'),
(381, 'Present', 41, 7, '2018-02-07', 'Hello', 'Active'),
(382, 'Absent', 42, 7, '2018-02-07', 'How you', 'Active'),
(383, 'Absent', 43, 7, '2018-02-07', 'Fine', 'Active'),
(388, 'Present', 40, 7, '2018-02-01', '', 'Active'),
(389, 'Absent', 41, 7, '2018-02-01', '', 'Active'),
(390, 'Present', 42, 7, '2018-02-01', '', 'Active'),
(391, 'Present', 43, 7, '2018-02-01', '', 'Active'),
(396, 'Present', 40, 7, '2018-02-05', '', 'Active'),
(397, 'Present', 41, 7, '2018-02-05', '', 'Active'),
(398, 'Present', 42, 7, '2018-02-05', '', 'Active'),
(399, 'Present', 43, 7, '2018-02-05', '', 'Active'),
(414, 'Present', 44, 0, '2018-02-19', '', 'Active'),
(415, 'Present', 25, 8, '2018-02-19', '', 'Active'),
(416, 'Present', 35, 8, '2018-02-19', '', 'Active'),
(417, 'Present', 40, 8, '2018-02-19', '', 'Active'),
(418, 'Present', 41, 8, '2018-02-19', '', 'Active'),
(419, 'Present', 42, 8, '2018-02-19', '', 'Active'),
(420, 'Present', 43, 8, '2018-02-19', '', 'Active'),
(421, 'Absent', 38, 12, '2018-03-05', 'fever', 'Active'),
(422, 'Present', 39, 12, '2018-03-05', '', 'Active'),
(423, 'Present', 40, 12, '2018-03-05', '', 'Active'),
(424, 'Present', 41, 12, '2018-03-05', '', 'Active'),
(425, 'Present', 42, 12, '2018-03-05', '', 'Active'),
(426, 'Present', 43, 12, '2018-03-05', '', 'Active'),
(427, 'Present', 45, 12, '2018-03-05', '', 'Active'),
(477, 'Present', 38, 12, '2018-03-07', 'ab', 'Active'),
(478, 'Present', 39, 12, '2018-03-07', 'c', 'Active'),
(479, 'Present', 40, 12, '2018-03-07', 'd', 'Active'),
(480, 'Present', 41, 12, '2018-03-07', 'e', 'Active'),
(481, 'Present', 42, 12, '2018-03-07', '', 'Active'),
(482, 'Present', 43, 12, '2018-03-07', 'ff', 'Active'),
(483, 'Present', 45, 12, '2018-03-07', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(10) NOT NULL,
  `course` varchar(24) NOT NULL,
  `coursedescription` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `course`, `coursedescription`, `status`) VALUES
(1, 'MBA', 'MBA', 'Active'),
(2, 'BCA', 'MBA', 'Active'),
(3, 'MTech', 'MBA', 'Active'),
(4, 'BTech', 'MBA', 'Active'),
(5, 'BE', 'MBA', 'Active'),
(6, 'bca', 'jag war', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussionid` int(10) NOT NULL,
  `studentid` int(10) NOT NULL,
  `notesid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `discussiontitle` varchar(1000) NOT NULL,
  `discussionmsg` text NOT NULL,
  `datetime` datetime NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussionid`, `studentid`, `notesid`, `subjectid`, `discussiontitle`, `discussionmsg`, `datetime`, `status`) VALUES
(1, 1, 1, 5, 'Test discussion title', 'Test discussion message', '0000-00-00 00:00:00', 'Active'),
(2, 1, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:09:15', 'Active'),
(3, 1, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:14:17', 'Active'),
(4, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:15:24', 'Active'),
(5, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:16:54', 'Active'),
(6, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:24:57', 'Active'),
(7, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:25:42', 'Active'),
(8, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:29:22', 'Active'),
(9, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:29:40', 'Active'),
(10, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:30:26', 'Active'),
(11, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:30:48', 'Active'),
(12, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:32:05', 'Active'),
(13, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:32:16', 'Active'),
(14, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:32:57', 'Active'),
(15, 40, 9, 0, 'Test discussion title', 'Test discussion message', '2018-01-16 23:33:29', 'Active'),
(16, 25, 16, 7, 'wdwd', 'wd', '2017-12-19 00:00:00', 'Active'),
(17, 0, 0, 0, '', '', '2018-02-22 18:24:03', 'Active'),
(18, 45, 13, 0, '', '', '2018-03-05 18:25:33', 'Active'),
(19, 45, 2, 0, 'test title', 'test msg', '2018-03-07 09:49:16', 'Active'),
(20, 46, 2, 0, 'simply', 'simply AM JOBLESS', '2018-03-07 11:58:12', 'Active'),
(21, 0, 0, 6, '', '', '0000-00-00 00:00:00', ''),
(22, 0, 0, 6, '', '', '0000-00-00 00:00:00', 'Plan'),
(23, 0, 0, 6, '', '', '0000-00-00 00:00:00', 'SPlan'),
(24, 0, 0, 6, '', 'Hi test welcome abc xyz', '2018-03-01 00:00:00', 'SPlan'),
(25, 0, 0, 6, '', 'Hi test welcome abc xyz', '2018-03-01 00:00:00', 'SPlan'),
(29, 2, 1, 6, 'Hello', 'Hi test welcome abc xyz abcd', '2018-03-01 00:00:00', 'SPlan'),
(33, 2, 1, 6, 'abc', 'We Provide a link to Home Based Online Jobs suited to people who are looking for an easy way to start and generate a steady & significant income every month. We have helped thousands of people like you, who want to work from home and be in control of their own financial success. You do not need to have any previous experience and there is no special software or hardware required for these jobs Suggested by us.', '2018-05-01 00:00:00', 'SPlan'),
(34, 2, 1, 6, 'abc completed', 'abc xyz', '2018-04-01 00:00:00', 'SPlan');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_reply`
--

CREATE TABLE `discussion_reply` (
  `discussion_replyid` int(10) NOT NULL,
  `discussion_id` int(10) NOT NULL,
  `studentid` int(10) NOT NULL,
  `facultyid` int(10) NOT NULL,
  `discussionreply` text NOT NULL,
  `datetime` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion_reply`
--

INSERT INTO `discussion_reply` (`discussion_replyid`, `discussion_id`, `studentid`, `facultyid`, `discussionreply`, `datetime`, `status`) VALUES
(1, 0, 0, 0, '', '0000-00-00', ''),
(2, 0, 0, 0, '', '0000-00-00', ''),
(3, 0, 0, 0, 'test', '0000-00-00', ''),
(4, 0, 0, 0, 'test', '2018-01-17', 'Active'),
(5, 0, 40, 0, 'test', '2018-01-17', 'Active'),
(6, 0, 40, 0, 'test', '2018-01-17', 'Active'),
(7, 0, 40, 0, 'Test message reply', '2018-01-17', 'Active'),
(8, 0, 40, 0, 'Test message reply', '2018-01-17', 'Active'),
(9, 0, 40, 0, 'Test message reply', '2018-01-17', 'Active'),
(10, 0, 40, 0, 'Test message reply', '2018-01-17', 'Active'),
(11, 0, 40, 0, 'Test message reply', '2018-01-17', 'Active'),
(12, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(13, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(14, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(15, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(16, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(17, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(18, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(19, 1, 40, 0, 'Hello Test message', '2018-01-17', 'Active'),
(20, 1, 40, 0, '', '2018-01-24', 'Active'),
(21, 1, 40, 0, '', '2018-01-24', 'Active'),
(22, 1, 40, 0, '', '2018-01-24', 'Active'),
(23, 1, 40, 0, '', '2018-01-24', 'Active'),
(24, 0, 26, 6, ',,,,,,nnnnnnnnnnnnnn', '2017-12-19', 'Active'),
(25, 0, 26, 6, ',,,,,,nnnnnnnnnnnnnn', '2017-12-19', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `examid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `examdttim` datetime NOT NULL,
  `examtype` varchar(25) NOT NULL,
  `note` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`examid`, `courseid`, `semester`, `subjectid`, `examdttim`, `examtype`, `note`, `status`) VALUES
(102, 2, 2, 12, '2018-04-01 09:23:00', 'Semester', 'u have to pass', 'Active'),
(103, 2, 2, 16, '2018-04-02 10:22:00', 'Semester', 'u have to pass', 'Active'),
(104, 2, 2, 17, '2018-04-03 11:25:00', 'Semester', 'u have to pass', 'Active'),
(105, 2, 1, 6, '2022-05-17 01:00:00', 'First Internal', '', 'Active'),
(106, 2, 1, 7, '2022-05-17 01:00:00', 'First Internal', '', 'Active'),
(107, 2, 1, 8, '2022-05-17 01:00:00', 'First Internal', '', 'Active'),
(108, 2, 1, 9, '2022-05-17 01:00:00', 'First Internal', '', 'Active'),
(109, 2, 1, 10, '2022-05-17 01:00:00', 'First Internal', '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `exam_result`
--

CREATE TABLE `exam_result` (
  `exam_resultid` int(10) NOT NULL,
  `examid` int(10) NOT NULL,
  `studentid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `maxinternalmark` float(10,2) NOT NULL,
  `scoredinternalmark` float(10,2) NOT NULL,
  `maxextmark` float(10,2) NOT NULL,
  `scoredextmark` float(10,2) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_result`
--

INSERT INTO `exam_result` (`exam_resultid`, `examid`, `studentid`, `subjectid`, `maxinternalmark`, `scoredinternalmark`, `maxextmark`, `scoredextmark`, `remarks`, `status`) VALUES
(1027, 105, 45, 6, 100.00, 50.00, 0.00, 0.00, '', 'Active'),
(1028, 105, 45, 7, 100.00, 75.00, 0.00, 0.00, '', 'Active'),
(1029, 105, 45, 8, 100.00, 35.00, 0.00, 0.00, '', 'Active'),
(1030, 105, 45, 9, 100.00, 25.00, 0.00, 0.00, '', 'Active'),
(1031, 105, 45, 10, 100.00, 33.00, 0.00, 0.00, '', 'Active'),
(1032, 105, 46, 6, 100.00, 75.00, 0.00, 0.00, '', 'Active'),
(1033, 105, 46, 7, 100.00, 85.00, 0.00, 0.00, '', 'Active'),
(1034, 105, 46, 8, 100.00, 95.00, 0.00, 0.00, '', 'Active'),
(1035, 105, 46, 9, 100.00, 96.00, 0.00, 0.00, '', 'Active'),
(1036, 105, 46, 10, 100.00, 97.00, 0.00, 0.00, '', 'Active'),
(1037, 105, 47, 6, 100.00, 90.00, 0.00, 0.00, '', 'Active'),
(1038, 105, 47, 7, 100.00, 95.00, 0.00, 0.00, '', 'Active'),
(1039, 105, 47, 8, 100.00, 50.00, 0.00, 0.00, '', 'Active'),
(1040, 105, 47, 9, 100.00, 75.00, 0.00, 0.00, '', 'Active'),
(1041, 105, 47, 10, 100.00, 43.00, 0.00, 0.00, '', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyid` int(100) NOT NULL,
  `facultyname` varchar(50) NOT NULL,
  `facultycode` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyid`, `facultyname`, `facultycode`, `password`, `emailid`, `contactno`, `gender`, `img`, `status`) VALUES
(6, 'Raj kiran', '1001', '100110011001', 'raj@studentprojects.live', '7894561230', 'Male', '1623911673df.jpg', 'Active'),
(7, 'Mahesh kiran', '1002', '100210021002', 'maheshkiran@studentprojects.li', '9874563210', 'Male', 'heeloo.png', 'Active'),
(8, 'Peter', '1003', '100310031003', 'peter@studentprojects.live', '9638527410', 'Male', '20198images.jpg', 'Active'),
(9, 'Nishanth', '1004', '100410041004', 'nishanth@gmail.com', '9856321470', 'Female', '26113', 'Active'),
(10, 'Vinyas', '1005', '100510051005', 'vinyas@gmail.com', '9887456213', 'Female', '2893', 'Active'),
(11, 'Preethi', '1006', '100610061006', 'preethi@gmail.com', '9630258741', 'Female', '30210WIN_20170813_22_04_57_Pro.jpg', 'Active'),
(12, 'Meena', '1007', '100710071007', 'meena@studentprojects.live', '9658741236', 'Female', '1767WIN_20170813_22_04_57_Pro.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackid` int(10) NOT NULL,
  `studentid` int(10) NOT NULL,
  `facultyid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `feedback` text NOT NULL,
  `rating` float(10,1) NOT NULL,
  `feedbackdate` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackid`, `studentid`, `facultyid`, `subjectid`, `feedback`, `rating`, `feedbackdate`, `status`) VALUES
(22, 45, 6, 12, 'i hate this class', 65.0, '2018-03-10', 'Active'),
(23, 45, 8, 0, 'php is not good', 62.0, '2018-03-10', 'Active'),
(24, 45, 0, 0, 'dont learn php', 0.0, '2018-03-10', 'Active'),
(25, 45, 0, 0, 'Hello how ar yo', 0.0, '2018-03-10', 'Active'),
(26, 45, 6, 16, 'fine', 50.0, '2018-03-10', 'Active'),
(27, 45, 6, 12, 'Hello feed back record', 61.0, '2018-03-14', 'Active'),
(28, 45, 6, 12, 'Hello feed back record', 61.0, '2018-03-14', 'Active'),
(29, 45, 6, 12, 'Hello feed back record', 61.0, '2018-03-14', 'Active'),
(30, 45, 6, 12, 'Hello feed back record', 61.0, '2018-03-14', 'Active'),
(31, 45, 6, 12, 'Hello feed back record', 61.0, '2018-03-14', 'Active'),
(32, 47, 6, 0, 'test record', 61.0, '2018-03-14', 'Active'),
(33, 47, 11, 0, 'test', 72.0, '2018-03-14', 'Active'),
(34, 47, 11, 0, 'test', 72.0, '2018-03-14', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fees_payment`
--

CREATE TABLE `fees_payment` (
  `fees_payment_id` bigint(20) NOT NULL,
  `studentid` bigint(20) DEFAULT NULL,
  `courseid` bigint(20) DEFAULT NULL,
  `semesterid` bigint(20) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `total_amt` double NOT NULL,
  `paid_amt` double DEFAULT NULL,
  `payment_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees_payment`
--

INSERT INTO `fees_payment` (`fees_payment_id`, `studentid`, `courseid`, `semesterid`, `payment_date`, `total_amt`, `paid_amt`, `payment_detail`) VALUES
(1, 48, 2, 1, '2022-08-05', 11900, 900, 'a:4:{s:11:\"card_holder\";s:4:\"Raja\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"158\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(2, 48, 2, 1, '2022-08-05', 11000, 1000, 'a:4:{s:11:\"card_holder\";s:4:\"Raja\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"158\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(3, 48, 2, 1, '2022-08-05', 10000, 500, 'a:4:{s:11:\"card_holder\";s:3:\"Raj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"115\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(4, 48, 2, 1, '2022-08-05', 9500, 5000, 'a:4:{s:11:\"card_holder\";s:3:\"Raj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"158\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(5, 3, 2, 2, '2022-08-06', 10000, 250, 'a:4:{s:11:\"card_holder\";s:3:\"Raj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"186\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(6, 48, 2, 1, '2022-08-06', 4500, 1000, 'a:4:{s:11:\"card_holder\";s:4:\"RTaj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"268\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(7, 3, 2, 2, '2022-08-06', 9750, 9750, 'a:4:{s:11:\"card_holder\";s:3:\"Raj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"158\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(8, 2, 2, 2, '2022-08-06', 10000, 5000, 'a:4:{s:11:\"card_holder\";s:3:\"Raj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"158\";s:11:\"expiry_date\";s:7:\"2023-01\";}'),
(9, 25, 2, 2, '2022-08-06', 10000, 10000, 'a:4:{s:11:\"card_holder\";s:3:\"Raj\";s:11:\"card_number\";s:16:\"1234567890123456\";s:10:\"cvv_number\";s:3:\"158\";s:11:\"expiry_date\";s:7:\"2023-01\";}');

-- --------------------------------------------------------

--
-- Table structure for table `fees_setting`
--

CREATE TABLE `fees_setting` (
  `fees_setting_id` bigint(20) NOT NULL,
  `courseid` bigint(20) DEFAULT NULL,
  `semesterid` int(11) DEFAULT NULL,
  `fees_type` varchar(255) DEFAULT NULL,
  `fees_amt` double NOT NULL DEFAULT 0,
  `fees_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees_setting`
--

INSERT INTO `fees_setting` (`fees_setting_id`, `courseid`, `semesterid`, `fees_type`, `fees_amt`, `fees_status`) VALUES
(1, 2, 1, 'Admission Fee', 10000, 'Active'),
(2, 2, 1, 'Tution Fee', 1500, 'Active'),
(3, 2, 1, 'Exam Fee', 400, 'Active'),
(4, 2, 2, 'Admission Fee', 10000, 'Deleted'),
(5, 2, 1, 'Sports Fee', 500, 'Deleted'),
(6, 2, 1, 'Entertainment Fee', 1000, 'Inactive'),
(7, 2, 2, 'Admission Fee', 10000, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `mail_setting`
--

CREATE TABLE `mail_setting` (
  `settingid` int(10) NOT NULL,
  `settingtype` varchar(25) NOT NULL,
  `settingdetails` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_setting`
--

INSERT INTO `mail_setting` (`settingid`, `settingtype`, `settingdetails`, `status`) VALUES
(0, 'SMTP', 'a:5:{s:10:\"mailsender\";s:7:\"CMS24X7\";s:10:\"smtpserver\";s:22:\"mail.projectmailer.xyz\";s:8:\"smtpport\";s:3:\"587\";s:7:\"loginid\";s:21:\"cms@projectmailer.xyz\";s:8:\"password\";s:12:\"Y51_Jx$rQQb-\";}', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `notesid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `notestitle` varchar(100) NOT NULL,
  `notes` text NOT NULL,
  `document` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`notesid`, `subjectid`, `notestitle`, `notes`, `document`, `status`) VALUES
(1, 1, '0', 'test', 'abc', 'Active'),
(2, 6, 'Hello notes', '<p>Hello description</p>', 'Koala.jpg', 'Active'),
(3, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(4, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(5, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(6, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(7, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(8, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(9, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(10, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(11, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(12, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(13, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(14, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(15, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(16, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(17, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(18, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(19, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(20, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(21, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(22, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(23, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(24, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(25, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(26, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(27, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(28, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(29, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(30, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(31, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(32, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(33, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(34, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(35, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(36, 6, 'Db notes', '<p>db descriptionTest cricket is the longest form of the sport of cricket and is considered its highest standard. Test matches are played between national representative teams with \"Test status\", as determined and conferred by the International Cricket Council.&nbsp;</p>', '25828db.doc', 'Active'),
(37, 7, 'hlo', 'bbsn nnsnm nmx ksxk xkx  nx m', '28973', 'Active'),
(38, 7, 'hlo', 'bbsn nnsnm nmx ksxk xkx  nx m', '5107', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `semesterid` int(10) NOT NULL,
  `studentname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `img` varchar(100) NOT NULL,
  `rollno` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `courseid`, `semesterid`, `studentname`, `gender`, `img`, `rollno`, `password`, `emailid`, `address`, `contactno`, `status`) VALUES
(2, 2, 2, 'swathi', 'Male', '19149images (2).jpg', '121212', '2222222', 'studentprojects.live@gmail.com', 'virajpetaaa', '98766567657', 'Active'),
(3, 2, 2, 'Anupa MN', 'Male', '177968611WhatsApp Image 2022-08-06 at 7.10.53 AM.jpeg', '789792', '', 'anupamn@gmail.com', 'virajpet', '8529637410', ''),
(25, 2, 2, 'Raj kiran', 'female', 'hello.png', '1421', '142114211421', 'swathi@gmail.com', 'virajpet', '166452', 'TC issued'),
(26, 2, 2, 'sheela', 'female', 'hello.png', '1422', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(27, 2, 2, 'Meena', 'female', 'hello.png', '1423', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(28, 2, 2, 'Vasanti', 'female', 'hello.png', '1424', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(29, 2, 2, 'Veeksha', 'female', 'hello.png', '1425', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(30, 2, 2, 'Vineetha', 'female', 'hello.png', '1426', '142614261426', 'swathi@gmail.com', 'virajpet', '166452', 'TC issued'),
(31, 2, 2, 'Seema', 'female', 'hello.png', '1427', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(32, 2, 2, 'Lakshmi', 'female', 'hello.png', '142', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(33, 2, 2, 'Bhavya', 'female', 'hello.png', '142', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(34, 2, 2, 'Vani', 'female', 'hello.png', '142', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(35, 2, 2, 'Bhavya', 'female', 'hello.png', '142', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(36, 2, 3, 'Susheela', 'female', 'hello.png', '142', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(37, 2, 2, 'Vrunda', 'female', 'hello.png', '142', 'hlooj', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(38, 2, 2, 'Kamalakshi', 'female', 'hello.png', '142', '123456789', 'swathi@gmail.com', 'virajpet', '166452', 'Active'),
(39, 2, 2, 'Raj kiran', 'Male', '22006Lighthouse.jpg', '1234512345', '', 'rajkiran@gmail.com', '3rd floor, city light buildin', '7489456123', ''),
(40, 2, 2, 'Mahesh kiran', 'Male', '16790', '55589', '123456789', 'maheshkiran@gmail.com', '3rd floro', '4789145120', 'Active'),
(41, 2, 2, 'Rupesh', 'Male', '20759Penguins.jpg', '456789', '1234123', 'rupesh@gmail.com', '3rd floor', '7894561230', 'Inactive'),
(42, 2, 2, 'Pter', 'Female', '11402', '1234', '123123', 'rajkiran@gmail.com', '3rd floor city ligh', '7894561230', 'Active'),
(43, 2, 2, 'Raj kiran', 'Female', '22867', '123455', '123123', 'rajkiran@gmail.com', '3rd floor city ligh', '7894561230', 'Active'),
(45, 2, 1, 'Pter Kindg', 'Male', '7413WIN_20170813_22_04_55_Pro.jpg', '44456789', 'q1w2e3r4', 'mahesh@gmail.com', 'sfsdfsdf', '234234234234', 'Active'),
(46, 2, 1, 'swathi bhat', 'Female', '7340IMG-20180114-WA0087.jpg', '15345', '21364', 'sps078@gmail.com', 'not on earth', '9874563210', 'Active'),
(47, 2, 1, 'swathi shetty', 'Female', '17649IMG-20180114-WA0087.jpg', '12542', 'pariswathianna', 'swatijobless@gmail.com', 'somewhere in mars', '9874561230', 'Active'),
(48, 2, 1, 'Balakrishna naik', 'Male', '2022012636517LznLEhnL._SX450_.jpg', '50015001', '50015001', 'balakrishna@studentprojects.li', '3rd floor,\r\nKaish home', '7894564213', 'Active'),
(49, 2, 1, 'Alex kumar', 'Male', '1575777126Raksha kumari.jpg', '1515151515', '151515151515', '151515151515@studentprojects.l', 'Akash gate,\r\nVillion house,\r\nBangalore', '9874562310', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` int(10) NOT NULL,
  `subject` varchar(25) NOT NULL,
  `courseid` int(10) NOT NULL,
  `semesterid` int(11) NOT NULL,
  `subjectdescription` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `syllabus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subject`, `courseid`, `semesterid`, `subjectdescription`, `status`, `syllabus`) VALUES
(6, 'Computer science', 2, 1, 'Computer science', 'Active', '13608display.html'),
(7, 'Microprocessor', 2, 1, 'Microprocessor', 'Active', ''),
(8, 'ASP.NET\r\n', 2, 1, 'ASP.NET\r\n', 'Active', ''),
(9, 'PHP', 2, 1, 'PHP', 'Active', ''),
(10, 'Android', 2, 1, 'android', 'Active', ''),
(11, 'Advanced PHP', 3, 1, 'Advanced PHPs', 'Active', '8909bootstrap.html'),
(12, 'English', 2, 2, 'English', 'Active', ''),
(16, 'Tamil', 2, 2, 'Urdu is a good lang', 'Active', ''),
(17, 'urdu', 2, 2, 'Urdu is a good lang', 'Active', ''),
(18, 'French', 2, 4, 'French in ola laal ala ala la ala la', 'Active', '');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `timetableid` int(10) NOT NULL,
  `courseid` int(10) NOT NULL,
  `semesterid` int(10) NOT NULL,
  `subjectid` int(10) NOT NULL,
  `faculties` varchar(50) NOT NULL,
  `day` varchar(15) NOT NULL,
  `ftime` time NOT NULL,
  `ttime` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`timetableid`, `courseid`, `semesterid`, `subjectid`, `faculties`, `day`, `ftime`, `ttime`, `status`) VALUES
(6371, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6372, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6373, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6374, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6375, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6376, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6377, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6378, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6379, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6380, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6381, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6382, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6383, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6384, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6385, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6386, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6387, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6388, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6389, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6390, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6391, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6392, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6393, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6394, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6395, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6396, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6397, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6398, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6399, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6400, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6401, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6402, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6403, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6404, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6405, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6406, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6407, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6408, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6409, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6410, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6411, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6412, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6413, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6414, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6415, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6416, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6417, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6418, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6419, 2, 1, 0, 'N;', '', '00:00:00', '00:00:00', 'Active'),
(6420, 2, 2, 12, 'a:2:{i:0;s:1:\"7\";i:1;s:2:\"11\";}', 'Monday', '09:00:00', '10:00:00', 'Active'),
(6421, 2, 2, 12, 'a:1:{i:0;s:1:\"6\";}', 'Monday', '10:00:00', '11:00:00', 'Active'),
(6422, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Monday', '11:00:00', '12:00:00', 'Active'),
(6423, 2, 2, 12, 'a:1:{i:0;s:1:\"8\";}', 'Monday', '12:00:00', '13:00:00', 'Active'),
(6424, 2, 2, 17, 'a:1:{i:0;s:1:\"8\";}', 'Monday', '14:00:00', '15:00:00', 'Active'),
(6425, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Monday', '15:00:00', '16:00:00', 'Active'),
(6426, 2, 2, 17, 'a:1:{i:0;s:1:\"7\";}', 'Monday', '16:00:00', '17:00:00', 'Active'),
(6427, 2, 2, 17, 'a:1:{i:0;s:1:\"8\";}', 'Tuesday', '09:00:00', '10:00:00', 'Active'),
(6428, 2, 2, 12, 'a:1:{i:0;s:1:\"8\";}', 'Tuesday', '10:00:00', '11:00:00', 'Active'),
(6429, 2, 2, 12, 'a:1:{i:0;s:2:\"11\";}', 'Tuesday', '11:00:00', '12:00:00', 'Active'),
(6430, 2, 2, 16, 'a:1:{i:0;s:1:\"8\";}', 'Tuesday', '12:00:00', '13:00:00', 'Active'),
(6431, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Tuesday', '14:00:00', '15:00:00', 'Active'),
(6432, 2, 2, 16, 'a:1:{i:0;s:1:\"6\";}', 'Tuesday', '15:00:00', '16:00:00', 'Active'),
(6433, 2, 2, 17, 'a:1:{i:0;s:2:\"11\";}', 'Tuesday', '16:00:00', '17:00:00', 'Active'),
(6434, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Wednesday', '09:00:00', '10:00:00', 'Active'),
(6435, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Wednesday', '10:00:00', '11:00:00', 'Active'),
(6436, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Wednesday', '11:00:00', '12:00:00', 'Active'),
(6437, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Wednesday', '12:00:00', '13:00:00', 'Active'),
(6438, 2, 2, 16, 'a:1:{i:0;s:1:\"8\";}', 'Wednesday', '14:00:00', '15:00:00', 'Active'),
(6439, 2, 2, 16, 'a:1:{i:0;s:1:\"6\";}', 'Wednesday', '15:00:00', '16:00:00', 'Active'),
(6440, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Wednesday', '16:00:00', '17:00:00', 'Active'),
(6441, 2, 2, 16, 'a:2:{i:0;s:1:\"8\";i:1;s:2:\"11\";}', 'Thursday', '09:00:00', '10:00:00', 'Active'),
(6442, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Thursday', '10:00:00', '11:00:00', 'Active'),
(6443, 2, 2, 12, 'a:1:{i:0;s:1:\"8\";}', 'Thursday', '11:00:00', '12:00:00', 'Active'),
(6444, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Thursday', '12:00:00', '13:00:00', 'Active'),
(6445, 2, 2, 16, 'a:1:{i:0;s:1:\"8\";}', 'Thursday', '14:00:00', '15:00:00', 'Active'),
(6446, 2, 2, 16, 'a:1:{i:0;s:1:\"8\";}', 'Thursday', '15:00:00', '16:00:00', 'Active'),
(6447, 2, 2, 16, 'a:1:{i:0;s:1:\"6\";}', 'Thursday', '16:00:00', '17:00:00', 'Active'),
(6448, 2, 2, 12, 'a:1:{i:0;s:1:\"8\";}', 'Friday', '09:00:00', '10:00:00', 'Active'),
(6449, 2, 2, 16, 'a:1:{i:0;s:1:\"8\";}', 'Friday', '10:00:00', '11:00:00', 'Active'),
(6450, 2, 2, 16, 'a:1:{i:0;s:1:\"8\";}', 'Friday', '11:00:00', '12:00:00', 'Active'),
(6451, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Friday', '12:00:00', '13:00:00', 'Active'),
(6452, 2, 2, 17, 'a:1:{i:0;s:1:\"7\";}', 'Friday', '14:00:00', '15:00:00', 'Active'),
(6453, 2, 2, 16, 'a:2:{i:0;s:2:\"11\";i:1;s:2:\"12\";}', 'Friday', '15:00:00', '16:00:00', 'Active'),
(6454, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Friday', '16:00:00', '17:00:00', 'Active'),
(6455, 2, 2, 12, 'a:1:{i:0;s:1:\"6\";}', 'Saturday', '09:00:00', '10:00:00', 'Active'),
(6456, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Saturday', '10:00:00', '11:00:00', 'Active'),
(6457, 2, 2, 12, 'a:1:{i:0;s:1:\"8\";}', 'Saturday', '11:00:00', '12:00:00', 'Active'),
(6458, 2, 2, 17, 'a:1:{i:0;s:1:\"7\";}', 'Saturday', '12:00:00', '13:00:00', 'Active'),
(6459, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Saturday', '14:00:00', '15:00:00', 'Active'),
(6460, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Saturday', '15:00:00', '16:00:00', 'Active'),
(6461, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Saturday', '16:00:00', '17:00:00', 'Active'),
(6462, 2, 2, 12, 'a:1:{i:0;s:1:\"8\";}', 'Sunday', '09:00:00', '10:00:00', 'Active'),
(6463, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Sunday', '10:00:00', '11:00:00', 'Active'),
(6464, 2, 2, 17, 'a:1:{i:0;s:1:\"8\";}', 'Sunday', '11:00:00', '12:00:00', 'Active'),
(6465, 2, 2, 16, 'a:1:{i:0;s:1:\"7\";}', 'Sunday', '12:00:00', '13:00:00', 'Active'),
(6466, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Sunday', '14:00:00', '15:00:00', 'Active'),
(6467, 2, 2, 12, 'a:1:{i:0;s:1:\"7\";}', 'Sunday', '15:00:00', '16:00:00', 'Active'),
(6468, 2, 2, 12, 'a:1:{i:0;s:1:\"6\";}', 'Sunday', '16:00:00', '17:00:00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_certificate`
--

CREATE TABLE `transfer_certificate` (
  `transfer_certificate_id` bigint(20) NOT NULL,
  `studentid` bigint(20) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `date_of_leaving` date DEFAULT NULL,
  `tc_reason` varchar(255) DEFAULT NULL,
  `tc_date` date DEFAULT NULL,
  `general_conduct` varchar(255) DEFAULT NULL,
  `student_message` text NOT NULL,
  `staff_message` text DEFAULT NULL,
  `tc_status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_certificate`
--

INSERT INTO `transfer_certificate` (`transfer_certificate_id`, `studentid`, `request_date`, `date_of_leaving`, `tc_reason`, `tc_date`, `general_conduct`, `student_message`, `staff_message`, `tc_status`) VALUES
(7, 3, '2022-08-06', '2022-08-09', 'Change of Residence', NULL, NULL, '0<BR><HR>TC Request cancelled by student on 06-08-2022.<BR><HR>TC Request cancelled by student on 06-08-2022.', NULL, 'Cancelled'),
(8, 3, '2022-08-06', '2022-08-09', 'Health Issue', NULL, NULL, 'kINDLY PROVIDE ME TC', 'All the best', 'Approved'),
(9, 25, '2022-08-06', '2022-08-11', 'Health Issue', '2022-08-06', 'Good', 'This is my test message', 'All the best of luck', 'Approved'),
(10, 30, '2022-08-06', '2022-08-10', 'Change of Residence', '2022-08-06', 'Bad', 'yes<BR><HR>TC Request cancelled by student on 06-08-2022.', 'no', 'Cancelled'),
(11, 30, '2022-08-06', '2022-08-19', 'Change of Residence', '2022-08-06', '3', 'This is sTest', 'a', 'Approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussionid`);

--
-- Indexes for table `discussion_reply`
--
ALTER TABLE `discussion_reply`
  ADD PRIMARY KEY (`discussion_replyid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`examid`);

--
-- Indexes for table `exam_result`
--
ALTER TABLE `exam_result`
  ADD PRIMARY KEY (`exam_resultid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackid`);

--
-- Indexes for table `fees_payment`
--
ALTER TABLE `fees_payment`
  ADD PRIMARY KEY (`fees_payment_id`);

--
-- Indexes for table `fees_setting`
--
ALTER TABLE `fees_setting`
  ADD PRIMARY KEY (`fees_setting_id`);

--
-- Indexes for table `mail_setting`
--
ALTER TABLE `mail_setting`
  ADD PRIMARY KEY (`settingid`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`notesid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`timetableid`);

--
-- Indexes for table `transfer_certificate`
--
ALTER TABLE `transfer_certificate`
  ADD PRIMARY KEY (`transfer_certificate_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `discussionid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `discussion_reply`
--
ALTER TABLE `discussion_reply`
  MODIFY `discussion_replyid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `examid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `exam_result`
--
ALTER TABLE `exam_result`
  MODIFY `exam_resultid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1042;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `facultyid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `fees_payment`
--
ALTER TABLE `fees_payment`
  MODIFY `fees_payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fees_setting`
--
ALTER TABLE `fees_setting`
  MODIFY `fees_setting_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `notesid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `timetableid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6469;

--
-- AUTO_INCREMENT for table `transfer_certificate`
--
ALTER TABLE `transfer_certificate`
  MODIFY `transfer_certificate_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
