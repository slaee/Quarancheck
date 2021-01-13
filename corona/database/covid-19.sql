-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 12, 2021 at 04:18 PM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid-19`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `fromm` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `too` varchar(255) NOT NULL,
  `cTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `fromm`, `phone`, `message`, `too`, `cTime`) VALUES
(4, 'charlene april alves', '1517', '9063430174', 'huyyy', 'kghjsdghasdghjfdfahj', '1606479210'),
(5, 'charlene april alves', '1517', '9063430174', 'Hi', '8d1b177eb8c2b3757d5d1fe8ca0f3d37', '1610450882'),
(6, 'charlene april alves', '1517', '9063430174', 'you okay?', '8d1b177eb8c2b3757d5d1fe8ca0f3d37', '1610451008');

-- --------------------------------------------------------

--
-- Table structure for table `covid`
--

CREATE TABLE `covid` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `moc` varchar(255) NOT NULL,
  `dComments` varchar(300) NOT NULL,
  `cTime` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid`
--

INSERT INTO `covid` (`id`, `name`, `age`, `location`, `moc`, `dComments`, `cTime`, `token`) VALUES
(5, 'marlon villena', '11', 'anonang menor', 'barangay hall', 'ssssfsdd', '1606480150', '734868adea2de54eed034cf9604e0001'),
(6, 'marlon villena', '11', 'anonang menor', 'barangay hall', '', '1606731273', 'e7ce04d4d1c2c97871c19c22ac9b8943'),
(7, 'donnell john bueno', '24', 'santa', 'baranggay hall', 'alaws', '1606795302', '49af2171cb0b0b861b91b293d56ef17a');

-- --------------------------------------------------------

--
-- Table structure for table `outbreaks`
--

CREATE TABLE `outbreaks` (
  `id` int(11) NOT NULL,
  `outBreak` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `cTime` varchar(255) NOT NULL,
  `measures` text NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `dateOfBirth` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `traveled` varchar(255) NOT NULL,
  `entered` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `dname` varchar(255) NOT NULL,
  `vtype` varchar(255) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `antigen` varchar(255) NOT NULL,
  `cTime` varchar(255) NOT NULL,
  `diagnosis` text NOT NULL,
  `prescription` text NOT NULL,
  `token` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `pcondition` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `street`, `municipality`, `dateOfBirth`, `age`, `gender`, `phone`, `traveled`, `entered`, `origin`, `destination`, `dname`, `vtype`, `plate`, `antigen`, `cTime`, `diagnosis`, `prescription`, `token`, `doctor`, `number`, `pcondition`) VALUES
(5, 'charlene april alves', 'quezon santa ilocos sur', '', '', '23', 'Female', '9063430174', '', '', '', '', '', '', '', '', '1606477399', 'negative', 'negative', '0639125096a1773b4b755df7848cc56f', 'kghjsdghasdghjfdfahj', '1517', 'Inpatient'),
(7, 'julius ceasar cuaresma', 'vigan', '', '', '21', 'Male', '09361226566', '', '', '', '', '', '', '', '', '1606795126', 'negative', 'travel history', 'd7fcc162c9e41624ae66225431027e50', 'kghjsdghasdghjfdfahj', '1577', 'Inpatient'),
(9, 'ghie kurt pazz', 'vigan city', '', '', '23', 'Male', '09556378057', '', '', '', '', '', '', '', '', '1607875286', 'negative', 'apor', '36f3b826b142a57e65e2a344ae88d8a1', 'kghjsdghasdghjfdfahj', '7977', 'Inpatient'),
(10, 'marlon villena', 'mabilbila sur santa, ilocos sur', '', '23 - 11 - 1998', '23', 'Male', '09556378057', '', '', '', '', '', '', '', '', '1609988346', 'none\r<br />', 'none', '23d156526742db2e9807277fe8282604', 'cf7bc17bcf0caa3dbb2d4618e7338b96', '4103', 'Inpatient'),
(11, 'lheander alves', 'mabilbila sur santa, ilocos sur', '', '11 - 02 - 2007', '14', 'Male', '09104724213', '2020-12-28', '2020-12-31', 'mabilbila sur santa, ilocos sur', 'pinili ilocos norte', 'boyet', 'motor', 'vc-1234', 'Yes', '1610076936', 'n/a', 'n/a', '823b08e1fee6fb6e96b6f2319a8bb1b5', 'cf7bc17bcf0caa3dbb2d4618e7338b96', '0', 'Inpatient');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `secondName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `type` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `license` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `secondName`, `email`, `password`, `token`, `type`, `phone`, `profile`, `gender`, `role`, `license`) VALUES
(6, 'Charles Novy', 'Alves', 'cnalves@gmail.com', 'alves', 'asdfghjkl', 'admin', '09556378057', NULL, 'male', 'Admin', ''),
(19, 'Donnell John', 'Bueno', 'dj@gmail.com', 'bueno', '8d1b177eb8c2b3757d5d1fe8ca0f3d37', 'doctor', '09556378057', NULL, 'Male', 'Doctor', '1123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covid`
--
ALTER TABLE `covid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbreaks`
--
ALTER TABLE `outbreaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `outbreaks`
--
ALTER TABLE `outbreaks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;