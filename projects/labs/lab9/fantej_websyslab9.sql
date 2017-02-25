-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 17, 2016 at 03:40 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fantej_websyslab9`
--
CREATE DATABASE IF NOT EXISTS `fantej_websyslab9` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fantej_websyslab9`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `crn` int(11) NOT NULL,
  `prefix` varchar(4) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
(35091, 'ECON', 4130, 'Money and Banking', 1, 2017),
(35303, 'ECON', 1200, 'Introductory Economics', 2, 2017),
(35361, 'CSCI', 2300, 'Introduction to Algorithms', 6, 2017),
(37316, 'ITWS', 4300, 'Business Issues for Engineers and Scientists', 1, 2017),
(37350, 'ITWS', 1220, 'IT & Society', 1, 2016),
(37551, 'ITWS', 4100, 'IT Web Science Capstone', 1, 2016),
(37556, 'ITWS', 4370, 'Information System Security', 1, 2016),
(37866, 'ITWS', 4400, 'X-Informatics', 1, 2016),
(38132, 'ITWS', 4500, 'Web Science Systems Development', 1, 2016),
(38740, 'ITWS', 4600, 'Data Analytics', 1, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `crn` int(5) NOT NULL,
  `rin` int(9) NOT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `crn`, `rin`, `grade`) VALUES
(1, 35303, 661545066, 94),
(2, 35091, 661545066, 89),
(3, 37551, 661545065, 89),
(4, 35303, 661545065, 100),
(5, 38740, 661545064, 40),
(6, 37350, 661545064, 67),
(7, 37866, 661545063, 78),
(8, 35303, 661545064, 95),
(9, 37316, 661545063, 100),
(10, 37866, 661545063, 82),
(11, 35303, 661545061, 67),
(12, 37866, 661545061, 91),
(13, 35361, 661545059, 89),
(14, 37551, 661545059, 57),
(15, 35303, 661545058, 25),
(16, 37350, 661545058, 90),
(17, 35303, 661545057, 95),
(18, 37556, 661545057, 48),
(19, 37350, 661545053, 93),
(20, 35303, 661545053, 94),
(21, 37866, 661545058, 90),
(22, 37316, 661545057, 100),
(23, 37551, 661545057, 48),
(24, 37350, 661545053, 95),
(25, 37866, 661545053, 94);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `rin` int(9) NOT NULL,
  `rcsID` char(7) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `first name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `street` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `st` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`rin`, `rcsID`, `first name`, `last name`, `alias`, `phone`, `street`, `city`, `st`, `zip`) VALUES
(661545053, 'thomad', 'Thomas', 'Dulles', 'dullesthomas', 2143091111, '10 Congress St', 'Troy', 'New York', 12180),
(661545057, 'ashleyo', 'Sam', 'Iam', 'IamSam', 2018998762, '209 Colony Drive', 'Troy', 'New York', 12180),
(661545058, 'asiatay', 'Asia', 'Tailor', 'atay2', 2019091117, '10 Polytech St', 'Troy', 'New York', 12180),
(661545059, 'alexo', 'Alex', 'Omady', 'AO', 2082021111, '209 Colony Ave', 'Troy', 'New York', 12180),
(661545061, 'hnewm', 'Heather', 'Newmz', 'newmz', 2048092222, '209 Colony Ave', 'Troy', 'New York', 12180),
(661545062, 'nickb', 'Nick', 'Bgai', 'nickb', 2018920091, '1999 Burdett Ave', 'Troy', 'New York', 12180),
(661545063, 'armnd', 'Armand', 'Dotreal', 'armnd', 2019178981, '1999 Burdett Ave', 'Troy', 'New York', 12180),
(661545064, 'hailey', 'Hailey', 'Gile', 'hails', 1244890900, '1999 Burdett Ave', 'Troy', 'New York', 12180),
(661545065, 'adeel', 'Adeel', 'Minhas', 'Adele', 2017709489, '1999 Burdett Ave', 'Troy', 'New York', 12180),
(661545066, 'atay', 'Aron', 'Tailor', 'atay', 2016540909, '1999 Burdett Ave', 'Troy', 'New York', 12180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crn`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grades_ibfk_1` (`crn`),
  ADD KEY `grades_ibfk_2` (`rin`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`rin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`crn`) REFERENCES `courses` (`crn`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`rin`) REFERENCES `students` (`rin`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
