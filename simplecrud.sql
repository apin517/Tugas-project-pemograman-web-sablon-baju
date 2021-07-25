-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 03:13 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simplecrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(3) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `user`, `pass`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `sablon`
--

CREATE TABLE `sablon` (
  `id` int(3) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sablon`
--

INSERT INTO `sablon` (`id`, `gambar`, `nama`, `keterangan`, `harga`) VALUES
(2, 'Plastisol.jpg', 'Plastisol', 'Sablon kaos plastisol, sablon yang mampu mencetak raster atau dot yang sangat kecil. Sayangnya, sablon jenis ini tergolong mahal.', 15000),
(6, 'foam.jpg', 'Foam', 'Sablon foam, hasil sablon ini lebih timbul dibandingkan sablon rubber (menimbulkan efek timbul pada kaos).', 17000),
(8, 'glow.jpg', 'Glow In The Dark', 'Sablon glow in the dark, seperti namanya, hasil sablon ini dapat bersinar dalam tempat yang gelap.', 25000),
(9, 'Rubber.webp', 'Rubber', 'Sablon kaos rubber, merupakan jenis tinta sablon yang sering digunakan karena cat sablon cenderung awet dan bisa diseterika.', 12000),
(10, 'images (3).jpg', 'Premium', 'Premium lah masak pertalite', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tipe` varchar(20) NOT NULL,
  `qty` int(3) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `harga`, `email`, `gambar`, `tipe`, `qty`, `total`) VALUES
(24, 'Jeje', 1000, 'aznyan100@gmail.com', '063960300_1585046213-social-4954309.jpg', 'Plastisol', 0, 0),
(25, 'asd', 10000, 'bagus.azusa999', 'Sick Kid.jpg', 'Plastisol', 0, 0),
(26, 'asd', 15000, 'aznyan100@gmail.com', 'Sick Kid.jpg', 'Rubber', 0, 0),
(27, 'Bagus', 10000, 'bagoesez0911@gmail.com', 'images (3).jpg', 'Plastisol', 12, 0),
(28, 'Bagus', 15000, 'aznyan100@gmail.com', '063960300_1585046213-social-4954309.jpg', 'Rubber', 7, 105000),
(31, 'Bagusa', 12000, 'aznyan100@gmail.com', 'foam.jpg', 'Rubber', 3, 36000),
(32, 'Bagus', 25000, 'bagoesez0911@gmail.com', '063960300_1585046213-social-4954309.jpg', 'GlowInTheDark', 1, 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sablon`
--
ALTER TABLE `sablon`
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
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sablon`
--
ALTER TABLE `sablon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
