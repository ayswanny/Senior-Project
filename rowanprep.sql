-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2015 at 10:03 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rowanprep`
--

-- --------------------------------------------------------

--
-- Table structure for table `brass_band`
--

CREATE TABLE `brass_band` (
  `student` int(11) NOT NULL,
  `instrument` varchar(20) NOT NULL,
  `ryo_form` varchar(1) NOT NULL,
  `tuition_due` decimal(7,2) NOT NULL,
  `notes` varchar(250) NOT NULL,
  `registration_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brass_band`
--

INSERT INTO `brass_band` (`student`, `instrument`, `ryo_form`, `tuition_due`, `notes`, `registration_key`) VALUES
(1, 'trumpet', 'Y', '500.00', 'blah blah blah, bleh bleh bleh.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `class_name` varchar(40) NOT NULL,
  `teacher` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `pay_rate` decimal(5,2) NOT NULL,
  `total_number` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `day` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`class_name`, `teacher`, `class_id`, `pay_rate`, `total_number`, `year`, `day`) VALUES
('Jedi Training', 1, 1, '20.00', 8, 2015, 'Thursday');

-- --------------------------------------------------------

--
-- Table structure for table `class_link`
--

CREATE TABLE `class_link` (
  `student` int(11) NOT NULL,
  `class_ref` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `tuition_due` double(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_link`
--

INSERT INTO `class_link` (`student`, `class_ref`, `id`, `tuition_due`) VALUES
(1, 1, 1, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `student` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `teacher_type` varchar(30) NOT NULL,
  `duration` int(3) NOT NULL,
  `day` varchar(9) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `instrument` varchar(30) NOT NULL,
  `tuition_due` decimal(7,2) NOT NULL,
  `total_lessons` int(2) NOT NULL,
  `pay_rate` decimal(5,2) NOT NULL,
  `lesson_key` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`student`, `teacher`, `teacher_type`, `duration`, `day`, `semester`, `year`, `instrument`, `tuition_due`, `total_lessons`, `pay_rate`, `lesson_key`) VALUES
(1, 1, 'Rowan Prep', 60, 'Wednesday', 'Fall', 2015, 'Piano', '400.00', 5, '20.00', 1),
(2, 1, 'Rowan Prep', 0, '', '', 0, '', '30.00', 0, '0.00', 2),
(2, 2, 'Rowan University', 45, 'Monday', 'Fall', 2015, 'Violin', '500.00', 8, '20.00', 3),
(5, 2, 'Rowan Prep', 45, 'Thursday', 'Fall', 2015, 'mandolin', '0.00', 1, '15.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orchestra`
--

CREATE TABLE `orchestra` (
  `student` int(11) NOT NULL,
  `instrument` varchar(20) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orchestra`
--

INSERT INTO `orchestra` (`student`, `instrument`, `ryo_form`, `paid_check`, `check_number`, `paid_card`, `payment_date`, `tuition_due`, `tuition_paid`, `tuition_owed`, `notes`, `registration_key`) VALUES
(1, 'ukelele', 'Y', 'Y', '123456789', '', '2015-03-03', '500.00', '500.00', '0.00', 'blah blah blah, bleh bleh bleh.', 1),
(2, 'clarinet', 'Y', '', '', '', '', '0.00', '0.00', '0.00', 'Eh. Meowmeowmeow.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_key` int(11) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount_paid` decimal(7,2) NOT NULL,
  `paid_check` char(1) NOT NULL,
  `check_number` varchar(12) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `id` int(11) NOT NULL,
  `student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_key`, `payment_date`, `amount_paid`, `paid_check`, `check_number`, `type`, `id`, `student`) VALUES
(3, '2015-12-01 20:48:43', '100.00', 'Y', '555555555', 0, 1, 1),
(4, '2015-12-03 03:30:49', '100.00', 'Y', '999999999', 3, 1, 1),
(5, '2015-12-03 03:30:49', '100.00', 'Y', '999999999', 2, 1, 1),
(6, '2015-12-03 03:30:49', '100.00', 'Y', '999999999', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `payout_key` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `payout_amount` decimal(7,2) NOT NULL,
  `payout_date` date NOT NULL,
  `lesson` int(11) NOT NULL,
  `paid_lessons` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`last_name`, `first_name`, `parent`, `dob`, `teacher`, `instrument`, `classes`, `ensembles`, `events`, `photo_release`, `progress_report_date`, `street_address`, `city`, `state`, `zip_code`, `home_phone`, `mobile_phone`, `work_phone`, `preferred_phone`, `parent_email`, `student_email`, `starting_date`, `enrolled`, `notes`, `student_key`) VALUES
('swanson', 'austen', 'mona', '1992-03-03', 'mr. pickle', 'fiddle', '', 'jazzy', 'orchestra', 'Y', '2015-12-05', '99 red balloons ct', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '8565555555', 'email@email.email', 'email@email.email', '2015-04-03', 'Y', '', 1),
('kohler', 'paul', 'mobey', '1992-03-06', 'mr. carrot', 'banjo', 'banjo trio', '', '', 'N', '2015-12-04', '80 hairmetal rd', 'glassboro', 'NJ', '08028', '8565555555', '8565555555', '8565555555', '7777777777', 'email@email.com', '', '2015-11-03', 'Y', '', 2),
('jasper', 'adam', 'melanie', '1992-03-09', 'ms. broccoli', 'ukulele', '', '', '', 'N', '2015-12-03', '76 X-ray spex ln', 'Glassboro', 'Ne', '08028', '8565555555', '8565555555', '8565555555', '5555555555', 'email@email.com', 'email@email.edu', '2015-11-13', 'Y', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`last_name`, `first_name`, `banner_id`, `faculty_status`, `instrument`, `background_check`, `home_phone`, `mobile_phone`, `email`, `alternate_email`, `street_address`, `city`, `state`, `zip_code`, `teacher_key`) VALUES
('Doe', 'John', 916000111, 'Y', 'Piano', 'Y', '8565555555', '8565555555', 'pianoman@billyjoel.com', 'pianodude@dudeman.com', 'symphony st', 'glassboro', 'nj', '08028', 1),
('Deaux', 'Jane', 987654321, 'Y', 'Guitar', 'Y', '5555555555', '6095555555', 'example@email.edu', '', '5 punk street', 'Glassboro', 'NJ', '08028', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `user_key` int(11) NOT NULL,
  `email` char(30) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `user_key`, `email`, `admin`) VALUES
('swanso52', 'utagydbo4', 1, 'swanso52@students.rowan.edu', 1),
('kohler38', 'jibroni', 2, 'kohler38@email.com', 1),
('Anna', 'GwEz59Enyd', 4, 'example@fornow.email', 1),
('Paul', 'nptvUDM4cs', 6, 'still@a.test', 1),
('Person', 'bEks3DMHei', 7, 'name@place.email', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brass_band`
--
ALTER TABLE `brass_band`
  ADD PRIMARY KEY (`registration_key`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_link`
--
ALTER TABLE `class_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_key`),
  ADD KEY `student` (`student`),
  ADD KEY `teacher` (`teacher`);

--
-- Indexes for table `orchestra`
--
ALTER TABLE `orchestra`
  ADD PRIMARY KEY (`registration_key`),
  ADD KEY `student` (`student`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_key`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`payout_key`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_key`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_key`),
  ADD UNIQUE KEY `teacher_key` (`teacher_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_key`),
  ADD UNIQUE KEY `user_key` (`user_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brass_band`
--
ALTER TABLE `brass_band`
  MODIFY `registration_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class_link`
--
ALTER TABLE `class_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orchestra`
--
ALTER TABLE `orchestra`
  MODIFY `registration_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `payout_key` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_key` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`student_key`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`teacher`) REFERENCES `teachers` (`teacher_key`);

--
-- Constraints for table `orchestra`
--
ALTER TABLE `orchestra`
  ADD CONSTRAINT `orchestra_ibfk_1` FOREIGN KEY (`student`) REFERENCES `students` (`student_key`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
