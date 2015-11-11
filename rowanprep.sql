-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 08, 2015 at 03:22 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rowanprep`
--

USE `rowanprep`;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

DROP TABLE `lessons`;
CREATE TABLE IF NOT EXISTS `lessons` (
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `teacher_type` varchar(30) NOT NULL,
  `duration` int(3) NOT NULL,
  `day` varchar(9) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `instrument` varchar(30) NOT NULL,
  `tuition_due` decimal(7,2) NOT NULL,
  `tuition_paid` decimal(7,2) NOT NULL,
  `tuition_owed` decimal(7,2) NOT NULL,
  `lesson_key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`student`, `teacher`, `teacher_type`, `duration`, `day`, `semester`, `year`, `instrument`, `tuition_due`, `tuition_paid`, `tuition_owed`, `lesson_key`) VALUES
(1, 1, 'Rowan Prep', 60, 'Wednesday', 'Fall', 2015, 'Piano', '0.00', '0.00', '0.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orchestra`
--

DROP TABLE `orchestra`;
CREATE TABLE IF NOT EXISTS `orchestra` (
  `student` int(11) NOT NULL,
  `Instrument` varchar(20) NOT NULL,
  `ryo_form` varchar(1) NOT NULL,
  `paid_check` varchar(1) NOT NULL,
  `check_number` varchar(44) NOT NULL,
  `paid_card` varchar(1) NOT NULL,
  `payment_date` varchar(40) NOT NULL,
  `tuition_due` decimal(7,2) NOT NULL,
  `tuition_paid` decimal(7,2) NOT NULL,
  `tuition_owed` decimal(7,2) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `registration_key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orchestra`
--

INSERT INTO `orchestra` (`student`, `Instrument`, `ryo_form`, `paid_check`, `check_number`, `paid_card`, `payment_date`, `tuition_due`, `tuition_paid`, `tuition_owed`, `notes`, `registration_key`) VALUES
(1, 'ukelele', 'Y', 'Y', '123456789', '', '2015-03-03', '500.00', '500.00', '0.00', 'blah blah blah, bleh bleh bleh.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
DROP TABLE `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `parent` varchar(40) NOT NULL,
  `dob` date NOT NULL,
  `teacher` varchar(40) NOT NULL,
  `instrument` varchar(40) NOT NULL,
  `classes` varchar(40) NOT NULL,
  `ensembles` varchar(40) NOT NULL,
  `events` varchar(40) NOT NULL,
  `photo_release` char(1) NOT NULL,
  `progress_report_date` date NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` varchar(5) NOT NULL,
  `home_phone` varchar(10) NOT NULL,
  `mobile_phone` varchar(10) NOT NULL,
  `work_phone` varchar(10) NOT NULL,
  `preferred_phone` varchar(10) NOT NULL,
  `parent_email` varchar(30) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `starting_date` date NOT NULL,
  `enrolled` char(1) NOT NULL,
  `notes` varchar(150) NOT NULL,
  `student_key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`last_name`, `first_name`, `parent`, `dob`, `teacher`, `instrument`, `classes`, `ensembles`, `events`, `photo_release`, `progress_report_date`, `street_address`, `city`, `state`, `zip_code`, `home_phone`, `mobile_phone`, `work_phone`, `preferred_phone`, `parent_email`, `student_email`, `starting_date`, `enrolled`, `notes`, `student_key`) VALUES
('swanson', 'austen', 'mona', '1992-03-03', 'mr. pickle', 'fiddle', '', 'jazzy', 'orchestra', 'Y', '2015-12-05', '99 red balloons ct', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '8565555555', 'email@email.email', 'email@email.email', '2015-04-03', 'Y', '', 1),
('kohler', 'paul', 'mobey', '1992-03-06', 'mr. carrot', 'banjo', 'banjo trio', '', '', 'N', '2015-12-04', '80 hairmetal rd', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '7777777777', 'email@email.com', '', '2015-11-03', 'Y', '', 2),
('kohler', 'paul', 'mobey', '1992-03-06', 'mr. carrot', 'banjo', 'banjo trio', '', '', 'N', '2015-12-04', '80 hairmetal rd', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '7777777777', 'email@email.com', '', '2015-11-03', 'Y', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--
DROP TABLE `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `banner_id` int(9) NOT NULL,
  `faculty_status` varchar(1) NOT NULL,
  `instrument` varchar(30) NOT NULL,
  `background_check` varchar(1) NOT NULL,
  `home_phone` varchar(10) NOT NULL,
  `mobile_phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alternate_email` varchar(30) NOT NULL,
  `street_address` varchar(30) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zip_code` int(5) NOT NULL,
  `teacher_key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`last_name`, `first_name`, `banner_id`, `faculty_status`, `instrument`, `background_check`, `home_phone`, `mobile_phone`, `email`, `alternate_email`, `street_address`, `city`, `state`, `zip_code`, `teacher_key`) VALUES
('Doe', 'John', 916000111, 'Y', 'Piano', 'Y', '8565555555', '8565555555', 'pianoman@billyjoel.com', 'pianodude@dudeman.com', 'symphony st', 'glassboro', 'nj', 8028, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
DROP TABLE `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `user_key` int(11) NOT NULL,
  `email` char(30) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user_key`, `email`, `admin`) VALUES
('swanso52', 'utagydbo4', 1, 'swanso52@students.rowan.edu', 1),
('kohler38', 'jibroni', 2, 'kohler38@email.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_key`);

--
-- Indexes for table `orchestra`
--
ALTER TABLE `orchestra`
  ADD PRIMARY KEY (`registration_key`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_key`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_key`),
  ADD UNIQUE KEY `key` (`user_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orchestra`
--
ALTER TABLE `orchestra`
  MODIFY `registration_key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
