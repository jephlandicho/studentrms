-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 04:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `acad_year`
--

CREATE TABLE `acad_year` (
  `ay_id` int(11) NOT NULL,
  `acad_year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acad_year`
--

INSERT INTO `acad_year` (`ay_id`, `acad_year`) VALUES
(1, '2015-2016'),
(3, '2016-2017'),
(4, '2017-2018'),
(5, '2018-2019'),
(8, '2019-2020'),
(9, '2020-2021'),
(10, '2021-2022'),
(11, '2022-2023'),
(13, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `name`, `username`, `email`, `password`) VALUES
(12, 'Jephthah', 'jephthah_1212', 'landichojjl@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(13, 'Clarence', 'clarence', 'clarence@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(14, 'Cyrelyn', 'cyrelyn', 'cyrelyn@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441'),
(15, 'Wilgrace', 'wilgraceee', 'wilgrace@gmail.com', 'fc3707fa908df1e82e30ecbdae3d094804a8f87d');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(255) NOT NULL,
  `dept_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_desc`) VALUES
(1, 'JHS', 'Junior High School Grade 7 to Grade 10'),
(2, 'SHS', 'Senior High School Grade 11 to Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled_student`
--

CREATE TABLE `enrolled_student` (
  `enrollment_id` int(11) NOT NULL,
  `Student_code` varchar(255) NOT NULL,
  `Section_id` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Acad_Year_id` int(11) NOT NULL,
  `Date_Enrolled` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolled_student`
--

INSERT INTO `enrolled_student` (`enrollment_id`, `Student_code`, `Section_id`, `Status`, `Acad_Year_id`, `Date_Enrolled`) VALUES
(7, 'LI-0000007', 1, 'New', 5, '2022-11-01'),
(8, 'LI-0000006', 1, 'New', 5, '2022-11-01'),
(9, 'LI-0000005', 1, 'New', 5, '2022-11-01'),
(10, 'LI-0000004', 1, 'New', 5, '2022-11-01'),
(11, 'LI-0000008', 3, 'New', 5, '2022-11-01'),
(12, 'LI-0000007', 7, 'Continuing', 8, '2022-11-01');

-- --------------------------------------------------------

--
-- Table structure for table `grade_level`
--

CREATE TABLE `grade_level` (
  `gl_id` int(11) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `dept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade_level`
--

INSERT INTO `grade_level` (`gl_id`, `grade_level`, `dept_id`) VALUES
(1, 'Grade 7', 1),
(2, 'Grade 8', 1),
(3, 'Grade 9', 1),
(4, 'Grade 10', 1),
(7, 'Grade 11', 2),
(8, 'Grade 12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `grade_level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section`, `grade_level_id`) VALUES
(1, 'Diamond', 1),
(2, 'Pearl', 1),
(3, 'Ruby', 1),
(4, 'Jade', 1),
(5, 'Amethyst', 1),
(6, 'Beryl', 1),
(7, 'Topaze', 2);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Student_code` varchar(255) NOT NULL,
  `LRN` varchar(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `MName` varchar(255) NOT NULL,
  `Suffix` varchar(10) NOT NULL,
  `Sex` varchar(10) NOT NULL,
  `Birthdate` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `BirthPlace` varchar(255) NOT NULL,
  `Civil_Status` varchar(255) NOT NULL,
  `Nationality` varchar(255) NOT NULL,
  `Religion` varchar(255) NOT NULL,
  `Contact_No` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Student_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Student_code`, `LRN`, `FName`, `LName`, `MName`, `Suffix`, `Sex`, `Birthdate`, `Age`, `Address`, `BirthPlace`, `Civil_Status`, `Nationality`, `Religion`, `Contact_No`, `Email`, `Student_password`) VALUES
('LI-0000004', '234345324534', 'Jephthah Jehosaphat', 'Landicho', '', '', 'Male', '2001-01-12', 21, 'Sitio Mahabang Parang Malaruhatan', 'Malaruhatan', 'Single', 'Filipino', 'JW', '0946-885-3244', 'landichojjl@gmail.com', ''),
('LI-0000005', '423234234234234', 'Clarence Phol', 'Andino', 'Bautista', '', 'Male', '2002-07-23', 20, 'Cumba ', 'Cumba', 'Single', 'Filipino', '', '', '', 'LI-0000005'),
('LI-0000006', '4634564356456', 'Wilgrace', 'Ednaco', '', '', 'Female', '2002-07-24', 20, 'Luyahan Lian, Batangas', 'Luyahan Lian, Batangas', 'Single', 'Filipino', '', '0946-885-3244', 'wilgrace@gmail.com', 'LI-0000006'),
('LI-0000007', '34645645645', 'Cyrelyn', 'Bugtong', '', '', 'Female', '2002-04-12', 20, 'Luyahan, Lian Batangas', 'Luyahan, Lian Batangas', 'Single', 'Filipino', '', '', 'cyrelyn@gmail.com', 'LI-0000007'),
('LI-0000008', '2655656562', 'Student', 'Student lang', '', '', 'Male', '2001-06-20', 21, 'Sitio Mahabang Parang Malaruhatan', 'Sitio Mahabang Parang Malaruhatan', 'Single', 'Filipino', '', '', 'landichojjl@gmail.com', 'LI-0000008');

-- --------------------------------------------------------

--
-- Table structure for table `studentsdetails`
--

CREATE TABLE `studentsdetails` (
  `details_id` int(11) NOT NULL,
  `student_no` varchar(50) NOT NULL,
  `Father` varchar(255) NOT NULL,
  `Father_Occu` varchar(255) NOT NULL,
  `Father_Contact` varchar(255) NOT NULL,
  `Mother` varchar(255) NOT NULL,
  `Mother_Occu` varchar(255) NOT NULL,
  `Mother_Contact` varchar(255) NOT NULL,
  `Parents_Address` varchar(255) NOT NULL,
  `Guardian` varchar(255) NOT NULL,
  `Guardian_Occu` varchar(255) NOT NULL,
  `Guardian_Contact` varchar(255) NOT NULL,
  `Guardian_Add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentsdetails`
--

INSERT INTO `studentsdetails` (`details_id`, `student_no`, `Father`, `Father_Occu`, `Father_Contact`, `Mother`, `Mother_Occu`, `Mother_Contact`, `Parents_Address`, `Guardian`, `Guardian_Occu`, `Guardian_Contact`, `Guardian_Add`) VALUES
(17, 'LI-0000004', '', '', '', 'Sallie', 'Landicho', '0946-885-3244', 'Malaruhatan', '', '', '', ''),
(20, 'LI-0000005', '', '', '', 'Nanay Niya', '', '', '', '', '', '', ''),
(21, 'LI-0000006', '', '', '', '', '', '', '', '', '', '', ''),
(22, 'LI-0000007', '', '', '', '', '', '', '', '', '', '', ''),
(23, 'LI-0000008', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_desc` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `grade_level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_desc`, `term`, `grade_level_id`) VALUES
(2, 'Filipino', 'Filipino for Grade 7', 'Whole AY Year', 1),
(3, 'English', 'English for Grade 7', 'Whole AY Year', 1),
(4, 'Mathematics', 'Math for Grade 7', 'Whole AY Year', 1),
(5, 'Science', 'Science for Grade 7', 'Whole AY Year', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_code` varchar(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `MName` varchar(255) NOT NULL,
  `Suffix` varchar(255) NOT NULL,
  `Sex` varchar(255) NOT NULL,
  `Civil_Status` varchar(255) NOT NULL,
  `Birthdate` date NOT NULL,
  `Age` int(11) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Contact_Number` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Specialization` varchar(255) NOT NULL,
  `Employment_Status` varchar(255) NOT NULL,
  `teach_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_code`, `FName`, `LName`, `MName`, `Suffix`, `Sex`, `Civil_Status`, `Birthdate`, `Age`, `Address`, `Contact_Number`, `Email`, `Specialization`, `Employment_Status`, `teach_pass`) VALUES
('LIF-0000002', 'Jephthah Jehosaphat', 'Landicho', '', '', 'Male', 'Single', '2002-01-12', 20, 'Sitio Mahabang Parang Malaruhatan', '0946-885-3244', 'landichojjl@gmail.com', 'Computer', 'New', 'LIF-0000002'),
('LIF-0000003', 'Cyrelyn', 'Bugtong', '', '', 'Female', 'Single', '2002-06-21', 20, 'Luyahan Lian, Batangas', '', '', 'Computer', 'New', 'LIF-0000003');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acad_year`
--
ALTER TABLE `acad_year`
  ADD PRIMARY KEY (`ay_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `enrolled_student`
--
ALTER TABLE `enrolled_student`
  ADD PRIMARY KEY (`enrollment_id`),
  ADD KEY `Student_code` (`Student_code`),
  ADD KEY `Section_id` (`Section_id`),
  ADD KEY `Acad_Year_id` (`Acad_Year_id`);

--
-- Indexes for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD PRIMARY KEY (`gl_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `grade_level_id` (`grade_level_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Student_code`);

--
-- Indexes for table `studentsdetails`
--
ALTER TABLE `studentsdetails`
  ADD PRIMARY KEY (`details_id`),
  ADD KEY `student_no` (`student_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `grade_level_id` (`grade_level_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acad_year`
--
ALTER TABLE `acad_year`
  MODIFY `ay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `enrolled_student`
--
ALTER TABLE `enrolled_student`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grade_level`
--
ALTER TABLE `grade_level`
  MODIFY `gl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `studentsdetails`
--
ALTER TABLE `studentsdetails`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled_student`
--
ALTER TABLE `enrolled_student`
  ADD CONSTRAINT `enrolled_student_ibfk_1` FOREIGN KEY (`Student_code`) REFERENCES `students` (`Student_code`),
  ADD CONSTRAINT `enrolled_student_ibfk_2` FOREIGN KEY (`Section_id`) REFERENCES `sections` (`section_id`),
  ADD CONSTRAINT `enrolled_student_ibfk_3` FOREIGN KEY (`Acad_Year_id`) REFERENCES `acad_year` (`ay_id`);

--
-- Constraints for table `grade_level`
--
ALTER TABLE `grade_level`
  ADD CONSTRAINT `grade_level_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_level` (`gl_id`);

--
-- Constraints for table `studentsdetails`
--
ALTER TABLE `studentsdetails`
  ADD CONSTRAINT `studentsdetails_ibfk_1` FOREIGN KEY (`student_no`) REFERENCES `students` (`Student_code`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`grade_level_id`) REFERENCES `grade_level` (`gl_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
