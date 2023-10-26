-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 26 okt 2023 om 18:49
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangalogger`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `collected`
--

CREATE TABLE `collected` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `mangaid` int(11) NOT NULL,
  `wishlist` tinyint(1) NOT NULL,
  `owned` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `collected`
--

INSERT INTO `collected` (`id`, `userid`, `mangaid`, `wishlist`, `owned`) VALUES
(5, 3, 17, 0, 0),
(6, 3, 16, 0, 1),
(10, 3, 15, 1, 0),
(11, 4, 15, 0, 1),
(12, 4, 17, 1, 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `series` varchar(50) NOT NULL,
  `info` text NOT NULL,
  `amountHave` int(11) NOT NULL DEFAULT 0,
  `amountWant` int(11) NOT NULL DEFAULT 0,
  `image_url` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `manga`
--

INSERT INTO `manga` (`id`, `name`, `price`, `series`, `info`, `amountHave`, `amountWant`, `image_url`) VALUES
(15, 'MG ZGMF-1000/A1 Gunner ZAKU Warrior (Lunamaria Hawke Custom)', 4300, 'Mobile Suit Gundam SEED Destiny', 'The Master Grade (MG) ZGMF-1000/A1 Gunner ZAKU Warrior (Lunamaria Hawke Custom) is a 1/100 scale kit released in 2019. ', 0, 0, '653a6c5a421c6.webp'),
(16, 'MG MS-06S Zaku II (Ver. 2.0)', 3500, 'Mobile Suit Gundam', 'The Master Grade (MG) MS-06S Zaku II (Ver. 2.0) is a 1/100 scale kit released in 2009.', 0, 0, '653a6cd6894f6.webp'),
(17, 'HGI-BO ASW-G-08 Gundam Barbatos', 1000, 'Mobile Suit Gundam IRON-BLOODED ORPHANS', 'The High Grade IRON-BLOODED ORPHANS (HGI-BO) ASW-G-08 Gundam Barbatos is a 1/144 scale kit released in 2015. ', 0, 0, '653a6db471337.webp');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uid` varchar(25) NOT NULL,
  `pwd` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `user`
--

INSERT INTO `user` (`id`, `uid`, `pwd`, `email`) VALUES
(3, 'arsedog', 'poepie', 'shoopiediedoo@gmail.com'),
(4, 'markusbob', 'mistertoilet', 'markussybussy@gmail.com');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `collected`
--
ALTER TABLE `collected`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `collected`
--
ALTER TABLE `collected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT voor een tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
