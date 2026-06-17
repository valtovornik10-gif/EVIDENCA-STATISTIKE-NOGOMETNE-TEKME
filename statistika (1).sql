-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: 127.0.0.1
-- Čas nastanka: 17. jun 2026 ob 11.43
-- Različica strežnika: 10.4.32-MariaDB
-- Različica PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `statistika`
--

-- --------------------------------------------------------

--
-- Struktura tabele `dogodek`
--

CREATE TABLE `dogodek` (
  `id` int(11) NOT NULL,
  `minuta` int(11) NOT NULL,
  `tekma_id` int(11) NOT NULL,
  `igralec_id` int(11) NOT NULL,
  `uporabnik_id` int(11) NOT NULL,
  `tip_dogodka_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `dogodek`
--

INSERT INTO `dogodek` (`id`, `minuta`, `tekma_id`, `igralec_id`, `uporabnik_id`, `tip_dogodka_id`) VALUES
(1, 9, 1, 12, 1, 1),
(2, 11, 1, 6, 1, 2),
(3, 10, 3, 23, 1, 1),
(4, 12, 5, 9, 1, 3),
(5, 14, 5, 9, 1, 4),
(6, 11, 6, 3, 3, 3),
(7, 12, 7, 7, 4, 1),
(8, 15, 7, 1, 4, 4),
(9, 15, 7, 13, 4, 4),
(10, 67, 8, 36, 1, 1),
(11, 9, 17, 25, 1, 1),
(12, 8, 17, 3, 1, 2),
(13, 11, 18, 3, 1, 1),
(14, 17, 18, 2, 1, 4),
(15, 16, 18, 17, 1, 2),
(16, 17, 18, 19, 1, 1),
(17, 37, 18, 17, 1, 3),
(18, 39, 18, 5, 1, 3),
(19, 65, 18, 3, 1, 1),
(20, 35, 18, 37, 1, 1),
(21, 8, 19, 3, 1, 1),
(22, 19, 20, 6, 1, 1),
(23, 12, 21, 3, 1, 1),
(24, 13, 22, 9, 1, 1),
(25, 10, 22, 10, 1, 1),
(26, 6, 22, 34, 1, 1),
(27, 18, 22, 38, 1, 1),
(28, 1, 23, 19, 1, 1),
(29, 9, 23, 19, 1, 4),
(30, 10, 23, 16, 1, 1),
(31, 15, 23, 16, 1, 1),
(32, 7, 30, 10, 1, 1),
(33, 5, 31, 9, 1, 1),
(34, 16, 34, 9, 7, 1),
(35, 22, 35, 19, 1, 4),
(36, 23, 35, 16, 1, 1),
(37, 1, 35, 20, 1, 1),
(38, 9, 37, 25, 1, 1),
(39, 10, 38, 39, 1, 1),
(40, 13, 38, 39, 1, 4),
(41, 10, 41, 9, 1, 1),
(42, 3, 45, 22, 1, 3),
(43, 9, 46, 25, 1, 1),
(44, 8, 46, 25, 1, 1),
(45, 1, 47, 22, 1, 1),
(46, 3, 48, 25, 1, 1),
(47, 8, 51, 28, 1, 1),
(48, 2, 53, 9, 1, 1),
(49, 2, 54, 9, 1, 2),
(50, 10, 55, 39, 1, 1),
(51, 16, 55, 19, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabele `ekipa`
--

CREATE TABLE `ekipa` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) NOT NULL,
  `drzava` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `ekipa`
--

INSERT INTO `ekipa` (`id`, `naziv`, `drzava`) VALUES
(1, 'RMA', 'Spanija'),
(2, 'BAR', 'Spanija'),
(3, 'MCI', 'Anglija'),
(4, 'LIV', 'Anglija'),
(5, 'Rudar', ''),
(6, 'MUN', 'Anglija');

-- --------------------------------------------------------

--
-- Struktura tabele `igralec`
--

CREATE TABLE `igralec` (
  `id` int(11) NOT NULL,
  `ime` varchar(100) NOT NULL,
  `priimek` varchar(100) NOT NULL,
  `stevilka` int(11) NOT NULL,
  `pozicija` varchar(50) NOT NULL,
  `ekipa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `igralec`
--

INSERT INTO `igralec` (`id`, `ime`, `priimek`, `stevilka`, `pozicija`, `ekipa_id`) VALUES
(1, 'Thibaut', 'Courtois', 1, 'Vratar', 1),
(2, 'Antonio', 'Rudiger', 22, 'Branilec', 1),
(3, 'David', 'Alaba', 4, 'Branilec', 1),
(4, 'Jude', 'Bellingham', 5, 'Vezist', 1),
(5, 'Federico', 'Valverde', 8, 'Vezist', 1),
(6, 'Vinicius', 'Junior', 7, 'Napadalec', 1),
(7, 'Kylian', 'Mbappe', 9, 'Napadalec', 1),
(8, 'Marc-Andre', 'ter Stegen', 1, 'Vratar', 2),
(9, 'Ronald', 'Araujo', 4, 'Branilec', 2),
(10, 'Jules', 'Kounde', 23, 'Branilec', 2),
(11, 'Pedri', 'Gonzalez', 8, 'Vezist', 2),
(12, 'Gavi', 'Paez', 6, 'Vezist', 2),
(13, 'Lamine', 'Yamal', 19, 'Napadalec', 2),
(14, 'Robert', 'Lewandowski', 9, 'Napadalec', 2),
(15, 'Ederson', 'Moraes', 31, 'Vratar', 3),
(16, 'Ruben', 'Dias', 3, 'Branilec', 3),
(17, 'Josko', 'Gvardiol', 24, 'Branilec', 3),
(18, 'Rodri', 'Hernandez', 16, 'Vezist', 3),
(19, 'Kevin', 'De Bruyne', 17, 'Vezist', 3),
(20, 'Phil', 'Foden', 47, 'Napadalec', 3),
(21, 'Erling', 'Haaland', 9, 'Napadalec', 3),
(22, 'Alisson', 'Becker', 1, 'Vratar', 4),
(23, 'Virgil', 'van Dijk', 4, 'Branilec', 4),
(24, 'Ibrahima', 'Konate', 5, 'Branilec', 4),
(25, 'Alexis', 'Mac Allister', 10, 'Vezist', 4),
(26, 'Dominik', 'Szoboszlai', 8, 'Vezist', 4),
(27, 'Mohamed', 'Salah', 11, 'Napadalec', 4),
(28, 'Darwin', 'Nunez', 9, 'Napadalec', 4),
(29, 'Luka', 'Meza', 0, '', 5),
(30, 'Luka', 'Meza', 0, '', 5),
(31, 'jan', 'zajc', 11, 'Vratar', 5),
(32, 'Luka', 'Meza', 55, 'Vratar', 2),
(33, 'Luka', 'zajc', 53, 'Vratar', 2),
(34, 'Luka', 'Meza', 14, 'Vratar', 5),
(35, 'jan', 'zajc', 1, 'Vratar', 5),
(36, 'tilen', 'jaklin', 67, 'Vezist', 5),
(37, 'Luka', 'Meza3', 11, 'Vratar', 3),
(38, 'rudolf', 'nenicevic', 11, 'Vratar', 5),
(39, 'Bruno', 'Fernandes', 8, 'Vezist', 6);

-- --------------------------------------------------------

--
-- Struktura tabele `menjava_igralec`
--

CREATE TABLE `menjava_igralec` (
  `id` int(11) NOT NULL,
  `minuta` int(11) NOT NULL,
  `igralec_ven_id` int(11) NOT NULL,
  `igralec_noter_id` int(11) NOT NULL,
  `tekma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `menjava_igralec`
--

INSERT INTO `menjava_igralec` (`id`, `minuta`, `igralec_ven_id`, `igralec_noter_id`, `tekma_id`) VALUES
(1, 10, 3, 4, 3),
(2, 13, 7, 1, 7),
(3, 17, 13, 10, 7),
(4, 15, 3, 4, 17),
(5, 21, 3, 6, 18),
(6, 22, 19, 21, 18),
(7, 2, 20, 19, 35),
(8, 4, 19, 20, 35),
(9, 10, 20, 19, 35),
(10, 1, 22, 25, 42),
(11, 4, 22, 28, 42),
(12, 13, 22, 28, 42),
(13, 10, 22, 25, 43),
(14, 6, 22, 25, 44),
(15, 7, 24, 25, 44),
(16, 1, 22, 25, 45),
(17, 14, 28, 27, 51),
(18, 15, 22, 27, 51),
(19, 10, 22, 25, 52),
(20, 8, 32, 10, 54),
(21, 11, 17, 19, 54);

-- --------------------------------------------------------

--
-- Struktura tabele `tekma`
--

CREATE TABLE `tekma` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `stadion` varchar(100) NOT NULL,
  `domaca_ekipa_id` int(11) NOT NULL,
  `gostujoca_ekipa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `tekma`
--

INSERT INTO `tekma` (`id`, `datum`, `stadion`, `domaca_ekipa_id`, `gostujoca_ekipa_id`) VALUES
(1, '2026-06-11', 'Neznan stadion', 2, 1),
(2, '2026-06-11', 'Neznan stadion', 2, 1),
(3, '2026-06-11', 'Neznan stadion', 4, 1),
(4, '2026-06-11', 'Neznan stadion', 4, 1),
(5, '2026-06-11', 'Neznan stadion', 2, 1),
(6, '2026-06-11', 'Neznan stadion', 1, 4),
(7, '2026-06-12', 'Neznan stadion', 1, 2),
(8, '2026-06-12', 'Neznan stadion', 1, 1),
(14, '2026-06-12', 'Neznan stadion', 1, 5),
(15, '2026-06-12', 'Neznan stadion', 1, 5),
(16, '2026-06-12', 'Neznan stadion', 4, 1),
(17, '2026-06-12', 'Neznan stadion', 4, 1),
(18, '2026-06-12', 'Neznan stadion', 1, 3),
(19, '2026-06-12', 'Neznan stadion', 1, 1),
(20, '2026-06-12', 'Neznan stadion', 1, 1),
(21, '2026-06-12', 'Neznan stadion', 1, 1),
(22, '2026-06-13', 'Neznan stadion', 2, 5),
(23, '2026-06-13', 'Neznan stadion', 3, 2),
(24, '0000-00-00', 'Neznan stadion', 2, 4),
(25, '0000-00-00', 'Neznan stadion', 2, 4),
(26, '0000-00-00', 'Neznan stadion', 2, 4),
(27, '0000-00-00', 'Neznan stadion', 2, 4),
(28, '0000-00-00', 'Neznan stadion', 2, 4),
(29, '0000-00-00', 'Neznan stadion', 2, 4),
(30, '0000-00-00', 'Neznan stadion', 2, 4),
(31, '0000-00-00', 'Neznan stadion', 2, 4),
(32, '0000-00-00', 'Neznan stadion', 2, 4),
(33, '0000-00-00', 'Neznan stadion', 2, 4),
(34, '0000-00-00', 'Neznan stadion', 2, 4),
(35, '0000-00-00', 'Neznan stadion', 3, 2),
(36, '0000-00-00', 'Neznan stadion', 3, 2),
(37, '0000-00-00', 'Neznan stadion', 4, 2),
(38, '0000-00-00', 'Neznan stadion', 4, 2),
(39, '0000-00-00', 'Neznan stadion', 3, 6),
(40, '0000-00-00', 'Neznan stadion', 2, 4),
(41, '0000-00-00', 'Neznan stadion', 2, 3),
(42, '0000-00-00', 'Neznan stadion', 4, 2),
(43, '0000-00-00', 'Neznan stadion', 4, 2),
(44, '0000-00-00', 'Neznan stadion', 4, 2),
(45, '0000-00-00', 'Neznan stadion', 4, 2),
(46, '0000-00-00', 'Neznan stadion', 4, 2),
(47, '0000-00-00', 'Neznan stadion', 4, 2),
(48, '0000-00-00', 'Neznan stadion', 4, 2),
(49, '0000-00-00', 'Neznan stadion', 4, 2),
(50, '0000-00-00', 'Neznan stadion', 4, 2),
(51, '0000-00-00', 'Neznan stadion', 4, 2),
(52, '0000-00-00', 'Neznan stadion', 4, 2),
(53, '0000-00-00', 'Neznan stadion', 2, 3),
(54, '0000-00-00', 'Neznan stadion', 2, 3),
(55, '0000-00-00', 'stadion', 6, 3);

-- --------------------------------------------------------

--
-- Struktura tabele `tip_dogodka`
--

CREATE TABLE `tip_dogodka` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL,
  `opis` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `tip_dogodka`
--

INSERT INTO `tip_dogodka` (`id`, `naziv`, `opis`) VALUES
(1, 'Gol', 'Dosezen zadetek'),
(2, 'Asistenca', 'Podaja za gol'),
(3, 'Rumeni karton', 'Opomin igralcu'),
(4, 'Rdeci karton', 'Izkljucitev igralca'),
(5, 'Menjava', 'Menjava igralca');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabnik`
--

CREATE TABLE `uporabnik` (
  `id` int(11) NOT NULL,
  `uporabnisko_ime` varchar(50) NOT NULL,
  `geslo` varchar(255) NOT NULL,
  `vloga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Odloži podatke za tabelo `uporabnik`
--

INSERT INTO `uporabnik` (`id`, `uporabnisko_ime`, `geslo`, `vloga`) VALUES
(1, 'admin', 'geslo', 'administrator'),
(2, 'kvakic', '12345', 'uporabnik'),
(3, 'bojan', '12345', 'uporabnik'),
(4, 'timiboss', 'nisam3320', 'uporabnik'),
(5, 'lol', 'lolovic', 'uporabnik'),
(6, 'leon', 'abina', 'uporabnik'),
(7, 'hana', '1234', 'uporabnik');

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `dogodek`
--
ALTER TABLE `dogodek`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tekma_id` (`tekma_id`),
  ADD KEY `igralec_id` (`igralec_id`),
  ADD KEY `uporabnik_id` (`uporabnik_id`),
  ADD KEY `tip_dogodka_id` (`tip_dogodka_id`);

--
-- Indeksi tabele `ekipa`
--
ALTER TABLE `ekipa`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `igralec`
--
ALTER TABLE `igralec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ekipa_id` (`ekipa_id`);

--
-- Indeksi tabele `menjava_igralec`
--
ALTER TABLE `menjava_igralec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `igralec_ven_id` (`igralec_ven_id`),
  ADD KEY `igralec_noter_id` (`igralec_noter_id`),
  ADD KEY `tekma_id` (`tekma_id`);

--
-- Indeksi tabele `tekma`
--
ALTER TABLE `tekma`
  ADD PRIMARY KEY (`id`),
  ADD KEY `domaca_ekipa_id` (`domaca_ekipa_id`),
  ADD KEY `gostujoca_ekipa_id` (`gostujoca_ekipa_id`);

--
-- Indeksi tabele `tip_dogodka`
--
ALTER TABLE `tip_dogodka`
  ADD PRIMARY KEY (`id`);

--
-- Indeksi tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `dogodek`
--
ALTER TABLE `dogodek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT tabele `ekipa`
--
ALTER TABLE `ekipa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT tabele `igralec`
--
ALTER TABLE `igralec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT tabele `menjava_igralec`
--
ALTER TABLE `menjava_igralec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT tabele `tekma`
--
ALTER TABLE `tekma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT tabele `tip_dogodka`
--
ALTER TABLE `tip_dogodka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT tabele `uporabnik`
--
ALTER TABLE `uporabnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Omejitve tabel za povzetek stanja
--

--
-- Omejitve za tabelo `dogodek`
--
ALTER TABLE `dogodek`
  ADD CONSTRAINT `dogodek_ibfk_1` FOREIGN KEY (`tekma_id`) REFERENCES `tekma` (`id`),
  ADD CONSTRAINT `dogodek_ibfk_2` FOREIGN KEY (`igralec_id`) REFERENCES `igralec` (`id`),
  ADD CONSTRAINT `dogodek_ibfk_3` FOREIGN KEY (`uporabnik_id`) REFERENCES `uporabnik` (`id`),
  ADD CONSTRAINT `dogodek_ibfk_4` FOREIGN KEY (`tip_dogodka_id`) REFERENCES `tip_dogodka` (`id`);

--
-- Omejitve za tabelo `igralec`
--
ALTER TABLE `igralec`
  ADD CONSTRAINT `igralec_ibfk_1` FOREIGN KEY (`ekipa_id`) REFERENCES `ekipa` (`id`);

--
-- Omejitve za tabelo `menjava_igralec`
--
ALTER TABLE `menjava_igralec`
  ADD CONSTRAINT `menjava_igralec_ibfk_1` FOREIGN KEY (`igralec_ven_id`) REFERENCES `igralec` (`id`),
  ADD CONSTRAINT `menjava_igralec_ibfk_2` FOREIGN KEY (`igralec_noter_id`) REFERENCES `igralec` (`id`),
  ADD CONSTRAINT `menjava_igralec_ibfk_3` FOREIGN KEY (`tekma_id`) REFERENCES `tekma` (`id`);

--
-- Omejitve za tabelo `tekma`
--
ALTER TABLE `tekma`
  ADD CONSTRAINT `tekma_ibfk_1` FOREIGN KEY (`domaca_ekipa_id`) REFERENCES `ekipa` (`id`),
  ADD CONSTRAINT `tekma_ibfk_2` FOREIGN KEY (`gostujoca_ekipa_id`) REFERENCES `ekipa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
