-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 12:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putnoosiguranje`
--

-- --------------------------------------------------------

--
-- Table structure for table `grupno_osiguranje`
--

CREATE TABLE `grupno_osiguranje` (
  `id` int(11) NOT NULL,
  `korisnik_id` int(11) NOT NULL,
  `ime_prezime_osiguranik` varchar(255) DEFAULT NULL,
  `datum_rodjenja_osiguranik` date DEFAULT NULL,
  `broj_pasosa_osiguranik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupno_osiguranje`
--

INSERT INTO `grupno_osiguranje` (`id`, `korisnik_id`, `ime_prezime_osiguranik`, `datum_rodjenja_osiguranik`, `broj_pasosa_osiguranik`) VALUES
(1, 2, 'prijatelj', '1980-10-10', 123),
(4, 4, 'bbbb', '2019-05-21', 3665),
(7, 5, 'test', '1990-11-11', 1234),
(8, 5, 'test2', '1990-11-11', 24),
(10, 6, 'aarrrr', '2019-05-23', 12),
(11, 6, 'aass', '2019-05-23', 33),
(12, 6, 'rrr', '2019-05-23', 33332),
(13, 8, 'aarrrr', '2019-05-21', 3665),
(14, 9, 'test', '1995-06-08', 123),
(15, 9, 'test2', '1995-01-08', 1234),
(16, 9, 'test3', '1995-07-08', 12345),
(17, 9, 'test4', '1995-05-08', 1236),
(18, 10, 'aarrrr', '2019-05-08', 12),
(19, 11, 'w', '2019-05-19', 12),
(20, 13, 'jon', '1999-07-22', 1254),
(21, 13, 'doe', '1997-04-22', 12543434);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik_osiguranja`
--

CREATE TABLE `korisnik_osiguranja` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(255) NOT NULL,
  `datum_rodjenja` date NOT NULL,
  `broj_pasosa` varchar(255) NOT NULL,
  `telefon` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `datum_od` date NOT NULL,
  `datum_do` date NOT NULL,
  `vrsta_osiguranja` int(11) NOT NULL,
  `datum_unosa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `korisnik_osiguranja`
--

INSERT INTO `korisnik_osiguranja` (`id`, `ime_prezime`, `datum_rodjenja`, `broj_pasosa`, `telefon`, `email`, `datum_od`, `datum_do`, `vrsta_osiguranja`, `datum_unosa`) VALUES
(2, 'test', '1980-11-11', '123', 123, 'test@test.com', '2019-05-05', '2019-05-30', 2, '2019-05-23 09:43:39'),
(3, 'df', '2019-05-16', '123123', 123, 'test@test.com', '2019-05-08', '2019-05-30', 1, '2019-05-23 09:45:11'),
(4, 'test', '2019-05-16', '123123', 123123, 'test@test.com', '2019-05-29', '2019-06-01', 2, '2019-05-23 09:47:11'),
(5, 'test', '2001-10-10', '123123', 123123, 'ivan@test.com', '2019-05-13', '2019-05-29', 2, '2019-05-23 09:49:16'),
(6, 'test', '2019-05-22', '123123', 123123, 'test@test.com', '2019-05-19', '2019-05-28', 2, '2019-05-23 09:51:16'),
(8, 'test', '2019-05-14', '123', 123123, 'test@test.com', '2019-05-13', '2019-05-29', 2, '2019-05-23 09:56:23'),
(9, 'test', '1976-06-21', '123123', 123123, 'test@test.com', '2019-11-30', '2020-05-28', 2, '2019-05-23 09:57:44'),
(10, 'test', '2019-05-17', '4524', 121, 'test@test.ck', '2019-05-15', '2019-05-30', 2, '2019-05-23 10:00:56'),
(11, 'test', '2019-05-29', '123123', 123123, 'test@test.com', '2019-05-21', '2019-05-23', 2, '2019-05-23 10:02:25'),
(12, 'neko', '2002-03-28', '123', 123, 'test@test.com', '2019-01-25', '2019-03-31', 1, '2019-05-23 10:02:56'),
(13, 'IMe Prezime', '2011-06-24', '123123', 123123, 'test@test.com', '2019-05-14', '2019-05-30', 2, '2019-05-23 10:03:45'),
(14, 'Proba', '2011-10-29', '123123', 123123, 'test@test.com', '2019-05-22', '2019-06-01', 1, '2019-05-23 10:08:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grupno_osiguranje`
--
ALTER TABLE `grupno_osiguranje`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik_osiguranja`
--
ALTER TABLE `korisnik_osiguranja`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grupno_osiguranje`
--
ALTER TABLE `grupno_osiguranje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `korisnik_osiguranja`
--
ALTER TABLE `korisnik_osiguranja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
