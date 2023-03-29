-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2022 at 10:55 AM
-- Server version: 10.3.35-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hivaindb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `clientID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `minA` int(6) DEFAULT NULL,
  `maxA` int(6) DEFAULT NULL,
  `enA` int(1) DEFAULT NULL,
  `cA` float DEFAULT NULL,
  `minB` int(6) DEFAULT NULL,
  `maxB` int(6) DEFAULT NULL,
  `enB` int(1) DEFAULT NULL,
  `cB` float DEFAULT NULL,
  `minC` int(6) DEFAULT NULL,
  `maxC` int(6) DEFAULT NULL,
  `enC` tinyint(1) DEFAULT NULL,
  `cC` float DEFAULT NULL,
  `minD` int(6) DEFAULT NULL,
  `maxD` int(6) DEFAULT NULL,
  `enD` int(1) DEFAULT NULL,
  `cD` float DEFAULT NULL,
  `num1` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `num2` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `num3` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL,
  `aL` int(1) DEFAULT NULL,
  `daL` int(10) UNSIGNED DEFAULT NULL,
  `sndSMS` int(1) DEFAULT NULL,
  `dSMS` int(1) UNSIGNED DEFAULT NULL,
  `rpt` int(1) DEFAULT NULL,
  `lat` bigint(20) DEFAULT NULL,
  `lng` bigint(20) DEFAULT NULL,
  `cnf` int(6) DEFAULT NULL,
  `ver` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `ten` int(1) DEFAULT NULL,
  `ton` time DEFAULT NULL,
  `toff` time DEFAULT NULL,
  `timeupdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dataAnalysis`
--

CREATE TABLE `dataAnalysis` (
  `ID` int(10) UNSIGNED NOT NULL,
  `clientID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `deviceIP` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `inputA` float NOT NULL,
  `inputB` float NOT NULL,
  `inputC` float NOT NULL,
  `inputD` float NOT NULL,
  `inputE` float NOT NULL,
  `inputF` int(30) NOT NULL,
  `inputG` int(30) NOT NULL,
  `inputH` bigint(30) NOT NULL,
  `sensorA` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorB` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorC` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorD` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorE` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorF` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorG` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorH` varchar(8) COLLATE utf8_persian_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` bigint(20) NOT NULL,
  `clientID` int(6) NOT NULL,
  `username` varchar(255) NOT NULL,
  `deviceName` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `inputA` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputB` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputC` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputD` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputE` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputF` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputG` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `inputH` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorA` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorB` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorC` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorD` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorE` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorF` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorG` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `sensorH` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lastDataID`
--

CREATE TABLE `lastDataID` (
  `clientID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `deviceIP` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `inputA` int(11) NOT NULL,
  `inputB` int(11) NOT NULL,
  `inputC` int(11) NOT NULL,
  `inputD` int(11) NOT NULL,
  `inputE` int(11) NOT NULL,
  `inputF` int(11) NOT NULL,
  `inputG` int(11) NOT NULL,
  `inputH` bigint(20) NOT NULL,
  `sensorA` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorB` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorC` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorD` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorE` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorF` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorG` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorH` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `usr` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `chatID` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `enBale` tinyint(1) DEFAULT NULL,
  `enEmail` tinyint(1) DEFAULT NULL,
  `statusBale` tinyint(1) DEFAULT NULL,
  `statusEmail` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `clientID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `usr` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `loc` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `mac` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `project` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `label` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `battery` int(9) NOT NULL,
  `dws` int(3) DEFAULT NULL,
  `en_in` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `inStatus` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `en_sen` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ID` int(11) UNSIGNED NOT NULL,
  `clientID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramA` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramB` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramC` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramD` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramE` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramF` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramG` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `paramH` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `THW_L`
--

CREATE TABLE `THW_L` (
  `ID` int(10) UNSIGNED NOT NULL,
  `clientID` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `inputA` float NOT NULL,
  `inputB` float NOT NULL,
  `inputC` float NOT NULL,
  `inputD` float NOT NULL,
  `inputE` float NOT NULL,
  `inputF` int(30) NOT NULL,
  `inputG` int(30) NOT NULL,
  `inputH` bigint(30) NOT NULL,
  `sensorA` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorB` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorC` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorD` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorE` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorF` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorG` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `sensorH` varchar(3) COLLATE utf8_persian_ci NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `forgot_password` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `tel` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `role` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `dataAnalysis`
--
ALTER TABLE `dataAnalysis`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `time_date` (`time_date`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientID` (`clientID`);

--
-- Indexes for table `lastDataID`
--
ALTER TABLE `lastDataID`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`usr`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`clientID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `THW_L`
--
ALTER TABLE `THW_L`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `time_date` (`time_date`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `email` (`email`(250));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataAnalysis`
--
ALTER TABLE `dataAnalysis`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `THW_L`
--
ALTER TABLE `THW_L`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
