-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2021 at 08:34 AM
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
(13, 'Doctor', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '0725895256', 'Swab ka bukas', '8739', '1610619446'),
(14, 'Doctor', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '0725895256', 'Hi', '8739', '1610626633');

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
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET latin1 NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `number` varchar(255) CHARACTER SET latin1 NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `resource_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `token`, `number`, `start`, `end`, `resource_id`) VALUES
(19, 'Swab Test', 'f7cbff3ba200708784279786eeac4ebd', '9289', '2021-01-04 00:00:00', '2021-01-17 00:00:00', 51),
(20, 'Swab Test', '2ab7f9b3bd5f3e433624bdc64947131c', '5259', '2021-01-07 00:00:00', '2021-01-17 00:00:00', 48),
(21, 'Swab test', '2ab7f9b3bd5f3e433624bdc64947131c', '5259', '2021-01-18 00:00:00', '2021-01-21 00:00:00', 48),
(22, 'Swab Test', '18753458293e76b0fcbbc33c32456dc5', '8739', '2021-01-02 00:00:00', '2021-01-10 00:00:00', 46),
(23, 'Swab Test', '73c04d6e9757e3d0cc621ecb35c62629', '8739', '2021-01-04 00:00:00', '2021-01-13 00:00:00', 19),
(24, 'Swab Test', '1a8d962659c34ff61bc3c35e7a7c89ee', '7058', '2021-01-06 00:00:00', '2021-01-16 00:00:00', 20),
(25, 'Swab Test', '0656ca051cff078654a0ed5af6f36d42', '8739', '2021-01-02 00:00:00', '2021-01-06 00:00:00', 45),
(26, 'Swab Test', 'a1419c4b0c11b19569eb4ba780437584', '8739', '2021-01-14 00:00:00', '2021-01-20 00:00:00', 46),
(28, 'Swab Test', '94dd8a6eb3982523b2a9df542dfeb60e', '9830', '2021-01-06 00:00:00', '2021-01-14 00:00:00', 43);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(1, 'Positive'),
(2, 'Negative');

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
(47, 'Jhon Doe', 'tondo', 'manila', '1996-03-14', '24', 'Female', '09123456789', '2021-01-23', '2021-02-05', 'n/a', 'n/a', 'Tester', 'Motor', 'BE2341', 'Yes', '1610626338', 'Positive', 'Nothing', '1b114c4fdde19ca77b238e5698b90309', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '8739', 'Outpatient'),
(48, 'Mes man', 'auto street', 'masbate', '1968-05-10', '52', 'Male', '09123456789', '2021-01-08', '2021-01-30', 'Manila', 'Tondo Manila', 'Dopine', 'Car', 'ACES114', 'No', '1610627209', 'Negative', 'new', '2ab7f9b3bd5f3e433624bdc64947131c', '259da31e098434969846520cee484d1a', '5259', 'Outpatient'),
(49, 'Mes man', 'auto street', 'masbate', '1968-05-10', '52', 'Male', '09123456789', '2021-01-08', '2021-01-30', 'Manila', 'Tondo Manila', 'Dopine', 'Car', 'ACES114', 'Yes', '1610627280', 'Positive', 'Positive', '126badcc944314555c4fde11abdfe30e', '259da31e098434969846520cee484d1a', '5259', 'Inpatient'),
(50, 'Sample Test', 'test', 'bicol', '1999-02-02', '21', 'Male', '09123456789', '2021-01-23', '2021-02-04', 'n/a', 'n/a', 'Dopine', 'Car', 'BE2341', 'Yes', '1610671651', 'Positive', 'Positive', '06b7dc68862ed3d7005ba1979533f7df', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '5455', 'Inpatient'),
(51, 'Sly Kint Andales Bacalso', 'sitio paula maria', 'cebu city', '2016-03-25', '4', 'Male', '09123456789', '2021-01-22', '2020-12-29', 'n/a', 'n/a', 'Tester', 'Car', 'BE2341', 'No', '1610673010', 'Negative', '123', 'f7cbff3ba200708784279786eeac4ebd', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '9289', 'Inpatient'),
(52, 'Cebu Institute of Technology - University', 'sitio paula maria', 'asdf', '2021-01-28', '12', 'Female', '09321845672', '2021-01-15', '2021-01-11', 'Manila', 'Ilocos', 'Dopamine', 'Car', 'AE1245', 'Yes', '1610679033', 'Positive', 'sfgh', 'f34bff570523d5d5edba89b8ff43f9fe', 'a43d2e0bee0a5dd5e8cc16f7e3e16423', '0406', 'Outpatient');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `number` varchar(255) CHARACTER SET latin1 NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `number`, `token`, `group_id`) VALUES
(18, 'Sia jane', '6734', '99087148c182c7eadf1ced3966d1f6fd', 1),
(19, 'Jhon Doe', '8739', '73c04d6e9757e3d0cc621ecb35c62629', 1),
(20, 'Jong V', '7058', '1a8d962659c34ff61bc3c35e7a7c89ee', 1),
(41, 'Sabe Jong', '5364', '139f24a924b0504f4db9d451d506057d', 2),
(42, 'Sia jane', '6734', 'a1779a6ec322b2526b59dea84653517b', 2),
(43, 'Tester Name', '9830', '94dd8a6eb3982523b2a9df542dfeb60e', 2),
(44, 'Jhon Doe', '8739', '18753458293e76b0fcbbc33c32456dc5', 2),
(45, 'Jhon Doe', '8739', '0656ca051cff078654a0ed5af6f36d42', 2),
(46, 'Jhon Doe', '8739', 'a1419c4b0c11b19569eb4ba780437584', 2),
(47, 'Jhon Doe', '8739', '1b114c4fdde19ca77b238e5698b90309', 1),
(48, 'Mes man', '5259', '2ab7f9b3bd5f3e433624bdc64947131c', 2),
(49, 'Mes man', '5259', '126badcc944314555c4fde11abdfe30e', 1),
(50, 'Sample Test', '5455', '06b7dc68862ed3d7005ba1979533f7df', 1),
(51, 'Sly Kint Andales Bacalso', '9289', 'f7cbff3ba200708784279786eeac4ebd', 2),
(52, 'Cebu Institute of Technology - University', '0406', 'f34bff570523d5d5edba89b8ff43f9fe', 1);

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
(54, 'Police', 'Man', 'police@mail.com', 'hospital', '5720baeb08554e45e4b6719dd7267efa', 'police', '09123456789', NULL, 'Male', '12415155512', ''),
(57, 'Police Two', 'Two', 'to@gmail.com', '123123', '259da31e098434969846520cee484d1a', 'police', '09123456789', NULL, 'Female', '1255123', ''),
(58, 'doctor', 'doc', 'nasa.sly14@gmail.com', 'ilocossur', 'f58cd0d01d4eb89d90f6d7220a8bc696', 'doctor', '09321845672', NULL, 'Male', 'Surgeon', '1255123');

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
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
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
-- Indexes for table `resources`
--
ALTER TABLE `resources`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `covid`
--
ALTER TABLE `covid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `outbreaks`
--
ALTER TABLE `outbreaks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
