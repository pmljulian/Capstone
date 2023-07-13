-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 06:46 PM
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
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `state` varchar(100) NOT NULL,
  `faculty` int(100) NOT NULL,
  `timestamp` varchar(100) NOT NULL,
  `open` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `state`, `faculty`, `timestamp`, `open`) VALUES
(84, 'Create Schedule', 201622123, '12/11/2022 8:51 PM', 0),
(85, 'Create Schedule', 201622123, '12/11/2022 8:54 PM', 0),
(88, 'Create Schedule', 201622123, '12/13/2022 3:51 PM', 0),
(89, 'Create Schedule', 201622123, '12/13/2022 3:55 PM', 0),
(91, 'Update Schedule', 201622123, '12/14/2022 9:40 PM', 0),
(92, 'Update Schedule', 201622123, '12/14/2022 9:40 PM', 0),
(93, 'Update Schedule', 201622123, '12/14/2022 9:40 PM', 0),
(94, 'Update Schedule', 201622123, '12/14/2022 9:40 PM', 0),
(95, 'Update Schedule', 201622123, '12/14/2022 9:40 PM', 0),
(96, 'Create Schedule', 201622123, '12/14/2022 9:44 PM', 0),
(97, 'Create Schedule', 201622123, '12/14/2022 9:45 PM', 0),
(98, 'Update Schedule', 201622123, '12/14/2022 9:51 PM', 0),
(99, 'Create Schedule', 201622123, '12/14/2022 9:51 PM', 0),
(100, 'Create Schedule', 201622123, '12/14/2022 10:33 PM', 0),
(101, 'Update Schedule', 201622123, '12/14/2022 10:37 PM', 0),
(102, 'Update Schedule', 201622123, '12/14/2022 10:37 PM', 0),
(103, 'Create Schedule', 201622123, '12/14/2022 10:38 PM', 0),
(104, 'Update Schedule', 201622123, '12/14/2022 10:38 PM', 0),
(105, 'Update Schedule', 201622123, '12/14/2022 10:38 PM', 0),
(106, 'Create Schedule', 201622123, '12/14/2022 10:39 PM', 0),
(107, 'Update Schedule', 201622123, '12/14/2022 10:39 PM', 0),
(108, 'Update Schedule', 201622123, '12/14/2022 10:40 PM', 0),
(109, 'Create Schedule', 201622123, '12/14/2022 10:41 PM', 0),
(110, 'Update Schedule', 201622123, '12/14/2022 10:41 PM', 0),
(111, 'Create Schedule', 201622123, '12/14/2022 10:42 PM', 0),
(112, 'Update Schedule', 201622123, '12/14/2022 10:42 PM', 0),
(113, 'Create Schedule', 201622123, '12/14/2022 10:53 PM', 0),
(114, 'Update Schedule', 201622123, '12/15/2022 12:09 AM', 0),
(115, 'Create Schedule', 201622123, '12/15/2022 12:09 AM', 0),
(116, 'Create Schedule', 201622123, '12/15/2022 12:17 AM', 0),
(117, 'Update Schedule', 201622123, '12/15/2022 12:21 AM', 0),
(118, 'Update Schedule', 201622123, '12/15/2022 12:22 AM', 0),
(119, 'Update Schedule', 201622123, '12/15/2022 12:22 AM', 0),
(120, 'Create Schedule', 201622123, '12/15/2022 12:23 AM', 0),
(121, 'Update Schedule', 201622123, '12/15/2022 12:23 AM', 0),
(122, 'Update Schedule', 201622123, '12/15/2022 12:23 AM', 0),
(123, 'Update Schedule', 201622123, '12/15/2022 12:24 AM', 0),
(124, 'Create Schedule', 201622123, '12/15/2022 12:57 AM', 0),
(125, 'Update Schedule', 201622123, '12/15/2022 12:57 AM', 0),
(126, 'Update Schedule', 201622123, '12/15/2022 1:13 AM', 0),
(127, 'Create Schedule', 201622123, '12/15/2022 1:13 AM', 0),
(128, 'Update Schedule', 201622123, '12/15/2022 1:15 AM', 0),
(129, 'Create Schedule', 201622123, '12/15/2022 1:16 AM', 0),
(130, 'Create Schedule', 201622123, '12/15/2022 1:40 AM', 1),
(131, 'Create Schedule', 201622124, '12/15/2022 1:40 AM', 1),
(132, 'Update Schedule', 201622123, '12/15/2022 1:40 AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(10) NOT NULL,
  `room` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room`, `description`) VALUES
(0, '', 'Important,do not delete!'),
(1, '206', '206'),
(5, '250', '250'),
(6, '290', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(10) NOT NULL,
  `day` int(10) NOT NULL,
  `time` int(10) NOT NULL,
  `faculty` int(20) NOT NULL,
  `section` int(10) NOT NULL,
  `subject` int(10) NOT NULL,
  `room` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `day`, `time`, `faculty`, `section`, `subject`, `room`) VALUES
(411, 3, 1, 201622123, 1, 1, 1),
(412, 4, 1, 201622123, 1, 1, 1),
(421, 5, 1, 201622123, 1, 1, 1),
(423, 1, 2, 201622123, 1, 1, 1),
(427, 2, 2, 201622123, 1, 1, 1),
(431, 3, 2, 201622123, 1, 1, 1),
(432, 4, 2, 201622123, 1, 1, 1),
(434, 2, 1, 201622123, 1, 1, 1),
(435, 1, 1, 201622123, 1, 1, 1),
(437, 2, 3, 201622124, 1, 1, 1),
(438, 5, 2, 201622124, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(10) NOT NULL,
  `section` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `description`) VALUES
(0, '', 'Important,do not delete'),
(1, 'Acacia', 'Punong malakis'),
(2, 'Balangays', 'Bahangays'),
(3, 'Camachile', 'Combini'),
(4, 'Dahlia', 'Dandelion'),
(8, 'Elephant', 'mami'),
(9, 'Frog', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject`, `description`, `color`) VALUES
(0, 'Recess', '#Important, do not delete', '#78c4dd'),
(1, 'PhySci', 'Physical Science', '#e67070'),
(3, 'English', 'English Language', '#9ad6cf'),
(4, 'Filipino', 'Filipino Language', '#94afff'),
(5, 'Discrete Math', 'Discrete Structures', '#d97f59'),
(18, 'El Filibuserismo', 'El Filibusterismos', '#498497');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `time_start`, `time_end`) VALUES
(1, '06:30:00', '07:30:00'),
(2, '07:30:00', '08:30:00'),
(3, '08:30:00', '09:00:00'),
(4, '09:00:00', '10:00:00'),
(5, '10:00:00', '11:00:00'),
(6, '11:00:00', '12:00:00'),
(7, '12:15:00', '13:15:00'),
(8, '13:15:00', '14:15:00'),
(9, '14:15:00', '14:45:00'),
(10, '14:45:00', '15:45:00'),
(11, '15:45:00', '16:45:00'),
(12, '16:45:00', '17:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`) VALUES
(1, 'Mr.'),
(2, 'Ms.'),
(3, 'Mrs.'),
(4, 'Dr.'),
(5, 'Prof.'),
(6, 'Rev.'),
(7, 'Hon.'),
(8, 'Sr.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `first` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `archive` varchar(10) NOT NULL,
  `notify` int(10) NOT NULL,
  `otp` int(10) NOT NULL,
  `verify` int(10) NOT NULL,
  `seconds` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first`, `last`, `email`, `contact`, `password`, `archive`, `notify`, `otp`, `verify`, `seconds`) VALUES
(12344112, 'Mr.', 'Admin', 'Nistrator', 'admin@admin', '023123', '1234', 'NO', 0, 0, 1, 0),
(201622123, 'Mr.', 'Ryan', 'Kaindoy', 'ryankaindoy12@gmail.com', '09451255652', 'kaindoy2000s', 'NO', 1, 1563, 1, 1671039818),
(201622124, 'Mr.', 'Johns', 'Dough', 'johndough@gmail.com', '09123441212', '1234', 'NO', 1, 2344, 1, 1669603236),
(201622159, 'Mr.', 'Jane', 'Doe', 'g_doe@gmail.com', '09123312441', 'janedoe123', 'NO', 1, 4828, 0, 1670847529),
(201622160, 'Mr.', 'dass', 'das', 'das@dsad', '09451255652', 'magandaako', 'YES', 1, 6105, 0, 1670847638),
(201622161, 'Sr.', 'Jameson', 'Cameroon', 'jamesoncam@gmail.com', '09231122315', 'jamescam2000', 'NO', 1, 2953, 0, 1670917622),
(201622162, 'Mr.', '3123', '123123', 'ryankaindoy12s@gmail.com', '3123123123', '213123123', 'YES', 1, 5612, 0, 1671033380),
(201622163, 'Mr.', 'fds', 'fds', 'fsd@das', '2131231211', '12312312132', 'YES', 1, 8156, 0, 1671033418),
(201622164, 'Mr.', 'das', 'dasda', 'edsad@dasdasd', '2311231312', '2131231321231', 'YES', 1, 5945, 0, 1671037023),
(201622165, 'Mr.', 'ggdsadasd', 'ggg', 'gag@sda', '1233123412', '312312312331', 'NO', 1, 2823, 0, 1671039556);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=439;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201622166;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
