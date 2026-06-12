-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2026 at 02:12 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

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
('KND001', 'Toyota', 'Avanza Veloz', 2022, 250000000.00, 1500, 'Bensin'),
('KND002', 'Honda', 'Civic Type R', 2023, 1200000000.00, 2000, 'Pertamax Turbo'),
('KND007', 'Mitsubishi', 'Pajero Sport', 2023, 580000000.00, 2400, 'Diesel'),
('KND008', 'Suzuki', 'Ertiga Hybrid', 2022, 270000000.00, 1500, 'Bensin'),
('KND013', 'BMW', 'M4 Competition', 2023, 2200000000.00, 3000, 'Pertamax Turbo'),
('KND014', 'Mercedes-Benz', 'C300 AMG Line', 2022, 1150000000.00, 2000, 'Pertamax Turbo');

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

--
-- Dumping data for table `mobil_listrik`
--

INSERT INTO `mobil_listrik` (`id_kendaraan`, `brand`, `model`, `tahun`, `harga_dasar`, `kapasitas_baterai`, `jarak_tempuh`) VALUES
('EV-001', 'Tesla', 'Model 3 Long Range', 2023, 850000000.00, 75, 576),
('EV-002', 'Hyundai', 'Ioniq 5 Signature', 2024, 780000000.00, 72.6, 481),
('EV-003', 'Wuling', 'Air EV Long Range', 2023, 275000000.00, 26.7, 300),
('EV-004', 'BYD', 'Atto 3 Superior', 2024, 515000000.00, 60.48, 480),
('EV-005', 'Nissan', 'Leaf', 2022, 738000000.00, 40, 311),
('EV-006', 'MG', '4 EV Magnify', 2024, 433000000.00, 51, 425);

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
-- Dumping data for table `motor_besar`
--

INSERT INTO `motor_besar` (`id_kendaraan`, `brand`, `model`, `tahun`, `harga_dasar`, `tipe_rantai`, `mode_berkendara`) VALUES
('MTR-001', 'Honda', 'EM1 e: Plus', 2024, 40000000.00, 'Heavy Duty', 'Econ, Standard'),
('MTR-002', 'Kawasaki', 'Ninja e-1', 2023, 149000000.00, 'O-ring Chain', 'Eco, Road'),
('MTR-003', 'Alva', 'Cervo', 2024, 42750000.00, 'Drive Belt', 'Eco, Urban, Sport'),
('MTR-004', 'United', 'T1800', 2023, 30500000.00, 'Standard Roller', 'Eco, Normal, Sport'),
('MTR-005', 'Gesits', 'Raya G', 2024, 28000000.00, 'Belt Drive', 'Eco, Urban'),
('MTR-006', 'Pacific', 'Whiz', 2023, 18000000.00, 'Standard Chain', 'Eco, Normal');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
