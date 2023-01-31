-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2020 at 03:58 PM
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
-- Database: `raumverwaltung`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bid` int(11) NOT NULL,
  `date` date NOT NULL,
  `tid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `position` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `position`) VALUES
(1, 'Gast'),
(2, 'Benutzer'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `rid` int(11) NOT NULL,
  `number` varchar(4) NOT NULL,
  `floor` int(11) NOT NULL,
  `building` int(11) NOT NULL,
  `personen` int(11) NOT NULL,
  `art` varchar(50) NOT NULL,
  `equipment` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`rid`, `number`, `floor`, `building`, `personen`, `art`, `equipment`) VALUES
(15, '101', 1, 11, 15, 'Seminar', 'Beamer'),
(16, '502', 5, 11, 20, 'Arbeitsraum', 'Arbeitsplätze + Beamer'),
(17, '503', 5, 11, 20, 'Englisch', 'Beamer'),
(18, '506', 5, 11, 15, 'Seminar', 'Beamer'),
(19, '509', 5, 11, 20, 'Englisch', 'Beamer'),
(20, '101a', 1, 13, 28, 'Arbeitsraum', 'Arbeitsplätze + Beamer'),
(21, '101b', 1, 13, 28, 'Arbeitsraum', 'Arbeitsplätze '),
(22, '101d', 1, 13, 6, 'Seminar', 'Beamer'),
(23, '107', 1, 13, 12, 'Seminar', 'Monitor'),
(24, '109', 1, 13, 28, 'Arbeitsraum', 'Arbeitsplätze'),
(25, '111', 1, 13, 28, 'Arbeitsraum', 'Arbeitsplätze'),
(26, '113', 1, 13, 12, 'Netzwerklabor', 'Labor + Beamer'),
(27, '114', 1, 13, 12, 'Seminar', 'Display'),
(28, '114a', 1, 13, 3, 'PC-Werkstatt', 'Beamer');

-- --------------------------------------------------------

--
-- Table structure for table `timeperiod`
--

CREATE TABLE `timeperiod` (
  `tid` int(11) NOT NULL,
  `period` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeperiod`
--

INSERT INTO `timeperiod` (`tid`, `period`) VALUES
(1, '08:00-10:00'),
(2, '10:00-12:00'),
(3, '12:00-15:00'),
(4, '08:00-15:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `secondname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `secondname`, `email`, `password`, `role_id`) VALUES
(27, 'Birgit', 'Bockholt', 'Bockholt@bfw.de', '$2y$10$FLO1Cy.rfQc1oCFFV6UG4uSFbw7ucE/5FCrpAJwPtx25PgWx1.vHa', 2),
(28, 'Axel', 'Clemens', 'Clemens@bfw.de', '$2y$10$y8NukjfycsOu.Gr7ltMtquimQcWHCSiP6RgIz2heKE5XNrzfiPn2e', 2),
(29, 'Klaus', 'Clement', 'Clement@bfw.de', '$2y$10$qR9HficW7Yl4Q4qapQt8iekSyHa8XW6K/DDQ4rGtIuAp9HjlI/lzy', 2),
(30, 'Eberhard', 'Dähling', 'Dähling@bfw.de', '$2y$10$kpslPl0BXIc23t9dmCysyOajLQyBmqIR/4gCjivtrR0Q2Mp5s9NfG', 2),
(31, 'Daniel', 'Engel', 'Engel@bfw.de', '$2y$10$IQIt76kKOyKKSPZFX8H3C.R825wHMl1tzAtQF.ys59q5u8S6b7b/a', 1),
(32, 'Sven', 'Fricke', 'Fricke@bfw.de', '$2y$10$tkqdabfvBWy6upCCxJaPLexfyIW97qybY0RwipCm3OJYk/TQcPbyu', 2),
(33, 'Jasper', 'Frieling', 'Frieling@bfw.de', '$2y$10$iB7s42F/PnzU/inUmhL6YOjft/z7PGz8s0CNi6UsYmHOKPXzrDYJ6', 1),
(34, 'Britta', 'Hagge', 'Hagge@bfw.de', '$2y$10$aRcH6h7VuM8z3kk3mYvOoeg.eB4O26J.jf3Gzk6eKNQiZrzQCyLLm', 2),
(35, 'Michael', 'Hertel', 'Hertel@bfw.de', '$2y$10$ApnlvY7W.ENdojK0yIIL1uxKM3t697aeGDdRcMQzVGR6UaSqydjH6', 2),
(36, 'Henning', 'Hinze', 'Hinze@bfw.de', '$2y$10$8Pv6T3eeWh4dAJVZCWceJO6Lk8P1QmPF300/ERRC.ADRL20owhz/C', 2),
(37, 'Clara', 'Kannenberg', 'Kannenberg@bfw.de', '$2y$10$3tOj1Cbejj8ENnru5ZPBM.F62AFlbUAp2H2m9FwBkF3eYoF1898X6', 3),
(38, 'Sandi', 'Klein', 'Klein@bfw.de', '$2y$10$lfuG6PbZ0Lorbba3j9lFsePtKoSK/zpqVBsschcb41KBen9115hGG', 2),
(39, 'Olaf', 'Kubillus', 'Kubillus@bfw.de', '$2y$10$DCLCsAn9C4w9RKFZOrZDu.R3AvF5sjt5U8phoZVwS6wpywL/ChSiW', 2),
(40, 'John', 'Lawrence', 'Lawrence@bfw.de', '$2y$10$WR9vCP5gDSkeUCoHshzvBOvVrhoZnTEwnzXzOsxYNHW4Z.HJhuUBa', 1),
(41, 'Michael', 'Mackenstein', 'Mackenstein@bfw.de', '$2y$10$Gmv5H5clnl.WGy4uQC.N1eYtHM0./GTarORBHRNBn1dznoSsYcfzG', 2),
(42, 'Mark', 'Nicolai', 'Nicolai@bfw.de', '$2y$10$89HT3rWhf.JCrS2No5VNBeSKYx.2ymXq8JvMAvnqhbHjunk5KJGYi', 2),
(43, 'Sven', 'Seddig', 'Seddig@bfw.de', '$2y$10$HC5Ka6DJvYgGd8r/6iAkXOM2UMpskstASHkCed23bVjkcSDwLkj2e', 2),
(44, 'Marco', 'Thiele', 'Thiele@bfw.de', '$2y$10$gMdR8RL7mbee03syfB8CsuDCluL6yXwU8tFeG.DEztHMy.8YygfLa', 2),
(45, 'Bärbel', 'Thoß', 'Thoß@bfw.de', '$2y$10$IghHBG536zlrdDsQKBB3ouAAuHDcC9HuntK9zjX.s72Zmxxe485Tq', 3),
(46, 'Petra', 'Treubel', 'Treubel@bfw.de', '$2y$10$70lYouLEQGOFds5WUrfVxuDbvrwYpcTg9.uyJRFSSSdFJvGG4.dCu', 2),
(47, 'Sally', 'Wiggins', 'Wiggins@bfw.de', '$2y$10$mGQCHmN0vt66/i3AriR6IeKecxsoq9c4s5HHkPBDSCXWYb6Z/lbAC', 1),
(48, 'Florian', 'Zimmermann', 'Zimmermann@bfw.de', '$2y$10$M3wtbD5oj8kiQiniHoEX3ejSxC4C.lc0LwgF/3tp1rQw5cxA2E12i', 2),
(49, 'Radi', 'Galani', 'radi@galani.de', '$2y$10$eCALVxGBlw/5RCV96keoNOOTCC1Ogw4zgTlol03GtkjsnyE6yhMwO', 3),
(50, 'John', 'Smith', 'john@smith.de', '$2y$10$cudFAadilzVXML4877X78eG0N2XaFCA.kM4nJz2aY1hXx.hz39I2K', 2),
(52, 'Lev', 'Danilin', 'lev@danilin.de', '$2y$10$J8meimJJ3fDHk8fRZsMP9uIz1lviMoRJCdrcPLVU0wgtzkKYvQ07a', 3),
(53, 'Maria', 'Braun', 'maria@braun.de', '$2y$10$xXfGW5ej9MpC1KtOV32.OuwW5X0rxhvkEDK07NlyvLW9prUt6INV6', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `bookingtimeperiod` (`tid`),
  ADD KEY `bookinguser` (`uid`),
  ADD KEY `bookingroom` (`rid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `timeperiod`
--
ALTER TABLE `timeperiod`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `timeperiod`
--
ALTER TABLE `timeperiod`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `bookingroom` FOREIGN KEY (`rid`) REFERENCES `room` (`rid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookingtimeperiod` FOREIGN KEY (`tid`) REFERENCES `timeperiod` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookinguser` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
