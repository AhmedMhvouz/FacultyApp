-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2015 at 09:01 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faculty1`
--
CREATE DATABASE IF NOT EXISTS `faculty1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `faculty1`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `instructor_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `fk1` (`instructor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `instructor_id`) VALUES
(1, 'cs200', 'compilers', 20055),
(2, 'it200', 'Image processing', 20057),
(3, 'cs2012', 'parallel ', 20057),
(4, 'cs2014', 'logic design', 20056);

-- --------------------------------------------------------

--
-- Table structure for table `course_dept`
--

CREATE TABLE IF NOT EXISTS `course_dept` (
  `course_id` int(20) NOT NULL,
  `dept_id` int(20) NOT NULL,
  KEY `fk3` (`dept_id`),
  KEY `fk4` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_dept`
--

INSERT INTO `course_dept` (`course_id`, `dept_id`) VALUES
(1, 1),
(3, 1),
(4, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'cs'),
(2, 'is'),
(3, 'it');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dept_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`password`),
  KEY `fk2` (`dept_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20058 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `username`, `password`, `fname`, `lname`, `dept_id`) VALUES
(20055, 'tamer20', '20090330', 'Tamer', 'yassen', 1),
(20056, 'ahmed20', '20090332', 'Ahmed', 'ali', 2),
(20057, 'ahmed20', '20090333', 'ahmed', 'ali', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `dept_id` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`password`),
  KEY `fk` (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `fname`, `lname`, `dept_id`) VALUES
(20090330, 'wael2013', '20090330', 'wael', 'eid fathy', 1),
(20090331, 'admin', 'admin', 'tamer', 'yassen', 1),
(20090334, 'wael', '', 'ali', 'mohammed', 1),
(20090335, 'mohammed', '200908', 'mohammed', 'ali', 2),
(20090336, '01092546901', '1234', 'ali', 'eid fathy', 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `st_id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  KEY `fk5` (`st_id`),
  KEY `fk6` (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`st_id`, `course_id`) VALUES
(20090330, 3),
(20090330, 4),
(20090330, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_dept`
--
ALTER TABLE `course_dept`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk4` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk` FOREIGN KEY (`dept_id`) REFERENCES `department` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `fk5` FOREIGN KEY (`st_id`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk6` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
