-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2017 at 07:39 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_personmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adddis`
--

CREATE TABLE IF NOT EXISTS `tbl_adddis` (
  `dis_id` int(11) NOT NULL AUTO_INCREMENT,
  `adhar` varchar(44) NOT NULL,
  `date` date NOT NULL,
  `hosuname` varchar(44) NOT NULL,
  `report` varchar(555) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`dis_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_adddis`
--

INSERT INTO `tbl_adddis` (`dis_id`, `adhar`, `date`, `hosuname`, `report`, `status`) VALUES
(2, '123412341234', '2017-04-20', 'hospitalpattam@gmail.com', 'heart patient', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_uname` varchar(50) NOT NULL,
  `admin_pwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_uname`, `admin_pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_casedetail`
--

CREATE TABLE IF NOT EXISTS `tbl_casedetail` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `adhar` varchar(5000) NOT NULL,
  `casesection` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_casedetail`
--

INSERT INTO `tbl_casedetail` (`case_id`, `adhar`, `casesection`, `status`) VALUES
(1, '123412341234', 'ipc324,ipc3299', '0'),
(2, '432123454323', '', '0'),
(3, '121212121212', 'no case', '0'),
(5, '5434565432', '', '0'),
(6, '356897456123', 'ipc444', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `dist_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_name` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`dist_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dist_id`, `dist_name`, `state_id`) VALUES
(1, 'Trivandrum', 1),
(2, 'kollam', 1),
(3, 'Chennai', 2),
(4, 'Coimbatore.', 2),
(5, 'Ernakulam', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emgcase`
--

CREATE TABLE IF NOT EXISTS `tbl_emgcase` (
  `ecase_id` int(11) NOT NULL AUTO_INCREMENT,
  `adhar` varchar(5000) NOT NULL,
  `case_details` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  KEY `ecase_id` (`ecase_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_emgcase`
--

INSERT INTO `tbl_emgcase` (`ecase_id`, `adhar`, `case_details`, `status`) VALUES
(1, '432123454323', 'emg112,123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicalhistory`
--

CREATE TABLE IF NOT EXISTS `tbl_medicalhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adhar` varchar(55) NOT NULL,
  `date` varchar(55) NOT NULL,
  `hosuname` varchar(55) NOT NULL,
  `report` varchar(556) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_medicalhistory`
--

INSERT INTO `tbl_medicalhistory` (`id`, `adhar`, `date`, `hosuname`, `report`, `status`) VALUES
(2, '123412341234', '2017-04-20', 'hospitalpattam@gmail.com', 'accident case reported', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passport`
--

CREATE TABLE IF NOT EXISTS `tbl_passport` (
  `passport_id` int(11) NOT NULL AUTO_INCREMENT,
  `adhar` varchar(50) NOT NULL,
  `passportnum` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`passport_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_passport`
--

INSERT INTO `tbl_passport` (`passport_id`, `adhar`, `passportnum`, `status`) VALUES
(1, '123412341234', '123445', '0'),
(2, '432123454323', '', '0'),
(3, '121212121212', '', '0'),
(5, '5434565432', '123321', '0'),
(6, '356897456123', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE IF NOT EXISTS `tbl_place` (
  `place_id` int(11) NOT NULL AUTO_INCREMENT,
  `dist_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `dist_id`, `place_name`) VALUES
(1, 1, 'pattam'),
(2, 2, 'Kottarakara'),
(3, 1, 'attukall'),
(4, 3, 'Singanallur.'),
(5, 4, 'Anna Nagar'),
(7, 5, 'Kizhakkambalam'),
(8, 5, 'Pattimattom');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reg`
--

CREATE TABLE IF NOT EXISTS `tbl_reg` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `licence_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_reg`
--

INSERT INTO `tbl_reg` (`reg_id`, `licence_id`, `type_id`, `email`, `pwd`, `state_id`, `dist_id`, `place_id`, `status`) VALUES
(1, 1234, 1, 'sreesankarcv@gmail.com', 'Policepattam', 1, 1, 1, 1),
(2, 5678, 2, 'hospitalpattam@gmail.com', 'hospitalpattam', 1, 1, 1, 1),
(3, 34567, 3, 'passportpattam@gmail.com', 'passportpattam', 1, 1, 1, 1),
(4, 12345, 4, 'empattam@gmail.com', 'empattam', 1, 1, 1, 1),
(5, 4789546, 1, 'akhilesh0614@gmail.com', 'akhilesh', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE IF NOT EXISTS `tbl_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(50) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`) VALUES
(1, 'KERALA'),
(2, 'TAMIL NADU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE IF NOT EXISTS `tbl_survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `adhar` varchar(50) NOT NULL,
  `name` varchar(58) NOT NULL,
  `state_id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phno` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_survey`
--

INSERT INTO `tbl_survey` (`survey_id`, `adhar`, `name`, `state_id`, `dist_id`, `place_id`, `address`, `phno`, `email`, `img`, `status`) VALUES
(9, '123412341234', 'yuvi', 1, 1, 1, 'test address', '4567865433', 'yuvi.098@gmail.com', '1.jpg', 0),
(10, '432123454323', 'raina', 1, 2, 2, 'bangalore', '5432123455', 'raina@gmail.com', '2.jpg', 0),
(12, '121212121212', 'anu', 1, 1, 1, 'aaaaaaaa', '1234564322', 'anu@gmail.com', '3.jpg', 0),
(13, '5434565432', 'suraj', 1, 1, 1, 'bgrrbrgb', '2344324234329', 'suraj@gmail.com', '4.jpg', 0),
(14, '356897456123', 'Aravindkumar', 1, 5, 8, 'paravattikarayil', '9526230614', 'aravindkumarpa6@gmail.com', 'images (6).jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(1, 'police'),
(2, 'hospital'),
(3, 'passport'),
(4, 'emigration');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unknown`
--

CREATE TABLE IF NOT EXISTS `tbl_unknown` (
  `picid` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(55) NOT NULL,
  `status` varchar(5) NOT NULL,
  `result` varchar(55) NOT NULL,
  PRIMARY KEY (`picid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_unknown`
--

INSERT INTO `tbl_unknown` (`picid`, `pic`, `status`, `result`) VALUES
(1, 'img.jpg', 'r', '1.jpg'),
(6, 'akd.jpg', 'r', '2.jpg'),
(7, 'akd.jpg', 'r', '2.jpg'),
(8, 'akd.jpg', 'r', '2.jpg'),
(9, 'akd.jpg', 'r', '2.jpg'),
(10, 'asd.jpg', 'r', '3.jpg'),
(16, 'asd.jpg', 'r', '3.jpg'),
(17, 'akd.jpg', 'r', '2.jpg'),
(18, 'asd.jpg', 'r', '3.jpg'),
(19, 'akd.jpg', 'r', '2.jpg'),
(20, 'asd.jpg', 'r', '3.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
