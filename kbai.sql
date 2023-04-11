-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2023 at 08:00 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbai`
--

-- --------------------------------------------------------

--
-- Table structure for table `kalimat`
--

CREATE TABLE `kalimat` (
  `id` int(11) NOT NULL,
  `indonesia` varchar(255) NOT NULL,
  `alune` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kalimat`
--

INSERT INTO `kalimat` (`id`, `indonesia`, `alune`) VALUES
(1, 'aku cinta kamu', 'beta cinta ose'),
(2, 'pergi sekolah', 'eu kola');

-- --------------------------------------------------------

--
-- Table structure for table `kata`
--

CREATE TABLE `kata` (
  `id` int(11) NOT NULL,
  `indonesia` varchar(255) NOT NULL,
  `alune` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kata`
--

INSERT INTO `kata` (`id`, `indonesia`, `alune`) VALUES
(1, 'saya', 'beta'),
(2, 'kamu', 'ose'),
(3, 'makan', 'ane');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kalimat`
--
ALTER TABLE `kalimat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kata`
--
ALTER TABLE `kata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kalimat`
--
ALTER TABLE `kalimat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kata`
--
ALTER TABLE `kata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
