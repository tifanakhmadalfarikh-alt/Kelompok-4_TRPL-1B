-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2026 at 03:39 AM
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
-- Database: `showroom`
--

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

--
-- Dumping data for table `mobil_konvensional`
--

INSERT INTO `mobil_konvensional` (`id_kendaraan`, `brand`, `model`, `tahun`, `harga_dasar`, `kapasitas_mesin`, `jenis_bahan_bakar`) VALUES
('KND001', 'Toyota', 'Avanza Veloz', 2022, '250000000.00', 1500, 'Bensin'),
('KND002', 'Honda', 'Civic Type R', 2023, '1200000000.00', 2000, 'Pertamax Turbo'),
('KND007', 'Mitsubishi', 'Pajero Sport', 2023, '580000000.00', 2400, 'Diesel'),
('KND008', 'Suzuki', 'Ertiga Hybrid', 2022, '270000000.00', 1500, 'Bensin'),
('KND013', 'BMW', 'M4 Competition', 2023, '2200000000.00', 3000, 'Pertamax Turbo'),
('KND014', 'Mercedes-Benz', 'C300 AMG Line', 2022, '1150000000.00', 2000, 'Pertamax Turbo');

-- --------------------------------------------------------

--
-- Table structure for table `mobil_listrik`
--

CREATE TABLE `mobil_listrik` (
  `id_kendaraan` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `tahun` int NOT NULL,
  `harga_dasar` decimal(15,2) NOT NULL,
  `kapasitas_baterai` float NOT NULL,
  `jarak_tempuh` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `motor_besar`
--

CREATE TABLE `motor_besar` (
  `id_kendaraan` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `tahun` int NOT NULL,
  `harga_dasar` decimal(15,2) NOT NULL,
  `tipe_rantai` varchar(30) NOT NULL,
  `mode_berkendara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
