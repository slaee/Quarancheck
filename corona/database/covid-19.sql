-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2021 at 01:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(13, 'Doctor', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '0725895256', 'Swab ka bukas', '8739', '1610619446');

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
(18, 'Sia jane', 'ilocos street', 'ilocos', '2009-03-21', '11', 'Female', '09123456789', '2021-01-29', '2021-02-06', 'n/a', 'n/a', 'Dopine', 'Motor', 'BE2341', 'Yes', '1610604307', 'Positive', 'Postive', '99087148c182c7eadf1ced3966d1f6fd', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '6734', 'Inpatient'),
(19, 'Jhon Doe', 'tondo', 'manila', '1996-03-14', '24', 'Male', '09123456789', '2021-01-23', '2021-02-05', 'n/a', 'n/a', 'Tester', 'Motor', 'BE2341', 'Yes', '1610604547', 'Positive', 'Positive ako', '73c04d6e9757e3d0cc621ecb35c62629', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '8739', 'Inpatient'),
(20, 'Jong V', 'san vilisca', 'ilocos', '1988-03-02', '32', 'Male', '09123456789', '2021-01-23', '2021-01-29', 'San Vilisca', 'Tondo Manila', 'Dopamine', 'Motor', 'ACE1344124', 'Yes', '1610615612', 'Positive', 'positive', '1a8d962659c34ff61bc3c35e7a7c89ee', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '7058', 'Inpatient'),
(41, 'Sabe Jong', 'tondo', 'cagayan', '2007-02-06', '13', 'Male', '09123456789', '2021-01-02', '2021-01-29', 'San Vilisca', 'Ilocos', 'Dopine', 'Car', 'AE1245', 'Yes', '1610620857', 'Negative', 'Negative', '139f24a924b0504f4db9d451d506057d', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '5364', 'Inpatient'),
(42, 'Sia jane', 'ilocos street', 'ilocos', '2009-03-21', '11', 'Male', '09123456789', '2021-01-29', '2021-02-06', 'n/a', 'n/a', 'Dopine', 'Motor', 'BE2341', 'Yes', '1610624653', 'Negative', 'tesasd', 'a1779a6ec322b2526b59dea84653517b', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '6734', 'Inpatient'),
(43, 'Tester Name', 'test address', 'cagayan', '2008-11-13', '12', 'Male', '09123456789', '2021-01-09', '2021-01-21', 'Manila', 'Tondo Manila', 'Dopine', 'Car', 'BE2341', 'No', '1610625086', 'Negative', 'Nega', '94dd8a6eb3982523b2a9df542dfeb60e', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '9830', 'Outpatient'),
(44, 'Jhon Doe', 'tondo', 'manila', '1996-03-14', '24', 'Male', '09123456789', '2021-01-23', '2021-02-05', 'n/a', 'n/a', 'Tester', 'Motor', 'BE2341', 'Yes', '1610625325', 'Negative', 'asdasdasd', '18753458293e76b0fcbbc33c32456dc5', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '8739', 'Inpatient'),
(45, 'Jhon Doe', 'tondo', 'manila', '1996-03-14', '24', 'Male', '09123456789', '2021-01-23', '2021-02-05', 'n/a', 'n/a', 'Tester', 'Motor', 'BE2341', 'Yes', '1610625952', 'Negative', 'adsgagasdf', '0656ca051cff078654a0ed5af6f36d42', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '8739', 'Outpatient'),
(46, 'Jhon Doe', 'tondo', 'manila', '1996-03-14', '24', 'Male', '09123456789', '2021-01-23', '2021-02-05', 'n/a', 'n/a', 'Tester', 'Motor', 'BE2341', 'Yes', '1610626207', 'Negative', 'Sample', 'a1419c4b0c11b19569eb4ba780437584', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '8739', 'Inpatient'),
(47, 'Jhon Doe', 'tondo', 'manila', '1996-03-14', '24', 'Female', '09123456789', '2021-01-23', '2021-02-05', 'n/a', 'n/a', 'Tester', 'Motor', 'BE2341', 'Yes', '1610626338', 'Positive', 'Nothing', '1b114c4fdde19ca77b238e5698b90309', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '8739', 'Outpatient');

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
  `type` varchar(255) NOT NULL,
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
(6, 'Charles Novy', 'Alves', 'cnalves@gmail.com', '123123', 'asdfghjkl', 'admin', '09556378057', NULL, 'male', 'Admin', ''),
(53, 'John', 'Doe', 'john@gmail.com', '123123', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', 'doctor', '09123456789', NULL, 'Male', 'Surgeon', '2415124124'),
(54, 'Police', 'Man', 'police@mail.com', 'hospital', '5720baeb08554e45e4b6719dd7267efa', 'police', '09123456789', NULL, 'Male', '12415155512', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
