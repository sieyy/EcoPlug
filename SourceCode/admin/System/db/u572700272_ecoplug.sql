-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2023 at 01:51 AM
-- Server version: 10.6.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u572700272_ecoplug`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Name`, `Email`, `Phone`, `Password`) VALUES
(1, 'Admin', 'admin@admin.com', '09123456789', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Device_Code` varchar(255) NOT NULL,
  `name` varchar(55) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `User_ID`, `Device_Code`, `name`, `status`, `timestamp`) VALUES
(374, 1, 'sdfa38748d', 'Room 1', 1, '2023-07-19 12:45:05'),
(375, 1, 'fafdsfa', 'Kitchen', 0, '2023-07-02 22:10:53'),
(376, 2, 'mkgyh', 'Kitchen', 0, '2023-07-19 12:18:23'),
(377, 2, 'asdko', 'Room', 0, '2023-07-19 12:18:33'),
(379, 3, 'RMX2023', 'Realme C55', 0, '2023-07-19 12:45:12'),
(383, 8, '', '', 0, '2023-07-19 12:58:32'),
(384, 8, '', '', 0, '2023-07-19 12:58:41'),
(385, 10, '123', 'LR', 0, '2023-07-19 16:37:18'),
(387, 12, 'Ali', 'Socket 1', 0, '2023-07-20 00:44:14'),
(388, 12, '2', 'Socket 2', 0, '2023-07-20 00:30:10'),
(389, 12, '3', 'Socket 3', 0, '2023-07-20 00:30:31'),
(390, 10, '02', 'CR', 0, '2023-07-20 01:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Email`, `Phone`, `Name`, `Password`) VALUES
(1, 'hernandezkleyrann@gmail.com', '0919562756', 'Claire Hernandez', 'claire29'),
(2, 'hernandez@gmail.com', '09784623810', 'Claire Ann Hernandez', 'Claire123'),
(3, 'alxmndz2001@gmail.com', '+639618277738', 'Kim Alexander Mendoza', 'pass'),
(4, 'melvinfelicisimo@gmail.com', '09454581573', 'Melvin Felicisimo', 'melvin'),
(5, 'clairehernandez@gmail.com', '09456310892', 'Kai Hernandez', 'Kai123'),
(6, 'johnpauloarquizabascuguin@gmail.com', '0', 'JOHN PAULO BASCUGUIN', 'bascuguin'),
(7, '20-78331@g.batstate-u.edu.ph', '+44639079106448', 'Kenneth Alvarez', 'admin1234'),
(8, 'Anthony@gmail.com', '09363636581', 'Anthony', '12345'),
(9, 'kentcarbayar@gmail.com', '09959211983', 'Kent Bryan Carbayar', 'kent1234'),
(10, 'jigsmadrigal0@gmail.com', '09876543219', 'Jigs Madrigal', 'pass123'),
(11, 'jonsonjordan25@gmail.com', '+639272930889', 'Jordan Jonson', '1234'),
(12, 'alybayan2@gmail.com', '09051778637', 'alii', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
