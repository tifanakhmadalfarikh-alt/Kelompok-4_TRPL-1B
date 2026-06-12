-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 09, 2026 at 02:42 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION; 
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `showroom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `tahun` int NOT NULL,
  `harga_dasar` decimal(15,2) NOT NULL,
  `kategori` enum('Konvensional','Listrik','Moge') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobil_konvensional`
--

CREATE TABLE `mobil_konvensional` (
  `id_kendaraan` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `tahun` int NOT NULL,
  `harga_dasar` decimal(15,2) NOT NULL,
  `kapasitas_mesin` int NOT NULL,
  `jenis_bahan_bakar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mobil_listrik`
--

CREATE TABLE `mobil_listrik` (
  `id_kendaraan` varchar(20) NOT NULL,
  `kapasitas_baterai` int NOT NULL,
  `jarak_tempuh` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motor_besar`
--

CREATE TABLE `motor_besar` (
  `id_kendaraan` varchar(20) NOT NULL,
  `tipe_rantai` varchar(30) NOT NULL,
  `mode_berkendara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mobil_konvensional`
-- (See below for the actual view)
--
CREATE TABLE `v_mobil_konvensional` (
`brand` varchar(50)
,`harga_dasar` decimal(15,2)
,`id_kendaraan` varchar(20)
,`jenis_bahan_bakar` varchar(30)
,`kapasitas_mesin` int
,`model` varchar(50)
,`pajak_tahunan` decimal(19,4)
,`tahun` int
);

-- --------------------------------------------------------

--
-- Structure for view `v_mobil_konvensional`
--
DROP TABLE IF EXISTS `v_mobil_konvensional`;
 
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mobil_konvensional`  AS SELECT `mobil_konvensional`.`id_kendaraan` AS `id_kendaraan`, `mobil_konvensional`.`brand` AS `brand`, `mobil_konvensional`.`model` AS `model`, `mobil_konvensional`.`tahun` AS `tahun`, `mobil_konvensional`.`harga_dasar` AS `harga_dasar`, `mobil_konvensional`.`kapasitas_mesin` AS `kapasitas_mesin`, `mobil_konvensional`.`jenis_bahan_bakar` AS `jenis_bahan_bakar`, ((0.02 * `mobil_konvensional`.`harga_dasar`) + (`mobil_konvensional`.`kapasitas_mesin` * 500)) AS `pajak_tahunan` FROM `mobil_konvensional``mobil_konvensional`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `mobil_konvensional`
--
ALTER TABLE `mobil_konvensional`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `mobil_listrik`
--
ALTER TABLE `mobil_listrik`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `motor_besar`
--
ALTER TABLE `motor_besar`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mobil_listrik`
--
ALTER TABLE `mobil_listrik`
  ADD CONSTRAINT `mobil_listrik_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE;

--
-- Constraints for table `motor_besar`
--
ALTER TABLE `motor_besar`
  ADD CONSTRAINT `motor_besar_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
