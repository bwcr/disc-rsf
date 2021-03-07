-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 10:56 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `griyaps1_griya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_diri`
--

CREATE TABLE `data_diri` (
  `id` int(50) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `usia` varchar(10) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_mitra` varchar(100) NOT NULL,
  `premium` int(2) NOT NULL,
  `pD` varchar(20) NOT NULL,
  `kD` varchar(20) NOT NULL,
  `pI` varchar(20) NOT NULL,
  `kI` varchar(20) NOT NULL,
  `pS` varchar(20) NOT NULL,
  `kS` varchar(20) NOT NULL,
  `pC` varchar(20) NOT NULL,
  `sC` varchar(20) NOT NULL,
  `pStar` varchar(5) NOT NULL,
  `kStar` varchar(5) NOT NULL,
  `ttlD` varchar(20) NOT NULL,
  `ttlI` varchar(20) NOT NULL,
  `ttlS` varchar(20) NOT NULL,
  `ttlC` varchar(20) NOT NULL,
  `ppD` varchar(5) NOT NULL,
  `ppI` varchar(5) NOT NULL,
  `ppS` varchar(5) NOT NULL,
  `ppC` varchar(5) NOT NULL,
  `kkD` varchar(5) NOT NULL,
  `kkI` varchar(5) NOT NULL,
  `kkS` varchar(5) NOT NULL,
  `kkC` varchar(5) NOT NULL,
  `ttllD` varchar(5) NOT NULL,
  `ttllI` varchar(5) NOT NULL,
  `ttllS` varchar(5) NOT NULL,
  `ttllC` varchar(5) NOT NULL,
  `infop` varchar(5) NOT NULL,
  `infok` varchar(5) NOT NULL,
  `infottl` varchar(5) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `answer-1` varchar(20) DEFAULT NULL,
  `answer-2` varchar(20) DEFAULT NULL,
  `answer-3` varchar(20) DEFAULT NULL,
  `answer-4` varchar(20) DEFAULT NULL,
  `answer-5` varchar(20) DEFAULT NULL,
  `answer-6` varchar(20) DEFAULT NULL,
  `answer-7` varchar(20) DEFAULT NULL,
  `answer-8` varchar(20) DEFAULT NULL,
  `answer-9` varchar(20) DEFAULT NULL,
  `answer-10` varchar(20) DEFAULT NULL,
  `answer-11` varchar(20) DEFAULT NULL,
  `answer-12` varchar(20) DEFAULT NULL,
  `answer-13` varchar(20) DEFAULT NULL,
  `answer-14` varchar(20) DEFAULT NULL,
  `answer-15` varchar(20) DEFAULT NULL,
  `answer-16` varchar(20) DEFAULT NULL,
  `answer-17` varchar(20) DEFAULT NULL,
  `answer-18` varchar(20) DEFAULT NULL,
  `answer-19` varchar(20) DEFAULT NULL,
  `answer-20` varchar(20) DEFAULT NULL,
  `answer-21` varchar(20) DEFAULT NULL,
  `answer-22` varchar(20) DEFAULT NULL,
  `answer-23` varchar(20) DEFAULT NULL,
  `answer-24` varchar(20) DEFAULT NULL,
  `answer-25` varchar(20) DEFAULT NULL,
  `answer-26` varchar(20) DEFAULT NULL,
  `answer-27` varchar(20) DEFAULT NULL,
  `answer-28` varchar(20) DEFAULT NULL,
  `answer-29` varchar(20) DEFAULT NULL,
  `answer-30` varchar(20) DEFAULT NULL,
  `answer-31` varchar(20) DEFAULT NULL,
  `answer-32` varchar(20) DEFAULT NULL,
  `answer-33` varchar(20) DEFAULT NULL,
  `answer-34` varchar(20) DEFAULT NULL,
  `answer-35` varchar(20) DEFAULT NULL,
  `answer-36` varchar(20) DEFAULT NULL,
  `answer-37` varchar(20) DEFAULT NULL,
  `answer-38` varchar(20) DEFAULT NULL,
  `answer-39` varchar(20) DEFAULT NULL,
  `answer-40` varchar(20) DEFAULT NULL,
  `answer-41` varchar(20) DEFAULT NULL,
  `answer-42` varchar(20) DEFAULT NULL,
  `answer-43` varchar(20) DEFAULT NULL,
  `answer-44` varchar(20) DEFAULT NULL,
  `answer-45` varchar(20) DEFAULT NULL,
  `answer-46` varchar(20) DEFAULT NULL,
  `answer-47` varchar(20) DEFAULT NULL,
  `answer-48` varchar(20) DEFAULT NULL,
  `answer-49` varchar(20) DEFAULT NULL,
  `answer-50` varchar(20) DEFAULT NULL,
  `answer-51` varchar(20) DEFAULT NULL,
  `answer-52` varchar(20) DEFAULT NULL,
  `answer-53` varchar(20) DEFAULT NULL,
  `answer-54` varchar(20) DEFAULT NULL,
  `answer-55` varchar(20) DEFAULT NULL,
  `answer-56` varchar(20) DEFAULT NULL,
  `answer-57` varchar(20) DEFAULT NULL,
  `answer-58` varchar(20) DEFAULT NULL,
  `answer-59` varchar(20) DEFAULT NULL,
  `answer-60` varchar(20) DEFAULT NULL,
  `answer-61` varchar(20) DEFAULT NULL,
  `answer-62` varchar(20) DEFAULT NULL,
  `answer-63` varchar(20) DEFAULT NULL,
  `answer-64` varchar(20) DEFAULT NULL,
  `answer-65` varchar(20) DEFAULT NULL,
  `answer-66` varchar(20) DEFAULT NULL,
  `answer-67` varchar(20) DEFAULT NULL,
  `answer-68` varchar(20) DEFAULT NULL,
  `answer-69` varchar(20) DEFAULT NULL,
  `answer-70` varchar(20) DEFAULT NULL,
  `answer-71` varchar(20) DEFAULT NULL,
  `answer-72` varchar(20) DEFAULT NULL,
  `answer-73` varchar(20) DEFAULT NULL,
  `answer-74` varchar(20) DEFAULT NULL,
  `answer-75` varchar(20) DEFAULT NULL,
  `answer-76` varchar(20) DEFAULT NULL,
  `answer-77` varchar(20) DEFAULT NULL,
  `answer-78` varchar(20) DEFAULT NULL,
  `answer-79` varchar(20) DEFAULT NULL,
  `answer-80` varchar(20) DEFAULT NULL,
  `answer-81` varchar(20) DEFAULT NULL,
  `answer-82` varchar(20) DEFAULT NULL,
  `answer-83` varchar(20) DEFAULT NULL,
  `answer-84` varchar(20) DEFAULT NULL,
  `answer-85` varchar(20) DEFAULT NULL,
  `answer-86` varchar(20) DEFAULT NULL,
  `answer-87` varchar(20) DEFAULT NULL,
  `answer-88` varchar(20) DEFAULT NULL,
  `answer-89` varchar(20) DEFAULT NULL,
  `answer-90` varchar(20) DEFAULT NULL,
  `answer-91` varchar(20) DEFAULT NULL,
  `answer-92` varchar(20) DEFAULT NULL,
  `answer-93` varchar(20) DEFAULT NULL,
  `answer-94` varchar(20) DEFAULT NULL,
  `answer-95` varchar(20) DEFAULT NULL,
  `answer-96` varchar(20) DEFAULT NULL,
  `answer-97` varchar(20) DEFAULT NULL,
  `answer-98` varchar(20) DEFAULT NULL,
  `answer-99` varchar(20) DEFAULT NULL,
  `answer-100` varchar(20) DEFAULT NULL,
  `answer-101` varchar(20) DEFAULT NULL,
  `answer-102` varchar(20) DEFAULT NULL,
  `answer-103` varchar(20) DEFAULT NULL,
  `answer-104` varchar(20) DEFAULT NULL,
  `answer-105` varchar(20) DEFAULT NULL,
  `answer-106` varchar(20) DEFAULT NULL,
  `answer-107` varchar(20) DEFAULT NULL,
  `answer-108` varchar(20) DEFAULT NULL,
  `answer-109` varchar(20) DEFAULT NULL,
  `answer-110` varchar(20) DEFAULT NULL,
  `answer-111` varchar(20) DEFAULT NULL,
  `answer-112` varchar(20) DEFAULT NULL,
  `answer-113` varchar(20) DEFAULT NULL,
  `answer-114` varchar(20) DEFAULT NULL,
  `answer-115` varchar(20) DEFAULT NULL,
  `answer-116` varchar(20) DEFAULT NULL,
  `answer-117` varchar(20) DEFAULT NULL,
  `answer-118` varchar(20) DEFAULT NULL,
  `answer-119` varchar(20) DEFAULT NULL,
  `answer-120` varchar(20) DEFAULT NULL,
  `answer-121` varchar(20) DEFAULT NULL,
  `answer-122` varchar(20) DEFAULT NULL,
  `answer-123` varchar(20) DEFAULT NULL,
  `answer-124` varchar(20) DEFAULT NULL,
  `answer-125` varchar(20) DEFAULT NULL,
  `answer-126` varchar(20) DEFAULT NULL,
  `answer-127` varchar(20) DEFAULT NULL,
  `answer-128` varchar(20) DEFAULT NULL,
  `answer-129` varchar(20) DEFAULT NULL,
  `answer-130` varchar(20) DEFAULT NULL,
  `answer-131` varchar(20) DEFAULT NULL,
  `answer-132` varchar(20) DEFAULT NULL,
  `answer-133` varchar(20) DEFAULT NULL,
  `answer-134` varchar(20) DEFAULT NULL,
  `answer-135` varchar(20) DEFAULT NULL,
  `answer-136` varchar(20) DEFAULT NULL,
  `answer-137` varchar(20) DEFAULT NULL,
  `answer-138` varchar(20) DEFAULT NULL,
  `answer-139` varchar(20) DEFAULT NULL,
  `answer-140` varchar(20) DEFAULT NULL,
  `answer-141` varchar(20) DEFAULT NULL,
  `answer-142` varchar(20) DEFAULT NULL,
  `answer-143` varchar(20) DEFAULT NULL,
  `answer-144` varchar(20) DEFAULT NULL,
  `answer-145` varchar(20) DEFAULT NULL,
  `answer-146` varchar(20) DEFAULT NULL,
  `answer-147` varchar(20) DEFAULT NULL,
  `answer-148` varchar(20) DEFAULT NULL,
  `answer-149` varchar(20) DEFAULT NULL,
  `answer-150` varchar(20) DEFAULT NULL,
  `answer-151` varchar(20) DEFAULT NULL,
  `answer-152` varchar(20) DEFAULT NULL,
  `answer-153` varchar(20) DEFAULT NULL,
  `answer-154` varchar(20) DEFAULT NULL,
  `answer-155` varchar(20) DEFAULT NULL,
  `answer-156` varchar(20) DEFAULT NULL,
  `answer-157` varchar(20) DEFAULT NULL,
  `answer-158` varchar(20) DEFAULT NULL,
  `answer-159` varchar(20) DEFAULT NULL,
  `answer-160` varchar(20) DEFAULT NULL,
  `answer-161` varchar(20) DEFAULT NULL,
  `answer-162` varchar(20) DEFAULT NULL,
  `answer-163` varchar(20) DEFAULT NULL,
  `answer-164` varchar(20) DEFAULT NULL,
  `answer-165` varchar(20) DEFAULT NULL,
  `answer-166` varchar(20) DEFAULT NULL,
  `answer-167` varchar(20) DEFAULT NULL,
  `answer-168` varchar(20) DEFAULT NULL,
  `answer-169` varchar(20) DEFAULT NULL,
  `answer-170` varchar(20) DEFAULT NULL,
  `answer-171` varchar(20) DEFAULT NULL,
  `answer-172` varchar(20) DEFAULT NULL,
  `answer-173` varchar(20) DEFAULT NULL,
  `answer-174` varchar(20) DEFAULT NULL,
  `answer-175` varchar(20) DEFAULT NULL,
  `answer-176` varchar(20) DEFAULT NULL,
  `answer-177` varchar(20) DEFAULT NULL,
  `answer-178` varchar(20) DEFAULT NULL,
  `answer-179` varchar(20) DEFAULT NULL,
  `answer-180` varchar(20) DEFAULT NULL,
  `answer-181` varchar(20) DEFAULT NULL,
  `answer-182` varchar(20) DEFAULT NULL,
  `answer-183` varchar(20) DEFAULT NULL,
  `answer-184` varchar(20) DEFAULT NULL,
  `answer-185` varchar(20) DEFAULT NULL,
  `answer-186` varchar(20) DEFAULT NULL,
  `answer-187` varchar(20) DEFAULT NULL,
  `answer-188` varchar(20) DEFAULT NULL,
  `answer-189` varchar(20) DEFAULT NULL,
  `answer-190` varchar(20) DEFAULT NULL,
  `answer-191` varchar(20) DEFAULT NULL,
  `answer-192` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_diri_pending`
--

CREATE TABLE `data_diri_pending` (
  `id` int(11) NOT NULL,
  `id_mitra` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_mitra` int(5) NOT NULL,
  `mitra` varchar(20) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `list1` varchar(50) NOT NULL,
  `list2` varchar(50) NOT NULL,
  `list3` varchar(50) NOT NULL,
  `list4` varchar(50) NOT NULL,
  `list5` varchar(50) NOT NULL,
  `list6` varchar(50) NOT NULL,
  `list7` varchar(50) NOT NULL,
  `list8` varchar(50) NOT NULL,
  `list9` varchar(50) NOT NULL,
  `list10` varchar(100) NOT NULL,
  `list11` varchar(100) NOT NULL,
  `list12` varchar(100) NOT NULL,
  `jobs` varchar(1000) NOT NULL,
  `paragraph` varchar(1500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results_line_1`
--

CREATE TABLE `results_line_1` (
  `score` int(25) NOT NULL,
  `D` int(25) NOT NULL,
  `I` int(25) NOT NULL,
  `S` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sheet1`
--

CREATE TABLE `sheet1` (
  `A` varchar(10) DEFAULT NULL,
  `B` int(3) DEFAULT NULL,
  `C` varchar(4) DEFAULT NULL,
  `D` varchar(3) DEFAULT NULL,
  `E` varchar(3) DEFAULT NULL,
  `F` varchar(4) DEFAULT NULL,
  `G` varchar(3) DEFAULT NULL,
  `H` varchar(3) DEFAULT NULL,
  `I` varchar(3) DEFAULT NULL,
  `J` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sheet3`
--

CREATE TABLE `sheet3` (
  `A` varchar(10) DEFAULT NULL,
  `B` int(3) DEFAULT NULL,
  `C` varchar(4) DEFAULT NULL,
  `D` varchar(3) DEFAULT NULL,
  `E` varchar(3) DEFAULT NULL,
  `F` varchar(4) DEFAULT NULL,
  `G` varchar(3) DEFAULT NULL,
  `H` varchar(3) DEFAULT NULL,
  `I` varchar(3) DEFAULT NULL,
  `J` varchar(3) DEFAULT NULL,
  `K` varchar(10) DEFAULT NULL,
  `L` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sheet3_(2)`
--

CREATE TABLE `sheet3_(2)` (
  `A` varchar(10) DEFAULT NULL,
  `B` int(3) DEFAULT NULL,
  `C` varchar(3) DEFAULT NULL,
  `D` varchar(3) DEFAULT NULL,
  `E` varchar(3) DEFAULT NULL,
  `F` varchar(3) DEFAULT NULL,
  `G` varchar(3) DEFAULT NULL,
  `H` varchar(3) DEFAULT NULL,
  `I` varchar(3) DEFAULT NULL,
  `J` varchar(3) DEFAULT NULL,
  `K` varchar(10) DEFAULT NULL,
  `L` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_diri_pending`
--
ALTER TABLE `data_diri_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_diri`
--
ALTER TABLE `data_diri`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_diri_pending`
--
ALTER TABLE `data_diri_pending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id_mitra` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
