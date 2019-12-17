-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2020 at 05:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_spk`
--
CREATE DATABASE IF NOT EXISTS `smart_spk` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `smart_spk`;

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nm_alternatif` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
(1, 'Sharp Freon R32'),
(24, 'Daikin R32'),
(25, 'Panasonic Deluxe'),
(27, 'LG DC10MV');

-- --------------------------------------------------------

--
-- Table structure for table `harga`
--

CREATE TABLE `harga` (
  `id_subkriteria` int(11) NOT NULL,
  `harga_min` varchar(11) NOT NULL,
  `harga_max` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `harga`
--

INSERT INTO `harga` (`id_subkriteria`, `harga_min`, `harga_max`) VALUES
(1, '<', '999999'),
(2, '>', '1000000'),
(3, '>', '2000000');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nm_kriteria` varchar(20) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nm_kriteria`, `bobot`) VALUES
(1, 'Harga', 50),
(2, 'Dingin', 50),
(7, 'Hemat Energi', 50),
(9, 'Bentuk nya simple', 30);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_alternatif`
--

CREATE TABLE `nilai_alternatif` (
  `id_nilaialternatif` int(11) NOT NULL,
  `id_alternatif` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_subkriteria` int(11) NOT NULL,
  `nilai_kriteria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai_alternatif`
--

INSERT INTO `nilai_alternatif` (`id_nilaialternatif`, `id_alternatif`, `id_kriteria`, `id_subkriteria`, `nilai_kriteria`) VALUES
(67, 15, 1, 2, 0),
(68, 15, 2, 4, 0),
(69, 15, 7, 17, 0),
(70, 19, 1, 3, 0),
(71, 19, 2, 4, 0),
(72, 19, 7, 17, 0),
(74, 22, 1, 1, 0),
(75, 22, 2, 5, 0),
(76, 22, 7, 17, 0),
(77, 1, 1, 2, 0),
(78, 1, 2, 4, 0),
(79, 1, 7, 24, 0),
(80, 24, 1, 3, 0),
(81, 24, 2, 4, 0),
(82, 24, 7, 24, 0),
(83, 25, 1, 1, 0),
(84, 25, 2, 6, 0),
(85, 25, 7, 28, 0),
(86, 27, 1, 2, 0),
(87, 27, 2, 5, 0),
(88, 27, 7, 25, 0),
(92, 29, 1, 1, 0),
(93, 29, 2, 6, 0),
(94, 29, 7, 28, 0),
(98, 1, 9, 29, 0),
(99, 24, 9, 30, 0),
(100, 25, 9, 29, 0),
(101, 27, 9, 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `normalisasi_kriteria`
--

CREATE TABLE `normalisasi_kriteria` (
  `id_kriteria` int(11) DEFAULT NULL,
  `normalisasi` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `normalisasi_kriteria`
--

INSERT INTO `normalisasi_kriteria` (`id_kriteria`, `normalisasi`) VALUES
(1, 0.5),
(2, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id_alternatif` int(11) DEFAULT NULL,
  `skor` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id_alternatif`, `skor`) VALUES
(1, 86.1111),
(24, 70.8333),
(25, 58.3333),
(27, 58.3333);

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id_subkriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nm_subkriteria` varchar(20) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id_subkriteria`, `id_kriteria`, `nm_subkriteria`, `nilai`) VALUES
(1, 1, 'Murah (< 2000000)', 100),
(2, 1, 'Sedang (<5000000)', 50),
(3, 1, 'Mahal (>=5000000)', 25),
(4, 2, 'Dingin', 100),
(5, 2, 'Agak Dingin', 50),
(6, 2, 'Kurang Dingin', 25),
(24, 7, 'Sangat Hemat', 100),
(25, 7, 'Hemat', 50),
(28, 7, 'Cukup Hemat', 25),
(29, 9, 'Ya', 100),
(30, 9, 'Tidak', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  ADD PRIMARY KEY (`id_nilaialternatif`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id_subkriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_alternatif`
--
ALTER TABLE `nilai_alternatif`
  MODIFY `id_nilaialternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id_subkriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
