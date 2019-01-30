-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2019 at 03:41 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `c_details`
--

CREATE TABLE `c_details` (
  `Id` int(1) NOT NULL,
  `Name` varchar(10) NOT NULL,
  `Image` varchar(15) NOT NULL,
  `Price` int(10) NOT NULL,
  `Stock` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_details`
--

INSERT INTO `c_details` (`Id`, `Name`, `Image`, `Price`, `Stock`) VALUES
(7, 'Mercedes', 'mercedes.webp', 98000, 3),
(8, 'Camaro', 'Camaro.webp', 96000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Id` int(11) NOT NULL,
  `Username` varchar(12) NOT NULL,
  `Password` varchar(12) NOT NULL,
  `Mobile` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Id`, `Username`, `Password`, `Mobile`) VALUES
(2, 'cust', 'cust', 8879),
(7, 'trial', 'trial', 88798);

-- --------------------------------------------------------

--
-- Table structure for table `subimages`
--

CREATE TABLE `subimages` (
  `Id` int(11) NOT NULL,
  `img_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subimages`
--

INSERT INTO `subimages` (`Id`, `img_name`) VALUES
(7, 'm-2.webp'),
(7, 'm-1.webp'),
(8, 'Camaro.webp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_details`
--
ALTER TABLE `c_details`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `subimages`
--
ALTER TABLE `subimages`
  ADD KEY `Id_fk1` (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_details`
--
ALTER TABLE `c_details`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subimages`
--
ALTER TABLE `subimages`
  ADD CONSTRAINT `Id_fk1` FOREIGN KEY (`Id`) REFERENCES `c_details` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
