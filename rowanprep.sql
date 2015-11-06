-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 01, 2015 at 11:39 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

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
  `zip_code` char(5) NOT NULL,
  `home_phone` varchar(10) NOT NULL,
  `mobile_phone` varchar(10) NOT NULL,
  `work_phone` varchar(10) NOT NULL,
  `preferred_phone` varchar(10) NOT NULL,
  `parent_email` varchar(30) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `starting_date` date NOT NULL,
  `enrolled` char(1) NOT NULL,
  `notes` varchar(150) NOT NULL,
  `user_key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`last_name`, `first_name`, `parent`, `dob`, `teacher`, `instrument`, `classes`, `ensembles`, `events`, `photo_release`, `progress_report_date`, `street_address`, `city`, `state`, `zip_code`, `home_phone`, `mobile_phone`, `work_phone`, `preferred_phone`, `parent_email`, `student_email`, `starting_date`, `enrolled`, `notes`, `user_key`) VALUES
('swanson', 'austen', 'mona', '1992-03-03', 'mr. pickle', 'fiddle', '', 'jazzy', 'orchestra', 'Y', '2015-12-05', '99 red balloons ct', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '8565555555', 'email@email.email', 'email@email.email', '2015-04-03', 'Y', '', 1),
('kohler', 'paul', 'mobey', '1992-03-06', 'mr. carrot', 'banjo', 'banjo trio', '', '', 'N', '2015-12-04', '80 hairmetal rd', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '7777777777', 'email@email.com', '', '2015-11-03', 'Y', '', 2),
('kohler', 'paul', 'mobey', '1992-03-06', 'mr. carrot', 'banjo', 'banjo trio', '', '', 'N', '2015-12-04', '80 hairmetal rd', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '7777777777', 'email@email.com', '', '2015-11-03', 'Y', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

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
  `zip_code` char(5) NOT NULL,
  `teacher_key` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`last_name`, `first_name`, `banner_id`, `faculty_status`, `instrument`, `background_check`, `home_phone`, `mobile_phone`, `email`, `alternate_email`, `street_address`, `city`, `state`, `zip`, `teacher_key`) VALUES
('Doe', 'John', 916000111, 'Y', 'Piano', 'Y', '8565555555', '8565555555', 'pianoman@billyjoel.com', 'pianodude@dudeman.com', 'symphony st', 'glassboro', 'nj', 8028, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`user_key`);

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
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `user_key` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
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
